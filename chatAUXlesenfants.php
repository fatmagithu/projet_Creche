<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Mon Enfant · Chat</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Playwrite+GB+S&family=Inter:wght@400;600;700&display=swap" rel="stylesheet"/>
  <style>
    :root {
      --beige: #fdf9f3;
      --brown: #b38760;
      --brown-dark: #9e6d4b;
    }

    body {
      margin: 0;
      font-family: 'Inter', sans-serif;
      background: url('moussa12.png') center center / cover no-repeat fixed;
      position: relative;
    }

    body::before {
      content: "";
      position: fixed;
      inset: 0;
      background-color: rgba(253, 249, 243, 0.9);
      backdrop-filter: blur(7px);
      z-index: -1;
    }

    .chat-tabs-top {
      display: flex;
      justify-content: center;
      gap: 20px;
      padding: 30px 0 0;
    }

    .chat-tabs-top button {
      background: white;
      border: 2px solid var(--brown);
      padding: 10px 30px;
      border-radius: 30px;
      font-weight: bold;
      color: var(--brown-dark);
      cursor: pointer;
      transition: 0.3s ease;
    }

    .chat-tabs-top .active,
    .chat-tabs-top button:hover {
      background: var(--brown);
      color: white;
    }

    .app-container {
      display: flex;
      height: calc(100vh - 80px);
    }

    .sidebar {
      width: 280px;
      background: white;
      border-top-right-radius: 40px;
      padding: 30px 20px;
      display: flex;
      flex-direction: column;
      gap: 30px;
      box-shadow: 4px 0 20px rgba(0,0,0,0.08);
    }

    .logo {
      width: 140px;
      margin-bottom: 10px;
      margin-left:40px;
    }

    .btn-back {
      font-size: 20px;
      color: var(--brown-dark);
      background: none;
      border: none;
      cursor: pointer;
      margin-bottom: 20px;
    }

    .parent-list {
      flex: 1;
      overflow-y: auto;
    }

    .parent-item {
      padding: 12px;
      border-radius: 14px;
      background: var(--beige);
      margin-bottom: 10px;
      cursor: pointer;
      font-weight: 600;
    }

    .main-chat {
      flex: 1;
      padding: 40px;
      display: flex;
      flex-direction: column;
    }

    .chat-title {
      font-family: 'Playwrite GB S', cursive;
      font-size: 24px;
      color: var(--brown-dark);
      margin-bottom: 20px;
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
      position: relative;
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

    .reactions {
      margin-top: 10px;
      display: flex;
      gap: 10px;
    }

    .reactions button {
      border: none;
      background: none;
      font-size: 20px;
      cursor: pointer;
      transition: transform 0.2s ease;
    }

    .reactions button:hover {
      transform: scale(1.2);
    }
  </style>
</head>
<body>

  <!-- BOUTONS EN HAUT -->
  <div class="chat-tabs-top">
    <button onclick="window.location.href='chatAUX.php'">Chat Général</button>
    <button class="active">Mes Enfants</button>
  </div>

  <!-- STRUCTURE APP -->
  <div class="app-container">
    <div class="sidebar">
      <img src="NOUNOU (6).png" class="logo" alt="Logo BabyFarm">
      <button class="btn-back" onclick="window.history.back()"><i class="bi bi-arrow-left"></i></button>
      <div class="parent-list">
        <div class="parent-item">Claire Dupont </div>
        <div class="parent-item">Karim</div>
        <div class="parent-item">Manel</div>
        <div class="parent-item">M. & Mme Diallo</div>
      </div>
    </div>

    <div class="main-chat">
  <div class="chat-title">Conversation avec Claire</div>

  <div class="messages" id="messagesContainer">
    <div class="message-bubble received">
      <div class="sender-name">Claire</div>
      Bonjour ! Est-ce que Léa a bien mangé ce midi ?
      <div class="timestamp">10:15</div>
      <div class="reactions">
        <button>❤️</button>
        <button>👍</button>
        <button>😊</button>
      </div>
    </div>
    <div class="message-bubble sent">
      <div class="sender-name">Vous</div>
      Oui, elle a tout terminé, même les légumes 🥦 !
      <div class="timestamp">10:17</div>
      <div class="reactions">
        <button>❤️</button>
        <button>👍</button>
        <button>😊</button>
      </div>
    </div>
  </div>

  <!-- ZONE DE RÉDACTION -->
  <form id="messageForm" style="margin-top: 20px;">
    <div class="input-group">
      <input type="text" id="messageInput" class="form-control" placeholder="Écrivez un message..." required />
      <button type="submit" class="btn btn-sm" style="background: var(--brown); color: white;">
        Envoyer
      </button>
    </div>
  </form>
</div>

<!-- SCRIPT -->
<script>
  document.getElementById('messageForm').addEventListener('submit', function(e) {
    e.preventDefault();
    const input = document.getElementById('messageInput');
    const message = input.value.trim();
    if (!message) return;

    const now = new Date();
    const time = now.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });

    const msgHTML = `
      <div class="message-bubble sent">
        <div class="sender-name">Vous</div>
        ${message}
        <div class="timestamp">${time}</div>
        <div class="reactions">
          <button>❤️</button>
          <button>👍</button>
          <button>😊</button>
        </div>
      </div>
    `;

    document.getElementById('messagesContainer').insertAdjacentHTML('beforeend', msgHTML);
    input.value = '';
    document.getElementById('messagesContainer').scrollTop = document.getElementById('messagesContainer').scrollHeight;
  });
</script>
</body>
</html>
