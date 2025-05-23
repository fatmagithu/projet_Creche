<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Réinitialisation du mot de passe · BabyFarm</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
  <style>
    body {
      background: url('moussa12.png') center/cover no-repeat fixed;
      font-family: 'Inter', sans-serif;
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      position: relative;
    }

    .overlay {
      position: absolute;
      inset: 0;
      background-color: rgba(253, 249, 243, 0.7);
      backdrop-filter: blur(12px);
      z-index: 0;
    }

    .reset-box {
      position: relative;
      z-index: 1;
      background: white;
      padding: 40px;
      border-radius: 24px;
      box-shadow: 0 12px 28px rgba(0,0,0,0.08);
      max-width: 450px;
      width: 100%;
    }

    .reset-box h2 {
      color: #b38760;
      font-weight: 800;
      margin-bottom: 20px;
      text-align: center;
    }

    .btn-bf {
      background-color: #b38760;
      color: white;
      border: none;
      padding: 10px 20px;
      border-radius: 24px;
      font-weight: 600;
      width: 100%;
    }

    .btn-bf:hover {
      background-color: #9e6d4b;
    }

    .back-link {
      display: block;
      text-align: center;
      margin-top: 20px;
      text-decoration: none;
      font-weight: 600;
      color: #9e6d4b;
    }

    .back-link:hover {
      text-decoration: underline;
    }

    .success-message {
      color: green;
      font-weight: bold;
      text-align: center;
      margin-top: 15px;
    }
  </style>
</head>
<body>
  <div class="overlay"></div>

  <div class="reset-box">
    <h2>🔐 Réinitialiser le mot de passe</h2>
    <form id="resetForm">
      <div class="mb-3">
        <label for="email" class="form-label">Adresse e-mail</label>
        <input type="email" class="form-control" id="email" placeholder="ex : monmail@email.com" required>
      </div>
      <button type="submit" class="btn btn-bf">📩 Envoyer le lien</button>
    </form>

    <div id="message" class="success-message" style="display: none;">
      ✔️ L'email a bien été envoyé !
    </div>

    <a href="ParametreAdmin.php" class="back-link">← Retour au dashboard</a>
  </div>

  <script>
    document.getElementById('resetForm').addEventListener('submit', function(e) {
      e.preventDefault();
      const email = document.getElementById('email').value;

      // Simulation d'envoi backend (à remplacer par fetch/ajax réel)
      setTimeout(() => {
        document.getElementById('message').style.display = 'block';
      }, 800);
    });
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
