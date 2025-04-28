<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Rapport Bobos · BabyFarm</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <style>
    body {
      margin: 0;
      padding: 60px 20px 20px;
      font-family: 'Inter', sans-serif;
      background: linear-gradient(145deg, #f9f4ef, #f1e5d6);
      min-height: 100vh;
      position: relative;
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    .btn-retour {
      position: absolute;
      top: 20px;
      left: 20px;
      background: white;
      border: 2px solid #b38760;
      color: #b38760;
      padding: 8px 16px;
      border-radius: 30px;
      font-weight: bold;
      font-size: 14px;
      text-decoration: none;
      display: flex;
      align-items: center;
      gap: 8px;
    }

    .btn-retour:hover {
      background: #b38760;
      color: white;
    }

    h1 {
      font-family: 'Playwrite GB S', sans-serif;
      font-size: 32px;
      color: #b38760;
      margin-bottom: 30px;
      text-align: center;
    }

    .section {
      background: rgba(255,255,255,0.7);
      backdrop-filter: blur(8px);
      padding: 30px;
      border-radius: 20px;
      max-width: 600px;
      width: 100%;
      box-shadow: 0 8px 24px rgba(0,0,0,0.08);
    }

    .input-group textarea, .input-group input[type="text"] {
      width: 100%;
      padding: 10px;
      margin-top: 10px;
      border-radius: 10px;
      border: 1px solid #ccc;
    }

    .choices {
      display: flex;
      justify-content: center;
      gap: 20px;
      margin: 20px 0;
      flex-wrap: wrap;
    }

    .btn-choice {
      width: 80px;
      height: 80px;
      border-radius: 50%;
      background: white;
      border: 2px solid #b38760;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 28px;
      transition: 0.3s;
      cursor: pointer;
    }

    .btn-choice:hover, .btn-choice.active {
      background: #b38760;
      color: white;
      transform: scale(1.1);
    }

    .btn-submit {
      margin-top: 20px;
      background: #b38760;
      color: white;
      border: none;
      padding: 12px;
      border-radius: 30px;
      width: 100%;
      font-weight: bold;
    }

    .btn-submit:hover {
      background: #9e6d4b;
    }

    .title-section {
      font-size: 20px;
      font-weight: 600;
      color: #9e6d4b;
      margin-top: 20px;
      text-align: center;
    }
  </style>
</head>
<body>

  <a href="Pbobo.php" class="btn-retour"><i class="bi bi-arrow-left"></i> Retour</a>

  <h1>Rapport Bobos</h1>

  <div class="section">
    <div class="title-section">🤕 Partie du corps touchée</div>
    <div class="input-group">
      <input type="text" id="bodyPart" placeholder="Ex : genou, bras, front...">
    </div>

    <div class="title-section">📃 Description du bobo</div>
    <div class="input-group">
      <textarea id="description" rows="3" placeholder="Ex : petite bosse, égratignure..."></textarea>
    </div>

    <div class="title-section">🥼 Niveau de douleur</div>
    <div class="choices" id="painLevel">
      <div class="btn-choice" data-pain="Peu">🙂</div>
      <div class="btn-choice" data-pain="Moyen">😐</div>
      <div class="btn-choice" data-pain="Beaucoup">😭</div>
    </div>

    <div class="title-section">😭 Réaction aux pleurs</div>
    <div class="choices" id="cryReaction">
      <div class="btn-choice" data-cry="Peu">🙂</div>
      <div class="btn-choice" data-cry="Moyen">😐</div>
      <div class="btn-choice" data-cry="Beaucoup">😭</div>
    </div>

    <button class="btn-submit" onclick="enregistrerBobo()">Enregistrer</button>
  </div>

  <script>
    let selectedPainLevel = "";
    let selectedCryReaction = "";

    document.querySelectorAll('#painLevel .btn-choice').forEach(btn => {
      btn.addEventListener('click', () => {
        document.querySelectorAll('#painLevel .btn-choice').forEach(b => b.classList.remove('active'));
        btn.classList.add('active');
        selectedPainLevel = btn.getAttribute('data-pain');
      });
    });

    document.querySelectorAll('#cryReaction .btn-choice').forEach(btn => {
      btn.addEventListener('click', () => {
        document.querySelectorAll('#cryReaction .btn-choice').forEach(b => b.classList.remove('active'));
        btn.classList.add('active');
        selectedCryReaction = btn.getAttribute('data-cry');
      });
    });

    function enregistrerBobo() {
      const bodyPart = document.getElementById('bodyPart').value;
      const description = document.getElementById('description').value;

      if (!bodyPart || !description || !selectedPainLevel || !selectedCryReaction) {
        alert("Merci de remplir tous les champs et de sélectionner les niveaux de douleur et de pleurs.");
        return;
      }

      alert(`Rapport bobo :\n- Partie du corps : ${bodyPart}\n- Description : ${description}\n- Douleur : ${selectedPainLevel}\n- Pleurs : ${selectedCryReaction}`);
    }
  </script>

</body>
</html>
