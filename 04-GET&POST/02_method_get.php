<?php require_once '../inc/functions.php'; ?> 
<?php include '../inc/navbar.inc.php'; ?>
<!doctype html>
<html lang="fr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <title>Cours PHP 7 - method_get 2</title>
    <!-- mes styles -->
    <link rel="stylesheet" href="../css/style.css">
  </head>
  <body>
<!-- navigation en include  -->
    <div class="jumbotron container">
        <h1 class="display-4">COURS PHP 7 - method_GET 2</h1>
        <p class="lead">$_GET représente les données qui transitent par l'URL.</p>
        <hr class="my-4">
    </div>


    <!-- =================================== -->
    <!-- Contenu principal -->
    <!-- =================================== -->
    <main class="container mb-5 pb-4">
        <div class="row">
        <div class="col-sm-12">

              <?php 
            //   ISSET Détermine si une variable est déclarée et est différente de null
                if(isset($_GET['article']) && isset($_GET['couleur']) && isset($_GET['prix'])) { // je fabrique la card si j'ai bien les contenus de mon array $_GET  
                ?>         

            <div class="card" style="width: 18rem;">
                <!-- <img src="..." class="card-img-top" alt="..."> -->
                
                <div class="card-body">

                    <h5 class="card-title">
                        <?php 
                        echo $_GET['article'];
                        ?> 
                    </h5>

                    <p class="card-text">
                        <?php echo $_GET['couleur']. "<br>" .$_GET['prix']. " €"; ?>
                    </p>

                    <a href="panier.php" class="btn btn-primary">Mettre au panier</a>
                </div>
            </div>
            <!-- fin card      -->

            <?php
                } else { //sinon je fabrique un simple p
                    echo "<p>Désolé il n'y a pas de produit sur cette page !</p>"; 
                } 
                ?> 
            </div>
            <!-- fin col -->

        </div> <!-- fin row-->

            <?php 
            // jevardump($_GET);

            // isset = si il est établie? ou est ce qu'on a bien tous les indices du tableau?

            // if(isset($_GET['article']) && isset($_GET['couleur']) && isset($_GET['prix'])) {
            //     echo $_GET['article']; // oui on affiche le produit
            // } else {
            //     echo "<p class=\"alert alert-danger mx-auto w-50 m-2 text-center\">Désolée, il n'y a pas de produit sur cette page !</p>";
            // }

            // echo $_GET['article']. " - " .$_GET['prix']. " Euros.";






            // la date
            echo "<hr>";
            $date = date("d-m-Y");
            echo $date;

            

            ?> 
        <!-- fin row -->

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