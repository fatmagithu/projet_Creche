<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Équipe · BabyFarm</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Playwrite+GB+S&family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <style>
      :root {
      --beige: #fdf9f3;
      --beige-light: #fffdf8;
      --brown: #b38760;
      --brown-dark: #9e6d4b;
      --highlight: #f4e2d8;
    }

    body {
      margin: 0;
      font-family: 'Inter', sans-serif;
      background: linear-gradient(135deg, var(--beige-light), var(--beige));
      display: flex;
      min-height: 100vh;
    }

    .sidebar {
  width: 85px;
  background: url('moussa12.png') center center/cover no-repeat;
  position: fixed;
  height: 100vh;
  display: flex;
  flex-direction: column;
  align-items: center;
  padding: 60px 0 20px 0; /* top: 60px, bottom: 20px */

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

    .user-bubble {
      text-align: center;
      margin-bottom: 20px;
      opacity: 0;
      height: 0;
      overflow: hidden;
      transition: all 0.3s ease;
      padding: 10px;
    }

    .sidebar:hover .user-bubble {
      opacity: 1;
      height: auto;
    }

    .user-bubble img {
      width: 60px;
      height: 60px;
      border-radius: 50%;
      object-fit: cover;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
      margin-bottom: 8px;
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
      color: #333;
      text-decoration: none;
    }

    .nav-link img {
      width: 42px;
      height: 42px;
      margin-right: 12px;
    }

    .nav-text {
      opacity: 0;
      transition: opacity 0.3s;
      white-space: nowrap;
    }

    .sidebar:hover .nav-text {
      opacity: 1;
    }

    .nav-link:hover {
      background: var(--highlight);
    }

    .main-content {
      margin-left: 85px;
      padding: 40px;
      width: 100%;
      transition: margin-left 0.3s ease;
    }

    .sidebar:hover ~ .main-content {
      margin-left: 220px;
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
    }

    .welcome p {
      font-size: 16px;
      color: #555;
      margin-top: 10px;
    }

    .stats-overview {
      display: flex;
      justify-content: space-between;
      background: #fff;
      padding: 20px;
      border-radius: 16px;
      margin-bottom: 30px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.05);
    }

    .stats-overview div {
      text-align: center;
    }

    .stats-overview h4 {
      font-size: 22px;
      margin-bottom: 5px;
      color: var(--brown);
    }

    .stats-overview p {
      font-size: 14px;
      color: #555;
    }

    .top-bar {
      display: flex;
      gap: 15px;
      flex-wrap: wrap;
      margin-bottom: 30px;
    }

    .search-bar {
      flex: 1;
      padding: 12px 16px;
      border-radius: 30px;
      border: 1px solid #ccc;
    }

    .add-member {
      background-color: var(--brown);
      color: white;
      padding: 10px 20px;
      border-radius: 30px;
      font-weight: bold;
      font-size: 14px;
      border: none;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }

    .filter-crèche {
      display: flex;
      gap: 10px;
      flex-wrap: wrap;
      margin-bottom: 30px;
    }

    .filter-crèche button {
      background-color: white;
      border: 1px solid #ccc;
      padding: 6px 16px;
      border-radius: 20px;
      font-size: 14px;
      cursor: pointer;
    }

    .filter-crèche button.active {
      background-color: var(--brown);
      color: white;
    }

    .team-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
      gap: 20px;
    }

    .team-card {
      background: white;
      border-radius: 20px;
      box-shadow: 0 10px 24px rgba(0, 0, 0, 0.06);
      padding: 20px;
      text-align: center;
      transition: transform 0.3s ease;
      position: relative;
    }

    .team-card:hover {
      transform: translateY(-5px);
    }

    .presence-indicator {
      position: absolute;
      top: 15px;
      right: 15px;
      width: 14px;
      height: 14px;
      border-radius: 50%;
      background-color: var(--brown);
    }

    .team-name {
      font-size: 22px;
      font-weight: 700;
      color: #333;
    }

    .team-role {
      font-size: 15px;
      color: #777;
    }

    .actions {
      margin-top: 10px;
      display: flex;
      justify-content: center;
      gap: 10px;
    }

    .actions button {
      background: var(--brown);
      color: white;
      border: none;
      padding: 6px 12px;
      border-radius: 8px;
      font-size: 14px;
    }

    .actions button:hover {
      background: var(--brown-dark);
    }

    @media (max-width: 768px) {
      .sidebar {
        flex-direction: row;
        height: 60px;
        width: 100%;
      }

      .sidebar:hover {
        width: 100%;
      }

      .main-content {
        margin-left: 0;
        padding: 20px;
      }

      .sidebar:hover ~ .main-content {
        margin-left: 0;
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
  width: 110px;
  text-align: center;
  display: none;
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
}

.sidebar:hover .btn-retour-sidebar {
  display: block;
  align-self: center;
}

.sidebar:not(:hover) .btn-retour-sidebar {
  width: auto;
  padding: 6px;
  font-size: 18px;
  background: none;
  border: none;
  color: #b38760;
  box-shadow: none;
}

    }
  </style>
 
   <script>
    const membres = [
      { nom: "Sophie Martin", role: "Auxiliaire Petite Enfance", ville: "Paris", creche: "Les Calinous", statut: "présent" },
      { nom: "Julie Bernard", role: "Puéricultrice", ville: "Toulouse", creche: "Toulouse", statut: "congé" },
      { nom: "Fatima Sy", role: "Directrice Adjointe", ville: "Lyon", creche: "1-2-3 Soleil", statut: "absent" }
    ];

    function afficherMembres(filtre = "Toutes", recherche = "") {
      const container = document.querySelector(".team-grid");
      container.innerHTML = "";
      membres.filter(m => {
        const matchCreche = filtre === "Toutes" || m.creche === filtre;
        const matchRecherche = m.nom.toLowerCase().includes(recherche) || m.role.toLowerCase().includes(recherche) || m.ville.toLowerCase().includes(recherche);
        return matchCreche && matchRecherche;
      }).forEach(m => {
        container.innerHTML += `
        <div class="team-card">
          <span class="presence-indicator" style="background-color: ${m.statut === 'présent' ? 'green' : m.statut === 'congé' ? 'orange' : 'red'};"></span>
          <div class="team-name">${m.nom}</div>
          <div class="team-role">${m.role}</div>
          <div class="actions">
<button onclick="window.location.href='TEST44.php'" class="btn btn-success">Fiche</button>

            <button>Modifier</button>
          </div>
        </div>`
      });
    }

    document.addEventListener("DOMContentLoaded", () => {
      afficherMembres();

      document.querySelectorAll(".filter-crèche button").forEach(btn => {
        btn.addEventListener("click", () => {
          document.querySelectorAll(".filter-crèche button").forEach(b => b.classList.remove("active"));
          btn.classList.add("active");
          afficherMembres(btn.textContent.trim(), document.querySelector(".search-bar").value.toLowerCase());
        });
      });

      document.querySelector(".search-bar").addEventListener("input", (e) => {
        const activeCreche = document.querySelector(".filter-crèche button.active").textContent.trim();
        afficherMembres(activeCreche, e.target.value.toLowerCase());
      });

    });
  </script>
  
  <!-----PROGRAMME POUR CHOISIR LES MEMBRES EN FONCTION DES CRECHES LES CRECHE FIN-->




</head>

<body>  <!-----SIDEBAR DEBUT -->

<div class="sidebar">

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
<!-----SIDEBAR FIN -->

<!----------------PLANNING __________<<------>


<!-----------------------------------------------PLANNING___<-->
  
  <div class="main-content">
  <div class="welcome">
      <h1>Équipe des Crèches</h1>
      <p>Gérez et suivez vos équipes en temps réel, ajoutez ou modifiez des membres, filtrez par crèche et visualisez la disponibilité du personnel.</p>
    </div>

    <div class="stats-overview">
      <div>
        <h4>48</h4>
        <p>Membres au total</p>
      </div>
      <div>
        <h4>8</h4>
        <p>Crèches actives</p>
      </div>
      <div>
        <h4>1 / 6</h4>
        <p>Ratio Enfants/Personnel</p>
      </div>
      <div>
        <h4>2</h4>
        <p>Crèches en sous-effectif</p>
      </div>
    </div>

    <div class="top-bar">
      <input type="text" class="form-control search-bar" placeholder="Recherche par nom, poste, ville, dispo...">
      <button class="add-member" onclick="window.location.href='AjouterUnNouvEquipe.php'">+ Ajouter un membre</button>

    </div>

    <div class="filter-crèche">
      <button class="active">Toutes</button>
      <button>Les Calinous</button>
      <button>Toulouse</button>
      <button>1-2-3 Soleil</button>
      <button>Les Coquelicots</button>
      <button>Les 101 Bambins</button>
      <button>Les Coccinelles</button>
      <button>Les Capucines</button>
    </div>

    <div class="team-grid"></div>
  </div>
  
























