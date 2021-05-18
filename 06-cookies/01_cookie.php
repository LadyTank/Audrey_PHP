<?php require_once '../inc/functions.php'; ?>

<!-- Gestion des cookies -->
<?php
// 2eme étape (étape 1 plus bas dans le chapitre)
if (isset($_GET['langue'])) { // si une langue est passée dans l'url, l'internaute à cliqué sur un des liens, on enverra cette langue dans le cookie
    $langue = $_GET['langue'];
    // echo "Le site est en ";
    jeprintr($langue);
} elseif (isset($_COOKIE['langue'])) { // si il est déjà venu, on reçoit un cookie appelé "langue", alors la valeur langue du site aura la valeur du cookie
    $langue = $_COOKIE['langue'];
    // echo "Le site est en ";
    jeprintr($langue);
} else { // si l'internaute n'a pas choisi de langue, lors de sa premiere visite, on voit lui mettre "fr" par defaut
    $langue = "francais";
    // echo "Le site est en ";
    jeprintr($langue);
}

// 3eme étape, envoie du cookie avec l'information sur la langue

$expiration = time() + 365 * 24 * 60 * 60; // time() retourne l'heure courante (mesurée en secondes depuis le début de l'époque UNIX - 1970)

setcookie('langue', $langue, $expiration);  // fonction qui fabrique les cookies; avec l'information du tableau 'langue', la valeur de de la variable langue, puis la date d'expiration en variable

// il n'existe pas de fonction prédéfinie qui permette de supprimer un cookie, pour rendre un cookie invalide on utilise setcookie() avec le nom concerné et en mettant une date d'expiration à 0 ou antérieure à aujourd'hui

?>

<!doctype html>
<html lang="fr">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <!-- mes styles -->
    <link rel="stylesheet" href="../css/style.css">

    <title>06 - Cookie</title>
</head>

<body>
    <!-- navigation en include  -->
    <?php
    include '../inc/navbar.inc.php';
    ?>
    <!-- Début jumbotron -->
    <div class="jumbotron container">
        <h1 class="display-4">COURS PHP 7 - COOKIE</h1>
        <p class="lead">La super globale $_COOKIE : un cookie est un petit fichier de 4ko maxi déposé par le serveur web sur le poste de l'internaute et qui contient des informations.</p>
        <hr class="my-4">
    </div>
    <!--fin de jumbo-->

    <div class="container bg-light mb-5 p-5">
        <div class="row">
            <div class="col-sm-12 mb-2">
                <p>Les cookies sont automatiquement renvoyés au serveur web par le navigateur. Lorsque l'internaute navigue dans les pages concernées par le ou les cookies PHP permet de récupérer très facilement les données contenues dans un cookie; car les informations sont stockées dans une superglobale <code>$_COOKIE</code></p>

                <p class="alert alert-danger">Un cookie étant sauvegardé sur le poste de l'internaute, il peut être modifié, détourné ou volé !!! Donc on n'y met aucune information sensible : ref. bancaire, numéro de sécu, mdp, ni même un panier d'achat.</p>
            </div>

            <div class="col-sm-12 text-center p-4">
                <h2 class="mb-4">Choisir la langue :</h2>
                <!-- etape 1 / on envoie la langue choisie par l'url; la velur "fr", par ex, est récupérée dans la superglobale $_GET -->
                <a href="?langue=francais" class="p-5 mr-5 btn btn-danger" role="button">Français</a>
                <a href="?langue=espagnol" class="p-5 mr-5 btn btn-info " role="button">Espagnol</a>
                <a href="?langue=italien" class="p-5 mr-5 btn btn-primary " role="button">Italien</a>
                <a href="?langue=russe" class="p-5 mr-5 btn btn-secondary" role="button">Russe</a>
            </div>

            <?php

            echo "<h3 class=\"m-auto\">Le site est en ... " . $langue . ". </h3>";
            echo "<p class=\" m-auto p-4\">" . time() . " la date du jour, ou le timestamp, exprimée en secondes depuis le 1er janvier 1970.</p>"

            ?>


        </div>
        <!--fin de row-->
        <div class="row">
            <div class="col-sm-12">


            </div>
        </div>

    </div>





    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
        -->

    <!-- footer en include -->
    <?php include '../inc/footer.inc.php'; ?>
</body>

</html>