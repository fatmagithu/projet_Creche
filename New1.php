<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Succès · Crèche créée</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
  <style>
    :root {
      --beige: #fdf9f3;
      --brown: #b38760;
      --brown-dark: #9e6d4b;
    }

    body {
      margin: 0;
      padding: 0;
      background-color: var(--beige);
      font-family: 'Inter', sans-serif;
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
      overflow: hidden;
    }

    .success-container {
      background: white;
      padding: 40px 60px;
      border-radius: 20px;
      box-shadow: 0 15px 40px rgba(0, 0, 0, 0.08);
      text-align: center;
      position: relative;
      z-index: 2;
    }

    h1 {
      font-size: 28px;
      font-weight: 700;
      color: var(--brown-dark);
      margin-bottom: 15px;
    }

    p {
      font-size: 16px;
      color: #555;
    }

    .btn-retour {
      margin-top: 25px;
      background-color: var(--brown);
      color: white;
      padding: 10px 25px;
      border: none;
      border-radius: 30px;
      font-weight: bold;
      text-decoration: none;
      transition: background-color 0.3s;
      display: inline-block;
    }

    .btn-retour:hover {
      background-color: var(--brown-dark);
    }

    canvas {
      position: absolute;
      top: 0;
      left: 0;
      z-index: 1;
      pointer-events: none;
    }
  </style>
</head>
<body>
  <canvas id="confetti-canvas"></canvas>

  <div class="success-container">
    <h1>🎉 Bravo !</h1>
    <p>La nouvelle crèche <strong><?php echo htmlspecialchars($_GET['nom']); ?></strong> a bien été créée.</p>
    <a href="ParametreAdmin.php" class="btn-retour">Retour au tableau de bord</a>
  </div>

  <script>
    // Confetti simple style (inspiré de Fillout)
    const canvas = document.getElementById("confetti-canvas");
    const ctx = canvas.getContext("2d");
    canvas.width = window.innerWidth;
    canvas.height = window.innerHeight;

    const confettis = [];
    const colors = ["#f4d35e", "#ee964b", "#f95738", "#b38760", "#9e6d4b"];

    for (let i = 0; i < 150; i++) {
      confettis.push({
        x: Math.random() * canvas.width,
        y: Math.random() * canvas.height - canvas.height,
        w: 8,
        h: 16,
        color: colors[Math.floor(Math.random() * colors.length)],
        speed: Math.random() * 3 + 2,
        rotation: Math.random() * 360
      });
    }

    function draw() {
      ctx.clearRect(0, 0, canvas.width, canvas.height);
      for (let c of confettis) {
        ctx.save();
        ctx.translate(c.x, c.y);
        ctx.rotate(c.rotation * Math.PI / 180);
        ctx.fillStyle = c.color;
        ctx.fillRect(-c.w / 2, -c.h / 2, c.w, c.h);
        ctx.restore();

        c.y += c.speed;
        c.rotation += 5;

        if (c.y > canvas.height) {
          c.y = -20;
          c.x = Math.random() * canvas.width;
        }
      }
      requestAnimationFrame(draw);
    }

    draw();
  </script>
</body>
</html>
