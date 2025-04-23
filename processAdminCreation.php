<?php
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

// Récupérer les données du formulaire
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirmPassword = $_POST['confirm-password'];
$code = $_POST['code'];

// Vérification des données
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("Adresse e-mail invalide.");
}

if (strlen($password) < 8) {
    die("Le mot de passe doit contenir au moins 8 caractères.");
}

if ($password !== $confirmPassword) {
    die("Les mots de passe ne correspondent pas.");
}

// Vérification du code et de l'email dans la base de données
$sql = "SELECT * FROM temporary_codes WHERE code = ? ORDER BY id DESC LIMIT 1";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $code);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if ($row['email'] !== $email) {
        die("Le code et l'adresse e-mail ne correspondent pas.");
    }

    // Hacher le mot de passe
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    // Insérer l'admin dans la table
    $insertSql = "INSERT INTO admins (username, email, password) VALUES (?, ?, ?)";
    $insertStmt = $conn->prepare($insertSql);
    $insertStmt->bind_param("sss", $username, $email, $hashedPassword);

    if ($insertStmt->execute()) {
        // Supprimer le code utilisé
        $deleteSql = "DELETE FROM temporary_codes WHERE code = ?";
        $deleteStmt = $conn->prepare($deleteSql);
        $deleteStmt->bind_param("s", $code);
        $deleteStmt->execute();

        // Rediriger vers la page PcrecheADMIN.php
        header("Location: PcrecheADMIN.php");
        exit;
    } else {
        die("Erreur lors de la création du compte administrateur : " . $insertStmt->error);
    }
} else {
    die("Code invalide.");
}

// Fermer les connexions
$stmt->close();
$conn->close();
?>