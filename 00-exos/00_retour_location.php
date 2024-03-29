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

//   ISSET Détermine si une variable est déclarée et est différente de null
// voici la condition d'execution si la page recois bien un id_livre
if (isset($_GET['id_livre'])) {
    $resultat = $pdoBIB->prepare("SELECT * FROM livre WHERE id_livre = :id_livre");
    $resultat->execute(array(
        ':id_livre' => $_GET['id_livre']
    ));

    $fiche = $resultat->fetch(PDO::FETCH_ASSOC); //declaration de la variable demandant à la requete de $resultat d'aller chercher à la BDD
    echo var_dump($_GET);
}
// else { /
// header('location:00_bibliotheque.php'); 
// exit();           
// } 


// gérer les modifications de la fiche livre
if (!empty($_POST['id_livre']) && ($_POST['id_abonne']) && ($_POST['id_emprunt']) && ($_POST['date_rendu'])) {
    if (!empty($_POST['date_rendu'] && (isset($_POST['id_emprunt'])))) {

        // proteger les champs de saisies
        $_POST['id_emprunt'] = htmlspecialchars($_POST['id_emprunt']);
        $_GET['id_livre'] = htmlspecialchars($_GET['id_livre']);
        $_POST['id_abonne'] = htmlspecialchars($_POST['id_abonne']);
        $_POST['date_rendu'] = htmlspecialchars($_POST['date_rendu']);

        // preparer la requete
        $requete = $pdoBIB->prepare("UPDATE emprunt SET date_rendu = :date_rendu WHERE id_emprunt = :id_emprunt AND id_livre = : id_livre");

        $ligne = $requete->fetch(PDO::FETCH_ASSOC);
        // executer la requete avec l'indication des marqueurs
        $requete->execute(array(
            ':id_emprunt' => $_POST['id_emprunt'],
            ':id_livre' => $_POST['id_livre'],
            ':id_abonne' => $_POST['id_abonne'],
            ':date_rendu' => $_POST['date_rendu'],
        ));

        jeprintr($_POST);
    } // fin du if empty
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
        <h1 class="display-4">Restitution d'une location d'un livre identifié</h1>
        <p class="lead">Restituer</p>
        <hr class="my-4">
    </div>
    <!--fin de jumbo-->

    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-6 mb-4">
                <div class="card text-center m-auto alert alert-danger border border-danger" style="width: 18rem;">
                    <h5 class="p-3">Fiche Livre ID : <?php echo $fiche['id_livre']; ?> </h5>

                    <ul class="list-group list-group-flush border border-danger ">

                        <li class="list-group-item">
                            <?php
                            echo "Auteur : " . $fiche['auteur'];
                            ?>
                        </li>
                        <li class="list-group-item">
                            <?php
                            echo "Titre : " . $fiche['titre'];
                            ?>
                        </li>
                    </ul>
                </div>
                <!--fin de card-->
            </div>
            <!--fin de col-->
            <div class="col-sm-12 col-md-6 p-4 text-center m-auto">
                <h2 class="bg-warning text-center p-4">Restitution</h2>

                <!-- début de formulaire -->
                <form method="POST" action="" class="p-5 m-2">
                    <div class="form-group">
                        <label for="id_emprunt">ID emprunt</label>
                        <input type="text " class="form-control text-right" name="id_emprunt" id="id_emprunt" value="<?php echo $fiche['id_emprunt'] ?? '';  ?>">
                    </div>
                    <div class="form-group">
                        <label for="id_livre">ID livre</label>
                        <input type="text " class="form-control text-right" name="id_livre" id="id_livre" value="<?php echo $_GET['id_livre']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="id_abonne">ID abonné</label>
                        <input type="text " class="form-control text-right" name="id_abonne" id="id_abonne">
                    </div>

                    <div class="form-group">
                        <label for="date_rendu">Date de rendu</label>
                        <input type="date" class="form-control text-right" name="date_rendu" id="date_rendu">
                    </div>

                    <button type="submit" class="btn btn-small btn-warning">Restitution</button>

                </form><!-- fin de formulaire -->
            </div>
            <!--fin col-->

        </div>
        <!--fin de row-->
        <div class="col-sm-12 ">
            <h2 class="bg-warning text-center">Toutes les locations</h2>
            <?php
            // 1
            $requete = $pdoBIB->query(" SELECT * FROM emprunt ORDER BY id_emprunt DESC");

            //  2 et 3
            echo "<table class=\"table table-info table-striped p-4\">";
            echo "<thead><tr><th scope=\"col\">ID_emprunt</th><th scope=\"col\">ID_abonné</th><th scope=\"col\">id_livre</th><th scope=\"col\">date de sortie</th><th scope=\"col\">date de rendu</th></tr></thead>";
            while ($ligne = $requete->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>";
                echo "<td>#" . $ligne['id_emprunt'] . "</td>";
                echo "<td>#" . $ligne['id_abonne'] . "</td>";
                echo "<td>#" . $ligne['id_livre'] . "</td>";
                echo "<td>" . $ligne['date_sortie'] . "</td>";
                echo "<td>";
                if (!empty($ligne['date-rendu'])) {
                    echo "SORTI";
                } else {
                    echo $ligne['date_rendu'];
                }
                echo "</td>";
                echo "</tr>";
            }
            echo "</table>";
            ?>

        </div>
        <!--fin row-->
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