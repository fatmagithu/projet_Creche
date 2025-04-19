<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Trouver un enfant - BabyFarm</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
      display: flex;
      min-height: 100vh;
    }    /* SIDEBAR MODERNE */
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
    .search-controls {
      display: flex;
      flex-wrap: wrap;
      gap: 15px;
      justify-content: space-between;
      margin-bottom: 30px;
    }
    .search-controls input {
      flex: 1;
      min-width: 250px;
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
  </style>
</head>

<!-----SIDE BAR DEBUT ------>
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

<!-----SIDE BAR FIN  ------>





<!----- RECHERECHE D UN ENFNAT  ------>
<div class="main-content">
    <div class="search-controls">
      <input type="text" id="searchInput" class="form-control" placeholder="Rechercher un prénom...">
      <button class="btn btn-outline-secondary" onclick="sortByName()">Trier par prénom (A-Z)</button>
      <button class="btn btn-outline-secondary" onclick="sortByAge()">Trier par âge croissant</button>
    </div>

    <div id="enfantList"></div>
  </div>
<!----- RECHERECHE D UN ENFNAT FIN  ------>





<!----- LISTE DES ENFANTS DEBUT  ------>
  <script>
    const enfants = [
      { nom: 'Marie', age: 3, heures: '160h · 175h', depassement: true, photo: 'moussa8.png' },
      { nom: 'Axelle', age: 2, heures: '140h · 110h', depassement: false, photo: 'moussa13.png' },
      { nom: 'Thomas', age: 1, heures: '50h · 53h', depassement: true, photo: 'moussa14.png' },
      { nom: 'Mohamed', age: 2, heures: '30h · 120h', depassement: false, photo: 'Sohan4.jpg' },
      { nom: 'Sohan', age: 1, heures: '50h · 153h', depassement: false, photo: 'Sohan3.png' },
      { nom: 'Jonas', age: 2, heures: '150h · 153h', depassement: true, photo: 'Sohan5.png' },
      { nom: 'Manel', age: 3, heures: '150h · 153h', depassement: false, photo: 'Sohan2.png' },
      { nom: 'Yanis', age: 3, heures: '150h · 153h', depassement: true, photo: 'Sohan6.png' }
    ];

    function renderEnfants(list) {
      const container = document.getElementById('enfantList');
      container.innerHTML = '';
      list.forEach(e => {
        container.innerHTML += `
          <div class="enfant-card">
            <div class="enfant-info">
              <img src="${e.photo}" alt="photo enfant" class="enfant-photo">
              <div>
                <div class="enfant-name">${e.nom}</div>
                <div class="enfant-age">${e.age} an${e.age > 1 ? 's' : ''}</div>
                <div class="contrat-heure">${e.heures} ${e.depassement ? '<span class="alert-depassement"><i class="bi bi-exclamation-triangle-fill"></i> Dépassement !</span>' : ''}</div>
              </div>
            </div>
            <button class="btn-planning" onclick="window.location.href='PcrechePageENFANT.php?nom=${encodeURIComponent(e.nom)}'">Page de l'enfant</button>
          </div>
        `;
      });
    }

    function sortByName() {
      const sorted = [...enfants].sort((a, b) => a.nom.localeCompare(b.nom));
      renderEnfants(sorted);
    }

    function sortByAge() {
      const sorted = [...enfants].sort((a, b) => a.age - b.age);
      renderEnfants(sorted);
    }

    document.getElementById('searchInput').addEventListener('input', function () {
      const val = this.value.toLowerCase();
      const filtered = enfants.filter(e => e.nom.toLowerCase().includes(val));
      renderEnfants(filtered);
    });

    // Affichage initial
    renderEnfants(enfants);
  </script>
  <!----- LISTE DES ENFANTS DEBUT  ------>
</body>
</html>
