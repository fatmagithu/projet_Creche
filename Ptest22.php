<?php
session_start();
$host = "localhost";
$username = "root";
$password = "root";
$dbname = "groupe_bulles_deveil";

$conn = new mysqli($host, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Échec de la connexion à la base de données : " . $conn->connect_error);
}
$sqlInscrits = "SELECT COUNT(*) AS total FROM inscription_enfant WHERE statut = 'inscrit'";
$resultInscrits = $conn->query($sqlInscrits);
$rowInscrits = $resultInscrits->fetch_assoc();
$nbInscrits = $rowInscrits['total'];
$sqlAttente = "SELECT COUNT(*) AS total FROM inscription_enfant WHERE statut = 'en attente'";
$resultAttente = $conn->query($sqlAttente);
$rowAttente = $resultAttente->fetch_assoc();
$nbAttente = $rowAttente['total'];
$sql = "SELECT COUNT(*) AS total FROM creche";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$nbCreches = $row['total'];
$conn->close();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Dashboard Admin · BabyFarm</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Playwrite+GB+S&family=Inter:wght@400;600;700&display=swap" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />
  <style>
    :root {
      --beige: #fdf9f3;
      --beige-light: #fffdf8;
      --brown: #b38760;
      --brown-dark: #9e6d4b;
      --highlight: #f4e2d8;
    }

    body {
      margin: 0;
      font-family: 'Inter', sans-serif;
      background: linear-gradient(135deg, var(--beige-light), var(--beige));
      display: flex;
      min-height: 100vh;
    }

    .sidebar {
  width: 85px;
  background: url('moussa12.png') center center/cover no-repeat;
  position: fixed;
  height: 100vh;
  display: flex;
  flex-direction: column;
  align-items: center;
  padding: 60px 0 20px 0; /* top: 60px, bottom: 20px */

  border-right: 1px solid #f0eae0;
  transition: width 0.3s ease;
  z-index: 1000;
  overflow: hidden;
}

.sidebar::before {
  content: "";
  position: absolute;
  inset: 0;
  background-color: rgba(253, 249, 243, 0.85); /* beige doux */
  z-index: 0;
  backdrop-filter: blur(3px);
}

.sidebar > * {
  position: relative;
  z-index: 1;
}


    .sidebar:hover {
      width: 220px;
    }

    .sidebar .user {
      text-align: center;
      margin-bottom: 30px;
      transition: 0.3s ease;
      opacity: 0;
      height: 0;
      overflow: hidden;
    }

    .sidebar:hover .user {
      opacity: 1;
      height: auto;
    }

    .user img {
      width: 60px;
      height: 60px;
      border-radius: 50%;
      margin-bottom: 10px;
      object-fit: cover;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    .user .name {
      font-weight: 600;
      font-size: 14px;
    }

    .user .role {
      font-size: 12px;
      color: var(--brown);
    }

    .nav-link {
      display: flex;
      align-items: center;
      width: 100%;
      padding: 12px 16px;
      margin: 6px 0;
      border-radius: 12px;
      transition: background 0.2s ease;
      color: #333;
      text-decoration: none;
    }

    .nav-link:hover {
      background: var(--highlight);
    }

    .nav-link img {
      width: 42px;
      height: 42px;
      margin-right: 16px;
    }

    .nav-text {
      opacity: 0;
      transition: opacity 0.3s ease;
      white-space: nowrap;
    }

    .sidebar:hover .nav-text {
      opacity: 1;
    }

    .main-content {
      margin-left: 85px;
      padding: 40px;
      flex: 1;
    }

    .welcome {
      background: white;
      padding: 50px;
      border-radius: 36px;
      box-shadow: 0 16px 48px rgba(0, 0, 0, 0.06);
      margin-bottom: 50px;
    }

    .welcome h1 {
      font-size: 40px;
      font-weight: 800;
      font-family: 'Playwrite GB S', sans-serif;
      color: var(--brown);
    }

    .welcome p {
      font-size: 17px;
      color: #5f5f5f;
    }

    .stats {
      display: flex;
      justify-content: center;
      gap: 30px;
      flex-wrap: wrap;
    }

    .stat-card-btn {
      background: white;
      border-radius: 26px;
      padding: 30px;
      width: 240px;
      height: 150px;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.06);
      text-align: center;
      cursor: pointer;
      transition: 0.3s;
    }

    .stat-card-btn:hover {
      background-color: var(--beige-light);
      transform: translateY(-5px);
    }

    .stat-card-btn h2 {
      font-size: 42px;
      font-weight: 800;
      color: var(--brown);
    }

    .stat-card-btn p {
      font-size: 16px;
      color: #666;
    }

    .creche-select {
      display: flex;
      justify-content: center;
      gap: 20px;
      flex-wrap: wrap;
      margin-top: 40px;
    }

    .creche-btn {
  width: 170px;
  height: 120px;
  border-radius: 48px;
  background: linear-gradient(135deg, rgba(179, 135, 96, 0.95), rgba(158, 109, 75, 0.95));
  background-blend-mode: overlay;
  color: #fff;
  font-weight: 700;
  font-size: 15px;
  display: flex;
  align-items: flex-end;
  justify-content: center;
  padding: 18px;
  border: 1px solid rgba(255, 255, 255, 0.15);
  box-shadow:
    0 15px 30px rgba(0, 0, 0, 0.15),
    inset 0 1px 2px rgba(255, 255, 255, 0.1);
  text-shadow: 0 2px 4px rgba(0, 0, 0, 0.25);
  background-size: cover;
  background-position: center;
  cursor: pointer;
  transition: all 0.25s ease;
  backdrop-filter: blur(3px);
  -webkit-backdrop-filter: blur(3px);
  position: relative;
  overflow: hidden;
}

.creche-btn::before {
  content: "";
  position: absolute;
  inset: 0;
  background: rgba(255, 255, 255, 0.05);
  opacity: 0;
  transition: opacity 0.3s ease;
}

.creche-btn:hover::before {
  opacity: 1;
}

.creche-btn:hover {
  transform: translateY(-4px) scale(1.03);
  box-shadow:
    0 20px 40px rgba(0, 0, 0, 0.2),
    inset 0 1px 3px rgba(255, 255, 255, 0.1);
}

.creche-btn:active {
  transform: scale(0.97);
  box-shadow: inset 0 3px 6px rgba(0, 0, 0, 0.2);
}


    .big-action-btn-fancy {
    display: block;
    width: 100%;
    max-width: 420px;
    margin: 50px auto;
    padding: 18px;
    background: url('moussa12.png') center center/cover no-repeat;
    color: white;
    font-size: 20px;
    font-weight: 700;
    border-radius: 50px;
    border: none;
    text-align: center;
    box-shadow: 0 8px 24px rgba(0,0,0,0.2);
    position: relative;
    overflow: hidden;
    backdrop-filter: blur(6px);
    cursor: pointer;
    transition: transform 0.3s ease;
  }

  .big-action-btn-fancy::before {
    content: "";
    position: absolute;
    inset: 0;
    background-color: rgba(253, 249, 243, 0.75);
    z-index: 0;
  }

  .big-action-btn-fancy span {
    position: relative;
    z-index: 1;
  }

  .big-action-btn-fancy:hover {
    transform: scale(1.05);
  }
  .btn-retour-sidebar {
  background: white;
  border: 2px solid #b38760;
  color: #b38760;
  padding: 8px 14px;
  border-radius: 30px;
  font-weight: bold;
  cursor: pointer;
  transition: 0.3s;
  font-size: 14px;
  margin-bottom: 30px;
  width: 120px;
  text-align: center;
  display: none; /* masqué par défaut */
}

.sidebar:hover .btn-retour-sidebar {
  display: block; /* s'affiche uniquement quand la sidebar est ouverte */
}

.sidebar:not(:hover) .btn-retour-sidebar::after {
  content: "←";
  display: block;
  font-size: 20px;
  width: 100%;
  text-align: center;
  color: #b38760;
  font-weight: bold;
}

.sidebar:not(:hover) .btn-retour-sidebar {
  display: block;
  width: auto;
  padding: 8px;
  font-size: 18px;
  background: none;
  border: none;
  color: #b38760;
  margin-bottom: 20px;
  text-align: center;
}


  </style>
</head>
<body>
  <div class="sidebar">
  <button class="btn-retour-sidebar" onclick="window.location.href='PcrecheDASHBOARD.php'">
    ← Retour
  </button>
  <!-- le reste -->


    <div class="user">
      <img src="Sofiya.oulhaci.png" alt="Admin">
      <div class="name">Sofiya M.</div>
      <div class="role">Admin</div>
    </div>
    <a href="Ptest22.php" class="nav-link">
      <img src="bebe.png" alt="Enfants"><span class="nav-text">Enfants</span>
    </a>
    <a href="PEquipe1.php" class="nav-link">
      <img src="gens.png" alt="Équipe"><span class="nav-text">Équipe</span>
    </a>
    <a href="PDossierAdmin.php" class="nav-link">
      <img src="dossier.png" alt="Dossiers"><span class="nav-text">Dossiers</span>
    </a>
    <a href="PmessageAdmin.php" class="nav-link">
      <img src="message.png" alt="Messages"><span class="nav-text">Messages</span>
    </a>
    <a href="ParametreAdmin.php" class="nav-link">
      <img src="parametre.png" alt="Paramètres"><span class="nav-text">Paramètres</span>
    </a>
  </div>

  <div class="main-content">
    <div class="welcome">
      <h1>Section Enfants</h1>
      <p>Accédez à toutes les infos de votre crèche : enfants, planning, messages... Cliquez sur les icônes pour naviguer.</p>
    </div>





    
    <div class="stats">
      <div class="stat-card-btn" onclick="window.location.href='ListeGlobaleDesInscrits.php'">
        <h2><?= $nbInscrits; ?></h2>
        <p>Enfants inscrits</p>
      </div>
      <div class="stat-card-btn" onclick="window.location.href='validerDemandeInscription.php'">
        <h2><?= $nbAttente; ?></h2>
        <p>Demandes en attente</p>
      </div>
      <div class="stat-card-btn" onclick="window.location.href='AjouterNvlCreche.php'">
        <h2><?= $nbCreches; ?></h2>
        <p>Crèches actives</p>
      </div>
    </div>

    <div class="creche-select">
      <button class="creche-btn" style="background-image: url('Creche1.png')" onclick="window.location.href='PCrechePARIS.php'">Mantes à l'Ô</button>
      <button class="creche-btn" style="background-image: url('Creche2.png')">Les Calinous</button>
      <button class="creche-btn" style="background-image: url('Creche3.png')">1-2-3 Soleil</button>
      <button class="creche-btn" style="background-image: url('Creche1.png')">Les Coquelicots</button>
      <button class="creche-btn" style="background-image: url('Creche2.png')">Les 101 Bambins</button>
      <button class="creche-btn" style="background-image: url('Creche3.png')">Les Coccinelles</button>
      <button class="creche-btn" style="background-image: url('Creche1.png')">Les Capucines</button>
    </div>
    
<button class="big-action-btn-fancy" onclick="window.location.href='TrouverUnEnfant.php'"><span>🔍 Trouver un enfant</span></button>

  </div>
</body>
</html>
