<?php require_once '../inc/functions.php'; ?> 
 <?php 
$db_heb = 'mysql:host=localhost;dbname=bibliotheque';
$db_user = 'root';
$db_pass = '';

try {
    $options=
    [
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
    PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
    ];

    $pdoBIB = new PDO($db_heb, $db_user, $db_pass, $options); //les variables appelée d'un fichier inc db_config.php avec les informations complètes, (info hebergeur, info connexion utilisateur, info mdp, optionnellement info d'autres variables comme $options dans ce cas)
    
    }
catch (PDOException $pe){
    echo "Erreur" .$pe->getMessage(); //avoir le detail du problème de connexion à la BDD à l'ecran
    }

    // Gestion des insertions de nouveaux livres

if ( !empty($_POST )) {

    $_POST['auteur'] = htmlspecialchars($_POST['auteur']); 
    $_POST['titre'] = htmlspecialchars($_POST['titre']);

    $resultat = $pdoBIB->prepare( " INSERT INTO livre (auteur, titre) VALUES (:auteur, :titre) " );

    $resultat->execute( array(
        ':auteur' => $_POST['auteur'],
        ':titre' => $_POST['titre'],
    ));
} 
?> 

<!doctype html>
<html lang="fr">
    <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <title>Bibliotheque gestion</title>
    </head>
        <body>
            <!-- Début jumbotron -->
            <div class="jumbotron container">
                <h1 class="display-4">Visualisation de la bibliotheque</h1>
                <p class="lead">Visualiser et Insérer de nouveaux livres</p>
                <hr class="my-4">
            </div> <!--fin de jumbo-->

            <div class="col-sm-12 container">
                <div class="row">
                    <div class="col-sm-12 col-md-8 mx-auto">
                        <h2 class="bg-warning text-center">Tous les livres</h2>
                        <?php 
                    // 1
                        $requete = $pdoBIB->query(" SELECT * FROM livre ORDER BY titre");

                    //  2 et 3
                        echo "<table class=\"table table-info table-striped p-4\">";
                        echo "<thead><tr><th scope=\"col\">ID_livre</th><th scope=\"col\">Auteur</th><th scope=\"col\">Titre</th><th scope=\"col\">Location</th></tr></thead>";
                        while($ligne = $requete->fetch(PDO::FETCH_ASSOC)) {
                            echo "<tr>";
                            echo "<td>#". $ligne['id_livre']. "</td>";   
                            echo "<td>".$ligne['auteur']. "</td>";
                            echo "<td>". $ligne['titre']. "</td>";
                            echo "<td>
                            <a href=\"00_bibliotheque_visu.php?id_livre=".$ligne['id_livre']."\"> Location </a></td></tr>";
                        }
                        echo "</table>";

                        $nbr_livres = $requete->rowCount();

                        echo "<p class=\"text-center\">Il y a " .$nbr_livres. " livres dans la base de données.</p>"; 
                        ?>
    
                    </div> <!--fin de col -->
                </div> <!--fin de row -->

                <div class="row">
                    <div class="col-sm-12 col-md-5 p-4 text-center m-auto">
                    <!-- Donc il faut un formulaire HTML avec action et method; action reste vide si nous insérons grâce à cette même page et POST va envoyer les informations du FORM dans la superglobale $_POST -->

                    <h2 class="bg-warning text-center p-4">Entrée d'un nouveau livre dans la base de données</h2>

                    <!-- début de formulaire -->
                    <form method="POST" action="" class="p-5 m-2">
                        <div class="form-group">
                            <label for="auteur">Auteur</label>
                            <input type="text " class="form-control text-right" name="auteur" id="auteur" >
                        </div>

                        <div class="form-group">
                            <label for="titre">Titre</label>
                            <input type="text" class="form-control text-right" name="titre" id="titre" >
                        </div>

                        <button type="submit" class="btn btn-small btn-warning">Envoyer</button>

                    </form> <!-- fin de formulaire -->
                    </div> <!--fin col-->
                </div> <!--fin de row-->

                <?php 

                ?> 

            </div><!--fin de container-->

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