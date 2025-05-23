<?php
try {
    $pdo = new PDO('mysql:host=localhost;dbname=groupe_bulles_deveil;charset=utf8', 'root', 'root');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $id = isset($_GET['id']) ? intval($_GET['id']) : 0;

    $stmt = $pdo->prepare("SELECT * FROM inscription_enfant WHERE id = ?");
    $stmt->execute([$id]);
    $enfant = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$enfant) {
        die("Aucun enfant trouvé.");
    }

    $stmt_med = $pdo->prepare("SELECT * FROM medical_enfant WHERE id_enfant = ?");
    $stmt_med->execute([$id]);
    $medical = $stmt_med->fetch(PDO::FETCH_ASSOC);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['champ']) && isset($_POST['valeur'])) {
            $champ = $_POST['champ'];
            $valeur = $_POST['valeur'];

            // Sécurité : liste blanche des champs autorisés
            $champs_autorises = [
                'prenom_enfant', 'nom_enfant', 'date_naissance_enfant', 'lieu_naissance_enfant', 'genre_enfant', 'date_enregistrement',
                'structure_enfant', 'structure', 'type_parent1', 'prenom_parent1', 'nom_parent1', 'email_parent1', 'tel_fixe_parent1', 'tel_portable_parent1',
                'adresse_parent1', 'code_postal_parent1', 'ville_parent1', 'pays_parent1', 'revenu_annuel_parent1', 'profession_parent1', 'entreprise_parent1',
                'contrat_entreprise_parent1', 'allocataire_parent1', 'enfants_charge_parent1', 'enfants_handicap_parent1',
                'type_parent2', 'prenom_parent2', 'nom_parent2', 'email_parent2', 'tel_fixe_parent2', 'tel_portable_parent2',
                'adresse_parent2', 'code_postal_parent2', 'ville_parent2', 'pays_parent2', 'revenu_annuel_parent2', 'profession_parent2', 'entreprise_parent2',
                'contrat_entreprise_parent2', 'allocataire_parent2', 'enfants_charge_parent2', 'enfants_handicap_parent2',
                'infos_complementaires', 'Statut'
            ];

            if (!in_array($champ, $champs_autorises)) {
                throw new Exception("Champ non autorisé.");
            }

            if ($champ === 'genre_enfant' && !in_array($valeur, ['F', 'M'])) {
                throw new Exception("Genre invalide : valeur autorisée uniquement 'F' ou 'M'");
            }

            if (in_array($champ, ['date_enregistrement', 'date_naissance_enfant']) && empty($valeur)) {
                $valeur = null;
            }

            if ($champ === 'Statut' && empty($valeur)) {
                throw new Exception("Le champ 'Statut' est requis et ne peut pas être vide.");
            }

            $stmt_update = $pdo->prepare("UPDATE inscription_enfant SET $champ = :valeur WHERE id = :id");
            $stmt_update->bindValue(':valeur', $valeur);
            $stmt_update->bindValue(':id', $id);
            $stmt_update->execute();

            echo json_encode(["success" => true, "champ" => $champ, "valeur" => $valeur]);
            exit;
        }

        if (isset($_FILES['photo']) && $_FILES['photo']['error'] === 0) {
            $uploadDir = 'uploads/';
            if (!file_exists($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }
            $ext = pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);
            $fileName = 'enfant_' . $id . '.' . $ext;
            $filePath = $uploadDir . $fileName;

            if (move_uploaded_file($_FILES['photo']['tmp_name'], $filePath)) {
                $stmt_update_photo = $pdo->prepare("UPDATE inscription_enfant SET photo_enfant = ? WHERE id = ?");
                $stmt_update_photo->execute([$filePath, $id]);
                $enfant['photo_enfant'] = $filePath;
            }
        }
    }
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
} catch (Exception $e) {
    die("Erreur : " . $e->getMessage());
}
?>




<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Fiche Enfant - BabyFarm</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Playwrite+GB+S&family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
  <style>
    :root {
      --beige: #fdf9f3;
      --beige-light: #fffdf8;
      --brown: #b38760;
      --brown-dark: #9e6d4b;
    }
    body {
      margin: 0;
      background: linear-gradient(135deg, var(--beige-light), var(--beige));
      font-family: 'Inter', sans-serif;
      display: flex;
      align-items: center;
      justify-content: center;
      min-height: 100vh;
      padding: 40px;
    }
    .container-fiche {
      width: 100%;
      max-width: 1100px;
      background: #fff;
      border-radius: 24px;
      box-shadow: 0 10px 30px rgba(0,0,0,0.08);
      padding: 50px;
      animation: fadeIn 0.7s ease-in-out;
    }
    .enfant-header {
      display: flex;
      align-items: center;
      gap: 30px;
      margin-bottom: 30px;
    }
    .enfant-photo {
      width: 120px;
      height: 120px;
      object-fit: cover;
      border-radius: 50%;
      border: 4px solid var(--brown);
    }
    .enfant-name {
      font-family: 'Playwrite GB S', cursive;
      font-size: 36px;
      font-weight: 800;
      color: var(--brown);
    }
    .photo-wrapper {
      position: relative;
    }
    .photo-wrapper:hover label {
      display: flex;
    }
    label[for='photoUpload'] {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0,0,0,0.4);
      border-radius: 50%;
      color: white;
      font-size: 14px;
      justify-content: center;
      align-items: center;
      display: none;
      cursor: pointer;
    }
    #photoUpload {
      display: none;
    }
    .section-title {
      font-weight: 700;
      color: var(--brown);
      font-size: 22px;
      margin-top: 30px;
      border-bottom: 2px solid #e7dcd1;
      padding-bottom: 6px;
    }
    .info-block {
      margin-top: 15px;
      font-size: 16px;
    }
    .info-block input, .info-block textarea {
      width: 100%;
      padding: 6px 10px;
      border: 1px solid #ccc;
      border-radius: 8px;
      font-size: 16px;
    }
    .btn-save {
      background: var(--brown);
      color: white;
      border: none;
      padding: 10px 24px;
      border-radius: 24px;
      font-weight: bold;
      margin-top: 30px;
    }
    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(30px); }
      to { opacity: 1; transform: translateY(0); }
    }
    .btn-retour {
  display: inline-block;
  background-color: #b38760; /* Marron BabyFarm */
  color: white;
  padding: 10px 20px;
  border-radius: 30px;
  font-weight: 600;
  text-decoration: none;
  transition: background-color 0.3s ease;
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
  font-size: 16px;
}

.btn-retour:hover {
  background-color: #9e6d4b; /* Marron foncé au survol */
  color: #fff;
}

  </style>
</head>
<body>

<form method="POST" enctype="multipart/form-data" class="container-fiche">
<a href="javascript:history.back()" class="btn-retour">← Retour</a>

    <div class="section-title">🧒 Informations enfant</div>
    <div class="enfant-header">
      <div class="photo-wrapper">
        <img src="<?= htmlspecialchars($enfant['photo_enfant'] ?: 'moussa8.png') ?>" alt="Photo enfant" class="enfant-photo">
        <label for="photoUpload">📸 Changer</label>
        <input type="file" id="photoUpload" name="photo" accept="image/*" onchange="this.form.submit()">
      </div>
      <div style="flex: 1;">
        <div class="info-block">
          Prénom : <input type="text" name="prenom_enfant" value="<?= htmlspecialchars($enfant['prenom_enfant'] ?? '') ?>" data-champ="prenom_enfant">
        </div>
        <div class="info-block">
          Nom : <input type="text" name="nom_enfant" value="<?= htmlspecialchars($enfant['nom_enfant'] ?? '') ?>" data-champ="nom_enfant">
        </div>
        <div class="info-block">
          Date de naissance : <input type="date" name="date_naissance_enfant" value="<?= htmlspecialchars($enfant['date_naissance_enfant'] ?? '') ?>" data-champ="date_naissance_enfant">
        </div>
        <div class="info-block">
          Lieu de naissance : <input type="text" name="lieu_naissance_enfant" value="<?= htmlspecialchars($enfant['lieu_naissance_enfant'] ?? '') ?>" data-champ="lieu_naissance_enfant">
        </div>
        <div class="info-block">
          Genre : <input type="text" name="genre_enfant" value="<?= htmlspecialchars($enfant['genre_enfant'] ?? '') ?>" data-champ="genre_enfant">
        </div>
        <div class="info-block">
          Date d’enregistrement : <input type="date" name="date_enregistrement" value="<?= htmlspecialchars($enfant['date_enregistrement'] ?? '') ?>" data-champ="date_enregistrement">
        </div>
        <div class="info-block">
          Structure : <input type="text" name="structure" value="<?= htmlspecialchars($enfant['structure'] ?? '') ?>" data-champ="structure">
        </div>
      </div>
    </div>

    <div class="section-title">👨‍👩‍👧 Parent 1</div>
    <div class="row">
      <div class="col-md-6 info-block">Type : <input type="text" name="type_parent1" value="<?= htmlspecialchars($enfant['type_parent1'] ?? '') ?>" data-champ="type_parent1"></div>
      <div class="col-md-6 info-block">Prénom : <input type="text" name="prenom_parent1" value="<?= htmlspecialchars($enfant['prenom_parent1'] ?? '') ?>" data-champ="prenom_parent1"></div>
      <div class="col-md-6 info-block">Nom : <input type="text" name="nom_parent1" value="<?= htmlspecialchars($enfant['nom_parent1'] ?? '') ?>" data-champ="nom_parent1"></div>
      <div class="col-md-6 info-block">Email : <input type="email" name="email_parent1" value="<?= htmlspecialchars($enfant['email_parent1'] ?? '') ?>" data-champ="email_parent1"></div>
      <div class="col-md-6 info-block">Téléphone fixe : <input type="text" name="tel_fixe_parent1" value="<?= htmlspecialchars($enfant['tel_fixe_parent1'] ?? '') ?>" data-champ="tel_fixe_parent1"></div>
      <div class="col-md-6 info-block">Téléphone portable : <input type="text" name="tel_portable_parent1" value="<?= htmlspecialchars($enfant['tel_portable_parent1'] ?? '') ?>" data-champ="tel_portable_parent1"></div>
    </div>

    <div class="section-title">👨‍👩‍👧 Parent 2</div>
    <div class="row">
      <div class="col-md-6 info-block">Type : <input type="text" name="type_parent2" value="<?= htmlspecialchars($enfant['type_parent2'] ?? '') ?>" data-champ="type_parent2"></div>
      <div class="col-md-6 info-block">Prénom : <input type="text" name="prenom_parent2" value="<?= htmlspecialchars($enfant['prenom_parent2'] ?? '') ?>" data-champ="prenom_parent2"></div>
      <div class="col-md-6 info-block">Nom : <input type="text" name="nom_parent2" value="<?= htmlspecialchars($enfant['nom_parent2'] ?? '') ?>" data-champ="nom_parent2"></div>
      <div class="col-md-6 info-block">Email : <input type="email" name="email_parent2" value="<?= htmlspecialchars($enfant['email_parent2'] ?? '') ?>" data-champ="email_parent2"></div>
      <div class="col-md-6 info-block">Téléphone fixe : <input type="text" name="tel_fixe_parent2" value="<?= htmlspecialchars($enfant['tel_fixe_parent2'] ?? '') ?>" data-champ="tel_fixe_parent2"></div>
      <div class="col-md-6 info-block">Téléphone portable : <input type="text" name="tel_portable_parent2" value="<?= htmlspecialchars($enfant['tel_portable_parent2'] ?? '') ?>" data-champ="tel_portable_parent2"></div>
    </div>

    <div class="section-title">📝 Informations complémentaires</div>
    <div class="info-block">
      <textarea name="infos_complementaires" rows="4" data-champ="infos_complementaires"><?= htmlspecialchars($enfant['infos_complementaires'] ?? '') ?></textarea>
    </div>
  </form>
  
</body>
<script>
document.querySelectorAll('[data-champ]').forEach(input => {
    input.addEventListener('change', () => {
        const champ = input.dataset.champ;
        const valeur = input.value;

        fetch(window.location.href, {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: `champ=${encodeURIComponent(champ)}&valeur=${encodeURIComponent(valeur)}`
        })
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                console.log(`✅ ${champ} mis à jour avec succès`);
            } else {
                console.error('❌ Erreur de mise à jour');
            }
        })
        .catch(err => {
            console.error("Erreur réseau :", err);
        });
    });
});
</script>

</html>
