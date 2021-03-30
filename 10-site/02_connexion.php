<?php 
require_once 'inc/init.php';

// jeprint_r($_SESSION); 






?> 

<!doctype html>
<html lang="fr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>La boutique - Connexion</title>

    <!-- Mes styles -->
    <link href="css/style2.css" rel="stylesheet">
  </head>

  <body>
       <!-- ********************************-->
       <!-- CONTENU PRINCIPAL -->
       <!-- ********************************-->
    <main class="container bg-white m-4 mx-auto p-4">
        <div class="row">
            <div class="col-sm-12 col-md-8 border border-danger mx-auto m-4 p-4">
                <h1 class="p-5">Connectez-vous</h1>
                <form method="POST" action="" class="p-5 m-2 border border-danger alert alert-danger">
                        <div class="form-group p-2"> <!-- pseudo -->
                            <label for="pseudo" class="p-2">Pseudo*</label>
                            <input type="text " class="form-control text-right" name="pseudo" id="pseudo" placeholder= "votre pseudo" value="<?php echo $_POST['pseudo'] ?? ''; ?>">
                        </div>
                        <div class="form-group p-2"><!-- mdp -->
                            <label for="mdp" class="p-2">Mot de passe*</label>
                            <input type="password" class="form-control text-right" name="mdp" id="mdp" placeholder= "votre mot de passe" >
                            <small class='bg-alert text-white'>ne jamais divulguer votre mot de passe à un tier</small>
                        </div>
                        <div class="form-group"><!-- bouton envoyer -->
                            <button type="submit" class="btn btn-small btn-warning mt-3">CONNEXION</button>
                        </div>
 
                        <p class="mt-5">Connectez-vous pour administer "La Boutique"</p>
                    </form>  <!-- fin de formulaire -->
            </div><!-- Fin de col -->
        </div><!-- Fin row -->
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


