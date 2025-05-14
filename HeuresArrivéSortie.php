<?php
session_start();
require_once 'connexion.php';

date_default_timezone_set('Europe/Paris');

// Simulation d'une éducatrice si pas déjà connecté
if (!isset($_SESSION['id_utilisateur'])) {
  $_SESSION['id_utilisateur'] = 4;
  $_SESSION['role'] = 'Éducateur';
  $_SESSION['id_creche'] = 2;
}

$id_enfant = isset($_GET['id']) ? (int)$_GET['id'] : 0;
if (!$id_enfant) {
  die("Enfant non spécifié.");
}

// Récupération des données de l'enfant
$stmt = $pdo->prepare("SELECT prenom_enfant, nom_enfant FROM inscription_enfant WHERE id = ?");
$stmt->execute([$id_enfant]);
$enfant = $stmt->fetch();

if (!$enfant) {
  die("Enfant introuvable.");
}

$prenom = htmlspecialchars($enfant['prenom_enfant']);
$nom = htmlspecialchars($enfant['nom_enfant']);

// Vérifier si l'enfant a déjà été pointé aujourd'hui
$date = date('Y-m-d');
$check = $pdo->prepare("SELECT heure_arrivee, heure_depart FROM pointage_journalier WHERE id_enfant = ? AND date_pointage = ?");
$check->execute([$id_enfant, $date]);
$rowToday = $check->fetch();

// Traitement arrivée ou départ
if (isset($_GET['action']) && in_array($_GET['action'], ['arrivee', 'depart'])) {
  $champ = $_GET['action'] === 'arrivee' ? 'heure_arrivee' : 'heure_depart';
  $heure = date('H:i');
  $id_utilisateur = $_SESSION['id_utilisateur'];
  $id_creche = $_SESSION['id_creche'];

  $check = $pdo->prepare("SELECT id_pointage FROM pointage_journalier WHERE id_enfant = ? AND date_pointage = ?");
  $check->execute([$id_enfant, $date]);

  if ($row = $check->fetch()) {
    $update = $pdo->prepare("UPDATE pointage_journalier SET $champ = :heure WHERE id_pointage = :id");
    $update->execute(['heure' => $heure, 'id' => $row['id_pointage']]);
  } else {
    $insert = $pdo->prepare("INSERT INTO pointage_journalier (id_enfant, id_utilisateur, id_creche, date_pointage, $champ, nom_enfant, prenom_enfant) VALUES (:id_enfant, :id_utilisateur, :id_creche, :date, :heure, :nom, :prenom)");
    $insert->execute([
      'id_enfant' => $id_enfant,
      'id_utilisateur' => $id_utilisateur,
      'id_creche' => $id_creche,
      'date' => $date,
      'heure' => $heure,
      'nom' => $nom,
      'prenom' => $prenom
    ]);
  }
  $_SESSION['toast'] = "Heure de " . ($_GET['action'] === 'arrivee' ? "l'arrivée" : "départ") . " enregistrée à $heure";
  header("Location: HeuresArriveSortie.php?id=$id_enfant");
  exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['commentaire'])) {
  $commentaire = trim($_POST['commentaire']);
  if ($commentaire !== '') {
    $check = $pdo->prepare("SELECT id_pointage FROM pointage_journalier WHERE id_enfant = ? AND date_pointage = ?");
    $check->execute([$id_enfant, $date]);

    if ($row = $check->fetch()) {
      $update = $pdo->prepare("UPDATE pointage_journalier SET commentaire = :commentaire WHERE id_pointage = :id");
      $update->execute(['commentaire' => $commentaire, 'id' => $row['id_pointage']]);
    } else {
      $insert = $pdo->prepare("INSERT INTO pointage_journalier (id_enfant, id_utilisateur, id_creche, date_pointage, commentaire, nom_enfant, prenom_enfant) VALUES (:id_enfant, :id_utilisateur, :id_creche, :date, :commentaire, :nom, :prenom)");
      $insert->execute([
        'id_enfant' => $id_enfant,
        'id_utilisateur' => $_SESSION['id_utilisateur'],
        'id_creche' => $_SESSION['id_creche'],
        'date' => $date,
        'commentaire' => $commentaire,
        'nom' => $nom,
        'prenom' => $prenom
      ]);
    }
    $_SESSION['toast'] = "Commentaire enregistré.";
    header("Location: HeuresArriveSortie.php?id=$id_enfant");
    exit;
  } else {
    $_SESSION['toast'] = "Aucun commentaire à enregistrer.";
    header("Location: HeuresArriveSortie.php?id=$id_enfant");
    exit;
  }
}
?>






<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Pointage Enfant - Arrivée</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Playwrite+GB+S&family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
  <style>/* Styles conservés tel que fournis par la développeuse front-end */</style>
</head>
<style>
    body {
      font-family: 'Inter', sans-serif;
      background: linear-gradient(to bottom right, #fffaf5, #f0e8dd);
      min-height: 100vh;
      margin: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 60px 20px 30px; /* espace pour le bouton retour */
      position: relative;
    }

    .btn-retour {
      position: absolute;
      top: 20px;
      left: 20px;
      background: white;
      border: 2px solid #b38760;
      color: #b38760;
      padding: 8px 14px;
      border-radius: 30px;
      font-weight: bold;
      cursor: pointer;
      transition: 0.3s;
      font-size: 14px;
    }

    .btn-retour:hover {
      background: #b38760;
      color: white;
    }
    .container-pointage {
      background: #ffffff;
      border-radius: 32px;
      padding: 40px 30px;
      box-shadow: 0 10px 50px rgba(0, 0, 0, 0.08);
      max-width: 500px;
      width: 100%;
      text-align: center;
    }

    .child-photo {
      width: 100px;
      height: 100px;
      border-radius: 50%;
      object-fit: cover;
      margin-bottom: 15px;
      border: 3px solid #f3e2d3;
    }

    h1 {
      font-family: 'Playwrite GB S', cursive;
      font-size: 30px;
      color: #b38760;
      margin-bottom: 10px;
    }

    .child-name {
      font-family: 'Playwrite GB S', sans-serif;
      font-size: 22px;
      color: #4a4a4a;
      margin-bottom: 30px;
    }

    .btn-time {
      background: #eaf7f0;
      color: #148041;
      border: none;
      font-weight: 600;
      border-radius: 24px;
      padding: 14px 24px;
      font-size: 15px;
      margin: 10px;
      width: 200px;
      transition: background 0.2s ease, transform 0.2s ease;
    }

    .btn-time:hover {
      background: #d3efdd;
      transform: scale(1.05);
    }

    .commentaire {
      margin-top: 25px;
    }

    .form-control {
      border-radius: 16px;
      box-shadow: 0 2px 6px rgba(0,0,0,0.05);
    }

    .btn-valider {
      background-color: #b38760;
      color: white;
      border-radius: 20px;
      padding: 10px 24px;
      margin-top: 20px;
      font-weight: 600;
      border: none;
    }

    .btn-valider:hover {
      background-color: #a07550;
    }

    @media (max-width: 600px) {
      .btn-time {
        width: 100%;
        font-size: 14px;
      }
    }
  </style>
<body>

  <button class="btn-retour" onclick="window.location.href='pointageAUX.php'">
    <i class="bi bi-arrow-left"></i> Retour
  </button>

  <div class="container-pointage">
  <img src="<?php echo file_exists("img/photos/" . strtolower($prenom) . ".jpg") ? "img/photos/" . strtolower($prenom) . ".jpg" : "moussa13.png"; ?>" class="child-photo" alt="<?php echo $prenom; ?>">
  <h1>Pointage</h1>
  <div class="child-name"><?php echo "$prenom $nom"; ?></div>

  <div class="pointage-infos" style="margin-top: 10px; font-size: 14px; color: green; font-weight: bold;">
    <?php if (!empty($rowToday['heure_arrivee'])): ?>
      <div>✔ Arrivée à <?php echo $rowToday['heure_arrivee']; ?></div>
    <?php endif; ?>
    <?php if (!empty($rowToday['heure_depart'])): ?>
      <div>✔ Départ à <?php echo $rowToday['heure_depart']; ?></div>
    <?php endif; ?>
  </div>

  <button class="btn btn-time" onclick="location.href='HeuresArriveSortie.php?id=<?php echo $id_enfant; ?>&action=arrivee'">08:30 - Arrivée</button>
  <button class="btn btn-time" onclick="location.href='HeuresArriveSortie.php?id=<?php echo $id_enfant; ?>&action=depart'">17:30 - Départ</button>

  <div class="commentaire">
    <form method="POST">
      <label for="commentaire" class="form-label mt-3">Ajouter un commentaire</label>
      <textarea id="commentaire" name="commentaire" class="form-control" rows="3" placeholder="Ex : Papa a prévenu du retard..."></textarea>
      <button type="submit" class="btn btn-valider">Valider</button>
    </form>
  </div>
</div>

<?php if (!empty($_SESSION['toast'])): ?>
  <div id="toast" style="
    display: none;
    position: fixed;
    bottom: 30px;
    left: 50%;
    transform: translateX(-50%);
    background: #b38760;
    color: #fff;
    padding: 10px 16px;
    border-radius: 20px;
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    font-weight: 600;
    z-index: 9999;
    opacity: 0;
    transition: opacity .3s;
  "></div>
  <script>
    document.addEventListener('DOMContentLoaded', () => {
      const t = document.getElementById('toast');
      t.textContent = <?php echo json_encode($_SESSION['toast']); ?>;
      t.style.display = 'block';
      setTimeout(() => t.style.opacity = 1, 50);
      setTimeout(() => t.style.opacity = 0, 3500);
      setTimeout(() => t.style.display = 'none', 4000);
    });
  </script>
  <?php unset($_SESSION['toast']); ?>
<?php endif; ?>


  <?php if (isset($_SESSION['message'])): ?>
  <script>alert('<?php echo $_SESSION['message']; ?>');</script>
  <?php unset($_SESSION['message']); ?>
<?php endif; ?>

</body>
</html>

