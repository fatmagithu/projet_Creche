<?php
require 'vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;

// Récupérer les données du formulaire
$email = $_POST['email'];
$code = $_POST['code'];

// Validation de l'e-mail
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("Adresse e-mail invalide.");
}

$mail = new PHPMailer(true);

try {
    // Configuration SMTP
    $mail->isSMTP();
    $mail->Host = 'smtp.laposte.net';
    $mail->Port = 587;
    $mail->SMTPAuth = true;
    $mail->Username = 'fatma.asserrar@laposte.net';
    $mail->Password = 'Ilahi2025++***';

    // Configuration de l'expéditeur et du destinataire
    $mail->setFrom('fatma.asserrar@laposte.net', 'Admin');
    $mail->addAddress($email);

    // Contenu de l'e-mail
    $mail->Subject = 'Votre Code d\'Accès';
    $mail->Body = "Bonjour,\n\nVoici votre code d'accès : $code.\nCe code est valide pendant 30 minutes.\n\nLien de configuration : http://localhost/2MDPOublier/GenererMdpAdmin/formulaireCreationIdentifiant.php";

    // Envoyer l'e-mail
    $mail->send();
    echo "Code envoyé avec succès à $email.";
} catch (Exception $e) {
    echo "Erreur lors de l'envoi de l'e-mail : " . $mail->ErrorInfo;
}
?>
