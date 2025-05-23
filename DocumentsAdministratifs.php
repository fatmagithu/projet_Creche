<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gestion des fichiers · BabyFarm</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="crecheeco.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Playwrite+GB+S&display=swap" rel="stylesheet">

</head>
<body>
<a href="ParametreAdmin.php" class="back-btn">&larr; Retour</a>

  <div class="container">
    <h1 id="titre22">Gestion centralisée des fichiers</h1>

    <div class="search-bar">
      <input type="text" id="searchInput" class="form-control" placeholder="Rechercher un fichier...">
      <select id="typeFilter" class="form-select">
        <option value="">Tous les types</option>
        <option value="pdf">PDF</option>
        <option value="image">Image</option>
        <option value="document">Document</option>
      </select>
    </div>

    <div id="fileContainer"></div>
  </div>

  <script>
    const fichiers = [
      { nom: "fiche_inscription_Lina.pdf", date: "2025-05-21", type: "pdf" },
      { nom: "photo_Yanis_activite.jpg", date: "2025-05-20", type: "image" },
      { nom: "autorisation_sortie.docx", date: "2025-05-19", type: "document" },
      { nom: "rapport_sante_Mohamed.pdf", date: "2025-05-18", type: "pdf" },
      { nom: "photo_groupe_fête.png", date: "2025-05-17", type: "image" }
    ];

    function renderFichiers(list) {
      const container = document.getElementById("fileContainer");
      container.innerHTML = "";
      list.forEach(f => {
        container.innerHTML += `
          <div class="alert-card">
            <div class="alert-date">📅 ${new Date(f.date).toLocaleDateString('fr-FR')}</div>
            <div class="alert-title">${f.nom}</div>
            <div class="alert-type">Type : ${f.type}</div>
          </div>
        `;
      });
    }



    function renderFichiers(list) {
  const container = document.getElementById("fileContainer");
  container.innerHTML = "";
  list.forEach(f => {
    container.innerHTML += `
  <div class="alert-card">
    <div class="alert-content">
      <div class="alert-date">📅 ${new Date(f.date).toLocaleDateString('fr-FR')}</div>
      <div class="alert-title">${f.nom}</div>
      <div class="alert-type">Type : ${f.type}</div>
    </div>
    <a href="dossierAdminPerso.php" class="btn-voir">Voir</a>
  </div>
`;

  });
}





    function filterFichiers() {
      const query = document.getElementById("searchInput").value.toLowerCase();
      const type = document.getElementById("typeFilter").value;
      const filtered = fichiers
        .filter(f => f.nom.toLowerCase().includes(query))
        .filter(f => (type ? f.type === type : true))
        .sort((a, b) => new Date(b.date) - new Date(a.date));
      renderFichiers(filtered);
    }

    document.getElementById("searchInput").addEventListener("input", filterFichiers);
    document.getElementById("typeFilter").addEventListener("change", filterFichiers);

    filterFichiers();
  </script>
</body>
<style>
  body {
  background: url('moussa12.png') center/cover no-repeat fixed;
  font-family: 'Playwrite GB S', 'Inter', sans-serif;
  padding: 60px 40px;
  position: relative;
  min-height: 100vh;
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

.alert-card {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 12px 18px;
  margin-bottom: 20px;
  border-radius: 14px;
  background: #fff;
  border-left: 6px solid #b38760;
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.04);
  transition: all 0.3s ease;
}

.alert-content {
  display: flex;
  flex-direction: column;
  gap: 6px;
}

.btn-voir {
  background-color: #b38760;
  color: white;
  padding: 8px 20px;
  border-radius: 20px;
  font-weight: 600;
  text-decoration: none;
  transition: 0.3s;
  white-space: nowrap;
}

.btn-voir:hover {
  background-color: #9e6d4b;
}


.titre22 {
    font-weight: 900;
    font-family: 'Playwrite GB S', 'Inter', sans-serif;
  color: #b38760;
  margin-bottom: 30px;
  text-align: center;
  font-size: 38px;
  letter-spacing: 1px;
}

body::before {
  content: "";
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(253, 249, 243, 0.7); /* filtre beige semi-transparent */
  backdrop-filter: blur(7px);
  z-index: -1;
}

.container {
  background: rgba(255, 255, 255, 0.9);
  padding: 40px;
  border-radius: 24px;
  box-shadow: 0 12px 30px rgba(0,0,0,0.08);
  max-width: 1200px;
  margin: 0 auto;
}

h1 {
  font-weight: 900;
  font-family: 'Playwrite GB S', cursive;
  color: #b38760;
  margin-bottom: 30px;
  text-align: center;
  font-size: 38px;
  letter-spacing: 1px;
}

.search-bar {
  display: flex;
  gap: 20px;
  margin-bottom: 30px;
  flex-wrap: wrap;
  justify-content: center;
}

.alert-card {
  background: #fff;
  border-left: 6px solid #b38760;
  padding: 20px 25px;
  margin-bottom: 20px;
  border-radius: 20px;
  box-shadow: 0 8px 20px rgba(0,0,0,0.06);
  transition: all 0.3s ease;
}

.alert-card:hover {
  background: #fffaf5;
  transform: scale(1.01);
}

.alert-date {
  font-size: 13px;
  color: #888;
  margin-bottom: 8px;
  font-style: italic;
}

.alert-title {
  font-weight: 800;
  color: #9e6d4b;
  font-size: 18px;
  font-family: 'Inter', sans-serif;
}

.alert-message {
  margin-top: 5px;
  font-size: 14px;
  color: #555;
}

.alert-type {
  font-size: 13px;
  font-weight: 600;
  padding: 6px 14px;
  border-radius: 24px;
  display: inline-block;
  margin-top: 12px;
  background: #f4e2d8;
  color: #9e6d4b;
  text-transform: capitalize;
  box-shadow: 0 2px 6px rgba(0,0,0,0.04);
}

input.form-control, select.form-select {
  border-radius: 16px;
  border: 1px solid #e2d9ce;
  box-shadow: 0 4px 12px rgba(0,0,0,0.03);
  transition: 0.2s;
}

input.form-control:focus, select.form-select:focus {
  border-color: #b38760;
  box-shadow: 0 0 0 0.2rem rgba(179, 135, 96, 0.2);
}

@media screen and (max-width: 768px) {
  .search-bar {
    flex-direction: column;
    align-items: stretch;
  }

  .container {
    padding: 20px;
  }

  h1 {
    font-size: 26px;
  }
}


    </style>

</html>
