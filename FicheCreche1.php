<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Fiche Crèche · BabyFarm</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    :root {
      --beige: #fdf9f3;
      --beige-light: #fffdf8;
      --brown: #b38760;
    }
    body {
      margin: 0;
      background: url('moussa12.png') center/cover no-repeat;
      background-attachment: fixed;
      font-family: 'Inter', sans-serif;
      position: relative;
      min-height: 100vh;
      overflow-x: hidden;
    }
    body::after {
      content: "";
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background: rgba(253, 249, 243, 0.88);
      backdrop-filter: blur(8px);
      z-index: 0;
    }
    .fiche-card {
      position: relative;
      z-index: 1;
      background: #fff;
      border-radius: 28px;
      padding: 50px;
      margin: 60px auto;
      box-shadow: 0 16px 40px rgba(0, 0, 0, 0.08);
      max-width: 1200px;
      width: 95%;
      animation: fadeIn 0.6s ease-in-out;
    }
    .btn-retour {
      position: absolute;
      top: 20px;
      left: 20px;
      background: var(--brown);
      color: white;
      border: none;
      padding: 10px 20px;
      border-radius: 12px;
      font-weight: bold;
      text-decoration: none;
      transition: background 0.3s;
      z-index: 2;
    }
    .btn-retour:hover {
      background: var(--brown-dark);
    }
    .fiche-header {
      text-align: center;
      margin-bottom: 30px;
    }
    .fiche-header h2 {
      font-size: 36px;
      font-weight: 800;
      color: var(--brown);
    }
    .info-section {
      background: var(--beige-light);
      padding: 26px;
      border-radius: 18px;
      box-shadow: 0 6px 16px rgba(0, 0, 0, 0.05);
      margin-bottom: 28px;
    }
    .info-section h4 {
      color: var(--brown);
      font-size: 22px;
      font-weight: 700;
      margin-bottom: 16px;
    }
    .info-item, .alert-item {
      font-size: 16px;
      margin-bottom: 10px;
    }
    .uploaded-files {
      display: flex;
      flex-wrap: wrap;
      gap: 15px;
      margin-top: 15px;
    }
    .file-card {
      background: var(--beige);
      padding: 10px 20px;
      border-radius: 12px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.05);
      display: flex;
      align-items: center;
      gap: 10px;
      position: relative;
    }
    .file-card button {
      border: none;
      background: none;
      color: red;
      font-size: 20px;
      cursor: pointer;
    }
    /* MODALE */
    .modal {
      display: none;
      position: fixed;
      z-index: 999;
      left: 0; top: 0;
      width: 100%; height: 100%;
      background-color: rgba(0,0,0,0.7);
    }

    .modal-content {
      margin: 5% auto;
      display: block;
      width: 80%;
      max-width: 700px;
      border-radius: 12px;
      background: white;
      padding: 20px;
      color: #333;
      white-space: pre-wrap;
      overflow-y: auto;
      max-height: 80vh;
      font-family: monospace;
      font-size: 14px;
    }

    .close {
      position: absolute;
      top: 30px;
      right: 50px;
      color: white;
      font-size: 40px;
      font-weight: bold;
      cursor: pointer;
      z-index: 1001;
    }
    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }
    .document-grid {
  display: flex;
  flex-wrap: wrap;
  gap: 20px;
  margin-top: 20px;
  justify-content: center;
}

.doc-icon {
  background: var(--beige);
  border: 2px solid #b38760;
  color: #b38760;
  border-radius: 18px;
  width: 110px;
  height: 110px;
  text-align: center;
  font-size: 16px;
  font-weight: 600;
  padding: 20px 10px;
  box-shadow: 0 6px 16px rgba(0,0,0,0.06);
  cursor: pointer;
  transition: all 0.3s ease;
}

.doc-icon:hover {
  background: #b38760;
  color: white;
}

/* Modale */
.modal {
  display: none;
  position: fixed;
  z-index: 999;
  left: 0; top: 0;
  width: 100%; height: 100%;
  background-color: rgba(0,0,0,0.7);
}

.modal-content {
  margin: 5% auto;
  display: block;
  width: 80%;
  max-width: 700px;
  border-radius: 12px;
}

.close {
  position: absolute;
  top: 30px;
  right: 50px;
  color: white;
  font-size: 40px;
  font-weight: bold;
  cursor: pointer;
}
.info-section.alertes {
  background: white;
  border-left: 5px solid var(--brown);
  padding: 30px;
  border-radius: 22px;
  box-shadow: 0 8px 30px rgba(0, 0, 0, 0.08);
  animation: fadeIn 0.4s ease-in-out;
}

.alert-item {
  background: var(--beige-light);
  border-left: 6px solid #dc3545; /* Rouge doux */
  padding: 15px 20px;
  border-radius: 14px;
  margin-bottom: 15px;
  font-size: 16px;
  font-weight: 500;
  color: #333;
  display: flex;
  align-items: center;
  gap: 12px;
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
  transition: background 0.3s ease;
}

.alert-item:hover {
  background: #ffe9e9;
}

.alert-item::before {
  content: "⚠️";
  font-size: 20px;
}
#notifPanel .alert-item {
  background: var(--beige-light);
  border-left: 6px solid #dc3545;
  padding: 12px 16px;
  border-radius: 12px;
  margin-bottom: 10px;
  font-size: 15px;
  font-weight: 500;
  color: #333;
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
  transition: background 0.3s ease;
  cursor: pointer;
}

#notifPanel .alert-item:hover {
  background: #ffe9e9;
}

  </style>
</head>
<body>
<a href="PDossierAdmin.php" class="btn-retour">&larr; Retour</a>

<div class="fiche-card">
  <div class="fiche-header">
    <h2>Fiche Crèche · Les P'tits Soleils</h2>
    <div class="fiche-subtitle">Dernière mise à jour : 28 avril 2025</div>
  </div>

  <div class="info-section">
    <h4>📌 Informations Générales</h4>
    <p class="info-item"><strong>Adresse :</strong> 123 Rue de la Petite Enfance, Paris</p>
    <p class="info-item"><strong>Capacité :</strong> 45 enfants</p>
    <p class="info-item"><strong>Horaires :</strong> Lundi - Vendredi, 7h30 à 18h30</p>
    <p class="info-item"><strong>Directrice :</strong> Madame Dupont</p>
  </div>

  <div class="info-section">
  <h4>📁 Documents à importer</h4>

  <form id="uploadForm" method="POST" action="uploadDocument.php" enctype="multipart/form-data">

    <!-- Type cible -->
    <div class="mb-3">
      <label for="type_cible" class="form-label">Type de document lié à :</label>
      <select name="type_cible" id="type_cible" class="form-select" required onchange="updateCibleList()">
        <option value="">-- Sélectionner --</option>
        <option value="creche">Crèche</option>
        <option value="enfant">Enfant</option>
        <option value="equipe">Équipe</option>
      </select>
    </div>

    <!-- Liste dynamique de la cible -->
    <div class="mb-3" id="select-cible-container">
      <!-- Rempli automatiquement par JS -->
    </div>

    <!-- Type de document -->
    <div class="mb-3">
      <label for="type_document" class="form-label">Type de document :</label>
      <select name="type_document" id="type_document" class="form-select" required>
        <option value="">-- Sélectionner --</option>
        <option value="contrat">Contrat</option>
        <option value="diplome">Diplôme</option>
        <option value="certificat_medical">Certificat médical</option>
        <option value="assurance">Assurance</option>
        <option value="identite">Pièce d'identité</option>
        <option value="vaccins">Vaccins</option>
        <option value="autre">Autre</option>
      </select>
    </div>

    <!-- Date d'expiration -->
    <div class="mb-3">
      <label for="date_expiration" class="form-label">Date d'expiration (si applicable) :</label>
      <input type="date" id="date_expiration" name="date_expiration" class="form-control">
    </div>

    <!-- Commentaire -->
    <div class="mb-3">
      <label for="commentaires" class="form-label">Commentaires :</label>
      <textarea id="commentaires" name="commentaires" class="form-control" rows="3" placeholder="Ajoutez un commentaire si nécessaire..."></textarea>
    </div>

    <!-- Sélection fichiers -->
    <div class="mb-3">
      <label for="fileInput" class="form-label">Sélectionner les fichiers :</label>
      <input type="file" id="fileInput" name="document[]" multiple class="form-control" required>
    </div>

    <!-- Bouton envoyer -->
    <button type="submit" class="btn btn-primary">Envoyer les fichiers</button>

  </form>

  <div id="uploadedFiles" class="uploaded-files"></div>
</div>




<div class="info-section">
  <h4> Documents de la Crèche</h4>
  <div class="document-grid">
  <div class="doc-icon" onclick="openModal('form.css')">✅<br>Agrément PMI</div>
  <div class="doc-icon" onclick="openModal('form.css')">🧾<br>Statuts</div>
  <div class="doc-icon" onclick="openModal('form.css')">🧾<br>Kbis</div>
  <div class="doc-icon" onclick="openModal('form.css')">🧾<br>URSSAF</div>
  <div class="doc-icon" onclick="openModal('form.css')">✅<br>Règlement</div>
  <div class="doc-icon" onclick="openModal('form.css')">✅<br>Convention</div>
  <div class="doc-icon" onclick="openModal('form.css')">🧺<br>Sanitaire</div>
  <div class="doc-icon" onclick="openModal('form.css')">🧴<br>Covid</div>
  <div class="doc-icon" onclick="openModal('form.css')">📁<br>Nettoyage</div>
  <div class="doc-icon" onclick="openModal('form.css')">📄<br>Alimentaire</div>
  <div class="doc-icon" onclick="openModal('form.css')">🫳<br>Incendie</div>
</div>

<!-- PARTIE HTML À METTRE EN BAS DE TA PAGE -->

<div id="docModal" class="modal" onclick="closeModal(event)">
  <span class="close" id="closeDocModal">&times;</span>
  <pre class="modal-content" id="docContent">Chargement...</pre>
  <div style="text-align: center; margin-top: 20px;">
    <button onclick="sendDocumentByEmail()" class="btn btn-success">
      ✉️ Envoyer ce document
    </button>
  </div>
</div>
<br><br>
<div style="text-align: center; margin-top: 10px;">
  <button onclick="sendDocumentByEmail()" class="btn btn-success">✉️ Par mail</button>
  <button onclick="sendToWhatsApp()" class="btn btn-info text-white">📱 WhatsApp</button>
  <button onclick="copyToClipboard()" class="btn btn-secondary">📋 Copier</button>
</div>
<br><br>
<div style="position: fixed; top: 20px; right: 30px; z-index: 999;">
<div id="notifIcon" onclick="toggleNotifPanel()" style="position: relative; cursor: pointer; font-size: 48px;">
    🔔
    <span id="notifCount" style="
      position: absolute;
      top: -8px;
      right: -8px;
      background: #dc3545;
      color: white;
      font-size: 12px;
      padding: 2px 6px;
      border-radius: 50%;
      font-weight: bold;
    ">6</span>
  </div>

  <div id="notifPanel" style="
    display: none;
    position: absolute;
    top: 40px;
    right: 0;
    width: 320px;
    background: white;
    border-radius: 16px;
    box-shadow: 0 8px 24px rgba(0,0,0,0.15);
    padding: 20px;
    max-height: 400px;
    overflow-y: auto;
    animation: fadeIn 0.3s ease;
  ">
    <h5 style="margin-bottom: 15px; color: var(--brown); font-weight: 700;"> Alertes Crèche</h5>
    <ul style="padding: 0; list-style: none;">
      <li class="alert-item">Inspection annuelle prévue en juin 2025</li>
      <li class="alert-item">Renouvellement agrément CAF avant septembre</li>
      <li class="alert-item">Formation sécurité incendie non validée</li>
      <li class="alert-item">Contrats parents manquants pour 3 enfants</li>
      <li class="alert-item">Bilan médical annuel à programmer</li>
      <li class="alert-item">Demande de renouvellement d'agrément en attente</li>
    </ul>
  </div>
</div>



  <div class="footer-quote">“Fiche crèche personnalisée NOUNOU”</div>
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
</script>
<script>
// Simulation des données récupérées en base
const creches = [
  { id: 1, nom: "Les P'tits Soleils" },
  { id: 2, nom: "Arc-en-Ciel" },
  { id: 3, nom: "Petits Pas" }
];

const enfants = [
  { id: 101, nom: "Paul Martin" },
  { id: 102, nom: "Emma Durand" },
  { id: 103, nom: "Lucas Lefevre" }
];

const equipe = [
  { id: 201, nom: "Sophie Bernard" },
  { id: 202, nom: "Karim Messaoud" },
  { id: 203, nom: "Julie Petit" }
];

// Fonction qui actualise la liste cible
function updateCibleList() {
  const typeCible = document.getElementById('type_cible').value;
  const container = document.getElementById('select-cible-container');

  let options = '';
  if (typeCible === 'creche') {
    creches.forEach(item => {
      options += `<option value="${item.id}">${item.nom}</option>`;
    });
    container.innerHTML = `
      <label for="id_cible" class="form-label">Sélectionner la crèche :</label>
      <select name="id_cible" id="id_cible" class="form-select" required>
        <option value="">-- Sélectionner --</option>
        ${options}
      </select>
    `;
  } else if (typeCible === 'enfant') {
    enfants.forEach(item => {
      options += `<option value="${item.id}">${item.nom}</option>`;
    });
    container.innerHTML = `
      <label for="id_cible" class="form-label">Sélectionner l'enfant :</label>
      <select name="id_cible" id="id_cible" class="form-select" required>
        <option value="">-- Sélectionner --</option>
        ${options}
      </select>
    `;
  } else if (typeCible === 'equipe') {
    equipe.forEach(item => {
      options += `<option value="${item.id}">${item.nom}</option>`;
    });
    container.innerHTML = `
      <label for="id_cible" class="form-label">Sélectionner un membre de l'équipe :</label>
      <select name="id_cible" id="id_cible" class="form-select" required>
        <option value="">-- Sélectionner --</option>
        ${options}
      </select>
    `;
  } else {
    container.innerHTML = ''; // Si aucun type sélectionné
  }
}
</script>
<script>
function openModal(filePath = 'form.css') {
  const contentContainer = document.getElementById("docContent");
  contentContainer.textContent = "Chargement...";

  fetch(filePath)
    .then(response => {
      if (!response.ok) throw new Error("Fichier introuvable ou refusé");
      return response.text();
    })
    .then(data => {
      contentContainer.textContent = data;
      document.getElementById("docModal").style.display = "block";
    })
    .catch(error => {
      contentContainer.textContent = "❌ Erreur : " + error.message;
      document.getElementById("docModal").style.display = "block";
    });
}

function closeModal(event) {
  if (event.target.id === "docModal" || event.target.id === "closeDocModal") {
    document.getElementById("docModal").style.display = "none";
  }
}

function sendDocumentByEmail() {
  const content = document.getElementById("docContent").textContent;
  alert("📩 Simulation d’envoi du document par mail...\n\nContenu :\n" + content.slice(0, 200) + "...");
}
</script>
<script>
function sendDocumentByEmail() {
  const content = document.getElementById("docContent").textContent;
  const subject = encodeURIComponent("Document Crèche BabyFarm");
  const body = encodeURIComponent(content);
  
  // Ouvrir un client mail (Gmail, Outlook...)
  window.open(`mailto:?subject=${subject}&body=${body}`);
}

// Copier dans le presse-papier
function copyToClipboard() {
  const content = document.getElementById("docContent").textContent;
  navigator.clipboard.writeText(content).then(() => {
    alert("✅ Document copié dans le presse-papier !");
  });
}

// Ouvrir WhatsApp Web
function sendToWhatsApp() {
  const content = document.getElementById("docContent").textContent;
  const message = encodeURIComponent(content.slice(0, 2000)); // WhatsApp limite les gros textes
  window.open(`https://wa.me/?text=${message}`, '_blank');
}
function toggleNotifPanel() {
  const panel = document.getElementById("notifPanel");
  panel.style.display = panel.style.display === "none" ? "block" : "none";
}

</script>
</script>



</body>
</html>
