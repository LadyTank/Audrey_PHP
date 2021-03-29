<?php 

// Création ou ouvertue de session
echo '<h1> COURS PHP 7 - SESSION </h1>';

echo '<p>Les données du fichier session sont accessibles et manipulables à partir de la superglobales $_SESSION.</p>';

// Cette fonciton si on a besoin des informations de session, devra être placé au début de chaque page
session_start(); // permet de créer un fichier (temporaire) de session avec son identifiant ou d'ouvrir la session si l'identifiant existe déjà et que l'on a reçu un cookie avec l'ID dedans.

// Principe des sessions : un fichier temporaire appelé "session" est crée sur le serveur; avec un identifiant unique. Cette session est liée à un internaute, dans le même temps un cookie est déposé sur le poste de l'internaute avec l'identifiant ( au nom de PHPSESSID). Ce cookie se détruit quand on quitte le navigateur.
// Le fichier de session peut contenir des informations sensibles !!! Il n'est pas accessible 

$_SESSION['pseudo'] = 'Tintin';
$_SESSION['mdp'] = '1234';
$_SESSION['email'] = 'tintin@moule.be';

echo '<p>La session est remplie.</p>';
echo '<pre>';
print_r($_SESSION);
echo '</pre>';

//  il est possible de vider une partie de la session avec unset()
// unset($_SESSION['mdp']);
// echo '<pre>';
// print_r($_SESSION);
// echo '</pre>';

//  Supprimer entièrement une session
session_destroy(); // suppresion totale de la session et du fichier de session // avec cette fonction activé sur le fichier 02_session il n'y a plus rien.

// echo '<p>La session est détruite.</p>'; // nous avons effectué un session_destroy() qui sera executé à la fin du script. Nous pouvons donc encore voir le contenu de la session mais le fichier temporaire dans le dossier temp a bien été supprimé.

// Ce fichier contient les informations de session et elles sont accessibles grâce à session_start()

// echo '<pre>';
// print_r($_SESSION);
// echo '</pre>';



?> 