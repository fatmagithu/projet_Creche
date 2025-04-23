<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des activités</title>
    <style>
        /* Réinitialisation des marges et paddings */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Playwrite GB S', sans-serif; /* Utilisation de la même police */
            background-color: #f0f0f0; /* Fond clair */
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }

        h2 {
            text-align: center;
            font-size: 2rem;
            color: #4C6EF5;
            margin-bottom: 20px;
        }

        form {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            padding: 30px;
            width: 100%;
            max-width: 600px;
        }

        label {
            font-size: 1.1rem;
            color: #555;
            margin-bottom: 8px;
            display: block;
        }

        input[type="text"], textarea {
            width: 100%;
            padding: 12px;
            margin: 8px 0;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 1rem;
            transition: border-color 0.3s;
        }

        input[type="text"]:focus, textarea:focus {
            border-color: #4C6EF5;
            outline: none;
        }

        textarea {
            resize: vertical;
            min-height: 100px;
        }

        input[type="submit"] {
            background-color: #4C6EF5;
            color: #ffffff;
            border: none;
            padding: 12px 24px;
            font-size: 1.1rem;
            border-radius: 6px;
            cursor: pointer;
            transition: background-color 0.3s;
            margin-top: 15px;
            width: 100%;
        }

        input[type="submit"]:hover {
            background-color: #3650A1;
        }

        .form-container {
            width: 100%;
            max-width: 800px;
            margin: 0 auto;
        }

        /* Ajout d'une section message d'alerte */
        .alert {
            margin-top: 20px;
            padding: 15px;
            background-color: #f2f2f2;
            border-left: 5px solid #4C6EF5;
            font-size: 1rem;
            color: #333;
        }

        /* Mobile responsive */
        @media (max-width: 768px) {
            h2 {
                font-size: 1.6rem;
            }

            form {
                padding: 20px;
            }

            input[type="submit"] {
                padding: 10px;
                font-size: 1rem;
            }
        }
    </style>
</head>
<body>

    <div class="form-container">
        <h2>Ajouter une activité pour un enfant</h2>

        <form action="gereract.php" method="POST">
            <label for="nom">Nom de l'enfant :</label>
            <input type="text" id="nom" name="nom" required><br><br>

            <label for="motricite">Motricité :</label>
            <textarea id="motricite" name="motricite" required></textarea><br><br>

            <label for="eveil">Éveil :</label>
            <textarea id="eveil" name="eveil" required></textarea><br><br>

            <label for="activites_preferees">Activités préférées :</label>
            <textarea id="activites_preferees" name="activites_preferees" required></textarea><br><br>

            <label for="mot_de_passe">Mot de passe :</label>
            <input type="text" id="mot_de_passe" name="mot_de_passe" required><br><br>

            <input type="submit" value="Soumettre">
        </form>

        <!-- Zone d'alerte -->
        <div class="alert">
            Veuillez remplir toutes les informations nécessaires avant de soumettre le formulaire.
        </div>
    </div>

</body>
</html>


<?php
// Connexion à la base de données
$host = 'localhost'; // Ou ton hôte
$username = 'root'; // Ton utilisateur MySQL
$password = 'root'; // Ton mot de passe MySQL
$dbname = 'babayfarm'; // Le nom de ta base de données

$conn = new mysqli($host, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Échec de la connexion : " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Récupérer les données envoyées via le formulaire
    $nom = $_POST['nom'];
    $motricite = $_POST['motricite'];
    $eveil = $_POST['eveil'];
    $activites_preferees = $_POST['activites_preferees'];
    $mot_de_passe = $_POST['mot_de_passe']; // Récupérer le mot de passe

    // Vérifier si l'enfant existe déjà dans la base de données
    $sql_check = "SELECT * FROM babies WHERE nom = '$nom'";
    $result = $conn->query($sql_check);

    if ($result->num_rows > 0) {
        // L'enfant existe déjà, mettre à jour les informations
        $sql_update = "UPDATE babies 
                       SET motricite = '$motricite', eveil = '$eveil', activites_preferees = '$activites_preferees', mot_de_passe = '$mot_de_passe' 
                       WHERE nom = '$nom'";

        if ($conn->query($sql_update) === TRUE) {
            echo "Les informations de l'enfant ont été mises à jour avec succès.";
        } else {
            echo "Erreur lors de la mise à jour : " . $conn->error;
        }
    } else {
        // L'enfant n'existe pas, insérer un nouvel enregistrement
        $sql_insert = "INSERT INTO babies (nom, motricite, eveil, activites_preferees, mot_de_passe)
                       VALUES ('$nom', '$motricite', '$eveil', '$activites_preferees', '$mot_de_passe')";

        if ($conn->query($sql_insert) === TRUE) {
            echo "Nouvelle activité ajoutée avec succès.";
        } else {
            echo "Erreur : " . $sql_insert . "<br>" . $conn->error;
        }
    }

    // Fermer la connexion
    $conn->close();
}
?>