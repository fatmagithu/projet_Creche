<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inscription - BabyFarm</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
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
   

<header id="nav">
  <nav class="navbar navbar-expand-lg navbar-light ultra-navbar">
    <!-- Logo & Brand Name -->
    <a class="navbar-brand d-flex align-items-center" href="PCrecheAcceuil1.php" target="_blank">
      <img src="bulleslogo.png" width="58" height="58" alt="Logo" class="mr-2 logo-navbar" />
      <span class="brand-name">Bulles d'Eveil </span>
    </a>

    <!-- Burger Icon -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
      aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Navigation Links -->
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav ml-auto nav-items-wrapper">
        <li class="nav-item"><a class="nav-link" href="#">Nos micro-crèches</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Notre équipe</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Rejoignez-nous</a></li>
        <li class="nav-item"><a class="nav-link" href="PcrecheForm1.php">Inscription</a></li>

        <li class="nav-item"><a class="nav-link" href="pcrecheLOGIN.php">Connexion</a></li>

        <li class="nav-item">
          <a class="nav-link btn-contact" href="#">Nous contacter</a>
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
  border-radius: 50%;
  box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
  width: 40px;
  height: 40px;
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
  background-color: #d0f0e3;
  color: #1e5537 !important;
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
}
</style>

<br><br><br>
  <style>
    body {
      font-family: 'Inter', sans-serif;
      background: linear-gradient(135deg, #fcf8f4, #f5e8da);
      min-height: 100vh;
      padding: 30px;
    }
    .container {
      background: #ffffff;
      border-radius: 24px;
      box-shadow: 0 10px 40px rgba(0, 0, 0, 0.05);
      padding: 50px 60px;
      max-width: 1000px;
      margin: auto;
    }
    .step-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 40px;
    }
    .step {
      flex: 1;
      text-align: center;
      padding: 12px;
      border-bottom: 3px solid #e0e0e0;
      color: #999;
      font-weight: 500;
      transition: all 0.3s ease;
    }
    .step.active {
      border-color: #70c8a0;
      color: #2a7755;
      font-weight: 700;
      background-color: #eafaf1;
      border-radius: 12px 12px 0 0;
    }
    .form-step {
      display: none;
      animation: fadeIn 0.5s ease;
    }
    .form-step.active {
      display: block;
    }
    .btn-group {
      display: flex;
      justify-content: space-between;
      margin-top: 40px;
    }
    .btn-primary, .btn-success {
      padding: 12px 30px;
      border-radius: 12px;
      font-weight: 600;
      font-size: 16px;
      transition: 0.3s ease;
    }
    .btn-success {
      background-color: #70c8a0;
      border-color: #70c8a0;
    }
    .btn-success:hover {
      background-color: #61b88e;
      border-color: #61b88e;
    }
    .btn-secondary {
      background-color: #ddd;
      color: #444;
      font-weight: 500;
    }
    .form-label {
      font-weight: 600;
      margin-bottom: 6px;
    }
    .form-control, .form-select {
      border-radius: 12px;
      padding: 10px 14px;
      border: 1px solid #ddd;
    }
    textarea.form-control {
      resize: vertical;
    }
    @keyframes fadeIn {
      from {opacity: 0; transform: translateY(10px);}
      to {opacity: 1; transform: translateY(0);}
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="step-header">
      <div class="step active" id="step-1-tab">L'enfant</div>
      <div class="step" id="step-2-tab">Le contrat</div>
      <div class="step" id="step-3-tab">Les parents</div>
      <div class="step" id="step-4-tab">Validation</div>
    </div>

    <form id="multi-step-form">
      <!-- Étape 1 -->
      <div class="form-step active" id="step-1">
        <div class="row mb-3">
          <div class="col">
            <label class="form-label">Prénom</label>
            <input type="text" class="form-control" required>
          </div>
          <div class="col">
            <label class="form-label">Nom</label>
            <input type="text" class="form-control" required>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col">
            <label class="form-label">Date de naissance ou estimation</label>
            <input type="date" class="form-control" required>
          </div>
          <div class="col">
            <label class="form-label">Lieu de naissance</label>
            <input type="text" class="form-control">
          </div>
        </div>
        <div class="mb-3">
          <label class="form-label">Genre</label>
          <select class="form-select">
            <option>Garçon</option>
            <option>Fille</option>
          </select>
        </div>
        <div class="mb-3">
          <label class="form-label">Structures où le dossier est déposé</label><br>
          <div class="form-check"><input class="form-check-input" type="checkbox"> Mantes à l'Ô</div>
          <div class="form-check"><input class="form-check-input" type="checkbox"> Les Calinous</div>
          <div class="form-check"><input class="form-check-input" type="checkbox"> 1,2,3 SOLEIL</div>
        </div>
        <div class="btn-group">
          <button type="button" class="btn btn-success" onclick="nextStep(2)">Suivant</button>
        </div>
      </div>

      <!-- Étape 2 -->
      <div class="form-step" id="step-2">
        <div class="row mb-3">
          <div class="col">
            <label class="form-label">Début du contrat</label>
            <input type="date" class="form-control" required>
          </div>
          <div class="col">
            <label class="form-label">Fin du contrat</label>
            <input type="date" class="form-control">
          </div>
        </div>
        <div class="mb-3">
          <label class="form-label">Planning flexible ?</label>
          <select class="form-select">
            <option>Oui</option>
            <option>Non</option>
          </select>
        </div>
        <div class="btn-group">
          <button type="button" class="btn btn-secondary" onclick="nextStep(1)">Précédent</button>
          <button type="button" class="btn btn-success" onclick="nextStep(3)">Suivant</button>
        </div>
      </div>

      <!-- Étape 3 -->
      <div class="form-step" id="step-3">
        <h5 class="mb-4">Informations sur les parents</h5>
        <div class="row mb-3">
          <div class="col">
            <label class="form-label">Prénom</label>
            <input type="text" class="form-control" required>
          </div>
          <div class="col">
            <label class="form-label">Nom</label>
            <input type="text" class="form-control" required>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col">
            <label class="form-label">Email</label>
            <input type="email" class="form-control" required>
          </div>
          <div class="col">
            <label class="form-label">Téléphone</label>
            <input type="text" class="form-control">
          </div>
        </div>
        <div class="btn-group">
          <button type="button" class="btn btn-secondary" onclick="nextStep(2)">Précédent</button>
          <button type="button" class="btn btn-success" onclick="nextStep(4)">Suivant</button>
        </div>
      </div>

      <!-- Étape 4 -->
      <div class="form-step" id="step-4">
        <div class="mb-3">
          <label class="form-label">Informations complémentaires</label>
          <textarea class="form-control" rows="4"></textarea>
        </div>
        <div class="btn-group">
          <button type="button" class="btn btn-secondary" onclick="nextStep(3)">Précédent</button>
          <button type="submit" class="btn btn-primary">Valider le dossier</button>
        </div>
      </div>
    </form>
  </div>

  <script>
    function nextStep(step) {
      document.querySelectorAll('.form-step').forEach((el, index) => {
        el.classList.remove('active');
        document.getElementById(`step-${index + 1}-tab`).classList.remove('active');
      });
      document.getElementById(`step-${step}`).classList.add('active');
      document.getElementById(`step-${step}-tab`).classList.add('active');
    }
  </script>
  <br><br>
</body>
</html>