<!doctype html>
<html lang="fr">
    <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <title>Cours PHP 7 - Les boucles</title>
<!-- mes styles -->
<link rel="stylesheet" href="../css/style.css">
    </head>

    <body>
       <?php
                require '../inc/navbar.inc.php';
            ?>
        <div class="jumbotron bg-secondary text-light">
            
            <h1 class="display-4">Cours PHP 7 - Les boucles</h1>
            <p class="lead">Les boucles permettent de répéter des opérations élémentaires un grand nombre de fois sans avoir à réécrire le même code.</p>        </div> <!--fin de jumbotron-->
    <!-- **************************-->
    <!-- Contenu Principal -->
    <!-- **************************-->
    
        <main class="container bg-white p-4 mb-5">
            <div class="row">
                <div class="col-sm-12 col-md-6 mb-4">
                    <h2> 1 - La boucle WHILE</h2>
                    <p>La boucle while (tant que) permet d'affiner le comportement d'une boucle en réalisant une action de manière répétitive tant qu'une condition est vérifiée ou qu'une expression quelconque est évaluée à TRUE et donc de l'arrêter quand elle n'est plus vérifiée, évaluée à FALSE.</p>
                    <?php 
                        $n = 1 ;
                        var_dump($n);
                        while ($n%7 !=0) { // on cherche un modulo différent de 0 pour trouver un nombre qui n'est pas un multiple de 7
                            $n = rand(1,100);// rand() fait un tirage de nombres aléatoires compris entre 1 et 100 rand() pour random
                            echo $n. "&nbsp; -";// non breaking space espace insécable
                        }
                    ?> 
                </div> <!--fin de col-->

                <div class="col-sm-12 col-md-6">
                    <h2> 2 - La boucle DO... WHILE</h2>
                    <p class="lead">Avec l'instruction do... while, la condition n'est évaluée qu'après une première cexécution des instructions du bloc compris entre do et while.</p>

                    <?php 
                    $n2 = 1; //initialisation de la variable 1
                    var_dump($n2);
                        do 
                        { $n2 = rand(1,100);
                            echo $n2."&nbsp;*";
                        } 
                        while ($n2%7 !=0);// ce n'est pas un multiple de 7, cette condition n'est testée qu'après le premier passage de la boucle
                    ?> 

                </div><!--fin de col-->

                <div class="col-sm-12 col-md-6">
                    <h2></h2>
                    
                </div><!--fin de col-->    

                <div class="col-sm-12 col-md-6">
                    <h2></h2>
                    
                </div><!--fin de col-->    

            </div> <!--fin row-->

        </main><!--fin de container-->

        <?php
        require '../inc/footer.inc.php';
    ?>

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