<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inscription - BabyFarm</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
  <!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bulles d'Eveil </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="PcrecheAcceuil1.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playwrite+GB+S:ital,wght@0,100..400;1,100..400&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playwrite+GB+S&display=swap" rel="stylesheet">
   

    <header id="nav">
  <nav class="navbar navbar-expand-lg navbar-light ultra-navbar">
    <!-- Logo & Brand Name -->
    <a class="navbar-brand d-flex align-items-center" href="PCrecheAcceuil1.php" target="_blank">
      <img src="NOUNOU (7).png" width="68" height="88" alt="Logo" class="mr-2 logo-navbar" />
     
    </a>

    <!-- Burger Icon -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
      aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Navigation Links -->
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav ml-auto nav-items-wrapper">
        <li class="nav-item"><a class="nav-link" href="siteNosicroCreche.php">Nos micro-crèches</a></li>
        <li class="nav-item"><a class="nav-link" href="SiteNotreEquipe.php">Notre équipe</a></li>
        <li class="nav-item"><a class="nav-link" href="RejoignezNous.php">Rejoignez-nous</a></li>
        <li class="nav-item"><a class="nav-link" href="PcrecheForm1.php">Inscription</a></li>

        <li class="nav-item"><a class="nav-link" href="pcrecheLOGIN.php">Connexion</a></li>

        <li class="nav-item">
        <a class="nav-link btn-contact" href="mailto:nounou-creche@gmail.com?subject=Candidature%20ou%20question">Nous contacter</a>

        </li>
      </ul>
    </div>
  </nav>
</header>
<style>
/* Design niveau branding pro pour navbar */
.ultra-navbar {
  background-color: #fcf8f4; /* beige élégant */
  padding: 0.4rem 1rem;
  box-shadow: 0 8px 16px rgba(0, 0, 0, 0.02);
  border-radius: 0 0 16px 16px;
  font-family: "Playwrite GB S", cursive;
  position: sticky;
  top: 0;
  z-index: 1000;
}

.logo-navbar {
  transition: transform 0.3s ease;

  width: 40px;
  height: 60px;
}

.logo-navbar:hover {
  transform: scale(1.08);
}

.brand-name {
  font-size: 1.3rem;
  font-weight: bold;
  color: #2c7a4b;
  letter-spacing: 1px;
  text-shadow: 0.5px 0.5px #ccc;
  text-transform: lowercase;
}

.navbar-nav .nav-link {
  color: #5c4a38;
  margin: 0 0.3rem;
  font-size: 0.75rem;
  font-weight: 400;
  position: relative;
  transition: all 0.3s ease;
}

.navbar-nav .nav-link::before {
  content: "";
  position: absolute;
  width: 0%;
  height: 2px;
  bottom: -4px;
  left: 0;
  background-color: #3b925f;
  transition: width 0.3s ease;
}

.navbar-nav .nav-link:hover {
  color: #3b925f;
}

.navbar-nav .nav-link:hover::before {
  width: 100%;
}

.btn-contact {
  background-color: #d6c3b4;
  color: #d6c3b4 !important;
  padding: 5px 14px;
  border-radius: 32px;
  font-weight: 600;
  font-size: 0.8rem;
  box-shadow: 0 3px 10px rgba(0, 0, 0, 0.05);
  transition: all 0.3s ease;
}

.btn-contact:hover {
  background-color: #a8dec5;
  transform: translateY(-2px);
}

/* Responsive */
@media (max-width: 768px) {
  .brand-name {
    font-size: 1.2rem;
  }
  .navbar-nav .nav-link {
    margin: 0.3rem 0;
    text-align: center;
    font-size: 0.85rem;
  }
  .ultra-navbar {
    padding: 0.5rem 0.8rem;
  }
}

</style>

<br><br><br>
  <style>
   body {
      font-family: 'Inter', sans-serif;
      background: linear-gradient(135deg, #fcf8f4, #f5e8da);
      min-height: 100vh;
      padding: 30px;
    }
    .container {
  background: #ffffff;
  border-radius: 16px;
  box-shadow: 0 4px 16px rgba(0, 0, 0, 0.05);
  padding: 30px 40px;
  max-width: 720px;
  margin: auto;
  font-size: 14px;

  max-width: 100%;
  width: 100%;
  overflow-x: auto;
  
 
  position: relative;
  overflow: hidden;

  
}



.step-header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 24px;
}

.step {
  flex: 1;
  text-align: center;
  padding: 8px 4px;
  font-size: 13px;
  color: #aaa;
  border-bottom: 2px solid #ddd;
  font-weight: 500;
  transition: 0.3s;
}

.step.active {
  color: #d6c3b4;
  border-color: #70c8a0;
  font-weight: 700;
  background-color: #d6c3b4;
  border-radius: 10px 10px 0 0;
}

.form-step {
  opacity: 0;
  position: absolute;
  width: 100%;
  transform: translateX(100%);
  transition: all 0.4s ease;
  z-index: 0;
}

.form-step.active {
  opacity: 1;
  transform: translateX(0);
  position: relative;
  z-index: 1;
}


.form-label {
  font-size: 13px;
  font-weight: 600;
  margin-bottom: 4px;
}

.form-control,
.form-select {
  font-size: 13px;
  padding: 6px 10px;
  border-radius: 8px;
  border: 1px solid #ccc;
}

textarea.form-control {
  resize: vertical;
}

.btn-group {
  display: flex;
  justify-content: space-between;
  margin-top: 24px;
}

.btn-primary,
.btn-success,
.btn-secondary {
  padding: 8px 18px;
  font-size: 13px;
  border-radius: 8px;
  font-weight: 500;
  transition: 0.2s ease;
}

.btn-success {
  background-color: #d6c3b4;
  border-color: #d6c3b4;
}
.btn-success:hover {
  background-color: #d6c3b4;
  border-color: #d6c3b4;
}

.btn-secondary {
  background-color: #ddd;
  color: #333;
}

h5 {
  font-size: 15px;
  font-weight: 600;
}

small, .text-muted {
  font-size: 12px;
}

@keyframes fadeIn {
  from { opacity: 0; transform: translateY(10px); }
  to { opacity: 1; transform: translateY(0); }
}


.error-message {
  background: linear-gradient(to right, #fef9f6, #f9ecec);
  border: 1px solid #e5a9a9;
  color: #d6c3b4;
  padding: 12px 16px;
  margin: 12px auto;
  border-radius: 10px;
  font-size: 14px;
  font-weight: 500;
  max-width: 90%;
  box-shadow: 0 2px 6px rgba(224, 102, 102, 0.08);
  display: flex;
  align-items: center;
  gap: 8px;
  animation: fadeIn 0.3s ease-in-out;
}




.step {
  font-size: 13px;
  padding: 8px 0;
  border-radius: 16px 16px 0 0;
  background-color: #f0f0f0;
  margin: 0 4px;
}

.step.active {
  background-color: #d6c3b4;
  color: #fff;
  border-color: #d6c3b4;
}

.form-step:nth-child(even) {
  background-color: #f8f9fa;
}

.form-step:nth-child(odd) {
  background-color: #ffffff;
}


.infos-center {
  max-width: 600px;
  margin: 0 auto;
}

.infos-center textarea::placeholder {
  font-size: 12px;
  color: #999;
  font-style: italic;
}




/* Petites icônes pour champs spécifiques */
input[name="prenom_enfant"],
input[name="prenom_parent1"],
input[name="prenom_parent2"] {
  background-image: url("data:image/svg+xml,<svg fill='gray' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24'><path d='M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z'/></svg>");
  background-repeat: no-repeat;
  background-size: 16px;
  background-position: 8px center;
  padding-left: 32px;
}

input[type="date"],
input[name="date_naissance_enfant"],
input[name="debut_contrat"],
input[name="fin_contrat"] {
  background-image: url("data:image/svg+xml,<svg fill='gray' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24'><path d='M7 10h5v5H7z' opacity='.3'/><path d='M19 4h-1V2h-2v2H8V2H6v2H5c-1.1 0-1.99.9-1.99 2L3 20c0 1.1.89 2 1.99 2H19c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 16H5V9h14v11zm0-13H5V6h14v1z'/></svg>");
  background-repeat: no-repeat;
  background-size: 16px;
  background-position: 8px center;
  padding-left: 32px;
}

input[type="email"] {
  background-image: url("data:image/svg+xml,<svg fill='gray' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24'><path d='M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.89 2 1.99 2H20c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4-8 5-8-5V6l8 5 8-5v2z'/></svg>");
  background-repeat: no-repeat;
  background-size: 16px;
  background-position: 8px center;
  padding-left: 32px;
}

input[name*="tel_"],
input[type="tel"] {
  background-image: url("data:image/svg+xml,<svg fill='gray' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24'><path d='M6.62 10.79a15.464 15.464 0 006.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1v3.5c0 .55-.45 1-1 1C7.61 21 3 16.39 3 10.5c0-.55.45-1 1-1H7c.55 0 1 .45 1 1 0 1.24.2 2.45.57 3.57.12.35.03.74-.24 1.02l-2.2 2.2z'/></svg>");
  background-repeat: no-repeat;
  background-size: 16px;
  background-position: 8px center;
  padding-left: 32px;
}



.step {
  position: relative;
  cursor: pointer;
  transition: all 0.3s ease;
}

.step::after {
  content: "";
  position: absolute;
  bottom: 4px;
  left: 50%;
  width: 0;
  height: 2px;
  background-color: #d6c3b4;

  transition: 0.3s ease;
  transform: translateX(-50%);
  border-radius: 2px;
}

.step:hover {
  background-color: #f5ebe2;
  box-shadow: 0 2px 6px rgba(214, 195, 180, 0.2);
}


.step:hover::after {
  width: 40%;
}



  </style>
</head>
<body>

<div id="form-errors"></div>

  
<div class="container">
<div class="step-header">
  <div class="step active" id="step-1-tab" data-step="1">L'enfant</div>
  <div class="step" id="step-2-tab" data-step="2">Le contrat</div>
  <div class="step" id="step-3-tab" data-step="3">Les parents</div>
  <div class="step" id="step-4-tab" data-step="4">Validation</div>
</div>



    <form id="multi-step-form" method="POST" action="traitementInscriptions.php">

    <div id="form-errors"></div> <!-- Gestion des champs non remplis du formulaire-->
    
  <!-- Étape 1 -->
  <div class="form-step active" id="step-1">
    <div class="row mb-3">
      <div class="col">
        <label class="form-label">Prénom *</label>
        <input type="text" name="prenom_enfant" class="form-control" >
      </div>
      <div class="col">
        <label class="form-label">Nom *</label>
        <input type="text" name="nom_enfant" class="form-control" >
      </div>
    </div>
    <div class="row mb-3">
      <div class="col">
        <label class="form-label">Date de naissance ou estimation *</label>
        <input type="date" name="date_naissance_enfant" class="form-control" >
      </div>
      <div class="col">
        <label class="form-label">Lieu de naissance</label>
        <input type="text" name="lieu_naissance_enfant" class="form-control">
      </div>
    </div>
    <div class="mb-3">
      <label class="form-label">Genre *</label>
      <select name="genre_enfant" class="form-select" >
        <option value="garçon">Garçon</option>
        <option value="fille">Fille</option>
      </select>
    </div>
    <div class="mb-3">
  <label class="form-label"><i class="bi bi-building"></i> Structures où le dossier est déposé</label><br>

  <div class="form-check">
    <input class="form-check-input" type="checkbox" name="structure[]" value="Mantes à l'Ô - Mantes-la-Jolie">
    Mantes à l'Ô - Mantes-la-Jolie
  </div>
  <div class="form-check">
    <input class="form-check-input" type="checkbox" name="structure[]" value="Les Calinous - Vernon">
    Les Calinous - Vernon
  </div>
  <div class="form-check">
    <input class="form-check-input" type="checkbox" name="structure[]" value="1-2-3 SOLEIL - Buchelay">
    1,2,3 SOLEIL - Buchelay
  </div>
  <div class="form-check">
    <input class="form-check-input" type="checkbox" name="structure[]" value="Les Coquelicots - Vernon">
    Les Coquelicots - Vernon
  </div>
  <div class="form-check">
    <input class="form-check-input" type="checkbox" name="structure[]" value="Les 101 Bambins - Mantes-la-Jolie">
    Les 101 Bambins - Mantes-la-Jolie
  </div>
  <div class="form-check">
    <input class="form-check-input" type="checkbox" name="structure[]" value="Les Coccinelles - Vernon">
    Les Coccinelles - Vernon
  </div>
  <div class="form-check">
    <input class="form-check-input" type="checkbox" name="structure[]" value="Les Capucines - Tourny">
    Les Capucines - Tourny
  </div>
</div>

    <div class="btn-group">
      <button type="button" class="btn btn-success" onclick="nextStep(2)">Suivant</button>
    </div>
  </div>

 
  <!-- Étape 2 -->
<div class="form-step" id="step-2">
  <div class="row mb-3">
    <div class="col">
     <label class="form-label">Début du contrat *</label>
      <input type="date" name="debut_contrat" class="form-control" >
    </div>
    <div class="col">
      <label class="form-label">Fin du contrat</label>
      <input type="date" name="fin_contrat" class="form-control">
    </div>
  </div>
  <div class="mb-3">
    <label class="form-label">Planning flexible ? *</label>
    <select name="planning_flexible" class="form-select" >
      <option value="oui">Oui</option>
      <option value="non">Non</option>
    </select>
  </div>

  <!-- Planning -->
  <div class="mb-4">
      <h5 class="text-center mt-4">Planning souhaité</h5>
      <p class="text-center text-muted small">Pour modifier une plage, cliquez dessus.</p>
      <div class="table-responsive">
        <table class="table table-bordered text-center align-middle">
          <thead class="table-light">
            <tr>
              <th>Jour</th>
              <th>07:00</th><th>08:00</th><th>09:00</th><th>10:00</th><th>11:00</th>
              <th>12:00</th><th>13:00</th><th>14:00</th><th>15:00</th><th>16:00</th>
              <th>17:00</th><th>18:00</th><th>19:00</th>
            </tr>
          </thead>
          <tbody>
            <!-- Lignes jours générées dynamiquement -->
            <script>
              const jours = ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi'];
              const heures = ['07:00','08:00','09:00','10:00','11:00','12:00','13:00','14:00','15:00','16:00','17:00','18:00','19:00'];
              document.addEventListener("DOMContentLoaded", () => {
                const tbody = document.querySelector("tbody");
                jours.forEach(jour => {
                  const tr = document.createElement("tr");
                  const tdJour = document.createElement("td");
                  tdJour.textContent = jour;
                  tr.appendChild(tdJour);
                  heures.forEach(h => {
                    const td = document.createElement("td");
                    const input = document.createElement("input");
                    input.type = "checkbox";
                    input.name = `planning[${jour}][]`;
                    input.value = h;
                    td.appendChild(input);
                    tr.appendChild(td);
                  });
                  tbody.appendChild(tr);
                });
              });
            </script>
          </tbody>
        </table>
      </div>
    </div>

  <div class="btn-group">
    <button type="button" class="btn btn-secondary" onclick="nextStep(1)">Précédent</button>
    <button type="button" class="btn btn-success" onclick="nextStep(3)">Suivant</button>
  </div>
</div>


  <!-- Étape 3 -->
  <div class="form-step" id="step-3">
      <h5 class="mb-4">Informations sur les parents</h5>
      <div class="row">
        <!-- Parent 1 -->
        <div class="col-md-6">
          <label class="form-label">Parent 1 *</label>
          <select class="form-select" name="type_parent1" >
            <option value="Mère">Mère</option>
            <option value="Père">Père</option>
            <option value="Autre">Autre</option>
          </select>

          <label class="form-label mt-2">Prénom *</label>
          <input type="text" name="prenom_parent1" class="form-control" placeholder="Prénom">

          <label class="form-label mt-2">Nom *</label>
          <input type="text" name="nom_parent1" class="form-control" placeholder="Nom">

          <label class="form-label mt-2">Email *</label>
          <input type="email" name="email_parent1" class="form-control" placeholder="Email">
          <label class="form-label mt-2">N° d'allocataire *</label>
          <input type="text" name="allocataire_parent1" class="form-control" placeholder="N° d'allocataire" id="allocataire_parent1">

          <label class="form-label mt-2">Téléphone fixe</label>
<input type="text" name="tel_fixe_parent1" class="form-control" placeholder="Téléphone fixe" maxlength="10" id="tel_fixe_parent1">


<label class="form-label mt-2">Téléphone portable *</label>
<input type="text" name="tel_portable_parent1" class="form-control" placeholder="Téléphone portable" maxlength="13" id="tel_portable_parent1">

          <label class="form-label mt-2">Adresse</label>
          <input type="text" name="adresse_parent1" class="form-control" placeholder="Adresse">

          <label class="form-label mt-2">Code Postal</label>
          <input type="text" name="code_postal_parent1" class="form-control" placeholder="Code Postal">

          <label class="form-label mt-2">Ville</label>
          <input type="text" name="ville_parent1" class="form-control" placeholder="Ville">

          <label class="form-label mt-2">Pays</label>
          <select class="form-select" name="pays_parent1">
            <option value="France">France</option>
          </select>

          <label class="form-label mt-2">Revenu annuel *</label>
          <input type="text" name="revenu_annuel_parent1" class="form-control" placeholder="Revenu annuel">

          <label class="form-label mt-2">Profession</label>
          <input type="text" name="profession_parent1" class="form-control" placeholder="Profession">

          <label class="form-label mt-2">Nom de l'entreprise</label>
          <input type="text" name="entreprise_parent1" class="form-control" placeholder="Nom de l'entreprise">

          <label class="form-label mt-2">Contrat d'entreprise <span title="Travaille pour l'entreprise employeur" style="cursor: help; color: teal;">&#9432;</span></label>
          <select class="form-select" name="contrat_entreprise_parent1">
            <option value="Non">Non</option>
            <option value="Oui">Oui</option>
          </select>

          <label class="form-label mt-2">Enfants à charge</label>
<input type="number" name="enfants_charge_parent1" class="form-control" placeholder="1" min="0" step="1">

<label class="form-label mt-2">Enfants avec handicap</label>
<input type="number" name="enfants_handicap_parent1" class="form-control" placeholder="0" min="0" step="1">

        </div>

        <!-- Parent 2 -->
        <div class="col-md-6">
          <label class="form-label">Parent 2</label>
          <select class="form-select" name="type_parent2">
            <option value="Père">Père</option>
            <option value="Mère">Mère</option>
            <option value="Autre">Autre</option>
          </select>

          <label class="form-label mt-2">Prénom</label>
          <input type="text" name="prenom_parent2" class="form-control" placeholder="Prénom">

          <label class="form-label mt-2">Nom</label>
          <input type="text" name="nom_parent2" class="form-control" placeholder="Nom">

          <label class="form-label mt-2">Email</label>
          <input type="email" name="email_parent2" class="form-control" placeholder="Email">

          <label class="form-label mt-2">N° d'allocataire</label>
<input type="text" name="allocataire_parent2" class="form-control" placeholder="N° d'allocataire" id="allocataire_parent2">


          <label class="form-label mt-2">Téléphone fixe</label>
<input type="text" name="tel_fixe_parent2" class="form-control" placeholder="Téléphone fixe" maxlength="13" id="tel_fixe_parent2">

<label class="form-label mt-2">Téléphone portable</label>
<input type="text" name="tel_portable_parent2" class="form-control" placeholder="Téléphone portable" maxlength="13" id="tel_portable_parent2">


          <label class="form-label mt-2">Adresse</label>
          <input type="text" name="adresse_parent2" class="form-control" placeholder="Adresse">

          <label class="form-label mt-2">Code Postal</label>
          <input type="text" name="code_postal_parent2" class="form-control" placeholder="Code Postal">

          <label class="form-label mt-2">Ville</label>
          <input type="text" name="ville_parent2" class="form-control" placeholder="Ville">

          <label class="form-label mt-2">Pays</label>
          <select class="form-select" name="pays_parent2">
            <option value="France">France</option>
          </select>

          <label class="form-label mt-2">Revenu annuel </label>
          <input type="text" name="revenu_annuel_parent2" class="form-control" placeholder="Revenu annuel">

          <label class="form-label mt-2">Profession</label>
          <input type="text" name="profession_parent2" class="form-control" placeholder="Profession">

          <label class="form-label mt-2">Nom de l'entreprise</label>
          <input type="text" name="entreprise_parent2" class="form-control" placeholder="Nom de l'entreprise">

          <label class="form-label mt-2">Contrat d'entreprise <span title="Travaille pour l'entreprise employeur" style="cursor: help; color: teal;">&#9432;</span></label>
          <select class="form-select" name="contrat_entreprise_parent2">
            <option value="Non">Non</option>
            <option value="Oui">Oui</option>
          </select>

          <label class="form-label mt-2">Enfants à charge</label>
<input type="number" name="enfants_charge_parent2" class="form-control" placeholder="1" min="0" step="1">

<label class="form-label mt-2">Enfants avec handicap</label>
<input type="number" name="enfants_handicap_parent2" class="form-control" placeholder="0" min="0" step="1">

        </div>
      </div>
    <div class="btn-group">
      <button type="button" class="btn btn-secondary" onclick="nextStep(2)">Précédent</button>
      <button type="button" class="btn btn-success" onclick="nextStep(4)">Suivant</button>
    </div>
  </div>

  <!-- Étape 4 -->
  <div class="form-step" id="step-4">
    
     <div class="mb-3 infos-center">
  <label class="form-label">Informations complémentaires</label>
  <textarea name="infos_complementaires" class="form-control" rows="4" placeholder="Vous pouvez ajouter une remarque si besoin..."></textarea>
</div>
 

    <div class="btn-group">
      <button type="button" class="btn btn-secondary" onclick="nextStep(3)">Précédent</button>
   <button type="submit" class="btn btn-primary" id="final-submit">Valider le dossier</button>



    </div>
  </>
</form>

  </div>

  <script>
  // Appliquer à chaque champ allocataire (parent 1 et parent 2)
  ['allocataire_parent1', 'allocataire_parent2'].forEach(id => {
    document.getElementById(id).addEventListener('input', function () {
      this.value = this.value.replace(/\D/g, '').slice(0, 7); // uniquement chiffres, max 7 caractères
    });
  });
</script>


  <script> // contrôle numéro de portable parent1
  const telPortableInput = document.getElementById('tel_portable_parent1');

  telPortableInput.addEventListener('input', function () {
    // Nettoie la saisie : autorise seulement les chiffres et un + au début
    let cleaned = this.value.replace(/[^\d+]/g, '');

    // Si + est présent mais pas au début, on le supprime
    if (cleaned.indexOf('+') > 0) {
      cleaned = cleaned.replace(/\+/g, '');
    }

    this.value = cleaned;
  });
</script>


  <script> // contrôle numéro de téléphone fixe parent1
  const telFixeInput = document.getElementById('tel_fixe_parent1');

  telFixeInput.addEventListener('input', function () {
    // Supprimer tout caractère qui n'est pas un chiffre
    this.value = this.value.replace(/\D/g, '');
  });
</script>

<script> // télépone fixe et portable contrôlé du parent2
  function filtrerTelephone(inputId) {
    const input = document.getElementById(inputId);
    input.addEventListener('input', function () {
      let cleaned = this.value.replace(/[^\d+]/g, '');
      if (cleaned.indexOf('+') > 0) {
        cleaned = cleaned.replace(/\+/g, '');
      }
      this.value = cleaned;
    });
  }

  filtrerTelephone('tel_fixe_parent2');
  filtrerTelephone('tel_portable_parent2');
</script>



  <script>
    function nextStep(step) {
      document.querySelectorAll('.form-step').forEach((el, index) => {
        el.classList.remove('active');
        document.getElementById(`step-${index + 1}-tab`).classList.remove('active');
      });
      document.getElementById(`step-${step}`).classList.add('active');
      document.getElementById(`step-${step}-tab`).classList.add('active');
    }
  </script>

<!-- Ton script JS de validation personnalisé -->

<script>
document.getElementById('multi-step-form').addEventListener('submit', function (e) {
  const champsObligatoires = [
    'prenom_enfant', 'nom_enfant', 'date_naissance_enfant', 'genre_enfant',
    'debut_contrat', 'planning_flexible',
    'type_parent1', 'prenom_parent1', 'nom_parent1', 'email_parent1',
    'allocataire_parent1', 'revenu_annuel_parent1'
  ];

  let incomplet = champsObligatoires.some(name => {
    const champ = document.querySelector(`[name="${name}"]`);
    return !champ || !champ.value.trim();
  });

  if (incomplet) {
    e.preventDefault();
    
    const erreurContainer = document.getElementById('form-errors');

    // Vérifie si un message est déjà affiché
    if (!document.getElementById('auto-dismiss-error')) {
      const div = document.createElement('div');
      div.className = 'error-message';
      div.id = 'auto-dismiss-error';
      div.innerHTML = `
        ⚠️ <strong>(*) : Champs obligatoires !</strong>
      `;
      erreurContainer.appendChild(div);

      setTimeout(() => {
        div.style.transition = 'opacity 0.5s ease';
        div.style.opacity = '0';
        setTimeout(() => div.remove(), 500);
      }, 6000); // ⏱️ Dure 6 secondes
    }

    // Remonter à la div d'erreur
    erreurContainer.scrollIntoView({ behavior: 'smooth' });
  }
});
</script>


<script>
  // Rendre les onglets cliquables
  document.querySelectorAll('.step').forEach(tab => {
    tab.addEventListener('click', function () {
      const stepNumber = this.getAttribute('data-step');
      if (stepNumber) {
        nextStep(stepNumber);
      }
    });
  });
</script>


  
</body>
</html>