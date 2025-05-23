<?php
if (!isset($_GET['creche'])) {
    die("Aucune crèche spécifiée.");
}

$code_creche = $_GET['creche'];

$conn = new mysqli("localhost", "root", "root", "groupe_bulles_deveil");
if ($conn->connect_error) {
    die("Erreur de connexion : " . $conn->connect_error);
}

$sql = "SELECT * FROM creche WHERE code_creche = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $code_creche);
$stmt->execute();
$result = $stmt->get_result();

if ($row = $result->fetch_assoc()) {
    echo "<h1>Bienvenue dans la crèche : " . htmlspecialchars($row['nom_creche']) . "</h1>";
    // Ici tu continues avec les infos de la crèche
} else {
    echo "Crèche introuvable.";
}

$stmt->close();
$conn->close();
?>
