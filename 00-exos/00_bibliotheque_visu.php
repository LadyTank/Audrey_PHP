<?php require_once '../inc/functions.php'; ?>
<?php
$db_heb = 'mysql:host=localhost;dbname=bibliotheque';
$db_user = 'root';
$db_pass = '';

try {
    $options =
        [
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
            PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
        ];

    $pdoBIB = new PDO($db_heb, $db_user, $db_pass, $options); //les variables appelée d'un fichier inc db_config.php avec les informations complètes, (info hebergeur, info connexion utilisateur, info mdp, optionnellement info d'autres variables comme $options dans ce cas)

} catch (PDOException $pe) {
    echo "Erreur" . $pe->getMessage(); //avoir le detail du problème de connexion à la BDD à l'ecran
}

// /////////////////////////////////////////////////////////////////////////////////////////////////////
//  Pour le visuel de la fiche à la reception de $_get id_livre, lecture de la table livre
if (isset($_GET['id_livre'])) {
    $resultat = $pdoBIB->prepare("SELECT * FROM livre WHERE id_livre = :id_livre");
    $resultat->execute(array(
        ':id_livre' => $_GET['id_livre']
    ));

    $fiche = $resultat->fetch(PDO::FETCH_ASSOC); //declaration de la variable demandant à la requete de $resultat d'aller chercher à la BDD
}
// /////////////////////////////////////////////////////////////////////////////////////////////////////

// Insertion d'une location dans la table emprunt
if (!empty($_POST['id_livre'])) {
    $_POST['id_livre'] = htmlspecialchars($_POST['id_livre']);
    $_POST['id_abonne'] = htmlspecialchars($_POST['id_abonne']);
    $_POST['date_sortie'] = htmlspecialchars($_POST['date_sortie']);
    // jeprintr($_POST);

    $resultat = $pdoBIB->prepare("INSERT INTO emprunt (id_livre, id_abonne, date_sortie) VALUES (:id_livre, :id_abonne, :date_sortie)");

    $resultat->execute(array(
        ':id_livre' => $_GET['id_livre'],
        ':id_abonne' => $_POST['id_abonne'],
        ':date_sortie' => $_POST['date_sortie'],
    ));


    // header( 'location:00_bibliotheque.php');
    // exit();
} // fin du if empty
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
        <h1 class="display-4">Fiche et Location d'un livre identifié</h1>
        <p class="lead"></p>
        <hr class="my-4">
    </div>
    <!--fin de jumbo-->

    <div class="container">
        <div class="row mx-auto">
            <div class="col-sm-12 col-md-6">
                <div class="card text-center alert alert-danger border border-danger p-5 mx-auto" style="width: 18rem;">
                    <h5 class="p-3">Fiche Livre ID : <?php echo $fiche['id_livre']; ?> </h5>
                    <ul class="list-group list-group-flush border border-danger ">
                        <li class="list-group-item">
                            <?php
                            echo "Auteur : <br>" . $fiche['auteur'];
                            ?>
                        </li>
                        <li class="list-group-item">
                            <?php
                            echo "Titre : <br>" . $fiche['titre'];
                            ?>
                        </li>
                    </ul>
                </div>
                <!--fin de card-->
            </div>

            <div class="col-sm-12 col-md-6 p-4 text-center m-auto">
                <h2 class="bg-warning text-center p-4">Espace location</h2>

                <!-- début de formulaire -->
                <form method="POST" action="" class="p-5 m-2">

                    <div class="form-group">
                        <label for="id_livre">ID livre</label>
                        <input type="text " class="form-control text-right" name="id_livre" id="id_livre" value="<?php echo $_GET['id_livre']; ?>">
                    </div>

                    <div class="form-group">
                        <label for="id_abonne">ID abonné</label>
                        <input type="text " class="form-control text-right" name="id_abonne" id="id_abonne">
                    </div>

                    <div class="form-group">
                        <label for="date_sortie">Date de sortie</label>
                        <input type="date" class="form-control text-right" name="date_sortie" id="date_sortie">
                    </div>

                    <button type="submit" class="btn btn-small btn-warning">Location</button>

                </form><!-- fin de formulaire -->
                <button type="button" class="btn btn-small btn-success"><a href="00_retour_location.php?id_livre= <?php echo $fiche['id_livre']; ?>">Restitution</a></button>

            </div>
            <!--fin col-->

        </div>
        <!--fin de row -->

    </div>
    <!--fin de container -->

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