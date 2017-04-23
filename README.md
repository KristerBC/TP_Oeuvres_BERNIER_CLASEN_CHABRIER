 d888b  d88888b .d8888. d888888b d888888b  .d88b.  d8b   db    .d88b.  d88888b db    db db    db d8888b. d88888b .d8888.   d888888b .d8888. d888888b .d888b.
88' Y8b 88'     88'  YP `~~88~~'   `88'   .8P  Y8. 888o  88   .8P  Y8. 88'     88    88 88    88 88  `8D 88'     88'  YP     `88'   88'  YP   `88'   VP  `8D
88      88ooooo `8bo.      88       88    88    88 88V8o 88   88    88 88ooooo 88    88 Y8    8P 88oobY' 88ooooo `8bo.        88    `8bo.      88       odD'
88  ooo 88~~~~~   `Y8b.    88       88    88    88 88 V8o88   88    88 88~~~~~ 88    88 `8b  d8' 88`8b   88~~~~~   `Y8b.      88      `Y8b.    88     .88'  
88. ~8~ 88.     db   8D    88      .88.   `8b  d8' 88  V888   `8b  d8' 88.     88b  d88  `8bd8'  88 `88. 88.     db   8D     .88.   db   8D   .88.   j88.   
 Y888P  Y88888P `8888Y'    YP    Y888888P  `Y88P'  VP   V8P    `Y88P'  Y88888P ~Y8888P'    YP    88   YD Y88888P `8888Y'   Y888888P `8888Y' Y888888P 888888D







Installation : 

Cloner le projet puis y ajouter le dossier Vendor de Laravel. 
Créer la base de données grâce au script .sql fournit.
Changer les paramètres de connexion à la base de données dans le fichier .env à la racine du projet. 




Fonctionnalités :

L'ensemble des points bonus ont été traités :

- Des messages d’erreurs explicites (à l'exception de la double réservation)

- Utilisation d’un calendrier supporté par tous les navigateurs pour sélectionner une date de réservation

- Dates de réservations affichées et saisies en français 

- Données saisies restent affichées même lorsque l’on a une erreur lors de la réservation d’une oeuvre ou de la saisie d’une nouvelle oeuvre 

- Une réservation peut être confirmée si elle est en attente

- Les demandes de réservation se font dans un Modal, afin de proposer une interface plus agréable à l’utilisateur. La demande de vérification est implicite.

- Lorsqu’il n’y a pas de réservation dans le tableau, il est affiché « Aucune donnée enregistrée »




Les fonctionnalités supplémentaires :

- Nous avons utilisé la template de back office Admin LTE qui utilise bootstrap, pour une interface plus agréable. 

- La confirmation de suppression, la modification et la réservation d’une oeuvre se font au travers de modal. Même chose pour confirmation de suppression de réservation. 

- L’affichage des oeuvres et des réservations se font dans un tableau, qui propose les fonctionnalités suivantes : 
	- recherche par mot-clé dynamique (sans rechargement de la page)
	- choix du nombre de lignes affichées par pages à l’aide d’un menu déroulant
	- Navigation entre les pages du tableau, sans rechargement de la page web 

- Affichage du nom et prénom et du statut de connexion (offline / online) de l’utilisateur

- le site est entièrement responsive (vue mobile et tablette)

- Menu latéral dynamique (possibilité de l’afficher ou de la masquer) (menu hamburger en vue mobile) 

