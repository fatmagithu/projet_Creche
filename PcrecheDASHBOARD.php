<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Accueil Admin · BabyFarm</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

  <!-- Fonts, Bootstrap, Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Playwrite+GB+S&family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

  <style>
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    body {
      background: linear-gradient(120deg, #fcf8f4, #fcf8f4);
      font-family: 'Inter', sans-serif;
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      flex-direction: column;
      overflow-x: hidden;
      position: relative;
    }

    #splash {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100vh;
      background: linear-gradient(135deg, #fcf8f4, #fcf8f4);
      z-index: 9999;
      display: flex;
      align-items: center;
      justify-content: center;
      transition: opacity 0.6s ease;
    }

    #splash img {
      width: 180px;
      animation: pulse 1.5s infinite;
    }

    .background-circle {
      position: absolute;
      width: 800px;
      height: 800px;
      border-radius: 50%;
      background: radial-gradient(circle, rgba(195,234,210,0.2) 0%, transparent 70%);
      top: -200px;
      right: -300px;
      z-index: 0;
      pointer-events: none;
    }

    h1 {
      font-family: 'Playwrite GB S', sans-serif;
      font-size: 42px;
      font-weight: 700;
      color: #2c2c2c;
      margin-bottom: 12px;
      animation: slideFadeIn 1s ease forwards;
    }

    p.subtext {
      font-size: 17px;
      color: #6c6c6c;
      margin-bottom: 40px;
      animation: slideFadeIn 1.2s ease forwards;
    }

    .icon-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(130px, 1fr));
      gap: 40px;
      max-width: 960px;
      width: 100%;
      padding: 0 30px;
      z-index: 1;
      animation: fadeUp 1.4s ease forwards;
    }

    .app-icon-wrapper {
      display: flex;
      flex-direction: column;
      align-items: center;
      gap: 10px;
      transition: transform 0.3s ease;
    }

    .app-icon {
      background: white;
      width: 110px;
      height: 110px;
      border-radius: 28px;
      box-shadow: 0 14px 30px rgba(0, 0, 0, 0.08);
      display: flex;
      justify-content: center;
      align-items: center;
      transition: all 0.3s ease;
      cursor: pointer;
      position: relative;
    }

    .app-icon:hover {
      background: #f0ebe3;
      transform: translateY(-5px) scale(1.05);
      box-shadow: 0 18px 40px rgba(0, 0, 0, 0.1);
    }

    .app-icon:active::after {
      content: "";
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%) scale(0);
      width: 100%;
      height: 100%;
      border-radius: 50%;
      background: rgba(60, 180, 120, 0.15);
      animation: ripple 0.5s ease-out;
      pointer-events: none;
    }

    .app-icon img {
      width: 46px;
      height: 46px;
      object-fit: contain;
    }

    .icon-label {
      font-size: 15px;
      font-weight: 600;
      color: #444;
      font-family: 'Playwrite GB S', sans-serif;
    }

    .app-icon-wrapper:hover .icon-label {
      color: #b49065;
    }

    @keyframes slideFadeIn {
      0% { transform: translateY(-20px); opacity: 0; }
      100% { transform: translateY(0); opacity: 1; }
    }

    @keyframes fadeUp {
      0% { transform: translateY(20px); opacity: 0; }
      100% { transform: translateY(0); opacity: 1; }
    }

    @keyframes ripple {
      to {
        transform: translate(-50%, -50%) scale(2);
        opacity: 0;
      }
    }

    @keyframes pulse {
      0%, 100% { transform: scale(1); opacity: 1; }
      50% { transform: scale(1.05); opacity: 0.9; }
    }

    @media (max-width: 768px) {
      h1 {
        font-size: 28px;
      }
      .app-icon {
        width: 90px;
        height: 90px;
      }
      .icon-label {
        font-size: 13px;
      }
    }
  </style>
</head>
<body>
  <div id="splash">
    <img src="NOUNOU (7).png" alt="Chargement">
  </div>
  <div class="background-circle"></div>
  <h1>Bienvenue sur Nounou </h1>
  <p class="subtext">Accédez à votre espace de gestion en toute sérénité</p>
  <div class="icon-grid">
    <a href="Ptest22.php" class="text-decoration-none app-icon-wrapper">
      <div class="app-icon"><img src="bebe.png" alt="Enfants"></div>
      <div class="icon-label">Enfants</div>
    </a>
    <a href="PEquipe1.php" class="text-decoration-none app-icon-wrapper">
      <div class="app-icon"><img src="gens.png" alt="Équipe"></div>
      <div class="icon-label">Équipe</div>
    </a>
    <a href="#" class="text-decoration-none app-icon-wrapper">
      <div class="app-icon"><img src="dossier.png" alt="Dossiers"></div>
      <div class="icon-label">Dossiers</div>
    </a>
    <a href="#" class="text-decoration-none app-icon-wrapper">
      <div class="app-icon"><img src="message.png" alt="Messages"></div>
      <div class="icon-label">Messages</div>
    </a>
    <a href="#" class="text-decoration-none app-icon-wrapper">
      <div class="app-icon"><img src="parametre.png" alt="Paramètres"></div>
      <div class="icon-label">Paramètres</div>
    </a>
  </div>

  <!-- Sound & Splash JS -->
  <audio id="clickSound" src="click.mp3" preload="auto"></audio>
  <script>
    window.addEventListener('load', () => {
      setTimeout(() => {
        const splash = document.getElementById('splash');
        splash.style.opacity = '0';
        setTimeout(() => splash.remove(), 600);
      }, 1200);
    });

    document.querySelectorAll('.app-icon').forEach(icon => {
      icon.addEventListener('click', () => {
        const sound = document.getElementById('clickSound');
        if (sound) sound.play();
      });
    });
  </script>
</body>
</html>