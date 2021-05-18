<?php 
try {
    $options=
    [
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
    PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
    ];

    $pdoDIA = new PDO($db_heb, $db_user, $db_pass, $options); //les variables appelée d'un fichier inc db_config.php avec les informations complètes, (info hebergeur, info connexion utilisateur, info mdp, optionnellement info d'autres variables comme $options dans ce cas)
    
    }
catch (PDOException $pe){
    echo "Erreur" .$pe->getMessage(); //avoir le detail du problème de connexion à la BDD à l'ecran
    }
