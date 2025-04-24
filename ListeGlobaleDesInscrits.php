<?php
// Connexion à la base de données
$host = "localhost";
$username = "root";
$password = "root";
$dbname = "groupe_bulles_deveil";
$conn = new mysqli($host, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Échec de la connexion à la base de données : " . $conn->connect_error);
}

// Requête SQL pour récupérer tous les enfants inscrits groupés par crèche
$sql = "SELECT 
            nom_enfant, 
            prenom_enfant, 
            date_naissance_enfant, 
            lieu_naissance_enfant,
            debut_contrat,
            structure_enfant
        FROM inscription_enfant 
        WHERE Statut = 'Inscrit'
        ORDER BY structure_enfant, nom_enfant";

$result = $conn->query($sql);

// Fonction pour calculer l'âge en années et mois
function calculerAge($date_naissance) {
    $naissance = new DateTime($date_naissance);
    $aujourdhui = new DateTime();
    $interval = $naissance->diff($aujourdhui);
    return $interval->y . ' ans et ' . $interval->m . ' mois';
}

// Fonction sécurisée pour afficher les champs
function safePrint($val) {
    return htmlspecialchars($val ?? '');
}

// Organisation des enfants par crèche
$groupes = [];
while ($row = $result->fetch_assoc()) {
    $creche = $row['structure_enfant'] ?? 'Crèche non précisée';
    $groupes[$creche][] = $row;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste globale des enfants inscrits</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Playwrite+GB+S&family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
    
    :root {
        --beige: #fdf9f3;
  --beige-light: #fffdf8;
  --brown: #b38760;
  --brown-dark: #9e6d4b;
  --highlight: #f4e2d8; /* c'est bien là */
}

         h2 {
      font-size: 40px;
      font-weight: 800;
      color: var(--brown);
      font-family: 'Playwrite GB S', sans-serif;
      margin-bottom: 16px;
      animation: fadeInDown 1s ease;
    }
    .sidebar {
  width: 80px;
  background: white;
  border-top-right-radius: 40px;
  box-shadow: 4px 0 20px rgba(0,0,0,0.05);
  display: flex;
  flex-direction: column;
  align-items: center;
  transition: all 0.3s ease;
  overflow: hidden;
  position: relative;
  z-index: 10;
}

.sidebar:hover {
  width: 220px;
}
.sidebar:hover .user-bubble {
  opacity: 1;
  visibility: visible;
  height: auto;
}
body {
  margin: 0;
  background: linear-gradient(135deg, var(--beige-light), var(--beige));
  font-family: 'Inter', sans-serif;
  min-height: 100vh;
  padding: 20px;
}

h2 {
  font-size: 48px;
  font-weight: 800;
  color: #b17b4a; /* Marron doux comme sur l’image */
  font-family: 'Playwrite GB S', 'Segoe UI', sans-serif;
  margin: 40px auto 20px;
  text-align: center;
  animation: fadeInDown 1s ease;
 
}

h3 {
  margin-top: 40px;
  color: var(--brown);
  font-size: 28px;
  font-weight: 600;
  text-align: center;
}
table {
  border-collapse: collapse;
  width: 90%;
  margin: 10px auto 30px;
  background-color: white;
  box-shadow: 0 2px 10px rgba(0,0,0,0.1);
  border: 2px solid var(--brown); /* ✅ Contour plus foncé */
  border-radius: 8px;
  overflow: hidden;
}
button {
  padding: 10px 20px;
  margin: 5px;
  font-size: 16px;
  background-color: #b17b4a;
  color: white;
  border: none;
  border-radius: 8px;
  cursor: pointer;
  transition: background-color 0.3s ease;
}
button:hover {
  background-color: #9c653d;
}
th, td {
  padding: 12px 15px;
  border-bottom: 1px solid #ddd;
  text-align: left;
}

th {
  background-color: var(--beige);
  color: #333;
  font-weight: bold;
}

tr:hover {
  background-color: #f9f9f9;
}

    </style>
</head>
<div>
    <h2>Liste globale des enfants inscrits</h2>
    <div style="text-align: center; margin-bottom: 20px;">
    <button onclick="exportToExcel()">Exporter en Excel</button>
    <button onclick="exportToPDF()">Exporter en PDF</button>
</div>


    <?php foreach ($groupes as $creche => $enfants): ?>
        <h3><?= safePrint($creche) ?></h3>
        <div class="sidebar"></div>
        <table>
            <tr>
                <th>Prénom</th>
                <th>Nom</th>
                <th>Âge</th>
                <th>Lieu de naissance</th>
                <th>Début contrat</th>
            </tr>
            <?php foreach ($enfants as $enfant): ?>
                <tr>
                    <td><?= safePrint($enfant['prenom_enfant']) ?></td>
                    <td><?= safePrint($enfant['nom_enfant']) ?></td>
                    <td><?= calculerAge($enfant['date_naissance_enfant']) ?></td>
                    <td><?= htmlspecialchars(!empty($enfant['lieu_naissance_enfant']) ? $enfant['lieu_naissance_enfant'] : 'Non renseigné') ?></td>
                    <td><?= safePrint($enfant['debut_contrat']) ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
            </div>
        </body>
    <?php endforeach; ?>


    <!-- Librairies -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>

<script>
function exportToExcel() {
    const tables = document.querySelectorAll("table");
    const titles = document.querySelectorAll("h3"); // Chaque <h3> contient le nom de la crèche
    const wb = XLSX.utils.book_new();

    tables.forEach((table, i) => {
        let crecheName = titles[i]?.innerText || `Creche_${i + 1}`;
        crecheName = crecheName.substring(0, 31); // Excel limite les noms de feuille à 31 caractères

        const ws = XLSX.utils.table_to_sheet(table);
        XLSX.utils.book_append_sheet(wb, ws, crecheName);
    });

    XLSX.writeFile(wb, "enfants_par_creche.xlsx");
}


function exportToPDF() {
    const element = document.body;
    html2canvas(element).then(canvas => {
        const imgData = canvas.toDataURL("image/png");
        const pdf = new jspdf.jsPDF('p', 'mm', 'a4');
        const imgProps = pdf.getImageProperties(imgData);
        const pdfWidth = pdf.internal.pageSize.getWidth();
        const pdfHeight = (imgProps.height * pdfWidth) / imgProps.width;

        pdf.addImage(imgData, 'PNG', 0, 0, pdfWidth, pdfHeight);
        pdf.save("enfants_creche.pdf");
    });
}
</script>

</body>
</html>
