<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Accueil Admin · BabyFarm</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Playwrite+GB+S&family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    body {
      margin: 0;
      background: linear-gradient(135deg, #fcf8f4, #f5e8da);
      font-family: 'Inter', sans-serif;
      display: flex;
      min-height: 100vh;
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
      width: 40px;
      height: 40px;
      margin: 20px 0;
      object-fit: contain;
      cursor: pointer;
      transition: transform 0.2s;
    }

    .sidebar .icon:hover {
      transform: scale(1.1);
    }

    .main {
      flex: 1;
      padding: 40px;
    }

    .welcome {
      margin-bottom: 30px;
    }

    .welcome h1 {
      font-size: 32px;
      font-weight: 700;
      color: #3b3b3b;
    }

    .creche-selector {
      display: flex;
      gap: 40px;
      margin-bottom: 50px;
    }

    .creche-bubble {
      background-color: #fff;
      width: 130px;
      height: 130px;
      border-radius: 50%;
      box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      font-weight: 600;
      color: #3b925f;
      font-size: 18px;
      transition: all 0.3s;
      cursor: pointer;
    }

    .creche-bubble:hover {
      background-color: #e3f5eb;
      transform: scale(1.05);
    }

    .stats {
      display: flex;
      gap: 30px;
      flex-wrap: wrap;
    }

    .stat-box {
      flex: 1 1 200px;
      background: #ffffff;
      padding: 20px;
      border-radius: 20px;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
      text-align: center;
    }

    .stat-box h2 {
      font-size: 32px;
      color: #2c7a4b;
      font-weight: 700;
    }

    .stat-box p {
      font-size: 14px;
      color: #777;
    }
  </style>
</head>
<body>
  <div class="sidebar">
    <img src="bullesLogo.png" alt="Logo" class="logo">
    <img src="bebe.png" alt="bebe" class="icon">
    <img src="gens.png" alt="gens" class="icon">
    <img src="dossier.png" alt="dossier" class="icon">
    <img src="message.png" alt="message" class="icon">
    <img src="parametre.png" alt="parametre" class="icon">
  </div>

  <div class="main">
    <div class="welcome">
      <h1>Bonjour Administrateur 👋</h1>
      <p>Sélectionnez une crèche pour accéder à sa gestion :</p>
    </div>

    <div class="creche-selector">
      <div class="creche-bubble">Crèche 1</div>
      <div class="creche-bubble">Crèche 2</div>
      <div class="creche-bubble">Crèche 3</div>
    </div>

    <div class="stats">
      <div class="stat-box">
        <h2>18</h2>
        <p>Enfants présents aujourd'hui</p>
      </div>
      <div class="stat-box">
        <h2>4</h2>
        <p>Absences signalées</p>
      </div>
      <div class="stat-box">
        <h2>12</h2>
        <p>Messages non lus</p>
      </div>
      <div class="stat-box">
        <h2>3</h2>
        <p>Nouvelles inscriptions</p>
      </div>
    </div>
  </div>
</body>
</html>
