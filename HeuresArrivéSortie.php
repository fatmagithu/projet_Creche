<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Pointage Enfant - Arrivée</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Playwrite+GB+S&family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Inter', sans-serif;
      background: linear-gradient(to bottom right, #fffaf5, #f0e8dd);
      min-height: 100vh;
      margin: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 30px 20px;
    }

    .container-pointage {
      background: #ffffff;
      border-radius: 32px;
      padding: 40px 30px;
      box-shadow: 0 10px 50px rgba(0, 0, 0, 0.08);
      max-width: 500px;
      width: 100%;
      text-align: center;
    }

    .child-photo {
      width: 100px;
      height: 100px;
      border-radius: 50%;
      object-fit: cover;
      margin-bottom: 15px;
      border: 3px solid #f3e2d3;
    }

    h1 {
      font-family: 'Playwrite GB S', cursive;
      font-size: 30px;
      color: #b38760;
      margin-bottom: 10px;
    }

    .child-name {
      font-family: 'Playwrite GB S', sans-serif;
      font-size: 22px;
      color: #4a4a4a;
      margin-bottom: 30px;
    }

    .btn-time {
      background: #eaf7f0;
      color: #148041;
      border: none;
      font-weight: 600;
      border-radius: 24px;
      padding: 14px 24px;
      font-size: 15px;
      margin: 10px;
      width: 200px;
      transition: background 0.2s ease, transform 0.2s ease;
    }

    .btn-time:hover {
      background: #d3efdd;
      transform: scale(1.05);
    }

    .commentaire {
      margin-top: 25px;
    }

    .form-control {
      border-radius: 16px;
      box-shadow: 0 2px 6px rgba(0,0,0,0.05);
    }

    .btn-valider {
      background-color: #b38760;
      color: white;
      border-radius: 20px;
      padding: 10px 24px;
      margin-top: 20px;
      font-weight: 600;
      border: none;
    }

    .btn-valider:hover {
      background-color: #a07550;
    }

    @media (max-width: 600px) {
      .btn-time {
        width: 100%;
        font-size: 14px;
      }
    }
  </style>
</head>
<body>
  <div class="container-pointage">
    <img src="moussa13.png" alt="Yanis" class="child-photo">
    <h1>Pointage</h1>
    <div class="child-name">Alice</div>

    <button class="btn btn-time" onclick="enregistrer('arrivee')">08:30 - Arrivée</button>
    <button class="btn btn-time" onclick="enregistrer('depart')">17:30 - Départ</button>

    <div class="commentaire">
      <label for="commentaire" class="form-label mt-3">Ajouter un commentaire</label>
      <textarea id="commentaire" class="form-control" rows="3" placeholder="Ex : Papa a prévenu du retard..."></textarea>
      <button class="btn btn-valider" onclick="validerCommentaire()">Valider</button>
    </div>
  </div>
<!---- ENREGISTREMENT DE L HEURE QUAND ON CLIQUE DIRECT ETTT +++++++ 
CHAT GPT A COMMENCER A CODER UN PROGRAMME DE COMMENTAIRE BASE SQL A POURSUIVRE____  -->
  <script>
    function enregistrer(type) {
      const heure = new Date().toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });
      alert(`Heure de ${type === 'arrivee' ? 'l\'arrivée' : 'départ'} enregistrée : ${heure}`);
    }

    function validerCommentaire() {
      const commentaire = document.getElementById("commentaire").value;
      if (commentaire.trim() !== "") {
        alert("Commentaire enregistré : " + commentaire);
        document.getElementById("commentaire").value = "";
      } else {
        alert("Aucun commentaire à enregistrer.");
      }
    }
  </script>
</body>
</html>