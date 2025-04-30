<?php
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        session_start();
        $nom = trim($_POST["nom"]);
        $prenom = trim($_POST["prenom"]);
        $email = trim($_POST["email"]);
        $role = trim($_POST["role"]);
        $password = $_POST["motdepasse"];
        $confirm_password = $_POST["confirm"];
        $code_temporaire = trim($_POST["code"]);

        // Vérifier que les mots de passe correspondent
        if ($password !== $confirm_password) {
            throw new Exception("Les mots de passe ne correspondent pas.");
        }

        // Vérification du code temporaire avec l'email
        $stmt = $pdo->prepare("SELECT id FROM temporary_codes WHERE email = :email AND code = :code AND expiration > NOW()");
        $stmt->execute(["email" => $email, "code" => $code_temporaire]);
        if (!$stmt->fetch()) {
            throw new Exception("Code temporaire invalide ou expiré.");
        }

        // Vérifier si l'admin existe déjà
        $stmt = $pdo->prepare("SELECT id FROM admins WHERE email = :email");
        $stmt->execute(["email" => $email]);
        if ($stmt->fetch()) {
            throw new Exception("Cet email est déjà enregistré.");
        }

        // Hachage du mot de passe
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);

        // Insérer l'admin
        $stmt = $pdo->prepare("INSERT INTO admins (username, email, password, created_at) VALUES (:nom, :email, :password, NOW())");
        $stmt->execute(["nom" => $nom, "email" => $email, "password" => $hashed_password]);

        header("Location: PcrecheADMIN.php");
        exit();

    } catch (Exception $e) {
        echo "Erreur : " . htmlspecialchars($e->getMessage());
    }
}
?>
