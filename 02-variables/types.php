<!doctype html>

<html lang="fr">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <title>Cours PHP 7 - Types de données</title>
    <!-- mes styles -->
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <?php
    require '../inc/navbar.inc.php';
    ?>
    <div class="jumbotron bg-secondary text-light">
        <h1 class="display-4 mb-4">Cours PHP 7 - Types de données</h1>
        <p class="lead">Dans PHP, il n'existe pas de déclaration explicite du type d'une variable lors de sa création. Même PHP 7 reste un langage pauvrement typé comparé à Java ou au C.</p>
    </div>
    <!--fin de jumbotron-->

    <!-- **************************-->
    <!-- Contenu Principal -->
    <!-- **************************-->

    <main class="container bg-white text-dark">
        <div class="row p-4 mb-4">
            <div class="col-sm-12 text-dark p-4">
                <h2 class="mb-4">Les types de données</h2>
                <ul>
                    <li>Les types de base :</li>
                    <ul>
                        <li>Entiers, avec le type integer, qui permet de représenter les nombres entiers dans les bases 10, 8 et 16.</li>
                        <li>Flottants, avec le type double ou float, au choix, qui représentent les nombres réels, ou plutôt décimaux au sens mathématique. </li>
                        <li>Chaînes de caractères, avec le type string.</li>
                        <li>Booléens, avec le type boolean, qui contient les valeurs de vérité TRUE ou FALSE (soit les valeurs 1 ou 0 si on veut les afficher).</li>
                    </ul>
                    <li>Les types composés :</li>
                    <ul>
                        <li>Tableaux, avec le type array, qui peut contenir plusieurs valeurs.</li>
                        <li>Objets, avec le type object.</li>
                    </ul>
                    <li>Les types spéciaux</li>
                    <ul>
                        <li>Objets, avec le type object.</li>
                        <li>Type null.</li>
                    </ul>
                </ul>
            </div>
            <!--fin de col -->

            <div class="col-sm-12">
                <h2 class="text-dark">Les opérateurs numériques</h2>
                <p class="text-dark">PHP offre un large éventail d'opérateurs utilisables avec des nombres. Les variables ou les nombres sur lesquels agissent ces opérateurs sont appelés les opérandes.</p>

                <table class="table table-primary table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Opérateur</th>
                            <th scope="col">Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">+</th>
                            <td>Addition</td>
                        </tr>
                        <tr>
                            <th scope="row">-</th>
                            <td>Soustraction</td>
                        </tr>
                        <tr>
                            <th scope="row">*</th>
                            <td>Multiplication</td>
                        </tr>
                        <tr>
                            <th scope="row">**</th>
                            <td>Puissance (associatif à droite)<br>
                                $a=3;<br>
                                echo $a**2; //Affiche 9<br>
                                echo $a**2**4; //Affiche 43046721 soit 3**(2**4) ou 316</td>
                        </tr>
                        <tr>
                            <th scope="row">/</th>
                            <td>Division</td>
                        </tr>
                        <tr>
                            <th scope="row">%</th>
                            <td>Modulo : reste de la division du premier opérande par le deuxième. Fonctionne aussi avec des opérandes décimaux. Dans ce cas, PHP ne tient compte que des parties entières de chacun des opérandes.<br>
                                $var = 159;<br>
                                echo $var%7; //affiche 5 car 159=22x7 + 5.<br>
                                $var = 10.5;<br>
                                echo $var%3.5; //affiche 1 et non pas 0.
                                <?php
                                echo "<hr>";
                                echo "<h5>Exercice</h5>";
                                echo "<hr>";
                                $var = 159;
                                echo "<br> Dans la variable \$var j'ai rentré 159.";
                                echo "<br> Si je veux afficher le contenu de \$var : \$var contient $var <br>";
                                echo "<br> Le résultat de \$var%7 = " . $var % 7.;
                                ?>

                                <?php
                                echo "<hr>";
                                $var = 159;
                                echo "<div class=\"border border-success w-50 p-2\">dans la variable \$var j'ai rentré 159.<br> si je veux afficher le contenu de \$var le voici : \$var contient $var <br> le résultat du modulo de $var par 7 : $var%7 est égal à "  . $var % 7;
                                echo "</div>";
                                ?>
                        </tr>
                        <tr>
                            <th scope="row">--</th>
                            <td>Décrémentation : soustrait une unité à la variable. Il existe deux possibilités, la prédécrémentation, qui soustrait avant d'utiliser la variable, et la postdécrémentation, qui soustrait après avoir utilisé la variable.<br>
                                $var=56;<br>
                                echo $var--; //affiche 56 puis décrémente $var.<br>
                                echo $var; //affiche 55.<br>
                                echo --$var; //décrémente $var puis affiche 54.</td>
                        </tr>
                        <tr>
                            <th scope="row">++</th>
                            <td>Incrémentation : ajoute une unité à la variable. Il existe deux possibilités, la préincrémentation, qui ajoute 1 avant d'utiliser la variable, et la postincrémentation, qui ajoute 1 après avoir utilisé la variable.
                                $var=56;<br>
                                echo $var++; //affiche 56 puis incrémente $var.<br>
                                echo $var; //affiche 57.<br>
                                echo ++$var; //incrémente $var puis affiche 58. <br>

                                <?php
                                $var = 56;
                                echo "<div class=\"border border-danger w-50 p-2\">";
                                echo $var++ . "<br> $var </div>";
                                echo "<div class=\"border border-warning w-50 p-2\">" . $var++ . "<br>" . $var . "<br>" . ++$var . "</div>";
                                ?>

                                <?php
                                $var = 56;
                                echo "<div class=\"border border-danger w-50 p-2\">" . $var++ . "<br>" . $var . "<br>" . ++$var . "</div>";
                                ?>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <h3 class="text-dark p-2">Le type "boolean" ou boléen</h3>
                <p class="text-dark p-2">Le type boolean ne peut contenir que deux valeur, TRUE (1) ou FALSE (0)</p>

                <?php
                $a = 89;
                $b = ($a < 100); // dans le cas où c'est faux, il affichera une chaîne vide (soit rien du tout)
                echo "<div class=\"border border-warning text-dark w-50 p-2\"> \$b vaut $b</div>";
                ?>

                <h3 class="text-dark p-2">Les opérateurs boléens</h3>
                <p>Quand ils sont associés, les opérateurs booléens servent à écrire des expressions simples ou complexes, qui sont évaluées par une valeur booléenne TRUE ou FALSE. Ils seront utilisés dans les instructions conditionnelles.</p>

            </div>
            <!--fin de col -->

            <div class="col-sm-12 ">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Opérateur</th>
                            <th scope="col">Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">==</th>
                            <td>
                                Teste l'égalité de deux valeurs. L'expression $a == $b vaut TRUE si la valeur de $a est égale à celle de $b et
                                FALSE dans le cas contraire :<br>
                                $a = 345;<br>
                                $b = "345";<br>
                                $c = ($a==$b);<br>
                                $c est un booléen qui vaut TRUE car dans un contexte de comparaison numérique, la chaîne "345" est évaluée comme le nombre 345. Si $b="345
                                éléphants" nous obtenons le même résultat.
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">!= ou <>
                            </th>
                            <td>
                                Teste l'inégalité de deux valeurs.<br>
                                L'expression $a != $b vaut TRUE si la valeur de $a est différente de celle de $b et FALSE dans le cas contraire.
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">===</th>
                            <td>
                                Teste l'identité des valeurs et des types de deux expressions.<br>
                                L'expression $a === $b vaut TRUE si la valeur de $a est égale à celle de $b et que $a et $b sont du même type. Elle vaut FALSE dans le cas contraire :<br>
                                $a = 345;<br>
                                $b = "345";<br>
                                $c = ($a===$b);<br>
                                $c est un booléen qui vaut FALSE car si les valeurs sont égales, les types sont différents (integer et string).
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">!==</th>
                            <td>
                                Teste la non-identité de deux expressions.<br>
                                L'expression $a !== $b vaut TRUE si la valeur de $a est différente de celle de $b ou si $a et $b sont d'un type différent. Dans le cas contraire, elle vaut FALSE :<br>
                                $a = 345;<br>
                                $b = "345";<br>
                                $c = ($a!==$b);<br>
                                $c est un booléen qui vaut TRUE car si les valeurs sont égales, les types sont différents (integer et string).
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                << /th>
                            <td>
                                Teste si le premier opérande est strictement inférieur au second.
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                <=< /th>
                            <td>
                                Teste si le premier opérande est inférieur ou égal au second.
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">></th>
                            <td>
                                Teste si le premier opérande est strictement supérieur au second.
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">>=</th>
                            <td>
                                Teste si le premier opérande est supérieur ou égal au second.
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                <=>
                            </th>
                            <td>
                                Avec $a<=>$b, retourne -1, 0 ou 1 respectivement si $a<$b, $a=$b ou $a>$b ($a et $b peuvent être des chaînes).
                            </td>
                        </tr>
                    </tbody>
                </table>
                <br>
                <h3>Les opérateurs logiques</h3>
                <table class="table table-striped bg-warning">
                    <thead>
                        <tr>
                            <th scope="col">Opérateurs</th>
                            <th scope="col">Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">OR</th>
                            <td>Teste si l'un au moins des opérandes à la valeur TRUE :<br>
                                $a = true;<br>
                                $b = false;<br>
                                $c = false;<br>
                                $d = ($a OR $b);//$d vaut TRUE.<br>
                                $e = ($b OR $c); //$e vaut FALSE.</td>
                        </tr>
                        <tr>
                            <th scope="row">||</th>
                            <td>Équivaut à l'opérateur OR mais n'a pas la même priorité.</td>
                        </tr>
                        <tr>
                            <th scope="row">XOR</th>
                            <td>Teste si un et un seul des opérandes à la valeur TRUE :<br>
                                $a = true;<br>
                                $b = true;<br>
                                $c = false;<br>
                                $d = ($a XOR $b); //$d vaut FALSE.<br>
                                $e = ($b XOR $c); //$e vaut TRUE.</td>
                        </tr>
                        <tr>
                            <th scope="row">AND</th>
                            <td>Teste si les deux opérandes valent TRUE en même temps :<br>
                                $a = true;<br>
                                $b = true;<br>
                                $c = false;<br>
                                $d = ($a AND $b); //$d vaut TRUE.<br>
                                $e = ($b AND $c); //$e vaut FALSE.</td>
                        </tr>
                        <tr>
                            <th scope="row">&&</th>
                            <td>Équivaut à l'opérateur AND mais n'a pas la même priorité.</td>
                        </tr>
                        <tr>
                            <th scope="row">!</th>
                            <td>Opérateur unaire de négation, qui inverse la valeur de l'opérande :
                                $a = TRUE;<br>
                                $b = FALSE;<br>
                                $d = !$a; //$d vaut FALSE.<br>
                                $e = !$b; //$e vaut TRUE.</td>
                        </tr>
                    </tbody>
                </table>
                <p>Attention !! Une erreur classique dans l'écriture des expressions conditionnelles consiste à confondre l'opérateur de comparaison == avec l'opérateur d'affectation =. L'usage des parenthèses dans la rédaction des expressions booléennes est souvent indispensable et toujours recommandé pour éviter les problèmes liés à l'ordre d'évaluation des opérateurs.</p>

            </div>
            <!--fin de col -->
        </div>
        <!--fin de row -->


    </main>
    <!--fin de container-->
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