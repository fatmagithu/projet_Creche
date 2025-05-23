<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Fiche Crèche · BabyFarm</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <?php
$host = "localhost";
$username = "root";
$password = "root";
$dbname = "groupe_bulles_deveil";

$conn = new mysqli($host, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Erreur de connexion : " . $conn->connect_error);
}

// Récupère l'ID de la crèche depuis l'URL
$creche_id = isset($_GET['creche']) ? intval($_GET['creche']) : 0;

// Vérifie que la crèche existe
$creche_info = null;
if ($creche_id > 0) {
    $stmt = $conn->prepare("SELECT * FROM creche WHERE code_creche = ?");
    $stmt->bind_param("i", $creche_id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result && $result->num_rows > 0) {
        $creche_info = $result->fetch_assoc();
    } else {
        die("❌ Crèche introuvable.");
    }
    $stmt->close();
} else {
    die("❌ Aucune crèche sélectionnée.");
}
?>

 <style>
    :root {
      --beige: #fdf9f3;
      --beige-light: #fffdf8;
      --brown: #b38760;
    }
    body {
      margin: 0;
      background: url('moussa12.png') center/cover no-repeat;
      background-attachment: fixed;
      font-family: 'Inter', sans-serif;
      position: relative;
      min-height: 100vh;
      overflow-x: hidden;
    }
    body::after {
      content: "";
      position: absolute;
      top: 0; left: 0; right: 0; bottom: 0;
      background: rgba(253, 249, 243, 0.88);
      backdrop-filter: blur(8px);
      z-index: 0;
    }
    .fiche-card {
      position: relative;
      z-index: 1;
      background: #fff;
      border-radius: 28px;
      padding: 50px;
      margin: 60px auto;
      box-shadow: 0 16px 40px rgba(0, 0, 0, 0.08);
      max-width: 1200px;
      width: 95%;
      animation: fadeIn 0.6s ease-in-out;
    }
    .btn-retour {
      position: absolute;
      top: 20px;
      left: 20px;
      background: var(--brown);
      color: white;
      border: none;
      padding: 10px 20px;
      border-radius: 12px;
      font-weight: bold;
      text-decoration: none;
      transition: background 0.3s;
      z-index: 2;
    }
    .btn-retour:hover {
      background: #a67450;
    }
    .fiche-header h2 {
      font-size: 36px;
      font-weight: 800;
      color: var(--brown);
    }
    .info-section {
      background: var(--beige-light);
      padding: 26px;
      border-radius: 18px;
      box-shadow: 0 6px 16px rgba(0, 0, 0, 0.05);
      margin-bottom: 28px;
    }
    .info-section h4 {
      color: var(--brown);
      font-size: 22px;
      font-weight: 700;
      margin-bottom: 16px;
    }
    .document-grid {
      display: flex;
      flex-wrap: wrap;
      gap: 20px;
      justify-content: center;
    }
    .doc-icon {
      background: var(--beige);
      border: 2px solid #b38760;
      color: #b38760;
      border-radius: 18px;
      width: 110px;
      height: 110px;
      text-align: center;
      font-size: 16px;
      font-weight: 600;
      padding: 20px 10px;
      box-shadow: 0 6px 16px rgba(0,0,0,0.06);
      cursor: pointer;
      transition: all 0.3s ease;
    }
    .doc-icon:hover {
      background: #b38760;
      color: white;
    }
  </style>
  
</head>
<body>
<a href="PDossierAdmin.php" class="btn-retour">&larr; Retour</a>
<div class="fiche-card">
  <div class="fiche-header">
  <h2>Fiche Crèche · <?php echo htmlspecialchars($creche_info['nom_creche']); ?></h2>

  </div>
  <div class="info-section">
    <h4>Documents de la Crèche enregistrés</h4>
    <div class="document-grid">
      <?php
      $conn = new mysqli("localhost", "root", "root", "groupe_bulles_deveil");
      if ($conn->connect_error) {
        die("Erreur de connexion : " . $conn->connect_error);
      }

      $query = "SELECT id_document, titre_document, chemin_fichier FROM documents WHERE code_creche = ? ORDER BY date_import DESC";
      $stmt = $conn->prepare($query);
      $stmt->bind_param("i", $creche_id);
      $stmt->execute();
      $result = $stmt->get_result();
      
      

      if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          $titre = htmlspecialchars($row['titre_document']);
          $chemin = htmlspecialchars($row['chemin_fichier']);
          echo "<div class='doc-icon' onclick=\"window.open('$chemin', '_blank')\">📄<br>$titre</div>";
        }
      } else {
        echo "<p>Aucun document enregistré pour cette crèche.</p>";
      }
      $conn->close();
      ?>
    </div>
  </div>

  <div class="info-section">
    <h4>📁 Importer un nouveau document</h4>
    <form method="POST" action="" enctype="multipart/form-data">
      <div class="mb-3">
        <label for="titre_document" class="form-label">Titre :</label>
        <input type="text" class="form-control" id="titre_document" name="titre_document" required>
      </div>
      <div class="mb-3">
        <label for="type_document" class="form-label">Type :</label>
        <select class="form-select" id="type_document" name="type_document" required>
          <option value="contrat">Contrat</option>
          <option value="règlement">Règlement</option>
          <option value="assurance">Assurance</option>
        </select>
      </div>
      <div class="mb-3">
        <label for="date_expiration" class="form-label">Date d'expiration :</label>
        <input type="date" class="form-control" id="date_expiration" name="date_expiration">
      </div>
      <div class="mb-3">
        <label for="commentaires" class="form-label">Commentaires :</label>
        <textarea class="form-control" id="commentaires" name="commentaires"></textarea>
      </div>
      <div class="mb-3">
        <label for="document" class="form-label">Fichier :</label>
        <input type="file" class="form-control" id="document" name="document" required>
      </div>
      <input type="hidden" name="code_creche" value="<?php echo $creche_id; ?>">
      <button type="submit" class="btn btn-primary">Importer</button>
    </form>
    <?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['document'])) {
  $conn = new mysqli("localhost", "root", "root", "groupe_bulles_deveil");
  if ($conn->connect_error) die("Connexion échouée : " . $conn->connect_error);

  $code_creche = intval($_POST['code_creche']);
  $titre = $_POST['titre_document'];
  $type = $_POST['type_document'];
  $expiration = !empty($_POST['date_expiration']) ? $_POST['date_expiration'] : null;
  $commentaires = $_POST['commentaires'];

  if (!empty($_FILES['document']['tmp_name'])) {
    $uploadDir = 'uploads/';
    $filename = $_FILES['document']['name'];
    $tmp_name = $_FILES['document']['tmp_name'];
    $unique_name = uniqid() . '_' . basename($filename);
    $destination = $uploadDir . $unique_name;

    if (move_uploaded_file($tmp_name, $destination)) {
      $stmt = $conn->prepare("INSERT INTO documents (code_creche, titre_document, type_document, statut_document, date_expiration, date_import, chemin_fichier, commentaires) VALUES (?, ?, ?, 'valide', ?, NOW(), ?, ?)");
      $stmt->bind_param("isssss", $code_creche, $titre, $type, $expiration, $destination, $commentaires);
      $stmt->execute();

      // ✅ Redirection pour recharger les bons documents
      header("Location: FicheCreche1.php?creche=$code_creche");
      exit;
    } else {
      echo "<div class='alert alert-danger mt-3'>Erreur lors du téléchargement du fichier.</div>";
    }
  } else {
    echo "<div class='alert alert-warning mt-3'>Aucun fichier sélectionné.</div>";
  }

  $conn->close();
}
?>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['document'])) {
  $conn = new mysqli("localhost", "root", "root", "groupe_bulles_deveil");
  if ($conn->connect_error) die("Connexion échouée : " . $conn->connect_error);

  $code_creche = $_POST['code_creche'];
  $titre = $_POST['titre_document'];
  $type = $_POST['type_document'];
  $expiration = $_POST['date_expiration'] ?? null;
  $commentaires = $_POST['commentaires'];

  $uploadDir = 'uploads/';
  $filename = $_FILES['document']['name'];
  $tmp_name = $_FILES['document']['tmp_name'];
  $unique_name = uniqid() . '_' . basename($filename);
  $destination = $uploadDir . $unique_name;

  if ($filename && $tmp_name && move_uploaded_file($tmp_name, $destination)) {
    $stmt = $conn->prepare("INSERT INTO documents (code_creche, titre_document, type_document, statut_document, date_expiration, date_import, chemin_fichier, commentaires) VALUES (?, ?, ?, 'valide', ?, NOW(), ?, ?)");
    $stmt->bind_param("isssss", $code_creche, $titre, $type, $expiration, $destination, $commentaires);
    $stmt->execute();

    // 🔁 Recharge la page pour afficher les documents de la bonne crèche
    header("Location: FicheCreche1.php?creche=" . $code_creche);
    exit;
  } else {
    echo "<div class='alert alert-danger mt-3'>Erreur lors du téléchargement du fichier.</div>";
  }

  $conn->close();
}
?>

  </div>
</div>
<br><br><div style="text-align: center; margin-top: 40px;">
  <button onclick="sendDocumentByEmail()" class="btn btn-success">✉️ Par mail</button>
  <button onclick="sendToWhatsApp()" class="btn btn-info text-white">📱 WhatsApp</button>
  <button onclick="copyToClipboard()" class="btn btn-secondary">📋 Copier</button>
</div>

<script>
function sendDocumentByEmail() {
  console.log("Envoi email");
  const subject = encodeURIComponent("Document Crèche BabyFarm");
  const body = encodeURIComponent("Bonjour,\n\nVeuillez trouver ci-joint un document concernant la crèche.\n\n-- L'équipe BabyFarm");
  window.open(`mailto:?subject=${subject}&body=${body}`);
}

function sendToWhatsApp() {
  console.log("WhatsApp click");
  const message = encodeURIComponent("Bonjour 👋,\nVoici un document concernant la crèche BabyFarm.");
  window.open(`https://wa.me/?text=${message}`, '_blank');
}

function copyToClipboard() {
  console.log("Copie clipboard");
  const message = "Voici un document concernant la crèche BabyFarm.";
  navigator.clipboard.writeText(message).then(() => {
    alert("✅ Texte copié dans le presse-papier !");
  });
}
</script>

</body>
</html>
