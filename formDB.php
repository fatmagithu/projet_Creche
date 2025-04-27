<?php
$servername = "localhost"; // Utilise l'adresse de ton serveur
$username = "root"; // Ton nom d'utilisateur
$password = "root"; // Ton mot de passe (vide par défaut sur localhost)
$dbname = "babayfarm"; // Le nom de ta base de données

// Créer la connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("La connexion a échoué : " . $conn->connect_error);
}
?>
