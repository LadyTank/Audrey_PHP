<!-- Appel de mes fonctions prédéfinies en inc -->
<?php require_once '../inc/functions.php';  

// <!-- connexion à la BDD -->
require_once '../inc/db_config.php'; 
require_once '../inc/db_connexion.php'; ?> 

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

        $_POST['prenom'] = htmlspecialchars($_POST['prenom']); 
        $_POST['nom'] = htmlspecialchars($_POST['nom']);
        $_POST['sexe'] = htmlspecialchars($_POST['sexe']);
        $_POST['service'] = htmlspecialchars($_POST['service']);
        $_POST['date_embauche'] = htmlspecialchars($_POST['date_embauche']);
        $_POST['salaire'] = htmlspecialchars($_POST['salaire']);

        // $resultat = $pdoENT->prepare( " INSERT INTO employes (prenom, nom, sexe, service, salaire, date_embauche) VALUES (:prenom, :nom, :sexe, :service, :salaire, NOW()) " );

        $resultat = $pdoENT->prepare( " INSERT INTO employes (prenom, nom, sexe, service, salaire, date_embauche) VALUES (:prenom, :nom, :sexe, :service, :salaire, :date_embauche) " );

        $resultat->execute( array(
            ':prenom' => $_POST['prenom'],
            ':nom' => $_POST['nom'],
            ':sexe' => $_POST['sexe'],
            ':service' => $_POST['service'],
            ':date_embauche' => $_POST['date_embauche'],
            ':salaire' => $_POST['salaire'],
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
                <h1 class="display-4">COURS PHP 7 - Interface de gestion de BDD</h1>
                <hr class="my-4">
            </div> <!--fin de jumbo-->

            <!-- ********************************-->
            <!-- Contenu principal -->
            <!-- ********************************-->
            <main class="container bg-light p-4">
                
                <div class="row">
                    <div class="col-sm-12">
                    <h2 class="bg-warning text-center">Visualisation de tous les employés</h2>
                    <?php 
                // 1
                    $requete = $pdoENT->query(" SELECT * FROM employes ORDER BY sexe, nom");

                //  2 et 3

                    echo "<table class=\"table table-info table-striped p-4\">";
                    echo "<thead><tr><th scope=\"col\">ID</th><th scope=\"col\">Prénom</th><th scope=\"col\">Nom</th><th scope=\"col\">Sexe</th><th scope=\"col\">Service</th><th scope=\"col\">Date d'embauche</th><th scope=\"col\">Salaire</th><th scope=\"col\">Fiche</th></tr></thead>";
                    while($ligne = $requete->fetch(PDO::FETCH_ASSOC)) { // passe le resultat dans un tableau associatif
                        echo "<tr>";
                        echo "<td>#". $ligne['id_employes']. "</td>";   
                        echo "<td>";
                        if($ligne['sexe'] == 'f') {
                            echo "<span class=\"badge badge-secondary\">Mme ";
                        }else {
                            echo "<span class=\"badge badge-warning\">M. ";
                        }
                        echo $ligne['prenom']. "</td>";
                        echo "<td>". $ligne['nom']. "</td>";
                        if($ligne['sexe'] == 'f') {
                            echo "<td>Femme</td>";
                        }else {
                            echo "<td>Homme</td>";
                        }
                        echo "<td>". $ligne['service']. "</td>";
                        echo "<td>".date('d/m/Y',strtotime($ligne['date_embauche'])). "</td>";
                        echo "<td>". number_format($ligne['salaire'], 2, ',', ' '). " €</td>";
                        echo "<td>
                        <a href=\"02_fiche_employe.php?id_employes=".$ligne['id_employes']."\"> Voir sa fiche </a></td>";
                        echo "</tr>";
                    }
                    echo "</table>";

                    $nbr_employes = $requete->rowCount();

                    echo "<p class=\" text-center\">Il y a " .$nbr_employes. " employés dans la base de données.</p>";
                    
                    ?>
  
                    </div>
                </div>


                <div class="row">

                    <div class="col-sm-12 col-md-5 p-4 text-center m-auto">
                    <!-- Donc il faut un formulaire HTML avec action et method; action reste vide si nous insérons grâce à cette même page et POST va envoyer les informations du FORM dans la superglobale $_POST -->

                    <h2 class="bg-warning text-center p-4">Entrée d'un nouvel employé dans la base de données</h2>

                    <!-- début de formulaire -->
                    <form method="POST" action="" class="p-5 m-2">
                        <div class="form-group">
                            <label for="prenom">Prénom</label>
                            <input type="text " class="form-control text-right" name="prenom" id="prenom" >
                        </div>

                        <div class="form-group">
                            <label for="nom">Nom de famille</label>
                            <input type="text" class="form-control text-right" name="nom" id="nom" >

                        </div>

                        <div class="form-group">
                        <label for="sexe">Sexe : </label>
                            <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="sexe" id="sexe" value="f">
                            <label class="form-check-label" for="f">Femme</label>
                            </div>
                            <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="sexe" id="sexe" value="m">
                            <label class="form-check-label" for="m">Homme</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="service">Service</label>
                            <select id="service" name="service" class="form-control text-right">
                                <option selected>Choisir le service</option>
                                <option value="commercial">Commercial</option>
                                <option value="juridique">Juridique</option>
                                <option value="informatique">Informatique</option>
                                <option value="communication">Communication</option>
                                <option value="secretariat">Secrétariat</option>
                                <option value="production">Production</option>
                                <option value="comptabilite">Comptabilité</option>
                                <option value="direction">Direction</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="date_embauche">Date d'embauche</label>
                            <input type="date" class="form-control text-right" name="date_embauche" id="date_embauche">
                        </div>

                        <div class="form-group">
                            <label for="salaire">Salaire</label>
                            <input type="text" class="form-control text-right" name="salaire" id="salaire">
                        </div>

                        <button type="submit" class="btn btn-small btn-warning">Envoyer</button>

                    </form>
                    <!-- fin de formulaire -->
                    
                    </div> <!--fin col-->
                </div> <!--fin de row-->
                
               

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