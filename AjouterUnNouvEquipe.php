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
  <form action="#" method="POST">
    <div class="row g-3">
      <div class="col-md-6">
        <label for="nom" class="form-label">Nom et Prénom</label>
        <input type="text" class="form-control" id="nom" name="nom" required>
      </div>

      <div class="col-md-6">
        <label for="poste" class="form-label">Poste</label>
        <input type="text" class="form-control" id="poste" name="poste" required>
      </div>

      <div class="col-md-6">
        <label for="ville" class="form-label">Ville</label>
        <input type="text" class="form-control" id="ville" name="ville" required>
      </div>

      <div class="col-md-6">
        <label for="creche" class="form-label">Crèche</label>
        <select class="form-select" id="creche" name="creche" required>
          <option selected disabled>Choisir une crèche</option>
          <option>Les Calinous</option>
          <option>Toulouse</option>
          <option>1-2-3 Soleil</option>
          <option>Les Coquelicots</option>
          <option>Les 101 Bambins</option>
          <option>Les Coccinelles</option>
          <option>Les Capucines</option>
        </select>
      </div>

      <div class="col-md-6">
        <label for="contrat" class="form-label">Type de contrat</label>
        <input type="text" class="form-control" id="contrat" name="contrat" placeholder="Ex : CDI, CDD, Stage" required>
      </div>

      <div class="col-md-6">
        <label for="horaires" class="form-label">Horaires</label>
        <input type="text" class="form-control" id="horaires" name="horaires" placeholder="Ex : 8h-16h">
      </div>

      <div class="col-12">
        <label for="remarques" class="form-label">Remarque à faire</label>
        <textarea class="form-control" id="remarques" name="remarques" rows="3"></textarea>
      </div>

      <div class="col-12">
        <label class="form-label">Disponibilité</label>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="disponibilite" id="immediate" value="immediate" checked>
          <label class="form-check-label" for="immediate">Disponible immédiatement</label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="disponibilite" id="date" value="date">
          <label class="form-check-label" for="date">Disponible à partir de :</label>
        </div>
        <input type="date" class="form-control mt-2" id="dateDisponibilite" name="dateDisponibilite">
      </div>

      <div class="col-12">
        <button type="submit" class="btn-submit">Ajouter le Membre</button>
      </div>
    </div>
  </form>
</div>

<script>
  document.getElementById('dateDisponibilite').disabled = true;
  document.getElementById('immediate').addEventListener('change', () => {
    document.getElementById('dateDisponibilite').disabled = true;
  });
  document.getElementById('date').addEventListener('change', () => {
    document.getElementById('dateDisponibilite').disabled = false;
  });
</script>

</body>
</html>
