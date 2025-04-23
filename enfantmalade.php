<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon enfant est malade</title>
    <style>
        body {
            font-family: 'Playwrite GB S', sans-serif;
            background-color: #f8f9fa;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }

        .container {
            background-color: #fff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 700px;
        }

        h2 {
            text-align: center;
            color: #4C6EF5;
            margin-bottom: 20px;
            font-size: 2rem;
        }

        label {
            font-size: 1.1rem;
            color: #555;
            margin-bottom: 8px;
            display: block;
        }

        textarea {
            width: 100%;
            padding: 12px;
            margin: 8px 0 16px;
            border: 2px solid #ddd;
            border-radius: 8px;
            font-size: 1rem;
            background-color: #fafafa;
            resize: vertical;
            min-height: 120px;
            transition: border-color 0.3s;
        }

        textarea:focus {
            border-color: #4C6EF5;
            outline: none;
        }

        input[type="submit"] {
            background-color: #4C6EF5;
            color: #fff;
            border: none;
            padding: 14px 24px;
            font-size: 1.1rem;
            border-radius: 8px;
            cursor: pointer;
            width: 100%;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #3650A1;
        }

        .alert {
            margin-top: 20px;
            padding: 12px;
            background-color: #f8f9fa;
            border-left: 5px solid #4C6EF5;
            font-size: 1rem;
            color: #333;
        }
    </style>
</head>
<body>

    <div class="container">
        <h2>Mon enfant est malade</h2>

        <form action="envoyerMail.php" method="POST">
            <label for="message">Message à envoyer :</label>
            <textarea id="message" name="message" required></textarea><br><br>

            <input type="submit" value="Envoyer le message">
        </form>

        <div class="alert">
            Merci de fournir des détails concernant la maladie de l'enfant. Le message sera envoyé à l'administration.
        </div>
    </div>

</body>
</html>