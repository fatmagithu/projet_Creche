<?php
/**
 * Configuration générale de l'application
 */
return [
    // Environnement (development, production)
    'environment' => 'development',
    
    // URL de base de l'application
    'app_url' => 'http://localhost',
    
    // Configuration de la base de données - adaptée à votre structure
    'db' => [
        'servername' => "localhost",
        'username' => "root",
        'password' => "", // 🔥 Assurez-vous que le mot de passe MySQL est correct !
        'dbname' => "admin_db",
        'charset' => "utf8mb4"
    ],
    
    // Configuration du serveur de messagerie - adaptée à vos paramètres
    'mail' => [
        'host' => 'smtp.laposte.net',
        'username' => "coursmaths2015@laposte.net",
        'password' => "Ilahi2025++***", // 🔥 Remplacez par votre mot de passe réel
        'port' => 465,
        'secure' => 'ssl', // Configuration SSL pour La Poste
        'reply_to' => "coursmaths2015@laposte.net"
    ],
    
    // Paramètres de l'application - adaptés à votre structure
    'app' => [
        'code_expiry' => 30, // minutes
        'admin_page' => '/PcrecheADMIN.php'
    ],
    
    // Paramètres du code temporaire
    'temporary_code' => [
        'expiration_minutes' => 30,
        'length' => 6
    ]
];