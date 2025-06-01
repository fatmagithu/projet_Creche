<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Créer un compte · BabyFarm</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Playwrite+GB+S&family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
  <style>
    body {
      margin: 0;
      padding: 0;
      background: linear-gradient(135deg, #fcf8f4, #f5e8da);
      font-family: 'Inter', sans-serif;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      position: relative;
      overflow: hidden;
    }

    .blur-circle {
      position: absolute;
      width: 600px;
      height: 600px;
      background: radial-gradient(circle at center, #c6e6cf 0%, transparent 70%);
      filter: blur(150px);
      z-index: 0;
      top: -200px;
      right: -150px;
    }

    .admin-card {
      background: #ffffff;
      border: none;
      border-radius: 40px;
      box-shadow: 0 18px 60px rgba(0, 0, 0, 0.08);
      padding: 60px;
      max-width: 720px;
      width: 90%;
      text-align: center;
      z-index: 1;
      position: relative;
    }

    .admin-logo {
      width: 240px;
      margin-bottom: 20px;
    }

    h1 {
      font-family: 'Playwrite GB S', cursive;
      font-size: 26px;
      color: #2c2c2c;
      margin-bottom: 20px;
    }

    .form-control {
      border-radius: 20px;
      padding: 12px 20px;
      font-size: 15px;
      margin-bottom: 16px;
      background-color: #f7f7f7;
      border: 1px solid #ddd;
    }

    .btn-login {
      background: #f8f0e3;
      color: #2c2c2c;
      font-weight: 600;
      padding: 12px 28px;
      border-radius: 30px;
      border: none;
      transition: all 0.3s ease;
      width: 100%;
    }

    .btn-login:hover {
      background: #e8ded0;
      transform: translateY(-2px);
    }

    .bottom-link {
      font-size: 14px;
      margin-top: 15px;
    }

    .bottom-link a {
      text-decoration: none;
      font-weight: 600;
      color: #8b4d7d;
    }

    .bottom-link a:hover {
      text-decoration: underline;
      color: #6c3b68;
    }

    @media (max-width: 600px) {
      .admin-card {
        padding: 40px 25px;
      }

      .admin-logo {
        width: 180px;
      }
    }
  </style>
</head>
<body>
  <div class="blur-circle"></div>
  <div class="admin-card">
    <img src="NOUNOU (6).png" alt="Logo BabyFarm" class="admin-logo">
    <h1>Créer un compte</h1>

    <form action="PcrecheDASHBOARD.php" method="POST">
      <input type="text" name="nom" class="form-control" placeholder="Nom" required />
      <input type="text" name="prenom" class="form-control" placeholder="Prénom" required />
      <input type="email" name="email" class="form-control" placeholder="Email" required />
      <input type="tel" name="telephone" class="form-control" placeholder="Numéro de téléphone" required />
      
      <select name="role" class="form-control" required>
        <option value="">Sélectionnez votre rôle</option>
        <option value="admin">Administrateur</option>
        <option value="auxiliaire">Auxiliaire</option>
        <option value="parent">Parent</option>
      </select>

      <input type="password" name="motdepasse" class="form-control" placeholder="Mot de passe" required />
      <input type="password" name="confirm" class="form-control" placeholder="Confirmer le mot de passe" required />

      <button type="submit" class="btn-login">S’inscrire</button>
    </form>

    <div class="bottom-link">
      Déjà un compte ? <a href="pcrecheLOGIN.php">Se connecter</a>
    </div>
  </div>
</body>
</html>
