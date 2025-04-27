
<style>
/* Styles généraux */
body {
    font-family: 'Playwrite GB S', cursive; /* Police personnalisée */
    background-color: rgb(235, 224, 209);
    color: #333;
    margin: 0;
    padding: 0;
}

/* En-tête */
header {
    background-color: #c9bda0;
    color: #fff;
    padding: 20px;
    text-align: center;
}

header h1 {
    margin: 0;
    font-size: 36px;
}

/* Conteneur principal */
.container {
    width: 80%;
    margin: 40px auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

/* Barre de navigation */
.navbar {
    display: flex;
    justify-content: space-around;
    background-color: #0066cc;
    padding: 15px;
}

.navbar a {
    color: white;
    text-decoration: none;
    font-size: 18px;
    padding: 10px;
    border-radius: 5px;
}

.navbar a:hover {
    background-color: #005bb5;
}

/* Section des informations */
.section-title {
    font-size: 28px;
    color: #0066cc;
    margin-bottom: 20px;
}

.child-info, .school-info, .tasks-info {
    background-color: #e6f7ff;
    padding: 15px;
    border-radius: 8px;
    margin-bottom: 20px;
}

.child-info h2, .school-info h2, .tasks-info h2 {
    margin-top: 0;
    font-size: 24px;
}

/* Tableau des horaires des activités */
.table-activities {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
    background-color: #fff;
}

.table-activities th, .table-activities td {
    border: 1px solid #ddd;
    padding: 10px;
    text-align: center;
}

.table-activities th {
    background-color: #ff6f61;
    color: white;
    font-size: 18px;
}

.table-activities td {
    background-color: #f9f9f9;
}

.table-activities tr:nth-child(even) {
    background-color: #f2f2f2;
}

.table-activities tr:hover {
    background-color: #ffeb3b;
}

/* Footer */
.footer {
    background-color: #0066cc;
    color: #fff;
    text-align: center;
    padding: 10px;
    position: fixed;
    width: 100%;
    bottom: 0;
}

/* Boutons */
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

.calendar table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
    animation: fadeIn 1s ease-in-out;
}

.calendar th {
    padding: 15px;
    background-color: #ff6f61;
    color: #ffffff;
    font-size: 18px;
    text-align: center;
    text-transform: uppercase;
    border: 1px solid #ddd;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
}

.calendar td {
    padding: 20px;
    text-align: center;
    font-size: 18px;
    color: #333;
    border: 1px solid #ddd;
    cursor: pointer;
    transition: all 0.3s ease;
    background-color: #f9f9f9;
    border-radius: 10px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}

.calendar td:hover {
    background-color: #ffeb3b;
    transform: scale(1.1);
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.15);
}

/* Footer et éléments fixes */
footer {
    background-color: #0066cc;
    color: #fff;
    text-align: center;
    padding: 10px;
    position: fixed;
    width: 100%;
    bottom: 0;
}


</style>
<?php
session_start();

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['admin_nom'])) {
    header("Location: loginpro.php");
    exit();
}

// Vérifier si un message d'enfant malade a été enregistré
$message_malade = isset($_SESSION['message_malade']) ? $_SESSION['message_malade'] : null;

// Si un message est disponible, l'afficher
if ($message_malade) {
    echo "<div class='alert'>
            Un enfant a été déclaré malade. Message : <strong>" . htmlspecialchars($message_malade) . "</strong>
          </div>";

    // Une fois le message affiché, on peut le supprimer de la session
    unset($_SESSION['message_malade']);
}

echo "<h1>Bienvenue, " . $_SESSION['admin_nom'] . "!</h1>";
?>

<header>
    <h1>Espace Administrateur - Crèche</h1>
    <link href="https://fonts.googleapis.com/css2?family=Playwrite+GB+S&display=swap" rel="stylesheet">

</header>

<div class="navbar">
    <a href="http://localhost:8888/monphp/babyfarm/ouiounon.php">Nouvelles inscriptions </a>
    <a href="http://localhost:8888/monphp/babyfarm/gereract.php">Gérer les enfants</a>
    <a href="http://localhost:8888/monphp/babyfarm/activit%c3%a9bb.php?parent-name=Muriel+%2C+maman+de+Sophie&parent-phone=0899875&consent=on">Activités</a>
    <a href="http://localhost:8888/monphp/babyfarm/profil.php">Absences</a>
    <a href="logout.php" class="btn-danger">Déconnexion</a>
</div>

<div class="container">
    <h2 class="section-title">Informations Crèche</h2>
    <div class="school-info">
        <h2>Infos sur la crèche</h2>
        <p>La crèche Babay Farm est un lieu d'éveil et d'apprentissage sécurisé. Nous accueillons les enfants de 8h à 18h, du lundi au vendredi.</p>
    </div>

    <h2 class="section-title">Tâches à faire</h2>
    <div class="tasks-info">
        <h2>Tâches administratives</h2>
        <ul>
            <li>Vérifier les plannings d'activités</li>
            <li>Mettre à jour les informations des enfants</li>
            <li>Contacter les parents en cas d'urgence</li>
        </ul>
    </div>

    <h2 class="section-title">Calendrier des Activités</h2>
    <div class="calendar">
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
</div>

<footer>
    <p>&copy; 2024 Babay Farm - Tous droits réservés</p>
</footer>
