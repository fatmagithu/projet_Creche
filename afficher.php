<?php
// Connexion à la base de données
$host = "localhost";
$dbname = "babayfarm";
$username = "root";
$password = "root";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur : " . $e->getMessage());
}

// Requête pour récupérer les parents
$sql = "SELECT * FROM accompagnateurs";
$stmt = $pdo->query($sql);

echo "<h2>Liste des Parents</h2>";
echo "<table border='1'>";
echo "<tr><th>ID</th><th>Nom du Parent</th><th>Téléphone</th></tr>";

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo "<tr>";
    echo "<td>" . htmlspecialchars($row['id']) . "</td>";
    echo "<td>" . htmlspecialchars($row['nom_parent1']) . "</td>";
    echo "<td>" . htmlspecialchars($row['telephone1']) . "</td>";
    echo "</tr>";
}

echo "</table>";
?>
