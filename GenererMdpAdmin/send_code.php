<?php
require 'vendor/autoload.php';
require 'config.php';
require 'db.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

session_start();

// Configuration et reporting d'erreurs
error_reporting(E_ALL);
ini_set('display_errors', 1);
date_default_timezone_set("Europe/Paris");

// Récupération du fichier de configuration
$config = require 'config.php';

// Initialisation des variables
$statusMessage = "";
$statusClass = "";
$isSuccess = false;
$sentCode = ""; // Pour afficher le code envoyé
$email = "";

// Vérification de la session
if (empty($_SESSION['admin_email']) || empty($_SESSION['admin_code']) || empty($_SESSION['code_generated_time'])) {
    $statusMessage = "Aucun code disponible ou session expirée. Veuillez générer un nouveau code.";
    $statusClass = "alert-danger";
} else {
    // Vérifier si le code a plus de 5 minutes
    if (time() - $_SESSION['code_generated_time'] > 300) { // 5 minutes en secondes
        $statusMessage = "Le code est resté trop longtemps sans être envoyé. Veuillez générer un nouveau code.";
        $statusClass = "alert-danger";
        // Nettoyage de la session
        unset($_SESSION['admin_email'], $_SESSION['admin_code'], $_SESSION['code_generated_time']);
    } else {
        $email = $_SESSION['admin_email'];
        $code = $_SESSION['admin_code'];
        $sentCode = $code; // Sauvegarde du code pour l'affichage
        
        // Vérification supplémentaire en base de données
        try {
            $stmt = $pdo->prepare("SELECT id, expiration FROM temporary_codes WHERE email = :email AND code = :code");
            $stmt->execute(["email" => $email, "code" => $code]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if (!$result) {
                throw new Exception("Le code n'existe pas en base de données.");
            }
            
            // Vérifier si le code n'est pas expiré
            $currentTime = new DateTime();
            $expirationTime = new DateTime($result['expiration']);
            
            if ($currentTime > $expirationTime) {
                throw new Exception("Le code est expiré. Veuillez générer un nouveau code.");
            }
            
            // Configuration de PHPMailer
            $mail = new PHPMailer(true);
            
            try {
                // Paramètres du serveur
                $mail->isSMTP();
                $mail->Host = $config['mail']['host'];
                $mail->SMTPAuth = true;
                $mail->Username = $config['mail']['username'];
                $mail->Password = $config['mail']['password'];
                $mail->SMTPSecure = $config['mail']['secure'] === 'ssl' ? PHPMailer::ENCRYPTION_SMTPS : PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port = $config['mail']['port'];
                $mail->Timeout = 30;
                $mail->SMTPKeepAlive = true;
                
                // Options SMTP pour le développement local
                if ($config['environment'] === 'development') {
                    $mail->SMTPOptions = [
                        'ssl' => [
                            'verify_peer' => false,
                            'verify_peer_name' => false,
                            'allow_self_signed' => true,
                        ],
                    ];
                    $mail->SMTPDebug = SMTP::DEBUG_SERVER;
                    ob_start();
                }
                
                // Expéditeur et destinataire
                $mail->setFrom($config['mail']['username'], 'BabyFarm Admin');
                $mail->addAddress($email);
                $mail->addReplyTo($config['mail']['reply_to'] ?? $config['mail']['username'], 'Support BabyFarm');
                
                // Configuration du contenu
                $mail->isHTML(true);
                $mail->CharSet = 'UTF-8';
                $mail->Subject = "Votre code temporaire d'accès - BabyFarm";
                
                // URL pour le lien de connexion
                $baseUrl = $config['app_url'] ?? 'http://localhost';
                $loginUrl = $baseUrl . '/GestionCreche/GenerationMDPform.php?code=' . urlencode($code);
                
                if (isset($config['app']['admin_page'])) {
                    $loginUrl = $baseUrl . '/GestionCreche/GenerationMDPform.php?code=' . urlencode($code);
                }
                
                // Email HTML
                $mail->Body = "
                <!DOCTYPE html>
                <html lang='fr'>
                <head>
                    <meta charset='UTF-8'>
                    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                    <title>Code d'accès BabyFarm</title>
                    <style>
                        body {
                            font-family: Arial, sans-serif; 
                            line-height: 1.6;
                            color: #333;
                            margin: 0;
                            padding: 0;
                        }
                        .container {
                            max-width: 600px;
                            margin: auto;
                            padding: 20px;
                            background: #f9f9f9;
                            border-radius: 8px;
                        }
                        .header {
                            text-align: center;
                            padding: 10px 0;
                            background-color: #3498db;
                            color: white;
                            border-radius: 5px 5px 0 0;
                        }
                        .content {
                            padding: 20px;
                            background: white;
                            border-radius: 0 0 5px 5px;
                            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
                        }
                        .code {
                            font-size: 24px;
                            font-weight: bold;
                            text-align: center;
                            letter-spacing: 2px;
                            color: #e74c3c;
                            padding: 10px;
                            margin: 15px 0;
                            background: #f8f9fa;
                            border: 1px dashed #ddd;
                            border-radius: 4px;
                        }
                        .button {
                            display: inline-block;
                            padding: 12px 24px;
                            color: white;
                            background: #3498db;
                            text-decoration: none;
                            border-radius: 5px;
                            font-weight: bold;
                            text-align: center;
                            margin: 15px 0;
                        }
                        .footer {
                            margin-top: 20px;
                            text-align: center;
                            font-size: 12px;
                            color: #7f8c8d;
                        }
                    </style>
                </head>
                <body>
                    <div class='container'>
                        <div class='header'>
                            <h2>BabyFarm - Accès Administrateur</h2>
                        </div>
                        <div class='content'>
                            <h3>Bonjour,</h3>
                            <p>Voici votre code temporaire d'accès :</p>
                            <div class='code'>$code</div>
                            <p>Ce code expirera dans <strong>30 minutes</strong>.</p>
                            <p>Cliquez sur le bouton ci-dessous pour vous connecter :</p>
                            <div style='text-align: center;'>
                                <a href='$loginUrl' class='button'>Se Connecter</a>
                            </div>
                            <p>Si le bouton ne fonctionne pas, vous pouvez copier et coller ce lien dans votre navigateur :</p>
                            <p style='word-break: break-all;'>$loginUrl</p>
                            <p>Cordialement,<br>L'équipe BabyFarm</p>
                        </div>
                        <div class='footer'>
                            <p>Cet email a été envoyé automatiquement. Merci de ne pas y répondre.</p>
                        </div>
                    </div>
                </body>
                </html>";
                
                // Version texte
                $mail->AltBody = "Bonjour,

Voici votre code temporaire d'accès : $code

Ce code expirera dans 30 minutes.

Pour vous connecter, copiez et collez ce lien dans votre navigateur :
$loginUrl

Cordialement,
L'équipe BabyFarm";
                
                // Envoi de l'email
                if ($mail->send()) {
                    $statusMessage = "Email envoyé avec succès à $email !";
                    $statusClass = "alert-success";
                    $isSuccess = true;
                    
                    // Mise à jour de la date d'envoi dans la base de données
                    try {
                        $checkStmt = $pdo->prepare("SHOW COLUMNS FROM temporary_codes LIKE 'email_sent'");
                        $checkStmt->execute();
                        
                        if ($checkStmt->rowCount() > 0) {
                            $updateStmt = $pdo->prepare("UPDATE temporary_codes SET email_sent = 1, sent_time = NOW() WHERE email = :email AND code = :code");
                            $updateStmt->execute(["email" => $email, "code" => $code]);
                        } else {
                            $checkSentTime = $pdo->prepare("SHOW COLUMNS FROM temporary_codes LIKE 'sent_time'");
                            $checkSentTime->execute();
                            
                            if ($checkSentTime->rowCount() > 0) {
                                $updateStmt = $pdo->prepare("UPDATE temporary_codes SET sent_time = NOW() WHERE email = :email AND code = :code");
                                $updateStmt->execute(["email" => $email, "code" => $code]);
                            }
                        }
                    } catch (PDOException $updateError) {
                        // Non bloquant
                    }
                    
                    // Nettoyage de la session après envoi réussi
                    unset($_SESSION['admin_email'], $_SESSION['admin_code'], $_SESSION['code_generated_time']);
                } else {
                    throw new Exception("Échec de l'envoi. Veuillez réessayer.");
                }
                
            } catch (Exception $e) {
                $debugOutput = '';
                if (isset($mail) && $config['environment'] === 'development') {
                    $debugOutput = ob_get_clean();
                }
                
                $errorDetails = "Erreur lors de l'envoi de l'email : " . $mail->ErrorInfo;
                if (!empty($debugOutput)) {
                    $errorDetails .= "<br><strong>Détails SMTP :</strong><br><pre>$debugOutput</pre>";
                }
                
                throw new Exception($errorDetails);
            }
            
        } catch (Exception $e) {
            $statusMessage = $e->getMessage();
            $statusClass = "alert-danger";
        }
    }
}

// CSS pour l'interface utilisateur simplifiée
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
    
    .button {
        display: inline-block;
        background-color: #3498db;
        color: white;
        border: none;
        padding: 10px 15px;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
        text-decoration: none;
        transition: background-color 0.3s;
        margin-top: 20px;
    }
    
    .button:hover {
        background-color: #2980b9;
    }
    
    .code-display {
        background-color: #f8f9fa;
        padding: 15px;
        border-radius: 4px;
        border: 1px solid #ddd;
        margin-top: 20px;
        font-size: 16px;
    }
    
    .code-value {
        font-family: monospace;
        font-size: 18px;
        font-weight: bold;
        color: #e74c3c;
    }
    
    .success-icon {
        color: green;
        font-size: 18px;
    }
";
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BabyFarm - Envoi du Code Admin</title>
    <style><?php echo $css; ?></style>
</head>
<body>
    <div class="container">
        <h1>Envoi du Code Admin</h1>
        
        <?php if ($isSuccess): ?>
            <div class="alert alert-success">
                <span class="success-icon">✓</span> Email envoyé avec succès à <?php echo $email; ?> !
            </div>
            
            <div class="code-display">
                Code envoyé : <span class="code-value"><?php echo $sentCode; ?></span>
            </div>
        <?php elseif (!empty($statusMessage)): ?>
            <div class="alert <?php echo $statusClass; ?>">
                <?php echo ($statusClass === "alert-success" ? "✓ " : "❌ ") . $statusMessage; ?>
            </div>
        <?php endif; ?>
        
        <div style="text-align: center;">
            <a href="generate_code.php" class="button">Générer un nouveau code</a>
        </div>
    </div>
</body>
</html>