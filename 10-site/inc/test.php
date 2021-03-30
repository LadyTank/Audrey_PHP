<?php 
$pdoSITE = new PDO ('mysql:host=localhost;dbname=site', 'root', '',
    array(
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
        PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
    ));

$requete = $pdoSITE->query(" SELECT * FROM membre"); // preparer la requête
while($ligne = $requete->fetch(PDO::FETCH_ASSOC)) { // passe le resultat dans un tableau associatif
    echo "<p>#". $ligne['id_membre']."</p>";   
    echo "<p>". $ligne['pseudo']." ". $ligne['mdp']."</p>";   
    echo "<p>". $ligne['nom']." ". $ligne['prenom']."</p>";   
    echo "<p>". $ligne['email']."</p>";   
    echo "<p>". $ligne['civilite']."</p>";   
    echo "<p>". $ligne['adresse']."</p>";   
    echo "<p>". $ligne['code_postal']." ". $ligne['ville']."</p>";   
}

require_once 'functions.php'; // appeler mes fonctions prédéfinies en inc
jeprint_r($requete);


// ou
// $requete = $pdoSITE->query(" SELECT * FROM membre");
// $ligne = $requete->fetch(PDO::FETCH_ASSOC);
// echo $ligne['pseudo']; // POUR AFFICHER EN RESULTAT QUE LE PREMIER
?> 