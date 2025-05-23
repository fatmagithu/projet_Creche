<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Facturation · BabyFarm</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
  <style>
    :root {
      --beige: #fdf9f3;
      --brown: #b38760;
      --brown-dark: #9e6d4b;
      --highlight: #f4e2d8;
    }
    body {
  margin: 0;
  font-family: 'Inter', sans-serif;
  background: url('moussa12.png') center/cover no-repeat fixed;
  position: relative;
  min-height: 100vh;
}

    .overlay {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(253, 249, 243, 0.6);
  backdrop-filter: blur(17px);
  z-index: -1;
}

    .container {
      max-width: 1300px;
      margin: 60px auto;
      background: rgba(255, 255, 255, 0.9);
      padding: 40px;
      border-radius: 24px;
      box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    }
    h1 {
      font-size: 30px;
      color: var(--brown-dark);
      margin-bottom: 30px;
      text-align: center;
    }
    .btn-bf {
      background-color: var(--brown);
      color: white;
      border: none;
      border-radius: 30px;
      padding: 10px 20px;
      font-weight: 600;
      transition: 0.3s;
    }
    .btn-bf:hover {
      background-color: var(--brown-dark);
    }
    .table th, .table td {
      vertical-align: middle;
    }
    .badge-paye { background-color: #28a745; }
    .badge-partiel { background-color: #ffc107; }
    .badge-attente { background-color: #dc3545; }
    .filter-bar {
      display: flex;
      justify-content: space-between;
      flex-wrap: wrap;
      gap: 15px;
      margin-bottom: 30px;
    }
    .summary {
      margin-bottom: 30px;
      background: #fff9f3;
      padding: 20px;
      border-radius: 20px;
      display: flex;
      justify-content: space-around;
      font-weight: 600;
    }
    .modal .form-label {
      font-weight: 600;
    }
    .stats-bar {
      display: flex;
      gap: 40px;
      margin-top: 40px;
      justify-content: space-around;
    }
    .stats-card {
      background: #fffdf8;
      border-radius: 20px;
      padding: 20px;
      box-shadow: 0 6px 18px rgba(0, 0, 0, 0.06);
      text-align: center;
    }
    .stats-card h4 {
      font-size: 22px;
      color: var(--brown-dark);
      margin-bottom: 10px;
    }
    .stats-card p {
      font-size: 16px;
      color: #555;
    }
    .btn-retour {
  position: absolute;
  top: 30px;
  left: 30px;
  background-color: var(--brown);
  color: white;
  padding: 10px 18px;
  border-radius: 30px;
  font-weight: 600;
  text-decoration: none;
  transition: 0.3s;
  z-index: 1000;
}

.btn-retour:hover {
  background-color: var(--brown-dark);
}

  </style>
</head>
<body>
<a href="ParametreAdmin.php" class="btn-retour">← Retour</a>
<div class="overlay"></div>
<div class="container">
  <h1>Facturation Mensuelle</h1>
  <div class="summary">
    <div>Total facturé : <span class="text-success">7 250€</span></div>
    <div>Payé : <span class="text-success">5 900€</span></div>
    <div>Restant : <span class="text-danger">1 350€</span></div>
  </div>
  <div class="filter-bar">
    <div><input type="month" class="form-control"></div>
    <div>
      <select class="form-select" id="filtreCreche">
        <option value="">Toutes les crèches</option>
        <option>Crèche 1</option>
        <option>Crèche 2</option>
        <option>Crèche 3</option>
      </select>
    </div>
    <div>
      <select class="form-select" id="filtreStatut">
        <option value="">Tout statut</option>
        <option>Payé</option>
        <option>Partiel</option>
        <option>En attente</option>
      </select>
    </div>
    <div>
      <input type="text" class="form-control" id="searchInput" placeholder="Rechercher un prénom">
    </div>
    <button class="btn btn-bf" data-bs-toggle="modal" data-bs-target="#nouvelleFacture">➕ Nouvelle facture</button>
    <button class="btn btn-outline-dark">📊 Export Excel</button>
  </div>
  <table class="table table-hover table-bordered">
    <thead class="table-light">
      <tr>
        <th>Enfant</th>
        <th>Parent</th>
        <th>Crèche</th>
        <th>Mois</th>
        <th>Montant</th>
        <th>Statut</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody id="factureTableBody"></tbody>
  </table>
  <div class="stats-bar">
    <div class="stats-card"><h4>📈 Progression</h4><p>16/25 familles ont réglé ce mois</p></div>
    <div class="stats-card"><h4>🔁 Factures générées</h4><p>Factures auto pour 5 crèches</p></div>
    <div class="stats-card"><h4>📬 Envois par mail</h4><p>22 factures envoyées</p></div>
  </div>
</div>
<!-- MODAL FACTURE IDENTIQUE -->
<script>
const factures = Array.from({ length: 25 }, (_, i) => {
  const enfants = ["Ali M.", "Sara K.", "Lina B.", "Adam D.", "Jade R.", "Yanis M.", "Noé L.", "Emma V.", "Rayan T.", "Mila N."];
  const parents = ["madame.mendy@gmail.com", "sarak@gmail.com", "emma.r@gmail.com", "papa.lino@gmail.com"];
  const creches = ["Crèche 1", "Crèche 2", "Crèche 3"];
  const statuts = ["Payé", "Partiel", "En attente"];
  return {
    enfant: enfants[i % enfants.length],
    parent: parents[i % parents.length],
    creche: creches[i % creches.length],
    mois: "Mai 2025",
    montant: (280 + i * 5) + "€",
    statut: statuts[i % statuts.length]
  };
});
function renderTable(list) {
  const body = document.getElementById("factureTableBody");
  body.innerHTML = "";
  list.forEach(f => {
    const badgeClass = f.statut === "Payé" ? "badge-paye" : f.statut === "Partiel" ? "badge-partiel" : "badge-attente";
    body.innerHTML += `
      <tr>
        <td>${f.enfant}</td>
        <td>${f.parent}</td>
        <td>${f.creche}</td>
        <td>${f.mois}</td>
        <td>${f.montant}</td>
        <td><span class="badge ${badgeClass}">${f.statut}</span></td>
        <td>
          <button class="btn btn-sm btn-secondary">🖨️ PDF</button>
          <button class="btn btn-sm btn-${f.statut === 'Payé' ? 'warning' : 'success'}">${f.statut === 'Payé' ? '💳 Régler' : '💰 Paiement'}</button>
          <button class="btn btn-sm btn-danger">🗑️</button>
        </td>
      </tr>
    `;
  });
}
function applyFilters() {
  const text = document.getElementById("searchInput").value.toLowerCase();
  const statut = document.getElementById("filtreStatut").value;
  const creche = document.getElementById("filtreCreche").value;
  const filtered = factures.filter(f =>
    f.enfant.toLowerCase().includes(text) &&
    (statut ? f.statut === statut : true) &&
    (creche ? f.creche === creche : true)
  );
  renderTable(filtered);
}
document.getElementById("searchInput").addEventListener("input", applyFilters);
document.getElementById("filtreStatut").addEventListener("change", applyFilters);
document.getElementById("filtreCreche").addEventListener("change", applyFilters);
renderTable(factures);
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
