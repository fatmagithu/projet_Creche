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
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tableau de bord Auxiliaire · BabyFarm</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Playwrite+GB+S&family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    :root {
      --beige: #fdf9f3;
      --beige-light: #fffdf8;
      --brown: #b38760;
      --brown-dark: #9e6d4b;
    }
    body {
      margin: 0;
      background: linear-gradient(135deg, var(--beige-light), var(--beige));
      font-family: 'Inter', sans-serif;
      min-height: 100vh;
      display: flex;
    }
    .sidebar {
      width: 160px;
      background: white;
      box-shadow: 4px 0 20px rgba(0, 0, 0, 0.04);
      display: flex;
      flex-direction: column;
      align-items: center;
      padding: 30px 0;
      border-top-right-radius: 40px;
    }
    .sidebar .icon {
      width: 58px;
      height: 60px;
      margin: 22px 0;
      object-fit: contain;
      cursor: pointer;
      transition: transform 0.3s ease, filter 0.3s ease;
    }
    .sidebar .icon.active {
      transform: scale(1.15);
      filter: drop-shadow(0 0 8px var(--brown));
    }
    .main-content {
      flex: 1;
      padding: 40px;
    }
    .welcome {
      background: white;
      padding: 50px;
      border-radius: 36px;
      box-shadow: 0 16px 48px rgba(0, 0, 0, 0.06);
      margin-bottom: 50px;
      position: relative;
    }
    .welcome h1 {
      font-size: 40px;
      font-weight: 800;
      color: var(--brown);
      font-family: 'Playwrite GB S', sans-serif;
      margin-bottom: 16px;
      animation: fadeInDown 1s ease;
    }
    @keyframes fadeInDown {
      0% { opacity: 0; transform: translateY(-20px); }
      100% { opacity: 1; transform: translateY(0); }
    }
    .welcome p {
      font-size: 17px;
      color: #5f5f5f;
    }
    .stats {
      display: flex;
      justify-content: center;
      align-items: center;
      gap: 30px;
      flex-wrap: wrap;
      margin-bottom: 40px;
    }
    .stat-card-btn {
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      width: 240px;
      height: 150px;
      background: white;
      border-radius: 26px;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.06);
      text-decoration: none;
      color: var(--brown-dark);
      border: none;
      cursor: pointer;
      transition: transform 0.3s ease, background-color 0.3s ease;
    }
    .stat-card-btn:hover {
      background-color: var(--beige-light);
      transform: translateY(-5px);
    }
    .stat-card-btn h2 {
      font-size: 42px;
      font-weight: 800;
      color: var(--brown);
      margin-bottom: 6px;
      animation: pulse 2s infinite;
    }
    @keyframes pulse {
      0%, 100% { transform: scale(1); }
      50% { transform: scale(1.05); }
    }
    .stat-card-btn p {
      font-size: 16px;
      text-align: center;
      color: #666;
    }
    .creche-select {
      display: flex;
      justify-content: center;
      gap: 20px;
      margin-bottom: 50px;
      flex-wrap: wrap;
    }
    .creche-btn {
      width: 110px;
      height: 110px;
      border-radius: 50%;
      background-size: cover;
      background-position: center;
      color: white;
      font-size: 14px;
      font-weight: 600;
      border: none;
      box-shadow: 0 6px 18px rgba(0, 0, 0, 0.08);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      display: flex;
      align-items: center;
      justify-content: center;
      text-shadow: 0 2px 4px rgba(0,0,0,0.25);
      background-color: var(--brown);
    }
    .creche-btn:hover {
      transform: scale(1.06);
      box-shadow: 0 12px 30px rgba(0, 0, 0, 0.12);
    }
    .big-action-btn {
      display: block;
      width: 100%;
      max-width: 420px;
      margin: 0 auto 50px auto;
      padding: 18px;
      background: var(--brown);
      color: white;
      font-size: 18px;
      font-weight: 600;
      border: none;
      border-radius: 40px;
      box-shadow: 0 6px 24px rgba(0, 0, 0, 0.1);
      transition: all 0.3s ease;
    }
    .big-action-btn:hover {
      background: var(--brown-dark);
      transform: scale(1.04);
    }
    @media (max-width: 768px) {
      .sidebar {
        flex-direction: row;
        height: 60px;
        width: 100%;
        justify-content: space-around;
      }
      .main-content {
        padding: 20px;
      }
      .stats {
        flex-direction: column;
      }
      .creche-select {
        flex-direction: column;
        gap: 15px;
      }
      .creche-btn {
        width: 120px;
        height: 120px;
        font-size: 16px;
      }
    }
  </style>
</head>
<body>
  <div class="sidebar">
  <a href="Ptest22.php"><img src="bebe.png" alt="bebe" class="icon active"></a>
  <a href="PEquipe1.php"><img src="gens.png" alt="gens" class="icon"></a>
  <a href="PDossierAdmin.php"><img src="dossier.png" alt="dossier" class="icon"></a>
    <img src="message.png" alt="message" class="icon">
    <img src="parametre.png" alt="parametre" class="icon">
  </div>
  <div class="main-content">
    <div class="welcome">
      <h1>Section Enfants</h1>
      <p>Accédez à toutes les informations essentielles de votre crèche : enfants présents, planning, messages de l'équipe et plus encore. Cliquez sur les icônes pour naviguer.</p>
    </div>
    <div class="stats">
      <button class="stat-card-btn" onclick="window.location.href='DossierEnfantsInscrits.php'">
        <h2><?php echo $nbInscrits; ?></h2>
        <p>Enfants inscrits à ce jour</p>
      </button>
      <button class="stat-card-btn" onclick="window.location.href='validerDemandeInscription.php'">
        <h2><?php echo $nbAttente; ?></h2>
        <p>Demandes d'inscription en cours</p>
      </button>
      <button class="stat-card-btn" onclick="window.location.href='creches-actives.php'">
        <h2><?php echo $nbCreches; ?></h2>
        <p>Crèches actives</p>
      </button>
    </div>
    <div class="creche-select flex-wrap d-flex justify-content-center">
      <button class="creche-btn m-2" style="background-image: url('Creche1.png');" onclick="window.location.href='PCrechePARIS.php'">Mantes à l'Ô</button>
      <button class="creche-btn m-2" style="background-image: url('Creche2.png');">Les Calinous</button>
      <button class="creche-btn m-2" style="background-image: url('Creche3.png');">1-2-3 SOLEIL</button>
      <button class="creche-btn m-2" style="background-image: url('Creche1.png');">Les Coquelicots</button>
      <button class="creche-btn m-2" style="background-image: url('Creche2.png');">Les 101 Bambins</button>
      <button class="creche-btn m-2" style="background-image: url('Creche3.png');">Les Coccinelles</button>
      <button class="creche-btn m-2" style="background-image: url('Creche1.png');">Les Capucines</button>
    </div>
    <button class="big-action-btn" onclick="window.location.href='TrouverUnEnfant.php'">🔍 Trouver un enfant</button>
  </div>
</body>
</html>
