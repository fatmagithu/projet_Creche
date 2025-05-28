<?php
$conn = new mysqli("localhost", "root", "root", "groupe_bulles_deveil");
if ($conn->connect_error) die("Erreur de connexion");

$jour = $_POST['jour'];
$heure = $_POST['heure'];
$titre = $_POST['titre'];
$details = $_POST['details'];
$code_creche = intval($_POST['code_creche']);
$image_url = $_POST['image_url'] ?? "";

$stmt = $conn->prepare("INSERT INTO planning_activites (code_creche, jour, heure, titre, details, image_url) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("isssss", $code_creche, $jour, $heure, $titre, $details, $image_url);
$stmt->execute();

echo "ok";
?>
