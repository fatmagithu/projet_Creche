<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <title>Créer une nouvelle crèche · BabyFarm</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet"/>
  <style>
    :root {
      --beige: #fdf9f3;
      --brown: #b38760;
      --brown-dark: #9e6d4b;
    }

    body {
      margin: 0;
      font-family: 'Inter', sans-serif;
      background: url('moussa12.png') center center / cover no-repeat fixed;
      position: relative;
    }

    body::before {
      content: "";
      position: fixed;
      inset: 0;
      background-color: rgba(253, 249, 243, 0.9);
      backdrop-filter: blur(7px);
      z-index: -1;
    }

    .container {
      max-width: 800px;
      margin: 50px auto;
      background: rgba(255, 255, 255, 0.5);
      border-radius: 20px;
      padding: 40px;
      backdrop-filter: blur(10px);
      box-shadow: 0 8px 30px rgba(0, 0, 0, 0.05);
    }

    h2 {
      color: var(--brown-dark);
      text-align: center;
      margin-bottom: 30px;
      font-weight: 600;
    }

    label {
      font-weight: 600;
      color: var(--brown-dark);
    }

    .form-control {
      border-radius: 12px;
      border: 1px solid #ddd;
      padding: 10px 15px;
      margin-bottom: 20px;
    }

    .btn-submit {
      background-color: var(--brown);
      color: white;
      border: none;
      padding: 12px 25px;
      border-radius: 30px;
      font-weight: 600;
      transition: 0.3s ease;
    }

    .btn-submit:hover {
      background-color: var(--brown-dark);
    }

    .btn-retour {
      background: white;
      border: 2px solid var(--brown-dark);
      color: var(--brown-dark);
      padding: 8px 16px;
      border-radius: 30px;
      font-weight: bold;
      cursor: pointer;
      transition: 0.3s ease;
      position: absolute;
      top: 20px;
      left: 20px;
    }

    .btn-retour:hover {
      background: var(--brown-dark);
      color: white;
    }
  </style>
</head>
<body>

  <!-- Bouton Retour -->
  <button class="btn-retour" onclick="window.location.href='Ptest22.php'">
    <i class="bi bi-arrow-left"></i> retour
  </button>

  <div class="container">
    <h2>Créer une nouvelle crèche</h2>
    <form action="ajouter_creche.php" method="POST">
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
        <div class="col-md-6">
          <label for="nbre_total_places">Nombre total de places</label>
          <input type="number" class="form-control" name="nbre_total_places" required>
        </div>
        <div class="col-md-6">
          <label for="nbre_places_occupees">Places occupées</label>
          <input type="number" class="form-control" name="nbre_places_occupees" required>
        </div>
        <div class="col-md-6">
          <label for="nbre_places_libres">Places libres</label>
          <input type="number" class="form-control" name="nbre_places_libres" required>
        </div>
      </div>

      <div class="text-center mt-4">
        <button type="submit" class="btn-submit">Ajouter la crèche</button>
      </div>
    </form>
  </div>

</body>
</html>
