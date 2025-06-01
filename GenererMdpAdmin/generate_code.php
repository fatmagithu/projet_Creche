<?php
require 'db.php';
require 'config.php';
session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);
date_default_timezone_set("Europe/Paris");

// Fonction pour générer un code sécurisé
function generateSecureCode($length = 8) {
    // Génère un code alphanumérique plus facile à lire (sans 0, O, 1, I, etc.)
    $characters = 'ABCDEFGHJKLMNPQRSTUVWXYZ23456789';
    $code = '';
    $max = strlen($characters) - 1;
    
    for ($i = 0; $i < $length; $i++) {
        $code .= $characters[random_int(0, $max)];
    }
    
    return $code;
}

// Fonction pour nettoyer les inputs
function sanitizeInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Variables pour stocker les messages
$successMessage = "";
$errorMessage = "";
$adminEmail = "";
$generatedCode = "";

// Traitement du formulaire
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        // Vérification de l'email
        if (!isset($_POST["email"]) || empty($_POST["email"])) {
            throw new Exception("Veuillez entrer un email.");
        }

        $email = sanitizeInput($_POST["email"]);
        $adminEmail = $email; // Pour affichage dans le formulaire

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new Exception("Format d'adresse email invalide.");
        }
        
        // Connexion à la base de données et vérification
        try {
            // Vérifier si un code existe déjà
            $stmt = $pdo->prepare("SELECT id, code, expiration FROM temporary_codes WHERE email = :email");
            $stmt->execute(["email" => $email]);
            $existingCode = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if ($existingCode) {
                $currentTime = new DateTime();
                $expirationTime = new DateTime($existingCode['expiration']);
                
                if ($currentTime > $expirationTime) {
                    // Le code est expiré, on le supprime
                    $deleteStmt = $pdo->prepare("DELETE FROM temporary_codes WHERE id = :id");
                    $deleteStmt->execute(["id" => $existingCode['id']]);
                } else {
                    // Un code valide existe déjà - Message simplifié comme demandé
                    throw new Exception("Un code existe déjà pour cet email.");
                }
            }
        } catch (PDOException $e) {
            throw new Exception("Erreur de base de données : " . $e->getMessage());
        }

        // Génération du nouveau code en utilisant votre configuration
        $codeLength = $config['temporary_code']['length'] ?? 6;
        $expiryMinutes = $config['app']['code_expiry'] ?? 30;
        
        $code = generateSecureCode($codeLength);
        $expiration = date("Y-m-d H:i:s", strtotime("+{$expiryMinutes} minutes"));
        $generatedCode = $code; // Pour affichage

        // Insertion en base de données
        try {
            $stmt = $pdo->prepare("INSERT INTO temporary_codes (email, code, expiration) VALUES (:email, :code, :expiration)");
            $stmt->execute([
                "email" => $email,
                "code" => $code,
                "expiration" => $expiration
            ]);
        } catch (PDOException $e) {
            throw new Exception("Erreur lors de l'enregistrement du code : " . $e->getMessage());
        }

        // Stocker email + code en session
        $_SESSION['admin_email'] = $email;
        $_SESSION['admin_code'] = $code;
        $_SESSION['code_generated_time'] = time();

        $successMessage = "Code temporaire généré avec succès !";
        
        // Redirection vers la page d'envoi d'email avec un délai
        header("refresh:2;url=send_code.php");
        
    } catch (Exception $e) {
        $errorMessage = $e->getMessage();
    }
}

// CSS pour l'interface utilisateur
$css = "
    body {
        font-family: 'Arial', sans-serif;
        line-height: 1.6;
        margin: 0;
        padding: 20px;
        background-color: #f5f5f5;
        color: #333;
    }
    
    .container {
        max-width: 600px;
        margin: 20px auto;
        padding: 20px;
        background: white;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }
    
    h1 {
        color: #2c3e50;
        margin-bottom: 20px;
        text-align: center;
    }
    
    .form-group {
        margin-bottom: 15px;
    }
    
    label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
    }
    
    input[type='email'] {
        width: 100%;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 4px;
        font-size: 16px;
        box-sizing: border-box;
    }
    
    button {
        background-color: #3498db;
        color: white;
        border: none;
        padding: 10px 15px;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
        transition: background-color 0.3s;
    }
    
    button:hover {
        background-color: #2980b9;
    }
    
    .alert {
        padding: 15px;
        margin-bottom: 20px;
        border-radius: 4px;
    }
    
    .alert-success {
        background-color: #d4edda;
        color: #155724;
        border: 1px solid #c3e6cb;
    }
    
    .alert-danger {
        background-color: #f8d7da;
        color: #721c24;
        border: 1px solid #f5c6cb;
    }
    
    .code-display {
        background-color: #f8f9fa;
        padding: 15px;
        border-radius: 4px;
        border: 1px solid #ddd;
        margin-top: 20px;
    }
    
    .code-value {
        font-family: monospace;
        font-size: 18px;
        font-weight: bold;
        letter-spacing: 1px;
        color: #e74c3c;
    }
    
    .expiration {
        font-size: 14px;
        color: #7f8c8d;
        margin-top: 5px;
    }
";
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BabyFarm - Générer un Code Admin</title>
    <style><?php echo $css; ?></style>
</head>
<body>
    <div class="container">
        <h1>Générer un Code Admin</h1>
        
        <?php if (!empty($successMessage)): ?>
            <div class="alert alert-success">
                <strong>✅ <?php echo $successMessage; ?></strong>
            </div>
            
            <div class="code-display">
                <p><strong>Email de l'admin :</strong> <?php echo $adminEmail; ?></p>
                <p><strong>Code temporaire :</strong> <span class="code-value"><?php echo $generatedCode; ?></span></p>
                <p class="expiration">Ce code expirera dans 30 minutes.</p>
                <p>Redirection vers la page d'envoi d'email en cours...</p>
            </div>
        <?php elseif (!empty($errorMessage)): ?>
            <div class="alert alert-danger">
                <strong>❌ <?php echo $errorMessage; ?></strong>
            </div>
        <?php endif; ?>
        
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label for="email">Email de l'administrateur :</label>
                <input type="email" id="email" name="email" value="<?php echo $adminEmail; ?>" required>
            </div>
            <button type="submit">Générer un code</button>
        </form>
    </div>
</body>
</html>