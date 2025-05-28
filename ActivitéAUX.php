<?php
// Connexion à la base de données
$conn = new mysqli("localhost", "root", "root", "groupe_bulles_deveil");
if ($conn->connect_error) {
  die("Connexion échouée : " . $conn->connect_error);
}

// Récupération de la crèche sélectionnée
$code_creche = isset($_GET['creche']) ? intval($_GET['creche']) : 0;

// Traitement de la suppression
if (isset($_GET['delete'])) {
  $delete_id = intval($_GET['delete']);
  $conn->query("DELETE FROM planning_activites WHERE id = $delete_id AND code_creche = $code_creche");
  header("Location: ActivitéAUX.php?creche=$code_creche");
  exit;
}

// Traitement du formulaire d'ajout
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $jour = $_POST['jour'];
  $heure_debut = $_POST['heure_debut'];
  $titre = $_POST['titre'];
  $details = $_POST['details'];
  $image_url = ""; // Gérer l'upload si besoin

  if (!empty($_FILES['image']['tmp_name'])) {
    $upload_dir = "uploads/";
    $filename = time() . "_" . basename($_FILES["image"]["name"]);
    move_uploaded_file($_FILES["image"]["tmp_name"], $upload_dir . $filename);
    $image_url = $upload_dir . $filename;
  }

  $stmt = $conn->prepare("INSERT INTO planning_activites (jour, heure_debut, titre, details, image_url, code_creche, date_creation) VALUES (?, ?, ?, ?, ?, ?, NOW())");
  $stmt->bind_param("sssssi", $jour, $heure_debut, $titre, $details, $image_url, $code_creche);
  $stmt->execute();
  $stmt->close();

  header("Location: ActivitéAUX.php?creche=$code_creche");
  exit;
}

// Récupération du nom de la crèche
$creche_nom = "Nom de la crèche";
$creche_result = $conn->query("SELECT nom_creche FROM creche WHERE code_creche = $code_creche");
if ($row = $creche_result->fetch_assoc()) {
  $creche_nom = $row['nom_creche'];
}

// Récupération des activités pour cette crèche
$planning = [];
$result = $conn->query("SELECT * FROM planning_activites WHERE code_creche = $code_creche ORDER BY jour, heure_debut");
while ($row = $result->fetch_assoc()) {
  $planning[] = $row;
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <title>Planning Activités</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <style>
    body {
      background: #fdf9f3;
      font-family: 'Inter', sans-serif;
    }
    .card { margin-bottom: 20px; }
    .delete-icon {
      color: red;
      float: right;
      cursor: pointer;
      text-decoration: none;
    }
    .delete-icon:hover { color: darkred; }
    
  </style>
</head>
<body class="container py-4">

  <a href="planningDASH.php" class="btn btn-secondary mb-4">← Retour</a>

  <h2 class="mb-4 text-center"><?= htmlspecialchars($creche_nom) ?></h2>

  <!-- Formulaire d'ajout -->
  <form method="POST" enctype="multipart/form-data" class="card p-4 mb-5 shadow-sm">
    <h5>Nouvelle activité</h5>
    <div class="row g-3">
      <div class="col-md-4">
        <label>Jour</label>
        <select name="jour" class="form-select" required>
          <option value="">Choisir...</option>
          <?php foreach (["Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi", "Dimanche"] as $j): ?>
            <option value="<?= $j ?>"><?= $j ?></option>
          <?php endforeach; ?>
        </select>
      </div>
      <div class="col-md-4">
        <label>Heure de début</label>
        <input type="time" name="heure_debut" class="form-control" required>
      </div>
      <div class="col-md-4">
        <label>Image (facultatif)</label>
        <input type="file" name="image" class="form-control" accept="image/*">
      </div>
      <div class="col-12">
        <label>Titre</label>
        <input type="text" name="titre" class="form-control" required>
      </div>
      <div class="col-12">
        <label>Détails</label>
        <textarea name="details" class="form-control" rows="2" required></textarea>
      </div>
      <div class="col-12 text-end">
        <button class="btn btn-primary mt-3" type="submit">➕ Ajouter l’activité</button>
      </div>
    </div>
  </form>

  <!-- Affichage du planning -->
  <?php
  $jours = ["Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi", "Dimanche"];
  foreach ($jours as $jour):
    $acts = array_filter($planning, fn($a) => $a['jour'] === $jour);
    if (count($acts) > 0):
  ?>
    <h4 class="mt-4"><?= $jour ?></h4>
    <?php foreach ($acts as $act): ?>
      <div class="card p-3 shadow-sm">
        <div>
          <strong><?= htmlspecialchars($act['heure_debut']) ?> – <?= htmlspecialchars($act['titre']) ?></strong>
          <a href="?creche=<?= $code_creche ?>&delete=<?= $act['id'] ?>" class="delete-icon" title="Supprimer" onclick="return confirm('Supprimer cette activité ?')">❌</a>
          <p class="mb-0"><?= nl2br(htmlspecialchars($act['details'])) ?></p>
          <?php if (!empty($act['image_url'])): ?>
            <img src="<?= $act['image_url'] ?>" class="img-fluid rounded mt-2" style="max-height: 120px;">
          <?php endif; ?>
        </div>
      </div>
    <?php endforeach; ?>
  <?php
    endif;
  endforeach;
  ?>

</body>
</html>
