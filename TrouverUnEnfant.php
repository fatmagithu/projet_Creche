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
    body {
      margin: 0;
      background: linear-gradient(135deg, #fcf8f4, #f5e8da);
      font-family: 'Inter', sans-serif;
      display: flex;
      min-height: 100vh;
    }

    .sidebar {
      width: 150px;
      background-color: #ffffff;
      box-shadow: 4px 0 12px rgba(0, 0, 0, 0.05);
      display: flex;
      flex-direction: column;
      align-items: center;
      padding: 20px 0;
      position: fixed;
      height: 100vh;
    }

    .sidebar .icon {
      width: 60px;
      height: 64px;
      margin: 20px 0;
      object-fit: contain;
      cursor: pointer;
      transition: transform 0.3s ease, filter 0.3s;
    }

    .sidebar .icon:hover {
      transform: scale(1.1);
      filter: brightness(1.2);
    }

    .main-content {
      margin-left: 150px;
      flex: 1;
      padding: 40px;
      background: linear-gradient(to bottom right, #faf3ed, #f0e7de);
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
      border: 3px solid #70c8a0;
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
      background-color: #2c7a4b;
      border: none;
      color: white;
      padding: 10px 20px;
      border-radius: 24px;
      font-weight: 600;
      transition: background-color 0.3s ease;
    }

    .btn-planning:hover {
      background-color: #256b3b;
    }
  </style>
</head>

<!-----SIDE BAR DEBUT ------>
<body>
  <div class="sidebar">
    <a href="Ptest22.php">
      <img src="bebe.png" alt="bebe" class="icon active">
    </a>
    <img src="gens.png" alt="gens" class="icon">
    <img src="dossier.png" alt="dossier" class="icon">
    <img src="message.png" alt="message" class="icon">
    <img src="parametre.png" alt="parametre" class="icon">
  </div>
<!-----SIDE BAR FIN  ------>





<!----- RECHERECHE D UN ENFNAT  ------>
  <div class="main-content">
    <div class="search-controls">
      <input type="text" id="searchInput" class="form-control" placeholder="Rechercher un prénom...">
      <button class="btn btn-outline-success" onclick="sortByName()">Trier par prénom (A-Z)</button>
      <button class="btn btn-outline-success" onclick="sortByAge()">Trier par âge croissant</button>
    </div>

    <div id="enfantList"></div>
  </div>
<!----- RECHERECHE D UN ENFNAT FIN  ------>





<!----- LISTE DES ENFANTS DEBUT  ------>
<script>
  const enfants = <?php
    try {
      $pdo = new PDO('mysql:host=localhost;dbname=groupe_bulles_deveil;charset=utf8', 'root', '');
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $stmt = $pdo->query("SELECT id, prenom_enfant, date_naissance_enfant FROM inscription_enfant WHERE statut = 'Inscrit'");

      $enfants = [];

      function calculer_age_precis($date_naissance) {
        $date_naissance = new DateTime($date_naissance);
        $aujourdhui = new DateTime();
        $intervalle = $aujourdhui->diff($date_naissance);

        $ans = $intervalle->y;
        $mois = $intervalle->m;
        $total_mois = ($ans * 12) + $mois;

        if ($ans === 0 && $mois === 0) {
          $affichage = "moins d'1 mois";
        } elseif ($ans === 0) {
          $affichage = "$mois mois";
        } elseif ($mois === 0) {
          $affichage = "$ans an" . ($ans > 1 ? "s" : "");
        } else {
          $affichage = "$ans an" . ($ans > 1 ? "s" : "") . " $mois mois";
        }

        return [$affichage, $total_mois];
      }

      while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        list($age_texte, $age_mois) = calculer_age_precis($row['date_naissance_enfant']);

        $enfants[] = [
            'id' => $row['id'],
            'nom' => $row['prenom_enfant'],
            'age' => $age_texte,
            'age_mois' => $age_mois,
            'heures' => '-',
            'depassement' => false,
            'photo' => 'moussa8.png'
          ];
          
      }

      echo json_encode($enfants, JSON_UNESCAPED_UNICODE);
    } catch (PDOException $e) {
      echo "[]";
    }
  ?>;

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
              <div class="enfant-age">${e.age}</div>
              <div class="contrat-heure">${e.heures} ${e.depassement ? '<span class="alert-depassement"><i class="bi bi-exclamation-triangle-fill"></i> Dépassement !</span>' : ''}</div>
            </div>
          </div>
          <button class="btn-planning" onclick="window.location.href='PcrechePageENFANT.php?id=${e.id}'">Page de l'enfant</button>

        </div>
      `;
    });
  }

  function sortByName() {
    const sorted = [...enfants].sort((a, b) => a.nom.localeCompare(b.nom));
    renderEnfants(sorted);
  }

  function sortByAge() {
    const sorted = [...enfants].sort((a, b) => a.age_mois - b.age_mois);
    renderEnfants(sorted);
  }

  document.getElementById('searchInput').addEventListener('input', function () {
    const val = this.value.toLowerCase();
    const filtered = enfants.filter(e => e.nom.toLowerCase().includes(val));
    renderEnfants(filtered);
  });

  renderEnfants(enfants);
</script>


  <!----- LISTE DES ENFANTS DEBUT  ------>
</body>
</html>