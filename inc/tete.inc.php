<!DOCTYPE html>
<?php
    $variable1 = "La page faite avec des fichiers en inc.";
?>

<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    echo "<title>Page faite avec des fichiers inc</title>"
    ?>
</head>
<body>
     <!-- **-->
     <!-- Donne le nom et le chemin par rapport au fichier racine: $_SERVER -->
     <!-- **-->

    <?php
        #******************************************************
        #autre moyen de commenter dans les balises php
        #********************************************************
        echo "<div><h1 style=\"border-width:5;border-style:double;backgroundcolored:red;\">Bienvenue sur $variable1 </h1>";
        /*ceci est un commentaire 
        sur plusieurs lignes 
        en php*/
        echo "<p>Une fonction qui donne le nom du fichier exécuté : ". $_SERVER['PHP_SELF']."</p></div>"; // si on le souhaite, il n'est pas utile de fermer le passage php car il se poursuit dans le fichiers qui vient après
    ?>