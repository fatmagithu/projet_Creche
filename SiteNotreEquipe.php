<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bulles d'Eveil </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="PcrecheAcceuil1.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playwrite+GB+S:ital,wght@0,100..400;1,100..400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playwrite+GB+S&display=swap" rel="stylesheet">
    <style>
    .ultra-navbar {
      background-color: #fcf8f4;
      padding: 0.4rem 1rem;
      box-shadow: 0 8px 16px rgba(0, 0, 0, 0.02);
      border-radius: 0 0 16px 16px;
      font-family: "Playwrite GB S", cursive;
      position: sticky;
      top: 0;
      z-index: 1000;
    }
    .logo-navbar {
      transition: transform 0.3s ease;
      width: 40px;
      height: 60px;
    }
    .logo-navbar:hover {
      transform: scale(1.08);
    }
    .navbar-nav .nav-link {
      color: #5c4a38;
      margin: 0 0.3rem;
      font-size: 0.75rem;
      font-weight: 400;
      position: relative;
      transition: all 0.3s ease;
    }
    .navbar-nav .nav-link::before {
      content: "";
      position: absolute;
      width: 0%;
      height: 2px;
      bottom: -4px;
      left: 0;
      background-color: #3b925f;
      transition: width 0.3s ease;
    }
    .navbar-nav .nav-link:hover {
      color: #3b925f;
    }
    .navbar-nav .nav-link:hover::before {
      width: 100%;
    }
    .btn-contact {
      background-color: #d6c3b4;
      color: #d6c3b4 !important;
      padding: 5px 14px;
      border-radius: 32px;
      font-weight: 600;
      font-size: 0.8rem;
      box-shadow: 0 3px 10px rgba(0, 0, 0, 0.05);
      transition: all 0.3s ease;
    }
    .btn-contact:hover {
        background-color: #d6c3b4;
      transform: translateY(-2px);
    }

    @media (max-width: 768px) {
      .navbar-nav .nav-link {
        margin: 0.3rem 0;
        text-align: center;
        font-size: 0.85rem;
      }
      .ultra-navbar {
        padding: 0.5rem 0.8rem;
      }
    }

    .team-card-boost {
      background: #fff;
      border-radius: 20px;
      box-shadow: 0 6px 14px rgba(0,0,0,0.05);
      padding: 25px;
      text-align: center;
      transition: all 0.4s ease;
      transform: perspective(600px) translateZ(0);
      opacity: 0;
      animation: fadeInCard 0.7s forwards;
      will-change: transform;
    }
    .team-card-boost:hover {
      transform: perspective(600px) translateZ(60px) scale(1.05);
      z-index: 10;
      box-shadow: 0 20px 50px rgba(0, 0, 0, 0.15);
    }
    .team-card-boost p {
  font-family: 'Playwrite GB S', cursive !important;
}
    .team-card-boost img {
      width: 90px;
      height: 90px;
      border-radius: 50%;
      object-fit: cover;
      margin-bottom: 12px;
      border: 3px solid #a8dec5;
      transition: transform 0.3s ease;
    }
    .team-card-boost img:hover {
      transform: rotate(2deg) scale(1.05);
    }
    @keyframes fadeInCard {
      from { transform: translateY(30px); opacity: 0; }
      to { transform: translateY(0); opacity: 1; }
    }
    /* Force la police "Playwrite GB S" pour Sofiya */
.sofiya-section p,
.sofiya-section h3 {
  font-family: 'Playwrite GB S', cursive !important;
}
    </style>
</head>
<body>
<header id="nav">
  <nav class="navbar navbar-expand-lg navbar-light ultra-navbar">
    <a class="navbar-brand d-flex align-items-center" href="PCrecheAcceuil1.php" target="_blank">
      <img src="NOUNOU (7).png" width="68" height="88" alt="Logo" class="mr-2 logo-navbar" />
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
      aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav ml-auto nav-items-wrapper">
        <li class="nav-item"><a class="nav-link" href="siteNosicroCreche.php">Nos micro-crèches</a></li>
        <li class="nav-item"><a class="nav-link" href="SiteNotreEquipe.php">Notre équipe</a></li>
        <li class="nav-item"><a class="nav-link" href="RejoignezNous.php">Rejoignez-nous</a></li>
        <li class="nav-item"><a class="nav-link" href="PcrecheForm1.php">Inscription</a></li>
        <li class="nav-item"><a class="nav-link" href="pcrecheLOGIN.php">Connexion</a></li>
        <li class="nav-item">
        <a class="nav-link btn-contact" href="mailto:nounou-creche@gmail.com?subject=Candidature%20ou%20question">Nous contacter</a>

        </li>
      </ul>
    </div>
  </nav>
</header>

<section style="padding: 80px 20px; background: linear-gradient(to bottom, #fcf8f4, #fff); font-family: 'Plus Jakarta Sans', sans-serif;">
  <div style="max-width: 1300px; margin: auto; background: white; border-radius: 32px; padding: 60px 60px; box-shadow: 0 20px 50px rgba(0,0,0,0.07); border: 1px solid #eee;">
    <h2 style="text-align: center; font-size: 2.4rem; color: #5c4a38; margin-bottom: 50px; font-family: 'Playwrite GB S', cursive;">Rencontrez notre équipe</h2>

    <div style="display: flex; flex-wrap: wrap; align-items: center; margin-bottom: 60px; gap: 30px;">
      <img src="Sofiya.jpeg" alt="Sofiya" style="width: 160px; height: 160px; border-radius: 50%; object-fit: cover; border: 4px solid #d0f0e3; box-shadow: 0 6px 20px rgba(0,0,0,0.05);">
      <div class="sofiya-section" style="display: flex; flex-wrap: wrap; align-items: center; margin-bottom: 60px; gap: 30px;">

        <h3 style="margin: 0; font-size: 1.6rem; color: #2e6e4c;">Sofiya</h3>
        <p style="margin: 5px 0 15px; color: #777; font-size: 1rem;">Directrice pédagogique & fondatrice de Bulles d'Éveil</p>
        <p style="color: #555; font-size: 0.95rem; line-height: 1.6; max-width: 720px;">
          Sofiya est à l'origine du projet BabyFarm. Ancienne éducatrice de jeunes enfants, elle supervise les équipes avec une grande écoute et un sens du détail. Passionnée par le développement de l'enfant, elle veille à ce que chaque structure respecte les valeurs fondatrices de respect, d'autonomie et de confiance.
        </p>
      </div>
    </div>

    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); gap: 35px;">
      <div class="team-card-boost">
        <img src="woman-7175038_1280.jpg" alt="Fatma">
        <h4>Crèche de Buchelay</h4>
        <p style="color: #2e6e4c; font-weight: 600; margin-top: 10px;">Fatma</p>
        <p style="font-size: 0.9rem; color: #666;">Auxiliaire de puériculture passionnée par les activités sensorielles et la motricité libre.</p>
      </div>
      <div class="team-card-boost">
        <img src="woman-657753_1280.jpg" alt="Esha">
        <h4>Crèche de Mantes-la-Jolie</h4>
        <p style="color: #2e6e4c; font-weight: 600; margin-top: 10px;">Esha</p>
        <p style="font-size: 0.9rem; color: #666;">Responsable des activités artistiques et du suivi individuel des enfants.</p>
      </div>
      <div class="team-card-boost">
        <img src="sun-7350734_1280.jpg" alt="Malika">
        <h4>Crèche des Mureaux</h4>
        <p style="color: #2e6e4c; font-weight: 600; margin-top: 10px;">Malika</p>
        <p style="font-size: 0.9rem; color: #666;">Spécialiste du langage des signes bébé et du lien avec les familles.</p>
      </div>
      <div class="team-card-boost">
        <img src="girl-5775940_1280.jpg" alt="Inès">
        <h4>Crèche d’Achères</h4>
        <p style="color: #2e6e4c; font-weight: 600; margin-top: 10px;">Inès</p>
        <p style="font-size: 0.9rem; color: #666;">Encadre les temps calmes et veille au respect du rythme biologique de chaque enfant.</p>
      </div>
    </div>
  </div>
</section>

</body>
</html>
