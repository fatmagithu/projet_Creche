<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Réinitialisation · BabyFarm</title>
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
      overflow: hidden;
      position: relative;
    }

    .blur-circle {
      position: absolute;
      width: 600px;
      height: 600px;
      background: radial-gradient(circle at center, #c6e6cf 0%, transparent 70%);
      filter: blur(150px);
      top: -200px;
      right: -150px;
      z-index: 0;
    }

    .admin-card {
      background: #ffffff;
      border: none;
      border-radius: 40px;
      box-shadow: 0 18px 60px rgba(0, 0, 0, 0.08);
      padding: 50px 60px;
      max-width: 720px;
      width: 90%;
      text-align: center;
      z-index: 1;
      position: relative;
    }

    .admin-logo {
      width: 300px;
      margin-bottom: 25px;
    }

    h1 {
      font-size: 24px;
      font-weight: 700;
      color: #2c2c2c;
      margin-bottom: 15px;
    }

    .form-control {
      border-radius: 20px;
      padding: 12px 20px;
      font-size: 15px;
      margin-bottom: 20px;
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
      cursor: pointer;
    }

    .btn-login:hover {
      background: #e8ded0;
      transform: translateY(-2px);
    }

    .back-link {
      margin-top: 15px;
      display: block;
      font-size: 14px;
      color: #888;
      text-decoration: none;
    }

    .back-link:hover {
      color: #3b925f;
      text-decoration: underline;
    }

    .alert {
      border-radius: 15px;
      margin-bottom: 20px;
    }

    .alert-danger {
      background-color: #f8d7da;
      color: #721c24;
      border: 1px solid #f5c6cb;
    }

    .alert-success {
      background-color: #d4edda;
      color: #155724;
      border: 1px solid #c3e6cb;
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
    <h1>🔐 Réinitialiser votre mot de passe</h1>
    <p>Veuillez entrer le code reçu et définir un nouveau mot de passe</p>

    <?php
    session_start();
    // Affichage des messages
    if (isset($_GET['error'])) {
        echo '<div class="alert alert-danger">' . htmlspecialchars($_GET['error']) . '</div>';
    }
    if (isset($_GET['success']) && $_GET['success'] === 'code_sent') {
        echo '<div class="alert alert-success">Code envoyé avec succès ! Vérifiez votre boîte email.</div>';
    }
    if (isset($_GET['success']) && $_GET['success'] === 'password_reset') {
        echo '<div class="alert alert-success">Mot de passe réinitialisé avec succès !</div>';
    }
    ?>

    <form action="resetPassword.php" method="POST">
      <input type="text" name="code" class="form-control" placeholder="Code reçu (6 chiffres)" maxlength="6" required />
      <input type="password" name="new_password" class="form-control" placeholder="Nouveau mot de passe" minlength="6" required />
      <input type="password" name="confirm_password" class="form-control" placeholder="Confirmer le mot de passe" minlength="6" required />

      <button type="submit" class="btn btn-login">Réinitialiser</button>
    </form>

    <a href="pcrecheLOGIN.php" class="back-link">← Retour à la connexion</a>
  </div>
</body>
</html>