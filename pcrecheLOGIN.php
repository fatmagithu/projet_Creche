<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Bulles d'Eveil · Choix du rôle</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap + Google Fonts + Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Playwrite+GB+S&family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

  <style>
    body {
      margin: 0;
      font-family: 'Inter', sans-serif;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      position: relative;
      background: #fcf8f4;
    }

    /* === FOND MODERNE AVEC VAGUE === */
    .background-container {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      overflow: hidden;
      z-index: 0;
    }

    .background-image {
      width: 100%;
      height: 100vh;
      object-fit: cover;
      display: block;
    }

    .wave-shape {
      position: absolute;
      top: 50vh;
      left: 0;
      width: 100%;
      height: 120px;
      z-index: 1;
    }

    /* === CARTE AU PREMIER PLAN === */
    .card {
      background: #ffffff;
      border: none;
      border-radius: 40px;
      box-shadow: 0 18px 60px rgba(0, 0, 0, 0.08);
      padding: 70px 50px;
      max-width: 580px;
      width: 90%;
      text-align: center;
      z-index: 2;
      position: relative;
    }

    .logo {
      width: 280px;
      margin-bottom: 30px;
      margin-left: 20%;
    }

    h1 {
      font-weight: 700;
      font-size: 28px;
      color: #2c2c2c;
      margin-bottom: 12px;
    }

    p.description {
      font-size: 16px;
      color: #666;
      margin-bottom: 30px;
    }

    .role-option {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 14px 20px;
      border-radius: 16px;
      background-color: #f8f8f8;
      margin-bottom: 15px;
      transition: all 0.2s ease;
      cursor: pointer;
      font-weight: 600;
    }

    .role-option:hover {
      background-color: #f0ebe3;
      transform: translateY(-2px);
    }

    .role-icon {
      font-size: 22px;
      margin-right: 10px;
      color: #333;
    }

    .role-text {
      flex: 1;
      text-align: left;
      font-size: 16px;
    }

    .arrow {
      font-size: 18px;
      color: #999;
    }

    .footer-note {
      font-size: 13px;
      color: #aaa;
      margin-top: 30px;
    }

    @media (max-width: 500px) {
      .card {
        padding: 50px 30px;
      }
      .logo {
        width: 190px;
      }
    }
  </style>
</head>
<body>

  <!-- === FOND VISUEL TYPE APP MODERNE === -->
  <div class="background-container">
    <img src="moussa3.png" alt="Fond crèche" class="background-image">
    <svg class="wave-shape" viewBox="0 0 1440 320"><path fill="#fcf8f4" fill-opacity="1" d="M0,160L48,176C96,192,192,224,288,224C384,224,480,192,576,186.7C672,181,768,203,864,186.7C960,171,1056,117,1152,112C1248,107,1344,149,1392,170.7L1440,192L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>
  </div>

  <!-- === CONTENU PRINCIPAL === -->
  <div class="card">
    <img src="NOUNOU (6).png" alt="Logo Bébé" class="logo">

    <h1>Qui suis-je ?</h1>
    <p class="description">Sélectionnez votre rôle pour accéder à votre espace</p>

    <div class="role-option" onclick="goTo('PcrecheADMIN.php')">
      <span class="role-icon bi bi-person-gear"></span>
      <span class="role-text">Administrateur</span>
      <span class="arrow bi bi-chevron-right"></span>
    </div>

    <div class="role-option" onclick="goTo('PcrecheAUX.php')">
      <span class="role-icon bi bi-person-badge"></span>
      <span class="role-text">Auxiliaire Petite Enfance</span>
      <span class="arrow bi bi-chevron-right"></span>
    </div>

    <div class="role-option" onclick="goTo('PcrechePARENT.php')">
      <span class="role-icon bi bi-people"></span>
      <span class="role-text">Parent</span>
      <span class="arrow bi bi-chevron-right"></span>
    </div>

    <div class="footer-note">BabyFarm — Pour une gestion fluide et douce de la crèche ✨</div>
  </div>

  <script>
    function goTo(page) {
      window.location.href = page;
    }
  </script>

</body>
</html>