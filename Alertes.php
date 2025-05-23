<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Alertes générales · BabyFarm</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: linear-gradient(135deg, #fdf9f3, #fffdf8);
      font-family: 'Inter', sans-serif;
      padding: 40px;
    }
    h1 {
      font-weight: 800;
      color: #b38760;
      margin-bottom: 30px;
    }
    .search-bar {
      display: flex;
      gap: 20px;
      margin-bottom: 30px;
    }
    .alert-card {
      background: #fff;
      border-left: 6px solid #b38760;
      padding: 20px;
      margin-bottom: 20px;
      border-radius: 16px;
      box-shadow: 0 6px 18px rgba(0,0,0,0.05);
      transition: 0.3s;
    }
    .alert-card:hover {
      background: #fffaf5;
    }
    .alert-date {
      font-size: 13px;
      color: #888;
      margin-bottom: 8px;
    }
    .alert-title {
      font-weight: bold;
      color: #9e6d4b;
    }
    .alert-message {
      margin-top: 5px;
    }
    .alert-type {
      font-size: 12px;
      font-weight: 600;
      padding: 4px 10px;
      border-radius: 20px;
      display: inline-block;
      margin-top: 10px;
      background: #f4e2d8;
      color: #9e6d4b;
    }
    .back-btn {
  background: #b38760;
  color: white;
  border: none;
  padding: 10px 20px;
  border-radius: 20px;
  font-weight: bold;
  text-decoration: none;
  margin-bottom: 20px;
  display: inline-block;
}
.back-btn:hover {
  background: #9e6d4b;
}

  </style>
</head>
<body>
<a href="ParametreAdmin.php" class="back-btn">&larr; Retour</a>
  <div class="container">
    <h1>Alertes Générales</h1>

    <div class="search-bar">
      <input type="text" id="searchInput" class="form-control" placeholder="Rechercher une alerte...">
      <select id="typeFilter" class="form-select">
        <option value="">Tous les types</option>
        <option value="parent">Parent</option>
        <option value="enfant">Enfant</option>
        <option value="auxiliaire">Auxiliaire</option>
      </select>
    </div>

    <div id="alertContainer"></div>
  </div>

  <script>
    const alertes = [
      { date: "2025-05-21", titre: "Ordonnance expirée", message: "Lina a besoin d'une nouvelle ordonnance.", type: "enfant" },
      { date: "2025-05-20", titre: "Paiement manquant", message: "Mohamed n’a pas encore réglé sa facture.", type: "parent" },
      { date: "2025-05-18", titre: "Retard d’arrivée", message: "Yacine est arrivé avec 30 minutes de retard.", type: "auxiliaire" },
      { date: "2025-05-19", titre: "Absence prévue", message: "Madame Dupont sera absente vendredi.", type: "parent" },
      { date: "2025-05-17", titre: "Vaccin à renouveler", message: "Rappel de vaccin nécessaire pour Ibrahim.", type: "enfant" },
    ];

    function renderAlertes(list) {
      const container = document.getElementById("alertContainer");
      container.innerHTML = "";
      list.forEach(a => {
        container.innerHTML += `
          <div class="alert-card">
            <div class="alert-date">📅 ${new Date(a.date).toLocaleDateString('fr-FR')}</div>
            <div class="alert-title">${a.titre}</div>
            <div class="alert-message">${a.message}</div>
            <div class="alert-type">${a.type}</div>
          </div>
        `;
      });
    }

    function filterAlertes() {
      const query = document.getElementById("searchInput").value.toLowerCase();
      const type = document.getElementById("typeFilter").value;
      let filtered = alertes
        .filter(a => a.titre.toLowerCase().includes(query) || a.message.toLowerCase().includes(query))
        .filter(a => (type ? a.type === type : true))
        .sort((a, b) => new Date(b.date) - new Date(a.date));
      renderAlertes(filtered);
    }

    document.getElementById("searchInput").addEventListener("input", filterAlertes);
    document.getElementById("typeFilter").addEventListener("change", filterAlertes);

    // Initial display
    filterAlertes();
  </script>
</body>
</html>
