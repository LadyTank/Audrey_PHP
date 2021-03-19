<?php
    require '../inc/functions.php';
?>
<!doctype html>
<html lang="fr">
    <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <title>Cours PHP 7 - Tableaux</title>
    <!-- mes styles -->
    <link rel="stylesheet" href="../css/style.css">
    </head>
    
    <body>
    <?php
    require '../inc/navbar.inc.php';
?>
        <div class="jumbotron bg-secondary text-light">
            <h1 class="display-4 mb-4">Cours PHP 7 - Les tableaux</h1>
            <p class="lead">Les tableaux représentent un type composé car ils permettent de stocker sous un même nom de variable plusieurs valeurs indépendantes d'un des types de base que vous venez de voir. C'est comme un tiroir divisé en compartiments. Chaque compartiment, que nous nommerons un élément du tableau, est repéré par un indice numérique (le premier ayant par défaut la valeur 0 et non 1). D'où l'expression de tableau indicé.</p>
        </div> <!--fin de jumbotron-->

    <!-- **************************-->
    <!-- Contenu Principal -->
    <!-- **************************-->
    
        <main class="container bg-white text-dark mb-5">
            <div class="row">
                <div class="col-sm-12 ">
                    <h2>1- Les tableaux</h2>
                    <p>Un tableau appelé array en anglais est une variable améliorée dans laquelle on stocke une multitude de valeurs. Ces valeurs peuvent être de n'importe quel type. Elle possedent un indice dont la numérotation commence à 0.<p>
                    <blockquote>


                    </blockquote>
                    <?php
                        $tab[0] = 2004; // la variable $tab est un tableau par le simple fait que son nom est suivi de crochets
                        $tab[1] = 31.14E7;
                        $tab[2] = "PHP 7";
                        $tab[35] = $tab[2]." et MySQL"; //Les éléments indicés entre 2 et 35 n'existent pas. 
                        $tab[] = "coucou"; //il mettra l'indice 36, car il incrémente automatiquement à la suite du nombre le plus haut d'indexé

                        echo "Nombre d'éléments du tableau : ".count($tab); // les éléments non indicée comme entre 2 et 35 ne sont pas compté
                        echo "<hr><p>Le langage préféré de l'open source est le $tab[2]<br>Utilisez $tab[35]</p>"
                    ?>
                </div> <!--fin de col-->

                <div class="col-sm-12 ">
                <h2>2 - Les tableaux associatifs</h2>
               <p>Dans un tableau associatif nous pouvons choisir le nom des indices ou des index, c'est-à-dire que nous associons un indice crée par nous à sa valeur.</p>
			<?php
				$couleurs = array (
					'b' => 'bleu',
					'bl' => 'blanc',
					'r'	=> 'rose',
				);

				jevardump($couleurs);

				// pour afficher une valeur de notre tableau associatif en le cherchant par son indice
				echo '<p> La première couleur du tableau est ' .$couleurs['b']. '</p>';// dans des quotes il prend des quotes autour de son indice
				echo "<p> La première couleur du tableau est $couleurs[b]</p>";// dans des guillemets il y a une exception, l'indice ne prend plus de quotes... VOIR 
				//mini exo compter le nombre d'élément du tableau 
				// echo count($couleurs);
				echo "<p>Nombre d'éléments dans le tableau \$couleurs : " .count( $couleurs ). "</p>";
				echo "<p>Nombre d'éléments dans le tableau \$couleurs : " .sizeof( $couleurs ). "</p>";

				jeprintr(count($couleurs));
                echo "<hr>";
			?>
                </div> <!--fin de col-->

                <div class="col-sm-12">
                    <h2>3 - Les tableaux multi-dimentionnel</h2>
                    <p>Un tableau multi-dimentionnel est un tableau qui contiendra une suite de tableaux. Chaque tableau présente une "dimension".</p>
                    <?php 
                    $tableau_multi = array (
                        0 => array (
                            'prenom' => 'Jean',
                            'nom' => 'Dujardin',
                            'telephone' => '01 25 45 48 47'
                        ),
                        1 => array (
                            'prenom' => 'Alexandra',
                            'nom' => 'Lamy',
                            'telephone' => '01 45 25 45 87'
                        ),
                        2 => array (
                            'prenom' => 'John',
                            'nom' => 'Wayne',
                        ),
                        3 => array (
                            'prenom' => 'Audrey',
                            'nom' => 'Saulnier',
                            'telephone' => '01 25 25 25 25'

                        ),
                    );
                    jeprintr($tableau_multi); //fonction crée et appelée pour afficher le contenu et les valeurs du tableau

                    // Pour afficher Jean Lamy
                    echo $tableau_multi[0]['prenom'].' '.$tableau_multi[1]['nom'];// On entre d'abord l'indice 0 puis dans le sous tableau on va à l'indice prénom
                    echo '<hr>';

                    // Pour parcourir le tableau multidimentionel, on peut faire une boucle FOR car ses indices sont numériques
                    echo "<ul>";
                    for ( $i=0; $i < count($tableau_multi); $i++) {
                        echo "<li>" .$tableau_multi[$i]['nom']. ' ' .$tableau_multi[$i]['prenom']. "</li>";
                    }
                    echo "</ul>";

                    // OU une boucle foreach en passant en variable les contenu de chaque indice du tableau et en ciblant les indices nommés des sous-tableaux associatifs. Dans une boucle foreach dans ce genre de situation, il faut toujours un indice
                    echo '<p>';
                    foreach ( $tableau_multi as $indice => $acteur2) {
                        echo ($acteur2['prenom'])."<br> ";
                        
                        // echo $tableau_multi[$indice]['prenom']." ";
                    }

                    echo '</p>';
                    // appeler PI qui est une constante php
                    echo M_PI;
                    echo pi();


                    ?> 

                </div><!--fin de col-->
            </div> <!--fin de row-->
            
    

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