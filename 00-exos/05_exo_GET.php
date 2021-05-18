<?php require_once '../inc/functions.php'; ?>
<?php require_once '../inc/db_config.php'; ?>
<?php require_once '../inc/db_connexion.php'; ?>

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

    <title>05 - exo GET</title>
</head>

<body>
    <!-- navigation en include  -->
    <?php
    include '../inc/navbar.inc.php';
    ?>
    <!-- Début jumbotron -->
    <div class="jumbotron container">
        <h1 class="display-4">05 - exo GET</h1>
        <hr class="my-4">
    </div>
    <!--fin de jumbo-->

    <!-- Mini EXO -->
    <!-- ********************************-->
    <!-- 1 - afficher dans cette page un titre "Mon compte : un nom et un prénom" -->
    <!-- 2 - vous y ajouter un lien "modifier mon compte" : Ce lien renvoie dans l'url à la même page, donc à cette page, l'action demandé est "modification", quand on clique sur le lien -->
    <!-- 3 - Si vous avez reçu cette action "modification" par l'url, alors vous affichez "Vous avez demandé la modification de votre compte" -->
    <!-- ********************************-->
    <div class="container mb-5">
        <div class="row">
            <div class="col-sm-12 text-center mb-5">
                <h2 class="mb-5 bg-light color-dark w-50 m-auto p-5">Mon compte : John Waynes</h2>
                <div class="mt-5 p-5">
                    <a href="05_exo_GET.php?action=modification">Modifer mon compte</a>
                </div>

                <?php
                if (isset($_GET['action']) && $_GET['action'] == 'modification') {
                    echo "<p class=\"border border-white w-50 m-auto\">Vous avez demandé la modification de votre compte</>";
                }

                // jevardump($_GET);
                ?>

            </div>
        </div>
        <!--fin de row-->
        <div class="row">
            <div class="col-sm-12 text-center">
                <div class="p-5">
                    <a href="05_exo_GET.php?action=suppression">Supprimer mon compte</a>
                </div>
                <?php
                if (isset($_GET['action']) && $_GET['action'] == 'suppression') {
                    echo "<p class=\"border border-white w-50 m-auto\">Vous avez supprimé votre compte</>";
                }

                // jevardump($_GET);
                ?>

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