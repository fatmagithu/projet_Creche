<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Planning des Activités</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet"/>
  <style>
    :root {
      --beige: #fdf9f3;
      --brown: #b38760;
      --brown-dark: #9e6d4b;
      --highlight: #f4e2d8;
    }

    body {
      margin: 0;
      font-family: 'Inter', sans-serif;
      background: url('moussa12.png') center center / cover no-repeat fixed;
      position: relative;
      min-height: 100vh;
      padding-bottom: 60px;
      overflow-x: hidden;
    }

    body::before {
      content: "";
      position: fixed;
      inset: 0;
      background-color: rgba(253, 249, 243, 0.9);
      backdrop-filter: blur(8px);
      z-index: -1;
    }

    .btn-retour {
      background: white;
      border: 2px solid var(--brown-dark);
      color: var(--brown-dark);
      padding: 10px 20px;
      border-radius: 30px;
      font-weight: bold;
      cursor: pointer;
      margin: 20px;
      transition: 0.3s;
    }

    .btn-retour:hover {
      background: var(--brown-dark);
      color: white;
    }

    .week-title {
      text-align: center;
      font-size: 28px;
      font-weight: bold;
      color: var(--brown-dark);
      margin-bottom: 30px;
      animation: fadeIn 1s ease;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(-20px); }
      to { opacity: 1; transform: translateY(0); }
    }

    .planning-grid {
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      gap: 20px;
      max-width: 1300px;
      margin: auto;
      margin-bottom: 50px;
      padding: 0 20px;
    }

    .day-card {
      background: white;
      border-radius: 20px;
      padding: 20px;
      box-shadow: 0 8px 24px rgba(0,0,0,0.08);
      cursor: pointer;
      transition: 0.4s;
      display: flex;
      flex-direction: column;
      min-height: 320px;
      justify-content: space-between;
      position: relative;
      overflow: hidden;
    }

    .day-card:hover {
      transform: translateY(-8px);
      box-shadow: 0 12px 32px rgba(0,0,0,0.12);
    }

    .day-card.active {
      background: var(--highlight);
      color: var(--brown-dark);
    }

    .day-card img {
      max-width: 100%;
      border-radius: 12px;
      margin-top: 10px;
    }

    .day-content {
      margin-top: 10px;
      font-size: 16px;
      color: var(--brown-dark);
      text-align: center;
    }

    .form-section {
      background: rgba(255,255,255,0.3);
      border-radius: 20px;
      backdrop-filter: blur(10px);
      padding: 30px;
      box-shadow: 0 8px 24px rgba(0,0,0,0.08);
      max-width: 600px;
      margin: 30px auto;
      animation: fadeIn 1s ease;
    }

    .form-section h5 {
      color: var(--brown-dark);
      font-weight: bold;
      margin-bottom: 20px;
      text-align: center;
    }

    .emoji-picker {
      display: flex;
      gap: 10px;
      justify-content: center;
      margin-bottom: 20px;
    }

    .emoji-picker button {
      background: none;
      border: none;
      font-size: 28px;
      cursor: pointer;
      transition: transform 0.2s ease;
    }

    .emoji-picker button:hover {
      transform: scale(1.3);
    }

    .btn-submit {
      background: var(--brown);
      color: white;
      border: none;
      margin-top: 20px;
      transition: background 0.3s;
    }

    .btn-submit:hover {
      background: var(--brown-dark);
    }
  </style>
</head>
<body>

<!-- Bouton Retour -->
<button class="btn-retour" onclick="history.back()">← Retour</button>

  <i class="bi bi-arrow-left"></i> Retour
</button>

<!-- Titre Semaine -->
<div class="week-title" id="weekTitle">Semaine du ...</div>

<!-- Planning -->
<div class="planning-grid" id="planningGrid">
  <!-- Jours dynamiques -->
</div>

<!-- Formulaire -->
<div class="form-section" id="formSection" style="display:none;">
  <h5 id="selectedDayTitle">Ajouter ou Modifier l'Activité</h5>

  <!-- Sélecteur d'emojis -->
  <div class="emoji-picker" id="emojiPicker">
    <button type="button">🎨</button>
    <button type="button">🎪</button>
    <button type="button">🌳</button>
    <button type="button">🎭</button>
    <button type="button">🧁</button>
    <button type="button">📚</button>
  </div>

  <form id="activityForm">
    <div class="mb-3">
      <input type="text" id="activityTitle" class="form-control" placeholder="Titre de l'activité" required>
    </div>
    <div class="mb-3">
      <textarea id="activityDetails" class="form-control" rows="3" placeholder="Détails de l'activité" required></textarea>
    </div>
    <div class="mb-3">
      <input type="file" id="activityPhoto" class="form-control" accept="image/*">
    </div>
    <button type="submit" class="btn btn-submit w-100">Sauvegarder</button>
  </form>
</div>

<script>
  const days = ["Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi", "Dimanche"];
  const planningGrid = document.getElementById('planningGrid');
  let activities = {}; // Stockage local temporaire
  let currentEditingDay = "";
  let selectedEmoji = "";

  // Générer les cartes jours
  days.forEach(day => {
    const div = document.createElement('div');
    div.className = 'day-card';
    div.setAttribute('data-day', day);
    div.innerHTML = `<div><strong>${day}</strong></div><div class="day-content" id="content-${day}"></div>`;
    planningGrid.appendChild(div);

    div.addEventListener('click', () => openFormForDay(day));
  });

  // Ouvrir formulaire pour un jour
  function openFormForDay(day) {
    document.getElementById('formSection').style.display = 'block';
    document.getElementById('selectedDayTitle').innerText = `Activité prévue pour ${day}`;
    currentEditingDay = day;
    selectedEmoji = "";

    if (activities[day]) {
      document.getElementById('activityTitle').value = activities[day].title;
      document.getElementById('activityDetails').value = activities[day].details;
    } else {
      document.getElementById('activityTitle').value = "";
      document.getElementById('activityDetails').value = "";
    }
  }

  // Sélectionner un emoji
  document.querySelectorAll('#emojiPicker button').forEach(btn => {
    btn.addEventListener('click', () => {
      selectedEmoji = btn.textContent;
    });
  });

  // Sauvegarder activité
  document.getElementById('activityForm').addEventListener('submit', function(e) {
    e.preventDefault();
    if (!currentEditingDay) {
      alert('Veuillez sélectionner un jour.');
      return;
    }

    const title = document.getElementById('activityTitle').value.trim();
    const details = document.getElementById('activityDetails').value.trim();
    const file = document.getElementById('activityPhoto').files[0];

    const reader = new FileReader();
    reader.onload = function () {
      const imageData = file ? reader.result : (activities[currentEditingDay]?.photo || "");

      activities[currentEditingDay] = {
        title: selectedEmoji + " " + title,
        details,
        photo: imageData
      };

      updateDayCard(currentEditingDay);
      document.getElementById('formSection').style.display = 'none';
    };

    if (file) {
      reader.readAsDataURL(file);
    } else {
      reader.onload();
    }
  });

  function updateDayCard(day) {
    const content = document.getElementById(`content-${day}`);
    if (activities[day]) {
      content.innerHTML = `
        <div style="margin-top:10px;">
          <strong>${activities[day].title}</strong><br>
          <small>${activities[day].details}</small><br>
          ${activities[day].photo ? `<img src="${activities[day].photo}" style="margin-top:10px;border-radius:12px;max-height:120px;">` : ""}
        </div>
      `;
    } else {
      content.innerHTML = "";
    }
  }

  // Afficher la semaine dynamique
  function updateWeekTitle() {
    const today = new Date();
    const monday = new Date(today);
    monday.setDate(today.getDate() - ((today.getDay() + 6) % 7));

    const options = { day: '2-digit', month: 'long' };
    const start = monday.toLocaleDateString('fr-FR', options);
    const end = new Date(monday.getTime() + 6 * 86400000).toLocaleDateString('fr-FR', options);

    document.getElementById('weekTitle').innerText = `Semaine du ${start} au ${end}`;
  }

  updateWeekTitle();
</script>

</body>
</html>
