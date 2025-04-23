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
      --highlight: #f4e2d8;
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

    .container-chat {
      max-width: 800px;
      margin: 40px auto;
      padding: 20px;
    }

    .chat-tabs {
      display: flex;
      justify-content: center;
      margin-bottom: 30px;
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

    .chat-feed {
      display: flex;
      flex-direction: column;
      gap: 20px;
    }

    .chat-card {
      background: white;
      padding: 20px;
      border-radius: 20px;
      box-shadow: 0 12px 30px rgba(0, 0, 0, 0.06);
      position: relative;
    }

    .chat-card img {
      width: 100%;
      border-radius: 12px;
      margin-top: 12px;
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
  </style>
</head>
<body>

  <div class="container-chat">
    <div class="chat-tabs">
      <button class="active">Chat Général</button>
      <button>Mon Enfant</button>
    </div>

    <div class="chat-feed">
      <div class="chat-card">
        <div class="sender">Sonia, Auxiliaire</div>
        <div class="timestamp">Aujourd’hui à 10h12</div>
        <div class="message">Moment jeu en bois avec tous les enfants !!</div>
        <img src="moussa12.png" alt="Photo activité gâteau">
        <div class="reactions">
          <button title="J’aime ❤️">❤️</button>
          <button title="Bravo 👍">👍</button>
          <button title="Trop mignon 😊">😊</button>
        </div>
      </div>

      <div class="chat-card">
        <div class="sender">Sarah, Auxiliaire</div>
        <div class="timestamp">Aujourd’hui à 14h20</div>
        <div class="message">Petit rappel pour les parents, n'oubliez pas les tabliers pour l'atelier peinture de demain 🎨</div>
        <div class="reactions">
          <button>❤️</button>
          <button>👍</button>
          <button>😊</button>
        </div>
      </div>

      <div class="chat-card">
        <div class="sender">Nora, Auxiliaire</div>
        <div class="timestamp">Hier à 15h45</div>
        <div class="message">Petit moment de lecture calme avec les plus petits 📚.</div>
        <img src="moussa14.png" alt="Photo lecture">
        <div class="reactions">
          <button>❤️</button>
          <button>👍</button>
          <button>😊</button>
        </div>
      </div>
    </div>

    <!-- FORMULAIRE POUR AJOUTER UN POST -->
    <div class="chat-card" style="margin-top: 40px;">
      <h5 class="mb-3" style="color: var(--brown-dark);">Créer un nouveau post</h5>
      <form id="postForm">
        <div class="mb-3">
          <input type="text" class="form-control" id="senderName" placeholder="Nom de l'auxiliaire" required>
        </div>
        <div class="mb-3">
          <textarea class="form-control" id="postMessage" rows="3" placeholder="Écrivez le message ici..." required></textarea>
        </div>
        <div class="mb-3">
          <input type="file" class="form-control" id="postImage" accept="image/*">
        </div>
        <button type="submit" class="btn btn-primary" style="background: var(--brown); border: none;">Publier</button>
      </form>
    </div>
  </div>

  <script>
    document.getElementById('postForm').addEventListener('submit', function(e) {
      e.preventDefault();
      const sender = document.getElementById('senderName').value;
      const message = document.getElementById('postMessage').value;
      const imageFile = document.getElementById('postImage').files[0];
      const now = new Date();
      const time = now.toLocaleTimeString('fr-FR', { hour: '2-digit', minute: '2-digit' });
      const date = now.toLocaleDateString('fr-FR', { weekday: 'long' });
      const timestamp = `${date.charAt(0).toUpperCase() + date.slice(1)} à ${time}`;
      const reader = new FileReader();

      reader.onload = function () {
        const imageTag = imageFile ? `<img src="${reader.result}" alt="Photo activité">` : "";
        const postHTML = `
          <div class="chat-card">
            <div class="sender">${sender}</div>
            <div class="timestamp">${timestamp}</div>
            <div class="message">${message}</div>
            ${imageTag}
            <div class="reactions">
              <button title="J’aime ❤️">❤️</button>
              <button title="Bravo 👍">👍</button>
              <button title="Trop mignon 😊">😊</button>
            </div>
          </div>
        `;
        document.querySelector('.chat-feed').insertAdjacentHTML('afterbegin', postHTML);
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
