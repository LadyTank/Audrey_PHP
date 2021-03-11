<?php
//la fonction define déclare la constante PI qui a une valeur de 3.1415926535, qui sera un boléen vrai
define("PI", 3.1415926535, TRUE); // définition insensible à la casse parce qu'on a mit TRUE

echo "La constante PI vaut ".PI."<br>";
echo "La constante PI vaut ",pi,"<br>";

// vérification de l'existence de la constante

if (defined( "PI")) echo "la constante est déjà définie<br>";

define("sitegravillon","https://www.gravillon.fr",FALSE);

echo "l'url de gravillons est : ".sitegravillon."<hr>";

echo "Visitez le site de <a href=\" ".sitegravillon."\"target=\"_blank\">Gravillon</a>";



?>