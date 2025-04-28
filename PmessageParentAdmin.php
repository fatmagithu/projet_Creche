<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Chat Équipe - BabyFarm</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Playwrite+GB+S&family=Inter:wght@400;600;700&display=swap" rel="stylesheet" />
  <style>
    :root {
      --beige: #fdf9f3;
      --brown: #b38760;
      --brown-dark: #9e6d4b;
    }

    * { box-sizing: border-box; }

    body {
      margin: 0;
      font-family: 'Inter', sans-serif;
      background: url('moussa12.png') center/cover no-repeat fixed;
      position: relative;
      min-height: 100vh;
      display: flex;
    }

    body::before {
      content: "";
      position: fixed;
      inset: 0;
      background-color: rgba(253, 249, 243, 0.93);
      backdrop-filter: blur(8px);
      z-index: -1;
    }

    .sidebar {
      width: 85px;
      background: url('moussa12.png') center center/cover no-repeat;
      position: fixed;
      height: 100vh;
      display: flex;
      flex-direction: column;
      align-items: center;
      padding: 20px 0;
      border-right: 1px solid #f0eae0;
      transition: width 0.3s ease;
      z-index: 1000;
      overflow: hidden;
    }

    .sidebar::before {
      content: "";
      position: absolute;
      inset: 0;
      background-color: rgba(253, 249, 243, 0.85);
      z-index: 0;
      backdrop-filter: blur(3px);
    }

    .sidebar > * { position: relative; z-index: 1; }

    .sidebar:hover { width: 220px; }

    .user-bubble {
      text-align: center;
      margin-bottom: 30px;
      transition: 0.3s ease;
      opacity: 0;
      height: 0;
      overflow: hidden;
    }

    .sidebar:hover .user-bubble {
      opacity: 1;
      height: auto;
    }

    .user-bubble img {
      width: 60px;
      height: 60px;
      border-radius: 50%;
      object-fit: cover;
      margin-bottom: 10px;
    }

    .nav-link {
      display: flex;
      align-items: center;
      width: 100%;
      padding: 12px 16px;
      margin: 6px 0;
      border-radius: 14px;
      text-decoration: none;
      color: #333;
      transition: background 0.2s ease;
    }

    .nav-link:hover { background: var(--beige); }

    .nav-link img {
      width: 48px;
      height: 48px;
      margin-right: 16px;
    }

    .nav-text {
      opacity: 0;
      transition: opacity 0.3s;
      white-space: nowrap;
    }

    .sidebar:hover .nav-text { opacity: 1; }

    .content {
      flex: 1;
      padding: 30px;
      margin-left: 85px;
      transition: margin-left 0.3s ease;
      display: flex;
      flex-direction: column;
      position: relative;
    }

    .chat-tabs-top {
      display: flex;
      justify-content: center;
      gap: 20px;
      margin-bottom: 20px;
    }

    .chat-tabs-top button {
      background: white;
      border: 2px solid var(--brown);
      padding: 10px 30px;
      border-radius: 30px;
      font-weight: bold;
      color: var(--brown-dark);
      cursor: pointer;
      transition: 0.3s;
    }

    .chat-tabs-top .active,
    .chat-tabs-top button:hover {
      background: var(--brown);
      color: white;
    }

    .app-container {
      flex: 1;
      display: flex;
      padding-top: 20px;
    }

    .parent-list {
      width: 260px;
      max-height: calc(100vh - 150px);
      overflow-y: auto;
      display: flex;
      flex-direction: column;
      gap: 14px;
      padding: 20px;
    }

    .parent-item {
      background: white;
      border-radius: 20px;
      padding: 12px 18px;
      font-weight: 600;
      cursor: pointer;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.07);
      transition: background 0.2s ease;
    }

    .parent-item:hover { background: var(--beige); }

    .main-chat {
      flex: 1;
      padding: 40px;
      display: flex;
      flex-direction: column;
      gap: 20px;
    }

    .chat-title {
      font-family: 'Playwrite GB S', cursive;
      font-size: 24px;
      color: var(--brown-dark);
    }

    .messages {
      flex: 1;
      display: flex;
      flex-direction: column;
      gap: 20px;
      overflow-y: auto;
    }

    .message-bubble {
      max-width: 70%;
      padding: 16px 20px;
      border-radius: 20px;
      background: white;
      box-shadow: 0 6px 20px rgba(0, 0, 0, 0.08);
    }

    .sent {
      align-self: flex-end;
      background: var(--brown);
      color: white;
    }

    .received {
      align-self: flex-start;
    }

    .sender-name {
      font-weight: 700;
      margin-bottom: 4px;
    }

    .timestamp {
      font-size: 12px;
      color: #777;
      margin-top: 8px;
    }

    .input-group {
      margin-top: 20px;
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
    <a href="Ptest22.php" class="nav-link"><img src="bebe.png" alt="Enfants"><span class="nav-text">Enfants</span></a>
    <a href="PEquipe1.php" class="nav-link"><img src="gens.png" alt="Equipe"><span class="nav-text">Equipe</span></a>
    <a href="PDossierAdmin.php" class="nav-link"><img src="dossier.png" alt="Dossiers"><span class="nav-text">Dossiers</span></a>
    <a href="PmessageAdmin.php" class="nav-link"><img src="message.png" alt="Messages"><span class="nav-text">Messages</span></a>
    <a href="ParametreAdmin.php" class="nav-link"><img src="parametre.png" alt="Paramètres"><span class="nav-text">Paramètres</span></a>
  </div>

  <div class="content">
    <div class="chat-tabs-top">
      <button onclick="window.location.href='PmessageAdmin.php'">Chat Parents</button>
      <button class="active">Chat Équipe</button>
      <button onclick="window.location.href='chatAUX.php'">Contrôle Conversations</button>
    </div>

    <div class="app-container">
      <div class="parent-list">
        <div class="parent-item">Malika</div>
        <div class="parent-item">Sofia</div>
        <div class="parent-item">Fatma</div>
        <div class="parent-item">Amal</div>
        <div class="parent-item">Nadia</div>
      </div>

      <div class="main-chat">
        <div class="chat-title">Groupe : Toute l'Équipe</div>

        <div class="messages" id="messagesContainer">
          <div class="message-bubble received">
            <div class="sender-name">Malika</div>
            Coucou tout le monde, réunion à 14h ?
            <div class="timestamp">10:10</div>
          </div>
          <div class="message-bubble sent">
            <div class="sender-name">Admin</div>
            Oui, merci Malika !
            <div class="timestamp">10:12</div>
          </div>
        </div>

        <form id="messageForm" style="margin-top:20px;">
          <div class="input-group">
            <input type="text" id="messageInput" class="form-control" placeholder="Écrivez un message..." required />
            <button type="submit" class="btn btn-sm" style="background: var(--brown); color: white;">Envoyer</button>
          </div>
        </form>

      </div>
    </div>
  </div>

  <script>
    const messageForm = document.getElementById('messageForm');
    const messageInput = document.getElementById('messageInput');
    const messagesContainer = document.getElementById('messagesContainer');

    messageForm.addEventListener('submit', function(e) {
      e.preventDefault();
      const message = messageInput.value.trim();
      if (!message) return;

      const now = new Date();
      const time = now.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });

      const bubble = document.createElement('div');
      bubble.className = 'message-bubble sent';
      bubble.innerHTML = `
        <div class="sender-name">Vous</div>
        ${message}
        <div class="timestamp">${time}</div>
      `;

      messagesContainer.appendChild(bubble);
      messageInput.value = '';
      messagesContainer.scrollTop = messagesContainer.scrollHeight;
    });
  </script>
</body>
</html>
