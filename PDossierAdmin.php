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
      padding: 60px 0 20px 0;
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
      display: none;
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

    .notif-wrapper {
      position: relative;
      display: flex;
      justify-content: flex-end;
      margin-bottom: 30px;
    }

    .notif-btn {
      background-color: var(--brown);
      border: none;
      color: white;
      font-size: 24px;
      border-radius: 50%;
      padding: 14px 17px;
      cursor: pointer;
      position: relative;
      transition: 0.3s ease;
    }

    .notif-btn:hover {
      background-color: var(--brown-dark);
    }

    .notif-badge {
      position: absolute;
      top: -6px;
      right: -6px;
      background: red;
      color: white;
      border-radius: 50%;
      padding: 4px 10px;
      font-size: 13px;
      font-weight: bold;
      box-shadow: 0 2px 6px rgba(0,0,0,0.2);
    }

    .notif-panel {
      display: none;
      position: absolute;
      top: 60px;
      right: 0;
      width: 420px;
      background: white;
      border-radius: 18px;
      box-shadow: 0 12px 30px rgba(0,0,0,0.08);
      padding: 25px;
      z-index: 1000;
    }

    .notif-panel h4 {
      font-size: 20px;
      font-weight: bold;
      color: var(--brown);
      margin-bottom: 20px;
    }

    .notif-list {
      list-style: none;
      padding: 0;
      margin: 0;
    }

    .notif-list li {
      font-size: 15px;
      margin-bottom: 15px;
      padding-bottom: 15px;
      border-bottom: 1px solid #eee;
    }

    .notif-list li span {
      display: block;
      color: #555;
      margin-bottom: 6px;
    }

    .notif-list li a {
      font-size: 14px;
      color: var(--brown-dark);
      text-decoration: underline;
      font-weight: 600;
    }
  </style>
</head>
<body>
<div class="sidebar">
    <button class="btn-retour-sidebar" onclick="window.location.href='PcrecheDASHBOARD.php'">
      ← Retour
    </button>
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

    <div class="notif-wrapper">
  <button id="notifBtn" class="notif-btn">
    <i class="bi bi-bell"></i>
    <span id="notifCount" class="notif-badge">3</span>
  </button>
  <div id="notifBox" class="notif-panel">
    <h4>📌 Notifications dossiers crèches</h4>
    <ul class="notif-list" id="notifItems">
      <li>
        <span>⚠️ Assurance expirée pour Crèche Marseille</span>
        <a href="FicheCreche1.php">Ouvrir la fiche</a>
      </li>
      <li>
        <span>❌ Pièces manquantes dans le dossier Crèche Paris</span>
        <a href="FicheCreche2.php">Voir les documents</a>
      </li>
      <li>
        <span>🔍 Diplôme à vérifier pour Jacques Martin</span>
        <a href="FicheCreche3.php">Accéder</a>
      </li>
    </ul>
  </div>
</div>

    <div class="carousel-container">
      <div class="creche-card">
        <div class="creche-header" style="background-image: url('Creche1.png');">
          <div class="creche-ribbon ribbon-success">✅ OK</div>
        </div>
        <a href="FicheCreche1.php" style="text-decoration: none; color: inherit;">
  
        <div class="creche-body">
          <h6>Crèche Paris</h6>
          <p>Responsable : Marie Dupont</p>
          <p>🔔 3 documents à vérifier</p>
        </div>
        </a>
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
  <script>
  const notifBtn = document.getElementById('notifBtn');
  const notifBox = document.getElementById('notifBox');
  const notifCount = document.getElementById('notifCount');
  const notifItems = document.getElementById('notifItems');

  function updateNotifCount() {
    const total = notifItems.querySelectorAll('li').length;
    notifCount.innerText = total;
    notifCount.style.display = total > 0 ? 'inline-block' : 'none';
  }

  notifBtn.addEventListener('click', () => {
    notifBox.style.display = notifBox.style.display === 'block' ? 'none' : 'block';
    notifCount.style.display = 'none'; // Hide badge when opened
  });

  document.addEventListener('click', (e) => {
    if (!notifBtn.contains(e.target) && !notifBox.contains(e.target)) {
      notifBox.style.display = 'none';
    }
  });

  updateNotifCount();
</script>
</body>
</html>
