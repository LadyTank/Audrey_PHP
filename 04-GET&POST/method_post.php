<?php require_once '../inc/functions.php'; ?>

<!doctype html>
<html lang="fr">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <title>Cours PHP 7 - method_POST</title>
    <!-- mes styles -->
    <link rel="stylesheet" href="../css/style.css">
</head>

<body><?php require '../inc/navbar.inc.php'; ?>
    <!-- navigation en include  -->
    <div class="jumbotron container mt-4">
        <h1 class="display-4">COURS PHP 7 - method_POST</h1>
        <p class="lead">$_POST réceptionne les données d'un formulaire. $_POST est une superglobale.</p>
        <hr class="my-4">
    </div>
    <!-- =================================== -->
    <!-- Contenu principal -->
    <!-- =================================== -->
    <main class="container bg-white mb-5 pb-4">
        <div class="row">
            <div class="col-sm-12">
                <h2 class="p-3">$_POST[]</h2>
                <h5>Formulaire</h5>

                <ul>
                    <li>Un formulaire doit toujours être dans une balise <code>&#8249;form></code></li>
                    <li>L'attribut "method" indique comment les données vont circuler vers le PHP.</li>
                    <li> L'attribut action indique l'URL de destination des données, si l'attribut action est vide les données vont vers le même script ou la même page.</li>
                    <li>Ensuite sur les "names" il ne faut pas les oublier sur les formulaires ; ils constituent les indices de $_POST qui réceptionne les données</li>
                </ul>
                <!-- un formulaire doit toujours etre dans une balise <form> pour fonctionner. L'attribut method indique comment le données vont circuler vers le PHP. L'attribut action indique l'URL de destination des données (vide, elles vont vers le meme script). Ensuit =e sur les names, il ne faut pas les oubliers sur les formulaires, ils constituent les indices des $_POST qui récéptionne les données -->

                <form method="POST" action="" class="p-2 m-2">
                    <div class="form-group">
                        <label for="prenom">Prénom*</label>
                        <input type="text" class="form-control" name="prenom" id="prenom" required>
                    </div>
                    <div class="form-group">
                        <label for="nom">Nom de famille*</label>
                        <input type="text" class="form-control" name="nom" id="nom" required>

                    </div>
                    <div class="form-group">
                        <label for="commentaire">Votre commmentaire</label>
                        <textarea class="form-control" name="commentaire" id="commentaire" cols="30" rows="2"></textarea>
                    </div>
                    <button type="submit" class="btn btn-small btn-primary">Envoyer</button>

                </form>

            </div>
            <!-- fin col -->

        </div> <!-- fin row -->

        <div class="row">
            <div class="col-sm-12">

                <ul>
                    <li>$_POST est une superglobale qui permet de récupérer les données saisies dans un formulaire,</li>
                    <li>$_POST est donc un tableau (array), et il est disponible dans tous les contextes du script,</li>
                    <li>le tableau $_POST se remplit de la manière suivante :
                        <code>$_POST = array(
                            'name1' => 'valeur1',
                            'nameN' => 'valeurN',
                            );</code>
                    </li>
                    <li>donc ou name1 et nameN correspondent aux attributs "name" du formulaire, et où valeur1 et valeurN correspondent aux valeurs saisies par l'internaute.</li>
                </ul>

                <?php
                if (!empty($_POST)) { // si $_POST n'est pas vide c'est qu'il est remplit et donc que le formulaire a été envoyé, notez qu'en l'état on peut l'envoyer avec des champs vides, les valeurs de $_POST etant alors des strings vides. En effet, on peut avoir des informations non obligatoires dans un formulaire et les input ne seront pas remplis

                    // jevardump($_POST);
                    echo '<p>Prénom : <strong>' . $_POST['prenom'] . '</strong><br>';
                    echo '<p>Nom : <strong>' . $_POST['nom'] . '</strong><br>';
                    echo '<blockquote>Prénom : <strong>' . $_POST['commentaire'] . '</strong><blockquote>';
                }

                ?>

            </div>
            <!--fin de col-->
        </div><!-- fin row -->

    </main>
    <!-- footer en include -->
    <?php include '../inc/footer.inc.php'; ?>
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
</body>

</html>