<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération du message
    $message = $_POST['message'];
    $subject = $_POST['subject'];
    $date = date("Y-m-d H:i:s"); // Date du message

    // Enregistrer les informations dans un fichier ou une base de données
    // Ici on stocke dans un fichier temporaire, ou tu pourrais utiliser une base de données
    $notification = [
        'subject' => $subject,
        'message' => $message,
        'date' => $date,
        'user' => 'Sonia' // Exemple, tu peux le remplacer par un nom dynamique si nécessaire
    ];

    // Sauvegarde de la notification dans un fichier (ou dans une base de données)
    file_put_contents('notifications.json', json_encode($notification) . PHP_EOL, FILE_APPEND);

    // Redirection vers la page des parents
    header("Location: parents.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messagerie Crèche</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Messagerie Crèche - Informations Importantes</h1>
        
        <form method="POST" action="">
            <label for="subject">Objet du message :</label>
            <input type="text" id="subject" name="subject" placeholder="Ex: Activités spéciales, Fermeture, etc." required>
            
            <label for="message">Votre message :</label>
            <textarea id="message" name="message" rows="5" placeholder="Entrez votre message ici..." required></textarea>
            
            <button type="submit">Envoyer</button>
        </form>

        <div class="instructions">
            <h2>Instructions</h2>
            <p>Utilisez ce formulaire pour partager les informations importantes avec les parents de la crèche, telles que des mises à jour, des événements à venir, ou des notifications urgentes.</p>
        </div>
    </div>
</body>
</html>

<style>
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f9;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.container {
    background-color: white;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    padding: 20px;
    width: 80%;
    max-width: 600px;
}

h1 {
    text-align: center;
    color: #333;
}

form {
    display: flex;
    flex-direction: column;
    gap: 15px;
}

label {
    font-weight: bold;
    margin-bottom: 5px;
}

input[type="text"],
textarea {
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 14px;
}

textarea {
    resize: vertical;
}

button {
    background-color: #4CAF50;
    color: white;
    padding: 10px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
}

button:hover {
    background-color: #45a049;
}

.instructions {
    margin-top: 30px;
    padding: 10px;
    background-color: #f9f9f9;
    border-radius: 5px;
    border: 1px solid #ddd;
}
</style>
