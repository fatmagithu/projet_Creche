<?php
// Connexion à la base de données
$servername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "admin_db";

$conn = new mysqli($servername, $dbUsername, $dbPassword, $dbName);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Erreur de connexion à la base de données : " . $conn->connect_error);
}

// Récupérer l'email de l'administrateur depuis le formulaire
$email = $_POST['email'] ?? null;

// Valider l'email
if (!$email || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("Adresse e-mail invalide.");
}

// Générer un code unique
$code = bin2hex(random_bytes(4)); // Exemple : 8 caractères alphanumériques
$expiration = date("Y-m-d H:i:s", strtotime("+30 minutes")); // Code valide pendant 30 minutes

// Insérer le code et l'email dans la base de données
$sql = "INSERT INTO temporary_codes (email, code, expiration) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $email, $code, $expiration);

if (!$stmt->execute()) {
    die("Erreur lors de l'insertion du code : " . $stmt->error);
}

$stmt->close();
$conn->close();

// Afficher le code pour debug
echo "Code généré : $code";
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Génération et Envoi du Code</title>
    <style>
        /* Styles similaires à ceux fournis */
    </style>
</head>
<body>
    <div class="container">
        <h1>Génération du Code</h1>
        <div class="output">
            <strong>Code généré :</strong> <?php echo $code; ?>
        </div>

        <form action="genererCode.php" method="POST">
            <label for="email">Adresse e-mail de l'administrateur :</label>
            <input type="email" id="email" name="email" placeholder="Entrez l'e-mail" required>
            <input type="hidden" name="code" value="<?php echo $code; ?>">
            <button type="submit">Envoyer par e-mail</button>
        </form>
    </div>
</body>
</html>
