<?php
require 'db.php';
session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        if (empty($_POST["email"])) {
            throw new Exception("❌ Veuillez entrer un email.");
        }

        $email = trim($_POST["email"]);

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new Exception("❌ Adresse email invalide.");
        }

        // Vérifier si un code existe déjà
        $stmt = $pdo->prepare("SELECT id FROM temporary_codes WHERE email = :email");
        $stmt->execute(["email" => $email]);

        if ($stmt->fetch()) {
            throw new Exception("❌ Un code existe déjà pour cet email.");
        }

        // Générer le code
        function generateCode($length = 12) {
            return strtoupper(bin2hex(random_bytes($length / 2)));
        }

        $code = generateCode();
        $expiration = date("Y-m-d H:i:s", strtotime("+30 minutes"));

        // Insérer en base de données
        $stmt = $pdo->prepare("INSERT INTO temporary_codes (email, code, expiration) VALUES (:email, :code, :expiration)");
        $stmt->execute(["email" => $email, "code" => $code, "expiration" => $expiration]);

        // 🔥 Stocker email + code en session
        $_SESSION['admin_email'] = $email;
        $_SESSION['admin_code'] = $code;

        echo "<h2>✅ Code temporaire généré avec succès :</h2>";
        echo "<p>Email : <strong>$email</strong></p>";
        echo "<p>Code : <strong>$code</strong></p>";
        echo "<p>Expire le : <strong>$expiration</strong></p>";

        // ✅ Exécuter automatiquement `send_code.php` pour envoyer l'email
        file_get_contents("http://localhost/1GenererMdpAdmin/send_code.php");

    } catch (Exception $e) {
        echo "❌ Erreur : " . htmlspecialchars($e->getMessage());
    }
} else {
    echo "❌ Aucune requête POST reçue.";
}
?>




<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Générer un Code Admin</title>
</head>
<body>
    <form action="" method="POST">
        <label>Email de l'admin :</label>
        <input type="email" name="email" required>
        <button type="submit">Générer le code</button>
    </form>
</body>
</html>
