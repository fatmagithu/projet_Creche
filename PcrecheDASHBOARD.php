<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Accueil Admin · BabyFarm</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

  <style>
    body {
      background: linear-gradient(135deg, #fcf8f4, #f5e8da);
      font-family: 'Inter', sans-serif;
      margin: 0;
      padding: 0;
      min-height: 100vh;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      text-align: center;
      position: relative;
      overflow-x: hidden;
    }

    h1 {
      font-weight: 700;
      font-size: 32px;
      margin-bottom: 40px;
      color: #333;
      animation: fadeInDown 1s ease forwards;
    }

    .icon-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(120px, 1fr));
      gap: 30px;
      justify-items: center;
      max-width: 800px;
      width: 100%;
      padding: 0 10px;
      animation: fadeIn 1.5s ease forwards;
    }

    .app-icon {
      background: #ffffff;
      width: 100px;
      height: 100px;
      border-radius: 50%;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.07);
      display: flex;
      justify-content: center;
      align-items: center;
      transition: all 0.3s ease;
      position: relative;
    }

    .app-icon:hover {
      transform: translateY(-6px) scale(1.05);
      background-color: #e0f2e9;
      box-shadow: 0 12px 40px rgba(0, 0, 0, 0.15);
    }

    .app-icon img {
      width: 50px;
      height: 50px;
      object-fit: contain;
      transition: transform 0.3s;
    }

    .app-icon:hover img {
      transform: scale(1.1);
    }

    .icon-label {
      margin-top: 12px;
      font-weight: 600;
      font-size: 14px;
      color: #555;
      transition: color 0.3s;
    }

    .app-icon:hover + .icon-label {
      color: #3b925f;
    }

    /* Animations */
    @keyframes fadeInDown {
      0% { transform: translateY(-30px); opacity: 0; }
      100% { transform: translateY(0); opacity: 1; }
    }

    @keyframes fadeIn {
      0% { opacity: 0; transform: scale(0.95); }
      100% { opacity: 1; transform: scale(1); }
    }

    /* Responsive Design */
    @media (max-width: 768px) {
      h1 {
        font-size: 26px;
      }

      .app-icon {
        width: 80px;
        height: 80px;
      }

      .app-icon img {
        width: 40px;
        height: 40px;
      }

      .icon-label {
        font-size: 13px;
      }
    }
  </style>
</head>
<body>

  <h1>Bienvenue, Sofiya 👋</h1>

  <div class="icon-grid">
    <a href="Ptest22.php" class="text-decoration-none">
      <div class="app-icon"><img src="bebe.png" alt="Enfants"></div>
      <div class="icon-label">Enfants</div>
    </a>

    <a href="#" class="text-decoration-none">
      <div class="app-icon"><img src="gens.png" alt="Équipe"></div>
      <div class="icon-label">Équipe</div>
    </a>

    <a href="#" class="text-decoration-none">
      <div class="app-icon"><img src="dossier.png" alt="Dossiers"></div>
      <div class="icon-label">Dossiers</div>
    </a>

    <a href="#" class="text-decoration-none">
      <div class="app-icon"><img src="message.png" alt="Messages"></div>
      <div class="icon-label">Messages</div>
    </a>

    <a href="#" class="text-decoration-none">
      <div class="app-icon"><img src="parametre.png" alt="Paramètres"></div>
      <div class="icon-label">Paramètres</div>
    </a>
  </div>

</body>
</html>
