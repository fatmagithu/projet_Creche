<?php
/**
 * Connexion à la base de données
 */

// Récupération de la configuration
$config = require 'config.php';

try {
    // Construction du DSN en utilisant votre structure de configuration
    $dsn = "mysql:host=" . $config['db']['servername'] . ";dbname=" . $config['db']['dbname'] . ";charset=" . $config['db']['charset'];
    
    // Options PDO pour une meilleure gestion des erreurs
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ];
    
    // Création de l'objet PDO
    $pdo = new PDO($dsn, $config['db']['username'], $config['db']['password'], $options);
    
} catch (PDOException $e) {
    // En production, ne pas afficher le message d'erreur détaillé
    if ($config['environment'] === 'production') {
        die("Une erreur est survenue lors de la connexion à la base de données.");
    } else {
        die("❌ Erreur de connexion à la base de données : " . $e->getMessage());
    }
}

// Structure de la table requise:
/*
CREATE TABLE IF NOT EXISTS `temporary_codes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `code` varchar(50) NOT NULL,
  `expiration` datetime NOT NULL,
  `email_sent` tinyint(1) NOT NULL DEFAULT 0,
  `sent_time` datetime DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
*/