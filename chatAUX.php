<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Chat Général · Parents</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Playwrite+GB+S&family=Inter:wght@400;600;700&display=swap" rel="stylesheet"/>
  <style>
    :root {
      --beige: #fdf9f3;
      --beige-light: #fffdf8;
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
      background-color: rgba(253, 249, 243, 0.92);
      backdrop-filter: blur(6px);
      z-index: -1;
    }

    .btn-retour {
      background: white;
      border: 2px solid var(--brown-dark);
      color: var(--brown-dark);
      padding: 8px 14px;
      border-radius: 30px;
      font-weight: bold;
      cursor: pointer;
      transition: 0.3s;
      margin-bottom: 20px;
    }

    .btn-retour:hover {
      background: var(--brown-dark);
      color: white;
    }

    .chat-tabs {
      display: flex;
      justify-content: center;
      margin-bottom: 30px;
      margin-top: 20px;
    }

    .chat-tabs button {
      background: white;
      border: 2px solid var(--brown);
      padding: 10px 30px;
      margin: 0 10px;
      border-radius: 30px;
      font-weight: bold;
      color: var(--brown-dark);
      cursor: pointer;
      transition: 0.3s ease;
    }

    .chat-tabs button.active,
    .chat-tabs button:hover {
      background: var(--brown);
      color: white;
    }

    .container-chat {
      display: flex;
      gap: 30px;
      padding: 30px 60px;
    }

    .create-post {
      width: 100%;
      max-width: 800px;
      background: rgba(255,255,255,0.2);
      border-radius: 20px;
      backdrop-filter: blur(12px);
      padding: 30px;
      box-shadow: 0 8px 24px rgba(0, 0, 0, 0.05);
    }

    .chat-feed {
      flex: 1;
      display: flex;
      flex-direction: column;
      gap: 20px;
    }

    .chat-card {
      background: white;
      padding: 20px;
      border-radius: 20px;
      box-shadow: 0 12px 30px rgba(0, 0, 0, 0.06);
    }

    .chat-card img {
      width: 50%;
      border-radius: 12px;
      margin-top: 12px;
      margin-left: 150px;
    }

    .chat-card .sender {
      font-weight: 700;
      color: var(--brown-dark);
      margin-bottom: 8px;
    }

    .chat-card .timestamp {
      font-size: 12px;
      color: #999;
      margin-bottom: 10px;
    }

    .chat-card .message {
      font-size: 16px;
      color: #444;
    }

    .reactions {
      display: flex;
      gap: 12px;
      margin-top: 14px;
    }

    .reactions button {
      background: none;
      border: none;
      font-size: 20px;
      cursor: pointer;
      transition: transform 0.2s ease;
    }

    .reactions button:hover {
      transform: scale(1.2);
    }

    .comment-parent {
      margin-top: 15px;
      padding: 15px;
      background: #f2e8dd;
      border-radius: 12px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.08);
    }

    .comment-parent .name {
      font-weight: 600;
      color: var(--brown-dark);
      margin-bottom: 6px;
    }

    .comment-parent .text {
      color: #333;
    }

    .comment-parent .timestamp {
      font-size: 12px;
      color: #666;
      margin-top: 6px;
    }

    .back-button {
      position: absolute;
      top: 20px;
      left: 20px;
      background: none;
      border: 2px solid var(--brown);
      border-radius: 30px;
      padding: 8px 20px;
      font-size: 18px;
      font-weight: bold;
      font-family: 'Inter', sans-serif;
      color: var(--brown-dark);
      cursor: pointer;
      display: flex;
      align-items: center;
      gap: 8px;
      backdrop-filter: blur(6px);
      background-color: rgba(253, 249, 243, 0.85);
      box-shadow: 0 4px 12px rgba(0,0,0,0.08);
      transition: all 0.3s ease;
      z-index: 10;
    }

    .back-button:hover {
      background-color: var(--brown);
      color: white;
      transform: translateY(-2px);
    }
  </style>
</head>
<body>
<!-- Le reste du code reste inchangé -->


  <!-- Bouton Dashboard -->
  <div class="p-4 d-flex justify-content-between align-items-center">
  <button class="back-button" onclick="history.back()">
  <i class="bi bi-arrow-left"></i> Retour
</button>

  </div>

  <!-- Boutons Chat Général / Mes Enfants -->
  <div class="chat-tabs">
    <button class="active" onclick="window.location.href='chatAUX.php'">Chat Général</button>
    <button onclick="window.location.href='chatAUXlesenfants.php'">Mes Enfants</button>
  </div>

  <!-- Création de post déplacée en haut et centrée -->
  <div class="d-flex justify-content-center mt-4 mb-5">
    <div class="create-post">
      <h5 class="mb-3" style="color: var(--brown-dark); text-align: center;">Créer un post</h5>
      <form id="postForm">
        <input type="text" class="form-control mb-2" id="senderName" placeholder="Nom de l'auxiliaire" required>
        <textarea class="form-control mb-2" id="postMessage" rows="3" placeholder="Message..." required></textarea>
        <input type="file" class="form-control mb-3" id="postImage" accept="image/*">
        <button type="submit" class="btn btn-sm w-100" style="background: var(--brown); color: white;">Publier</button>
      </form>
    </div>
  </div>

  <!-- Contenu principal avec le fil -->
  <div class="container-chat">
    <!-- Zone des messages -->
    <div class="chat-feed" id="chatFeed">
      <div class="chat-card">
        <div class="sender">Sonia, Auxiliaire</div>
        <div class="timestamp">Aujourd’hui à 10h12</div>
        <div class="message">Moment jeu en bois avec tous les enfants !!</div>
        <img src="moussa12.png" alt="Photo activité">
        <div class="reactions">
          <button title="J’aime ❤️">❤️</button>
          <button title="Bravo 👍">👍</button>
          <button title="Trop mignon 😊">😊</button>
        </div>
      </div>

      <div class="chat-card">
        <div class="sender">Sonia, Auxiliaire</div>
        <div class="timestamp">Aujourd’hui à 10h12</div>
        <div class="message">Sortie au parc 🌳 les enfants ont fait un petit jeu de piste.</div>
        <img src="moussa13.png" alt="Photo sortie parc">
        <div class="reactions">
          <button title="J’aime ❤️">❤️</button>
          <button title="Bravo 👍">👍</button>
          <button title="Trop mignon 😊">😊</button>
        </div>
        <div class="comment-parent">
          <div class="name">Claire (Parent)</div>
          <div class="text">Ça a l'air trop chouette ! Merci pour le partage ❤️</div>
          <div class="timestamp">Aujourd’hui à 11h03</div>
        </div>
      </div>
    </div>
  </div>

  <!-- Script pour ajouter un post -->
  <script>
    document.getElementById('postForm').addEventListener('submit', function(e) {
      e.preventDefault();
      const sender = document.getElementById('senderName').value;
      const message = document.getElementById('postMessage').value;
      const imageFile = document.getElementById('postImage').files[0];
      const now = new Date();
      const time = now.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });

      const reader = new FileReader();
      reader.onload = function () {
        const imageTag = imageFile ? `<img src="${reader.result}" alt="Photo activité">` : "";
        const postHTML = `
          <div class="chat-card">
            <div class="sender">${sender}</div>
            <div class="timestamp">${time}</div>
            <div class="message">${message}</div>
            ${imageTag}
            <div class="reactions">
              <button title="J’aime ❤️">❤️</button>
              <button title="Bravo 👍">👍</button>
              <button title="Trop mignon 😊">😊</button>
            </div>
          </div>
        `;
        document.getElementById('chatFeed').insertAdjacentHTML('afterbegin', postHTML);
        document.getElementById('postForm').reset();
      };

      if (imageFile) {
        reader.readAsDataURL(imageFile);
      } else {
        reader.onload();
      }
    });
  </script>
</body>
</html>
