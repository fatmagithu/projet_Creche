
<?php
session_start();

// Rediriger si déjà connecté
if (isset($_SESSION['admin_id'])) {
    header("Location: PcrecheDASHBOARD.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Récupération de mot de passe · BabyFarm</title>
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
      padding: 50px 60px;
      max-width: 720px;
      width: 90%;
      text-align: center;
      z-index: 1;
      position: relative;
    }

    .admin-logo {
      width: 340px;
      margin-bottom: 25px;
    }

    .admin-card h1 {
      font-weight: 700;
      font-size: 26px;
      color: #2c2c2c;
      margin-bottom: 12px;
    }

    .admin-card p {
      font-size: 16px;
      color: #666;
      margin-bottom: 30px;
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
}

.btn-login:hover {
  background: #e8ded0;
  transform: translateY(-2px);
}


    .forgot-password {
      margin-top: 10px;
      font-size: 14px;
      color: #888;
      text-decoration: none;
      display: inline-block;
    }

    .forgot-password:hover {
      color: #3b925f;
      text-decoration: underline;
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
    <h1>🔐 Récupération de mot de passe</h1>
    <p>Entrez votre email et numéro pour recevoir un code</p>

    <form action="traitement_reinitialisation.php" method="POST">
      <input type="email" name="email" class="form-control" placeholder="Email" required />
      <input type="tel" name="telephone" class="form-control" placeholder="Numéro de téléphone" required />
      <a href="CodeEmail.php" class="btn btn-login">Recevoir le code</a>

    </form>

    <a href="pcrecheLOGIN.php" class="forgot-password">← Retour à la connexion</a>
  </div>
</body>
</html>
