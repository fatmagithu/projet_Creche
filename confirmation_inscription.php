<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Confirmation - BabyFarm</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
  <style>
    body {
      background: linear-gradient(135deg, #fcf8f4, #f5e8da);
      font-family: 'Inter', sans-serif;
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
      margin: 0;
    }
    .confirmation-box {
      background-color: #fff;
      padding: 40px 50px;
      border-radius: 16px;
      box-shadow: 0 8px 24px rgba(0, 0, 0, 0.06);
      text-align: center;
      max-width: 500px;
      width: 100%;
    }
    .confirmation-box h1 {
      color: #2a7755;
      font-size: 24px;
      font-weight: 700;
      margin-bottom: 20px;
    }
    .confirmation-box p {
      font-size: 16px;
      color: #555;
      margin-bottom: 30px;
    }
    .confirmation-box a.btn {
      background-color: #70c8a0;
      color: white;
      padding: 10px 25px;
      font-weight: 600;
      border-radius: 10px;
      text-decoration: none;
      transition: background-color 0.3s ease;
    }
    .confirmation-box a.btn:hover {
      background-color: #61b88e;
    }
  </style>
</head>
<body>
  <div class="confirmation-box">
    <h1>Inscription réussie !</h1>
    <p>Le dossier a bien été enregistré dans notre base de données.<br>
    Merci pour votre confiance.</p>
    <a href="PcrecheForm1.PHP" class="btn">Retour au formulaire</a>
  </div>
</body>
</html>
