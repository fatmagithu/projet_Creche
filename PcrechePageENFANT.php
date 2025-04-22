<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Fiche Enfant - BabyFarm</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Playwrite+GB+S&family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
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
      display: flex;
      align-items: center;
      justify-content: center;
      min-height: 100vh;
      padding: 40px;
    }
    .container-fiche {
      width: 100%;
      max-width: 1100px;
      background: #fff;
      border-radius: 24px;
      box-shadow: 0 10px 30px rgba(0,0,0,0.08);
      padding: 50px;
      animation: fadeIn 0.7s ease-in-out;
    }
    .enfant-header {
      display: flex;
      align-items: center;
      gap: 30px;
      margin-bottom: 30px;
    }
    .enfant-photo {
      width: 120px;
      height: 120px;
      object-fit: cover;
      border-radius: 50%;
      border: 4px solid var(--brown);
    }
    .enfant-name {
      font-family: 'Playwrite GB S', cursive;
      font-size: 36px;
      font-weight: 800;
      color: var(--brown);
    }
    .section-title {
      font-weight: 700;
      color: var(--brown);
      font-size: 22px;
      margin-top: 30px;
      border-bottom: 2px solid #e7dcd1;
      padding-bottom: 6px;
    }
    .info-block {
      margin-top: 15px;
      font-size: 16px;
    }
    .badge-info {
      background-color: #f1e6de;
      color: var(--brown-dark);
      font-weight: 600;
      border-radius: 20px;
      padding: 4px 14px;
      font-size: 14px;
    }
    .progress {
      height: 16px;
      background-color: #e9ecef;
      border-radius: 10px;
      overflow: hidden;
    }
    .progress-bar {
      background-color: var(--brown);
    }
    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(30px); }
      to { opacity: 1; transform: translateY(0); }
    }
  </style>
</head>
<body>
  <div class="container-fiche">
    <div class="enfant-header">
      <img src="moussa8.png" alt="Photo enfant" class="enfant-photo">
      <div>
        <div class="enfant-name">Marie Bastien</div>
        <div>Âge : <strong>2 ans</strong></div>
        <div>Type de contrat : <span class="badge-info">Temps plein - 160h/mois</span></div>
      </div>
    </div>
    <div class="section-title">👨‍👩‍👧 Informations parents</div>
    <div class="info-block">Nom du parent référent : <strong>Claire Bastien</strong></div>
    <div class="info-block">Téléphone : <strong>06 23 45 67 89</strong></div>
    <div class="info-block">Email : <strong>claire.bastien@email.com</strong></div>
    <div class="section-title">🍎 Santé & Allergies</div>
    <div class="info-block">Allergies : <strong>Gluten</strong></div>
    <div class="info-block">Maladies chroniques : <strong>Asthme</strong></div>
    <div class="info-block">Traitement régulier : <strong>Ventoline matin et soir</strong></div>
    <div class="section-title">📊 Contrat & Suivi des heures</div>
    <div class="info-block">Heures prévues ce mois : <strong>160h</strong></div>
    <div class="info-block">Heures effectuées : <strong>120h</strong></div>
    <div class="progress mt-2 mb-2">
      <div class="progress-bar" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
    </div>
    <div class="info-block text-muted">75% du contrat effectué</div>
  </div>
</body>
</html>
