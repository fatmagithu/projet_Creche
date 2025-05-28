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
      --highlight: #f4e2d8;
    }
    body {
      margin: 0;
      background: linear-gradient(135deg, var(--beige-light), var(--beige));
      font-family: 'Inter', sans-serif;
      display: flex;
      min-height: 100vh;
    }

    /* Sidebar moderne avec image floutée */
    .sidebar {
      width: 85px;
      background: url('moussa12.png') center center/cover no-repeat;
      position: fixed;
      height: 100vh;
      display: flex;
      flex-direction: column;
      align-items: center;
      padding: 20px 0;
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
      width: 42px;
      height: 42px;
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
      margin-left: 85px;
      padding: 40px;
      background: linear-gradient(to bottom right, var(--beige-light), var(--beige));
      flex: 1;
      width: calc(100% - 85px);
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
    .btn-retour {
  position: absolute;
  top: 30px;
  left: 30px;
  background-color: var(--brown);
  color: white;
  padding: 10px 8px;
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
<!-- CONTENU PRINCIPAL -->
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
      $pdo = new PDO('mysql:host=localhost;dbname=groupe_bulles_deveil;charset=utf8', 'root', 'root');
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      // 👇 Ajout de la colonne photo_enfant
      $stmt = $pdo->query("SELECT id, prenom_enfant, date_naissance_enfant, photo_enfant FROM inscription_enfant WHERE statut = 'Inscrit'");

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

        // 👉 On vérifie si une photo personnalisée existe
        $photo = !empty($row['photo_enfant']) ? $row['photo_enfant'] : 'moussa8.png';

        $enfants[] = [
            'id' => $row['id'],
            'nom' => $row['prenom_enfant'],
            'age' => $age_texte,
            'age_mois' => $age_mois,
            'heures' => '-',
            'depassement' => false,
            'photo' => $photo
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