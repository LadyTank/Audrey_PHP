<!DOCTYPE html>
<!-- **-->
<!-- Le symbole $ suivie du nom de la varibale, confirme que c'est une variable -->
<!-- **-->
<?php
$variable1 = "PHP 7 (titre qui est dans une variable)";
?>


<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page d'exemple</title>
</head>

<body>
    <?php
    echo "<h1>Cours sur le $variable1</h1>"
    ?>
    <!-- **-->
    <!-- Dans le cas suivant, le p commence en html et se ferme en php, cela indique que le php peut être intégré à tout moment dans le code 
            echo permet l'affichage, et print à la même fonction-->
    <!-- **-->
    <p>Utilisation d'une variable PHP, on travaille aussi avec : <br>
        <?php
        $variable2 = "MySQL";
        echo $variable2;
        echo " </p>";
        print $variable2;
        ?>

        <hr>

        <?= "<blockquote> $variable2, $variable2, on entend le $variable2 </blockquote>"; ?>
        <!-- **-->
        <!-- Voici une syntaxe simplifiée pour écrire en php, qui remplace l'ouverture de php et éventuellement un echo -->
        <!-- **-->
        <?= "<blockquote>$variable2, $variable2, on entend le coucou</blockquote>"; ?>
        <hr>
        <?php print_r($GLOBALS); ?>
        <hr>
        <?php print_r($_COOKIE); ?>
        <hr>
        <?php print_r($_ENV); ?>
        <hr>
        <?php print_r($_SERVER["HTTP_ACCEPT_LANGUAGE"]); ?>
        <hr>
        <?php print_r($_SERVER["HTTP_HOST"]); ?>
        <hr>
        <?php print_r($_SERVER["PHP_SELF"]); ?>



</body>

</html>