<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Crèche Paris - BabyFarm</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Playwrite+GB+S&family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <script>
  function toggleActivityDetails(id) {
    const detail = document.getElementById(id);
    if (detail) {
      detail.classList.toggle('active');
    }
  }
</script>

<style>
    :root {
      --beige: #fdf9f3;
      --beige-light: #fffdf8;
      --brown: #b38760;
      --brown-dark: #9e6d4b;
      --highlight: #f4e2d8; /* c'est bien là */
    }
    body {
      margin: 0;
      background: linear-gradient(135deg, var(--beige-light), var(--beige));
      font-family: 'Inter', sans-serif;
      min-height: 100vh;
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
    .user img {
      width: 60px;
      height: 60px;
      border-radius: 50%;
      margin-bottom: 10px;
      object-fit: cover;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
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
      padding: 40px;
      flex: 1;
    }.planning-week {
  background: #fff;
  padding: 30px;
  border-radius: 20px;
  box-shadow: 0 12px 24px rgba(0, 0, 0, 0.08);
  margin-bottom: 35px;
  animation: fadeIn 0.4s ease-in-out;
}

.day-card {
  border-bottom: 1px solid #eee;
  padding: 18px 0;
}

.day-top {
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.day-name {
  font-size: 20px;
  font-weight: 700;
  color: var(--brown);
}

.day-hours {
  font-size: 15px;
  color: #666;
  font-weight: 500;
}

.day-hours.closed {
  color: #e74c3c;
  font-weight: bold;
}

.day-info {
  margin-top: 8px;
  display: flex;
  gap: 20px;
  align-items: center;
  flex-wrap: wrap;
  font-size: 14px;
}

.day-info span {
  background: var(--highlight);
  padding: 6px 12px;
  border-radius: 12px;
  font-weight: 500;
}

.day-info button {
  background: none;
  border: none;
  color: var(--brown-dark);
  font-weight: bold;
  cursor: pointer;
  font-size: 14px;
  text-decoration: underline;
}

.activity-detail {
  display: none;
  background: var(--beige-light);
  border-left: 3px solid var(--brown);
  margin-top: 12px;
  padding: 12px 16px;
  border-radius: 10px;
  font-size: 14px;
  color: #444;
  animation: fadeIn 0.3s ease;
}

.activity-detail.active {
  display: block;
}

    .creche-info::before {
      content: "\1F476";
      position: absolute;
      top: -15px;
      right: -15px;
      background: #fff;
      border-radius: 50%;
      padding: 10px;
      font-size: 24px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }
    .pointage-header {
  display: flex;
  justify-content: space-around;
  gap: 20px;
  flex-wrap: wrap;
  background: linear-gradient(135deg, var(--beige), #fff);
  padding: 30px 20px;
  border-radius: 24px;
  box-shadow: 0 12px 28px rgba(0, 0, 0, 0.05);
  margin-bottom: 30px;
  animation: fadeIn 0.5s ease;
}

.pointage-box {
  display: flex;
  align-items: center;
  gap: 15px;
  background: #fff;
  padding: 15px 20px;
  border-radius: 20px;
  box-shadow: 0 6px 14px rgba(0, 0, 0, 0.06);
  transition: transform 0.3s ease;
  min-width: 240px;
  flex: 1;
}

.pointage-box:hover {
  transform: translateY(-3px);
}

.pointage-box i {
  font-size: 32px;
  color: var(--brown);
  flex-shrink: 0;
}

.pointage-label {
  font-size: 14px;
  color: #888;
  margin: 0;
}

.pointage-value {
  font-size: 24px;
  font-weight: 700;
  color: var(--brown-dark);
  margin: 2px 0 0;
}

    .badge {
      background: var(--brown);
      padding: 6px 16px;
      border-radius: 30px;
      font-size: 14px;
      color: white;
    }
    .enfant-card {
      display: flex;
      justify-content: space-between;
      align-items: center;
      background: white;
      border-radius: 16px;
      padding: 20px;
      box-shadow: 0 10px 24px rgba(0,0,0,0.07);
      margin-bottom: 20px;
      transition: transform 0.3s;
    }
    .enfant-card:hover {
      transform: scale(1.01);
    }
    .enfant-info {
      display: flex;
      align-items: center;
      gap: 18px;
    }
    .enfant-photo {
      width: 70px;
      height: 70px;
      border-radius: 50%;
      object-fit: cover;
      border: 3px solid var(--brown);
    }
    .enfant-name {
      font-family: 'Playwrite GB S', cursive;
      font-size: 26px;
      font-weight: 900;
      color: #333;
    }
    .enfant-age {
      font-size: 14px;
      color: #777;
    }
    .contrat-heure {
      font-size: 14px;
      margin-top: 6px;
      color: #444;
    }
    .alert-depassement {
      color: #e74c3c;
      font-weight: bold;
      display: inline-flex;
      align-items: center;
      gap: 5px;
    }
    .btn-planning {
      background-color: var(--brown);
      border: none;
      color: white;
      padding: 10px 20px;
      border-radius: 24px;
      font-weight: 600;
      transition: background-color 0.3s ease;
    }
    .btn-planning:hover {
      background-color: var(--brown-dark);
    }
 
    @keyframes fadeIn {
      0% { opacity: 0; transform: translateY(20px); }
      100% { opacity: 1; transform: translateY(0); }
    }
    @keyframes slideIn {
      0% { opacity: 0; transform: translateX(-20px); }
      100% { opacity: 1; transform: translateX(0); }
    }

    .main-content {
      margin-left: 85px;
      padding: 40px;
      flex: 1;
    }
    .dashboard-mini {
      display: flex;
      justify-content: space-around;
      flex-wrap: wrap;
      margin-bottom: 40px;
    }
    .dashboard-card {
      background: white;
      border-radius: 20px;
      padding: 25px;
      text-align: center;
      width: 220px;
      margin: 10px;
      box-shadow: 0 8px 20px rgba(0,0,0,0.08);
    }
    .dashboard-card h3 {
      font-size: 36px;
      margin: 0;
      color: var(--brown);
    }
    .dashboard-card p {
      margin-top: 10px;
      color: #555;
      font-size: 14px;
    }
    .creche-card {
  background: white;
  border-radius: 24px;
  padding: 30px;
  box-shadow: 0 12px 30px rgba(0, 0, 0, 0.05);
  margin-bottom: 40px;
  animation: fadeIn 0.6s ease;
}

.creche-header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  border-bottom: 2px solid #f4e2d8;
  padding-bottom: 16px;
  margin-bottom: 20px;
}

.creche-header h2 {
  font-size: 28px;
  color: var(--brown);
  font-weight: 800;
  margin: 0;
}

.status-badge {
  background-color: var(--highlight);
  color: var(--brown-dark);
  padding: 6px 14px;
  border-radius: 20px;
  font-weight: bold;
  font-size: 14px;
}

.creche-details {
  display: flex;
  justify-content: space-between;
  flex-wrap: wrap;
  gap: 30px;
}

.creche-details > div {
  flex: 1;
  min-width: 180px;
}

.creche-details p {
  margin: 0;
  font-size: 15px;
  color: #444;
}

.creche-details p:first-child {
  font-weight: bold;
  font-size: 13px;
  color: #888;
  margin-bottom: 4px;
}
.welcome-banner {
  background: white;
  padding: 30px 40px;
  border-radius: 24px;
  box-shadow: 0 12px 28px rgba(0,0,0,0.05);
  margin-bottom: 40px;
  animation: fadeIn 0.6s ease;
}

.welcome-banner h1 {
  font-size: 28px;
  font-weight: 800;
  color: var(--brown);
  margin-bottom: 16px;
}

.welcome-banner p {
  font-size: 16px;
  color: #555;
  line-height: 1.6;
}
.top-banner-blur {
  height: 140px;
  width: 100%;
  background: url('creche2.png') center center/cover no-repeat;
  position: relative;
  border-radius: 0 0 24px 24px;
  margin-bottom: 30px;
  z-index: 0;
  overflow: hidden;
  cursor: pointer; /* pour montrer que c'est cliquable */
}

.top-banner-blur::after {
  content: "";
  position: absolute;
  inset: 0;
  background-color: rgba(253, 249, 243, 0.6); /* plus transparent */
  backdrop-filter: blur(1px); 
  z-index: 1;
}.notif-toggle-wrapper {
  position: relative;
  margin-bottom: 30px;
  text-align: right;
}

.notif-toggle {
  background-color: var(--brown);
  border: none;
  color: white;
  font-size: 20px;
  border-radius: 50%;
  padding: 10px 13px;
  cursor: pointer;
  position: relative;
  transition: background-color 0.3s ease;
}

.notif-toggle:hover {
  background-color: var(--brown-dark);
}

.notif-badge {
  position: absolute;
  top: -4px;
  right: -4px;
  background: red;
  color: white;
  border-radius: 50%;
  padding: 2px 7px;
  font-size: 12px;
  font-weight: bold;
  box-shadow: 0 2px 6px rgba(0,0,0,0.2);
}

.notif-panel {
  display: none;
  position: absolute;
  right: 0;
  top: 50px;
  width: 300px;
  background: white;
  border-radius: 16px;
  box-shadow: 0 12px 28px rgba(0,0,0,0.08);
  padding: 20px;
  z-index: 999;
  animation: fadeIn 0.3s ease;
}

.notif-panel h4 {
  font-size: 18px;
  font-weight: bold;
  color: var(--brown);
  margin-bottom: 15px;
}

.notif-list {
  list-style: none;
  padding: 0;
  margin: 0;
}

.notif-list li {
  font-size: 14px;
  margin-bottom: 12px;
  padding-bottom: 12px;
  border-bottom: 1px solid #eee;
}

.notif-list li span {
  display: block;
  color: #555;
  margin-bottom: 6px;
}

.notif-list li a {
  font-size: 13px;
  color: var(--brown-dark);
  text-decoration: underline;
  font-weight: 600;
}



  </style>
</head>
<body>
  <div class="sidebar">
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

  <div class="top-banner-blur" onclick="document.getElementById('bgInput').click();"></div>
<input type="file" id="bgInput" accept="image/*" style="display: none" onchange="changeBannerBackground(this)">



  <div class="creche-card">
  <div class="creche-header">
    <h2> Mantes à l'Ô - Mantes-la-Jolie</h2>
    <span class="status-badge">Active</span>
  </div>
  <div class="creche-details">
    <div>
      <p><strong>Responsable</strong></p>
      <p>Marie Dupont</p>
    </div>
    <div>
      <p><strong>Capacité</strong></p>
      <p>25 enfants</p>
    </div>
    <div>
      <p><strong>Adresse</strong></p>
      <p>10 Rue Saint-Roch, 78200 Mantes-la-Jolie</p>
    </div>
  </div>
</div>


<div class="notif-toggle-wrapper">
  <button id="notifToggle" class="notif-toggle">
    <i class="bi bi-bell"></i>
    <span id="notifBadge" class="notif-badge">3</span>
  </button>
  <div class="notif-panel" id="notifPanel">
    <h4>Notifications récentes</h4>
    <ul class="notif-list" id="notifList">
      <li>
        <span>📄 Manque carte d'identité pour <strong>Yanis</strong></span>
        <a href="PcrechePageENFANT.php?id=2">Voir le dossier</a>
      </li>
      <li>
        <span>💊 Ordonnance expirée pour <strong>Lina</strong></span>
        <a href="PcrechePageENFANT.php?id=3">Gérer l’enfant</a>
      </li>
      <li>
        <span>🧾 Paiement non reçu pour <strong>Mohamed</strong></span>
        <a href="PcrechePageENFANT.php?id=4">Consulter</a>
      </li>
    </ul>
  </div>
</div>


<!-- Incrementation chiffre surchaque crèches -->

    <div class="main-content">
    <div class="dashboard-mini">
      <div class="dashboard-card">
        <h3>16</h3>
        <p>Enfants inscrits</p>
      </div>
   
      <div class="dashboard-card">
        <h3>2</h3>
        <p>Demandes en cours</p>
      </div>
      <div class="dashboard-card">
        <h3>6</h3>
        <p>Employés actifs</p>
      </div>
    </div>
<!-- FIN Incrementation chiffre surchaque crèches -->



<div class="pointage-header">
  <div class="pointage-box">
    <i class="bi bi-people-fill"></i>
    <div>
      <p class="pointage-label">Enfants prévus</p>
      <p class="pointage-value">25</p>
    </div>
  </div>
  <div class="pointage-box">
    <i class="bi bi-person-check-fill"></i>
    <div>
      <p class="pointage-label">Présents aujourd’hui</p>
      <p class="pointage-value">20</p>
    </div>
  </div>
</div>


    <div id="enfantList" style="margin-top: 20px;"></div>

<!-- Petit spinner de chargement -->
<div id="spinner" style="text-align: center; margin-top: 40px;">
  <div class="spinner-border text-warning" role="status" style="width: 3rem; height: 3rem;">
    <span class="visually-hidden">Chargement...</span>
  </div>
</div>




   <!-- DEBUT PLANNING----------- -->
   <div class="planning-week">
  <h4>🗓️ Planning de la semaine</h4>

  <!-- Exemple jour -->
  <div class="day-card">
    <div class="day-top">
      <span class="day-name">Lundi</span>
      <span class="day-hours">08:30 - 18:00</span>
    </div>
    <div class="day-info">
      <span class="meal">🍗 Poulet-riz</span>
      <span class="activity">🌳 Parc</span>
      <button onclick="toggleActivityDetails('monday-details')">Voir +</button>
    </div>
    <div id="monday-details" class="activity-detail">
      Sortie au parc avec jeux collectifs, temps calme après le déjeuner, ateliers sensoriels.
    </div>
  </div>

  <!-- Duplique en changeant les IDs -->
  <div class="day-card">
    <div class="day-top">
      <span class="day-name">Mardi</span>
      <span class="day-hours">08:30 - 18:00</span>
    </div>
    <div class="day-info">
      <span class="meal">🐟 Poisson-purée</span>
      <span class="activity">📖 Lecture</span>
      <button onclick="toggleActivityDetails('tuesday-details')">Voir +</button>
    </div>
    <div id="tuesday-details" class="activity-detail">
      Lecture d’histoires, mime, initiation à la lecture sonore, musique douce.
    </div>
  </div>

  <div class="day-card">
    <div class="day-top">
      <span class="day-name">Mercredi</span>
      <span class="day-hours closed">Fermé</span>
    </div>
  </div>

  <div class="day-card">
    <div class="day-top">
      <span class="day-name">Jeudi</span>
      <span class="day-hours">08:30 - 18:00</span>
    </div>
    <div class="day-info">
      <span class="meal">🍝 Pâtes bolo</span>
      <span class="activity">📚 Bibliothèque</span>
      <button onclick="toggleActivityDetails('thursday-details')">Voir +</button>
    </div>
    <div id="thursday-details" class="activity-detail">
      Sortie à la bibliothèque, lecture en groupe, coloriage sur le thème du livre.
    </div>
  </div>

  <div class="day-card">
    <div class="day-top">
      <span class="day-name">Vendredi</span>
      <span class="day-hours">08:30 - 17:30</span>
    </div>
    <div class="day-info">
      <span class="meal">🥦 Gratin légumes</span>
      <span class="activity">🎶 Chant</span>
      <button onclick="toggleActivityDetails('friday-details')">Voir +</button>
    </div>
    <div id="friday-details" class="activity-detail">
      Chants collectifs, instruments, atelier musical, relaxation sonore.
    </div>
  </div>
</div>
 <!-- FIN PLANNING----------- -->



<script>
const enfants = <?php
  try {
    $pdo = new PDO('mysql:host=localhost;dbname=groupe_bulles_deveil;charset=utf8', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // On filtre uniquement la structure "Mantes à l'Ô - Mantes-la-Jolie" + statut Inscrit
    $stmt = $pdo->prepare("SELECT id, prenom_enfant, date_naissance_enfant FROM inscription_enfant WHERE statut = 'Inscrit' AND structure LIKE :structure");
    $structure = "%Mantes à l'Ô - Mantes-la-Jolie%";
    $stmt->bindParam(':structure', $structure, PDO::PARAM_STR);
    $stmt->execute();

    $enfants = [];

    function calculer_age_precis($date_naissance) {
      $date_naissance = new DateTime($date_naissance);
      $aujourdhui = new DateTime();
      $intervalle = $aujourdhui->diff($date_naissance);

      $ans = $intervalle->y;
      $mois = $intervalle->m;
      $total_mois = ($ans * 12) + $mois;

      if ($ans === 0 && $mois === 0) {
        $affichage = "moins d'1 mois";
      } elseif ($ans === 0) {
        $affichage = "$mois mois";
      } elseif ($mois === 0) {
        $affichage = "$ans an" . ($ans > 1 ? "s" : "");
      } else {
        $affichage = "$ans an" . ($ans > 1 ? "s" : "") . " $mois mois";
      }

      return [$affichage, $total_mois];
    }

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
      list($age_texte, $age_mois) = calculer_age_precis($row['date_naissance_enfant']);

      // On prépare l'objet enfant
      $enfants[] = [
          'id' => $row['id'],
          'nom' => $row['prenom_enfant'],
          'age' => $age_texte,
          'age_mois' => $age_mois
      ];
    }

    echo json_encode($enfants, JSON_UNESCAPED_UNICODE);
  } catch (PDOException $e) {
    echo "[]"; // En cas d'erreur : vide
  }
?>;

function renderEnfants(list) {
  const container = document.getElementById('enfantList');
  const spinner = document.getElementById('spinner');
  container.innerHTML = '';
  spinner.style.display = 'none'; // Cache le spinner

  if (list.length === 0) {
    container.innerHTML = "<p style='text-align:center; font-weight:bold; color:#9e6d4b;'>Aucun enfant trouvé pour cette crèche.</p>";
    return;
  }

  list.forEach(e => {
    container.innerHTML += `
      <div class="enfant-card">
        <div class="enfant-info">
          <img src="moussa8.png" alt="photo enfant" class="enfant-photo">
          <div>
            <div class="enfant-name">${e.nom}</div>
            <div class="enfant-age">${e.age}</div>
            <div class="contrat-heure">-</div>
          </div>
        </div>
        <button class="btn-planning" onclick="window.location.href='PcrechePageENFANT.php?id=${e.id}'">Page de l'enfant</button>
      </div>
    `;
  });
}

// On attend un petit peu pour simuler un vrai chargement
setTimeout(() => {
  renderEnfants(enfants);
}, 800); // 0,8s
</script>
</div>
  </div>
  <script>
  const notifToggle = document.getElementById('notifToggle');
  const notifPanel = document.getElementById('notifPanel');
  const notifBadge = document.getElementById('notifBadge');
  const notifList = document.getElementById('notifList');

  // Mise à jour du badge selon le nombre de notifs
  function updateNotifCount() {
    const count = notifList.querySelectorAll('li').length;
    notifBadge.innerText = count;
    notifBadge.style.display = count > 0 ? 'inline-block' : 'none';
  }

  // Toggle du panneau et suppression badge (comme "lu")
  notifToggle.addEventListener('click', () => {
    const isVisible = notifPanel.style.display === 'block';
    notifPanel.style.display = isVisible ? 'none' : 'block';

    if (!isVisible) {
      notifBadge.style.display = 'none';
    }
  });

  // Fermer si clic extérieur
  document.addEventListener('click', function(event) {
    if (!notifToggle.contains(event.target) && !notifPanel.contains(event.target)) {
      notifPanel.style.display = 'none';
    }
  });

  // Initialisation
  updateNotifCount();
</script>

</body>
</html>
