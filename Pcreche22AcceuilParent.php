<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Fil Général · Nounou</title>
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
      z-index: 1000;
    }

    .navbar a {
      font-family: 'Playwrite GB S', sans-serif;
      color: var(--brown-dark) !important;
      font-size: 20px;
      text-decoration: none;
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
      background: white;
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

    .chat-card .sender {
      font-weight: 700;
      color: var(--brown-dark);
      margin-bottom: 8px;
    }

    .chat-card .timestamp {
      font-size: 12px;
      color: #999;
      margin-bottom: 20px;
    }

    .chat-card .message {
      font-size: 16px;
      color: #444;
    }

    .chat-card .views {
      font-size: 12px;
      color: #aaa;
      margin-top: 8px;
      font-style: italic;
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

    #splash {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100vh;
      background: linear-gradient(135deg, #fcf8f4, #fcf8f4);
      z-index: 9999;
      display: flex;
      align-items: center;
      justify-content: center;
      transition: opacity 0.6s ease;
    }

    #splash img {
      width: 180px;
      animation: pulse 1.5s infinite;
    }

    @keyframes pulse {
      0%, 100% { transform: scale(1); opacity: 1; }
      50% { transform: scale(1.05); opacity: 0.9; }
    }
  </style>
</head>
<body>

<!-- Splash -->
<div id="splash">
  <img src="NOUNOU (7).png" alt="Chargement">
</div>

<!-- Barre de navigation -->
<div class="navbar">
  <a href="PcrechePARENT.php" class="btn btn-outline-secondary"><i class="bi bi-arrow-left"></i></a>
  <div>
    <a href="Pcreche22AcceuilParent.php" class="fw-bold text-decoration-none text-dark me-3">Fil Général</a>
    <a href="FilActuParent.php" class="fw-bold text-decoration-none text-dark">Fil Personnel</a>
  </div>
  <i class="bi bi-bell"></i>
</div>

<!-- Fil d'actualité -->
<div class="chat-feed" id="chatFeed">
  <!-- Poste 1 -->
  <div class="chat-card">
    <div class="sender">L'équipe Nounou</div>
    <div class="timestamp">Aujourd'hui à 9h00</div>
    <div class="message">Bienvenue sur l'application Nounou 🌼 ! Ici, vous retrouverez toutes les infos, activités et moments clés de la journée de votre enfant. ❤️</div>
    <div class="reactions">
      <button class="reaction-btn" onclick="incrementLike(this)">❤️ <span>0</span></button>
      <button class="reaction-btn" onclick="incrementLike(this)">👍 <span>0</span></button>
      <button class="reaction-btn" onclick="incrementLike(this)">😊 <span>0</span></button>
    </div>
    <div class="views">👁️ Vu par 4 parents</div>
    <button class="btn-comment" onclick="openPopup(this)">+</button>
    <div class="comment-section"></div>
  </div>

  <!-- Poste 2 -->
  <div class="chat-card">
    <div class="sender">Sonia, Auxiliaire</div>
    <div class="timestamp">Aujourd'hui à 10h15</div>
    <div class="message">Petite séance lecture ce matin 📚, les enfants ont adoré les histoires de Tchoupi et Loup !</div>
    <img src="Bannière YouTube de Nomade Numérique Rouge Foncé Blanc et Noir.png" alt="Lecture Tchoupi" />
    <div class="reactions">
      <button class="reaction-btn" onclick="incrementLike(this)">❤️ <span>0</span></button>
      <button class="reaction-btn" onclick="incrementLike(this)">👍 <span>0</span></button>
      <button class="reaction-btn" onclick="incrementLike(this)">😊 <span>0</span></button>
    </div>
    <div class="views">👁️ Vu par 7 parents</div>
    <button class="btn-comment" onclick="openPopup(this)">+</button>
    <div class="comment-section"></div>
  </div>

  <!-- Poste 3 -->
  <div class="chat-card">
    <div class="sender">L'équipe Nounou</div>
    <div class="timestamp">Aujourd'hui à 9h00</div>
    <div class="message">Alice a fait un très beau dessin aujourd’hui 🎨. Elle a utilisé plein de couleurs !</div>
    <div class="reactions">
      <button class="reaction-btn" onclick="incrementLike(this)">❤️ <span>0</span></button>
      <button class="reaction-btn" onclick="incrementLike(this)">👍 <span>0</span></button>
      <button class="reaction-btn" onclick="incrementLike(this)">😊 <span>0</span></button>
    </div>
    <button class="btn-comment" onclick="openPopup(this)">+</button>
    <div class="comment-section"></div>
  </div>

  <!-- Poste 4 -->
  <div class="chat-card">
    <div class="sender">Sonia, Auxiliaire</div>
    <div class="timestamp">Aujourd'hui à 10h15</div>
    <div class="message">Les enfants jouent en intérieur pendant le temps calme 🧸</div>
    <img src="moussa6.png" alt="Jeu calme">
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

<!-- Barre de navigation basse -->
<div class="tab-bar">
  <a href="Pcreche22AcceuilParent.php"><i class="bi bi-house-door"></i></a>
  <i class="bi bi-plus-circle" onclick="scrollToTop()"></i>
  <a href="ParentMessageApp.php"><i class="bi bi-chat"></i></a>
  <a href="EspacePersoParent.php"><i class="bi bi-person"></i></a>
  <a href="galleriePhotoParents.php"><i class="bi bi-camera-fill"></i></a>
</div>

<script>
  // Splash screen
  window.addEventListener('load', () => {
    setTimeout(() => {
      const splash = document.getElementById('splash');
      splash.style.opacity = '0';
      setTimeout(() => splash.remove(), 600);
    }, 1000); // 3 secondes
  });

  // Commentaire
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

  function scrollToTop() {
    window.scrollTo({ top: 0, behavior: 'smooth' });
  }
</script>

</body>
</html>
