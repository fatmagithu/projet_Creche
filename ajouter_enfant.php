<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Ajouter un enfant · BabyFarm</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
  <style>
    :root {
      --beige: #fdf9f3;
      --brown: #b38760;
      --brown-dark: #9e6d4b;
    }

    body {
      margin: 0;
      font-family: 'Inter', sans-serif;
      background: url('moussa11.png') center center / cover no-repeat fixed;
      position: relative;
    }

    body::before {
      content: "";
      position: fixed;
      inset: 0;
      background-color: rgba(253, 249, 243, 0.92);
      backdrop-filter: blur(14px);
      z-index: -1;
    }

    .container {
      max-width: 600px;
      margin: 80px auto;
      background: rgba(255, 255, 255, 0.5);
      border-radius: 20px;
      padding: 40px;
      backdrop-filter: blur(10px);
      box-shadow: 0 8px 30px rgba(0, 0, 0, 0.05);
      text-align: center;
    }

    h2 {
      color: var(--brown-dark);
      margin-bottom: 20px;
      font-weight: 700;
    }

    p {
      color: #555;
      font-size: 15px;
      margin-bottom: 30px;
    }

    label {
      font-weight: 600;
      color: var(--brown-dark);
      text-align: left;
      display: block;
      margin-bottom: 6px;
    }

    input {
      width: 100%;
      padding: 10px 15px;
      border-radius: 14px;
      border: 1px solid #ccc;
      margin-bottom: 20px;
    }

    .btn-send {
      background: var(--brown);
      color: white;
      padding: 12px 25px;
      border: none;
      border-radius: 30px;
      font-weight: 600;
      transition: 0.3s;
    }

    .btn-send:hover {
      background: var(--brown-dark);
    }

    .alert-success {
      display: none;
      margin-top: 20px;
      color: green;
      font-weight: bold;
    }

    .alert-error {
      display: none;
      margin-top: 20px;
      color: red;
      font-weight: bold;
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

  <div class="container">
    <h2>Ajout d'un Nouvel Enfant</h2>
    <p>
      Entrez le prénom de l'enfant et l'email du parent. Un lien d'inscription sécurisé sera automatiquement envoyé au parent
      pour remplir le formulaire d'inscription en ligne.
    </p>
    <form id="childForm">
      <label for="prenom">Prénom de l'enfant</label>
      <input type="text" id="prenom" name="prenom" required>

      <label for="email">Email du parent</label>
      <input type="email" id="email" name="email" required>

      <button type="submit" class="btn-send">📤 Envoyer le lien d'inscription</button>
    </form>

    <div class="alert-success" id="successMessage">
      ✅ Le lien d'inscription a bien été envoyé !
    </div>
    <div class="alert-error" id="errorMessage">
      ❌ Erreur lors de l'envoi du mail. Vérifie ta configuration.
    </div>
  </div>

  <script>
    document.getElementById('childForm').addEventListener('submit', function(e) {
      e.preventDefault();
      const prenom = document.getElementById('prenom').value;
      const email = document.getElementById('email').value;

      fetch('send_link.php', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: new URLSearchParams({ prenom, email })
      })
      .then(response => response.json())
      .then(data => {
        if (data.status === "ok") {
          document.getElementById('successMessage').style.display = 'block';
          document.getElementById('errorMessage').style.display = 'none';
        } else {
          document.getElementById('errorMessage').style.display = 'block';
          document.getElementById('successMessage').style.display = 'none';
        }
      })
      .catch(() => {
        document.getElementById('errorMessage').style.display = 'block';
        document.getElementById('successMessage').style.display = 'none';
      });

      this.reset();
    });
  </script>

</body>
</html>

