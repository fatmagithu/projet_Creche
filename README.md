
# projet_Creche
Résumé du projet : Génération et gestion des codes d'accès
Étapes réalisées avec succès
Configuration de l'environnement

Installation de Node.js et initialisation du projet.

Création d'un fichier principal regroupant le backend et le frontend (tout dans un fichier pour simplification).

Développement Frontend

Création d'une interface utilisateur simple en HTML intégrée directement dans le backend.

Génération de code d'accès : Bouton permettant de générer un code aléatoire.

Envoi du code : Formulaire permettant de saisir l'adresse e-mail de l'administrateur pour recevoir le code.

Configuration de compte : Formulaire pour entrer le code, le nom d'utilisateur et le mot de passe.

Développement Backend avec Express

Ajout d'un endpoint pour générer un code d'accès unique et temporaire.

Mise en place d'un système de stockage temporaire pour les codes avec expiration.

Intégration d'un endpoint pour envoyer les codes d'accès par e-mail.

Création d'un endpoint pour valider le code et configurer le compte administrateur.

Configuration et intégration de Nodemailer

Utilisation de Nodemailer pour envoyer des e-mails via le service SMTP de La Poste.

Correction et validation des paramètres SMTP pour garantir le succès de l'envoi.

Gestion des erreurs et des logs

Ajout de vérifications pour les entrées utilisateur (comme la validité des e-mails).

Gestion des exceptions pour l'envoi d'e-mails et le stockage des codes.

Ajout de journaux dans le terminal pour suivre les données et les erreurs.

Tests et validation

Test de la génération et de l'envoi des codes d'accès.

Validation de la configuration des comptes administrateurs après saisie du code.

Déploiement local et vérification du bon fonctionnement du serveur.

Structure simplifiée

Regroupement de tout le code (frontend et backend) dans un seul fichier pour une gestion plus facile.

                       ****** Exécuter le projet *****
Installer les dépendances nécessaires :                       
npm install express nodemailer

Démarrer le serveur :
node <nom-du-fichier>.js

Accéder à l'application : Ouvre un navigateur et va à l'adresse suivante :
http://localhost:3000

***** Tester les fonctionnalités : ******

Générer un code d'accès.

Envoyer le code à un e-mail valide.

Configurer un compte administrateur.

Validation du code de configuration
L'administrateur doit saisir le code d'accès temporaire reçu par e-mail dans un formulaire de configuration.

Le système vérifie si le code saisi est :

Valide (présent dans le stockage temporaire des codes).

Non expiré (vérifie la date d'expiration associée au code).

Si le code est valide, le système autorise l'administrateur à passer à l'étape suivante.


Base de données : Structure SQL
Création des tables SQL

CREATE DATABASE admin_db;

USE admin_db;

-- Table pour les administrateurs
CREATE TABLE admins (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

Assure-toi que ta table temporary_codes a la bonne structure pour stocker les codes et leurs informations associées.

CREATE TABLE temporary_codes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(100) NOT NULL,
    code VARCHAR(50) NOT NULL UNIQUE,
    expiration DATETIME NOT NULL
);


Résumé des étapes
Formulaire HTML :

L'utilisateur saisit son nom, son e-mail, ses mots de passe (avec confirmation), et le code reçu par e-mail.

Validation PHP :

Le script vérifie que le code et l'adresse e-mail correspondent au dernier enregistrement dans la table temporary_codes.

Insertion dans la table admins :

Si les informations sont valides, elles sont enregistrées dans la table admins.

Le code utilisé est supprimé de la table temporary_codes.

Redirection vers PcrecheADMIN.php :

Une fois le compte créé, l'administrateur est redirigé vers la page d'administration.




=======
# projet-creche

