<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ajouter un Nouveau Parent · BabyFarm</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
  <style>
    :root {
      --beige: #fdf9f3;
      --brown: #b38760;
      --brown-dark: #9e6d4b;
    }
    body {
      margin: 0;
      font-family: 'Inter', sans-serif;
      background: url('moussa12.png') center/cover no-repeat fixed;
      position: relative;
      min-height: 100vh;
    }
    body::before {
      content: "";
      position: fixed;
      inset: 0;
      background-color: rgba(253, 249, 243, 0.94);
      backdrop-filter: blur(14px);
      z-index: -1;
    }
    .btn-retour {
      position: absolute;
      top: 30px;
      left: 30px;
      background-color: var(--brown);
      color: white;
      padding: 10px 18px;
      border-radius: 30px;
      font-weight: 600;
      text-decoration: none;
      transition: 0.3s;
      z-index: 1000;
    }
    .btn-retour:hover {
      background-color: var(--brown-dark);
    }
    .top-search {
      max-width: 600px;
      margin: 100px auto 20px;
      padding: 0 20px;
    }
    .top-search input {
      border-radius: 30px;
      padding: 12px 20px;
      font-size: 16px;
      border: 2px solid var(--brown-dark);
      outline: none;
    }
    .container {
      max-width: 800px;
      background: rgba(255, 255, 255, 0.6);
      border-radius: 24px;
      padding: 40px;
      box-shadow: 0 10px 30px rgba(0,0,0,0.08);
      backdrop-filter: blur(10px);
    }
    h2 {
      text-align: center;
      color: var(--brown-dark);
      margin-bottom: 30px;
      font-weight: 700;
    }
    label {
      font-weight: 600;
      color: var(--brown-dark);
    }
    .form-control {
      border-radius: 14px;
      padding: 12px 15px;
      margin-bottom: 20px;
    }
    .btn-submit {
      background-color: var(--brown);
      color: white;
      padding: 12px 25px;
      border: none;
      border-radius: 30px;
      font-weight: 600;
      transition: 0.3s;
    }
    .btn-submit:hover {
      background-color: var(--brown-dark);
    }
  </style>
</head>
<body>
  <a href="javascript:history.back()" class="btn-retour">← Retour</a>

  <div class="top-search text-center">
    <input type="text" id="searchEnfant" class="form-control" placeholder="🔍 Rechercher un enfant, crèche, parent...">
  </div>

  <div class="container">
    <h2>Ajouter ou Modifier un Parent</h2>
    <form action="traitement_parent.php" method="POST">
      <div class="mb-3">
        <label for="enfant">Sélectionnez un enfant</label>
        <select class="form-control" id="enfant" name="enfant" required>
          <option value="">-- Sélectionnez un enfant --</option>
          <option value="1" data-nom="yanis mendy" data-creche="crèche arc-en-ciel" data-parent="mendy">Yanis Mendy - Crèche Arc-en-Ciel</option>
          <option value="2" data-nom="léna dupont" data-creche="crèche arc-en-ciel" data-parent="dupont">Léna Dupont - Crèche Arc-en-Ciel</option>
          <option value="3" data-nom="lina ba" data-creche="les petits soleils" data-parent="ba">Lina Ba - Les Petits Soleils</option>
          <option value="4" data-nom="noa diouf" data-creche="maison des bambins" data-parent="diouf">Noa Diouf - Maison des Bambins</option>
        </select>
      </div>

      <div class="mb-3">
        <label for="nom">Nom du parent</label>
        <input type="text" class="form-control" id="nom" name="nom" required>
      </div>
      <div class="mb-3">
        <label for="prenom">Prénom</label>
        <input type="text" class="form-control" id="prenom" name="prenom" required>
      </div>
      <div class="mb-3">
        <label for="email">Adresse email</label>
        <input type="email" class="form-control" id="email" name="email" required>
      </div>
      <div class="mb-3">
        <label for="telephone">Téléphone</label>
        <input type="tel" class="form-control" id="telephone" name="telephone" required>
      </div>
      <div class="mb-3">
        <label for="adresse">Adresse postale</label>
        <input type="text" class="form-control" id="adresse" name="adresse">
      </div>

      <div class="mb-3">
        <label for="lien">Lien avec l'enfant</label>
        <select class="form-control" id="lien" name="lien">
          <option value="Mère">Mère</option>
          <option value="Père">Père</option>
          <option value="Tuteur légal">Tuteur légal</option>
          <option value="Autre">Autre</option>
        </select>
      </div>

      <button type="submit" class="btn btn-submit w-100">Sauvegarder le parent</button>
    </form>
  </div>

  <script>
    document.getElementById("searchEnfant").addEventListener("input", function() {
      const search = this.value.toLowerCase();
      const options = document.querySelectorAll("#enfant option");

      options.forEach(option => {
        const nom = option.dataset.nom || "";
        const creche = option.dataset.creche || "";
        const parent = option.dataset.parent || "";
        const match = nom.includes(search) || creche.includes(search) || parent.includes(search);
        option.style.display = match || option.value === "" ? "block" : "none";
      });
    });
  </script>
</body>
</html>
