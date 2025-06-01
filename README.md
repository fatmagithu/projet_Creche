# projet-creche#   : 


Ce projet vise à gérer une crèche de manière efficace en automatisant diverses tâches administratives et opérationnelles.
Il permet de suivre les informations des enfants, gérer les paiements, organiser les plannings et faciliter la communication entre les parents et l'administration.
 
 Fusion des modifications de la branche dev depuis le dépôt distant pour mise à jour locale.
Intégration des derniers commits et synchronisation avec les travaux des collègues.

Gestion de Codes Temporaires pour Administrateurs
Ce projet permet la génération et l'envoi sécurisé de codes temporaires à des administrateurs pour l’activation de leur espace. Il repose sur PHP et PHPMailer pour l'envoi des emails, ainsi que MySQL pour le stockage des codes.

Fonctionnalités principales :
Génération de codes uniques avec expiration automatique (30 minutes).

Enregistrement sécurisé en base de données pour éviter les doublons.
Envoi d'email automatisé avec un message formaté et un lien d'activation.

Protection contre les envois répétés via gestion de session.

Structure du projet :
generate_code.php : Génère un code et l’enregistre en base.

send_code.php : Envoie le code temporaire à l’admin via email.

config.php : Paramètres de connexion SMTP et base de données.

db.php : Gestion des interactions avec la base MySQL.




Le dossier vendor était suivi par Git alors qu'il ne devait pas l'être. Pour corriger cela, un fichier .
gitignore a été créé et configuré pour ignorer vendor, puis le dossier a été retiré du suivi Git avant de pousser les modifications sur GitHub.

🔹 Gestion du dossier vendor dans Git
Ce guide explique les étapes essentielles pour assurer que le dossier vendor est bien ignoré et ne soit pas suivi par Git.

1️⃣ Vérification de l'existence du dossier vendor
Avant de procéder, il est recommandé de s’assurer que le dossier vendor existe dans le projet :
dir 1GenererMdpAdminVersion11/vendor    // Si le dossier est absent, aucune action supplémentaire n'est nécessaire.

2️⃣ Vérification du suivi Git
Pour voir si Git suit vendor, exécuter :
git ls-files | Select-String "vendor"

Si aucun résultat n'apparaît, cela signifie que Git ne suit pas ce dossier.

3️⃣ Vérification de .gitignore
S'assurer que Git ignore vendor en vérifiant la présence de .gitignore :

Get-Content .gitignore | Select-String "vendor"     // Si le fichier .gitignore est absent, il est nécessaire de le créer.
4️⃣ Création et configuration de .gitignore
Ajouter vendor/ au fichier .gitignore pour éviter qu’il soit suivi :

New-Item .gitignore -Type File
New-Item .gitignore -Type File
Add-Content .gitignore "1GenererMdpAdminVersion11/vendor"
git add .gitignore
git commit -m "Ajout de .gitignore pour ignorer vendor"
5️⃣ Suppression de vendor du suivi Git
Si vendor est déjà suivi, le supprimer du cache Git sans toucher aux fichiers locaux :

powershell
git rm -r --cached 1GenererMdpAdminVersion11/vendor
git commit -m "Suppression de vendor du suivi Git"
6️⃣ Vérification finale du statut
S'assurer que vendor est bien ignoré et que le dépôt est propre :

5️⃣ Suppression de vendor du suivi Git
Si vendor est déjà suivi, le supprimer du cache Git sans toucher aux fichiers locaux :

powershell
git rm -r --cached 1GenererMdpAdminVersion11/vendor
git commit -m "Suppression de vendor du suivi Git"
6️⃣ Vérification finale du statut
S'assurer que vendor est bien ignoré et que le dépôt est propre :powershell
git status
7️⃣ Pousser les modifications vers GitHub
Une fois les changements validés, synchroniser le dépôt distant :

powershell
git push origin dev
✅ Résultat final
✔️ Le dossier vendor est maintenant ignoré par Git et ne sera plus suivi. ✔️ .gitignore est correctement configuré pour empêcher vendor d’être réintégré. ✔️ Le dépôt Git est propre et synchronisé avec GitHub.


Bilan du projet Multi-Crèches:
✅ Points clés du développement
Interface utilisateur raffinée 🎨

Design épuré et moderne basé sur Bootstrap et Google Fonts.

Utilisation de couleurs douces et harmonieuses pour une navigation agréable.

Effets visuels bien intégrés : backdrop-filter, blur-circle et overlays pour une meilleure expérience utilisateur.

Fonctionnalités d’inscription et de gestion 🏗️

Formulaires sécurisés pour la création de compte (nom, email, mot de passe, rôle).

Vérification et validation des données avant l’enregistrement.

Accès différencié pour administrateurs, auxiliaires et parents.

Tableau de bord administrateur 📊

Interface bien pensée pour gérer les dossiers, les équipes, et les enfants.

Liens vers diverses sections (enfants, messages, planning, facturation, alertes).

Présence d’une barre latérale interactive et une gestion dynamique des notifications.

Gestion des alertes et suivi administratif 🚨

Système de filtrage et recherche des alertes (ordonnance expirée, paiement manquant, retard).

Affichage optimisé pour la clarté et la lisibilité.

Intégration de badges de notification pour suivre les urgences.

🔧 Axes d’amélioration
Sécurité et robustesse 🔒

Revoir la gestion des mots de passe (hashing & salt).

Vérification anti-CSRF et protection contre les attaques XSS.

Optimisation des performances 🚀

Charger les images de manière optimisée (lazy loading).

Réduire la taille des fichiers CSS/JS (minification).

Ajout de fonctionnalités avancées 🏗️

Système de notifications en temps réel.

Tableau de bord analytique pour suivre les inscriptions et paiements.














