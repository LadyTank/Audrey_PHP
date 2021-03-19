<?php
    require_once '../inc/functions.php';     

    if (!empty($_POST)) {
        echo '<p>Prénom : <strong>' .$_POST['prenom']. '</strong><br>';
        echo '<p>Nom : <strong>' .$_POST['nom']. '</strong><br>';
        echo '<p>Adresse Postale :' .$_POST['adresse']. '<p>'; 
        echo '<p>Code Postal :' .$_POST['codePostal']. '<p>';     
        echo '<p>Ville :' .$_POST['ville']. ' <p>';                       

    // on va écrire le contenu de la superglobale dans un fichier texte en l'absence de BDD

    $file = fopen('formulaire.txt', 'a'); // fopen() en mode "a" permet de créer un fichier s'il n'existe pas encore, sinon cela permet de l'ouvrir

    $donneeformulaire = $_POST['prenom']. " " .$_POST['nom']. " // " .$_POST['email']. " // " .$_POST['adresse']. " // " .$_POST['codePostal']. " // " .$_POST['ville']. "\n";

    // ecris dans le fichier .txt crée automatiquement par fopen()
    fwrite ($file, $donneeformulaire);

    } // fin de if empty
?>