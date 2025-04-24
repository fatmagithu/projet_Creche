<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Documents - Admin BabyFarm</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Playwrite+GB+S&family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    :root {
      --beige: #fdf9f3;
      --beige-light: #fffdf8;
      --brown: #b38760;
      --brown-dark: #9e6d4b;
      --accent: #fae2c6;
      --danger: #e74c3c;
      --warning: #f39c12;
      --success: #2ecc71;
      --highlight: #f4e2d8; /* c'est bien là */
    }
    body {
      margin: 0;
      font-family: 'Inter', sans-serif;
      background: linear-gradient(135deg, var(--beige-light), var(--beige));
      display: flex;
    }
    /* SIDEBAR MODERNE */
  
    .sidebar {
  width: 85px;
  background: url('moussa12.png') center center/cover no-repeat;
  position: fixed;
  height: 100vh;
  display: flex;
  flex-direction: column;
  align-items: center;
  padding: 20px 0;
  border-right: 1px solid #f0eae0;
  transition: width 0.3s ease;
  z-index: 1000;
  overflow: hidden;
}


.sidebar::before {
  content: "";
  position: absolute;
  inset: 0;
  background-color: rgba(253, 249, 243, 0.85);
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
  margin-left: 85px;
  transition: margin-left 0.3s ease;
  padding: 50px;
  width: calc(100% - 85px);
}

.sidebar:hover ~ .main-content {
  margin-left: 220px;
  width: calc(100% - 220px);
}
    .welcome {
      background: white;
      padding: 40px;
      border-radius: 30px;
      box-shadow: 0 12px 30px rgba(0, 0, 0, 0.06);
      margin-bottom: 40px;
    }
    .welcome h1 {
      font-size: 36px;
      font-weight: 800;
      color: var(--brown);
      font-family: 'Playwrite GB S', cursive;
      margin: 0;
    }
    .alert-section {
      background: linear-gradient(90deg, #ffe0e0, #fff4f4);
      padding: 24px;
      border-left: 8px solid var(--danger);
      border-radius: 14px;
      margin-bottom: 40px;
      box-shadow: 0 4px 16px rgba(231, 76, 60, 0.15);
    }
    .alert-section h5 {
      font-weight: 800;
      color: var(--danger);
      margin-bottom: 15px;
    }
    .carousel-container {
      overflow-x: auto;
      display: flex;
      gap: 20px;
      padding-bottom: 20px;
      margin-bottom: 50px;
    }
    .creche-card {
      flex: 0 0 auto;
      width: 320px;
      border-radius: 20px;
      overflow: hidden;
      box-shadow: 0 8px 20px rgba(0,0,0,0.08);
      position: relative;
      background: white;
      transition: transform 0.3s;
    }
    .creche-card:hover {
      transform: translateY(-5px);
    }
    .creche-header {
      height: 140px;
      background-size: cover;
      background-position: center;
      position: relative;
    }
    .creche-ribbon {
      position: absolute;
      top: 10px;
      right: 10px;
      padding: 6px 12px;
      border-radius: 12px;
      font-size: 12px;
      font-weight: 600;
      color: white;
    }
    .ribbon-success {
      background: var(--success);
    }
    .ribbon-warning {
      background: var(--warning);
    }
    .ribbon-danger {
      background: var(--danger);
    }
    .creche-body {
      padding: 20px;
    }
    .creche-body h6 {
      font-weight: 700;
      color: var(--brown-dark);
    }
    .creche-body p {
      font-size: 14px;
      margin: 6px 0;
    }
    .filters-bar {
      display: flex;
      gap: 14px;
      flex-wrap: wrap;
      margin-bottom: 30px;
    }
    .filters-bar button {
      background: white;
      padding: 10px 18px;
      border-radius: 24px;
      font-size: 14px;
      border: 1px solid #ccc;
      font-weight: 600;
      transition: all 0.3s ease;
    }
    .filters-bar button:hover {
      background: var(--accent);
      border-color: var(--brown);
    }
    .upload-box {
      background: #fff8f2;
      padding: 30px;
      border: 3px dashed var(--brown);
      border-radius: 18px;
      text-align: center;
      color: var(--brown-dark);
      margin-bottom: 50px;
    }
    .upload-box label {
      cursor: pointer;
      font-weight: 700;
      font-size: 15px;
    }
    .upload-box input {
      display: none;
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
    <div class="welcome">
      <h1>📁 Gestion des documents administratifs</h1>
    </div>

    <div class="alert-section">
      <h5>🚨 Alertes prioritaires</h5>
      <ul>
        <li>🔴 2 agréments expirés</li>
        <li>🟠 3 assurances à renouveler sous 30 jours</li>
        <li>⚠️ 5 pièces d’identité manquantes</li>
      </ul>
    </div>

    <div class="carousel-container">
      <div class="creche-card">
        <div class="creche-header" style="background-image: url('Creche1.png');">
          <div class="creche-ribbon ribbon-success">✅ OK</div>
        </div>
        <div class="creche-body">
          <h6>Crèche Paris</h6>
          <p>Responsable : Marie Dupont</p>
          <p>🔔 3 documents à vérifier</p>
        </div>
      </div>
      <div class="creche-card">
        <div class="creche-header" style="background-image: url('Creche2.png');">
          <div class="creche-ribbon ribbon-warning">🟠 À surveiller</div>
        </div>
        <div class="creche-body">
          <h6>Crèche Marseille</h6>
          <p>Responsable : Jacques Martin</p>
          <p>🔔 5 documents manquants</p>
        </div>
        
      </div>
      <div class="creche-card">
        <div class="creche-header" style="background-image: url('Creche1.png');">
          <div class="creche-ribbon ribbon-warning">🟠 À surveiller</div>
        </div>
        <div class="creche-body">
          <h6>Crèche Marseille</h6>
          <p>Responsable : Jacques Martin</p>
          <p>🔔 5 documents manquants</p>
        </div>
        
      </div>
      <div class="creche-card">
        <div class="creche-header" style="background-image: url('Creche2.png');">
          <div class="creche-ribbon ribbon-warning">🟠 À surveiller</div>
        </div>
        <div class="creche-body">
          <h6>Crèche Marseille</h6>
          <p>Responsable : Jacques Martin</p>
          <p>🔔 5 documents manquants</p>
        </div>
        
      </div>  <div class="creche-card">
        <div class="creche-header" style="background-image: url('Creche1.png');">
          <div class="creche-ribbon ribbon-warning">🟠 À surveiller</div>
        </div>
        <div class="creche-body">
          <h6>Crèche Marseille</h6>
          <p>Responsable : Jacques Martin</p>
          <p>🔔 5 documents manquants</p>
        </div>
        
      </div>  <div class="creche-card">
        <div class="creche-header" style="background-image: url('Creche2.png');">
          <div class="creche-ribbon ribbon-warning">🟠 À surveiller</div>
        </div>
        <div class="creche-body">
          <h6>Crèche Marseille</h6>
          <p>Responsable : Jacques Martin</p>
          <p>🔔 5 documents manquants</p>
        </div>
        
      </div>  <div class="creche-card">
        <div class="creche-header" style="background-image: url('Creche1.png');">
          <div class="creche-ribbon ribbon-warning">🟠 À surveiller</div>
        </div>
        <div class="creche-body">
          <h6>Crèche Marseille</h6>
          <p>Responsable : Jacques Martin</p>
          <p>🔔 5 documents manquants</p>
        </div>
        
      </div>
    </div>

    <div class="filters-bar">
      <button>📄 Tous les contrats</button>
      <button>📄 Diplômes</button>
      <button>📄 Certificats médicaux</button>
      <button>📄 Assurances</button>
      <button>❌ Expirés</button>
    </div>

    <div class="upload-box">
      <label for="upload">📤 Glisser-déposer ou <u>cliquez pour importer un document</u></label>
      <input type="file" id="upload">
    </div>
  </div>
</body>
</html>
