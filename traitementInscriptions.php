<?php
try {
    $pdo = new PDO('mysql:host=localhost;dbname=groupe_bulles_deveil;charset=utf8', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    function getPost($key, $default = '') {
        return isset($_POST[$key]) ? trim($_POST[$key]) : $default;
    }

  
// Récupération des structures sélectionnées (format SET : chaîne séparée par des virgules)
$structure_set = isset($_POST['structure']) ? implode(',', $_POST['structure']) : '';


    $planning_json = isset($_POST['planning']) ? json_encode($_POST['planning']) : null;

    $stmt = $pdo->prepare("INSERT INTO inscription_enfant (
        prenom_enfant, nom_enfant, date_naissance_enfant, lieu_naissance_enfant, genre_enfant,
        structure,
        debut_contrat, fin_contrat, planning_flexible, planning,
        type_parent1, prenom_parent1, nom_parent1, email_parent1, allocataire_parent1, tel_fixe_parent1,
        tel_portable_parent1, adresse_parent1, code_postal_parent1, ville_parent1, pays_parent1,
        revenu_annuel_parent1, profession_parent1, entreprise_parent1, contrat_entreprise_parent1,
        enfants_charge_parent1, enfants_handicap_parent1,
        type_parent2, prenom_parent2, nom_parent2, email_parent2, allocataire_parent2, tel_fixe_parent2,
        tel_portable_parent2, adresse_parent2, code_postal_parent2, ville_parent2, pays_parent2,
        revenu_annuel_parent2, profession_parent2, entreprise_parent2, contrat_entreprise_parent2,
        enfants_charge_parent2, enfants_handicap_parent2,
        infos_complementaires
    ) VALUES (
        :prenom_enfant, :nom_enfant, :date_naissance_enfant, :lieu_naissance_enfant, :genre_enfant,
        :structure,
        :debut_contrat, :fin_contrat, :planning_flexible, :planning,
        :type_parent1, :prenom_parent1, :nom_parent1, :email_parent1, :allocataire_parent1, :tel_fixe_parent1,
        :tel_portable_parent1, :adresse_parent1, :code_postal_parent1, :ville_parent1, :pays_parent1,
        :revenu_annuel_parent1, :profession_parent1, :entreprise_parent1, :contrat_entreprise_parent1,
        :enfants_charge_parent1, :enfants_handicap_parent1,
        :type_parent2, :prenom_parent2, :nom_parent2, :email_parent2, :allocataire_parent2, :tel_fixe_parent2,
        :tel_portable_parent2, :adresse_parent2, :code_postal_parent2, :ville_parent2, :pays_parent2,
        :revenu_annuel_parent2, :profession_parent2, :entreprise_parent2, :contrat_entreprise_parent2,
        :enfants_charge_parent2, :enfants_handicap_parent2,
        :infos_complementaires
    )");

    $stmt->execute([
        ':prenom_enfant' => getPost('prenom_enfant'),
        ':nom_enfant' => getPost('nom_enfant'),
        ':date_naissance_enfant' => getPost('date_naissance_enfant'),
        ':lieu_naissance_enfant' => getPost('lieu_naissance_enfant'),
        ':genre_enfant' => getPost('genre_enfant'),
        ':structure' => $structure_set,
        ':debut_contrat' => getPost('debut_contrat'),
        ':fin_contrat' => getPost('fin_contrat'),
        ':planning_flexible' => getPost('planning_flexible'),
        ':planning' => $planning_json,
        ':type_parent1' => getPost('type_parent1'),
        ':prenom_parent1' => getPost('prenom_parent1'),
        ':nom_parent1' => getPost('nom_parent1'),
        ':email_parent1' => getPost('email_parent1'),
        ':allocataire_parent1' => getPost('allocataire_parent1'),
        ':tel_fixe_parent1' => getPost('tel_fixe_parent1'),
        ':tel_portable_parent1' => getPost('tel_portable_parent1'),
        ':adresse_parent1' => getPost('adresse_parent1'),
        ':code_postal_parent1' => getPost('code_postal_parent1'),
        ':ville_parent1' => getPost('ville_parent1'),
        ':pays_parent1' => getPost('pays_parent1'),
        ':revenu_annuel_parent1' => getPost('revenu_annuel_parent1'),
        ':profession_parent1' => getPost('profession_parent1'),
        ':entreprise_parent1' => getPost('entreprise_parent1'),
        ':contrat_entreprise_parent1' => getPost('contrat_entreprise_parent1'),
        ':enfants_charge_parent1' => getPost('enfants_charge_parent1'),
        ':enfants_handicap_parent1' => getPost('enfants_handicap_parent1'),
        ':type_parent2' => getPost('type_parent2'),
        ':prenom_parent2' => getPost('prenom_parent2'),
        ':nom_parent2' => getPost('nom_parent2'),
        ':email_parent2' => getPost('email_parent2'),
        ':allocataire_parent2' => getPost('allocataire_parent2'),
        ':tel_fixe_parent2' => getPost('tel_fixe_parent2'),
        ':tel_portable_parent2' => getPost('tel_portable_parent2'),
        ':adresse_parent2' => getPost('adresse_parent2'),
        ':code_postal_parent2' => getPost('code_postal_parent2'),
        ':ville_parent2' => getPost('ville_parent2'),
        ':pays_parent2' => getPost('pays_parent2'),
        ':revenu_annuel_parent2' => getPost('revenu_annuel_parent2'),
        ':profession_parent2' => getPost('profession_parent2'),
        ':entreprise_parent2' => getPost('entreprise_parent2'),
        ':contrat_entreprise_parent2' => getPost('contrat_entreprise_parent2'),
        ':enfants_charge_parent2' => getPost('enfants_charge_parent2'),
        ':enfants_handicap_parent2' => getPost('enfants_handicap_parent2'),
        ':infos_complementaires' => getPost('infos_complementaires')
    ]);

    header("Location: confirmation_inscription.php");
    exit();

} catch (PDOException $e) {
    echo "<div style='padding:20px; background:#ffe3e3; color:#a00; border:1px solid #faa;'>
            <strong>Erreur :</strong> " . $e->getMessage() .
         "</div>";
}
?>
