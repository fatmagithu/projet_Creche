<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Crèche Paris - BabyFarm</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Playwrite+GB+S&family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
  
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
    .sidebar .icon {
      width: 60px;
      height: 64px;
      margin: 20px 0;
      object-fit: contain;
      cursor: pointer;
      transition: transform 0.3s, filter 0.3s;
    }
    .sidebar .icon.active {
      transform: scale(1.1);
      filter: drop-shadow(0 0 5px #3b925f);
    }
    .main-content {
      flex: 1;
      padding: 40px;
      background-image: url('creche-fond.png');
      background-size: cover;
      background-repeat: no-repeat;
    }
    .planning-week {
      background: #fff;
      padding: 25px 35px;
      border-radius: 24px;
      box-shadow: 0 8px 24px rgba(0,0,0,0.06);
      margin-bottom: 35px;
    }
    .planning-week h4 {
      font-size: 22px;
      margin-bottom: 20px;
      font-weight: 700;
      color: #2c7a4b;
    }
    .planning-week .day {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 12px 0;
      border-bottom: 1px dashed #ddd;
      font-size: 16px;
    }
    .planning-week .day span:last-child {
      text-align: right;
      color: #555;
    }
    .creche-info {
      background: linear-gradient(to right, #f5fef9, #e6f5ed);
      border-radius: 24px;
      padding: 30px 35px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
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
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
      padding: 10px;
      font-size: 20px;
    }
    .creche-info h2 {
      font-size: 30px;
      color: #2c7a4b;
      margin-bottom: 12px;
    }
    .stats {
      display: flex;
      gap: 20px;
      margin-bottom: 30px;
    }
    .stat-card {
      background: #ffffff;
      padding: 25px;
      border-radius: 24px;
      flex: 1;
      text-align: center;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
      transition: 0.3s;
    }
    .stat-card:hover {
      transform: translateY(-4px);
      background: #f0fbf5;
    }
    .stat-card h2 {
      font-size: 26px;
      color: #2c7a4b;
      font-weight: 700;
      margin-bottom: 6px;
    }
    .pointage-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 25px;
      background: #fff;
      padding: 20px 30px;
      border-radius: 24px;
      box-shadow: 0 8px 22px rgba(0, 0, 0, 0.04);
    }
    .pointage-header h3 {
      font-size: 22px;
      color: #444;
    }
    .badge {
      background: #3b925f;
      color: white;
      font-size: 14px;
      padding: 5px 15px;
      border-radius: 20px;
    }
    .enfant-card {
      background: #ffffff;
      border-radius: 18px;
      box-shadow: 0 10px 24px rgba(0,0,0,0.05);
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 18px 28px;
      margin-bottom: 18px;
      border-left: 8px solid #70c8a0;
    }
    .enfant-info {
      display: flex;
      align-items: center;
      gap: 20px;
    }
    .enfant-photo {
      width: 64px;
      height: 64px;
      border-radius: 50%;
      object-fit: cover;
      border: 2px solid #70c8a0;
    }
    .enfant-name {
      font-weight: 800;
      font-size: 20px;
      margin-bottom: 4px;
      font-family: 'Playwrite GB S', cursive;
    }
    .enfant-age {
      font-size: 14px;
      color: #777;
    }
    .btn-planning {
      background-color: #3b925f;
      color: white;
      border: none;
      padding: 10px 22px;
      border-radius: 30px;
      font-weight: 600;
      font-size: 14px;
      transition: 0.3s ease;
    }
    .btn-planning:hover {
      background-color: #317b50;
    }
    .contrat-heure {
      font-size: 13px;
      color: #555;
      margin-top: 5px;
    }
    .alert-depassement {
      color: red;
      font-weight: bold;
      display: flex;
      align-items: center;
      gap: 5px;
    }
    .alert-depassement i {
      color: red;
      font-size: 16px;
    }
  </style>
</head>
<body>
  <div class="sidebar">
    <img src="bebe.png" alt="bebe" class="icon active">
    <img src="gens.png" alt="gens" class="icon">
    <img src="dossier.png" alt="dossier" class="icon">
    <img src="message.png" alt="message" class="icon">
    <img src="parametre.png" alt="parametre" class="icon">
  </div>

  <div class="main-content">
    <div class="planning-week">
      <h4>Planning de la semaine</h4>
      <div class="day"><span>Lundi</span><span>08:30 - 18:00 · Déjeuner : Poulet-riz · Sortie : Parc</span></div>
      <div class="day"><span>Mardi</span><span>08:30 - 18:00 · Déjeuner : Poisson-purée · Activité : Lecture</span></div>
      <div class="day"><span>Mercredi</span><span>Fermé</span></div>
      <div class="day"><span>Jeudi</span><span>08:30 - 18:00 · Déjeuner : Pâtes bolognaise · Sortie : Bibliothèque</span></div>
      <div class="day"><span>Vendredi</span><span>08:30 - 17:30 · Déjeuner : Gratin de légumes · Activité : Chant</span></div>
    </div>

    <div class="creche-info">
      <h2>Crèche Paris</h2>
      <p>Responsable : Marie Dupont &nbsp;·&nbsp; Capacité : 25 enfants &nbsp;·&nbsp; Adresse : 14 rue de Paris, 75001 Paris</p>
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
            <div class="contrat-heure">Heures prévues : 160h · Réalisées : 175h <span class="alert-depassement"><i class="bi bi-exclamation-triangle-fill"></i> Dépassement !🚨</span></div>
          </div>
        </div>
        <button class="btn-planning">Page de l'enfant</button>
      </div>

      <div class="enfant-card">
        <div class="enfant-info">
          <img src="moussa13.png" alt="photo enfant" class="enfant-photo">
          <div>
            <div class="enfant-name">Axelle</div>
            <div class="enfant-age">2 ans</div>
            <div class="contrat-heure">Heures prévues : 140h · Réalisées : 110h</div>
          </div>
        </div>
        <button class="btn-planning">Page de l'enfant</button>
      </div>

      <div class="enfant-card">
        <div class="enfant-info">
          <img src="moussa14.png" alt="photo enfant" class="enfant-photo">
          <div>
            <div class="enfant-name">Thomas</div>
            <div class="enfant-age">3 ans</div>
            <div class="contrat-heure">Heures prévues : 150h · Réalisées : 153h <span class="alert-depassement"><i class="bi bi-exclamation-triangle-fill"></i> +3h🚨</span></div>
          </div>
        </div>
        <button class="btn-planning">Page de l'enfant</button>
      </div>
    </div>
  </div>
</body>
</html>