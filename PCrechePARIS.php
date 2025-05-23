<?php
$host = "localhost";
$username = "root";
$password = "root";
$dbname = "groupe_bulles_deveil";

$conn = new mysqli($host, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Erreur de connexion : " . $conn->connect_error);
}

if (!isset($_GET['creche'])) {
  die("Aucune crèche sélectionnée.");
}

$code_creche = $_GET['creche'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if (isset($_FILES['new_image']) && $_FILES['new_image']['error'] === 0) {
    $uploadDir = 'uploads/';
    $fileName = basename($_FILES['new_image']['name']);
    $targetFile = $uploadDir . time() . '_' . $fileName;

    if (move_uploaded_file($_FILES['new_image']['tmp_name'], $targetFile)) {
      $stmtUpdate = $conn->prepare("UPDATE creche SET image_fond = ? WHERE code_creche = ?");
      $stmtUpdate->bind_param("si", $targetFile, $code_creche);
      $stmtUpdate->execute();
    }
  }

  if (isset($_POST['submit_changes'])) {
    $stmtUpdate = $conn->prepare("UPDATE creche SET nom_creche = ?, nom_responsable = ?, adresse = ?, ville = ?, statut = ?, nbre_total_places = ?, nbre_places_occupees = ?, date_creation = ?, num_siret = ?, num_agrement = ? WHERE code_creche = ?");
    $stmtUpdate->bind_param("sssssiisssi",
      $_POST['nom_creche'], $_POST['nom_responsable'], $_POST['adresse'], $_POST['ville'], $_POST['statut'],
      $_POST['nbre_total_places'], $_POST['nbre_places_occupees'],
      $_POST['date_creation'], $_POST['num_siret'], $_POST['num_agrement'], $code_creche);
    $stmtUpdate->execute();
  }
}

$stmt = $conn->prepare("SELECT * FROM creche WHERE code_creche = ?");
$stmt->bind_param("i", $code_creche);
$stmt->execute();
$result = $stmt->get_result();
$creche = $result->fetch_assoc();

if (!$creche) {
  die("Crèche introuvable.");
}

$stmtEnfants = $conn->prepare("SELECT id, prenom_enfant, nom_enfant, date_naissance_enfant, photo_enfant FROM inscription_enfant WHERE statut = 'Inscrit' AND structure = ?");
$stmtEnfants->bind_param("s", $creche['nom_creche']);
$stmtEnfants->execute();
$resultEnfants = $stmtEnfants->get_result();

$enfants = [];
while ($row = $resultEnfants->fetch_assoc()) {
  $nom_complet = trim($row['prenom_enfant'] . ' ' . $row['nom_enfant']);
  $date_naissance = new DateTime($row['date_naissance_enfant']);
  $today = new DateTime();
  $diff = $today->diff($date_naissance);
  $age = ($diff->y > 0 ? $diff->y . ' an' . ($diff->y > 1 ? 's' : '') : '') .
         ($diff->y > 0 && $diff->m > 0 ? ' ' : '') .
         ($diff->m > 0 ? $diff->m . ' mois' : '');
  $photo = !empty($row['photo_enfant']) ? $row['photo_enfant'] : 'moussa8.png';

  $enfants[] = [
    'id' => $row['id'],
    'nom' => $nom_complet,
    'age' => $age,
    'photo' => $photo
  ];
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title><?= htmlspecialchars($creche['nom_creche']) ?> · BabyFarm</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;800&display=swap" rel="stylesheet">
  <style>
    :root {
      --beige: #fdf9f3;
      --beige-light: #fffdf8;
      --brown: #b38760;
      --brown-dark: #9e6d4b;
      --highlight: #f4e2d8;
    }
    body {
      margin: 0;
      font-family: 'Inter', sans-serif;
      background: var(--beige);
      position: relative;
      min-height: 100vh;
    }
    .background-blur {
      position: fixed;
      inset: 0;
      background: url('<?= htmlspecialchars($creche['image_fond']) ?>') center center/cover no-repeat;
      filter: blur(10px) brightness(0.95);
      z-index: -1;
      opacity: 0.25;
    }
    .container-creche {
      max-width: 980px;
      margin: auto;
      background: rgba(255, 255, 255, 0.9);
      padding: 50px;
      border-radius: 36px;
      box-shadow: 0 16px 48px rgba(0, 0, 0, 0.08);
      backdrop-filter: blur(6px);
      margin-top: 60px;
    }
    h1 {
      font-size: 38px;
      color: var(--brown);
      font-weight: 800;
    }
    .info-block h3 {
      font-size: 20px;
      color: var(--brown-dark);
      margin-top: 30px;
    }
    .back-btn {
      display: inline-block;
      background: var(--brown);
      color: white;
      padding: 10px 18px;
      border-radius: 30px;
      text-decoration: none;
      font-weight: 600;
      margin: 20px;
    }
    .btn-babyfarm {
  background-color: #b38760; /* Marron clair */
  color: white;
  padding: 8px 18px;
  border-radius: 24px;
  font-weight: 600;
  font-size: 14px;
  text-decoration: none;
  border: none;
  transition: all 0.25s ease;
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.06);
}

.btn-babyfarm:hover {
  background-color: #9e6d4b; /* Marron foncé */
  color: white;
  box-shadow: 0 6px 16px rgba(0, 0, 0, 0.12);
}

  </style>
</head>
<body>
<div class="background-blur"></div>
<a class="back-btn" href="Ptest22.php">← Retour</a>
<div class="container-creche">
  <h1><?= htmlspecialchars($creche['nom_creche']) ?></h1>
  <form method="POST" enctype="multipart/form-data">
    <input type="hidden" name="submit_changes" value="1">
    <div class="row g-3">
      <div class="col-md-12">
        <label class="form-label">Nom de la crèche</label>
        <input type="text" class="form-control" name="nom_creche" value="<?= htmlspecialchars($creche['nom_creche']) ?>">
      </div>
      <div class="col-md-6">
        <label class="form-label">Statut</label>
        <input type="text" class="form-control" name="statut" value="<?= htmlspecialchars($creche['statut']) ?>">
      </div>
      <div class="col-md-6">
        <label class="form-label">Nom du responsable</label>
        <input type="text" class="form-control" name="nom_responsable" value="<?= htmlspecialchars($creche['nom_responsable']) ?>">
      </div>
      <div class="col-md-6">
        <label class="form-label">Adresse</label>
        <input type="text" class="form-control" name="adresse" value="<?= htmlspecialchars($creche['adresse']) ?>">
      </div>
      <div class="col-md-6">
        <label class="form-label">Ville</label>
        <input type="text" class="form-control" name="ville" value="<?= htmlspecialchars($creche['ville']) ?>">
      </div>
      <div class="col-md-4">
        <label class="form-label">Places totales</label>
        <input type="number" class="form-control" name="nbre_total_places" value="<?= htmlspecialchars($creche['nbre_total_places']) ?>">
      </div>
      <div class="col-md-4">
        <label class="form-label">Places occupées</label>
        <input type="number" class="form-control" name="nbre_places_occupees" value="<?= htmlspecialchars($creche['nbre_places_occupees']) ?>">
      </div>
      <div class="col-md-6">
        <label class="form-label">Date de création</label>
        <input type="date" class="form-control" name="date_creation" value="<?= htmlspecialchars($creche['date_creation']) ?>">
      </div>
      <div class="col-md-6">
        <label class="form-label">Numéro SIRET</label>
        <input type="text" class="form-control" name="num_siret" value="<?= htmlspecialchars($creche['num_siret']) ?>">
      </div>
      <div class="col-md-6">
        <label class="form-label">Numéro d'agrément</label>
        <input type="text" class="form-control" name="num_agrement" value="<?= htmlspecialchars($creche['num_agrement']) ?>">
      </div>
      <div class="col-md-6">
        <label class="form-label">Changer l'image de fond</label>
        <input type="file" class="form-control" name="new_image">
      </div>
      <div class="col-12">
        <button type="submit" class="btn btn-success">Enregistrer</button>
      </div>
    </div>
  </form>

  <div class="info-block">
    <h3>Enfants inscrits</h3>
    <input type="text" class="form-control mb-3" placeholder="Rechercher un prénom..." oninput="searchEnfants(this.value)">
    <div id="liste-enfants">
      <?php foreach ($enfants as $e): ?>
        <div class="enfant-card d-flex align-items-center justify-content-between flex-wrap gap-3 mb-3 p-3 bg-white rounded shadow-sm">
          <div class="d-flex align-items-center gap-3">
            <img src="<?= htmlspecialchars($e['photo']) ?>" alt="photo enfant" class="rounded-circle" style="width: 60px; height: 60px; object-fit: cover; border: 2px solid #b38760;">
            <div>
              <strong><?= htmlspecialchars($e['nom']) ?></strong><br>
              <small><?= htmlspecialchars($e['age']) ?></small>
            </div>
          </div>
          <a href="PcrechePageENFANT.php?id=<?= $e['id'] ?>" class="btn-babyfarm">Page de l'enfant</a>

        </div>
      <?php endforeach; ?>
    </div>
  </div>
  <div class="info-block">
    <h3>Planning</h3>
    <p><em>Section à venir...</em></p>
  </div>
</div>
<script>
function searchEnfants(val) {
  const value = val.toLowerCase();
  const cards = document.querySelectorAll('#liste-enfants .enfant-card');
  cards.forEach(card => {
    const name = card.querySelector('strong').textContent.toLowerCase();
    card.style.display = name.includes(value) ? 'flex' : 'none';
  });
}
</script>
</body>
</html>
