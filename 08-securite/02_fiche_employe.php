<!-- Appel de mes fonctions prédéfinies en inc -->
<?php require_once '../inc/functions.php';  

// <!-- connexion à la BDD -->
require_once '../inc/db_config.php'; 
require_once '../inc/db_connexion.php'; ?> 

<?php 
//   ISSET Détermine si une variable est déclarée et est différente de null
// voici la condition d'execution si la page recois bien un id_employés
if(isset($_GET['id_employes'])) { 

    $resultat = $pdoENT->prepare( "SELECT * FROM employes WHERE id_employes = :id_employes" );
    $resultat->execute(array(
        ':id_employes' => $_GET['id_employes']
    ));

    // print_r($resultat);
    // jeprintr($resultat->rowCount());

    if ($resultat->rowCount() == 0 ) { // si l'identifiant n'existe pas, donc si il y a 0 ligne $resultat, l'internaute est redirigé vers une uatre page
        header('location:02_employes.php'); // header nous envoie vers une autre page
        exit(); // on arrête le script
    }

    //
    $fiche = $resultat->fetch(PDO::FETCH_ASSOC); //declaration de la variable demandant à la requete de $resultat d'aller chercher à la BDD

    // jeprintr($fiche);


    } else { //sinon je fabrique un simple p
    header('location:02_employes.php'); // header nous envoie vers une autre page
    exit(); // on arrête le script               
    } 

// gérer les modifications

if (!empty( $_POST )) {
    $_POST[ 'prenom' ] = htmlspecialchars($_POST[ 'prenom' ]);
    $_POST[ 'nom' ] = htmlspecialchars($_POST[ 'nom' ]);
    $_POST[ 'sexe' ] = htmlspecialchars($_POST[ 'sexe' ]);
    $_POST[ 'service' ] = htmlspecialchars($_POST[ 'service' ]);
    $_POST[ 'date_embauche' ] = htmlspecialchars($_POST[ 'date_embauche' ]);
    $_POST[ 'salaire' ] = htmlspecialchars($_POST[ 'salaire' ]);
    jeprintr($_POST);

    $resultat = $pdoENT->prepare( "UPDATE employes SET prenom = :prenom, nom = :nom, sexe = :sexe, service = :service, date_embauche = :date_embauche, salaire = :salaire WHERE id_employes = :id_employes");

    $resultat->execute( array(
        ':prenom' => $_POST[ 'prenom' ],
        ':nom' => $_POST[ 'nom' ],
        ':sexe' => $_POST[ 'sexe' ],
        ':service' => $_POST[ 'service' ],
        ':date_embauche' => $_POST[ 'date_embauche' ],
        ':salaire' => $_POST[ 'salaire' ],
        ':id_employes' => $_GET[ 'id_employes' ],
    ));
    header( 'location:02_employes.php');
    exit();
} // fin du if empty
?> 
<!-- if (isset($_POST['pseudo']) { echo "..."; } else { echo '';} si il n'y a rien je mets une chaîne vide opérateur de coalescence-->


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

    <title>Employé  <?php echo $fiche['id_employes'] ?></title>

    </head>


        <body>
            <!-- navigation en include  -->
        <?php
            require '../inc/navbar.inc.php';
        ?>
            <!-- Début jumbotron -->
            <div class="jumbotron container">
                <h1 class="display-4 text-center">Fiche - Employé <?php echo $fiche['prenom']." ".$fiche['nom'] ?></h1>
                <hr class="my-4">
            </div> <!--fin de jumbo-->

            <!-- ********************************-->
            <!-- Contenu principal -->
            <!-- ********************************-->
            <main class="container bg-light p-4">
                
                <div class="row">
                    <div class="col-sm-6 p-4 text-center m-auto">
                        <!-- Donc il faut un formulaire HTML avec action et method; action reste vide si nous insérons grâce à cette même page et POST va envoyer les informations du FORM dans la superglobale $_POST -->

                        <h2 class="bg-warning text-center p-4">Modification d'un employé dans la base de données</h2>

                        <!-- début de formulaire -->
                        <form method="POST" action="" class="p-5 m-2">
                            <div class="form-group">
                                <label for="prenom">Prénom</label>
                                <input type="text" class="form-control text-right" name="prenom" id="prenom" value="<?php echo $fiche['prenom']; ?>" >
                            </div>

                            <div class="form-group">
                                <label for="nom">Nom de famille</label>
                                <input type="text" class="form-control text-right" name="nom" id="nom" value="<?php echo $fiche['nom']; ?>">

                            </div>

                            <!-- <div class="form-group">
                                <label for="sexe">Sexe : </label>
                                <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sexe" id="sexe" value="f" checked > Femme
                                </div>
                                <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sexe" id="sexe" value="m"> Homme
                                </div>
                            </div> -->

                            <div class="form-group">
                                <label for="sexe">Sexe : </label>
                                <div class="form-check form-check-inline">
                                <input class="form-check-input m-3" type="radio" name="sexe" id="sexe" value="f" checked> Femme
                                <input class="form-check-input m-3" type="radio" name="sexe" id="sexe" value="m" <?php if (isset($fiche['sexe']) && $fiche['sexe'] == 'm') echo 'checked'; ?>> Homme
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="salaire">Salaire</label>
                                <input type="text" class="form-control text-right" name="salaire" id="salaire" value="<?php echo $fiche['salaire']." €"; ?>">
                            </div>

                            <div class="form-group">
                                <label for="date_embauche">Date d'embauche</label>
                                <input type="date" class="form-control text-right" name="date_embauche" id="date_embauche" value="<?php echo $fiche['date_embauche']; ?>">
                            </div>
                            
                            <!-- LE MENU déroulant des services -->
                            <div class="form-group">
                                <label for="service">Service</label>
                                <select id="service" name="service" class="form-control text-right">
                                    <option value="commercial" <?php if (!(strcmp( "commercial", $fiche[ 'service' ]))) {echo "selected=\"selected\"";} ?>> Commercial</option>

                                    <option value="juridique" <?php if (!(strcmp( "juridique", $fiche[ 'service' ]))) {echo "selected=\"selected\"";} ?>> Juridique</option>

                                    <option value="informatique" <?php if (!(strcmp( "informatique ", $fiche[ 'service' ]))) {echo "selected=\"selected\"";} ?>> Informatique</option>

                                    <option value="communication" <?php if (!(strcmp( "communication ", $fiche[ 'service' ]))) {echo "selected=\"selected\"";} ?>> Communication</option>

                                    <option value="secretariat" <?php if (!(strcmp( "secretariat ", $fiche[ 'service' ]))) {echo "selected=\"selected\"";} ?>> Secrétariat</option>

                                    <option value="production" <?php if (!(strcmp( "production ", $fiche[ 'service' ]))) {echo "selected=\"selected\"";} ?>> Production</option>

                                    <option value="direction" <?php if (!(strcmp( "direction ", $fiche[ 'service' ]))) {echo "selected=\"selected\"";} ?>> Direction</option>

                                    <option value="comptabilite" <?php if (!(strcmp( "comptabilite ", $fiche[ 'service' ]))) {echo "selected=\"selected\"";} ?>> Comptabilité</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-small btn-warning">Modifier</button>
                        </form>
                        <!-- fin de formulaire -->       
                        </div> <!--fin col-->

                    <div class="col-sm-6 m-auto">
                        <div class="card text-center m-auto alert alert-danger border border-danger" style="width: 18rem;">
                            <h5 class= "p-3">Fiche Employé ID : <?php echo $fiche['id_employes'];?> </h5>
                            <ul class="list-group list-group-flush border border-danger ">
                                <li class="list-group-item">
                                <?php 
                                echo "Nom : ".$fiche['nom'];
                                ?> 
                                </li>
                                <li class="list-group-item">
                                <?php 
                                echo "Prénom : ".$fiche['prenom'];
                                ?> 
                                </li>
                                <li class="list-group-item">
                                <?php 
                                
                                echo "Sexe : ";
                                if($fiche['sexe'] == 'f') {
                                    echo "Femme ";
                                }else {
                                    echo "Homme ";
                                }
                                ?> 
                                </li>
                                <li class="list-group-item">
                                <?php 
                                echo "Service : ".$fiche['service'];
                                ?> 
                                </li>
                                <li class="list-group-item">
                                <?php 
                                echo "Date d'embauche : ".date('d/m/Y',strtotime($fiche['date_embauche']));
                                ?> 
                                </li>
                                <li class="list-group-item">
                                <?php 
                                echo "Salaire : ".$fiche['salaire']. " €";
                                ?> 
                                </li>
                            
                            
                            </ul>
                        </div>
                    </div>
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