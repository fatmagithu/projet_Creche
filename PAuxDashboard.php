<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Accueil Auxiliaire · BabyFarm</title>
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
    background: url('moussa12.png') no-repeat center center/cover;
    font-family: 'Inter', sans-serif;
    min-height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    overflow-x: hidden;
    position: relative;
  }

  body::before {
    content: "";
    position: absolute;
    inset: 0;
    background-color: rgba(252, 248, 244, 0.6);
    backdrop-filter: blur(4px);
    z-index: 0;
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
    z-index: 1;
    pointer-events: none;
  }

  h1 {
    font-family: 'Playwrite GB S', cursive;
    font-size: 38px;
    color: #b38760;
    margin-top: 30px;
    animation: fadeDown 1s ease-out;
    z-index: 2;
  }

  .subtext {
    font-size: 17px;
    color: #777;
    margin-top: 8px;
    animation: fadeDown 1.3s ease-out;
    z-index: 2;
  }

  .icon-grid {
    display: flex;
    justify-content: center;
    align-items: center;
    flex-wrap: wrap;
    gap: 32px;
    margin-top: 40px;
    animation: fadeUp 1.4s ease forwards;
    padding-bottom: 40px;
    z-index: 2;
  }

  .app-icon-wrapper {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 10px;
    width: 120px;
    text-align: center;
    transition: transform 0.3s ease;
  }

  .app-icon {
    background: white;
    width: 100px;
    height: 100px;
    border-radius: 50%;
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
    display: flex;
    justify-content: center;
    align-items: center;
    transition: all 0.3s ease;
    cursor: pointer;
    position: relative;
    border: 2px solid transparent;
  }

  .app-icon:hover {
    background: #f0ebe3;
    transform: scale(1.08);
    border-color: #e6e6e6;
  }

  .app-icon img {
    width: 68px;
    height: 68px;
    object-fit: contain;
    transition: transform 0.3s ease;
  }

  .icon-label {
    font-size: 14px;
    font-weight: 600;
    color: #444;
    font-family: 'Playwrite GB S', sans-serif;
  }

  .app-icon-wrapper:hover .icon-label {
    color: #b49065;
  }

  @keyframes fadeDown {
    0% { opacity: 0; transform: translateY(-20px); }
    100% { opacity: 1; transform: translateY(0); }
  }

  @keyframes fadeUp {
    0% { opacity: 0; transform: translateY(20px); }
    100% { opacity: 1; transform: translateY(0); }
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
      width: 80px;
      height: 80px;
    }
    .icon-label {
      font-size: 12px;
    }
  }
</style>

</head>
<body>

<!-- Splash -->
<div id="splash">
  <img src="NOUNOU (7).png" alt="Chargement">
</div>
<div class="background-circle"></div>

<!-- Contenu -->
<h1>Bienvenue Auxiliaire</h1>
<p class="subtext">Gérez vos tâches quotidiennes en un clin d’œil</p>

<div class="icon-grid">
  <a href="pointageAUX.php" class="text-decoration-none app-icon-wrapper">
    <div class="app-icon"><img src="horloge-murale.png" alt="Pointage"></div>
    <div class="icon-label">Pointage</div>
  </a>
  <a href="chatAUX.php" class="text-decoration-none app-icon-wrapper">
    <div class="app-icon"><img src="un-message.png" alt="Paramètres"></div>
    <div class="icon-label">chat</div>
  </a>
  <a href="ActivitéAUX.php" class="text-decoration-none app-icon-wrapper">
    <div class="app-icon"><img src="palette-de-peinture (1).png" alt="Activité"></div>
    <div class="icon-label">Activité</div>
  </a>

  <a href="Prepas.php" class="text-decoration-none app-icon-wrapper">
    <div class="app-icon"><img src="repas.png" alt="Repas"></div>
    <div class="icon-label">Repas</div>
  </a>

  <a href="PageACPhoto.php" class="text-decoration-none app-icon-wrapper">
    <div class="app-icon"><img src="image11.png" alt="Photos"></div>
    <div class="icon-label">Photos</div>
  </a>

  <a href="FicheEnfantAUX.php" class="text-decoration-none app-icon-wrapper">
    <div class="app-icon"><img src="bebe.png" alt="Fiche Enfant"></div>
    <div class="icon-label">Fiche Enfant</div>
  </a>

  <a href="Psieste.php" class="text-decoration-none app-icon-wrapper">
    <div class="app-icon"><img src="dormir.png" alt="Sieste"></div>
    <div class="icon-label">Sieste</div>
  </a>

  <a href="Pbobo.php" class="text-decoration-none app-icon-wrapper">
    <div class="app-icon"><img src="pansement.png" alt="Bobo"></div>
    <div class="icon-label">Bobo</div>
  </a>

  <a href="CoucheAUXEnf.php" class="text-decoration-none app-icon-wrapper">
    <div class="app-icon"><img src="couche.png" alt="Change"></div>
    <div class="icon-label">Change</div>
  </a>
  <a href="PcrecheAUX.php" class="text-decoration-none app-icon-wrapper">
    <div class="app-icon"><img src="goback.png" alt="Change"></div>
    <div class="icon-label">Retour</div>
  </a>
</div>

<!-- Sons & animation JS -->
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
