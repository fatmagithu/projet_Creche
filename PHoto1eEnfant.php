<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Galerie Photos · BabyFarm</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
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
      text-decoration: none;
      display: flex;
      align-items: center;
      gap: 8px;
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

    .gallery-container {
      max-width: 1200px;
      width: 100%;
      background: rgba(255,255,255,0.6);
      backdrop-filter: blur(10px);
      border-radius: 20px;
      padding: 20px;
      box-shadow: 0 8px 24px rgba(0,0,0,0.08);
    }

    .carousel {
      display: flex;
      overflow-x: auto;
      gap: 20px;
      padding: 20px 0;
      scroll-behavior: smooth;
    }

    .photo-card {
      background: white;
      border-radius: 16px;
      padding: 10px;
      box-shadow: 0 6px 20px rgba(0, 0, 0, 0.08);
      flex: 0 0 auto;
      width: 200px;
      text-align: center;
    }

    .photo-card img {
      width: 100%;
      height: 140px;
      object-fit: cover;
      border-radius: 12px;
    }

    .photo-card p {
      margin: 8px 0 0;
      font-size: 12px;
      color: #666;
    }

    .upload-section {
      margin-top: 30px;
      display: flex;
      flex-direction: column;
      gap: 10px;
      align-items: center;
    }

    textarea, .btn-upload {
      width: 100%;
      border-radius: 10px;
      border: 1px solid #ccc;
      padding: 10px;
    }

    .btn-upload {
      background: #b38760;
      color: white;
      border: none;
      font-weight: bold;
      margin-top: 10px;
    }

    .btn-upload:hover {
      background: #9e6d4b;
    }

    #camera-container {
      display: none;
      flex-direction: column;
      align-items: center;
      margin-top: 20px;
    }

    #video {
      width: 300px;
      height: auto;
      border-radius: 16px;
      box-shadow: 0 0 20px rgba(0,0,0,0.1);
    }

    .btn-photo, .btn-switch, .btn-import {
      background: #fff;
      border: 2px dashed #b38760;
      color: #b38760;
      padding: 8px 14px;
      border-radius: 30px;
      font-weight: bold;
      cursor: pointer;
      font-size: 14px;
      margin-top: 10px;
      transition: all 0.3s ease;
    }

    .btn-photo:hover, .btn-switch:hover, .btn-import:hover {
      background: #b38760;
      color: white;
    }

    #fileInput {
      display: none;
    }
  </style>
</head>
<body>

<a href="PageACPhoto.php" class="btn-retour"><i class="bi bi-arrow-left"></i> Retour</a>

<h1>Galerie Photos d'ALICE</h1>

<div class="gallery-container">
  <div class="carousel" id="carousel">
    <div class="photo-card">
      <img src="moussa12.png" alt="Photo 1">
      <p>Ajouté automatiquement</p>
    </div>
    <div class="photo-card">
      <img src="moussa15.png" alt="Photo 2">
      <p>Ajouté automatiquement</p>
    </div>
  </div>

  <div class="upload-section">

    <!-- BOUTONS -->
    <button class="btn-photo" onclick="ouvrirCamera()">📷 Prendre une photo</button>
    <label for="fileInput" class="btn-import"> Importer depuis la tablette</label>
    <input type="file" id="fileInput" accept="image/*">

    <!-- CAMÉRA -->
    <div id="camera-container">
      <video id="video" autoplay playsinline></video>
      <button class="btn-photo" onclick="capturePhoto()"> Capturer</button>
      <button class="btn-switch" onclick="switchCamera()">🔄 Changer de caméra</button>
    </div>

    <!-- COMMENTAIRE -->
    <textarea id="commentInput" rows="2" placeholder="Commentaire..."></textarea>
  </div>
</div>

<script>
  const video = document.getElementById('video');
  const carousel = document.getElementById('carousel');
  const cameraContainer = document.getElementById('camera-container');
  const fileInput = document.getElementById('fileInput');
  let currentStream = null;
  let useFrontCamera = false;

  function ouvrirCamera() {
    cameraContainer.style.display = 'flex';
    startCamera();
  }

  function startCamera() {
    const constraints = {
      video: {
        facingMode: useFrontCamera ? 'user' : 'environment'
      },
      audio: false
    };

    if (currentStream) {
      currentStream.getTracks().forEach(track => track.stop());
    }

    navigator.mediaDevices.getUserMedia(constraints)
      .then(stream => {
        currentStream = stream;
        video.srcObject = stream;
      })
      .catch(err => {
        alert("Erreur d'accès à la caméra : " + err.message);
      });
  }

  function switchCamera() {
    useFrontCamera = !useFrontCamera;
    startCamera();
  }

  function capturePhoto() {
    const canvas = document.createElement('canvas');
    canvas.width = video.videoWidth;
    canvas.height = video.videoHeight;

    const ctx = canvas.getContext('2d');
    ctx.drawImage(video, 0, 0, canvas.width, canvas.height);

    const imageData = canvas.toDataURL('image/png');
    afficherPhoto(imageData);
  }

  function afficherPhoto(imageSrc) {
    const div = document.createElement('div');
    div.className = 'photo-card';

    const img = document.createElement('img');
    img.src = imageSrc;

    const commentInput = document.getElementById('commentInput');
    const commentaire = commentInput.value || 'Pas de commentaire';
    const heure = new Date().toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });

    const p = document.createElement('p');
    p.innerText = `${commentaire} - ${heure}`;

    div.appendChild(img);
    div.appendChild(p);
    carousel.appendChild(div);

    commentInput.value = '';
  }

  fileInput.addEventListener('change', () => {
    const file = fileInput.files[0];
    if (!file) return;

    const reader = new FileReader();
    reader.onload = function(e) {
      afficherPhoto(e.target.result);
    };
    reader.readAsDataURL(file);
    fileInput.value = ''; // reset après ajout
  });
</script>

</body>
</html>
