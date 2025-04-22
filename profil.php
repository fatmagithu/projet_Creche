
<?php
$host = "localhost";
$username = "root";
$password = "root";
$dbname = "babayfarm";// Mot de passe de la base de données

// Connexion à la base de données avec PDO
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Erreur de connexion : ' . $e->getMessage();
    exit;
}

// Requête pour récupérer les informations du parent1 (NomParent1, EmailParent1)
$query = "SELECT NomParent1, EmailParent1 FROM moiinscrit";
$stmt = $pdo->query($query);

// Vérifier s'il y a des résultats
if ($stmt->rowCount() > 0) {
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
} else {
    $rows = [];
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Affichage des parents inscrits</title>
    <style>
        /* Styles pour le tableau */
table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
    background-color: #f9f9f9;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
}

table, th, td {
    border: 1px solid #e0e0e0;
}

th, td {
    padding: 12px;
    text-align: left;
}

th {
    background-color: #4CAF50;
    color: white;
    font-weight: bold;
    text-transform: uppercase;
    border-radius: 8px 8px 0 0;
}

td {
    background-color: #ffffff;
    color: #333;
    border-radius: 8px;
}

tbody tr:nth-child(even) {
    background-color: #f2f2f2;
}

/* Styles pour les boutons */
.contact-btn {
    background-color: #e63946;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    font-weight: bold;
    text-decoration: none;
    cursor: pointer;
    transition: background-color 0.3s ease, transform 0.2s ease;
}

.contact-btn:hover {
    background-color: #d62828;
    transform: scale(1.05);
}

/* Styles pour la sélection de statut */
.status-select {
    padding: 8px 12px;
    border-radius: 5px;
    border: 1px solid #ccc;
    font-size: 14px;
    margin-right: 10px;
    background-color: #ffffff;
    color: #333;
    transition: border-color 0.3s ease;
}

.status-select:hover, .status-select:focus {
    border-color: #4CAF50;
    outline: none;
}

/* Conteneur de bouton et sélection */
.button-container {
    display: flex;
    align-items: center;
    justify-content: flex-start;
}

.button-container a {
    margin-left: 10px;
}

/* Styles pour le titre */
h2 {
    font-family: 'Arial', sans-serif;
    font-size: 24px;
    color: #333;
    margin-bottom: 20px;
    text-align: center;
}

/* Effet de survol pour les lignes du tableau */
tbody tr:hover {
    background-color: #e9f9e5;
    cursor: pointer;
}

/* Mise en forme générale du corps de la page */
body {
    font-family: 'Arial', sans-serif;
    background-color: #f4f4f9;
    margin: 0;
    padding: 20px;
    color: #333;
}

/* Style global du conteneur */
.container {
    margin: 20px;
    padding: 20px;
    background-color: #f9f9f9;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

/* Style de l'alerte */
.alert {
    padding: 15px;
    background-color: #f8d7da; /* Couleur de fond rose clair */
    color: #721c24; /* Couleur du texte (rouge foncé) */
    border: 1px solid #f5c6cb; /* Bordure rouge clair */
    border-radius: 5px;
    margin-bottom: 20px;
}

/* Titre de l'alerte */
.alert h3 {
    font-size: 1.5rem;
    margin-bottom: 10px;
    font-weight: bold;
    color: #721c24;
}

/* Paragraphe de l'alerte */
.alert p {
    font-size: 1rem;
    line-height: 1.6;
    margin: 0;
}

/* Ajouter un peu de padding et un effet de survol pour le formulaire */
form {
    padding: 20px;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05);
}

form input, form textarea {
    width: 100%;
    padding: 10px;
    margin: 5px 0;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 1rem;
}

form input[type="submit"] {
    background-color: #4CAF50;
    color: white;
    border: none;
    cursor: pointer;
    padding: 12px 20px;
    font-size: 1rem;
    border-radius: 5px;
    margin-top: 10px;
}

form input[type="submit"]:hover {
    background-color: #45a049;
}

       
    </style>
</head>
<body>


<div class="container">
        <!-- Texte explicatif -->
        <div class="alert alert-warning">
            <h3><strong>Important :</strong></h3>
            <p>
                Il est impératif que l'appel soit fait à 9h précises pour garantir la bonne organisation de la journée. 
                Assurez-vous également qu'une autre personne soit disponible pour surveiller les enfants durant cet appel. 
                Cela est une question de sécurité, et il est essentiel que les parents reçoivent un retour complet et fiable concernant la présence et le bien-être de leurs enfants pendant ce temps.
            </p>
        </div>
        <div id="timeDisplay"></div>

<style>
 #timeDisplay {
  font-family: 'Arial', sans-serif;
  font-size: 24px;
  color: #2c3e50;
  padding: 20px;
  background-color: #ecf0f1;
  border-radius: 10px;
  width: 350px;
  text-align: center;
  margin: 0 auto;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}


</style>


<script>
function updateTime() {
  const options = {
    timeZone: "Europe/Paris",
    weekday: "long",  // Jour de la semaine (ex : lundi)
    day: "numeric",   // Jour (ex : 12)
    month: "long",    // Mois (ex : décembre)
    year: "numeric"   // Année (ex : 2024)
  };

  const now = new Date();
  const parisDate = new Intl.DateTimeFormat("fr-FR", options).format(now);

  // Récupérer l'heure avec les bonnes options
  const hours = now.toLocaleTimeString("fr-FR", {
    timeZone: "Europe/Paris",
    hour: "2-digit",
    minute: "2-digit"
  }).replace(":", "H"); // Remplace ':' par 'H' pour le format souhaité

  // Affichage final : exemple "lundi. 12 décembre 2024 ; 18H45"
  document.getElementById("timeDisplay").textContent = `${parisDate} ; ${hours}`;
}

// Met à jour toutes les minutes
setInterval(updateTime, 1000);

// Initialisation
updateTime();


</script>

    <h2>Liste des parents inscrits</h2>
    <table>
        <thead>
            <tr>
                <th>Nom Parent 1</th>
                <th>Statut</th>
                <th>Contacter</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Affichage des données dans le tableau
            if (!empty($rows)) {
                foreach ($rows as $row) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['NomParent1']) . "</td>";
                    echo "<td>";
                    // Case de sélection pour "Présent" ou "Absent"
                    echo '<select class="status-select">
                            <option value="present">Présent</option>
                            <option value="absent">Absent</option>
                          </select>';
                    echo "</td>";
                    echo "<td>";
                    // Bouton "Contacter" avec mailto
                    echo '<div class="button-container">
                            <a href="mailto:' . htmlspecialchars($row['EmailParent1']) . '" class="contact-btn">Contacter</a>
                          </div>';
                    echo "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='3'>Aucun parent inscrit.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>
