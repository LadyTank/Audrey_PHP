<?php

// mes variables
$chaine = 'Toute la magie que j\'ai connu je l\'ai faite moi même';
$decimal = 32.25;
$entier = 25;

require_once '../inc/functions.php';

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <title> Cours PHP 7 - Exos pratiques</title>
</head>

<body>
    <main class="container bg-warning p-4 mb-5 mt-5">
        <h1 class="bg-white text-center p-4">Avé Cesar ! Mets toi au boulot !!</h1>
        <!-- on appelle la fonction créée -->
        <?php
        minPap();
        // echo "<br>";
        quelJour();
        quelJour2();
        quelJour3();

        // cette fonction permet d'analyser le contenu et le type d'une variable

        var_dump($chaine);
        echo "<br>";
        var_dump($decimal);
        echo "<br>";
        var_dump($entier);
        echo "<br>";
        print_r(" affiche du contenu avec print_r");
        echo "<br>";

        // gettype(); pour afficher le type de la variable
        echo gettype($chaine);
        echo "<hr>";

        // min exo, faire une concaténation
        $d1 = 'Liberté';
        $d2 = '&Eacute;galité';
        $d3 = 'Fraternité';
        echo ('<p>La devise de la République est ') . $d1 . ', ' . $d2 . ', ' . $d3 . '</p>';
        echo "<hr>";

        // mini exo if else if le prix est supérieur à 100 euros la remise est de 10% sinon la remise est de 5% et donnez le montant du prix
        $prix = 1200;
        $remise10 = $prix - ($prix * 10) / 100; // ou $remise10=$prix*0.9
        $remise5 = $prix - ($prix * 5) / 100; // ou $remise5=$prix*0.95

        if ($prix >= 100) {
            echo 'Vous avez payé ' . $prix . ' € donc votre remise est de 10% donc vous allez payer ' . $remise10 . '€';
        } else {
            echo 'Vous avez payé ' . $prix . ' € donc votre remise est de 5% donc vous allez payer ' . $remise5 . '€';
        }
        echo "<hr>";
        // exo IF ELSE IF ELSE
        // Si vous achetez un PC à plus de 1000 euros, la remise est de 15%
        // Pour un PC de 1000 euros et moins la remise est de 10%
        // Si c'est un livre la remise est de 5%
        // Pour tous les autres articles, la remise est de 2%

        // Si c'est un PC SI le prix est sup ou egal à 1000, la remise est de 15%, SINON la remise est de 10% SINON SI c'est un livre la remise est de 5% SINON c'est autre chose q'un PC ou livre la remise est de 2%

        $choix = "PC";


        if ($choix == "PC") {
            if ($prix > 1000) {
                echo 'Vous avez choisi un PC à ' . $prix . ' , vous avez une remise de 15%, vous allez donc payer ' . $prix * 0.85 . " €";
            } else {
                echo 'Vous avez choisi un PC à moins de 1000€, vous avez une remise de 10%, vous allez donc payer ' . $prix * 0.9 . " €";
            }
        } elseif ($choix == "livre") {
            echo 'Vous avez choisi un livre, la remise est de 5% vous allez donc payer ' . $prix * 0.95 . " €";
        } else {
            echo 'Vous avez un produit qui est ni PC ni livre, vous avez une remise de 2%, vous allez payer' . $prix * 0.98 . " €";
        }
        echo "<hr>";

        $cat = "PC";
        $prix2 = 500;
        if ($cat == "PC") {
            if ($prix2 >= 1000) {
                echo "Prix du produit $prix2 € : la remise est de 15% : prix net de votre commande : " . $prix2 * 0.85 . " €";
            } else {
                echo "Prix du produit $prix2 € : la remise est de 10% : prix net de votre commande : " . $prix2 * 0.90 . " €";
            }
        } else if ($cat == "Livre") {
            echo "Prix du produit $prix2 € : livre remise 5% : prix net de votre commande : " . $prix2 * 0.95 . " €";
        } else {
            echo "Prix du produit $prix2 € : remise 2 % : prix net de votre commande : " . $prix2 * 0.98 . " €";
        }
        echo "<hr>";

        // Exo Boucles WHILE
        // les boucles sont destinées à répéter du code de façon automatique

        $i = 0;
        while ($i < 25) { // tant que c'est inférieur à 25 on incrémente $i
            echo $i . "***"; // le premier echo affiche la valeur initiale de i qui est 0
            $i++; // incrémente de 1 à chaque passage de la boucle tant que la condition n'est pas remplie
        }
        echo "<hr>";
        // mini exo 5
        // dans une boucle, faire les options d'un élément select en démarrant à 1920 et en s'arretant à 2021

        // en boucle for
        // Variable qui ajoutera l'attribut selected de la liste déroulante
        $selected = '';

        // Parcours du tableau
        echo '<select name="annees">', "\n";
        for ($i = 1920; $i <= 2021; $i++) {
            // L'année est-elle l'année courante ?
            if ($i == date('Y')) {
                $selected = ' selected="selected"';
            }
            // Affichage de la ligne
            echo "\t", '<option value="', $i, '"', $selected, '>', $i, '</option>', "\n";
            // Remise à zéro de $selected
            $selected = '';
        }
        echo '</select>', "\n";
        echo "<br>";

        echo "<hr>";

        //en boucle WHILE
        $annee = 1920;

        echo "<label for\"annee\">Années de naissance : </label><select name=\"annee\">"; // ouverture d'element qui selectionne
        while ($annee <= 2021) {
            echo "<option value=\"\">" . $annee . "</option>"; // pour afficher le menu deroulant de l'echo de la boucle
            $annee++;
        }
        echo "</select>"; // fermeture de l'element select après la boucle

        echo "<hr>";

        //en boucle WHILE dans le sens inverse
        $annee2 = 2021;

        echo "<label for=\"toto\">Années de naissance : </label><select name=\"annee\">"; // ouverture d'element qui selectionne
        while ($annee2 >= 1920) {
            echo "<option value=\"\">" . $annee2 . "</option>"; // pour afficher le menu deroulant de l'echo de la boucle
            $annee2--;
        }
        echo "</select>"; // fermeture de l'element select après la boucle
        echo "<hr>";

        // en boucle DO WHILE
        // Elle a comme particularité de s'exécuter au moins une fois, la co,dition est testée après un premier passage

        $chamalow = 0; //valeur de la boucle 

        do {
            echo "<p>Je fais un petit tour de la boucle do..while</p>";
            $chamalow++;
        } while ($chamalow > 10); // la condition renvoie FALSE tout de suite, pourtant la boucle à tourné une fois!


        // mini exo 7
        // avec switch, si la variable $langue contient espagnol, vous dites hola, si c'est anglais vous dites hello si c'est francais vous dites bonjour

        $langue = "français";
        switch ($langue) {
            case "français":
                echo "Bonjour";
                break;
            case "anglais":
                echo "Hello";
                break;
            case "espagnol":
                echo "Hola";
                break;
            default:
                echo "Langue inconnue";
                break;
        }

        echo "<hr>";

        // réécrice ce switch avec if else if
        if ($langue == "français") {
            echo "Bonjour toi";
            if ($langue == "espagnol") {
                echo "Hola que tal?";
                if ($langue == "anglais") {
                    echo "Hello, where is bryan?";
                }
            }
        } else {
            echo "Allo, je ne comprends pas ta langue !";
        }
        echo "<hr>";

        if ($langue == "anglais") {
            echo "Hello you";
        } else {
            if ($langue == "français") {
                echo "Salut la grenouille";
            } else {
                if ($langue == "espagnol") {
                    echo "Hola que tal?";
                } else {
                    echo "Allo tu racontes quoi?";
                }
            }
        }

        //mini exo 8 
        //Afficher les mois de 1 à 12 à l'aide d'une boucle FOR dans un menu déroulant
        echo "<hr>";

        echo "<table class=\"table text-center\"><tbody><tr>";
        for ($mois = 1; $mois <= 12; $mois++) {
            $tab2[$mois] = $mois;
            // echo $mois; 
            echo "<td class=\"p-3 border border-white\">" . $mois . "</td>";
        }
        echo "</tr></tbody></table>";

        echo "<hr>";

        //mini exo 9
        //compléter cette boucle pour la mettre dans un tableau HTML

        echo $tab2[5];

        echo "<hr>";



        ?>



    </main>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>

</html>