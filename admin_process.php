<?php
require 'vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;

// Connexion à la base de données
$servername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "admin_db";

$conn = new mysqli($servername, $dbUsername, $dbPassword, $dbName);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Erreur de connexion à la base de données : " . $conn->connect_error);
}

// Identifier l'action à effectuer
$action = $_GET['action'] ?? '';

// Définir le chemin de base correct pour les URL
$baseUrl = "http://$_SERVER[HTTP_HOST]/2MDPOublier/GenererMdpAdmin";

// Définir le chemin vers la page d'administration
$adminLoginPage = "PcrecheADMIN.php";

// Logique pour afficher le formulaire initial
if (empty($action)) {
    // Afficher le formulaire pour générer un code
    echo '<!DOCTYPE html>
          <html lang="fr">
          <head>
              <meta charset="UTF-8">
              <title>Génération de Code Administrateur</title>
              <style>
                  body { font-family: Arial, sans-serif; margin: 20px; }
                  form { max-width: 500px; margin: 0 auto; }
                  input[type="email"] { width: 100%; padding: 10px; margin-bottom: 15px; }
                  button { padding: 10px 15px; background-color: #4CAF50; color: white; border: none; cursor: pointer; }
              </style>
          </head>
          <body>
              <h1>Génération de Code d\'Accès Administrateur</h1>
              <form action="' . $baseUrl . '/admin_process.php?action=generate" method="POST">
                  <label for="email">Email de l\'administrateur :</label>
                  <input type="email" id="email" name="email" placeholder="Adresse e-mail" required>
                  <button type="submit">Générer un code</button>
              </form>
          </body>
          </html>';
    exit;
}

// Logique pour générer un code
if ($action === 'generate' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer l'email de l'administrateur
    $email = $_POST['email'] ?? null;

    // Validation de l'email
    if (!$email || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Adresse e-mail invalide.");
    }

    // Générer un code unique
    $code = bin2hex(random_bytes(4)); // Exemple : 8 caractères alphanumériques
    $expiration = date("Y-m-d H:i:s", strtotime("+30 minutes")); // Code valide pendant 30 minutes

    // Vérifier si un code existe déjà pour cet email et le supprimer
    $deleteSql = "DELETE FROM temporary_codes WHERE email = ?";
    $deleteStmt = $conn->prepare($deleteSql);
    $deleteStmt->bind_param("s", $email);
    $deleteStmt->execute();

    // Insérer le nouveau code et l'email dans la base de données
    $sql = "INSERT INTO temporary_codes (email, code, expiration) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $email, $code, $expiration);

    if (!$stmt->execute()) {
        die("Erreur lors de l'insertion du code : " . $stmt->error);
    }

    // Afficher le formulaire pour envoyer le code par e-mail
    echo '<!DOCTYPE html>
          <html lang="fr">
          <head>
              <meta charset="UTF-8">
              <title>Génération et Envoi du Code</title>
              <style>
                  body { font-family: Arial, sans-serif; margin: 20px; text-align: center; }
                  div { max-width: 600px; margin: 0 auto; padding: 20px; border: 1px solid #ddd; border-radius: 5px; }
                  button { padding: 10px 15px; background-color: #4CAF50; color: white; border: none; cursor: pointer; }
              </style>
          </head>
          <body>
              <div>
                  <h1>Code généré : ' . $code . '</h1>
                  <form action="' . $baseUrl . '/admin_process.php?action=send" method="POST">
                      <input type="hidden" name="email" value="' . htmlspecialchars($email) . '">
                      <input type="hidden" name="code" value="' . $code . '">
                      <button type="submit">Envoyer par e-mail</button>
                  </form>
              </div>
          </body>
          </html>';
    exit;
}

// Logique pour envoyer le code par e-mail
if ($action === 'send' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données du formulaire
    $email = $_POST['email'];
    $code = $_POST['code'];

    // Validation de l'e-mail
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Adresse e-mail invalide.");
    }

    // Envoyer le code par e-mail
    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.laposte.net';
        $mail->Port = 587;
        $mail->SMTPAuth = true;
        $mail->Username = 'fatma.asserrar@laposte.net';
        $mail->Password = 'Ilahi2025++***';
        $mail->setFrom('fatma.asserrar@laposte.net', 'Admin');
        $mail->addAddress($email);
        $mail->Subject = 'Votre Code d\'Accès';
        
        // Utiliser le chemin de base correct pour le lien dans l'email
        $mail->Body = "Bonjour,\n\nVoici votre code d'accès : $code.\nCe code est valide pendant 30 minutes.\n\nLien de configuration : $baseUrl/admin_process.php?action=setup";

        $mail->send();
        echo '<!DOCTYPE html>
              <html lang="fr">
              <head>
                  <meta charset="UTF-8">
                  <title>Code Envoyé</title>
                  <style>
                      body { font-family: Arial, sans-serif; margin: 20px; text-align: center; }
                      div { max-width: 600px; margin: 0 auto; padding: 20px; border: 1px solid #ddd; border-radius: 5px; }
                      a { display: inline-block; margin-top: 20px; padding: 10px 15px; background-color: #4CAF50; color: white; text-decoration: none; }
                  </style>
              </head>
              <body>
                  <div>
                      <h1>Code envoyé avec succès</h1>
                      <p>Le code a été envoyé à l\'adresse : ' . htmlspecialchars($email) . '</p>
                      <a href="' . $baseUrl . '/admin_process.php?action=setup">Continuer vers la page de configuration</a>
                  </div>
              </body>
              </html>';
    } catch (Exception $e) {
        die("Erreur lors de l'envoi de l'e-mail : " . $mail->ErrorInfo);
    }
    exit;
}

// Afficher le formulaire de création d'administrateur (setup)
if ($action === 'setup') {
    echo '<!DOCTYPE html>
          <html lang="fr">
          <head>
              <meta charset="UTF-8">
              <title>Créer un Compte Administrateur</title>
              <style>
                  body { font-family: Arial, sans-serif; margin: 20px; }
                  form { max-width: 500px; margin: 0 auto; padding: 20px; border: 1px solid #ddd; border-radius: 5px; }
                  input { width: 100%; padding: 10px; margin-bottom: 15px; box-sizing: border-box; }
                  button { padding: 10px 15px; background-color: #4CAF50; color: white; border: none; cursor: pointer; width: 100%; }
                  h1 { text-align: center; }
              </style>
          </head>
          <body>
              <h1>Créer un Compte Administrateur</h1>
              <form action="' . $baseUrl . '/admin_process.php?action=create" method="POST">
                  <label for="username">Nom d\'utilisateur :</label>
                  <input type="text" id="username" name="username" placeholder="Nom d\'utilisateur" required>
                  
                  <label for="email">Adresse e-mail :</label>
                  <input type="email" id="email" name="email" placeholder="Adresse e-mail" required>
                  
                  <label for="password">Mot de passe :</label>
                  <input type="password" id="password" name="password" placeholder="Mot de passe" required>
                  
                  <label for="confirm-password">Confirmer le mot de passe :</label>
                  <input type="password" id="confirm-password" name="confirm-password" placeholder="Confirmer le mot de passe" required>
                  
                  <label for="code">Code reçu par e-mail :</label>
                  <input type="text" id="code" name="code" placeholder="Code reçu" required>
                  
                  <button type="submit">Créer le compte</button>
              </form>
          </body>
          </html>';
    exit;
}

// Logique pour créer un administrateur
if ($action === 'create' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données du formulaire
    $username = $_POST['username'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $confirmPassword = $_POST['confirm-password'] ?? '';
    $code = trim($_POST['code'] ?? ''); // Nettoyer les espaces éventuels

    // Valider les données
    if (empty($username) || empty($email) || empty($password) || empty($confirmPassword) || empty($code)) {
        die("Tous les champs sont obligatoires.");
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Adresse e-mail invalide.");
    }

    if (strlen($password) < 8) {
        die("Le mot de passe doit contenir au moins 8 caractères.");
    }

    if ($password !== $confirmPassword) {
        die("Les mots de passe ne correspondent pas.");
    }

    // Récupérer tous les codes pour cet email
    $sql = "SELECT * FROM temporary_codes WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    $codeValid = false;
    $debug = "<h3>Vérification du code</h3>";

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $dbCode = $row['code'];
        $expiration = $row['expiration'];
        
        $debug .= "<p>Code en base de données: '".htmlspecialchars($dbCode)."'</p>";
        $debug .= "<p>Code saisi: '".htmlspecialchars($code)."'</p>";
        $debug .= "<p>Expiration: ".htmlspecialchars($expiration)."</p>";
        $debug .= "<p>Heure actuelle: ".date('Y-m-d H:i:s')."</p>";
        
        // Vérifier si le code est valide (correspondance exacte et non expiré)
        if ($dbCode === $code && strtotime($expiration) > time()) {
            $codeValid = true;
        } else {
            if ($dbCode !== $code) {
                $debug .= "<p style='color:red'>Les codes ne correspondent pas exactement.</p>";
            }
            if (strtotime($expiration) <= time()) {
                $debug .= "<p style='color:red'>Le code est expiré.</p>";
            }
        }
    } else {
        $debug .= "<p style='color:red'>Aucun code trouvé pour l'email: ".htmlspecialchars($email)."</p>";
    }

    if ($codeValid) {
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        // Vérifier si l'utilisateur existe déjà
        $checkSql = "SELECT * FROM admins WHERE email = ?";
        $checkStmt = $conn->prepare($checkSql);
        $checkStmt->bind_param("s", $email);
        $checkStmt->execute();
        $checkResult = $checkStmt->get_result();

        if ($checkResult->num_rows > 0) {
            // Mettre à jour l'utilisateur existant
            $updateSql = "UPDATE admins SET username = ?, password = ? WHERE email = ?";
            $updateStmt = $conn->prepare($updateSql);
            $updateStmt->bind_param("sss", $username, $hashedPassword, $email);
            
            if ($updateStmt->execute()) {
                // Supprimer le code utilisé
                $deleteSql = "DELETE FROM temporary_codes WHERE email = ?";
                $deleteStmt = $conn->prepare($deleteSql);
                $deleteStmt->bind_param("s", $email);
                $deleteStmt->execute();
                
                // Page de succès avec redirection automatique
                echo '<!DOCTYPE html>
                      <html lang="fr">
                      <head>
                          <meta charset="UTF-8">
                          <title>Compte mis à jour</title>
                          <meta http-equiv="refresh" content="2;url=' . $adminLoginPage . '">
                          <style>
                              body { font-family: Arial, sans-serif; text-align: center; padding-top: 50px; background-color: #f5f5f5; }
                              .success-container { max-width: 500px; margin: 0 auto; padding: 30px; background-color: #fff; border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
                              h1 { color: #4CAF50; }
                              p { margin: 20px 0; }
                              .btn { display: inline-block; padding: 10px 20px; background-color: #4CAF50; color: white; text-decoration: none; border-radius: 5px; }
                          </style>
                      </head>
                      <body>
                          <div class="success-container">
                              <h1>Compte mis à jour avec succès!</h1>
                              <p>Vous allez être redirigé vers la page de connexion...</p>
                              <a href="' . $adminLoginPage . '" class="btn">Connexion</a>
                          </div>
                      </body>
                      </html>';
                exit;
            } else {
                die("Erreur lors de la mise à jour du compte : " . $updateStmt->error);
            }
        } else {
            // Insérer un nouvel utilisateur
            $insertSql = "INSERT INTO admins (username, email, password) VALUES (?, ?, ?)";
            $insertStmt = $conn->prepare($insertSql);
            $insertStmt->bind_param("sss", $username, $email, $hashedPassword);
            
            if ($insertStmt->execute()) {
                // Supprimer le code utilisé
                $deleteSql = "DELETE FROM temporary_codes WHERE email = ?";
                $deleteStmt = $conn->prepare($deleteSql);
                $deleteStmt->bind_param("s", $email);
                $deleteStmt->execute();
                
                // Page de succès avec redirection automatique
                echo '<!DOCTYPE html>
                      <html lang="fr">
                      <head>
                          <meta charset="UTF-8">
                          <title>Compte créé</title>
                          <meta http-equiv="refresh" content="2;url=' . $adminLoginPage . '">
                          <style>
                              body { font-family: Arial, sans-serif; text-align: center; padding-top: 50px; background-color: #f5f5f5; }
                              .success-container { max-width: 500px; margin: 0 auto; padding: 30px; background-color: #fff; border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
                              h1 { color: #4CAF50; }
                              p { margin: 20px 0; }
                              .btn { display: inline-block; padding: 10px 20px; background-color: #4CAF50; color: white; text-decoration: none; border-radius: 5px; }
                          </style>
                      </head>
                      <body>
                          <div class="success-container">
                              <h1>Compte créé avec succès!</h1>
                              <p>Vous allez être redirigé vers la page de connexion...</p>
                              <a href="' . $adminLoginPage . '" class="btn">Connexion</a>
                          </div>
                      </body>
                      </html>';
                exit;
            } else {
                die("Erreur lors de la création du compte : " . $insertStmt->error);
            }
        }
    } else {
        // Afficher les informations de débogage
        echo $debug;
        echo "<p><a href='" . $baseUrl . "/admin_process.php?action=setup'>Retour au formulaire</a></p>";
    }
    exit;
}