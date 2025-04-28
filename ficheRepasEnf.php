<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Repas Enfants · BabyFarm</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
  <style>
    body {
      margin: 0;
      font-family: 'Inter', sans-serif;
      background: linear-gradient(145deg, #f9f4ef, #f1e5d6);
      min-height: 100vh;
      padding: 20px;
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
      text-align: center;
      margin-bottom: 30px;
      font-weight: bold;
      color: #b38760;
      font-size: 28px;
      margin-top: 80px;
    }

    .section {
      background: rgba(255,255,255,0.5);
      backdrop-filter: blur(10px);
      border-radius: 20px;
      padding: 30px;
      max-width: 700px;
      margin: auto;
      box-shadow: 0 8px 24px rgba(0,0,0,0.08);
      margin-bottom: 40px;
    }

    .btn-choice {
      width: 100px;
      height: 100px;
      border-radius: 50%;
      background: white;
      border: 2px solid #b38760;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 32px;
      margin: 10px;
      transition: 0.3s;
      cursor: pointer;
    }

    .btn-choice:hover, .btn-choice.active {
      background: #b38760;
      color: white;
      transform: scale(1.1);
    }

    .choices {
      display: flex;
      justify-content: center;
      flex-wrap: wrap;
      gap: 20px;
      margin-bottom: 30px;
    }

    textarea {
      width: 100%;
      border-radius: 10px;
      border: 1px solid #ddd;
      padding: 10px;
      min-height: 100px;
      resize: none;
    }

    .btn-submit {
      background: #b38760;
      color: white;
      border: none;
      margin-top: 20px;
      padding: 12px 30px;
      border-radius: 30px;
      font-weight: bold;
      width: 100%;
    }

    .btn-submit:hover {
      background: #9e6d4b;
    }

    .title-section {
      font-size: 20px;
      font-weight: 600;
      color: #9e6d4b;
      margin-bottom: 20px;
      text-align: center;
    }

    .input-group {
      margin-top: 15px;
    }
  </style>
</head>
<body>

  <button class="btn-retour" onclick="window.location.href='PAuxDashboard.php'">
    <i class="bi bi-arrow-left"></i> Retour
  </button>

  <h1>Remplir le Repas de l'Enfant</h1>

  <div class="section">
    <div class="title-section">🍽️ Comment a-t-il mangé ?</div>
    <div class="choices" id="mealChoices">
      <div class="btn-choice" data-meal="Pas bien"><span>😞</span></div>
      <div class="btn-choice" data-meal="Bien"><span>😊</span></div>
      <div class="btn-choice" data-meal="Très bien"><span>😋</span></div>
    </div>

    <div class="title-section">🍼 Biberon (si bébé)</div>
    <div class="choices" id="biberonChoices">
      <div class="btn-choice" data-biberon="Peu"><span>🍼</span></div>
      <div class="btn-choice" data-biberon="Moyen"><span>🍼🍼</span></div>
      <div class="btn-choice" data-biberon="Beaucoup"><span>🍼🍼🍼</span></div>
    </div>

    <div class="input-group">
      <input type="number" id="quantiteBiberon" class="form-control" placeholder="Quantité biberon en ml (optionnel)">
    </div>

    <div class="title-section">📝 Commentaire pour les parents</div>
    <textarea id="commentaire" placeholder="Ecrivez ici..."></textarea>

    <button class="btn-submit" onclick="enregistrer()">Enregistrer</button>
  </div>

  <script>
    let selectedMeal = "";
    let selectedBiberon = "";

    document.querySelectorAll('#mealChoices .btn-choice').forEach(btn => {
      btn.addEventListener('click', () => {
        document.querySelectorAll('#mealChoices .btn-choice').forEach(b => b.classList.remove('active'));
        btn.classList.add('active');
        selectedMeal = btn.getAttribute('data-meal');
      });
    });

    document.querySelectorAll('#biberonChoices .btn-choice').forEach(btn => {
      btn.addEventListener('click', () => {
        document.querySelectorAll('#biberonChoices .btn-choice').forEach(b => b.classList.remove('active'));
        btn.classList.add('active');
        selectedBiberon = btn.getAttribute('data-biberon');
      });
    });

    function enregistrer() {
      const quantite = document.getElementById('quantiteBiberon').value;
      const commentaire = document.getElementById('commentaire').value.trim();

      if (!selectedMeal) {
        alert("Merci de sélectionner comment l'enfant a mangé !");
        return;
      }

      alert(`Repas enregistré :\n
      - Repas : ${selectedMeal}
      - Biberon : ${selectedBiberon || "Non concerné"}
      - Quantité : ${quantite ? quantite + " ml" : "Non renseigné"}
      - Commentaire : ${commentaire || "Aucun"}`);
      
      // Ici tu pourras envoyer les données vers ta base de données avec une requête AJAX ou PHP.
    }
  </script>

</body>
</html>
