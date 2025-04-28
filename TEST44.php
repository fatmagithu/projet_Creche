<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Fiche Sophie · BabyFarm</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Playwrite+GB+S&family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    :root {
      --beige: #fdf9f3;
      --beige-light: #fffdf8;
      --brown: #b38760;
      --brown-dark: #9e6d4b;
    }
    body {
      margin: 0;
      background: linear-gradient(135deg, var(--beige-light), var(--beige));
      font-family: 'Inter', sans-serif;
      display: flex;
      align-items: center;
      justify-content: center;
      min-height: 100vh;
      padding: 40px;
    }
    .fiche-card {
      background: #fff;
      border-radius: 28px;
      padding: 50px;
      box-shadow: 0 16px 40px rgba(0, 0, 0, 0.08);
      max-width: 1200px;
      width: 100%;
      animation: fadeIn 0.6s ease-in-out;
    }
    .fiche-header { display: flex; align-items: center; gap: 28px; margin-bottom: 30px; }
    .fiche-header img { width: 110px; height: 110px; object-fit: cover; border-radius: 50%; border: 4px solid var(--brown); transition: transform 0.3s; }
    .fiche-header img:hover { transform: scale(1.05); }
    .fiche-header h2 { font-size: 34px; font-weight: 800; color: var(--brown); margin: 0; }
    .fiche-subtitle { font-size: 15px; color: #888; margin-top: 4px; }
    .info-section { background: #fdfdfd; padding: 26px; border-radius: 18px; box-shadow: 0 6px 16px rgba(0, 0, 0, 0.05); margin-bottom: 28px; }
    .info-section h4 { color: var(--brown); font-size: 21px; font-weight: 700; margin-bottom: 16px; }
    .info-item { font-size: 16px; margin-bottom: 10px; }
    .uploaded-files { display: flex; flex-wrap: wrap; gap: 15px; margin-top: 15px; }
    .file-card { position: relative; background: var(--beige-light); padding: 10px 20px; border-radius: 12px; box-shadow: 0 4px 12px rgba(0,0,0,0.05); display: flex; align-items: center; gap: 10px; }
    .file-card button { border: none; background: none; color: red; font-size: 20px; cursor: pointer; }
    .planning-table { background: #fff; border-radius: 18px; overflow-x: auto; margin-top: 30px; box-shadow: 0 10px 24px rgba(0, 0, 0, 0.06); }
    .planning-table table { width: 100%; border-collapse: collapse; }
    .planning-table th, .planning-table td { padding: 14px 18px; text-align: center; border-bottom: 1px solid #eee; font-size: 15px; }
    .planning-table th { background-color: #f3f3f3; font-weight: 700; color: var(--brown); }
    .planning-table td.selectable { cursor: pointer; background-color: #fff; transition: background-color 0.2s ease, transform 0.2s ease; }
    .planning-table td.selectable:hover { background-color: #f3eee9; transform: scale(1.05); }
    .legend { font-size: 14px; margin-top: 12px; color: #888; }
    .legend span { margin-right: 15px; }
    .footer-quote { text-align: center; font-size: 14px; color: #999; margin-top: 40px; font-style: italic; }
    .modal { display: none; position: fixed; z-index: 1000; left: 0; top: 0; width: 100%; height: 100%; overflow: auto; background-color: rgba(0,0,0,0.6); }
    .modal-content { margin: 10% auto; display: block; width: 80%; max-width: 700px; }
    .close { position: absolute; top: 20px; right: 35px; color: #fff; font-size: 40px; font-weight: bold; cursor: pointer; }
    @keyframes fadeIn { from { opacity: 0; transform: translateY(20px); } to { opacity: 1; transform: translateY(0); } }
  </style>
</head>
<body>
  <div class="fiche-card">
    <div class="fiche-header">
      <img src="woman-7175038_1280.jpg" alt="Photo Sophie">
      <div>
        <h2>Fiche de SOPHIE</h2>
        <div class="fiche-subtitle">Dernière mise à jour : 15 avril 2025</div>
      </div>
    </div>

    <div class="info-section">
      <h4>📌 Informations administratives</h4>
      <p class="info-item"><strong>Poste :</strong> Auxiliaire Petite Enfance</p>
      <p class="info-item"><strong>Date d'entrée :</strong> 12/03/2021</p>
      <p class="info-item"><strong>Contrat :</strong> CDI - 35h</p>
      <p class="info-item"><strong>Crèche :</strong> Les Calinous</p>
    </div>

    <div class="info-section">
      <h4>📁 Documents RH</h4>
      <input type="file" id="fileInput" multiple class="form-control mb-3">
      <div id="uploadedFiles" class="uploaded-files"></div>
    </div>

    <div class="info-section">
      <h4>⚠️ Alertes RH</h4>
      <ul>
        <li>🔁 Recyclage SST à prévoir d'ici 2 mois</li>
        <li>📆 Entretien annuel non programmé</li>
      </ul>
    </div>

    <div class="info-section">
      <h4>📊 Statistiques personnelles</h4>
      <p class="info-item">⏳ Heures travaillées le mois dernier : <strong>140h</strong></p>
      <p class="info-item">📅 Absences : <strong>2 jours</strong></p>
      <p class="info-item">👶 Moyenne enfants encadrés : <strong>5</strong></p>
    </div>

    <div class="planning-table">
      <table>
        <thead>
          <tr>
            <th>Nom</th>
            <th>Lundi</th>
            <th>Mardi</th>
            <th>Mercredi</th>
            <th>Jeudi</th>
            <th>Vendredi</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><strong>Sophie</strong></td>
            <td class="selectable">✔️</td>
            <td class="selectable">✔️</td>
            <td class="selectable">❌</td>
            <td class="selectable">⛱️</td>
            <td class="selectable">📘</td>
          </tr>
        </tbody>
      </table>
      <div class="legend">
        <span>✔️ Présente</span>
        <span>❌ Absente</span>
        <span>⛱️ Congé</span>
        <span>📘 Formation</span>
      </div>
    </div>

    <div class="footer-quote">“Fiche personnalisée”</div>
  </div>

  <div id="modal" class="modal">
    <span class="close" id="closeModal">&times;</span>
    <img class="modal-content" id="modalImage">
  </div>

<script>
  const fileInput = document.getElementById('fileInput');
  const uploadedFiles = document.getElementById('uploadedFiles');
  const modal = document.getElementById('modal');
  const modalImage = document.getElementById('modalImage');
  const closeModal = document.getElementById('closeModal');

  fileInput.addEventListener('change', (e) => {
    [...e.target.files].forEach(file => {
      const reader = new FileReader();
      reader.onload = (event) => {
        const container = document.createElement('div');
        container.className = 'file-card';

        const link = document.createElement('a');
        link.href = event.target.result;
        link.textContent = file.name;
        link.target = '_blank';
        link.style.color = '#b38760';
        link.style.textDecoration = 'none';

        link.addEventListener('click', (ev) => {
          ev.preventDefault();
          modal.style.display = 'block';
          modalImage.src = event.target.result;
        });

        const deleteBtn = document.createElement('button');
        deleteBtn.innerHTML = '&times;';
        deleteBtn.addEventListener('click', () => {
          container.remove();
        });

        container.appendChild(link);
        container.appendChild(deleteBtn);
        uploadedFiles.appendChild(container);
      };
      reader.readAsDataURL(file);
    });
  });

  closeModal.onclick = () => {
    modal.style.display = 'none';
  }

  window.onclick = (event) => {
    if (event.target == modal) {
      modal.style.display = 'none';
    }
  }

  document.addEventListener("DOMContentLoaded", () => {
    const options = ["✔️", "❌", "⛱️", "📘"];
    const cells = document.querySelectorAll(".planning-table td.selectable");
    cells.forEach(cell => {
      cell.addEventListener("click", () => {
        const current = cell.textContent.trim();
        const index = options.indexOf(current);
        const next = options[(index + 1) % options.length];
        cell.textContent = next;
      });
    });
  });
</script>

</body>
</html>