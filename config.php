<?php
return [
    'db' => [
        'servername' => "localhost",
        'username' => "root",
        'password' => "", // 🔥 Assurez-vous que votre mot de passe MySQL est correct !
        'dbname' => "admin_db",
        'charset' => "utf8mb4"
    ],
    'mail' => [
        'host' => 'smtp.laposte.net',
        'port' => 587,
        'username' => "coursmaths2015@laposte.net",
        'password' => "Ilahi2025++***",
        'encryption' => 'tls'
    ],
    'app' => [
        'code_expiry' => 30, // minutes
        'admin_page' => '/PcrecheADMIN.php'
    ]
];
?>
