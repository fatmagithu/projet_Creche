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
      background-color: rgba(253, 249, 243, 0.93);
      backdrop-filter: blur(8px);
      z-index: -1;
    }

    .chat-tabs-top {
      display: flex;
      justify-content: center;
      gap: 20px;
      padding: 20px 0 0;
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

    .back-button {
      position: absolute;
      top: 20px;
      left: 20px;
      background: none;
      border: none;
      font-size: 22px;
      color: var(--brown-dark);
      cursor: pointer;
    }

    .app-container {
      display: flex;
      padding-top: 20px;
    }

    .parent-list {
      width: 260px;
      max-height: calc(100vh - 100px);
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
      position: relative;
    }

    .parent-item:hover {
      background: var(--beige);
    }

    .notification {
      position: absolute;
      top: 8px;
      right: 12px;
      background: red;
      color: white;
      font-size: 12px;
      font-weight: bold;
      padding: 2px 8px;
      border-radius: 20px;
    }

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

    .input-group input {
      background: white;
    }
    .parent-item.active {
  background: var(--brown);
  color: white;
}

  </style>
</head>
<body>

  <button class="back-button" onclick="window.location.href='PAuxDashboard.php'"><i class="bi bi-arrow-left"></i> Dashboard</button>

  <div class="chat-tabs-top">
    <button onclick="window.location.href='chatAUX.php'">Chat Général</button>
    <button class="active">Mes Enfants</button>
  </div>

  <div class="app-container">
    <div class="parent-list">
      <div class="parent-item active">Claire Dupont <div class="notification">2</div></div>

      <div class="parent-item">Karim</div>
      <div class="parent-item">Manel <div class="notification">1</div></div>
      <div class="parent-item">M. & Mme Diallo</div>
      <div class="parent-item">Fatou</div>
      <div class="parent-item">Thomas</div>
      <div class="parent-item">Lina</div>
      <div class="parent-item">Paul</div>
      <div class="parent-item">Sarah</div>
      <div class="parent-item">Leïla</div>
      <div class="parent-item">Ali</div>
      <div class="parent-item">Inès</div>
      <div class="parent-item">Omar</div>
      <div class="parent-item">Nora</div>
      <div class="parent-item">Youssef</div>
      <div class="parent-item">Camille</div>
      <div class="parent-item">Tarek</div>
      <div class="parent-item">Julie</div>
      <div class="parent-item">Mathis</div>
      <div class="parent-item">Salma</div>
    </div>

    <div class="main-chat">
      <div class="chat-title">Conversation avec Claire</div>

      <div class="messages" id="messagesContainer">
        <div class="message-bubble received">
          <div class="sender-name">Claire</div>
          Bonjour ! Est-ce que Léa a bien mangé ce midi ?
          <div class="timestamp">10:15</div>
          <div class="reactions">
            <button>❤️</button><button>👍</button><button>😊</button>
          </div>
        </div>
        <div class="message-bubble sent">
          <div class="sender-name">Vous</div>
          Oui, elle a tout terminé, même les légumes 🥦 !
          <div class="timestamp">10:17</div>
          <div class="reactions">
            <button>❤️</button><button>👍</button><button>😊</button>
          </div>
        </div>
      </div>

      <form id="messageForm">
        <div class="input-group">
          <input type="text" id="messageInput" class="form-control" placeholder="Écrivez un message..." required />
          <button type="submit" class="btn btn-sm" style="background: var(--brown); color: white;">Envoyer</button>
        </div>
      </form>
    </div>
  </div>

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
            <button>❤️</button><button>👍</button><button>😊</button>
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
