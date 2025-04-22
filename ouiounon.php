<?php
// Connexion à la base de données
$host = "localhost"; // Remplace par ton hôte
$dbname = "babayfarm"; // Remplace par le nom de ta base de données
$username = "root"; // Ton nom d'utilisateur
$password = "root"; // Ton mot de passe

// Connexion à MySQL via PDO
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}

// Récupérer les données de la table "moiinscrit"
$query = "SELECT * FROM moiinscrit";
$stmt = $pdo->query($query);
$inscriptions = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Inscriptions</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
        }

        th {
            background-color: #007bff;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }

        .action-btn {
            background-color: transparent;
            border: none;
            color: red;
            font-size: 20px;
            cursor: pointer;
            transition: color 0.3s ease;
        }

        .action-btn:hover {
            color: darkred;
        }

        .edit-btn {
            background-color: transparent;
            border: none;
            color: green;
            font-size: 20px;
            cursor: pointer;
            transition: color 0.3s ease;
        }

        .edit-btn:hover {
            color: darkgreen;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .no-data {
            text-align: center;
            color: gray;
        }

        .no-data a {
            color: #007bff;
            text-decoration: none;
        }

        .no-data a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Gestion des Inscriptions</h1>
    <table id="inscriptions-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom Parent 1</th>
                <th>Email Parent 1</th>
                <th>Téléphone Parent 1</th>
                <th>Nom Parent 2</th>
                <th>Email Parent 2</th>
                <th>Téléphone Parent 2</th>
                <th>Nom Enfant</th>
                <th>Date Naissance Enfant</th>
                <th>Age Enfant</th>
                <th>Allergies Enfant</th>
                <th>Loisirs Enfant</th>
                <th>Menu Choisi</th>
                <th>Fruit Préféré Enfant</th>
                <th>Caractère Enfant</th>
                <th>Détails Menu</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Connexion à la base de données et récupération des inscriptions
            if ($inscriptions) {
                foreach ($inscriptions as $row) {
                    echo "<tr data-id='{$row['ID']}'>";
                    echo "<td>{$row['ID']}</td>";
                    echo "<td>{$row['NomParent1']}</td>";
                    echo "<td>{$row['EmailParent1']}</td>";
                    echo "<td>{$row['TelephoneParent1']}</td>";
                    echo "<td>{$row['NomParent2']}</td>";
                    echo "<td>{$row['EmailParent2']}</td>";
                    echo "<td>{$row['TelephoneParent2']}</td>";
                    echo "<td>{$row['NomEnfant']}</td>";
                    echo "<td>{$row['DateNaissanceEnfant']}</td>";
                    echo "<td>{$row['AgeEnfant']}</td>";
                    echo "<td>{$row['AllergiesEnfant']}</td>";
                    echo "<td>{$row['LoisirsEnfant']}</td>";
                    echo "<td>{$row['MenuChoisi']}</td>";
                    echo "<td>{$row['FruitPrefereEnfant']}</td>";
                    echo "<td>{$row['CaractereEnfant']}</td>";
                    echo "<td>{$row['DetailsMenu']}</td>";
                    echo "<td><button class='edit-btn'>Éditer</button> <button class='action-btn' onclick='deleteRow(this)'>❌</button></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='17' class='no-data'>Aucune inscription pour le moment.</td></tr>";
            }
            ?>
        </tbody>
    </table>
    
    <div class="no-data" id="no-data-message" style="display:none;">
        <p>Aucune inscription pour le moment.</p>
    </div>
</div>

<script>
    function deleteRow(button) {
        var row = button.closest('tr');
        var id = row.getAttribute('data-id');
        
        // Supprimer la ligne du tableau (côté client)
        row.remove();

        // Envoi de la suppression à la base de données via une requête AJAX
        fetch('delete_inscription.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ id: id })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                checkNoData();
            } else {
                alert('Erreur lors de la suppression');
            }
        });
    }

    function checkNoData() {
        var table = document.getElementById('inscriptions-table');
        var rows = table.getElementsByTagName('tr');
        var noDataMessage = document.getElementById('no-data-message');
        
        if (rows.length <= 1) {
            noDataMessage.style.display = 'block';
        } else {
            noDataMessage.style.display = 'none';
        }
    }

    checkNoData();
</script>

</body>
</html>
