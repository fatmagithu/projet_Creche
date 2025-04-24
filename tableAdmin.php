<?php
// Connexion à la base de données
$servername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "admin_db";

$conn = new mysqli($servername, $dbUsername, $dbPassword, $dbName);

// Vérifiez la connexion
if ($conn->connect_error) {
    die("Erreur de connexion : " . $conn->connect_error);
}

// Récupérez les données du formulaire
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

// Validez l'e-mail
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("Adresse e-mail invalide.");
}

// Validez la longueur du mot de passe
if (strlen($password) < 8) {
    die("Le mot de passe doit contenir au moins 8 caractères.");
}

// Hachez le mot de passe
$hashedPassword = password_hash($password, PASSWORD_BCRYPT);

// Insérez les données dans la table `admins`
$sql = "INSERT INTO admins (username, email, password) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $username, $email, $hashedPassword);

if ($stmt->execute()) {
    echo "Compte administrateur créé avec succès.";
} else {
    echo "Erreur lors de la création du compte : " . $stmt->error;
}

// Fermez la connexion
$stmt->close();
$conn->close();
?>
