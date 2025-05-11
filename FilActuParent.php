<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Fil Personnel · Alice</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Playwrite+GB+S&family=Inter:wght@400;600;700&display=swap" rel="stylesheet"/>
  <style>
    :root {
      --beige: #fdf9f3;
      --beige-light: #fffdf8;
      --brown: #b38760;
      --brown-dark: #9e6d4b;
      --alice-card: #f8ede3;
    }

    body {
      margin: 0;
      font-family: 'Inter', sans-serif;
      background: url('moussa12.png') center center / cover no-repeat fixed;
      position: relative;
      overflow-x: hidden;
    }

    body::before {
      content: "";
      position: fixed;
      inset: 0;
      background-color: rgba(253, 249, 243, 0.92);
      backdrop-filter: blur(6px);
      z-index: -1;
    }

    .navbar {
      background-color: white;
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 15px 20px;
      box-shadow: 0 2px 10px rgba(0,0,0,0.06);
      position: sticky;
      top: 0;
      z-index: 999;
    }

    .navbar a {
      font-family: 'Playwrite GB S', sans-serif;
      color: var(--brown-dark) !important;
      font-size: 20px;
      text-decoration: none;
      margin-right: 10px;
    }

    .tab-bar {
      position: fixed;
      bottom: 0;
      left: 0;
      right: 0;
      background: white;
      display: flex;
      justify-content: space-around;
      padding: 10px 0;
      border-top: 1px solid #ddd;
      z-index: 999;
    }

    .tab-bar i {
      font-size: 22px;
      color: #444;
    }

    .chat-feed {
      max-width: 600px;
      margin: auto;
      display: flex;
      flex-direction: column;
      gap: 20px;
      padding: 20px;
    }

    .chat-card {
      background: var(--alice-card);
      padding: 20px;
      border-radius: 20px;
      box-shadow: 0 12px 30px rgba(0, 0, 0, 0.06);
      animation: slideUp 0.4s ease;
      position: relative;
      margin-bottom: 40px;
    }

    @keyframes slideUp {
      from { transform: translateY(20px); opacity: 0; }
      to { transform: translateY(0); opacity: 1; }
    }

    .chat-card img {
      width: 100%;
      border-radius: 12px;
      margin-top: 12px;
    }

    .sender {
      font-weight: 700;
      color: var(--brown-dark);
      margin-bottom: 8px;
    }

    .timestamp {
      font-size: 12px;
      color: #999;
      margin-bottom: 20px;
    }

    .message {
      font-size: 16px;
      color: #444;
    }

    .reactions {
      display: flex;
      gap: 20px;
      align-items: center;
      margin-top: 14px;
    }

    .reaction-btn {
      background: none;
      border: none;
      font-size: 16px;
      cursor: pointer;
      transition: transform 0.2s ease;
      display: flex;
      align-items: center;
      gap: 4px;
    }

    .reaction-btn:hover {
      transform: scale(1.1);
    }

    .btn-comment {
      position: absolute;
      bottom: 20px;
      right: 20px;
      background-color: var(--brown);
      border: none;
      color: white;
      border-radius: 50%;
      width: 36px;
      height: 36px;
      display: flex;
      justify-content: center;
      align-items: center;
      cursor: pointer;
      font-size: 20px;
    }

    .popup {
      position: fixed;
      bottom: 70px;
      left: 50%;
      transform: translateX(-50%);
      background: white;
      padding: 20px;
      border-radius: 20px;
      box-shadow: 0 8px 30px rgba(0,0,0,0.1);
      z-index: 1000;
      width: 90%;
      max-width: 400px;
      display: none;
    }

    .comment {
      background-color: var(--beige-light);
      border-left: 4px solid var(--brown);
      padding: 10px;
      margin-top: 12px;
      border-radius: 10px;
      font-size: 14px;
    }
  </style>
</head>
<body>
  <div class="navbar">
    <button class="btn btn-outline-secondary" onclick="history.back()"><i class="bi bi-arrow-left"></i></button>
    <div>
      <a href="Pcreche22AcceuilParent.php">Fil Général</a>
      <a href="FilActuParent.php">Fil Personnel</a>
    </div>
    <i class="bi bi-bell"></i>
  </div>

  <div class="chat-feed">
    <div class="chat-card">
      <div class="sender">Sonia, Auxiliaire</div>
      <div class="timestamp">Aujourd'hui à 12h15</div>
      <div class="message">Alice a bien mangé ce midi 🍽️ : purée de carottes, poisson et compote de pommes !</div>
      <div class="reactions">
        <button class="reaction-btn" onclick="incrementLike(this)">❤️ <span>0</span></button>
        <button class="reaction-btn" onclick="incrementLike(this)">👍 <span>0</span></button>
        <button class="reaction-btn" onclick="incrementLike(this)">😊 <span>0</span></button>
      </div>
      <button class="btn-comment" onclick="openPopup(this)">+</button>
      <div class="comment-section"></div>
    </div>

    <div class="chat-card">
      <div class="sender">Léa, Lectrice</div>
      <div class="timestamp">Aujourd'hui à 10h30</div>
      <div class="message">Alice a empilé les kapla ce matin!</div>
      <img src="moussa11.png" alt="Alice jouant" />
      <div class="reactions">
        <button class="reaction-btn" onclick="incrementLike(this)">❤️ <span>0</span></button>
        <button class="reaction-btn" onclick="incrementLike(this)">👍 <span>0</span></button>
        <button class="reaction-btn" onclick="incrementLike(this)">😊 <span>0</span></button>
      </div>
      <button class="btn-comment" onclick="openPopup(this)">+</button>
      <div class="comment-section"></div>
    </div>

    <div class="chat-card">
      <div class="sender">L'équipe pédagogique</div>
      <div class="timestamp">Hier à 16h00</div>
      <div class="message">Alice a participé à l'atelier peinture aujourd'hui 🎨. Elle a peint une jolie maison bleue et rouge.</div>
      <div class="reactions">
        <button class="reaction-btn" onclick="incrementLike(this)">❤️ <span>0</span></button>
        <button class="reaction-btn" onclick="incrementLike(this)">👍 <span>0</span></button>
        <button class="reaction-btn" onclick="incrementLike(this)">😊 <span>0</span></button>
      </div>
      <button class="btn-comment" onclick="openPopup(this)">+</button>
      <div class="comment-section"></div>
    </div>

    <div class="chat-card">
      <div class="sender">Julie, Auxiliaire</div>
      <div class="timestamp">Hier à 15h00</div>
      <div class="message">Alice a joué calmement avec les cubes pendant la sieste des autres enfants 🧩.</div>
      <div class="reactions">
        <button class="reaction-btn" onclick="incrementLike(this)">❤️ <span>0</span></button>
        <button class="reaction-btn" onclick="incrementLike(this)">👍 <span>0</span></button>
        <button class="reaction-btn" onclick="incrementLike(this)">😊 <span>0</span></button>
      </div>
      <button class="btn-comment" onclick="openPopup(this)">+</button>
      <div class="comment-section"></div>
    </div>
  </div>

  <!-- Popup commentaire -->
  <div class="popup" id="popup">
    <input type="text" id="commentInput" class="form-control mb-2" placeholder="Votre commentaire">
    <button class="btn btn-primary w-100" onclick="submitComment()">Envoyer</button>
  </div>

  <!-- Barre navigation -->
  <div class="tab-bar">
    <a href="Pcreche22AcceuilParent.php"><i class="bi bi-house-door"></i></a>
    <i class="bi bi-plus-circle" onclick="window.scrollTo({ top: 0, behavior: 'smooth' });"></i>
    <a href="ParentMessageApp.php"><i class="bi bi-chat"></i></a>
    <a href="EspacePersoParent.php"><i class="bi bi-person"></i></a>
    <a href="galleriePhotoParents.php"><i class="bi bi-camera-fill"></i></a>
  </div>

  <script>
    let currentCard = null;

    function openPopup(button) {
      currentCard = button.closest('.chat-card').querySelector('.comment-section');
      document.getElementById('popup').style.display = 'block';
      document.getElementById('commentInput').focus();
    }

    function submitComment() {
      const input = document.getElementById('commentInput');
      const text = input.value.trim();
      if (text && currentCard) {
        const comment = document.createElement('div');
        comment.className = 'comment';
        comment.textContent = 'Vous : ' + text;
        currentCard.appendChild(comment);
        input.value = '';
        document.getElementById('popup').style.display = 'none';
      }
    }

    function incrementLike(btn) {
      const span = btn.querySelector('span');
      span.textContent = parseInt(span.textContent) + 1;
    }
  </script>
</body>
</html>
