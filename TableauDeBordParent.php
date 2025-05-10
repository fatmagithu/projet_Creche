<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Tableau de bord Parent · BabyFarm</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet"/>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
    }

    body::before {
      content: "";
      position: fixed;
      inset: 0;
      background-color: rgba(253, 249, 243, 0.94);
      backdrop-filter: blur(10px);
      z-index: -1;
    }

    .container {
      max-width: 1200px;
      margin: auto;
      padding: 60px 20px;
    }

    h1 {
      font-size: 32px;
      color: var(--brown-dark);
      margin-bottom: 30px;
      font-family: 'Playwrite GB S', sans-serif;
      text-align: center;
    }

    .section {
      background: white;
      border-radius: 20px;
      padding: 30px;
      margin-bottom: 30px;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.05);
    }

    .section h3 {
      font-size: 20px;
      color: var(--brown-dark);
      margin-bottom: 20px;
      display: flex;
      align-items: center;
      gap: 10px;
    }

    canvas {
      max-width: 400px;
      max-height: 400px;
      margin: auto;
      display: block;
    }

    .info-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
      gap: 20px;
    }

    .box {
      background-color: #fffaf5;
      padding: 15px;
      border-radius: 12px;
      border-left: 5px solid var(--brown);
      box-shadow: 0 4px 12px rgba(0,0,0,0.05);
    }

    .box strong {
      display: block;
      color: #333;
      margin-bottom: 5px;
    }

    .footer-note {
      text-align: center;
      color: #888;
      font-size: 14px;
      margin-top: 40px;
    }

    .btn-retour {
      position: fixed;
      top: 20px;
      left: 20px;
      background: white;
      border: 2px solid var(--brown);
      color: var(--brown);
      padding: 8px 16px;
      border-radius: 30px;
      font-weight: bold;
      font-size: 14px;
      text-decoration: none;
      display: flex;
      align-items: center;
      gap: 6px;
      transition: 0.3s;
      z-index: 999;
    }

    .btn-retour:hover {
      background: var(--brown);
      color: white;
    }
  </style>
</head>
<body>

<a href="EspacePersoParent.php" class="btn-retour"><i class="bi bi-arrow-left"></i> Retour</a>

<div class="container">
  <h1>Tableau de bord · ALICE · Mai 2025</h1>

  <!-- Présence -->
  <div class="section">
    <h3><i class="bi bi-calendar-check"></i> Fréquentation</h3>
    <canvas id="presenceChart"></canvas>
  </div>

  <!-- Sieste & Repas -->
  <div class="section">
    <h3><i class="bi bi-moon-stars"></i> Sieste & Appétit</h3>
    <canvas id="barChart"></canvas>
  </div>

  <!-- Activités & progrès -->
  <div class="section">
    <h3><i class="bi bi-palette"></i> Activités & Progrès</h3>
    <canvas id="progressRadar"></canvas>
  </div>

  <!-- Facturation -->
  <div class="section">
    <h3><i class="bi bi-credit-card"></i> Facturation</h3>
    <div class="info-grid">
      <div class="box">
        <strong>Montant :</strong>
        420 €
      </div>
      <div class="box">
        <strong>Aides CAF :</strong>
        180 €
      </div>
      <div class="box">
        <strong>À payer :</strong>
        240 € <a href="#" style="text-decoration: underline; color: var(--brown-dark);">Télécharger la facture</a>
      </div>
    </div>
  </div>

  <!-- Petit mot -->
  <div class="section">
    <h3><i class="bi bi-chat-heart"></i> Message de l'équipe</h3>
    <p>« Alice a fait de beaux progrès ce mois-ci. Très souriante, elle participe à tout avec enthousiasme. Bravo ! »</p>
  </div>

  <div class="footer-note">Mis à jour le 30 avril 2025</div>
</div>

<!-- Chart.js scripts -->
<script>
  // Donut présence
  const presenceChart = new Chart(document.getElementById("presenceChart"), {
    type: 'doughnut',
    data: {
      labels: ['Présente', 'Absente'],
      datasets: [{
        data: [18, 2],
        backgroundColor: ['#b38760', '#f1e5d6'],
        borderWidth: 2
      }]
    },
    options: {
      plugins: {
        legend: {
          position: 'bottom'
        }
      }
    }
  });

  // Barres sieste / appétit
  const barChart = new Chart(document.getElementById("barChart"), {
    type: 'bar',
    data: {
      labels: ['Durée sieste (moyenne)', 'Appétit (sur 10)'],
      datasets: [{
        label: 'Valeurs',
        data: [1.5, 8],
        backgroundColor: ['#f1e5d6', '#b38760'],
        borderRadius: 8
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true,
          max: 10
        }
      },
      plugins: {
        legend: { display: false }
      }
    }
  });

  // Radar Activités & Progrès
  const progressRadar = new Chart(document.getElementById("progressRadar"), {
    type: 'radar',
    data: {
      labels: [
        'Peinture',
        'Puzzles',
        'Lecture',
        'Motricité',
        'Empiler blocs',
        'Chante comptines',
        'Interactions'
      ],
      datasets: [{
        label: 'Niveau (sur 10)',
        data: [8, 6, 7, 5, 9, 8, 7],
        backgroundColor: 'rgba(179, 135, 96, 0.2)',
        borderColor: '#b38760',
        pointBackgroundColor: '#b38760',
        borderWidth: 2
      }]
    },
    options: {
      scales: {
        r: {
          angleLines: { display: false },
          suggestedMin: 0,
          suggestedMax: 10,
          ticks: { display: false },
          pointLabels: {
            font: { size: 13, family: 'Inter' },
            color: '#444'
          }
        }
      },
      plugins: {
        legend: { display: false }
      }
    }
  });
</script>

</body>
</html>
