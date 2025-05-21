<?php
try {
    $pdo = new PDO('mysql:host=localhost;dbname=groupe_bulles_deveil;charset=utf8', 'root', 'root');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $id = isset($_GET['id']) ? intval($_GET['id']) : 0;

    // Mettre à jour la photo si soumission
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['photo'])) {
        $photo = $_FILES['photo'];
        if ($photo['error'] === 0) {
            $targetDir = 'uploads/';
            if (!is_dir($targetDir)) mkdir($targetDir);
            $extension = pathinfo($photo['name'], PATHINFO_EXTENSION);
            $fileName = 'enfant_' . $id . '.' . $extension;
            $targetPath = $targetDir . $fileName;

            if (move_uploaded_file($photo['tmp_name'], $targetPath)) {
                $stmtUpdate = $pdo->prepare("UPDATE inscription_enfant SET photo_enfant = ? WHERE id = ?");
                $stmtUpdate->execute([$targetPath, $id]);
            }
        }
    }

    $stmt = $pdo->prepare("SELECT * FROM inscription_enfant WHERE id = ?");
    $stmt->execute([$id]);
    $enfant = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$enfant) {
        die("Aucun enfant trouvé.");
    }

    $stmt_med = $pdo->prepare("SELECT * FROM medical_enfant WHERE id_enfant = ?");
    $stmt_med->execute([$id]);
    $medical = $stmt_med->fetch(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}
$pdo = new PDO('mysql:host=localhost;dbname=groupe_bulles_deveil;charset=utf8', 'root', 'root');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Exemple pour afficher une crèche spécifique
$code_creche = $_GET['id']; // Ex: page appelée via "Pcreche.php?id=2"
$stmt = $pdo->prepare("SELECT * FROM creche WHERE code_creche = ?");
$stmt->execute([$code_creche]);
$creche = $stmt->fetch(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Fiche Enfant - BabyFarm</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Playwrite+GB+S&family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
  <style>
    :root {
      --beige: #fdf9f3;
      --beige-light: #fffdf8;
      --brown: #b38760;
      --brown-dark: #9e6d4b;
    }
    body {
      margin: 0;
      background: linear-gradient(135deg, var(--beige-light), var(--beige));
      font-family: 'Inter', sans-serif;
      display: flex;
      align-items: center;
      justify-content: center;
      min-height: 100vh;
      padding: 40px;
    }
    .container-fiche {
      width: 100%;
      max-width: 1100px;
      background: #fff;
      border-radius: 24px;
      box-shadow: 0 10px 30px rgba(0,0,0,0.08);
      padding: 50px;
      animation: fadeIn 0.7s ease-in-out;
    }
    .enfant-header {
      display: flex;
      align-items: center;
      gap: 30px;
      margin-bottom: 30px;
    }
    .photo-wrapper {
      position: relative;
    }
    .photo-wrapper:hover label {
      display: flex;
    }
    .enfant-photo {
      width: 120px;
      height: 120px;
      object-fit: cover;
      border-radius: 50%;
      border: 4px solid var(--brown);
    }
    label[for='photoUpload'] {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0,0,0,0.4);
      border-radius: 50%;
      color: white;
      font-size: 14px;
      justify-content: center;
      align-items: center;
      display: none;
      cursor: pointer;
    }
    #photoUpload {
      display: none;
    }
    .enfant-name {
      font-family: 'Playwrite GB S', cursive;
      font-size: 36px;
      font-weight: 800;
      color: var(--brown);
    }
    .section-title {
      font-weight: 700;
      color: var(--brown);
      font-size: 22px;
      margin-top: 30px;
      border-bottom: 2px solid #e7dcd1;
      padding-bottom: 6px;
    }
    .info-block {
      margin-top: 15px;
      font-size: 16px;
    }
    .badge-info {
      background-color: #f1e6de;
      color: var(--brown-dark);
      font-weight: 600;
      border-radius: 20px;
      padding: 4px 14px;
      font-size: 14px;
    }
    .progress {
      height: 16px;
      background-color: #e9ecef;
      border-radius: 10px;
      overflow: hidden;
    }
    .progress-bar {
      background-color: var(--brown);
    }
    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(30px); }
      to { opacity: 1; transform: translateY(0); }
    }
  </style>
</head>
<body>
  <div class="container-fiche">

    <!-- 🧒 SECTION ENFANT -->
    <div class="section-title">🧒 Informations enfant</div>
    <div class="enfant-header">
      <div class="photo-wrapper">
        <img src="<?= htmlspecialchars($enfant['photo_enfant'] ?: 'moussa8.png') ?>" alt="Photo enfant" class="enfant-photo">
        <form method="POST" enctype="multipart/form-data">
          <label for="photoUpload">📸 Changer</label>
          <input type="file" id="photoUpload" name="photo" accept="image/*" onchange="this.form.submit()">
        </form>
      </div>
      <div>
        <div class="enfant-name"><?= htmlspecialchars(($enfant['prenom_enfant'] ?? '') . ' ' . ($enfant['nom_enfant'] ?? '')) ?></div>
        <div class="info-block">Date de naissance : <strong><?= htmlspecialchars($enfant['date_naissance_enfant'] ?? 'Non renseignée') ?></strong></div>
        <div class="info-block">Lieu de naissance : <strong><?= htmlspecialchars($enfant['lieu_naissance_enfant'] ?? 'Non renseigné') ?></strong></div>
        <div class="info-block">Genre : <strong><?= htmlspecialchars($enfant['genre_enfant'] ?? 'Non renseigné') ?></strong></div>
        <div class="info-block">Date d’enregistrement : <strong><?= htmlspecialchars($enfant['date_enregistrement'] ?? 'Non renseignée') ?></strong></div>
        <div class="info-block">Structure(s) choisie(s) : <span class="badge-info"><?= htmlspecialchars($enfant['structure'] ?? 'Non renseignée') ?></span></div>
      </div>
    </div>

    <!-- Le reste de ta fiche reste inchangé -->

  </div>
  <h2><?= $creche['nom_creche'] ?></h2>
<p><?= $creche['adresse'] ?>, <?= $creche['ville'] ?></p>
<p>Responsable : <?= $creche['nom_responsable'] ?></p>

</body>
</html>
