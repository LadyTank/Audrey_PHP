<?php 

// Création ou ouvertue de session
echo '<h1> COURS PHP 7 - SESSION </h1>';

echo '<p>Les données du fichier session sont accessibles et manipulables à partir de la superglobales $_SESSION.</p>';

session_start(); // permet de créer un fichier (temporaire) de session avec son identifiant ou d'ouvrir la session si l'identifiant existe déjà et que l'on a reçu un cookie avec l'ID dedans.

$_SESSION['pseudo'] = 'Tintin';
$_SESSION['mdp'] = '1234';
$_SESSION['email'] = 'tintin@moule.be';

echo '<p>La session est remplie.</p>';
echo '<pre>';
print_r($_SESSION);
echo '</pre>';
?> 