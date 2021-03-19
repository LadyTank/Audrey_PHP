<?php require_once '../inc/functions.php'; ?> 
<!doctype html>
<html lang="fr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <title>Exo PHP 7 - les tableaux</title>
    <!-- mes styles -->
    <link rel="stylesheet" href="../css/style.css">
  </head>
  <body>
<!-- navigation en include  -->
    <div class="jumbotron container">
        <h1 class="display-4">Exo PHP 7 - les tableaux</h1>
        <hr class="my-4">
    </div>
    <!-- =================================== -->
    <!-- Contenu principal -->
    <!-- =================================== -->
    <main class="container bg-white mb-5 pb-4">
        <div class="row">
            <div class="col-sm-12">
                <?php
                // déclarer un tableau, les valeurs du tableau sont indiqués dans les ()
                $tableau1 = array( 'Dalio', 'Gabin', 'Arletty', 'Fernandel', 'Pauline Carton' );
                // echo $tableau1; erreur de type "array to string conversion" on ne peut afficher directement un tableau 
                echo "<pre>";// pour mieux afficher et mieux lire 
                var_dump( $tableau1 );//var_dump affiche le contenu du tableau et les types de données et les valeurs
                echo "</pre>";
                echo "<pre>";
                print_r( $tableau1 );// print_r affiche sans les valeurs (contenus et indices) sans les types                    
                echo "</pre>";
                // autre façon de déclarer un array
                $tableau2 = [ 'France', 'Espagne', 'Italie', 'Portugal' ];
                $tableau2[] = 'Roumanie';// rajouter un élément dans notre tableau avec des crochets
                print_r( $tableau2 );
                // dateJour();
                jevardump($tableau1);
                jeprintr($tableau1);

                //mini exo avec une boucle foreach, parcourez les deux tableaux de cette page et affichez les dans deux ul

                echo "<ul>";
                foreach ($tableau2 as $pays) {
                    // echo "<li>";
                    // echo $pays;
                    // echo "</li>";
                    echo "<li> $pays </li>";
                }
                echo "</ul>";
                
                echo "<ul>";
                foreach ($tableau1 as $indice => $acteur) { //la boucle parcourt cette fois ci les indices et les valeurs d'abord les indices dans une variable $indice => puis les valeurs correspondants à chaque indice dans une variable $acteur
                    echo "<li> pour $indice, la valeur est $acteur </li>";
                }
                echo "</ul>";
                // nouveau tableau nouvel exercice
                // - 1 declarez un tableau associatif $contacts avec les indices suivants : prenom, nom, email, tel et vous y mettez les valeurs correspondant à un seul contact

                $contacts = array(
                    'prenom'=> 'Victor', 
                    'nom' => 'Hugo',
                    'Email' =>'victor@hugo.fr',
                    'Numéro tél' => '01 56 89 74 52',
                );

                echo "<ul>";
                //2 - puis avec une foreach vous affichez les valeurs
                        foreach ($contacts as $infocontacts) {
                            echo "<li>$infocontacts</li>";
                        }
                echo '</ul>';
                echo "<hr>";        
                echo "<ul>";
                // Faire une boucle qui récupère les indices
                foreach ($contacts as $indice => $infocontacts) {
                    echo "<li>Pour " .$indice. " la valeur est : " .$infocontacts. "</li>";
                }
                echo '</ul>';
                echo "<hr>";        

                //3- puis dans une autre boucle vous affichez les valeurs dans des p sauf les prénom qui dois être dans un h3
                echo "<ul>";
                foreach ($contacts as $indice => $infocontacts) {
                    
                    if ($indice == 'prenom') {
                        echo "<h3>$infocontacts</h3>";
                    } else  {
                        echo "<p>Pour " .$indice. " la valeur est : " .$infocontacts. "</p>";
                    }
                }
                echo '</ul>';

                jeprintr($contacts);
                
                // 4 - exo, faire un tableau $tailles avec des tailles de vetements du small au xl et les afficher avec une boucle foreach dans une ul

                $tailles=["small", "medium", "large","extra-large"];
                echo "<ul>";
                foreach ($tailles as $indice => $stock) {
                    echo "<li> ".$indice. " pour " .$stock. "</li>";
                }
                echo "</ul><hr>";

                // ou en tableau associatif, on force les indices

                $tailles2=["S"=>"small", "M"=>"medium", "L"=>"large","XL"=>"extra-large"];
                echo "<ul>";
                foreach ($tailles2 as $indice2 => $size) {
                    echo "<li> ".$indice2. " pour " .$size. "</li>";
                }
                echo "</ul><hr>";


                
                // 5- Puis afficher dans un select avec boucle foreach
                
                echo '<form method=\"GET\" action=\"page.html\">';
                echo '<label for=\"taille\"> Choisis une taille : </label> ';
                echo '<select name=\"taille\">';

                foreach ($tailles2 as $indice2){
                    echo '<option value=\"$indice\">'.$indice2.'</option>';
                }
            
                echo '</select></form>';
            





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