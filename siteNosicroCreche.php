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
    <link href="https://fonts.googleapis.com/css2?family=Playwrite+GB+S:ital,wght@0,100..400;1,100..400&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playwrite+GB+S&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&family=Plus+Jakarta+Sans:wght@400;600&display=swap" rel="stylesheet">

</head>
<body>
<header id="nav">
  <nav class="navbar navbar-expand-lg navbar-light ultra-navbar">
    <!-- Logo & Brand Name -->
    <a class="navbar-brand d-flex align-items-center" href="PCrecheAcceuil1.php" target="_blank">
      <img src="NOUNOU (7).png" width="68" height="88" alt="Logo" class="mr-2 logo-navbar" />
     
    </a>

    <!-- Burger Icon -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
      aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Navigation Links -->
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
<style>
/* Design niveau branding pro pour navbar */
.ultra-navbar {
  background-color: #fcf8f4; /* beige élégant */
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

.brand-name {
  font-size: 1.3rem;
  font-weight: bold;
  color: #2c7a4b;
  letter-spacing: 1px;
  text-shadow: 0.5px 0.5px #ccc;
  text-transform: lowercase;
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
  background-color: #a8dec5;
  transform: translateY(-2px);
}

/* Responsive */
@media (max-width: 768px) {
  .brand-name {
    font-size: 1.2rem;
  }
  .navbar-nav .nav-link {
    margin: 0.3rem 0;
    text-align: center;
    font-size: 0.85rem;
  }
  .ultra-navbar {
    padding: 0.5rem 0.8rem;
  }

  .hero-section {
      background-image: url('lecture%20bebe.jpg');
      background-size: cover;
      background-position: center;
      text-align: center;
      padding: 120px 20px;
      color: white;
      position: relative;
    }
    .hero-section::before {
      content: '';
      position: absolute;
      top: 0; left: 0; width: 100%; height: 100%;
      background-color: rgba(0,0,0,0.2);
      z-index: 0;
    }
    .hero-section h1 {
      font-size: 3rem;
      position: relative;
      z-index: 1;
      color: #ffffff;
      font-weight: 400;
    }

    .creche-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
      gap: 30px;
      padding: 60px 5%;
    }
    .creche-card {
      background: #fff;
      border-radius: 20px;
      overflow: hidden;
      box-shadow: 0 6px 20px rgba(0, 0, 0, 0.06);
      transition: transform 0.3s ease;
      text-align: center;
    }
    .creche-card:hover {
      transform: translateY(-6px);
    }
    .creche-card img {
      width: 100%;
      height: 180px;
      object-fit: cover;
    }
    .creche-card h4 {
      margin-top: 15px;
      font-size: 1.4rem;
      color: #7a5c4b;
    }
    .creche-card p {
      color: #777;
      margin-bottom: 15px;
    }
    .btn-fiche {
      background-color: #d0f0e3;
      color: #1e5537;
      padding: 8px 20px;
      border-radius: 30px;
      font-weight: bold;
      text-decoration: none;
      display: inline-block;
      margin-bottom: 15px;
      transition: background-color 0.3s;
    }
    .btn-fiche:hover {
      background-color: #a8dec5;
    }
}

.hero-section {
      background-image: url('lecture%20bebe.jpg');
      background-size: cover;
      background-position: center;
      text-align: center;
      padding: 120px 20px;
      color: white;
      position: relative;
    }
    .hero-section::before {
      content: '';
      position: absolute;
      top: 0; left: 0; width: 100%; height: 100%;
      background-color: rgba(0,0,0,0.2);
      z-index: 0;
    }
    .hero-section h1 {
      font-size: 3rem;
      position: relative;
      z-index: 1;
      color: #ffffff;
      font-weight: 400;
    }

    .creche-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
      gap: 30px;
      padding: 60px 5%;
    }
    .creche-card {
      background: #fff;
      border-radius: 20px;
      overflow: hidden;
      box-shadow: 0 6px 20px rgba(0, 0, 0, 0.06);
      transition: transform 0.3s ease;
      text-align: center;
    }
    .creche-card:hover {
      transform: translateY(-6px);
    }
    .creche-card img {
      width: 100%;
      height: 180px;
      object-fit: cover;
    }
    .creche-card h4 {
      margin-top: 15px;
      font-size: 1.4rem;
      color: #7a5c4b;
    }
    .creche-card p {
      color: #777;
      margin-bottom: 15px;
    }
    .btn-fiche {
      background-color: #d0f0e3;
      color: #1e5537;
      padding: 8px 20px;
      border-radius: 30px;
      font-weight: bold;
      text-decoration: none;
      display: inline-block;
      margin-bottom: 15px;
      transition: background-color 0.3s;
    }
    .btn-fiche:hover {
      background-color: #a8dec5;
    }
    .h1{
        
    }
    p {
  font-family: 'Plus Jakarta Sans', sans-serif !important;
}

</style>



<section class="hero-section">
    <h1>Découvrez nos micro-crèches</h1>
  </section>

  <section class="creche-grid">
    <div class="creche-card">
      <img src="Creche1.png" alt="Crèche Buchelay">
      <h4>Crèche de Buchelay</h4>
      <p>Yvelines (78)<br>15 enfants</p>
      <a href="#" class="btn-fiche">Voir la fiche</a>
    </div>
    <div class="creche-card">
      <img src="Creche2.png" alt="Crèche Mantes-la-Jolie">
      <h4>Crèche Mantes-la-Jolie</h4>
      <p>Yvelines (78)<br>12 enfants</p>
      <a href="#" class="btn-fiche">Voir la fiche</a>
    </div>
    <div class="creche-card">
      <img src="Creche3.png" alt="Crèche Les Mureaux">
      <h4>Crèche Les Mureaux</h4>
      <p>Yvelines (78)<br>15 enfants</p>
      <a href="#" class="btn-fiche">Voir la fiche</a>
    </div>
    <div class="creche-card">
      <img src="Creche1.png" alt="Crèche Buchelay">
      <h4>Crèche de Buchelay</h4>
      <p>Yvelines (78)<br>15 enfants</p>
      <a href="#" class="btn-fiche">Voir la fiche</a>
    </div> <div class="creche-card">
      <img src="Creche3.png" alt="Crèche Buchelay">
      <h4>Crèche de Buchelay</h4>
      <p>Yvelines (78)<br>15 enfants</p>
      <a href="#" class="btn-fiche">Voir la fiche</a>
    </div> <div class="creche-card">
      <img src="Creche2.png" alt="Crèche Buchelay">
      <h4>Crèche de Buchelay</h4>
      <p>Yvelines (78)<br>15 enfants</p>
      <a href="#" class="btn-fiche">Voir la fiche</a>
    </div> <div class="creche-card">
      <img src="Creche3.png" alt="Crèche Buchelay">
      <h4>Crèche de Buchelay</h4>
      <p>Yvelines (78)<br>15 enfants</p>
      <a href="#" class="btn-fiche">Voir la fiche</a>
    </div>
    
  </section>
  <section style="padding: 50px 20px; background-color: #fdfaf7; font-family: 'Plus Jakarta Sans', sans-serif;">
  <div style="
    max-width: 860px;
    margin: auto;
    background: white;
    border-radius: 24px;
    box-shadow: 0 10px 24px rgba(0, 0, 0, 0.05);
    padding: 35px 30px;
    border: 1px solid #eee;
  ">
    <h1 style="
      font-size: 1.7rem;
      text-align: center;
      color: #3b2f2f;
      margin-bottom: 30px;
      font-weight: 600;
    ">Le fonctionnement de nos micro-crèches</h1>

    <div style="margin-bottom: 24px;">
      <h3 style="font-size: 1rem; color: #2e6e4c; margin-bottom: 6px;">🌱 Accueil individualisé</h3>
      <p style="font-size: 0.92rem; color: #555; line-height: 1.6;">
        Groupes de 12 à 15 enfants, encadrés avec bienveillance par une équipe attentive à leur rythme et leur personnalité.
      </p>
    </div>

    <div style="margin-bottom: 24px;">
      <h3 style="font-size: 1rem; color: #2e6e4c; margin-bottom: 6px;">📅 Journée rythmée</h3>
      <p style="font-size: 0.92rem; color: #555; line-height: 1.6;">
        Alternance d’activités d’éveil, de jeux libres, de temps calmes et de moments collectifs stimulants.
      </p>
    </div>

    <div style="margin-bottom: 24px;">
      <h3 style="font-size: 1rem; color: #2e6e4c; margin-bottom: 6px;">🤝 Lien parent-crèche</h3>
      <p style="font-size: 0.92rem; color: #555; line-height: 1.6;">
        Transmissions quotidiennes, photos, réunions d’échanges et espace numérique partagé pour suivre chaque étape.
      </p>
    </div>

    <div>
      <h3 style="font-size: 1rem; color: #2e6e4c; margin-bottom: 6px;">👩‍🍼 Équipe engagée</h3>
      <p style="font-size: 0.92rem; color: #555; line-height: 1.6;">
        Educatrices de jeunes enfants et auxiliaires formées, réunies autour d’un projet pédagogique fondé sur l'écoute et l’autonomie.
      </p>
    </div>
  </div>
</section>




</body>
</html>