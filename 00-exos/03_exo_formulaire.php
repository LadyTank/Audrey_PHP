<?php require_once '../inc/functions.php'; ?> 
<!doctype html>
<html lang="fr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <title>Exo PHP 7 - Formulaire</title>
    <!-- mes styles -->
    <link rel="stylesheet" href="../css/style.css">
  </head>
  <body>
<!-- navigation en include  -->
    <div class="jumbotron container">
        <h1 class="display-4">Exo PHP 7 - Formulaire</h1>
        <hr class="my-4">
    </div>
    <!-- =================================== -->
    <!-- Contenu principal -->
    <!-- =================================== -->
    <main class="container bg-white mb-5 pb-4">
        <div class="row">
            <div class="col-sm-12">

            <!-- exo, faire un form avec les champs prénom, nom, email, adresse, code postal et ville -->
            <!-- puis récupérer dans une page 03_form-traitement.php les informations de $_POST -->
            <!-- puis on fabriquera ensemble un fichier .txt pour stocker les informations de form -->

            <form method="POST" action="03_form_traitement.php" class="p-2 m-2">
            <div class="form-group">
                        <label for="prenom">Prénom*</label>
                        <input type="text" class="form-control" name="prenom" id="prenom" required>
                    </div>
                    <div class="form-group">
                        <label for="nom">Nom de famille*</label>
                        <input type="text" class="form-control" name="nom" id="nom" required>

                    </div>

                    <div class="form-group">
                        <label for="email">email*</label>
                        <input type="email" class="form-control" name="email" id="email" required>

                    </div>

                    <div class="form-group">
                        <label for="adresse">Adresse postale</label>
                        <input type="text" class="form-control" name="adresse" id="adresse">
                    </div>

                    <div class="form-group">
                        <label for="codePostal">Code postal</label>
                        <input type="number" class="form-control" name="codePostal" id="codePostal" max="999999" min="10000">
                    </div>

                    <div class="form-group">
                        <label for="ville">Ville</label>
                        <input type="text" class="form-control" name="ville" id="ville">
                    </div>

                    <button type="submit" class="btn btn-small btn-primary">Envoyer</button>
            
            </form>

                <?php
                 




                ?>
            </div>
            <!-- fin col -->
        </div>
        <!-- fin row -->
    </main>
    <!-- footer en include -->
    <?php require '../inc/footer.inc.php'; ?>
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