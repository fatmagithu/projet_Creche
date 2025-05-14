<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$_SESSION['id_utilisateur'] = 4;
$_SESSION['role'] = 'Éducateur';
$_SESSION['nom_creche'] = "Mantes à l'Ô - Mantes-la-Jolie"; // très important pour la requête
$_SESSION['id_creche'] = 1; // optionnel si tu le veux pour `pointage_journalier`
?>
