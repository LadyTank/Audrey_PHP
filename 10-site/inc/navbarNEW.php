<!-- navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-warning navbar-expand-md static-top">
    <div class="container">
        <a class="nav-link" href="index.php">
            <img src="../img/top-100x100.png" alt="logo-mixfodd" class="mt-3 img-fluid">
        </a>
        <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse collapse justify-content-end" id="navbar">
            <ul class="navbar-nav">

                <!-- Créer une li que pour les connectés -->
                <?php
                if (estConnecte()) { // si membre utilisateur connecté
                    echo '<li class="nav-item"><a class="nav-link" href="' . RACINE_SITE . '05_profil.php">Profil</a></li>';
                    echo '<li class="nav-item"><a class="nav-link" href="' . RACINE_SITE . '02_connexion.php?action=deconnexion">Se déconnecter</a></li>';
                } else {
                    echo '<li class="nav-item"><a class="nav-link" href="' . RACINE_SITE . '01_inscription.php">Inscription</a></li>';
                    echo '<li class="nav-item"><a class="nav-link" href="' . RACINE_SITE . '02_connexion.php">Connexion</a></li>';
                }

                echo '<li class="nav-item"><a class="nav-link" href="#">VOIR</a></li>';

                // créer une li pour les administrateurs
                if (estAdmin()) {
                    echo '<li class="nav-item"><a class="nav-link" href="' . RACINE_SITE . 'admin/gestion_boutique.php">ADMIN boutique</a></li>';
                }
                ?>

                <li class="nav-item active">
                    <a class="nav-link m-4" href="<?php echo RACINE_SITE . 'index.php'; ?>">Accueil</a>
                </li>

                <li class="nav-item dropdown">

                    <a class="nav-link dropdown-toggle m-4" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Bienvenue <?php echo $_SESSION['membre']['prenom']; ?></a>

                    <ul class="dropdown-menu bg-light " aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item " href="<?php echo RACINE_SITE . '05_profil.php'; ?>">Mon profil</a></li>
                        <li><a class="dropdown-item" href="02_connexion.php?action=deconnexion">Se déconnecter</a></li>
                    </ul>
                </li>

            </ul>
        </div>
    </div>
</nav>