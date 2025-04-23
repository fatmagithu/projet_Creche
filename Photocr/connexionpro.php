<?php
// Démarrer une session
session_start();

// Connexion à la base de données
$host = "localhost";
$username = "root"; // Remplace par ton nom d'utilisateur MySQL
$password = "root"; // Remplace par ton mot de passe MySQL
$dbname = "babayfarm"; // Nom de ta base de données

$conn = new mysqli($host, $username, $password, $dbname);

// Vérification de la connexion
if ($conn->connect_error) {
    die("Connexion échouée: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST['nom'];
    $mot_de_passe = $_POST['mot_de_passe'];

    // Préparation de la requête SQL pour vérifier les identifiants
    $stmt = $conn->prepare("SELECT * FROM admin1 WHERE nom = ? AND mot_de_passe = ?");
    $stmt->bind_param("ss", $nom, $mot_de_passe);
    $stmt->execute();
    $result = $stmt->get_result();

    // Vérification des identifiants
    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        $_SESSION['admin_nom'] = $row['nom'];
        header("Location: pagepro.php"); // Redirection vers la page admin
        exit();
    } else {
        echo "Identifiant ou mot de passe incorrect.";
    }
}

$conn->close();
?>
