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
  </style>
</head>
<body>

  <a href="Pcreche22AcceuilParent.php" class="btn-retour"><i class="bi bi-arrow-left"></i> Retour</a>

  <h1>Galerie Photos d'ALICE</h1>

  <div class="gallery-container">
    <div class="carousel">
      <div class="photo-card">
        <img src="moussa12.png" alt="Photo 1" onclick="openLightbox(this.src)">
        <p>Ajouté automatiquement</p>
      </div>
      <div class="photo-card">
        <img src="moussa15.png" alt="Photo 2" onclick="openLightbox(this.src)">
        <p>Ajouté automatiquement</p>
      </div>
    </div>
  </div>

  <!-- Lightbox -->
  <div id="lightbox" style="display: none;">
    <div class="overlay" onclick="closeLightbox()"></div>
    <img id="lightbox-img" src="" alt="Zoom">
    <span class="close-btn" onclick="closeLightbox()">&times;</span>
  </div>

  <style>
    #lightbox {
  position: fixed;
  inset: 0;
  display: flex;
  align-items: center;
  justify-content: center;
  background-color: rgba(253, 249, 243, 0.9); /* beige translucide */
  backdrop-filter: blur(8px);
  z-index: 1000;
}


#lightbox img {
  max-width: 90%;
  max-height: 90%;
  border-radius: 16px;
  box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
  filter: brightness(1) contrast(1.05);
  transition: 0.3s ease;
}

    .close-btn {
      position: fixed;
      top: 30px;
      right: 30px;
      font-size: 40px;
      color: white;
      cursor: pointer;
      z-index: 1001;
      font-weight: bold;
    }

    .overlay {
      position: absolute;
      inset: 0;
      background: rgba(0, 0, 0, 0.5);
    }
  </style>

  <script>
    function openLightbox(src) {
      document.getElementById("lightbox-img").src = src;
      document.getElementById("lightbox").style.display = "flex";
    }

    function closeLightbox() {
      document.getElementById("lightbox").style.display = "none";
    }
  </script>

</body>

</html>
