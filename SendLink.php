<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];

    $lien = "http://localhost/monphp/GestionCreche/PcrecheForm1.php?prenom=" . urlencode($prenom);

    $sujet = "Lien d'inscription pour $prenom";
    $message = "Bonjour,\n\nMerci d'inscrire $prenom via le lien suivant :\n\n$lien\n\nBien à vous,\nL'équipe BabyFarm";
    $headers = "From: inscription@babyfarm.fr";

    if (mail($email, $sujet, $message, $headers)) {
        echo json_encode(["status" => "ok"]);
    } else {
        http_response_code(500);
        echo json_encode(["status" => "error", "message" => "Échec de l'envoi."]);
    }
}
?>
