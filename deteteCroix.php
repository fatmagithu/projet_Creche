
<?php
// Connexion à la base de données
$host = "localhost";
$dbname = "babayfarm";
$username = "root";
$password = "root";

// Connexion à MySQL via PDO
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}

// Récupérer l'ID de l'inscription à supprimer
$data = json_decode(file_get_contents("php://input"), true);
if (isset($data['id'])) {
    $id = $data['id'];

    // Suppression de l'inscription
    $stmt = $pdo->prepare("DELETE FROM moiinscrit WHERE ID = :id");
    $stmt->bindParam(':id', $id);
    if ($stmt->execute()) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false]);
    }
}
?>
