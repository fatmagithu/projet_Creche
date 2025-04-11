<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tableau de bord Auxiliaire · BabyFarm</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Playwrite+GB+S&family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    body {
      margin: 0;
      background: linear-gradient(135deg, #fcf8f4, #f5e8da);
      font-family: 'Inter', sans-serif;
      min-height: 100vh;
      display: flex;
    }

    .sidebar {
      width: 150px;
      background-color: #ffffff;
      box-shadow: 4px 0 12px rgba(0, 0, 0, 0.05);
      display: flex;
      flex-direction: column;
      align-items: center;
      padding: 20px 0;
    }

    .sidebar img.logo {
      width: 100px;
      margin-bottom: 40px;
    }

    .sidebar .icon {
      width: 60px;
      height: 64px;
      margin: 20px 0;
      object-fit: contain;
      cursor: pointer;
      transition: transform 0.3s, filter 0.3s;
    }

    .sidebar .icon.active {
      transform: scale(1.1);
      filter: drop-shadow(0 0 5px #3b925f);
    }

    .main-content {
      flex: 1;
      padding: 40px;
    }

    .welcome {
      background-color: #fff;
      padding: 40px;
      border-radius: 30px;
      box-shadow: 0 12px 40px rgba(0, 0, 0, 0.05);
      margin-bottom: 30px;
    }

    .welcome h1 {
      font-size: 32px;
      font-weight: 700;
      color: #333;
      margin-bottom: 20px;
    }

    .welcome p {
      font-size: 16px;
      color: #555;
    }

    .stats {
      display: flex;
      justify-content: space-between;
      gap: 20px;
      margin-bottom: 30px;
    }

    .stat-card {
      background: #ffffff;
      padding: 25px;
      border-radius: 20px;
      flex: 1;
      text-align: center;
      box-shadow: 0 8px 24px rgba(0, 0, 0, 0.05);
    }

    .stat-card h2 {
      font-size: 28px;
      color: #2c7a4b;
      font-weight: 700;
      margin-bottom: 8px;
    }

    .stat-card p {
      color: #666;
      font-size: 15px;
    }

    .creche-select {
      display: flex;
      justify-content: center;
      gap: 20px;
      margin-bottom: 40px;
    }
    .creche-btn {
  width: 110px;
  height: 110px;
  border-radius: 50%;
  background-size: cover;
  background-position: center;
  color: white;
  font-size: 14px;
  font-weight: 600;
  border: none;
  box-shadow: 0 6px 16px rgba(0, 0, 0, 0.08);
  transition: transform 0.3s ease;
  display: flex;
  align-items: center;
  justify-content: center;
  text-shadow: 0 2px 4px rgba(0,0,0,0.2);
}


    .creche-btn:hover {
      transform: scale(1.05);
      box-shadow: 0 12px 28px rgba(0, 0, 0, 0.15);
    }

    .big-action-btn {
      display: block;
      width: 100%;
      max-width: 400px;
      margin: 0 auto;
      padding: 18px;
      background: #3b925f;
      color: white;
      font-size: 18px;
      font-weight: 600;
      border: none;
      border-radius: 40px;
      box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
      transition: all 0.3s ease;
    }

    .big-action-btn:hover {
      background: #347d53;
      transform: scale(1.03);
    }

    @media (max-width: 768px) {
      .sidebar {
        flex-direction: row;
        height: 60px;
        width: 100%;
        justify-content: space-around;
      }
      .main-content {
        padding: 20px;
      }
      .stats {
        flex-direction: column;
      }
      .creche-select {
        flex-direction: column;
        gap: 15px;
      }
      .creche-btn {
        width: 120px;
        height: 120px;
        font-size: 16px;
      }
    }
  </style>
</head>
<body>
  <div class="sidebar">
    <img src="bebe.png" alt="bebe" class="icon active">
    <img src="gens.png" alt="gens" class="icon">
    <img src="dossier.png" alt="dossier" class="icon">
    <img src="message.png" alt="message" class="icon">
    <img src="parametre.png" alt="parametre" class="icon">
  </div>

  <div class="main-content">
    <div class="welcome">
      <h1>Section Enfants</h1>
      <p>Accédez à toutes les informations essentielles de votre crèche : enfants présents, planning, messages de l'équipe et plus encore. Cliquez sur les icônes pour naviguer.</p>
    </div>

    <div class="stats">
      <div class="stat-card">
        <h2>60</h2>
        <p>Enfants présents aujourd'hui</p>
      </div>
      <div class="stat-card">
        <h2>10</h2>
        <p>Absences signalées</p>
      </div>
      <div class="stat-card">
        <h2>8</h2>
        <p>Crèches actives</p>
      </div>
    </div>

    <div class="creche-select flex-wrap d-flex justify-content-center">
    <button class="creche-btn m-2" style="background-image: url('Creche1.png');" onclick="window.location.href='PCrechePARIS.php'">PARIS</button>

  <button class="creche-btn m-2" style="background-image: url('Creche2.png');">MANTES</button>
  <button class="creche-btn m-2" style="background-image: url('Creche3.png');">LILLE</button>
  <button class="creche-btn m-2" style="background-image: url('Creche1.png');">VERSAILLES</button>
  <button class="creche-btn m-2" style="background-image: url('Creche2.png');">LYON</button>
  <button class="creche-btn m-2" style="background-image: url('Creche3.png');">NICE</button>
  <button class="creche-btn m-2" style="background-image: url('Creche1.png');">MARSEILLE</button>
  <button class="creche-btn m-2" style="background-image: url('Creche2.png');">TOULOUSE</button>
</div>


    <button class="big-action-btn">🔍 Trouver un enfant</button>
  </div>
</body>
</html>
