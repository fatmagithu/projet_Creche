<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pointage Admin · BabyFarm</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
  <style>
    body {
      background: linear-gradient(135deg, #fdf9f3, #fffdf8);
      font-family: 'Inter', sans-serif;
      padding: 40px;
    }
    .search-filter-bar {
      display: flex;
      flex-wrap: wrap;
      gap: 20px;
      margin-bottom: 30px;
    }
    .table-container {
      background: white;
      border-radius: 24px;
      box-shadow: 0 12px 28px rgba(0, 0, 0, 0.05);
      padding: 30px;
    }
    table {
      width: 100%;
      border-collapse: collapse;
    }
    th, td {
      padding: 14px;
      text-align: left;
      border-bottom: 1px solid #eee;
    }
    th {
      background: #f4e2d8;
      color: #9e6d4b;
      font-weight: bold;
    }
    tr:hover {
      background-color: #fff8f2;
      cursor: pointer;
    }
    .badge-hour {
      background: #b38760;
      color: white;
      padding: 6px 12px;
      border-radius: 20px;
      font-size: 13px;
    }
    .form-control, .form-select {
      border-radius: 16px;
      padding: 10px 16px;
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
    <h1 class="mb-4" style="color: #9e6d4b; font-weight: 800;"> Suivi des Heures - Crèche</h1>

    <div class="search-filter-bar">
      <input type="text" id="searchInput" class="form-control" placeholder="Rechercher un enfant">
      <select id="filterHeures" class="form-select">
        <option value="">Toutes les tranches</option>
        <option value="moins20">Moins de 20h</option>
        <option value="20a40">20h à 40h</option>
        <option value="plus40">Plus de 40h</option>
      </select>
      <select id="filterCreche" class="form-select">
        <option value="">Toutes les crèches</option>
        <option value="Crèche 1">Crèche 1</option>
        <option value="Crèche 2">Crèche 2</option>
        <option value="Crèche 3">Crèche 3</option>
        <option value="Crèche 4">Crèche 4</option>
        <option value="Crèche 5">Crèche 5</option>
        <option value="Crèche 6">Crèche 6</option>
        <option value="Crèche 7">Crèche 7</option>
        <option value="Crèche 8">Crèche 8</option>
      </select>
    </div>

    <div class="table-container">
      <table id="pointageTable">
        <thead>
          <tr>
            <th>Prénom</th>
            <th>Age</th>
            <th>Crèche</th>
            <th>Heures cette semaine</th>
          </tr>
        </thead>
        <tbody id="tableBody"></tbody>
      </table>
    </div>
  </div>

  <script>
    const enfants = Array.from({ length: 50 }, (_, i) => {
      const prenoms = ["Yanis", "Lina", "Mohamed", "Manel", "Yoan", "Camille", "Inès", "Ibrahim", "Nora", "Léo"];
      const creches = ["Crèche 1", "Crèche 2", "Crèche 3", "Crèche 4", "Crèche 5", "Crèche 6", "Crèche 7", "Crèche 8"];
      const prenom = prenoms[Math.floor(Math.random() * prenoms.length)] + " " + (i + 1);
      const age = Math.floor(Math.random() * 4) + 1 + " ans";
      const heures = Math.floor(Math.random() * 50);
      const creche = creches[Math.floor(Math.random() * creches.length)];
      return { id: i + 1, prenom, age, heures, creche };
    });

    function renderTable(list) {
      const tbody = document.getElementById("tableBody");
      tbody.innerHTML = "";
      list.forEach(e => {
        tbody.innerHTML += `
          <tr onclick="window.location.href='pointageperso.php?id=${e.id}'">
            <td>${e.prenom}</td>
            <td>${e.age}</td>
            <td>${e.creche}</td>
            <td><span class="badge-hour">${e.heures}h</span></td>
          </tr>
        `;
      });
    }

    function filterTable() {
      const query = document.getElementById("searchInput").value.toLowerCase();
      const tranche = document.getElementById("filterHeures").value;
      const crecheFilter = document.getElementById("filterCreche").value;

      let filtered = enfants.filter(e => e.prenom.toLowerCase().includes(query));

      if (tranche === "moins20") filtered = filtered.filter(e => e.heures < 20);
      else if (tranche === "20a40") filtered = filtered.filter(e => e.heures >= 20 && e.heures <= 40);
      else if (tranche === "plus40") filtered = filtered.filter(e => e.heures > 40);

      if (crecheFilter) filtered = filtered.filter(e => e.creche === crecheFilter);

      renderTable(filtered);
    }

    document.getElementById("searchInput").addEventListener("input", filterTable);
    document.getElementById("filterHeures").addEventListener("change", filterTable);
    document.getElementById("filterCreche").addEventListener("change", filterTable);

    // Initial rendering
    renderTable(enfants);
  </script>
</body>
</html>
