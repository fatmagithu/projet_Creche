<?php
// Vérifie que les champs sont remplis
if (isset($_POST['nom_parent1'], $_POST['telephone1'])) {
    $nom_parent1 = $_POST['nom_parent1'];
    $telephone1 = $_POST['telephone1'];

    if (!empty($nom_parent1) && !empty($telephone1)) {
        try {
            $pdo = new PDO('mysql:host=localhost;dbname=ta_base_de_donnees', 'root', 'ton_mot_de_passe');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Insertion des données dans la table
            $sql = "INSERT INTO babies (nom_parent1, telephone1) VALUES (:nom_parent1, :telephone1)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':nom_parent1', $nom_parent1);
            $stmt->bindParam(':telephone1', $telephone1);
            $stmt->execute();

            echo "Inscription réussie !";
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
    } else {
        echo "Veuillez remplir tous les champs.";
    }
} else {
    echo "Veuillez remplir tous les champs.";
}
?>
