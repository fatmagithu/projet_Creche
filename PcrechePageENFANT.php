<?php
try {
    $pdo = new PDO('mysql:host=localhost;dbname=groupe_bulles_deveil;charset=utf8', 'root', 'root');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $id = isset($_GET['id']) ? intval($_GET['id']) : 0;

    $stmt = $pdo->prepare("SELECT * FROM inscription_enfant WHERE id = ?");
    $stmt->execute([$id]);
    $enfant = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$enfant) {
        die("Aucun enfant trouvé.");
    }

    $stmt_med = $pdo->prepare("SELECT * FROM medical_enfant WHERE id_enfant = ?");
    $stmt_med->execute([$id]);
    $medical = $stmt_med->fetch(PDO::FETCH_ASSOC);

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['photo']) && $_FILES['photo']['error'] === 0) {
        $uploadDir = 'uploads/';
        if (!file_exists($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        $ext = pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);
        $fileName = 'enfant_' . $id . '.' . $ext;
        $filePath = $uploadDir . $fileName;

        if (move_uploaded_file($_FILES['photo']['tmp_name'], $filePath)) {
            $stmt_update = $pdo->prepare("UPDATE inscription_enfant SET photo_enfant = ? WHERE id = ?");
            $stmt_update->execute([$filePath, $id]);
            $enfant['photo_enfant'] = $filePath; // Pour affichage immédiat
        }
    }
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}
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
    .enfant-photo {
      width: 120px;
      height: 120px;
      object-fit: cover;
      border-radius: 50%;
      border: 4px solid var(--brown);
    }
    .enfant-name {
      font-family: 'Playwrite GB S', cursive;
      font-size: 36px;
      font-weight: 800;
      color: var(--brown);
    }
    .photo-wrapper {
      position: relative;
    }
    .photo-wrapper:hover label {
      display: flex;
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

    <div class="section-title">👨‍👩‍👧 Parent 1</div>
    <div class="info-block">Type : <strong><?= htmlspecialchars($enfant['type_parent1'] ?? '') ?></strong></div>
    <div class="info-block">Nom : <strong><?= htmlspecialchars(($enfant['prenom_parent1'] ?? '') . ' ' . ($enfant['nom_parent1'] ?? '')) ?></strong></div>
    <div class="info-block">Email : <strong><?= htmlspecialchars($enfant['email_parent1'] ?? '') ?></strong></div>
    <div class="info-block">Téléphone fixe : <strong><?= htmlspecialchars($enfant['tel_fixe_parent1'] ?? '') ?></strong></div>
    <div class="info-block">Téléphone portable : <strong><?= htmlspecialchars($enfant['tel_portable_parent1'] ?? '') ?></strong></div>
    <div class="info-block">Adresse : <strong><?= htmlspecialchars($enfant['adresse_parent1'] ?? '') ?></strong></div>
    <div class="info-block">Code postal / Ville / Pays : <strong><?= htmlspecialchars($enfant['code_postal_parent1'] ?? '') ?> <?= htmlspecialchars($enfant['ville_parent1'] ?? '') ?> (<?= htmlspecialchars($enfant['pays_parent1'] ?? '') ?>)</strong></div>
    <div class="info-block">Revenu annuel : <strong><?= htmlspecialchars($enfant['revenu_annuel_parent1'] ?? '') ?> €</strong></div>
    <div class="info-block">Profession : <strong><?= htmlspecialchars($enfant['profession_parent1'] ?? '') ?></strong></div>
    <div class="info-block">Entreprise : <strong><?= htmlspecialchars($enfant['entreprise_parent1'] ?? '') ?></strong></div>
    <div class="info-block">Contrat d'entreprise : <strong><?= htmlspecialchars($enfant['contrat_entreprise_parent1'] ?? '') ?></strong></div>
    <div class="info-block">Allocataire CAF : <strong><?= htmlspecialchars($enfant['allocataire_parent1'] ?? '') ?></strong></div>
    <div class="info-block">Enfants à charge : <strong><?= htmlspecialchars($enfant['enfants_charge_parent1'] ?? '0') ?></strong></div>
    <div class="info-block">Enfants en situation de handicap : <strong><?= htmlspecialchars($enfant['enfants_handicap_parent1'] ?? '0') ?></strong></div>

    <!-- 👨‍👩‍👧 SECTION PARENT 2 -->
    <div class="section-title">👨‍👩‍👧 Parent 2</div>
    <div class="info-block">Type : <strong><?= htmlspecialchars($enfant['type_parent2'] ?? '') ?></strong></div>
    <div class="info-block">Nom : <strong><?= htmlspecialchars(($enfant['prenom_parent2'] ?? '') . ' ' . ($enfant['nom_parent2'] ?? '')) ?></strong></div>
    <div class="info-block">Email : <strong><?= htmlspecialchars($enfant['email_parent2'] ?? '') ?></strong></div>
    <div class="info-block">Téléphone fixe : <strong><?= htmlspecialchars($enfant['tel_fixe_parent2'] ?? '') ?></strong></div>
    <div class="info-block">Téléphone portable : <strong><?= htmlspecialchars($enfant['tel_portable_parent2'] ?? '') ?></strong></div>
    <div class="info-block">Adresse : <strong><?= htmlspecialchars($enfant['adresse_parent2'] ?? '') ?></strong></div>
    <div class="info-block">Code postal / Ville / Pays : <strong><?= htmlspecialchars($enfant['code_postal_parent2'] ?? '') ?> <?= htmlspecialchars($enfant['ville_parent2'] ?? '') ?> (<?= htmlspecialchars($enfant['pays_parent2'] ?? '') ?>)</strong></div>
    <div class="info-block">Revenu annuel : <strong><?= htmlspecialchars($enfant['revenu_annuel_parent2'] ?? '') ?> €</strong></div>
    <div class="info-block">Profession : <strong><?= htmlspecialchars($enfant['profession_parent2'] ?? '') ?></strong></div>
    <div class="info-block">Entreprise : <strong><?= htmlspecialchars($enfant['entreprise_parent2'] ?? '') ?></strong></div>
    <div class="info-block">Contrat d'entreprise : <strong><?= htmlspecialchars($enfant['contrat_entreprise_parent2'] ?? '') ?></strong></div>
    <div class="info-block">Allocataire CAF : <strong><?= htmlspecialchars($enfant['allocataire_parent2'] ?? '') ?></strong></div>
    <div class="info-block">Enfants à charge : <strong><?= htmlspecialchars($enfant['enfants_charge_parent2'] ?? '0') ?></strong></div>
    <div class="info-block">Enfants en situation de handicap : <strong><?= htmlspecialchars($enfant['enfants_handicap_parent2'] ?? '0') ?></strong></div>

    <div class="section-title">📝 Informations complémentaires</div>
    <div class="info-block"><?= nl2br(htmlspecialchars($enfant['infos_complementaires'] ?? 'Non renseignées')) ?></div>

    <div class="section-title">🍎 Santé & Allergies</div>
    <div class="info-block">Allergies : <strong><?= htmlspecialchars($medical['allergies'] ?? 'Non renseigné') ?></strong></div>
    <div class="info-block">Maladies chroniques : <strong><?= htmlspecialchars($medical['maladies'] ?? 'Non renseigné') ?></strong></div>
    <div class="info-block">Traitement régulier : <strong><?= htmlspecialchars($medical['traitements'] ?? 'Non renseigné') ?></strong></div>

    <div class="section-title">📊 Contrat & Suivi des heures</div>
    <div class="info-block">Heures prévues ce mois : <strong>160h</strong></div>
    <div class="info-block">Heures effectuées : <strong>120h</strong></div>
    <div class="progress mt-2 mb-2">
      <div class="progress-bar" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
    </div>
    <div class="info-block text-muted">75% du contrat effectué</div>
  </div>
</body>
</html>
