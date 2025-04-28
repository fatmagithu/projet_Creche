<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Qualité de la Sieste · BabyFarm</title>
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

    .choices {
      display: flex;
      justify-content: center;
      gap: 20px;
      margin: 20px 0;
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

    .input-group textarea, .input-group input[type="text"] {
      width: 100%;
      padding: 10px;
      margin-top: 10px;
      border-radius: 10px;
      border: 1px solid #ccc;
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

  <a href="PAuxDashboard.php" class="btn-retour"><i class="bi bi-arrow-left"></i> Retour</a>

  <h1>Qualité de la Sieste d'ALICE</h1>

  <div class="section">
    <div class="title-section">🌚 Comment a-t-il dormi ?</div>
    <div class="choices" id="sleepQuality">
      <div class="btn-choice" data-quality="Pas bien">😐</div>
      <div class="btn-choice" data-quality="Bien">🙂</div>
      <div class="btn-choice" data-quality="Très bien">😊</div>
    </div>

    <div class="title-section">🕛 Temps de la sieste</div>
    <div class="input-group">
      <input type="text" id="sleepTime" placeholder="Ex: 1h30, 45 minutes...">
    </div>

    <div class="title-section">💚 Etat au réveil</div>
    <div class="choices" id="wakeQuality">
      <div class="btn-choice" data-wake="Moyen">😐</div>
      <div class="btn-choice" data-wake="Bien">🙂</div>
      <div class="btn-choice" data-wake="Très bien">😊</div>
    </div>

    <button class="btn-submit" onclick="enregistrerSieste()">Enregistrer</button>
  </div>

  <script>
    let selectedSleepQuality = "";
    let selectedWakeQuality = "";

    document.querySelectorAll('#sleepQuality .btn-choice').forEach(btn => {
      btn.addEventListener('click', () => {
        document.querySelectorAll('#sleepQuality .btn-choice').forEach(b => b.classList.remove('active'));
        btn.classList.add('active');
        selectedSleepQuality = btn.getAttribute('data-quality');
      });
    });

    document.querySelectorAll('#wakeQuality .btn-choice').forEach(btn => {
      btn.addEventListener('click', () => {
        document.querySelectorAll('#wakeQuality .btn-choice').forEach(b => b.classList.remove('active'));
        btn.classList.add('active');
        selectedWakeQuality = btn.getAttribute('data-wake');
      });
    });

    function enregistrerSieste() {
      const temps = document.getElementById('sleepTime').value;

      if (!selectedSleepQuality) {
        alert("Merci de choisir comment l'enfant a dormi.");
        return;
      }

      if (!temps) {
        alert("Merci de renseigner la durée de la sieste.");
        return;
      }

      if (!selectedWakeQuality) {
        alert("Merci de choisir l'état au réveil.");
        return;
      }

      alert(`Sieste enregistrée :\n- Qualité de sommeil : ${selectedSleepQuality}\n- Durée : ${temps}\n- Etat au réveil : ${selectedWakeQuality}`);
    }
  </script>

</body>
</html>
