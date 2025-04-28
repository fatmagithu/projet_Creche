<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Pointage Enfants · BabyFarm</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Playwrite+GB+S&family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: 'Inter', sans-serif;
      background: linear-gradient(145deg, #f9f4ef, #f1e5d6);
      min-height: 100vh;
      display: flex;
      flex-direction: column;
      align-items: center;
      padding: 50px 20px 20px 20px;
      position: relative;
    }

    .btn-retour {
      position: absolute;
      top: 20px;
      left: 20px;
      background: white;
      border: 2px solid #b38760;
      color: #b38760;
      padding: 8px 14px;
      border-radius: 30px;
      font-weight: bold;
      cursor: pointer;
      transition: 0.3s;
      font-size: 14px;
    }

    .btn-retour:hover {
      background: #b38760;
      color: white;
    }

    h1 {
      font-family: 'Playwrite GB S', sans-serif;
      font-size: 36px;
      margin-bottom: 40px;
      color: #b38760;
      text-shadow: 1px 1px 1px #ffffff;
    }

    .grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(140px, 1fr));
      gap: 40px;
      width: 100%;
      max-width: 1000px;
    }

    .child-card {
      background: linear-gradient(to bottom right, #fffdfc, #f9f3eb);
      border-radius: 28px;
      padding: 16px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.06);
      display: flex;
      flex-direction: column;
      align-items: center;
      transition: all 0.3s ease;
      cursor: pointer;
      position: relative;
      border: 1.5px solid #e5ddd3;
      overflow: hidden;
    }

    .child-card:hover {
      transform: translateY(-8px) scale(1.02);
      box-shadow: 0 16px 40px rgba(0, 0, 0, 0.1);
    }

    .child-card img {
      width: 78px;
      height: 78px;
      border-radius: 50%;
      object-fit: cover;
      border: 3px solid #f3ebe1;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
      margin-bottom: 10px;
      background: #fff;
    }

    .child-name {
      font-size: 15px;
      font-weight: 600;
      color: #4a4a4a;
      text-align: center;
      font-family: 'Playwrite GB S', sans-serif;
    }

    .status-dot {
      width: 12px;
      height: 12px;
      background-color: #c0c0c0;
      border-radius: 50%;
      position: absolute;
      top: 12px;
      right: 12px;
      box-shadow: 0 0 0 2px white;
    }

    .child-card.arrived .status-dot {
      background-color: #65c18c;
    }

    .child-card.left .status-dot {
      background-color: #e58e8e;
    }

    .counter {
      margin-top: 10px;
      background: #b38760;
      color: white;
      font-weight: bold;
      padding: 8px 20px;
      border-radius: 30px;
      font-size: 18px;
      transition: transform 0.2s ease;
      display: inline-block;
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }

    .counter.burst {
      animation: burst 0.6s forwards;
    }

    @keyframes burst {
      0% { transform: scale(1); background: #b38760; }
      30% { transform: scale(1.5); background: #ffcc80; }
      60% { transform: scale(0.8); background: #b38760; }
      100% { transform: scale(1); background: #b38760; }
    }

    @media (max-width: 600px) {
      h1 {
        font-size: 26px;
      }
      .child-card img {
        width: 64px;
        height: 64px;
      }
      .counter {
        font-size: 16px;
        padding: 6px 18px;
      }
    }
  </style>
</head>

<body>

  <!-- Bouton Retour -->
  <button class="btn-retour" onclick="window.location.href='PAuxDashboard.php'">
    <i class="bi bi-arrow-left"></i> Retour
  </button>

  <h1>Rapport des changes</h1>

  <div class="grid">
    <div class="child-card" onclick="increment(this)">
      <span class="status-dot"></span>
      <img src="moussa13.png" alt="Alice">
      <div class="child-name">Alice</div>
      <div class="counter">0</div>
    </div>

    <div class="child-card" onclick="increment(this)">
      <span class="status-dot"></span>
      <img src="moussa14.png" alt="Manel">
      <div class="child-name">Manel</div>
      <div class="counter">0</div>
    </div>

    <div class="child-card" onclick="increment(this)">
      <span class="status-dot"></span>
      <img src="moussa15.png" alt="Yacine">
      <div class="child-name">Yacine</div>
      <div class="counter">0</div>
    </div>

    <div class="child-card" onclick="increment(this)">
      <span class="status-dot"></span>
      <img src="Sohan5.png" alt="Yoan">
      <div class="child-name">Yoan</div>
      <div class="counter">0</div>
    </div>

    <div class="child-card" onclick="increment(this)">
      <span class="status-dot"></span>
      <img src="Sohan6.png" alt="Yamanda">
      <div class="child-name">Yamanda</div>
      <div class="counter">0</div>
    </div>

    <div class="child-card" onclick="increment(this)">
      <span class="status-dot"></span>
      <img src="Sohan3.png" alt="Ezekiel">
      <div class="child-name">Ezekiel</div>
      <div class="counter">0</div>
    </div>

    <div class="child-card" onclick="increment(this)">
      <span class="status-dot"></span>
      <img src="Sohan2.png" alt="Gabriel">
      <div class="child-name">Gabriel</div>
      <div class="counter">0</div>
    </div>

    <div class="child-card" onclick="increment(this)">
      <span class="status-dot"></span>
      <img src="Sohan3.png" alt="Mohamed">
      <div class="child-name">Mohamed</div>
      <div class="counter">0</div>
    </div>

    <div class="child-card" onclick="increment(this)">
      <span class="status-dot"></span>
      <img src="Sohan2.png" alt="Ibrahim">
      <div class="child-name">Ibrahim</div>
      <div class="counter">0</div>
    </div>

    <div class="child-card" onclick="increment(this)">
      <span class="status-dot"></span>
      <img src="Sohan6.png" alt="Nela">
      <div class="child-name">Nela</div>
      <div class="counter">0</div>
    </div>
  </div>

  <script>
    function increment(card) {
      const counter = card.querySelector('.counter');
      counter.textContent = parseInt(counter.textContent) + 1;
      counter.classList.add('burst');
      setTimeout(() => counter.classList.remove('burst'), 600);
    }
  </script>

</body>
</html>
