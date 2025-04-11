<?php
// Démarrer une session
session_start();

// Vérification de la session
if (!isset($_SESSION['baby_nom'])) {
    header("Location: inscription.php"); // Redirige vers la page de connexion si non connecté
    exit();
}

// Récupération du nom de l'enfant
$nom_enfant = $_SESSION['baby_nom'];

// Connexion à la base de données pour récupérer plus d'infos si nécessaire
$host = "localhost";
$username = "root";
$password = "root";
$dbname = "babayfarm";

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connexion échouée: " . $conn->connect_error);
}

// Préparation de la requête pour obtenir les informations de l'enfant
$stmt = $conn->prepare("SELECT * FROM babies WHERE nom = ?");
$stmt->bind_param("s", $nom_enfant);
$stmt->execute();
$result = $stmt->get_result();
$baby = $result->fetch_assoc();

$conn->close();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espace Parent - <?php echo htmlspecialchars($baby['nom']); ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Playwrite+GB+S&display=swap" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">


    <style>
        /* Styles CSS pour l'espace parent */
        body {
            font-family: "Playwrite GB S", cursive; /* Police personnalisée en cursive */
            background-color: rgb(235, 224, 209); /* Couleur de fond modifiée */
            color: #333;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #c9bda0; /* Couleur de fond du header */
            color: #fff;
            padding: 20px;
            text-align: center;
        }

        header h1 {
            margin: 0;
            font-size: 36px;
        }

        .container {
            width: 80%;
            margin: 40px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .section-title {
            font-size: 28px;
            color: #0066cc;
            margin-bottom: 20px;
        }

        .child-info {
            background-color: #e6f7ff; /* Couleur douce pour les infos sur l'enfant */
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .child-info h2 {
            margin-top: 0;
            font-size: 24px;
        }

        .school-info {
            background-color: #f9f9f9;
            padding: 15px;
            border-radius: 8px;
        }

        .school-info h2 {
            margin-top: 0;
            font-size: 24px;
        }

        .footer {
            background-color: #0066cc;
            color: #fff;
            text-align: center;
            padding: 10px;
            position: fixed;
            width: 100%;
            bottom: 0;
        }

        .btn-danger {
            background-color: #e74c3c;
            border: none;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            display: inline-block;
        }

        .btn-danger:hover {
            background-color: #c0392b;
        }
    </style>
</head>
<body>

<header>
    <h1>Espace Parent - <?php echo htmlspecialchars($baby['nom']); ?></h1>
</header>

<div class="container">
    <h2 class="section-title">Bienvenue dans votre espace parent</h2>
    
    <div class="child-info">
        <h2>Informations sur votre enfant</h2>
        <p><strong>Nom de l'enfant:</strong> <?php echo htmlspecialchars($baby['nom']); ?></p>
        <p><strong>Mot de passe:</strong> <?php echo htmlspecialchars($baby['mot_de_passe']); ?></p>
    </div>

    <div class="school-info">
        <h2>À savoir sur la crèche</h2>
        <p>Notre crèche, Babay Farm, offre un environnement sécurisé et stimulant pour vos enfants. Nous proposons diverses activités éducatives, des jeux interactifs, ainsi que des ateliers créatifs pour favoriser leur développement.</p>
        <p>Les horaires d'ouverture sont de 8h00 à 18h00 du lundi au vendredi.</p>
        <p><strong>Numéro d'urgence:</strong> 01 23 45 67 89</p>
        <p>Pour toute question, n'hésitez pas à nous contacter à l'adresse <strong>contact@babayfarm.fr</strong>.</p>
    </div>

</div>













<div class="calendar">
    <h3>Calendrier des Activités</h3>
    <table>
        <tr>
            <th>Lundi</th>
            <th>Mardi</th>
            <th>Mercredi</th>
            <th>Jeudi</th>
            <th>Vendredi</th>
        </tr>
        <tr>
            <td>Jeux de motricité fine</td>
            <td>Atelier créatif🎨</td>
            <td>Parcours moteur</td>
            <td>Sortie extérieure, a la decouverte des animaux "La ferme solidaire"🦃🐑</td>
            <td>Jeux de groupe en interieur☔️🌧</td>
        </tr>
    </table>
</div>
<style>
/* Calendrier des activités */
.calendar {
    background-color: #ffffff;
    padding: 30px;
    margin-bottom: 30px;
    border-radius: 15px;
    box-shadow: 0 4px 25px rgba(0, 0, 0, 0.1);
    font-family: 'Comic Sans MS', sans-serif;
    transition: all 0.5s ease;
}

/* Table du calendrier */
.calendar table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
    animation: fadeIn 1s ease-in-out; /* Animation d'entrée douce */
}

/* En-têtes de colonnes (jours de la semaine) */
.calendar th {
    padding: 15px;
    background-color: #ff6f61; /* Couleur vibrante pour les jours de la semaine */
    color: #ffffff;
    font-size: 18px;
    text-align: center;
    text-transform: uppercase;
    border: 1px solid #ddd;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
    transition: background-color 0.3s ease;
}

/* Changer la couleur des en-têtes lors du survol */
.calendar th:hover {
    background-color: #ff8a73;
}

/* Cellules du calendrier */
.calendar td {
    padding: 20px;
    text-align: center;
    font-size: 18px;
    color: #333;
    border: 1px solid #ddd;
    cursor: pointer;
    transition: all 0.3s ease;
    position: relative;
    background-color: #f9f9f9;
    border-radius: 10px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}

/* Mise en surbrillance au survol des cellules */
.calendar td:hover {
    background-color: #ffeb3b; /* Couleur jaune vif pour l'interaction */
    transform: scale(1.1);
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.15);
}

/* Cellules sélectionnées */
.calendar td.selected {
    background-color: #ff6f61;
    color: white;
    font-weight: bold;
    box-shadow: 0 0 15px rgba(255, 111, 97, 0.8);
}

/* Cellules vides ou hors calendrier (pour une meilleure présentation) */
.calendar td.empty {
    background-color: #f0f0f0;
    cursor: not-allowed;
}

/* Jour courant avec animation */
.calendar .current-day {
    background-color: #ffeb3b;
    color: #333;
    font-weight: bold;
    font-size: 20px;
    animation: bounce 0.5s infinite alternate; /* Animation de rebond pour le jour actuel */
}

/* Effet de rebond pour le jour courant */
@keyframes bounce {
    0% {
        transform: translateY(0);
    }
    50% {
        transform: translateY(-5px);
    }
    100% {
        transform: translateY(0);
    }
}

/* Animation d'apparition douce pour la table */
@keyframes fadeIn {
    0% {
        opacity: 0;
        transform: translateY(50px);
    }
    100% {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Bordure et ombre pour la table */
.calendar table {
    box-shadow: 0 2px 15px rgba(0, 0, 0, 0.15);
    transition: box-shadow 0.3s ease;
}

/* Ombre d'animation au survol de la table */
.calendar:hover {
    box-shadow: 0 8px 30px rgba(0, 0, 0, 0.2);
}

</style>
















<!-------------------------------CAROUSSEL------------------------>


<style>
        /* Ajouter ici vos styles personnalisés */
        .container {
            padding: 20px;
        }

        .carousel__wrapper {
            display: flex;
            overflow-x: auto;
        }

        .item {
            margin-right: 10px;
        }

        .item img {
            width: 418px;
            height: 418px;
        }

        .instagram__header {
            display: flex;
            align-items: center;
        }

        .instagram__media img {
            width: 100%;
            height: auto;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <h1>Bienvenue dans l'espace parent de <?php echo htmlspecialchars($baby['nom']); ?></h1>
        <p><strong>Nom:</strong> <?php echo htmlspecialchars($baby['nom']); ?></p>
        <p><strong>Mot de passe:</strong> <?php echo htmlspecialchars($baby['mot_de_passe']); ?></p>
        <a href="deconnexion.php" class="btn btn-danger">Se déconnecter</a>
    
        <a href="mailto:crechemontessori@gmail.com?subject=Prise de contact  bébé malade" target="_blank">
    <button class="btn-enfant-malade">Enfant Malade</button>
</a>

<a  href="http://localhost:8888/monphp/babyfarm/activit%c3%a9bb.php?parent-name=Muriel+%2C+maman+de+Sophie&parent-phone=0899875&consent=on">
<button class="btn-inscription">S'inscrire aux prochaines sorties</button>
  </a>
<style>
    /* Bouton d'inscription */
.btn-inscription {
    display: inline-block;
    padding: 12px 20px;
    font-size: 16px;
    font-weight: bold;
    color: #ffffff;
    background-color: #27ae60;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    text-transform: uppercase;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    transition: background-color 0.3s ease, transform 0.2s ease;
}

/* Effet au survol */
.btn-inscription:hover {
    background-color: #219150;
    transform: translateY(-2px);
}

/* Effet au clic */
.btn-inscription:active {
    background-color: #1e7d46;
    transform: translateY(0);
}
</style>

    </div>
    <style>
        /* Style pour le bouton Enfant Malade */
.btn-enfant-malade {
    background-color: #ff6666; /* Couleur rouge clair */
    color: white;              /* Texte en blanc */
    font-size: 18px;           /* Taille du texte */
    padding: 15px 30px;        /* Espacement interne */
    border: none;              /* Pas de bordure */
    border-radius: 8px;        /* Coins arrondis */
    cursor: pointer;          /* Curseur pointeur pour indiquer que c'est cliquable */
    transition: background-color 0.3s ease; /* Transition douce au survol */
}

/* Effet au survol */
.btn-enfant-malade:hover {
    background-color: #ff4d4d; /* Couleur rouge plus foncé au survol */
}
</style>

    <!-- Début de la section carousel -->
    <div class="container">
        <h3 id="photomoussa">Photos des dernières activitées:</h3>
        <aside class="carousel">
            <div class="carousel__wrapper">
                <?php
                // Tableau d'images à afficher dans le carousel
                $images = [
                   
                    'moussa2.png',
                    'moussa3.png',
                    'moussa4.png',
                    'moussa5.png',
                    'moussa6.png',
                    'moussa7.png',
                    'moussa8.png',
                    'moussa9.png',
                    'moussa11.png',
                    'moussa12.png',
                    'moussa13.png',
                    'moussa14.png',
                    'moussa15.png',
                ];

                foreach ($images as $index => $image) {
                    echo "<div class='item' id='slide-$index'>
                        <img src='$image' alt='Image $index'>
                    </div>";
                }
                ?>
            </div>
        </aside>
    </div>
    <!-- Fin de la section carousel -->

    
    <!-- Ajout des scripts JS -->
    <script>
        // Ajouter ici vos scripts JavaScript pour interactivité
    </script>




















<?php
// Connexion à la base de données
$host = 'localhost';
$dbname = 'babayfarm';
$username = 'root'; // Remplacez par votre nom d'utilisateur
$password = 'root'; // Remplacez par votre mot de passe

try {
    // Connexion à la base de données
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Vérification de la présence d'un paramètre ID dans l'URL
    $id = isset($_GET['id']) ? intval($_GET['id']) : 0; // Récupère l'ID de l'URL (ex: ?id=2)
    
    if ($id > 0) {
        // Requête SQL préparée pour récupérer les informations de l'enfant avec l'ID dynamique
        $stmt = $pdo->prepare("SELECT * FROM babies WHERE id = :id");
        $stmt->execute(['id' => $id]);
        
        // Récupération des données
        $baby = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($baby) {
            // Affichage des informations de l'enfant
            echo "<h3>Suivi de l’évolution de " . htmlspecialchars($baby['nom']) . "</h3>";
            echo "<p><strong>Motricité:</strong> " . htmlspecialchars($baby['motricite'] ?? 'Non spécifié') . "</p>";
            echo "<p><strong>Éveil:</strong> " . htmlspecialchars($baby['eveil'] ?? 'Non spécifié') . "</p>";
            echo "<p><strong>Activités préférées:</strong> " . htmlspecialchars($baby['activites_preferees'] ?? 'Non spécifié') . "</p>";
        } else {
            // Si l'enfant n'est pas trouvé
            echo "Aucun enfant trouvé avec cet ID.";
        }
    } else {
        // Si l'ID n'est pas valide ou n'est pas passé dans l'URL
       
    }
    
} catch (PDOException $e) {
    // Affichage de l'erreur en cas de problème de connexion
    echo "Erreur : " . $e->getMessage();
}
?>
<?php

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suivi de l'évolution de l'enfant</title>
    <style>
        /* Styles pour la section de suivi de l’évolution */
        .evolution-info {
            background-color: #f9f9f9;  /* Fond clair pour la section */
            border: 1px solid #ddd;     /* Bordure discrète autour de la section */
            border-radius: 10px;         /* Coins arrondis pour un effet plus doux */
            padding: 20px;               /* Espacement interne */
            margin: 20px 0;              /* Marge au-dessus et en-dessous de la section */
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); /* Ombre subtile pour donner du relief */
        }

        .evolution-info h3 {
            font-size: 24px;             /* Taille de la police pour le titre */
            color: #333;                 /* Couleur du texte en gris foncé */
            margin-bottom: 10px;         /* Espacement sous le titre */
            text-align: center;          /* Centrer le titre */
        }

        .evolution-info p {
            font-size: 16px;             /* Taille de la police pour le texte */
            color: #555;                 /* Couleur gris clair pour le texte */
            margin-bottom: 8px;          /* Espacement entre les paragraphes */
        }

        .evolution-info p strong {
            font-weight: bold;           /* Met en gras les éléments de label (Motricité, Éveil, etc.) */
            color: #2a7ff0;              /* Couleur bleu clair pour les labels */
        }

        .evolution-info p:last-child {
            margin-bottom: 0;            /* Supprime la marge sous le dernier paragraphe */
        }

        /* Effet au survol de la section */
        .evolution-info:hover {
            background-color: #f0f8ff;   /* Changement de fond léger lors du survol */
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2); /* Ombre plus marquée pour l'effet hover */
        }
    </style>
</head>
<body>
    <div class="evolution-info">
        <h3>Suivi de l’évolution de <?php echo htmlspecialchars($baby['nom']); ?></h3>
        <p><strong>Motricité:</strong> <?php echo htmlspecialchars($baby['motricite'] ?? 'Non spécifié'); ?></p>
        <p><strong>Éveil:</strong> <?php echo htmlspecialchars($baby['eveil'] ?? 'Non spécifié'); ?></p>
        <p><strong>Activités préférées:</strong> <?php echo htmlspecialchars($baby['activites_preferees'] ?? 'Non spécifié'); ?></p>
    </div>















    <div class="notification-card">
    <div class="notification-card-header">
        <h3 class="notification-card-title">Nouvelle notification</h3>
        <i class="fa fa-times notification-card-close"></i>
    </div>
    <div class="notification-card-container">
        <div class="notification-card-media">
            <img src="woman-7175038_1280.jpg" alt="" class="notification-card-user-avatar">
            <i class="fa fa-thumbs-up notification-card-reaction"></i>
        </div>
        <div class="notification-card-content">
            <p class="notification-card-text">
                <strong>SONIA</strong>, <strong>Attention</strong> Les poux sont de retour ! Veuillez vérifier les têtes de vos bébés !
            </p>
            <span class="notification-card-timer">Il y a 1j</span>
        </div>
      
    </div>
</div>

<style>
/* Style global */
body {
    background-color: #F0F2F5;
    font-family: "Arial", sans-serif;
}
strong {
    font-weight: 600;
}
.notification-card {
    width: 360px;
    padding: 15px;
    background-color: white;
    border-radius: 16px;
    position: fixed;
    bottom: 15px;
    left: 15px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    transform: translateY(200%);
    animation: noti-card 2s forwards ease-in;
}
.notification-card-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 15px;
}
.notification-card-title {
    font-size: 16px;
    font-weight: 500;
    text-transform: capitalize;
}
.notification-card-close {
    cursor: pointer;
    width: 30px;
    height: 30px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: #F0F2F5;
    font-size: 14px;
    transition: background-color 0.3s;
}
.notification-card-close:hover {
    background-color: #d9d9d9;
}
.notification-card-container {
    display: flex;
    align-items: flex-start;
}
.notification-card-user-avatar {
    width: 60px;
    height: 60px;
    border-radius: 50%;
    object-fit: cover;
}
.notification-card-reaction {
    width: 30px;
    height: 30px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    color: white;
    background-image: linear-gradient(45deg, #0070E1, #14ABFE);
    font-size: 14px;
    position: absolute;
    bottom: 0;
    right: 0;
}
.notification-card-content {
    width: calc(100% - 60px);
    padding-left: 20px;
    line-height: 1.2;
}
.notification-card-text {
    margin-bottom: 5px;
}
.notification-card-timer {
    color: #1876F2;
    font-weight: 600;
    font-size: 14px;
}
.notification-card-status {
    position: absolute;
    right: 15px;
    top: 50%;
    width: 15px;
    height: 15px;
    background-color: #1876F2;
    border-radius: 50%;
}
@keyframes noti-card {
    50% {
        transform: translateY(0);
    }
    100% {
        transform: translateY(0);
    }
}
</style>

<script>
    // Afficher la notification immédiatement
    const notification = document.querySelector(".notification-card");
    notification.style.transform = "translateY(0)";
    notification.style.opacity = "1";

    // Bouton de fermeture
    const closeButton = document.querySelector(".notification-card-close");
    closeButton.addEventListener("click", () => {
        notification.style.transform = "translateY(200%)";
        notification.style.opacity = "0";
    });

    // Cacher la notification après 40 secondes
    setTimeout(() => {
        notification.style.transform = "translateY(200%)";
        notification.style.opacity = "0";
    }, 40000); // 40 000 ms = 40 secondes
</script>





</body>

</html>













<!----------------------------FOOTER-----------------------___>
<footer class="footer">
    <p>&copy; 2024 Babay Farm - Tous droits réservés</p>
</footer>

</body>
</html>
