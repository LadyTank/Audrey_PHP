<?php

// une pemière fonction
    function minPap() {
        echo "<p> Minute Papillon</p>";
    }

//  mini exo, faire une fonction qui affiche le jour de la semaine

function quelJour() {
    echo '<p>Nous sommes ';
    setlocale(LC_ALL,'fr_FR');
    echo strftime("%A"); 
    echo '</p>';
}

function quelJour2() {
    // l est la lettre pour donner le jour de la semaine en anglais
    echo '<p>We are '.date('l').'</p>';

}

function quelJour3() {
    setlocale(LC_ALL,'fr_FR');
    echo '<p>Nous sommes '.strftime("%A").'</p>';
}

// création d'une fonction pour "var_dump" une variable (très utile pour un tableau)
function jevardump($mavariable) {// la fonction nommée avec son paramètre, une variable
    echo "<br><small class=\"bg-warning text-white\">... var_dump </small><pre class=\"alert alert-warning w-75\">";
    var_dump( $mavariable );//une variable à laquelle on applique la fonction var_dump
    echo "</pre>";
}
// création d'une fonction pour "print_r" une variable (très utile pour un tableau)
function jeprintr($mavariable) {// la fonction nommée avec son paramètre, une variable
    echo "<br><small class=\"bg-danger text-white\">... print_r </small><pre class=\"alert alert-danger w-75\">";
    print_r( $mavariable );//une variable à laquelle on applique la fonction print_r
    echo "</pre>";
}



?>

