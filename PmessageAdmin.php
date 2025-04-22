<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Messagerie - Admin BabyFarm</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Playwrite+GB+S&family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
  <style>
    :root {
      --beige: #fdf9f3;
      --beige-light: #fffdf8;
      --brown: #b38760;
      --brown-dark: #9e6d4b;
      --highlight: #f4e2d8;
      --blue: #1da1f2;
      --blue-dark: #0d8ae2;
      --highlight: #f4e2d8; /* c'est bien là */
    }
    * { box-sizing: border-box; }
    body {
      margin: 0;
      display: flex;
      font-family: 'Inter', sans-serif;
      background: var(--beige-light);
      height: 100vh;
      overflow: hidden;
    }
    /* SIDEBAR MODERNE */
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
  transition: background 0.2s ease;
  cursor: pointer;
  text-decoration: none;
  color: #333;
}

.nav-link:hover {
  background: var(--highlight);
}
.nav-link img {
width: 48px;
height: 48px;
margin-right: 16px;
flex-shrink: 0;
}


.nav-text {
  opacity: 0;
  transition: opacity 0.3s;
  white-space: nowrap;
}

.sidebar:hover .nav-text {
  opacity: 1;
}

    .chat-app {
      flex: 1;
      display: flex;
      flex-direction: column;
      padding: 30px;
      overflow: hidden;
      width: calc(100% - 160px);
    }
    .chat-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 20px;
    }
    .chat-header h1 {
      font-size: 32px;
      color: var(--brown-dark);
      font-family: 'Playwrite GB S', cursive;
    }
    .chat-header button {
      font-size: 16px;
      font-weight: 600;
      padding: 12px 24px;
      border-radius: 30px;
      margin-left: 10px;
      background-color: var(--blue);
      color: white;
      border: none;
      transition: all 0.3s ease;
    }
    .chat-header button:hover {
      background-color: var(--blue-dark);
    }
    .chat-container {
      display: flex;
      height: 100%;
      border-radius: 20px;
      overflow: hidden;
      background: white;
      box-shadow: 0 8px 30px rgba(0, 0, 0, 0.08);
    }
    .chat-list {
      width: 300px;
      border-right: 1px solid #eee;
      overflow-y: auto;
      padding: 20px;
      background: #f8f9fa;
    }
    .chat-list h5 {
      font-weight: bold;
      margin-bottom: 15px;
      color: var(--brown-dark);
      font-size: 18px;
    }
    .chat-item {
      padding: 14px 18px;
      border-radius: 14px;
      margin-bottom: 12px;
      background: white;
      cursor: pointer;
      transition: background 0.2s;
      font-weight: 500;
      border: 1px solid #ddd;
    }
    .chat-item:hover {
      background: var(--blue);
      color: white;
      border-color: var(--blue);
    }
    .chat-box {
      flex: 1;
      display: flex;
      flex-direction: column;
      background: var(--beige-light);
    }
    .chat-box-header {
      padding: 24px;
      background: var(--beige);
      border-bottom: 1px solid #ddd;
      font-weight: 700;
      font-size: 18px;
      color: var(--brown-dark);
    }
    .messages {
      flex: 1;
      overflow-y: auto;
      padding: 24px;
      display: flex;
      flex-direction: column;
      gap: 14px;
    }
    .message {
      max-width: 75%;
      padding: 14px 18px;
      border-radius: 20px;
      font-size: 15px;
      position: relative;
    }
    .sent {
      align-self: flex-end;
      background: var(--blue);
      color: white;
    }
    .received {
      align-self: flex-start;
      background: #f1f1f1;
      color: #333;
    }
    .meta {
      font-size: 11px;
      margin-top: 6px;
      color: #777;
    }
    .likes {
      font-size: 12px;
      color: var(--brown);
      margin-top: 4px;
    }
    .chat-input {
      padding: 20px;
      display: flex;
      gap: 12px;
      background: white;
      border-top: 1px solid #ddd;
    }
    .chat-input input {
      flex: 1;
      padding: 12px 18px;
      border-radius: 30px;
      border: 1px solid #ccc;
      font-size: 15px;
    }
    .chat-input button {
      padding: 12px 24px;
      background: var(--blue);
      color: white;
      border: none;
      border-radius: 30px;
      font-size: 15px;
    }
    .chat-input button:hover {
      background-color: var(--blue-dark);
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

  <div class="chat-app">
    <div class="chat-header">
      <h1>✉️ Messagerie</h1>
      <div>
      <button onclick="window.location.href='PmessageParentAdmin.php'">👨‍👩‍👧‍👦 Parents</button>
      <button onclick="window.location.href='PmessageAdmin.php'">👩‍⚕️ Équipe</button>
      </div>
    </div>

    <div class="chat-container">
      <div class="chat-list">
        <h5>Discussions</h5>
        <div class="chat-item">Équipe Marseille</div>
        <div class="chat-item">Équipe PARIS</div>
        <div class="chat-item">Équipe TOULOUSE</div>
        <div class="chat-item">Équipe MANTES</div>
      </div>

      <div class="chat-box">
        <div class="chat-box-header">Discussion avec Équipe Marseille</div>
        <div class="messages">
          <div class="message received">
            <strong>Claire (08:42)</strong><br>
            Bonjour à tous, n'oubliez pas la réunion demain !
            <div class="meta">Vu par Équipe, 3 likes ❤️</div>
          </div>
          <div class="message sent">
            <strong>Admin (08:44)</strong><br>
            Merci pour le rappel 🙏
            <div class="meta">Vu par Claire, 2 likes 👍</div>
          </div>
          <div class="message received">
            <strong>Claire (08:45)</strong><br>
            Pensez aussi à vérifier les fiches enfants.
            <div class="meta">Vu par Équipe</div>
          </div>
        </div>
        <div class="chat-input">
          <input type="text" placeholder="Écrire un message...">
          <button>Envoyer</button>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
