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
    }
    .planning-week {
      background: #ffffff;
      padding: 25px 35px;
      border-radius: 20px;
      box-shadow: 0 12px 24px rgba(0, 0, 0, 0.08);
      margin-bottom: 35px;
    }
    .planning-week h4 {
      font-size: 26px;
      margin-bottom: 20px;
      font-weight: 800;
      color: var(--brown);
    }
    .planning-week .day {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 12px 0;
      border-bottom: 1px dashed #ddd;
      font-size: 17px;
    }
    .planning-week .day button {
      background-color: transparent;
      border: none;
      color: var(--brown);
      font-weight: bold;
      cursor: pointer;
      font-size: 14px;
    }
    .activity-detail {
      display: none;
      background: var(--beige);
      border-left: 4px solid var(--brown);
      margin: 10px 0;
      padding: 10px 15px;
      border-radius: 10px;
      font-size: 14px;
      color: #333;
    }
    .activity-detail.active {
      display: block;
    }
    .creche-info {
      background: var(--beige);
      border-left: 5px solid var(--brown);
      padding: 30px;
      border-radius: 20px;
      margin-bottom: 35px;
      position: relative;
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
      justify-content: space-between;
      align-items: center;
      background: #ffffff;
      padding: 20px;
      border-radius: 16px;
      box-shadow: 0 8px 18px rgba(0, 0, 0, 0.06);
      margin-bottom: 25px;
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
    <div class="planning-week">
      <h4>🗓️ Planning de la semaine</h4>
      <div class="day">
        <span>Lundi</span>
        <span>08:30 - 18:00 · Poulet-riz · Parc <button onclick="toggleActivityDetails('monday-details')">Détails</button></span>
      </div>
      <div id="monday-details" class="activity-detail">Activité prévue : Sortie au parc avec jeux collectifs, temps calme après le déjeuner, ateliers sensoriels.</div>

      <div class="day">
        <span>Mardi</span>
        <span>08:30 - 18:00 · Poisson-purée · Lecture <button onclick="toggleActivityDetails('tuesday-details')">Détails</button></span>
      </div>
      <div id="tuesday-details" class="activity-detail">Lecture d’histoires, mime avec les enfants, initiation à la lecture sonore, séance calme en musique douce.</div>

      <div class="day">
        <span>Mercredi</span>
        <span>Fermé</span>
      </div>

      <div class="day">
        <span>Jeudi</span>
        <span>08:30 - 18:00 · Pâtes bolo · Bibliothèque <button onclick="toggleActivityDetails('thursday-details')">Détails</button></span>
      </div>
      <div id="thursday-details" class="activity-detail">Sortie à la bibliothèque municipale, lecture en groupe, activité coloriage sur le thème du livre.</div>

      <div class="day">
        <span>Vendredi</span>
        <span>08:30 - 17:30 · Gratin légumes · Chant <button onclick="toggleActivityDetails('friday-details')">Détails</button></span>
      </div>
      <div id="friday-details" class="activity-detail">Chants collectifs, instruments de musique, atelier musical créatif, retour au calme avec relaxation sonore.</div>
    </div>

    <div class="creche-info">
      <h2>👶 Crèche Mantes à l'Ô - Mantes-la-Jolie </h2>
      <p><strong>Responsable :</strong> Marie Dupont · <strong>Capacité :</strong> 25 enfants · <strong>Adresse :</strong> 10 Rue Saint-Roch, 78200 Mantes-la-Jolie</p>
    </div>

    <div class="pointage-header">
      <h3>Total prévu : <span class="badge">25 enfants</span></h3>
      <h3>Total présent : <span class="badge">20 enfants</span></h3>
    </div>

    <div id="enfantList" style="margin-top: 20px;"></div>

<!-- Petit spinner de chargement -->
<div id="spinner" style="text-align: center; margin-top: 40px;">
  <div class="spinner-border text-warning" role="status" style="width: 3rem; height: 3rem;">
    <span class="visually-hidden">Chargement...</span>
  </div>
</div>

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
</body>
</html>
