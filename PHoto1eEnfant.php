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
    }

    input[type="file"], textarea, .btn-upload {
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
  </style>
</head>
<body>

  <a href="PAuxDashboard.php" class="btn-retour"><i class="bi bi-arrow-left"></i> Retour</a>

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
      <input type="file" id="photoInput">
      <textarea id="commentInput" rows="2" placeholder="Commentaire..."></textarea>
      <button class="btn-upload" onclick="ajouterPhoto()">Ajouter à la galerie</button>
    </div>
  </div>

  <script>
    function ajouterPhoto() {
      const photoInput = document.getElementById('photoInput');
      const commentInput = document.getElementById('commentInput');
      const carousel = document.getElementById('carousel');

      if (photoInput.files.length === 0) {
        alert('Merci de choisir une photo.');
        return;
      }

      const reader = new FileReader();
      reader.onload = function(e) {
        const div = document.createElement('div');
        div.className = 'photo-card';
        
        const img = document.createElement('img');
        img.src = e.target.result;

        const commentaire = commentInput.value || 'Pas de commentaire';
        const date = new Date();
        const heure = date.toLocaleTimeString([], {hour: '2-digit', minute:'2-digit'});

        const p = document.createElement('p');
        p.innerText = `${commentaire} - ${heure}`;

        div.appendChild(img);
        div.appendChild(p);
        carousel.appendChild(div);

        photoInput.value = '';
        commentInput.value = '';
      }

      reader.readAsDataURL(photoInput.files[0]);
    }
  </script>

</body>
</html>
