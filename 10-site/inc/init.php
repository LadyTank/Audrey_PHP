<?php
// init.php

// fichier indispensable au fonctionnement du site //

// ///////// 1 - CONNEXION A LA BDD ///////// //
$pdoSITE = new PDO(
    'mysql:host=localhost;dbname=site',
    'root',
    '',
    array(
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
        PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
    )
);

// ///////// 2 - OUVERTURE DE SESSION ///////// //
session_start();

// ///////// 3 - CHEMIN DU SITE AVEC UNE CONSTANTE /////// // 
// Constante qui définit le dossier dans lequel se situe le sute pour pouvoir déterminer les chemins absolus
// ainsi nous écrirons tous les chemins des src ou des href e, anspmi avec cette constante
// chez l'hebergeur on se contente de define ('RACINE_SITE', '/')
define('RACINE_SITE', '/Audrey_PHP/10-site/');

// ///////// 4 - VARIABLE POUR LES CONTENUS ///////// //
$contenu = ''; // déclaration d'une variable pour introduire une variable vide

// ///////// 5 - INCLUSION DES FONCTIONS ///////// //
require_once 'functions.php';
