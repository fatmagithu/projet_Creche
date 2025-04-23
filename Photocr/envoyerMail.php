<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Inclure l'autoloader de Composer
require 'vendor/autoload.php';  
// Vérifie que le message est envoyé
if (isset($_POST['message'])) {
    // Récupérer le message de l'utilisateur
    $message = $_POST['message'];

    // Créer une instance de PHPMailer
    $mail = new PHPMailer(true);

    try {
        // Paramètres du serveur
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';  // Serveur SMTP de Gmail
        $mail->SMTPAuth = true;
        $mail->Username = 'tonadresseemail@gmail.com';  // Ton adresse email Gmail
        $mail->Password = 'tonmotdepasse';  // Ton mot de passe Gmail
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Expéditeur et destinataire
        $mail->setFrom('tonadresseemail@gmail.com', 'Nom');
        $mail->addAddress('lenamendy06@gmail.com', 'Admin');  // Adresse de l'administrateur

        // Contenu de l'e-mail
        $mail->isHTML(true);
        $mail->Subject = 'Déclaration d\'enfant malade';
        $mail->Body    = 'Un enfant a été déclaré malade. Message : <strong>' . htmlspecialchars($message) . '</strong>';

        // Envoie de l'email
        $mail->send();

        // Message envoyé avec succès
        echo 'Le message a été envoyé avec succès.';

        // Rediriger après l'envoi
        header('Location: pagepro.php');  // Redirection vers la page admin
        exit();

    } catch (Exception $e) {
        // Si un erreur se produit
        echo "Le message n'a pas pu être envoyé. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>
