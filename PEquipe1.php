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
  width: 80px;
  background: white;
  border-top-right-radius: 40px;
  box-shadow: 4px 0 20px rgba(0,0,0,0.05);
  display: flex;
  flex-direction: column;
  align-items: center;
  transition: all 0.3s ease;
  overflow: hidden;
  position: relative;
  z-index: 10;
}

.sidebar:hover {
  width: 220px;
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

.user-bubble img {
  width: 60px;
  height: 60px;
  border-radius: 50%;
  object-fit: cover;
  box-shadow: 0 4px 12px rgba(0,0,0,0.1);
  margin-bottom: 10px;
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
  
      flex: 1;
      padding: 40px;
      background: linear-gradient(to bottom right, var(--beige-light), var(--beige));
    }
    .page-title {
      font-size: 36px;
      font-weight: 900;
      color: var(--brown);
      margin-bottom: 30px;
    }
    .top-bar {
      display: flex;
      flex-wrap: wrap;
      align-items: center;
      gap: 15px;
      margin-bottom: 30px;
    }
    .search-bar {
      flex: 1;
      min-width: 250px;
      padding: 12px 16px;
      border-radius: 30px;
      border: 1px solid #ccc;
    }
    .add-member {
      background-color: var(--brown);
      color: white;
      padding: 10px 20px;
      border: none;
      border-radius: 30px;
      font-weight: bold;
      font-size: 14px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
      transition: background 0.3s;
    }
    .add-member:hover {
      background-color: var(--brown-dark);
    }
    .filter-crèche {
      display: flex;
      gap: 10px;
      flex-wrap: wrap;
      margin-bottom: 30px;
    }
    .filter-crèche button {
      background-color: #ffffff;
      border: 1px solid #ccc;
      padding: 6px 16px;
      border-radius: 20px;
      font-size: 14px;
      cursor: pointer;
    }
    .filter-crèche button.active {
      background-color: var(--brown);
      color: white;
      border-color: var(--brown);
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
      margin: 0;
      font-size: 14px;
      color: #555;
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
    .team-photo {
      width: 90px;
      height: 90px;
      border-radius: 50%;
      object-fit: cover;
      margin-bottom: 15px;
      border: 3px solid var(--brown);
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
    .presence-indicator {
      position: absolute;
      top: 15px;
      right: 15px;
      width: 14px;
      height: 14px;
      border-radius: 50%;
      background-color: var(--brown);
      box-shadow: 0 0 4px rgba(0,0,0,0.2);
    }
    .actions {
      display: flex;
      justify-content: center;
      gap: 10px;
      margin-top: 15px;
    }
    .actions button {
      background: var(--brown);
      color: white;
      border: none;
      padding: 6px 12px;
      border-radius: 8px;
      font-size: 14px;
      cursor: pointer;
      transition: background 0.3s ease;
    }
    .actions button:hover {
      background: var(--brown-dark);
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
      margin: 0;
    }
    .welcome p {
      font-size: 16px;
      color: #555;
      margin-top: 10px;
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

      document.querySelector(".add-member").addEventListener("click", () => {
        const nom = prompt("Nom :");
        const role = prompt("Poste :");
        const ville = prompt("Ville :");
        const creche = prompt("Crèche :");
        const statut = prompt("Statut (présent, congé, absent) :");
        if (nom && role && ville && creche && statut) {
          membres.push({ nom, role, ville, creche, statut });
          afficherMembres(document.querySelector(".filter-crèche button.active").textContent.trim(), document.querySelector(".search-bar").value.toLowerCase());
        }
      });
    });
  </script>





</head>

<body>
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
      <button class="add-member">+ Ajouter un membre</button>
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
  
























