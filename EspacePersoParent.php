<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Mon Espace Parent · BabyFarm</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <style>
    :root {
      --beige: #fdf9f3;
      --brown: #b38760;
      --brown-dark: #9e6d4b;
      --white: #fffefc;
    }

    body {
      margin: 0;
      font-family: 'Inter', sans-serif;
      background: url('moussa12.png') center center / cover no-repeat fixed;
    }

    body::before {
      content: "";
      position: fixed;
      inset: 0;
      background-color: rgba(253, 249, 243, 0.94);
      backdrop-filter: blur(8px);
      z-index: -1;
    }

    .app-container {
      display: flex;
      min-height: 100vh;
    }

    .sidebar {
      width: 240px;
      background-color: rgba(255, 255, 255, 0.85);
      padding: 30px 20px;
      display: flex;
      flex-direction: column;
      align-items: center;
      box-shadow: 4px 0 12px rgba(0,0,0,0.05);
      border-right: 1px solid #eee;
    }

    .sidebar label {
      cursor: pointer;
      width: 100px;
      height: 100px;
      border-radius: 50%;
      overflow: hidden;
      border: 4px solid var(--brown);
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
      margin-bottom: 15px;
    }

    .sidebar label img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    .sidebar input[type="file"] {
      display: none;
    }

    .sidebar h4 {
      font-size: 18px;
      color: var(--brown-dark);
      margin-bottom: 20px;
      text-align: center;
    }

    .sidebar a {
      text-decoration: none;
      color: var(--brown-dark);
      font-weight: 500;
      margin: 10px 0;
      display: block;
      width: 100%;
      text-align: center;
      padding: 8px;
      border-radius: 8px;
      transition: background 0.2s;
    }

    .sidebar a:hover {
      background-color: var(--brown);
      color: white;
    }

    .main {
      flex: 1;
      padding: 40px;
    }

    .section-title {
      color: var(--brown-dark);
      font-weight: bold;
      font-size: 20px;
      margin-bottom: 15px;
    }

    .card-section {
      background: white;
      border-radius: 20px;
      padding: 30px;
      box-shadow: 0 10px 30px rgba(0,0,0,0.08);
      margin-bottom: 30px;
      transition: 0.3s ease;
    }

    .card-section:hover {
      transform: translateY(-2px);
    }

    .form-control,
    .form-select {
      border-radius: 12px;
    }

    label {
      font-weight: 500;
      margin-bottom: 5px;
      color: #444;
    }

    .btn-brown {
      background: var(--brown);
      color: white;
      font-weight: bold;
      border-radius: 12px;
      padding: 12px 28px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
      border: none;
    }

    .btn-brown:hover {
      background: var(--brown-dark);
    }

    .text-end {
      text-align: end;
    }
  </style>
</head>
<body>
<a href="Pcreche22AcceuilParent.php" style="
  position: fixed;
  top: 20px;
  left: 20px;
  background: rgba(255, 255, 255, 0.85);
  border-radius: 12px;
  padding: 10px 16px;
  text-decoration: none;
  color: #9e6d4b;
  font-weight: bold;
  box-shadow: 0 4px 12px rgba(0,0,0,0.1);
  z-index: 10;
  transition: background 0.3s, transform 0.3s;
">
  ← Retour
</a>

<div class="app-container">
  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Image cliquable pour changer la photo -->
    <label for="profileImageInput">
      <img src="moussa12.png" id="profilePreview" alt="Photo Parent">
    </label>
    <input type="file" id="profileImageInput" accept="image/*" onchange="previewImage(event)">
    
    <h4>Bonjour Claire 👋</h4>
    <a href="TableauDeBordParent.php">🏠 Tableau de bord</a>
    <a href="#">📎 Mes documents</a>
    <a href="#">📝 Modifier mes infos</a>
  </div>

  <!-- Main -->
  <div class="main">
    <form action="traitement_parent.php" method="POST" enctype="multipart/form-data">

      <!-- Infos Parent -->
      <div class="card-section">
        <div class="section-title">👩 Informations du parent</div>
        <div class="row">
          <div class="col-md-6 mb-3">
            <label>Nom</label>
            <input type="text" name="nom_parent" class="form-control" required>
          </div>
          <div class="col-md-6 mb-3">
            <label>Prénom</label>
            <input type="text" name="prenom_parent" class="form-control" required>
          </div>
          <div class="col-md-6 mb-3">
            <label>Email</label>
            <input type="email" name="email_parent" class="form-control" required>
          </div>
          <div class="col-md-6 mb-3">
            <label>Téléphone</label>
            <input type="tel" name="tel_parent" class="form-control" required>
          </div>
        </div>
      </div>

      <!-- Infos Enfant -->
      <div class="card-section">
        <div class="section-title">🧸 Informations de l’enfant</div>
        <div class="row">
          <div class="col-md-6 mb-3">
            <label>Nom</label>
            <input type="text" name="nom_enfant" class="form-control" required>
          </div>
          <div class="col-md-6 mb-3">
            <label>Prénom</label>
            <input type="text" name="prenom_enfant" class="form-control" required>
          </div>
          <div class="col-md-6 mb-3">
            <label>Date de naissance</label>
            <input type="date" name="date_naissance" class="form-control" required>
          </div>
          <div class="col-md-6 mb-3">
            <label>Allergies / Particularités</label>
            <input type="text" name="allergies" class="form-control">
          </div>
        </div>
      </div>

      <!-- Documents -->
      <div class="card-section">
        <div class="section-title">📁 Documents à fournir</div>
        <div class="mb-3">
          <label>Certificat médical</label>
          <input type="file" name="certificat" class="form-control" accept=".pdf,.jpg,.png">
        </div>
        <div class="mb-3">
          <label>Attestation d’assurance</label>
          <input type="file" name="assurance" class="form-control" accept=".pdf,.jpg,.png">
        </div>
        <div class="mb-3">
          <label>Carnet de vaccination</label>
          <input type="file" name="vaccins" class="form-control" accept=".pdf,.jpg,.png">
        </div>
      </div>

      <!-- Submit -->
      <div class="text-end">
        <button type="submit" class="btn btn-brown">💾 Enregistrer</button>
      </div>

    </form>
  </div>
</div>

<script>
  function previewImage(event) {
    const input = event.target;
    const preview = document.getElementById("profilePreview");

    if (input.files && input.files[0]) {
      const reader = new FileReader();
      reader.onload = function (e) {
        preview.src = e.target.result;
      };
      reader.readAsDataURL(input.files[0]);
    }
  }
</script>

</body>
</html>
