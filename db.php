<?php
$config = require 'config.php';
$dsn = "mysql:host=" . $config['db']['servername'] . ";dbname=" . $config['db']['dbname'] . ";charset=" . $config['db']['charset'];

try {
    $pdo = new PDO($dsn, $config['db']['username'], $config['db']['password'], [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
} catch (Exception $e) {
    die("❌ Erreur de connexion à la base de données : " . $e->getMessage());
}
?>
