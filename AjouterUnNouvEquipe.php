<?php
$message = "";

try {
  $pdo = new PDO('mysql:host=localhost;dbname=groupe_bulles_deveil;charset=utf8', 'root', 'root');
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare("INSERT INTO equipe (
      nom, prenom, email, telephone, date_naissance, adresse, ville, poste_occupe,
      role, date_recrutement, lieu_recrutement, type_contrat, nbre_heure_contrat,
      date_fin_contrat, observation, genre, salaire
    ) VALUES (
      :nom, :prenom, :email, :telephone, :date_naissance, :adresse, :ville, :poste_occupe,
      :role, :date_recrutement, :lieu_recrutement, :type_contrat, :nbre_heure_contrat,
      :date_fin_contrat, :observation, :genre, :salaire
    )");

    $stmt->execute([
      ':nom' => $_POST['nom'] ?? '',
      ':prenom' => $_POST['prenom'] ?? '',
      ':email' => $_POST['email'] ?? '',
      ':telephone' => $_POST['telephone'] ?? '',
      ':date_naissance' => $_POST['date_naissance'] ?? null,
      ':adresse' => $_POST['adresse'] ?? '',
      ':ville' => $_POST['ville'] ?? '',
      ':poste_occupe' => substr($_POST['poste'] ?? '', 0, 100),
      ':role' => substr($_POST['role'] ?? 'Éducateur', 0, 100),
      ':date_recrutement' => $_POST['date_recrutement'] ?? null,
      ':lieu_recrutement' => $_POST['creche'] ?? '',
      ':type_contrat' => $_POST['contrat'] ?? '',
      ':nbre_heure_contrat' => is_numeric($_POST['horaires']) ? intval($_POST['horaires']) : null,
      ':date_fin_contrat' => $_POST['date_fin_contrat'] ?? null,
      ':observation' => $_POST['remarques'] ?? '',
      ':genre' => $_POST['genre'] ?? '',
      ':salaire' => is_numeric($_POST['salaire']) ? floatval($_POST['salaire']) : 0.00
    ]);

    $message = "✅ Membre ajouté avec succès !";
  }
} catch (PDOException $e) {
  $message = "❌ Erreur : " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ajouter un membre - BabyFarm</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    body {
      background: url('moussa12.png') no-repeat center center/cover;
      font-family: 'Inter', sans-serif;
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      position: relative;
      overflow-x: hidden;
    }

    body::before {
      content: "";
      position: absolute;
      inset: 0;
      background-color: rgba(252, 248, 244, 0.6);
      backdrop-filter: blur(4px);
      z-index: 0;
    }

    .btn-back {
      position: absolute;
      top: 20px;
      left: 20px;
      background: white;
      border: none;
      border-radius: 50%;
      width: 50px;
      height: 50px;
      display: flex;
      align-items: center;
      justify-content: center;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
      font-size: 24px;
      color: #b38760;
      text-decoration: none;
      transition: background 0.3s;
      z-index: 2;
    }

    .btn-back:hover {
      background: #f4e2d8;
    }

    .form-container {
      background: rgba(255, 255, 255, 0.95);
      padding: 50px;
      border-radius: 30px;
      box-shadow: 0 10px 30px rgba(0,0,0,0.08);
      max-width: 800px;
      width: 100%;
      z-index: 2;
    }

    h1 {
      text-align: center;
      color: #b38760;
      font-weight: 800;
      font-size: 36px;
      margin-bottom: 30px;
    }

    .form-label {
      font-weight: 600;
      color: #6d4c41;
    }

    .form-control, .form-select {
      border-radius: 15px;
      padding: 12px 16px;
      border: 1px solid #ddd;
      transition: all 0.3s ease;
    }

    .form-control:focus, .form-select:focus {
      border-color: #b38760;
      box-shadow: 0 0 0 0.2rem rgba(179, 135, 96, 0.25);
    }

    .btn-submit {
      background: linear-gradient(90deg, #b38760, #9e6d4b);
      color: white;
      font-weight: bold;
      padding: 14px;
      border-radius: 40px;
      border: none;
      width: 100%;
      font-size: 18px;
      margin-top: 30px;
      transition: background 0.3s ease;
    }

    .btn-submit:hover {
      background: linear-gradient(90deg, #9e6d4b, #b38760);
    }

    .form-check-input:checked {
      background-color: #b38760;
      border-color: #b38760;
    }
  </style>
</head>
<body>
<a href="PEquipe1.php" class="btn-back">&#8592;</a>

<div class="form-container">
  <h1>Ajouter un Membre</h1>
  <?php if (!empty($message)): ?>
  <div class="alert alert-info text-center" style="font-weight:600; color: #9e6d4b;">
    <?= htmlspecialchars($message) ?>
  </div>
  <?php endif; ?>

  <form method="POST">
    <div class="row g-3">
      <div class="col-md-6">
        <label class="form-label">Nom</label>
        <input type="text" class="form-control" name="nom" required>
      </div>
      <div class="col-md-6">
        <label class="form-label">Prénom</label>
        <input type="text" class="form-control" name="prenom" required>
      </div>
      <div class="col-md-6">
        <label class="form-label">Email</label>
        <input type="email" class="form-control" name="email">
      </div>
      <div class="col-md-6">
        <label class="form-label">Téléphone</label>
        <input type="text" class="form-control" name="telephone">
      </div>
      <div class="col-md-6">
        <label class="form-label">Date de naissance</label>
        <input type="date" class="form-control" name="date_naissance">
      </div>
      <div class="col-md-6">
        <label class="form-label">Adresse</label>
        <input type="text" class="form-control" name="adresse">
      </div>
      <div class="col-md-6">
        <label class="form-label">Ville</label>
        <input type="text" class="form-control" name="ville">
      </div>
      <div class="col-md-6">
        <label class="form-label">Poste occupé</label>
        <input type="text" class="form-control" name="poste">
      </div>
      <div class="col-md-6">
        <label class="form-label">Rôle</label>
        <input type="text" class="form-control" name="role" value="Éducateur">
      </div>
      <div class="col-md-6">
        <label class="form-label">Date de recrutement</label>
        <input type="date" class="form-control" name="date_recrutement">
      </div>
      <div class="col-md-6">
        <label class="form-label">Lieu de recrutement</label>
        <input type="text" class="form-control" name="creche">
      </div>
      <div class="col-md-6">
        <label class="form-label">Type de contrat</label>
        <input type="text" class="form-control" name="contrat">
      </div>
      <div class="col-md-6">
        <label class="form-label">Nombre d'heures</label>
        <input type="number" class="form-control" name="horaires">
      </div>
      <div class="col-md-6">
        <label class="form-label">Date fin de contrat</label>
        <input type="date" class="form-control" name="date_fin_contrat">
      </div>
      <div class="col-md-6">
        <label class="form-label">Genre</label>
        <select class="form-select" name="genre">
          <option value="f">Femme</option>
          <option value="m">Homme</option>
        </select>
      </div>
      <div class="col-md-6">
        <label class="form-label">Salaire (€)</label>
        <input type="number" class="form-control" name="salaire" step="0.01">
      </div>
      <div class="col-12">
        <label class="form-label">Observations</label>
        <textarea class="form-control" name="remarques" rows="3"></textarea>
      </div>
      <div class="col-12">
        <button type="submit" class="btn-submit">Ajouter le Membre</button>
      </div>
    </div>
  </form>
</div>

</body>
</html>
