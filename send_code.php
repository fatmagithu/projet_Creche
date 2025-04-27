<?php
require 'vendor/autoload.php';
require 'config.php';
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$config = require 'config.php';

// Vérification du code en session
if (!isset($_SESSION['admin_email']) || !isset($_SESSION['admin_code'])) {
    die("❌ Aucun code disponible pour l'envoi.");
}

$email = $_SESSION['admin_email'];
$code = $_SESSION['admin_code'];

$mail = new PHPMailer();
$mail->isSMTP();
$mail->Host = $config['mail']['host'];
$mail->SMTPAuth = true;
$mail->Username = $config['mail']['username']; 
$mail->Password = $config['mail']['password']; 
$mail->SMTPSecure = $config['mail']['encryption']; 
$mail->Port = $config['mail']['port'];

$mail->setFrom($config['mail']['username'], 'BabyFarm Admin');
$mail->addAddress($email);

// ✅ Ajout d'un en-tête anti-spam
$mail->addCustomHeader("X-Priority", "1");
$mail->addCustomHeader("X-Mailer", "PHP/PHPMailer");

// ✅ Sujet et contenu de l'email
$mail->Subject = "Votre code temporaire d'inscription";
$mail->Body = "Bonjour,\n\nVoici votre code temporaire : $code\n\nCliquez sur ce lien pour vous inscrire : http://localhost/GenerationMDPform.php?code=$code";

// ✅ Debug SMTP pour voir les erreurs détaillées
$mail->SMTPDebug = 2;
$mail->Debugoutput = 'html';

// ✅ Tentative d'envoi du mail avec gestion avancée des erreurs
try {
    if (!$mail->send()) {
        throw new Exception("❌ Échec de l'envoi de l'email : " . $mail->ErrorInfo);
    }
    echo "✅ Email envoyé avec succès à $email !";
} catch (Exception $e) {
    echo "❌ Erreur : " . $e->getMessage();
}

// ✅ Suppression des variables de session après envoi
unset($_SESSION['admin_email']);
unset($_SESSION['admin_code']);
?>
