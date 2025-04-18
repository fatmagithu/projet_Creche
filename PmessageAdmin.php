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
    }
    * { box-sizing: border-box; }
    body {
      margin: 0;
      display: flex;
      font-family: 'Inter', sans-serif;
      background: linear-gradient(135deg, var(--beige-light), var(--beige));
      height: 100vh;
      overflow: hidden;
    }
    .sidebar {
      width: 160px;
      background: white;
      padding: 30px 0;
      border-top-right-radius: 40px;
      box-shadow: 4px 0 20px rgba(0,0,0,0.04);
      display: flex;
      flex-direction: column;
      align-items: center;
    }
    .sidebar .icon {
      width: 58px;
      height: 60px;
      margin: 22px 0;
      object-fit: contain;
      cursor: pointer;
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
      font-size: 28px;
      color: var(--brown);
      font-family: 'Playwrite GB S', cursive;
    }
    .chat-header button {
      font-size: 16px;
      font-weight: 600;
      padding: 12px 24px;
      border-radius: 30px;
      margin-left: 10px;
      background-color: var(--highlight);
      color: var(--brown-dark);
      border: 2px solid var(--brown);
      transition: all 0.3s ease;
    }
    .chat-header button:hover {
      background-color: var(--brown);
      color: white;
    }
    .chat-container {
      display: flex;
      height: 100%;
      border-radius: 20px;
      overflow: hidden;
      background: white;
      box-shadow: 0 8px 30px rgba(0, 0, 0, 0.05);
    }
    .chat-list {
      width: 300px;
      border-right: 1px solid #eee;
      overflow-y: auto;
      padding: 20px;
      background: #fffdf8;
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
    }
    .chat-item:hover {
      background: var(--highlight);
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
      max-width: 70%;
      padding: 14px 18px;
      border-radius: 20px;
      font-size: 15px;
    }
    .sent {
      align-self: flex-end;
      background: var(--brown);
      color: white;
    }
    .received {
      align-self: flex-start;
      background: white;
      border: 1px solid #ddd;
      color: #333;
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
      background: var(--brown);
      color: white;
      border: none;
      border-radius: 30px;
      font-size: 15px;
    }
  </style>
</head>
<body>
  <div class="sidebar">
    <a href="Ptest22.php"><img src="bebe.png" alt="bebe" class="icon"></a>
    <a href="PEquipe1.php"><img src="gens.png" alt="gens" class="icon"></a>
    <a href="PDossierAdmin.php"><img src="dossier.png" alt="dossier" class="icon"></a>
    <a href="messages.php"><img src="message.png" alt="message" class="icon active"></a>
    <a href="parametres.php"><img src="parametre.png" alt="parametre" class="icon"></a>
  </div>

  <div class="chat-app">
    <div class="chat-header">
      <h1>✉️ Messagerie</h1>
      <div>
        <button>👨‍👩‍👧‍👦 Parents</button>
        <button>👩‍⚕️ Équipe</button>
      </div>
    </div>

    <div class="chat-container">
      <div class="chat-list">
        <h5>Discussions</h5>
        <div class="chat-item">Marie Dupont</div>
        <div class="chat-item">Équipe Marseille</div>
        <div class="chat-item">Sophie Bernard</div>
        <div class="chat-item">Parents Crèche Soleil</div>
      </div>

      <div class="chat-box">
        <div class="chat-box-header">Discussion avec Équipe Marseille</div>
        <div class="messages">
          <div class="message received">Bonjour à tous, n'oubliez pas la réunion demain !</div>
          <div class="message sent">Merci pour le rappel 🙏</div>
          <div class="message received">Pensez aussi à vérifier les fiches enfants.</div>
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
