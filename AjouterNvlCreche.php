<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Ajouter une crèche</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
  <style>
    body {
      background: #fdf9f3;
      font-family: 'Inter', sans-serif;
      padding: 40px;
    }
    .container {
      max-width: 800px;
      margin: auto;
      background: white;
      border-radius: 20px;
      padding: 40px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
    }
    h2 {
      color: #9e6d4b;
      text-align: center;
      margin-bottom: 30px;
    }
    label {
      font-weight: 600;
      color: #9e6d4b;
    }
    .btn-submit {
      background-color: #b38760;
      color: white;
      border: none;
      padding: 12px 25px;
      border-radius: 30px;
      font-weight: 600;
      transition: 0.3s ease;
    }
    .btn-submit:hover {
      background-color: #9e6d4b;
    }
    .back-btn {
  background: #b38760;
  color: white;
  border: none;
  padding: 10px 20px;
  border-radius: 20px;
  font-weight: bold;
  text-decoration: none;
  margin-bottom: 20px;
  display: inline-block;
}
.back-btn:hover {
  background: #9e6d4b;
}

  </style>
</head>
<body>

<a href="ParametreAdmin.php" class="back-btn">&larr; Retour</a>
<?php
ob_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  try {
    $pdo = new PDO('mysql:host=localhost;dbname=groupe_bulles_deveil;charset=utf8', 'root', 'root');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $nom = $_POST['nom_creche'] ?? '';
    $date = $_POST['date_creation'] ?? '';
    $siret = $_POST['num_siret'] ?? '';
    $agrement = $_POST['num_agrement'] ?? '';
    $responsable = $_POST['nom_responsable'] ?? '';
    $adresse = $_POST['adresse'] ?? '';
    $ville = $_POST['ville'] ?? '';

    if (empty($nom) || empty($date) || empty($siret) || empty($agrement) || empty($responsable) || empty($adresse) || empty($ville)) {
      throw new Exception("Veuillez remplir tous les champs obligatoires.");
    }

    $image = "Creche1.png";
    $statut = "Active";

    $stmt = $pdo->prepare("INSERT INTO creche (nom_creche, date_creation, num_siret, num_agrement, nom_responsable, adresse, ville, image_fond, statut) VALUES (:nom, :date, :siret, :agrement, :responsable, :adresse, :ville, :image, :statut)");

    $stmt->execute([
      'nom' => $nom,
      'date' => $date,
      'siret' => $siret,
      'agrement' => $agrement,
      'responsable' => $responsable,
      'adresse' => $adresse,
      'ville' => $ville,
      'image' => $image,
      'statut' => $statut
    ]);

    header("Location: New1.php?nom=" . urlencode($nom));
    exit;

  } catch (Exception $e) {
    $error = $e->getMessage();
  }
}
?>

<div class="container">
  <h2>Créer une nouvelle crèche</h2>
  <?php if (!empty($error)): ?>
    <div class="alert alert-danger">❌ <?= htmlspecialchars($error) ?></div>
  <?php endif; ?>


  <form method="POST">
    <div class="row">
      <div class="col-md-6">
        <label for="nom_creche">Nom de la crèche</label>
        <input type="text" class="form-control" name="nom_creche" required>
      </div>
      <div class="col-md-6">
        <label for="date_creation">Date de création</label>
        <input type="date" class="form-control" name="date_creation" required>
      </div>
      <div class="col-md-6">
        <label for="num_siret">Numéro SIRET</label>
        <input type="text" class="form-control" name="num_siret" required>
      </div>
      <div class="col-md-6">
        <label for="num_agrement">Numéro d’agrément</label>
        <input type="text" class="form-control" name="num_agrement" required>
      </div>
      <div class="col-md-6">
        <label for="nom_responsable">Responsable</label>
        <input type="text" class="form-control" name="nom_responsable" required>
      </div>
      <div class="col-md-6">
        <label for="adresse">Adresse</label>
        <input type="text" class="form-control" name="adresse" required>
      </div>
      <div class="col-md-6">
        <label for="ville">Ville</label>
        <input type="text" class="form-control" name="ville" required>
      </div>
    </div>
    <div class="text-center mt-4">
      <button type="submit" class="btn-submit">Ajouter la crèche</button>
    </div>
  </form>
</div>
</body>
</html>
