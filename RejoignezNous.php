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
        <li class="nav-item"><a class="nav-link" href="#rejoignez-nous">Rejoignez-nous</a></li>
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
  background-color: #a8dec5;
  transform: translateY(-2px);
}
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
}
</style>

<!-- Rejoignez-nous Section -->
<section id="rejoignez-nous" style="padding: 80px 20px; background-color: #fdf9f3; font-family: 'Playwrite GB S', cursive;">
  <div style="max-width: 900px; margin: auto; background: white; padding: 40px 30px; border-radius: 24px; box-shadow: 0 10px 30px rgba(0,0,0,0.05);">
    <h2 style="text-align: center; font-size: 2rem; color: #5c4a38; font-family: 'Playwrite GB S', cursive; margin-bottom: 30px;">Rejoignez l'équipe de Bulles d'Éveil</h2>
    <p style="text-align: center; font-size: 1rem; color: #555; margin-bottom: 40px; font-family: 'Playwrite GB S', cursive;">Nous sommes toujours à la recherche de personnes passionnées pour accompagner le développement des enfants avec bienveillance et engagement.</p>
    <form action="#" method="POST" enctype="multipart/form-data">
      <div class="form-group">
        <label for="nom">Nom</label>
        <input type="text" class="form-control" id="nom" name="nom" required>
      </div>
      <div class="form-group">
        <label for="prenom">Prénom</label>
        <input type="text" class="form-control" id="prenom" name="prenom" required>
      </div>
      <div class="form-group">
        <label for="email">Adresse Email</label>
        <input type="email" class="form-control" id="email" name="email" required>
      </div>
      <div class="form-group">
        <label for="etude">Niveau d'étude</label>
        <input type="text" class="form-control" id="etude" name="etude">
      </div>
      <div class="form-group">
        <label for="message">Pourquoi souhaitez-vous rejoindre notre équipe ?</label>
        <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
      </div>
      <div class="form-group">
        <label for="cv">Votre CV (PDF)</label>
        <input type="file" class="form-control-file" id="cv" name="cv" accept="application/pdf">
      </div>
      <div class="form-group">
        <label for="lm">Lettre de motivation (PDF)</label>
        <input type="file" class="form-control-file" id="lm" name="lm" accept="application/pdf">
      </div>
      <button type="submit" class="btn btn-success mt-3" style="background-color: #2e6e4c; border: none; padding: 10px 20px; border-radius: 30px; font-family: 'Playwrite GB S', cursive;">Envoyer ma candidature</button>
    </form>
  </div>
</section>

</body>
</html>