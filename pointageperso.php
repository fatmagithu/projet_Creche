<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Fiche Enfant · BabyFarm</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: linear-gradient(135deg, #fdf9f3, #fffdf8);
      font-family: 'Inter', sans-serif;
      padding: 40px;
    }
    .dashboard {
      background: white;
      border-radius: 24px;
      padding: 30px;
      box-shadow: 0 12px 24px rgba(0,0,0,0.08);
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
    .section-title {
      font-weight: bold;
      font-size: 20px;
      margin-top: 20px;
      color: #9e6d4b;
    }
    .info-block {
      margin-bottom: 15px;
    }
    .info-block label {
      font-weight: 600;
      color: #555;
    }
    .info-block p {
      margin: 0;
      font-size: 16px;
      color: #333;
    }
    .stat-box {
      background: #f4e2d8;
      border-radius: 16px;
      padding: 20px;
      margin: 10px 0;
      text-align: center;
    }
    .stat-box h3 {
      font-size: 28px;
      color: #b38760;
      margin-bottom: 5px;
    }
    .stat-box span {
      font-size: 14px;
      color: #555;
    }
  </style>
</head>
<body>
  <div class="container">
    <a href="PointageGeneralAdmin.php" class="back-btn">&larr; Retour</a>

    <div class="dashboard">
      <h2 style="color: #b38760; font-weight: 800;">Fiche Enfant : Lina 1</h2>

      <div class="info-block">
        <label>Age :</label>
        <p>3 ans</p>
      </div>

      <div class="info-block">
        <label>Crèche :</label>
        <p>Crèche 2</p>
      </div>

      <div class="row">
        <div class="col-md-4">
          <div class="stat-box">
            <h3>32h</h3>
            <span>Heures cette semaine</span>
          </div>
        </div>
        <div class="col-md-4">
          <div class="stat-box">
            <h3>128h</h3>
            <span>Total ce mois</span>
          </div>
        </div>
        <div class="col-md-4">
          <div class="stat-box">
            <h3>762h</h3>
            <span>Total cumulé depuis inscription</span>
          </div>
        </div>
      </div>

      <div class="section-title">Derniers jours pointés :</div>
      <ul>
        <li>Lundi 13 mai : 6h</li>
        <li>Mardi 14 mai : 7h</li>
        <li>Mercredi 15 mai : 0h</li>
        <li>Jeudi 16 mai : 10h</li>
        <li>Vendredi 17 mai : 9h</li>
      </ul>
    </div>
  </div>
</body>
</html>
