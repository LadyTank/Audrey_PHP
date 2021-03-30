<?php 
// création de mes fonctions appelées sur les pages à la connexion car ce fichier est liré à init.php

//  - 1- création d'une fonction pour "var_dump" et "print-r" dans une variable 

function jevar_dump($mavariable) {
    echo "<br><small class=\"bg-warning text-white\">... var_dump </small><pre class=\"alert alert-warning w-75\">";
    var_dump( $mavariable );
    echo "</pre>";
} 
function jeprint_r($mavariable) {
    echo "<br><small class=\"bg-danger text-white\">... print_r </small><pre class=\"alert alert-danger w-75\">";
    print_r( $mavariable );
    echo "</pre>";
}

////////// 2 - FONCTION POUR EXECUTER LES prepare() //////////////

function executeRequete($requete, $parametres = array ()) { // utile pour toutes les requêtes du site
    foreach ($parametres as $indice => $valeur) {           // foreach
        $parametres[$indice] = htmlspecialchars($valeur);   // on évite les injections, protection des données
        global $pdoSITE;                                    // "global" nous permet d'accéder à la variable $pdoSITE dans l'espace global du fichier init.php // on la transforme en variable globale
        $resultat = $pdoSITE->prepare($requete); // préparer la requete
        $succes = $resultat->execute($parametres); // execute la requete
        if ($succes === false) {
            return false; // si la requête  n'a pas marché je renvoie false
        } else {
            return $resultat; // sinon on renvoie les résultats
        }// fin if else 
    }
}// fermeture fonction executeRequete

////////// 3 - VERIFIER SI LE MEMBRE EST CONNECTE //////////////

////////// 4 - VERIFIER LE STATUT DU MEMBRE //////////////



?> 