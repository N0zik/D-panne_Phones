# D'panne Phones 


1. **Contexte et Objectifs**
    
    D’pannes Phones souhaites mettre en place une application permettant aux clients d’avoir une vue sur la boutique D’panne Phones et ses services.
    
    Ils est demandé par D’panne Phones :
    
    - un services de ventes de téléphones mobiles et d’ordinateur reconditionné ou d’occasion.
    - un catalogue de toutes les réparations disponibles sur chaque téléphones.
    - un espaces utilisateur pour permettre l’achat des téléphones, ordinateur et accessoires
    - un espace administrateur pour administrer l’ensemble de l’application (ajouts de produits, ajouts de téléphones et réparations dans le catalogue, modification et visu sur l’ensemble des utilisateurs)
    - présentation de l’équipe D’panne Phones, sa structure, ses compétences et ses services


Etapes pour restaurer le projet D'panne Phones :

1 - Télécharger le projet : git clone https://github.com/N0zik/D-panne_Phones.git

2 - Installer Composer : composer install ou composer i

3 - Télécharger la BDD symfony-books.sql : https://github.com/N0zik/symfony-books/blob/master/D-panne_Phones.sql

4 - Créer la BDD d_panne_phones dans PhpMyAdmin : Choisir l'interclassement utf8mb4_general_ci

5 - Restaurer la base BDD dans PhpMyAdmin : Cliquer sur importer puis sélectionner le fichier symfony-books.sql

6 - Lancer le serveur : symfony serve

7 - Accéder au site depuis le navigateur : http://localhost:8000/

