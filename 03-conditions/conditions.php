<!doctype html>

<html lang="fr">
    <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <title>Cours PHP 7 - Les conditions</title>
<!-- mes styles -->
<link rel="stylesheet" href="../css/style.css">
    </head>

    <body>
       <?php
                require '../inc/navbar.inc.php';
            ?>
        <div class="jumbotron bg-secondary text-light">
            
            <h1 class="display-4">Cours PHP 7 - Conditions</h1>
            <p class="lead"><p class="lead">On retrouve dans PHP la plupart des instructions de contrôle des scripts. Indispensables à la gestion du déroulement d'un algorithme quelconque, ces instructions sont présentes dans tous les langages. PHP utilise une syntaxe très proche de celle du langage C. Ceux qui ont déjà pratiqué un langage tel que le C ou plus simplement JavaScript seront en pays de connaissance.</p> </p>
        </div> <!--fin de jumbotron-->
    <!-- **************************-->
    <!-- Contenu Principal -->
    <!-- **************************-->
    
        <main class="container">
            <div class="row bg-white mb-4 p-4">
                <div class="col-sm-12 col-md-6">
                    <h2>if</h2>
                    <p>L'instruction <code>if</code> est la plus utilisée des instructions conditionnelles. Présente dans tous les langages de programmation, elle est essentielle car elle permet d'orienter l'exécution du script en fonction de la valeur booléenne d'une expression.</p>
                    <ul>
                    <?php
                     $a=1000;
                     $b=550;
                     $c=25;

                    if ($a>$b && $b>$c){
                        echo "<li>les 2 conditions sont ok</li>";
                    }
                    ?>
                    </ul>
                    <h2>if... else</h2>
                    <p>L'instruction <code>if... else</code> permet de traiter le cas où l'expression conditionnelle est TRUE et en même temps d'écrire un traitement de rechange quand elle est évaluée à FALSE, ce que ne permet pas une instruction if seule. L'instruction ou le bloc qui suit <code>else</code> est alors le seul à être exécuté. L'exécution continue ensuite normalement après le bloc <code>else</code></p>
                    <?php
                     $a=1000;
                     $b=550;
                     $c=25;

                    if ($a>$b){
                        echo "<li>$a est supérieur à $b</li>";
                    } else {
                        echo "<li>$a est inférieur à $b</li>";
                    }
                    ?>
                    <p>Le bloc qui suit les instructions if ou else peut contenir toutes sortes d'instructions, y compris d'autres instructions <code>if... else</code>. Nous obtenons dans ce cas une syntaxe plus complexe, de la forme : VOIR</p>
                </div>
                <div class="col-sm-12 col-md-6">
                    
                    <h3>Autre exemple de if else...</h3>
                    <p class="border border-warning">
                        <h3>Code php, exemple</h3>
                        <code >
                        $e=10;<br>
                        $f=5;<br>
                        $g=2;<br>

                        echo '&#8249;ul>';<br>
                        if ($e == 9 || $f > $g) {<br>
                            echo "&#8249;li>OK pour au moins une des deux conditions&#8249;/li>";<br>
                        } else {<br>
                            echo "&#8249;li>Les deux conditions sont fausses&#8249;/li>";<br>
                        }<br>
                        echo '&#8249;ul>';
                   </code></p>
                    <?php
                        $e=10;
                        $f=5;
                        $g=2;

                        echo '<ul>';
                        if ($e == 9 || $f > $g) {
                            echo "<li>OK pour au moins une des deux conditions</li>";
                        } else {
                            echo "<li>Les deux conditions sont fausses</li>";
                        }
                        echo '</ul>';
                    ?>


                </div>

                <div class="col-sm-12 col-md-6">
                    <h2>if... elseif... else</h2>
                    <p class="border border-warning">
                        <h3>Code php, exemple</h3>
                        <code >
                        $a=1000;<br>
                        $b=550;<br>
                        $c=25;<br>
                        if ($a == 80) {<br>
                            echo "&#8249;li>Réponse 1 : \$a est égal à 80&#8249;/li>";<br>
                        }elseif ($a != 10) {<br>
                            echo "&#8249;li>Réponse 2 : \$a n\'est pas égale à 10&#8249;/li>";<br>
                        } else {<br>
                            echo "&#8249;li>Réponse 3 : Aucune des conditions n'est réunies.&#8249;/li>";<br>
                        }

                   </code></p>
                    <?php
                        echo '<ul>';
                        if ($a == 80) {
                            echo "<li>Réponse 1 : \$a est égal à 80</li>";
                        }elseif ($a != 10) {
                            echo "<li>Réponse 2 : \$a n'est pas égale à 10</li>";
                        } else {
                            echo "<li>Réponse 3 : Aucune des conditions n\'est réunies.</li>";
                        }
                        echo '</ul>';
                    ?>
    
                </div>         
                <div class="col-sm-12 col-md-6">
                <h2>if... else en ternaire</h2>
                <p>Le bloc qui suit les instructions if ou else peut contenir toutes sortes d'instructions, y compris d'autres instructions <code>if... else</code></p>

                <p>Il existe une autre manière d'écrire un if... else; la condition ternaire</p>
                <p>Dans la ternaire, le ? remplace le if et le : remplace le else</p>
                <code>
                    echo ( $h == 10) ? "$h est égal à 10" : "$h est différent de 10";
                </code>
                <?php
                    $h=10;
                    // if ($h==10){
                        // echo "$h est égale de 10";
                    //} else {
                        // echo "$h est différent de 10";
                    //}

                    // la même en ternaire
                    echo ( $h == 10) ? "$h est égal à 10" : "$h est différent de 10";
                ?>
                     
                </div>     
            </div> <!--fin row-->

            <div class="row bg-white mb-4 p-4">
                <div class="col-sm-12 col-md-6">
                    <h2>Switch... case</h2>
                    <code>
                    &#8249;?php <br>
                    $dept = 92;<br>
                    switch ($dept) {<br>
                        case 75 : <br>
                            echo "Paris";<br>
                            break;<br>
                        case 41 : <br>
                            echo "Loir-et-Cher";<br>
                            break;<br>
                        case 92 : <br>
                            echo "Haut-de-Seine";<br>
                            break;<br>
                        default:<br>
                            echo "Département inconnu";<br>
                            break;<br>
                    }<br>
                    ?> 
                    </code>
                        <?php 

                        $dept = 92;
                        switch ($dept) {
                            case 75 : 
                                echo "Paris";
                                break;
                            case 41 : 
                                echo "Loir-et-Cher";
                                break;
                            case 92 : 
                                echo "Haut-de-Seine";
                                break;
                            default:
                                echo "Département inconnu";
                                break;
                        }
                        ?> 
                </div> <!--fin col-->

                
            </div> <!--fin de row -->
        
            <div class="row bg-white p-4 mb-4">
                <div class="col-sm-12 text-center">
                    <p>Ces deux boucles profitent du même code php</p>
                </div>
                    <div class="col-sm-12 col-md-6">
                        <h2>La boucle FOR</h2>
                        <p>La boucle FOR est plus concise, plus ramassée que la boucle WHILE.</p>
                        <hr>
                        <p>On affiche les puissances de 2 jusqu'à 8 d'un tableau crée en php</p>
                        <?php 
                            //on va afficher les puissance de 2 jusqu'à 8;

                            for ( $i=0; $i<=8; $i++) { // création d'un tableau avec 9 éléments
                                $tab[$i] = pow(2,$i); //à l'aide d'une boucle et de la fonction pow() pour puissance
                                //$tab[$i] = $i; // cr"ation d'un tableau avec la valeur de i incrémentée
                            } 
                            //var_dump($tab); // pour afficher la nature et les informations du tableaux créé
                            //echo $tab[2];

                            
                        ?> 

                    </div> <!--fin col-->

                    <div class="col-sm-12 col-md-6">
                        <h2>La boucle FOREACH</h2>
                        <p>La boucle FOREACH (pour chaque) est efficace pour lister les élements d'un tableau.</p>
                        <?php 
                            $val = "Une valeur de notre tableau";
                            // echo $val."<br>";

                            echo "Les puissances de 2 sont : ";

                            foreach($tab as $val) {
                                echo $val." - ";
                            }
                        ?>
                        <p>Lecture des indices et des valeurs d'un tableau</p>
                        <?php 
                            //création d'un autre tableau
                            for ( $i=0; $i<=12; $i++) { 
                                $tab[$i] = pow(2,$i); 
                            } 
                            //Lecture des indices et des valeurs du tableau
                            foreach($tab as $ind=>$val) {
                                echo "2 puissance $ind vaut $val <br>";
                            }
                            echo "Le premier indice de mon tableau est $ind et la dernière valeur de mon tableau est $val";
                        ?> 
                    </div> <!--fin col-->

                        
            </div><!--fin de row -->
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