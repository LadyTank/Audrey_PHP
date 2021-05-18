<?php
require_once 'inc/init.php';

// jeprint_r($_SESSION); 

// métode de traitement de formulaire
if (!empty($_POST)) {

    $_POST['pseudo'] = htmlspecialchars($_POST['pseudo']);
    $_POST['mdp'] = htmlspecialchars($_POST['mdp']);
    $_POST['nom'] = htmlspecialchars($_POST['nom']);
    $_POST['prenom'] = htmlspecialchars($_POST['prenom']);
    $_POST['email'] = htmlspecialchars($_POST['email']);
    $_POST['civilite'] = htmlspecialchars($_POST['civilite']);
    $_POST['adresse'] = htmlspecialchars($_POST['adresse']);
    $_POST['code_postal'] = htmlspecialchars($_POST['code_postal']);
    $_POST['ville'] = htmlspecialchars($_POST['ville']);

    $resultat = $pdoSITE->prepare(" INSERT INTO membre (pseudo, mdp, nom, prenom, email, civilite, adresse, code_postal, ville) VALUES (:pseudo, :mdp, :nom, :prenom, :email, :civilite, :adresse, :code_postal, :ville) ");

    $resultat->execute(array(
        ':pseudo' => $_POST['pseudo'],
        ':mdp' => $_POST['mdp'],
        ':nom' => $_POST['nom'],
        ':prenom' => $_POST['prenom'],
        ':email' => $_POST['email'],
        ':civilite' => $_POST['civilite'],
        ':adresse' => $_POST['adresse'],
        ':code_postal' => $_POST['code_postal'],
        ':ville' => $_POST['ville'],
    ));
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>La boutique - Inscription</title>

    <!-- Mes styles -->
    <link href="css/style2.css" rel="stylesheet">
</head>

<body>
    <!-- ********************************-->
    <!-- CONTENU PRINCIPAL -->
    <!-- ********************************-->
    <main class="container bg-white m-4 mx-auto p-4">
        <div class="row">
            <div class="col-sm-12 col-md-4 border border-success mx-auto mt-4 p- alert alert-success">
                <h1 class="text-center">La boutique</h1>

            </div><!-- Fin de col -->
        </div><!-- Fin row -->

        <div class="row">
            <div class="col-sm-12 col-md-6 mx-auto mb-4 p-4">
                <h3 class="text-center p-5 alert alert-warning">INSCRIVEZ-VOUS</h3>
                <form method="POST" action="" class="p-5 m-2 border border-success alert alert-success">
                    <div class="form-group p-2">
                        <label for="pseudo" class="p-2">Pseudo</label>
                        <input type="text " class="form-control text-right" name="pseudo" id="pseudo">
                    </div>
                    <div class="form-group p-2">
                        <label for="mdp" class="p-2">Mot de passe</label>
                        <input type="password" class="form-control text-right" name="mdp" id="mdp">
                    </div>
                    <div class="form-group p-2">
                        <label for="nom" class="p-2">Nom de famille</label>
                        <input type="text" class="form-control text-right" name="nom" id="nom">
                    </div>
                    <div class="form-group p-2">
                        <label for="prenom" class="p-2">Prénom</label>
                        <input type="text " class="form-control text-right" name="prenom" id="prenom">
                    </div>
                    <div class="form-group p-2">
                        <label for="email" class="p-2">Adresse éléctronique</label>
                        <input type="email" class="form-control text-right" name="email" id="email">
                    </div>
                    <div class="form-group p-2">
                        <label for="civilite" class="p-2">Civilité : </label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="civilite" id="civilite" value="f">
                            <label class="form-check-label" for="f">Femme</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="civilite" id="civilite" value="m">
                            <label class="form-check-label" for="m">Homme</label>
                        </div>
                    </div>
                    <div class="form-group p-2">
                        <label for="adresse" class="p-2">Adresse postale</label>
                        <input type="text" class="form-control text-right" name="adresse" id="adresse">
                    </div>
                    <div class="form-group p-2">
                        <label for="code_postal" class="p-2">Code Postal</label>
                        <input type="text" class="form-control text-right" name="code_postal" id="code_postal">
                    </div>
                    <div class="form-group p-2">
                        <label for="ville" class="p-2">Ville</label>
                        <input type="text" class="form-control" name="ville" id="ville">
                    </div>


                    <div class="btn-group">
                        <div class="form-group text-center justify-content-center ml-5">
                            <button class="btn btn-small btn-danger mt-3" type="reset" value="Reset">Effacer</button>
                        </div>
                        <div class="form-group text-center justify-content-center">
                            <button type="submit" class="btn btn-small btn-warning mt-3">S'inscrire</button>
                        </div>
                    </div>
                </form>
                <!-- fin de formulaire -->
            </div><!-- Fin de col -->
        </div>


    </main><!-- Fin container -->

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    -->
</body>

</html>