<?php
require_once 'configBis.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = htmlspecialchars(trim($_POST['email']), ENT_QUOTES, 'UTF-8');
    $password = trim($_POST['password']);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Adresse email invalide.";
        header("Location: login.php?error=" . urlencode($error));
        exit();
    }

    $stmt = $conn->prepare("SELECT id, nom, prenom, email, password FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();

        if (password_verify($password, $user['password'])) {
            // Démarrer une session sécurisée
            session_regenerate_id(true);
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['prenom'] . ' ' . $user['nom'];
            $_SESSION['user_email'] = $user['email'];

            // Redirection vers le tableau de bord
            header("Location: dashboard.php");
            exit();
        } else {
            $error = "Mot de passe incorrect.";
        }
    } else {
        $error = "Email introuvable.";
    }

    // Redirection avec erreur
    if (!empty($error)) {
        header("Location: login.php?error=" . urlencode($error));
        exit();
    }
}
?>
