<?php
$servername = "localhost"; // Nom du serveur (par défaut localhost)
$username = "root";        // Nom d'utilisateur MySQL
$password = "root";            // Mot de passe MySQL
$dbname = "babayfarm";      // Nom de la base de données

// Créer la connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Échec de la connexion : " . $conn->connect_error);
}
?>
