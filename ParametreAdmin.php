<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Paramètres Admin · BabyFarm</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Playwrite+GB+S&family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
  <style>
    :root {
      --beige: #fdf9f3;
      --beige-light: #fffdf8;
      --brown: #b38760;
      --brown-dark: #9e6d4b;
      --highlight: #f4e2d8;
    }
    * { box-sizing: border-box; }
    body {
      margin: 0;
      font-family: 'Inter', sans-serif;
      background: linear-gradient(135deg, var(--beige-light), var(--beige));
      display: flex;
    }
    .sidebar {
      width: 80px;
      background: white;
      border-top-right-radius: 40px;
      box-shadow: 4px 0 20px rgba(0,0,0,0.05);
      display: flex;
      flex-direction: column;
      align-items: center;
      transition: all 0.3s ease;
      overflow: hidden;
      position: relative;
      z-index: 10;
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
      transition: background 0.2s ease, color 0.2s ease;
      cursor: pointer;
      text-decoration: none;
      color: #333;
    }
    .nav-link:hover {
      background: var(--highlight, #f4e2d8) !important;
    }
    .nav-link img {
      width: 48px;
      height: 48px;
      margin-right: 16px;
      flex-shrink: 0;
      object-fit: contain;
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
      flex: 1;
      padding: 40px;
    }
    .section {
      background: white;
      border-radius: 20px;
      padding: 30px;
      margin-bottom: 30px;
      box-shadow: 0 8px 24px rgba(0,0,0,0.05);
    }
    .section h3 {
      font-family: 'Playwrite GB S', cursive;
      color: var(--brown-dark);
      margin-bottom: 20px;
    }
    .section table {
      width: 100%;
    }
    .section table th, .section table td {
      padding: 12px;
      text-align: left;
    }
    .btn-add {
      background: var(--brown);
      color: white;
      padding: 8px 18px;
      border-radius: 20px;
      border: none;
      font-weight: 600;
      margin-bottom: 10px;
    }
    .btn-add:hover {
      background: var(--brown-dark);
    }
  </style>
</head>
<body>
  <div class="sidebar">
    <div class="user-bubble">
      <img src="Sofiya.oulhaci.png" alt="Admin">
      <div class="name">Sofiya M.</div>
      <div class="role">Admin</div>
    </div>
    <a href="Ptest22.php" class="nav-link">
      <img src="bebe.png" alt="Enfants">
      <span class="nav-text">Enfants</span>
    </a>
    <a href="PEquipe1.php" class="nav-link">
      <img src="gens.png" alt="Équipe">
      <span class="nav-text">Équipe</span>
    </a>
    <a href="PDossierAdmin.php" class="nav-link">
      <img src="dossier.png" alt="Dossiers">
      <span class="nav-text">Dossiers</span>
    </a>
    <a href="PmessageAdmin.php" class="nav-link">
      <img src="message.png" alt="Messages">
      <span class="nav-text">Messages</span>
    </a>
    <a href="ParametreAdmin.php" class="nav-link">
      <img src="parametre.png" alt="Paramètres">
      <span class="nav-text">Paramètres</span>
    </a>
  </div>
  <div class="main-content">
    <div class="section">
      <h3>👥 Gestion des utilisateurs</h3>
      <button class="btn-add">+ Ajouter un utilisateur</button>
      <table class="table">
        <thead>
          <tr><th>Nom</th><th>Email</th><th>Rôle</th><th>Actions</th></tr>
        </thead>
        <tbody>
          <tr>
            <td>Julie Bernard</td>
            <td>julie@babyfarm.fr</td>
            <td>Auxiliaire</td>
            <td><button class="btn btn-sm btn-outline-primary">Modifier</button> <button class="btn btn-sm btn-outline-danger">Supprimer</button></td>
          </tr>
          <tr>
            <td>Fatima Sy</td>
            <td>fatima@babyfarm.fr</td>
            <td>Directrice</td>
            <td><button class="btn btn-sm btn-outline-primary">Modifier</button> <button class="btn btn-sm btn-outline-danger">Supprimer</button></td>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="section">
      <h3>🔐 Sécurité du compte</h3>
      <p><strong>Changer le mot de passe</strong></p>
      <input type="password" class="form-control mb-2" placeholder="Nouveau mot de passe">
      <button class="btn btn-secondary">Mettre à jour</button>
    </div>
  </div>
</body>
</html>
