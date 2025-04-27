<?php
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $username = trim($_POST["coursmaths2015@laposte.net"]);
        $password = $_POST["Ilahi2025++***"];
        $temp_code = trim($_POST["temp_code"]);

        // Vérifier le code
        $stmt = $pdo->prepare("SELECT id FROM admin_temp_codes WHERE code = :code");
        $stmt->execute(["code" => $temp_code]);
        if (!$stmt->fetch()) {
            throw new Exception("Code temporaire invalide.");
        }

        // Insérer l'admin
        $stmt = $pdo->prepare("INSERT INTO admins (username, password, created_at) VALUES (:username, :password, NOW())");
        $stmt->execute(["username" => $username, "password" => password_hash($password, PASSWORD_BCRYPT)]);

        echo "Administrateur créé avec succès.";
    } catch (Exception $e) {
        echo "Erreur : " . $e->getMessage();
    }
}
?>
