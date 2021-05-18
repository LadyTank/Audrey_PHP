<?php

$db_heb = 'mysql:host=localhost;dbname=entreprise';
$db_user = 'root';
$db_pass = '';

$options =
    [
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
        PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
    ];

$pdoENT = new PDO($db_heb, $db_user, $db_pass, $options);

?>


<!doctype html>
<html lang="fr">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <title>Exo de connexion à la BDD</title>
</head>
<!-- ********************************-->
<!-- Contenu principal -->
<!-- ********************************-->

<body>
    <!-- Début jumbotron -->
    <div class="jumbotron container">
        <h1 class="display-4">Exo connexion à la BDD</h1>
        <hr class="my-4">
    </div>
    <!--fin de jumbo-->

    <div class="col-sm-12">
        <div class="row">
            <?php
            $requete = $pdoENT->query(" SELECT * FROM employes ORDER BY sexe, nom");
            echo "<table class=\"table table-info table-striped p-4\">";
            echo "<thead><tr><th scope=\"col\">ID</th><th scope=\"col\">Prénom</th><th scope=\"col\">Nom</th><th scope=\"col\">Sexe</th><th scope=\"col\">Service</th><th scope=\"col\">Date d'embauche</th><th scope=\"col\">Salaire</th><th scope=\"col\">Fiche</th></tr></thead>";
            while ($ligne = $requete->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>";
                echo "<td>#" . $ligne['id_employes'] . "</td>";
                echo "<td>";
                if ($ligne['sexe'] == 'f') {
                    echo "<span class=\"badge badge-secondary\">Mme ";
                } else {
                    echo "<span class=\"badge badge-warning\">M. ";
                }
                echo $ligne['prenom'] . "</td>";
                echo "<td>" . $ligne['nom'] . "</td>";
                if ($ligne['sexe'] == 'f') {
                    echo "<td>Femme</td>";
                } else {
                    echo "<td>Homme</td>";
                }
                echo "<td>" . $ligne['service'] . "</td>";
                echo "<td>" . date('d/m/Y', strtotime($ligne['date_embauche'])) . "</td>";
                echo "<td>" . number_format($ligne['salaire'], 2, ',', ' ') . " €</td>";
                echo "<td>
                        <a href=\"../08-securite/02_fiche_employe.php?id_employes=" . $ligne['id_employes'] . "\"> Voir sa fiche </a></td>";
                echo "</tr>";
            }
            echo "</table>";

            $nbr_employes = $requete->rowCount();

            echo "<p>Il y a " . $nbr_employes . " employés dans la base de données.</p>";

            // avec foreach

            // foreach ( $pdoENT->query( " SELECT nom FROM employes ORDER BY nom " ) as $infos ) { 
            //     echo "<tr>";
            //     echo "<td>";
            //     if ( $infos['sexe'] == 'f') {
            //         echo "<span class=\"badge badge-secondary\">Mme ";
            //     } else {
            //         echo "<span class=\"badge badge-warning\">M. ";
            //     } echo $infos['nom']. " " .$infos['prenom']. "</span></td>";
            //     echo "<td>" .$infos['service']. " </td>";

            //     // Notation date en français
            //     echo "<td>" .strftime('%d/%m/%Y',strtotime($infos['date_embauche'])). " </td>";
            //     // ou echo "<td>" .date('d/m/Y',strtotime($infos['date_embauche'])). " </td>";

            //     // Notation format français
            //     $nombre_format_francais = number_format($infos['salaire'], 2, ',', ' ');
            //     echo "<td>" .$nombre_format_francais. " €</td>";
            //     echo "</tr>";
            //     }

            // exo, faire un formulaire pour entrer, modifier et supprimer des employés

            ?>


        </div>
    </div>





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