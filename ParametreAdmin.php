<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CRM Admin · BabyFarm</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Playwrite+GB+S&family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
  <style>
    :root {
      --beige: #fdf9f3;
      --beige-light: #fffdf8;
      --brown: #b38760;
      --brown-dark: #9e6d4b;
      --highlight: #f4e2d8;
    }
    * { box-sizing: border-box; }
    body {
      margin: 0;
      font-family: 'Inter', sans-serif;
      background: url('moussa12.png') center/cover no-repeat fixed;
      position: relative;
    }
    body::before {
      content: "";
      position: fixed;
      inset: 0;
      background-color: rgba(253, 249, 243, 0.92);
      backdrop-filter: blur(12px);
      z-index: -1;
    }
    .sidebar {
      width: 80px;
      background: url('moussa12.png') center center/cover no-repeat;
      position: fixed;
      height: 100vh;
      display: flex;
      flex-direction: column;
      align-items: center;
      padding: 20px 0;
      transition: width 0.3s ease;
      z-index: 1000;
      overflow: hidden;
    }
    .sidebar::before {
      content: "";
      position: absolute;
      inset: 0;
      background-color: rgba(253, 249, 243, 0.88);
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
    .user-bubble {
      opacity: 0;
      visibility: hidden;
      height: 0;
      transition: all 0.4s ease;
      text-align: center;
      margin-bottom: 20px;
      padding: 20px 10px 0;
    }
    .sidebar:hover .user-bubble {
      opacity: 1;
      visibility: visible;
      height: auto;
    }
    .user-bubble img {
      width: 60px;
      height: 60px;
      border-radius: 50%;
      object-fit: cover;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
      margin-bottom: 10px;
    }
    .user-bubble .name {
      font-weight: 600;
      font-size: 14px;
      color: #333;
    }
    .user-bubble .role {
      font-size: 12px;
      color: var(--brown);
    }
    .nav-link {
      display: flex;
      align-items: center;
      width: 100%;
      padding: 12px 16px;
      margin: 6px 0;
      border-radius: 14px;
      transition: background 0.2s ease;
      cursor: pointer;
      text-decoration: none;
      color: #333;
    }
    .nav-link:hover {
      background: var(--highlight);
    }
    .nav-link img {
      width: 48px;
      height: 48px;
      margin-right: 16px;
      flex-shrink: 0;
      object-fit: contain;
    }
    .nav-text {
      opacity: 0;
      transition: opacity 0.3s;
      white-space: nowrap;
    }
    .sidebar:hover .nav-text {
      opacity: 1;
    }
    .main-content {
      flex: 1;
      padding: 40px;
      margin-left: 80px;
      transition: margin-left 0.3s ease;
    }
    .sidebar:hover ~ .main-content {
      margin-left: 220px;
    }
    .quick-actions {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 60px 80px;
      justify-content: center;
      max-width: 1000px;
      margin: 80px auto 0;
    }
    .action-block {
      text-align: center;
    }
    .bubble-icon {
      width: 110px;
      height: 110px;
      background: rgba(255, 255, 255, 0.25);
      border-radius: 26px;
      display: flex;
      align-items: center;
      justify-content: center;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
      backdrop-filter: blur(18px);
      transition: transform 0.3s, box-shadow 0.3s;
      margin: auto;
    }
    .bubble-icon img {
      width: 60%;
      height: 60%;
      object-fit: contain;
    }
    .bubble-icon:hover {
      transform: scale(1.1);
      box-shadow: 0 14px 36px rgba(0, 0, 0, 0.18);
    }
    .quick-actions h6 {
      margin-top: 14px;
      font-size: 15px;
      font-weight: 600;
      color: var(--brown-dark);
      font-family: 'Inter', sans-serif;
    }
    .notification-badge {
  position: absolute;
  top: -4px;
  right: -4px;
  background-color: red;
  color: white;
  font-size: 13px;
  font-weight: bold;
  width: 24px;
  height: 24px;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  box-shadow: 0 0 0 2px white;
}

  </style>
</head>
<body>


  <div class="sidebar">
    <div class="user-bubble">
      <img src="Sofiya.oulhaci.png" alt="Admin">
      <div class="name">Sofiya M.</div>
      <div class="role">Admin</div>
    </div>
    <a href="Ptest22.php" class="nav-link">
      <img src="bebe.png" alt="Enfants">
      <span class="nav-text">Enfants</span>
    </a>
    <a href="PEquipe1.php" class="nav-link">
      <img src="gens.png" alt="Équipe">
      <span class="nav-text">Équipe</span>
    </a>
    <a href="PDossierAdmin.php" class="nav-link">
      <img src="dossier.png" alt="Dossiers">
      <span class="nav-text">Dossiers</span>
    </a>
    <a href="PmessageAdmin.php" class="nav-link">
      <img src="message.png" alt="Messages">
      <span class="nav-text">Messages</span>
    </a>
    <a href="ParametreAdmin.php" class="nav-link">
      <img src="parametre.png" alt="Paramètres">
      <span class="nav-text">Paramètres</span>
    </a>
  </div>

  <div class="main-content">
    <h2 style="font-family: 'Playwrite GB S', cursive; color: var(--brown); text-align:center; margin-bottom: 80px; font-size: 30px;">📱 Centre de Gestion Administratif</h2>
    <div class="quick-actions">
    <div class="action-block">
  <a href="DashNvlEnfant.php" class="bubble-icon position-relative">
    <img src="office-material_227104.png" alt="Ajout Enfant">
    <div class="notification-badge">5</div>
  </a>
  <h6>Nouvel Enfant</h6>
</div>

      <div class="action-block">
        <a href="AjouterNvlCreche.php" class="bubble-icon">
          <img src="school_8949013.png" alt="Nouvelle Crèche">
        </a>
        <h6>Nouvelle Crèche</h6>
      </div>
      <div class="action-block">
        <a href="AjouterParent.php" class="bubble-icon">
          <img src="adoptive-father_5098119.png" alt="Ajouter Parent">
        </a>
        <h6>Nouveau Parent</h6>
      </div>
      <div class="action-block">
        <a href="ReinitialiserMotDePasse.php" class="bubble-icon">
          <img src="exchange.png" alt="Mot de Passe">
        </a>
        <h6>Mot de Passe</h6>
      </div>
      <div class="action-block">
        <a href="Facturation.php" class="bubble-icon">
          <img src="transaction.png" alt="Facturation">
        </a>
        <h6>Facturation</h6>
      </div>
      <div class="action-block">
        <a href="
      planningDASH.php" class="bubble-icon">
          <img src="time-management.png" alt="Planning">
        </a>
        <h6>Planning</h6>
      </div>
      <div class="action-block">
        <a href="SuiviPresence.php" class="bubble-icon">
          <img src="horloge-murale.png" alt="Présences">
        </a>
        <h6>Présences</h6>
      </div>
      <div class="action-block">
        <a href="Alertes.php" class="bubble-icon">
          <img src="gyrophare.png" alt="Alertes">
        </a>
        <h6>Alertes</h6>
      </div>
      <div class="action-block">
        <a href="DocumentsAdministratifs.php" class="bubble-icon">
          <img src="dossier.png" alt="Documents">
        </a>
        <h6>Documents</h6>
      </div>
    </div>
  </div>
</body>
</html>