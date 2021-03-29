<!-- Appel de mes fonctions prédéfinies en inc -->
<?php require_once '../inc/functions.php'; ?> 

<!-- connexion à la BDD -->
<?php require_once '../inc/db_config.php'; ?> 
<?php require_once '../inc/db_connexion.php'; ?> 

<!-- traitement du formulaire de suppression dans la BDD-->
<?php 
    if ( !empty($_GET )) {

        $_GET['id_employes'] = htmlspecialchars($_GET['id_employes']); //pour proteger la saisie

        $resultat = $pdoENT->prepare( " DELETE FROM employes WHERE id_employes = :id_employes " ); //préparer la requête

        $resultat->execute( array(      // executer la requête
            ':id_employes' => $_GET['id_employes'] 
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
                <h1 class="display-4">COURS PHP 7 - exercice employés</h1>
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
                    $requete = $pdoENT->query(" SELECT * FROM employes ORDER BY nom");

                //  2 et 3

                    echo "<table class=\"table table-info table-striped p-4\">";
                    echo "<thead><tr><th scope=\"col\">ID</th><th scope=\"col\">Prénom</th><th scope=\"col\">Nom</th><th scope=\"col\">Sexe</th><th scope=\"col\">Service</th><th scope=\"col\">Date d'embauche</th><th scope=\"col\">Salaire</th></tr></thead>";
                    while($ligne = $requete->fetch(PDO::FETCH_ASSOC)) {
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
                        echo "<td>". $ligne['sexe']. "</td>";
                        echo "<td>". $ligne['service']. "</td>";
                        echo "<td>".date('d/m/Y',strtotime($ligne['date_embauche'])). "</td>";
                        echo "<td>". number_format($ligne['salaire'], 2, ',', ' '). " €</td>";
                        echo "</tr>";
                    }
                    echo "</table>";

                    $nbr_employes = $requete->rowCount();

                    echo "<p>Il y a " .$nbr_employes. " employés dans la base de données.</p>";
                    
                    ?>
  
                    </div>
                </div>


                <div class="row">



                    <div class="col-sm-12 col-md-5 p-4 text-center m-auto">
                    <h2 class="bg-warning text-center">Suppresion d'un employé dans la base de données</h2>

                    <!-- début de formulaire -->
                    <form method="GET" action="" class="p-5 m-2">
                        <div class="form-group">
                            <label for="id_employes">ID_employé</label>
                            <input type="text" class="form-control" name="id_employes" id="id_employes" >
                        </div>

                        <button type="submit" class="btn btn-small btn-warning">Supprimer</button>

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