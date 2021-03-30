<!-- Appel de mes fonctions prédéfinies en inc -->
<?php require_once '../inc/functions.php'; ?> 

<!-- connexion à la BDD -->
<?php require_once '../inc/db_config2.php'; ?> 
<?php require_once '../inc/db_connexion2.php'; ?> 

<!-- traitement du formulaire et insertion dans la BDD-->
<?php 
// A ne pas faire de préférence car n'est PAS ASSEZ SECURISE !!!!
    // if ( !empty($_POST )) {
    //     $resultat = $pdoDIA->query( "INSERT INTO commentaire (pseudo, date_enregistrement, message) VALUES ('$_POST[pseudo]', NOW(), '$_POST[message]')" );
        // NOW() renvoie la date d'aujourd'hui ATTENTION dans l'exemple l'ordre "mélangé" des indices facilite l'injection SQL
    // }

    // OU en mode prepare()
        // métode de traitement de formulaire
    if ( !empty($_POST )) {
        // Pour se prémunir des failles de sécurité, nous faisaons ceci :

        $_POST['pseudo'] = htmlspecialchars($_POST['pseudo']); //htmlspecialchars — Convertit les caractères spéciaux en entités HTML
        $_POST['message'] = htmlspecialchars($_POST['message']);


        $resultat = $pdoDIA->prepare( " INSERT INTO commentaire (pseudo, date_enregistrement, message) VALUES (:pseudo, NOW(), :message) " );

        $resultat->execute( array(
            ':pseudo' => $_POST['pseudo'],
            ':message' => $_POST['message'],
        ));
    } // fin du if (!empty($_POST))
    // Le fait de mettre des marqueurs dans la requête permet de ne pas concaténer les instructions SQL d'origine et celles ci seraient injectées. Ainsi elles ne peuvent pas executer successivement. De plus, en liant les marqueurs à leur valeur dans execute(), PDO les neutralise automatiquement et les transforment en chaînes de caractères innovensives.
?> 

<!doctype html>
<html lang="fr">
    <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <!-- mes styles -->
    <link rel="stylesheet" href="../css/style.css">

    <title>COURS PHP 7 - Sécurité & PHP</title>
    </head>
        <body>
            <!-- navigation en include  -->
    <?php
        require '../inc/navbar.inc.php';
    ?>
            <!-- Début jumbotron -->
            <div class="jumbotron container">
                <h1 class="display-4">COURS PHP 7 - 01 Dialogue</h1>
                <hr class="my-4">
            </div> <!--fin de jumbo-->

            <!-- ********************************-->
            <!-- Contenu principal -->
            <!-- ********************************-->
            <main class="container bg-light">

                <div class="row">
                    <div class="col-sm-12 col-md-6 p-4">
                    <!-- Donc il faut un formulaire HTML avec action et method; action reste vide si nous insérons grâce à cette même page et POST va envoyer les informations du FORM dans la superglobale $_POST -->

                    <!-- début de formulaire -->
                    <form method="POST" action="" class="p-2 m-2">
                        <div class="form-group">
                            <label for="pseudo">Pseudo</label>


                            <input type="text" class="form-control" name="pseudo" id="pseudo" value=""> <!-- le name est important il va permettre de créer les indices, les marqueurs -->
                        </div>

                        
                        <div class="form-group">
                            <label for="message">Message</label>


                            <textarea class="form-control" name="message" id="msg" cols="50" rows="10" value=""></textarea>                
                        </div>
                        <button type="submit" class="submit ">Envoyer</button>
                
                    </form>
                    <!-- fin de formulaire -->
                    
                    </div> <!--fin col-->

                    <div class="col-sm-12 col-md-6 p-4 ">
                        <div class="row pl-3">
                            <h3>1 - Création d'une BDD "dialogue" avec les informations suivantes :</h3>
                            <ul class="border border-dark bg-warning p-5">
                                <li>Nom de la BDD : dialogue</li>
                                <li>Nom de la table : commentaire</li>
                                <li>la table contient les champs suivant :</li> 
                                <li>Champs : id_commentaire INT PK AI</li>
                                <li>Pseudo : VARCHAR(20)</li>
                                <li>message : TEXT</li>
                                <li>date_enregistrement : DATETIME</li>
                            </ul>
                        </div>

                    
                    </div> <!--fin col-->
                
                </div> <!--fin row-->

                <div class="row">
                    <div class="col-sm-12 p-4">
                        <h3>2 - Création d'un tableau php pour afficher tous les commentaires</h3>
                    <?php 
                        $requete = $pdoDIA->query ("SELECT* FROM commentaire ORDER BY date_enregistrement ASC"); 
                    
                        $nbr_commentaire = $requete->rowCount();
                    
                        echo "<p>Il y a " .$nbr_commentaire. " commentaire dans la base de données.</p><hr>";
                    
                        // echo "<ul class=\"border border-warning w-50 p-4\">";
                        // while ( $ligne = $requete->fetch(PDO::FETCH_ASSOC)){
                        //     echo "<li>".$ligne['message'].'</li>';
                        // }
                        // echo "</ul>";
                        // OU
                    
                        echo "<table class=\"table table-info table-striped text-center\">";
                        echo "<thead><tr><th scope=\"col\">id_commenaire</th><th scope=\"col\">Pseudo</th><th scope=\"col\">Message</th><th scope=\"col\">Date d'enregistrement</th></tr></thead>";
                        while($ligne = $requete->fetch(PDO::FETCH_ASSOC)) {
                            if ($ligne['message'] != '') {
                    
                            echo "<tr>";
                            echo "<td>". $ligne['id_commentaire']. "</td>";
                            echo "<td>". $ligne['pseudo']. "</td>";
                            echo "<td>". $ligne['message']. "</td>"; 
                            echo "<td>". $ligne['date_enregistrement']. "</td>";  
                            echo "</tr>";
                        }}
                        echo "</table>";
                    
                        
                        // Modifier des informations déjà existante dans la BDD, içi rajout d'informatation à l'identifiant commentaire 12 qui était vide
                        $pdoDIA->exec('UPDATE commentaire SET pseudo = \'Barbie\', message = "Je suis d\'accord" WHERE id_commentaire = 12');
                    
                        // Supprimer une ligne de la BDD
                        $pdoDIA->exec('DELETE FROM commentaire WHERE id_commentaire = 13');
                    
                        // Supprimer une information dans une cellule de la BDD se fait par modification
                        // $pdoDIA->exec('DELETE FROM commentaire  WHERE id_commentaire = 7');
                        $pdoDIA->exec('UPDATE commentaire SET pseudo = \'\' WHERE id_commentaire = 7');
                    ?> </div>
                </div>  <!--fin row-->
            </main>





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

        <!-- footer en include -->
    <?php include '../inc/footer.inc.php'; ?>
        </body>
</html>