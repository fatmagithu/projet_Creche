<?php
// Script de test SMTP pour diagnostiquer les problèmes d'envoi d'emails
require 'vendor/autoload.php';
$config = require 'config.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Activer l'affichage complet des erreurs
error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "<h1>Test de connexion SMTP</h1>";

try {
    // Création d'une instance avec debug activé
    $mail = new PHPMailer(true);
    
    // Paramètres du serveur
    $mail->SMTPDebug = SMTP::DEBUG_SERVER; // Niveau de debug maximum
    $mail->isSMTP();
    $mail->Host = $config['mail']['host'];
    $mail->SMTPAuth = true;
    $mail->Username = $config['mail']['username'];
    $mail->Password = $config['mail']['password'];
    $mail->SMTPSecure = $config['mail']['encryption'];
    $mail->Port = $config['mail']['port'];
    
    // Augmenter le timeout
    $mail->Timeout = 60; // 60 secondes
    
    echo "<h2>Configuration actuelle:</h2>";
    echo "<pre>";
    echo "Host: " . $mail->Host . "\n";
    echo "Port: " . $mail->Port . "\n";
    echo "Username: " . $mail->Username . "\n";
    echo "SMTPSecure: " . $mail->SMTPSecure . "\n";
    echo "</pre>";
    
    echo "<h2>Tentative de connexion au serveur SMTP...</h2>";
    echo "<div style='background:#eee; padding:10px; font-family:monospace;'>";
    
    // Tente uniquement de se connecter au serveur SMTP sans envoyer d'email
    if ($mail->SmtpConnect()) {
        echo "<div style='color:green; font-weight:bold;'>✅ Connexion SMTP réussie!</div>";
        $mail->smtpClose();
    } else {
        echo "<div style='color:red; font-weight:bold;'>❌ Échec de la connexion SMTP.</div>";
    }
    echo "</div>";
    
    // Si la connexion réussit, essayer d'envoyer un email de test
    if ($mail->SmtpConnect()) {
        echo "<h2>Tentative d'envoi d'un email de test...</h2>";
        echo "<div style='background:#eee; padding:10px; font-family:monospace;'>";
        
        // Destinataires
        $mail->setFrom($config['mail']['username'], 'Test SMTP');
        $mail->addAddress('votre-email@example.com'); // Remplacez par votre email personnel pour tester
        
        // Contenu
        $mail->isHTML(true);
        $mail->Subject = 'Test SMTP - ' . date('Y-m-d H:i:s');
        $mail->Body = 'Ceci est un test d\'envoi d\'email via SMTP à ' . date('Y-m-d H:i:s');
        
        $mail->send();
        echo "<div style='color:green; font-weight:bold;'>✅ Email de test envoyé avec succès!</div>";
        echo "</div>";
    }
    
} catch (Exception $e) {
    echo "<div style='color:red; font-weight:bold;'>❌ Erreur: " . $e->getMessage() . "</div>";
    echo "<div style='background:#fff0f0; padding:10px; font-family:monospace;'>";
    echo "Trace d'erreur: <br>";
    echo $e->getTraceAsString();
    echo "</div>";
}

// Test des ports alternatifs
echo "<h2>Test des ports alternatifs</h2>";
$portsToTest = [25, 465, 587, 2525];

foreach ($portsToTest as $port) {
    if ($port == $config['mail']['port']) continue; // Sauter le port déjà testé
    
    echo "<h3>Test du port $port</h3>";
    echo "<div style='background:#eee; padding:10px; font-family:monospace;'>";
    
    try {
        $testMail = new PHPMailer(true);
        $testMail->isSMTP();
        $testMail->SMTPDebug = SMTP::DEBUG_SERVER;
        $testMail->Host = $config['mail']['host'];
        $testMail->SMTPAuth = true;
        $testMail->Username = $config['mail']['username'];
        $testMail->Password = $config['mail']['password'];
        
        // Définir le port à tester
        $testMail->Port = $port;
        
        // Pour le port 465, utiliser SSL
        if ($port == 465) {
            $testMail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        } 
        // Pour les autres ports, utiliser TLS
        else {
            $testMail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        }
        
        $testMail->Timeout = 10; // Timeout court pour chaque test
        
        if ($testMail->SmtpConnect()) {
            echo "<div style='color:green; font-weight:bold;'>✅ Connexion réussie sur le port $port</div>";
            $testMail->smtpClose();
        } else {
            echo "<div style='color:red; font-weight:bold;'>❌ Échec de connexion sur le port $port</div>";
        }
    } catch (Exception $e) {
        echo "<div style='color:red; font-weight:bold;'>❌ Erreur sur le port $port: " . $e->getMessage() . "</div>";
    }
    
    echo "</div>";
}

// Test de configuration laposte.net spécifique
echo "<h2>Test de configuration spécifique pour laposte.net</h2>";
echo "<div style='background:#eee; padding:10px; font-family:monospace;'>";

try {
    $laposteMail = new PHPMailer(true);
    $laposteMail->isSMTP();
    $laposteMail->SMTPDebug = SMTP::DEBUG_SERVER;
    $laposteMail->Host = 'smtp.laposte.net';
    $laposteMail->SMTPAuth = true;
    $laposteMail->Username = $config['mail']['username'];
    $laposteMail->Password = $config['mail']['password'];
    $laposteMail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $laposteMail->Port = 587;
    
    // Options spécifiques qui peuvent aider avec La Poste
    $laposteMail->SMTPOptions = [
        'ssl' => [
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        ]
    ];
    
    if ($laposteMail->SmtpConnect()) {
        echo "<div style='color:green; font-weight:bold;'>✅ Connexion réussie avec configuration spécifique</div>";
        $laposteMail->smtpClose();
    } else {
        echo "<div style='color:red; font-weight:bold;'>❌ Échec de connexion avec configuration spécifique</div>";
    }
} catch (Exception $e) {
    echo "<div style='color:red; font-weight:bold;'>❌ Erreur avec configuration spécifique: " . $e->getMessage() . "</div>";
}

echo "</div>";
?>