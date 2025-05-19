<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Accueil Inscription · BabyFarm</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
  <style>
    :root {
      --beige: #fdf9f3;
      --brown: #b38760;
      --brown-dark: #9e6d4b;
    }

    * {
      box-sizing: border-box;
    }

    body {
      margin: 0;
      font-family: 'Inter', sans-serif;
      background: url('moussa11.png') center/cover no-repeat fixed;
      background-color: rgba(253, 249, 243, 0.96);
      backdrop-filter: blur(20px);
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
    }

    .overlay {
      background-color: rgba(253, 249, 243, 0.9);
      position: absolute;
      inset: 0;
      backdrop-filter: blur(12px);
      z-index: -1;
    }

    .button-container {
      display: flex;
      flex-direction: column;
      gap: 40px;
      text-align: center;
    }

    .big-button {
      padding: 30px 60px;
      border-radius: 30px;
      font-size: 24px;
      font-weight: 600;
      background-color: rgba(255, 255, 255, 0.4);
      color: var(--brown-dark);
      border: 2px solid var(--brown-dark);
      backdrop-filter: blur(10px);
      box-shadow: 0 10px 30px rgba(0,0,0,0.1);
      transition: transform 0.3s, background-color 0.3s;
      cursor: pointer;
    }

    .big-button:hover {
      transform: scale(1.05);
      background-color: rgba(255, 255, 255, 0.6);
    }
    .notification-badge {
  position: absolute;
  top: 10px;
  right: 20px;
  background-color: red;
  color: white;
  font-size: 14px;
  font-weight: bold;
  width: 24px;
  height: 24px;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  box-shadow: 0 0 0 2px white;
}
.btn-retour {
  position: absolute;
  top: 30px;
  left: 30px;
  background-color: var(--brown);
  color: white;
  padding: 10px 18px;
  border-radius: 30px;
  font-weight: 600;
  text-decoration: none;
  transition: 0.3s;
  z-index: 1000;
}

.btn-retour:hover {
  background-color: var(--brown-dark);
}


  </style>
</head>
<body>
<a href="ParametreAdmin.php" class="btn-retour">← Retour</a>

  <div class="overlay"></div>
  <div class="button-container">
    <a href="ajouter_enfant.php" class="big-button">➕ Ajouter un nouvel enfant</a>
    <a href="validerDemandeInscription.php" class="big-button position-relative">
  🗂️ Gérer les inscriptions
  <span class="notification-badge">5</span>
</a>


  </div>
</body>
</html>
