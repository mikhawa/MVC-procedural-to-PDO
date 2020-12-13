# MVC-procedural-to-PDO

## Exercices
Tranformez toutes les requêtes mysqli en PDO:
1) Utilisez de requêtes préparées dès qu'il y a des données utilisateurs.
2) Utilisez des Transactions si plusieurs requêtes successives doivent être réussies pour le bon fonctionnement de site

## Principe MVC
Le MVC choisi pour cet exemple est structuré tel que sur cette image:

![MVC](https://github.com/mikhawa/MVC-procedural-with-upload/raw/main/datas/MVC.png "MVC")

Les fonctions non liées à la base de données sont également créées dans les modèles.



## Pour commencer
- Installez la DB : datas/structure-donnees-mvc_proc_upload.sql (désactivez les clefs étrangères à l'importation)
- Renommez en local le fichier config.php.local en config.php

## Contrôleur frontal
Pour lancer le projet, vous devez impérativement partir du dossier public et utiliser le contrôleur frontal "index.php" :
    
    /public/index.php
    
## Connexion en tant qu'administrateur:
#### En construction - V1.0 fonctionnelle !
    Login : myNameIsAdmin
    PWD : myNameIsAdmin
    
## Connexion en tant que rédacteur/éditeur:
#### A construire !
    Login : myNameIsEditor
    PWD : myNameIsEditor
    
## Connexion en tant que modérateur:
#### A construire !
    Login : myNameIsModerator
    PWD : myNameIsModerator    