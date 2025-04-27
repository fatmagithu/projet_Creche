<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="info.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playwrite+GB+S:ital,wght@0,100..400;1,100..400&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playwrite+GB+S&display=swap" rel="stylesheet">



</head>

<body>

<!-------------------------------------------FORMMMM---------------------------------------------------->

<div class="container mt-5">
    <h1 class="text-center mb-4">Formulaire d'inscription à la crèche</h1>

    <!-- Formulaire avec action pour soumettre les données -->
    <form action="traitementform.php" method="POST">
        <!-- Informations des parents -->
        <h2 class="mb-3">🐥 Informations des Parents</h2>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="NomParent1" class="form-label">Nom du Parent 1</label>
                <input type="text" class="form-control" id="NomParent1" name="NomParent1" placeholder="Entrez le nom du parent 1">
            </div>
            <div class="col-md-6 mb-3">
                <label for="EmailParent1" class="form-label">Email du Parent 1 📩</label>
                <input type="email" class="form-control" id="EmailParent1" name="EmailParent1" placeholder="Email du parent 1">
            </div>
            <div class="col-md-6 mb-3">
                <label for="TelephoneParent1" class="form-label">Téléphone du Parent 1 📞</label>
                <input type="text" class="form-control" id="TelephoneParent1" name="TelephoneParent1" placeholder="Téléphone du parent 1">
            </div>
            <div class="col-md-6 mb-3">
                <label for="NomParent2" class="form-label">Nom du Parent 2</label>
                <input type="text" class="form-control" id="NomParent2" name="NomParent2" placeholder="Entrez le nom du parent 2">
            </div>
            <div class="col-md-6 mb-3">
                <label for="EmailParent2" class="form-label">Email du Parent 2 📩</label>
                <input type="email" class="form-control" id="EmailParent2" name="EmailParent2" placeholder="Email du parent 2">
            </div>
            <div class="col-md-6 mb-3">
                <label for="TelephoneParent2" class="form-label">Téléphone du Parent 2 📞</label>
                <input type="text" class="form-control" id="TelephoneParent2" name="TelephoneParent2" placeholder="Téléphone du parent 2">
            </div>
        </div>

        <!-- Informations de l'enfant -->
        <h2 class="mt-4 mb-3">🍼 Informations de l'Enfant</h2>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="NomEnfant" class="form-label">Nom de l'enfant</label>
                <input type="text" class="form-control" id="NomEnfant" name="NomEnfant" placeholder="Nom de l'enfant">
            </div>
            <div class="col-md-6 mb-3">
                <label for="DateNaissanceEnfant" class="form-label">Date de naissance</label>
                <input type="date" class="form-control" id="DateNaissanceEnfant" name="DateNaissanceEnfant">
            </div>
            <div class="col-md-6 mb-3">
                <label for="AgeEnfant" class="form-label">Âge de l'enfant 🍼</label>
                <input type="number" class="form-control" id="AgeEnfant" name="AgeEnfant" placeholder="Âge en années">
            </div>
        </div>

        <!-- Informations spécifiques -->
        <h2 class="mt-4 mb-3">🎯 Informations Spécifiques</h2>
        <div class="mb-3">
            <label for="AllergiesEnfant" class="form-label">Allergies de l'enfant 😷</label>
            <textarea class="form-control" id="AllergiesEnfant" name="AllergiesEnfant" rows="3" placeholder="Listez les allergies..."></textarea>
        </div>
        <div class="mb-3">
            <label for="LoisirsEnfant" class="form-label">Loisirs et centres d'intérêt</label>
            <textarea class="form-control" id="LoisirsEnfant" name="LoisirsEnfant" rows="3" placeholder="Les activités préférées de l'enfant"></textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Préférences de menu</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="MenuChoisi" value="petit-ourson" id="MenuChoisi-ourson" required>
                <label class="form-check-label" for="MenuChoisi-ourson">Petit ourson 🐻</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="MenuChoisi" value="petit-poisson" id="MenuChoisi-poisson">
                <label class="form-check-label" for="MenuChoisi-poisson">Petit poisson 🐟</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="MenuChoisi" value="veggie" id="MenuChoisi-veggie">
                <label class="form-check-label" for="MenuChoisi-veggie">Veggie 🌱</label>
            </div>
            <textarea class="form-control" id="DetailsMenu" name="DetailsMenu" rows="1" placeholder="Renseignez vos préférences..."></textarea>
        </div>

        <div class="mb-3">
            <label for="FruitPrefereEnfant" class="form-label">Choisissez un fruit préféré</label>
            <select class="form-select" id="FruitPrefereEnfant" name="FruitPrefereEnfant">
                <option value="">Sélectionnez un fruit</option>
                <option value="pomme">Pomme 🍏</option>
                <option value="poire">Poire 🍐</option>
                <option value="banane">Banane 🍌</option>
                <option value="fraise">Fraise 🍓</option>
                <option value="mangue">Mangue 🥭</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Caractère de l'enfant</label>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="CaractereEnfant" id="CaractereEnfant-joyeux" value="joyeux">
                <label class="form-check-label" for="CaractereEnfant-joyeux">😄 Joyeux</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="CaractereEnfant" id="CaractereEnfant-timide" value="timide">
                <label class="form-check-label" for="CaractereEnfant-timide">😳 Timide</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="CaractereEnfant" id="CaractereEnfant-curieux" value="curieux">
                <label class="form-check-label" for="CaractereEnfant-curieux">🤓 Curieux</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="CaractereEnfant" id="CaractereEnfant-aventureux" value="aventureux">
                <label class="form-check-label" for="CaractereEnfant-aventureux">🧗 Aventureux</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="CaractereEnfant" id="CaractereEnfant-calme" value="calme">
                <label class="form-check-label" for="CaractereEnfant-calme">😌 Calme</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="CaractereEnfant" id="CaractereEnfant-reveur" value="rêveur">
                <label class="form-check-label" for="CaractereEnfant-reveur">🌈 Rêveur</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="CaractereEnfant" id="CaractereEnfant-sportif" value="sportif">
                <label class="form-check-label" for="CaractereEnfant-sportif">⚽ Sportif</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="CaractereEnfant" id="CaractereEnfant-creatif" value="créatif">
                <label class="form-check-label" for="CaractereEnfant-creatif">🎨 Créatif</label>
            </div>
            <textarea class="form-control" id="CaractereEnfant" name="CaractereEnfant_description" rows="1" placeholder="Renseignez le caractère de votre enfant."></textarea>
        </div>

        <!-- Bouton -->
        <button type="submit" class="btn btn-primary w-100 mt-4">Soumettre le formulaire</button>
    </form>
</div>


   
    </div>
</body>


<!-------------------------------------------FIN DE FORMMMMMMMM----------------------------------------->



<br>
<br>
<br>




<section id="recap">

    <div class="container" id="recap-container" style="display: none;">
        <h2>Récapitulatif</h2>
        <p><strong>Nom :</strong> <span id="recap-name"></span></p>
        <button onclick="goBack()">Modifier mes réponses</button>
    </div>
</section>








<script src="inscription.js">
</script>
</body>


    <!-- Copyright -->
    <div class="text-center33">
        © 2024 Votre Entreprise. Tous droits réservés.
    </div>
</footer>