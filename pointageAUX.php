<?php
session_start();
require_once 'authSimu.php';      // Simule la session éducateur
require_once 'connexion.php';    // Connexion PDO

// Récupération du nom de crèche depuis la session
$nom_creche = $_SESSION['nom_creche']; // exemple : "Mantes à l'Ô"

// Requête pour récupérer les enfants avec info de pointage du jour
$stmt = $pdo->prepare("
    SELECT e.*, pj.heure_arrivee, pj.heure_depart
    FROM inscription_enfant e
    LEFT JOIN pointage_journalier pj
      ON pj.id_enfant = e.id
     AND pj.date_pointage = CURDATE()
    WHERE FIND_IN_SET(:creche, e.structure) > 0
      AND e.Statut = 'Inscrit'
    ORDER BY e.nom_enfant
");

$stmt->execute(['creche' => $nom_creche]);
$enfants = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Pointage Enfants · BabyFarm</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Playwrite+GB+S&family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: 'Inter', sans-serif;
      background: linear-gradient(145deg, #f9f4ef, #f1e5d6);
      min-height: 100vh;
      display: flex;
      flex-direction: column;
      align-items: center;
      padding: 50px 20px 20px 20px;
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

    h1 {
      font-family: 'Playwrite GB S', sans-serif;
      font-size: 36px;
      margin-bottom: 40px;
      color: #b38760;
      text-shadow: 1px 1px 1px #ffffff;
    }

    .grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(140px, 1fr));
      gap: 40px;
      width: 100%;
      max-width: 1000px;
    }

    .child-card {
      background: linear-gradient(to bottom right, #fffdfc, #f9f3eb);
      border-radius: 28px;
      padding: 16px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.06);
      display: flex;
      flex-direction: column;
      align-items: center;
      transition: all 0.3s ease;
      cursor: pointer;
      position: relative;
      border: 1.5px solid #e5ddd3;
    }

    .child-card:hover {
      transform: translateY(-8px) scale(1.02);
      box-shadow: 0 16px 40px rgba(0, 0, 0, 0.1);
    }

    .child-card img {
      width: 78px;
      height: 78px;
      border-radius: 50%;
      object-fit: cover;
      border: 3px solid #f3ebe1;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
      margin-bottom: 10px;
      background: #fff;
    }

    .child-name {
      font-size: 15px;
      font-weight: 600;
      color: #4a4a4a;
      text-align: center;
      font-family: 'Playwrite GB S', sans-serif;
    }

    /* NOUVELLES pastilles séparées pour arrivée/départ */
    .pastille-arrivee,
.pastille-depart {
  width: 12px;
  height: 12px;
  border-radius: 50%;
  position: absolute;
  box-shadow: 0 0 0 2px white;
  background-color: #e58e8e; /* ROUGE PAR DÉFAUT */
}

.pastille-arrivee {
  top: 10px;
  right: 28px;
}

.pastille-depart {
  top: 10px;
  right: 10px;
}

.child-card.arrived .pastille-arrivee {
  background-color: #65c18c; /* devient VERT si arrivée enregistrée */
}

.child-card.left .pastille-depart {
  background-color: #65c18c; /* devient VERT si départ enregistré */
}


    @media (max-width: 600px) {
      h1 {
        font-size: 26px;
      }
      .child-card img {
        width: 64px;
        height: 64px;
      }
    }
  </style>
</head>
<body>

  <!-- Bouton Retour -->
  <button class="btn-retour" onclick="window.location.href='PAuxDashboard.php'">
    <i class="bi bi-arrow-left"></i> Retour
  </button>

  <h1>Pointage des Enfants</h1>

  <div class="grid">
<?php foreach ($enfants as $enfant): ?>
  <?php
    $arrivee = !empty($enfant['heure_arrivee']);
    $depart = !empty($enfant['heure_depart']);

    $classePoint = '';
    if ($arrivee) $classePoint .= ' arrived';
    if ($depart) $classePoint .= ' left';

    $prenom = htmlspecialchars($enfant['prenom_enfant']);
    $id = $enfant['id'];
    $photo_path = "img/photos/" . strtolower($prenom) . ".jpg";
    if (!file_exists($photo_path)) {
      $photo_path = "moussa13.png"; // Fallback image
    }
  ?>

  <a href="HeuresArriveSortie.php?id=<?php echo $id; ?>" class="child-card<?php echo $classePoint; ?> text-decoration-none">
    <span class="pastille-arrivee"></span>
    <span class="pastille-depart"></span>
    <img src="<?php echo $photo_path; ?>" alt="<?php echo $prenom; ?>" class="child-photo">
    <div class="child-name"><?php echo $prenom; ?></div>
  </a>
<?php endforeach; ?>
</div>

</body>
</html>
