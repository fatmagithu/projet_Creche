<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails de la sortie - Zoo de Vincennes</title>
    <style>
        /* Style global */
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 20px;
            color: #333;
        }

        h1, h2, h3 {
            color: #2c3e50;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            background: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        .details, .parents, .form {
            margin-bottom: 30px;
        }

        .details p, .parents p {
            line-height: 1.6;
        }

        .list {
            margin-top: 10px;
            padding-left: 20px;
        }

        ul {
            margin: 0;
            padding: 0;
            list-style: none;
        }

        ul li {
            background: #f1f1f1;
            margin-bottom: 5px;
            padding: 10px;
            border-radius: 4px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        ul li .delete-btn {
            cursor: pointer;
            color: red;
            font-weight: bold;
        }

        /* Bouton */
        .btn {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            color: #ffffff;
            background-color: #27ae60;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-transform: uppercase;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #219150;
        }

        /* Formulaire */
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"], input[type="tel"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="checkbox"] {
            margin-right: 5px;
        }

        .submit-btn {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #3498db;
            color: white;
            font-size: 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .submit-btn:hover {
            background-color: #2980b9;
        }

        /* Limite des inscrits */
        .alert {
            color: #e74c3c;
            font-weight: bold;
        }

    </style>
</head>
<body>
    <div class="container">
        <h1>Sortie : Zoo de Vincennes</h1>
        <p>Rejoignez-nous pour une journée inoubliable au Zoo de Vincennes. Découvrez les animaux du monde entier, partagez des moments de découverte avec vos enfants, et profitez d'activités éducatives et ludiques.</p>

        <div class="details">
            <h2>Détails de la journée</h2>
            <p><strong>Date :</strong> 20 décembre 2024</p>
            <p><strong>Heure de départ :</strong> 08h30</p>
            <p><strong>Point de rendez-vous :</strong> Devant la crèche</p>
            <p><strong>Programme :</strong></p>
            <ul class="list">
                <li>08h30 - Départ en bus</li>
                <li>10h00 - Arrivée au Zoo de Vincennes</li>
                <li>10h15 - Visite guidée des enclos (section Afrique)</li>
                <li>12h30 - Déjeuner sur place</li>
                <li>13h30 - Temps libre pour explorer le zoo</li>
                <li>15h00 - Activités ludiques et éducatives pour les enfants</li>
                <li>17h00 - Retour en bus vers la crèche</li>
            </ul>
            <p><strong>À prévoir :</strong></p>
            <ul class="list">
                <li>Sac à dos avec une bouteille d'eau</li>
                <li>Casquette ou chapeau</li>
                <li>Crème solaire (si nécessaire)</li>
                <li>Un goûter pour l'après-midi</li>
            </ul>
        </div>

        <div class="parents">
            <h2>Parents inscrits</h2>
            <p><strong>Nombre de parents inscrits :</strong> <span id="parent-count">0</span> / 5</p>
            <ul id="parent-list"></ul>
            <p class="alert" id="alert-box">Il reste 5 places pour les parents accompagnateurs.</p>
        </div>

        <form id="parent-form">
            <label for="parent-name">Nom du parent :</label>
            <input type="text" id="parent-name" name="parent-name" required>

            <label for="parent-phone">Téléphone :</label>
            <input type="tel" id="parent-phone" name="parent-phone" required>

            <label>
                <input type="checkbox" name="consent" required>
                J'accepte d'accompagner les enfants lors de cette sortie.
            </label>

            <button type="submit" class="submit-btn">S'inscrire</button>
        </form>
    </div>

    <script>
        const parentForm = document.getElementById("parent-form");
        const parentNameInput = document.getElementById("parent-name");
        const parentPhoneInput = document.getElementById("parent-phone");
        const parentCount = document.getElementById("parent-count");
        const parentList = document.getElementById("parent-list");
        const alertBox = document.getElementById("alert-box");

        const maxParents = 5;
        let parents = JSON.parse(localStorage.getItem("parents")) || [];

        // Afficher les parents à partir de localStorage
        function displayParents() {
            parentList.innerHTML = '';
            parents.forEach((parent, index) => {
                const li = document.createElement("li");
                li.innerHTML = `${parent.name} (${parent.phone}) <span class="delete-btn" data-index="${index}">❌</span>`;
                parentList.appendChild(li);
            });
            parentCount.textContent = parents.length;
            alertBox.textContent = `Il reste ${maxParents - parents.length} place(s) pour les parents accompagnateurs.`;

            // Désactiver le formulaire si le nombre de parents est atteint
            if (parents.length >= maxParents) {
                parentForm.querySelector(".submit-btn").disabled = true;
                alertBox.textContent = "Toutes les places sont prises.";
            } else {
                parentForm.querySelector(".submit-btn").disabled = false;
            }
        }

        // Ajouter un parent
        parentForm.addEventListener("submit", function (e) {
            e.preventDefault();

            if (parents.length < maxParents) {
                const parentName = parentNameInput.value.trim();
                const parentPhone = parentPhoneInput.value.trim();

                const newParent = { name: parentName, phone: parentPhone };
                parents.push(newParent);

                localStorage.setItem("parents", JSON.stringify(parents));
                displayParents();

                parentNameInput.value = '';
                parentPhoneInput.value = '';
            }
        });

        // Supprimer un parent
        parentList.addEventListener("click", function (e) {
            if (e.target && e.target.classList.contains("delete-btn")) {
                const index = e.target.dataset.index;
                parents.splice(index, 1);

                localStorage.setItem("parents", JSON.stringify(parents));
                displayParents();
            }
        });

        // Initialiser l'affichage
        displayParents();
    </script>
</body>
</html>
