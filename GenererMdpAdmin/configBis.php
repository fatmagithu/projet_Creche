<?php
// Informations de connexion à la base de données
$servername = "localhost";
$username = "root"; // Modifier selon votre environnement
$password = ""; // Modifier selon votre environnement
$dbname = "user_authentication";

try {
    $conn = new mysqli($servername, $username, $password);

    if ($conn->connect_error) {
        throw new Exception("Connexion échouée : " . $conn->connect_error);
    }

    // Créer et sélectionner la base de données
    $sql = "CREATE DATABASE IF NOT EXISTS $dbname";
    if ($conn->query($sql) === TRUE) {
        $conn->select_db($dbname);

        // Créer les tables si elles n'existent pas
        $conn->query("
            CREATE TABLE IF NOT EXISTS users (
                id INT AUTO_INCREMENT PRIMARY KEY,
                nom VARCHAR(50),
                prenom VARCHAR(50),
                email VARCHAR(100) UNIQUE,
                telephone VARCHAR(20),
                password VARCHAR(255),
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            )");

        $conn->query("
            CREATE TABLE IF NOT EXISTS password_reset (
                id INT AUTO_INCREMENT PRIMARY KEY,
                email VARCHAR(100),
                reset_code VARCHAR(10),
                expire_time TIMESTAMP,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            )");
    }
} catch (Exception $e) {
    error_log($e->getMessage());
    die("Une erreur s'est produite. Réessayez plus tard.");
}
?>
