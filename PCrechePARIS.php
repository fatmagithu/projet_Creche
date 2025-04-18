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
      height: 100vh;
      position: fixed;
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
      margin-left: 160px;
      flex: 1;
      padding: 40px;
      background: linear-gradient(to bottom right, var(--beige-light), var(--beige));
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
  <a href="Ptest22.php">
  <img src="bebe.png" alt="bebe" class="icon active">
</a>

<a href="PEquipe1.php">
  <img src="gens.png" alt="bebe" class="icon">
</a>
<a href="PDossierAdmin.php"><img src="dossier.png" alt="dossier" class="icon"></a>
    <img src="message.png" alt="message" class="icon">
    <img src="parametre.png" alt="parametre" class="icon">
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

    <div>
      <div class="enfant-card">
        <div class="enfant-info">
          <img src="moussa8.png" alt="photo enfant" class="enfant-photo">
          <div>
            <div class="enfant-name">Marie</div>
            <div class="enfant-age">3 ans</div>
            <div class="contrat-heure">160h · 175h <span class="alert-depassement"><i class="bi bi-exclamation-triangle-fill"></i> Dépassement !</span></div>
          </div>
        </div>
        <button class="btn-planning" onclick="window.location.href='PcrechePageENFANT.php'">Page de l'enfant</button>
      </div>

      <div class="enfant-card">
        <div class="enfant-info">
          <img src="moussa13.png" alt="photo enfant" class="enfant-photo">
          <div>
            <div class="enfant-name">Axelle</div>
            <div class="enfant-age">2 ans</div>
            <div class="contrat-heure">140h · 110h</div>
          </div>
        </div>
        <button class="btn-planning">Page de l'enfant</button>
      </div>

      <div class="enfant-card">
        <div class="enfant-info">
          <img src="moussa14.png" alt="photo enfant" class="enfant-photo">
          <div>
            <div class="enfant-name">Thomas</div>
            <div class="enfant-age">1 an</div>
            <div class="contrat-heure">50h · 53h <span class="alert-depassement"><i class="bi bi-exclamation-triangle-fill"></i> +3h</span></div>
          </div>
        </div>
        <button class="btn-planning">Page de l'enfant</button>
      </div>
      <div class="enfant-card">
        <div class="enfant-info">
          <img src="Sohan4.jpg" alt="photo enfant" class="enfant-photo">
          <div>
            <div class="enfant-name">Mohamed</div>
            <div class="enfant-age">2 ans</div>
            <div class="contrat-heure">30h · 120h </div>
          </div>
        </div>
        <button class="btn-planning">Page de l'enfant</button>
      </div>     <div class="enfant-card">
        <div class="enfant-info">
          <img src="Sohan3.png" alt="photo enfant" class="enfant-photo">
          <div>
            <div class="enfant-name">Sohan</div>
            <div class="enfant-age">1 an</div>
            <div class="contrat-heure">50h · 153h </i> </span></div>
          </div>
        </div>
        <button class="btn-planning">Page de l'enfant</button>
      </div>     <div class="enfant-card">
        <div class="enfant-info">
          <img src="Sohan5.png" alt="photo enfant" class="enfant-photo">
          <div>
            <div class="enfant-name">Jonas</div>
            <div class="enfant-age">2 ans</div>
            <div class="contrat-heure">150h · 153h <span class="alert-depassement"><i class="bi bi-exclamation-triangle-fill"></i> +3h</span></div>
          </div>
        </div>
        <button class="btn-planning">Page de l'enfant</button>
      </div>     <div class="enfant-card">
        <div class="enfant-info">
          <img src="Sohan2.png" alt="photo enfant" class="enfant-photo">
          <div>
            <div class="enfant-name">Manel</div>
            <div class="enfant-age">3 ans</div>
            <div class="contrat-heure">150h · 153h </i></span></div>
          </div>
        </div>
        <button class="btn-planning">Page de l'enfant</button>
      </div>     <div class="enfant-card">
        <div class="enfant-info">
          <img src="Sohan6.png" alt="photo enfant" class="enfant-photo">
          <div>
            <div class="enfant-name">Yanis</div>
            <div class="enfant-age">3 ans</div>
            <div class="contrat-heure">150h · 153h <span class="alert-depassement"><i class="bi bi-exclamation-triangle-fill"></i></span></div>
          </div>
        </div>
        <button class="btn-planning">Page de l'enfant</button>
      </div>




    </div>
  </div>
</body>
</html>
