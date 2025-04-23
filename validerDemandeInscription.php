<?php
// Connexion à la base de données
session_start();
$host = "localhost";
$username = "root";
$password = "root";
$dbname = "groupe_bulles_deveil";

$conn = new mysqli($host, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Échec de la connexion à la base de données : " . $conn->connect_error);
}

// Traitement de suppression AJAX
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action']) && $_POST['action'] == 'delete') {
    $inscription_id = $_POST['inscription_id'];
    
    // Préparer et exécuter la requête de suppression
    $stmt = $conn->prepare("DELETE FROM inscription_enfant WHERE id = ?");
    $stmt->bind_param("i", $inscription_id);
    $result = $stmt->execute();
    $stmt->close();
    
    // Renvoyer la réponse
    if ($result) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'error' => $conn->error]);
    }
    exit;
}

// Traitement de mise à jour de statut et structure
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['inscription_id'])) {
    $inscription_id = $_POST['inscription_id'];
    
    // Traitement du statut si présent
    if (isset($_POST['inscription'])) {
        $new_inscription = $_POST['inscription'];
        
        $stmt = $conn->prepare("SELECT statut FROM inscription_enfant WHERE id = ?");
        $stmt->bind_param("i", $inscription_id);
        $stmt->execute();
        $stmt->bind_result($current_statut);
        $stmt->fetch();
        $stmt->close();

        if ($new_inscription != $current_statut) {
            if (!empty($new_inscription)) {
                $stmt = $conn->prepare("UPDATE inscription_enfant SET statut = ? WHERE id = ?");
                $stmt->bind_param("si", $new_inscription, $inscription_id);
                $stmt->execute();
                $stmt->close();
            }
        }
    }
    // Traitement de la structure si présente
if (isset($_POST['selected_structure'])) {
    $selected_structure = $_POST['selected_structure'];
    
    if (!empty($selected_structure)) {
        // Mise à jour de NomCreche et structure_enfant
        $stmt = $conn->prepare("UPDATE inscription_enfant SET NomCreche = ?, structure_enfant = ? WHERE id = ?");
        $stmt->bind_param("ssi", $selected_structure, $selected_structure, $inscription_id);
        $stmt->execute();
        $stmt->close();
    }
}

    // Redirection après mise à jour
    if (!isset($_POST['ajax'])) {
        // Redirection après mise à jour (POST non-AJAX)
        header("Location: " . $_SERVER['REQUEST_URI']);
        exit();
    } else {
        exit("OK");
    }
}

// Recherche et pagination
$itemsPerPage = 10;
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$offset = ($page - 1) * $itemsPerPage;

// Filtres
$nom = $_GET['nom'] ?? '';
$prenom = $_GET['prenom'] ?? '';
// Suppression du filtre par nom crèche
$statut = $_GET['statut'] ?? '';

// Récupérer les valeurs de l'ENUM 'statut'
$enum_values = [];
$enum_result = $conn->query("DESCRIBE inscription_enfant statut");
if ($enum_result) {
    $row = $enum_result->fetch_assoc();
    preg_match_all("/'([^']+)'/", $row['Type'], $matches);
    $enum_values = $matches[1];
}

// Construction de la requête SQL avec les filtres
$where = [];
$params = [];
$types = "";

if ($nom !== "") {
    $where[] = "nom_enfant LIKE ?";
    $params[] = "%$nom%";
    $types .= "s";
}
if ($prenom !== "") {
    $where[] = "prenom_enfant LIKE ?";
    $params[] = "%$prenom%";
    $types .= "s";
}
if ($statut !== "") {
    $where[] = "statut LIKE ?";
    $params[] = "%$statut%";
    $types .= "s";
}

$where_sql = $where ? "WHERE " . implode(" AND ", $where) : "";

$sql = "SELECT id AS inscription_id, nom_enfant, prenom_enfant, date_naissance_enfant, genre_enfant, NomCreche, structure1, adresse_parent1, email_parent1, statut 
        FROM inscription_enfant 
        $where_sql 
        LIMIT ? OFFSET ?";

$stmt = $conn->prepare($sql);
if ($types !== "") {
    $types .= "ii";
    $params[] = $itemsPerPage;
    $params[] = $offset;
    $stmt->bind_param($types, ...$params);
} else {
    $stmt->bind_param("ii", $itemsPerPage, $offset);
}
$stmt->execute();
$result = $stmt->get_result();

$count_sql = "SELECT COUNT(*) as total FROM inscription_enfant $where_sql";
$count_stmt = $conn->prepare($count_sql);
if ($types !== "ii" && $types !== "") {
    $types_count = substr($types, 0, -2); // Retirer les "ii" ajoutés pour LIMIT OFFSET
    $count_stmt->bind_param($types_count, ... array_slice($params, 0, -2));
}
$count_stmt->execute();
$count_result = $count_stmt->get_result();
$total_items = $count_result->fetch_assoc()['total'];
$total_pages = ceil($total_items / $itemsPerPage);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Demandes d'inscription - Recherche multiple</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: lightgoldenrodyellow;
            padding: 20px;
        }
        .header-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .btn-retour {
            background-color: #28a745;
            color: white;
            padding: 8px 15px;
            border-radius: 5px;
            text-decoration: none;
        }
        form.search-form {
            display: flex;
            gap: 10px;
            margin-top: 15px;
            flex-wrap: wrap;
        }
        form.search-form input, form.search-form select {
            padding: 6px;
            font-size: 16px;
        }
        form.search-form button {
            padding: 6px 10px;
            font-size: 16px;
            background-color: #007BFF;
            color: white;
            border: none;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: center;
        }
        th {
            background-color: #007BFF;
            color: white;
        }
        .btn {
            padding: 5px 10px;
            background-color: #007BFF;
            color: white;
            border: none;
            cursor: pointer;
        }
        .btn:hover {
            background-color: #0056b3;
        }
        .btn-delete {
            background-color: #dc3545;
        }
        .btn-delete:hover {
            background-color: #c82333;
        }
        .pagination {
            margin-top: 20px;
            text-align: center;
        }
        .pagination a {
            margin: 0 5px;
            padding: 8px 12px;
            background-color: #007BFF;
            color: white;
            text-decoration: none;
        }
        .pagination a.active {
    background-color: #0056b3;
    font-weight: bold;
}

    </style>
</head>
<body>

    <div class="container">
        <h1>Gestion des demandes d'inscription en cours</h1>

        <form method="GET" class="search-form">
            <input type="text" name="nom" placeholder="Nom" value="<?= htmlspecialchars($nom) ?>">
            <input type="text" name="prenom" placeholder="Prénom" value="<?= htmlspecialchars($prenom) ?>">

            <!-- Suppression du filtre par structure -->

            <!-- Filtre par statut avec les valeurs ENUM -->
            <select name="statut">
                <option value="">-- Tous les statuts --</option>
                <?php foreach ($enum_values as $value): ?>
                    <option value="<?= $value ?>" <?= ($statut == $value) ? 'selected' : '' ?>><?= ucfirst($value) ?></option>
                <?php endforeach; ?>
            </select>

            <button type="submit">Filtrer</button>
            <button type="submit">Liste des enfants pas creche</button>
          

        </form>

        <table>
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Date de naissance</th>
                    <th>Genre</th>
                    <th>Nom de la crèche</th>
                    <th>Adresse</th>
                    <th>Email</th>
                    <th>Statut</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="inscriptionsTable">
              <?php while ($row = $result->fetch_assoc()): ?>
                <tr id="row-<?= $row['inscription_id'] ?>">
                    <form method="POST" action="<?= $_SERVER['PHP_SELF'] ?>">
                        <input type="hidden" name="inscription_id" value="<?= $row['inscription_id'] ?>">
                        <td><?= htmlspecialchars($row['nom_enfant']) ?></td>
                        <td><?= htmlspecialchars($row['prenom_enfant']) ?></td>
                        <td><?= htmlspecialchars($row['date_naissance_enfant']) ?></td>
                        <td><?= htmlspecialchars($row['genre_enfant']) ?></td>
                        <td>
                            <?php 
                            // On vérifie si structure1 contient des données
                            if(!empty($row['structure1'])) {
                                // On extrait les crèches du champ structure1 (qui est un champ SET ou une liste)
                                $structure_choices = explode(',', $row['structure1']);
                                
                                // Si nous avons des choix
                                if(!empty($structure_choices)) {
                                    // On affiche une liste déroulante avec seulement les crèches sélectionnées
                                    ?>
                                    <select name="selected_structure">
                                        <option value="">-- Sélectionner une crèche --</option>
                                        <?php foreach($structure_choices as $creche): ?>
                                            <option value="<?= htmlspecialchars(trim($creche)) ?>" 
                                                    <?= ($row['NomCreche'] == trim($creche)) ? 'selected' : '' ?>>
                                                <?= htmlspecialchars(trim($creche)) ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                    <?php
                                } else {
                                    echo "Aucune crèche sélectionnée";
                                }
                            } else {
                                echo "Aucune structure disponible";
                            }
                            ?>
                        </td>
                        <td><?= htmlspecialchars($row['adresse_parent1']) ?></td>
                        <td><?= htmlspecialchars($row['email_parent1']) ?></td>
                        <td>
                            <select name="inscription" onchange="updateStatut(this, <?= $row['inscription_id'] ?>)">
                                <?php foreach ($enum_values as $value): ?>
                                    <option value="<?= $value ?>" <?= ($row['statut'] == $value) ? 'selected' : '' ?>>
                                        <?= ucfirst($value) ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </td>
                        <td>
                            <button type="submit" class="btn">Mettre à jour</button>
                            <button type="button" onclick="deleteInscription(<?= $row['inscription_id'] ?>, '<?= htmlspecialchars($row['prenom_enfant']) ?>', '<?= htmlspecialchars($row['nom_enfant']) ?>')" class="btn btn-delete">Supprimer</button>
                        </td>
                    </form>
                </tr>
              <?php endwhile; ?>
            </tbody>
        </table>

        <div class="pagination">
            <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                <a href="?page=<?= $i ?>&nom=<?= urlencode($nom) ?>&prenom=<?= urlencode($prenom) ?>&statut=<?= urlencode($statut) ?>"
                   class="<?= ($i == $page) ? 'active' : '' ?>">
                   <?= $i ?>
                </a>
            <?php endfor; ?>
        </div>
    </div>

    <script>
    // Fonction pour mettre à jour le statut
    function updateStatut(selectElement, inscriptionId) {
        const newStatut = selectElement.value;

        fetch('<?= $_SERVER['PHP_SELF'] ?>', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: `inscription=${encodeURIComponent(newStatut)}&inscription_id=${inscriptionId}&ajax=1`
        })
        .then(response => response.text())
        .then(data => {
            console.log("Statut mis à jour !");
        })
        .catch(error => {
            alert("Erreur lors de la mise à jour du statut");
            console.error(error);
        });
    }

    // Fonction pour supprimer l'inscription avec confirmation
    function deleteInscription(inscriptionId, prenom, nom) {
        if (confirm(`Confirmez-vous la suppression de l'inscription de ${prenom} ${nom} ?`)) {
            fetch('<?= $_SERVER['PHP_SELF'] ?>', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                body: `action=delete&inscription_id=${inscriptionId}`
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Supprimer la ligne du tableau sans recharger la page
                    document.getElementById(`row-${inscriptionId}`).remove();
                    console.log("Inscription supprimée avec succès !");
                } else {
                    alert("Erreur lors de la suppression : " + data.error);
                }
            })
            .catch(error => {
                alert("Erreur lors de la suppression");
                console.error(error);
            });
        }
    }
    </script>

</body>
</html>

