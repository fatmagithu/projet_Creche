<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tableau de bord Auxiliaire · BabyFarm</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Playwrite+GB+S&family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    body {
      margin: 0;
      background: linear-gradient(135deg, #fcf8f4, #f5e8da);
      font-family: 'Inter', sans-serif;
      min-height: 100vh;
      display: flex;
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

    .sidebar .nav-icon {
      font-size: 24px;
      color: #8c8c8c;
      margin: 20px 0;
      transition: color 0.3s;
      cursor: pointer;
      
    }

    .sidebar .nav-icon:hover {
      color: #3b925f;
    }
    
    .sidebar .icon {
  width: 60px;
  height: 64px;
  margin: 20px 0;
  object-fit: contain;
 
  cursor: pointer;

}


    .main-content {
      flex: 1;
      padding: 40px;
    }

    .welcome {
      background-color: #fff;
      padding: 40px;
      border-radius: 30px;
      box-shadow: 0 12px 40px rgba(0, 0, 0, 0.05);
    }

    .welcome h1 {
      font-size: 32px;
      font-weight: 700;
      color: #333;
      margin-bottom: 20px;
    }

    .welcome p {
      font-size: 16px;
      color: #555;
    }

    @media (max-width: 768px) {
      .sidebar {
        flex-direction: row;
        height: 60px;
        width: 100%;
        justify-content: space-around;
      }

      .sidebar img.logo {
        display: none;
      }

      .main-content {
        padding: 20px;
      }
      
    }
  </style>
</head>
<body>
  <div class="sidebar">

    <img src="bebe.png" alt="bebe" class="icon">
    <img src="gens.png" alt="gens" class="icon">
    <img src="dossier.png" alt="dossier" class="icon">
    <img src="message.png" alt="message" class="icon">
    <img src="parametre.png" alt="parametre" class="icon">
  </div>

  <div class="main-content">
    <div class="welcome">

      <p>Accédez à toutes les informations essentielles de votre crèche : enfants présents, planning, messages de l'équipe et plus encore. Cliquez sur les icônes pour naviguer.</p>
    </div>
  </div>
</body>
</html>
