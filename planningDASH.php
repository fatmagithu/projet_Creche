<?php
// Connexion à la base de données
$conn = new mysqli("localhost", "root", "root", "groupe_bulles_deveil");
if ($conn->connect_error) {
  die("Erreur de connexion : " . $conn->connect_error);
}

// Requête pour récupérer les crèches actives
$sql = "SELECT code_creche, nom_creche, image_fond FROM creche WHERE statut = 'Active'";
$result = $conn->query($sql);
$creches = [];

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $creches[] = $row;
  }
}
$conn->close();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Choix Crèches</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet"/>
  <style>
    :root { 
      --beige: #fdf9f3;
      --brown: #b38760;
      --brown-dark: #9e6d4b;
    }
    body {
      margin: 0;
      font-family: 'Inter', sans-serif;
      background: url('moussa12.png') center/cover no-repeat fixed;
      position: relative;
      min-height: 100vh;
    }
    body::before {
      content: "";
      position: fixed;
      inset: 0;
      background-color: rgba(253, 249, 243, 0.92);
      backdrop-filter: blur(14px);
      z-index: -1;
    }
    .bubble-grid {
      display: flex;
      flex-wrap: wrap;
      gap: 30px;
      justify-content: center;
      align-items: center;
      padding: 100px 20px;
      z-index: 1;
      position: relative;
    }
    .bubble {
      width: 180px;
      height: 180px;
      background-size: cover;
      background-position: center;
      border-radius: 50%;
      box-shadow: 0 8px 24px rgba(0,0,0,0.08);
      display: flex;
      justify-content: center;
      align-items: center;
      text-align: center;
      font-weight: 600;
      font-size: 16px;
      color: white;
      text-decoration: none;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      backdrop-filter: blur(4px);
      position: relative;
      overflow: hidden;
    }
    .bubble::before {
      content: "";
      position: absolute;
      inset: 0;
      background-color: rgba(0, 0, 0, 0.4);
      border-radius: 50%;
      z-index: 0;
    }
    .bubble span {
      position: relative;
      z-index: 1;
      padding: 0 10px;
    }
    .bubble:hover {
      transform: scale(1.05);
      box-shadow: 0 12px 32px rgba(0,0,0,0.15);
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
  <div class="bubble-grid">
    <?php foreach ($creches as $creche): ?>
      <a href="ActivitéAUX.php?creche=<?= $creche['code_creche'] ?>" 
         class="bubble" 
         style="background-image: url('<?= htmlspecialchars($creche['image_fond']) ?>');">
        <span><?= htmlspecialchars($creche['nom_creche']) ?></span>
      </a>
    <?php endforeach; ?>
  </div>
</body>
</html>
