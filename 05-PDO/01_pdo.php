<?php require_once '../inc/functions.php'; ?> 
<?php require_once '../inc/db_config.php'; ?> 
<?php require_once '../inc/db_connexion.php'; ?> 


<!doctype html>
<html lang="fr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <title>COURS PHP 7 - PDO</title>
    <!-- mes styles -->
    <link rel="stylesheet" href="../css/style.css">
  </head>
  <body>
<!-- navigation en include  -->
    <?php
        require '../inc/navbar.inc.php';
    ?>
    <div class="jumbotron container">
        <h1 class="display-4">Cours PHP 7 - PDO</h1>
        <p class="lead">la variable $pdo est un objet qui représent la connexion à une BDD</p>
        <hr class="my-4">
    </div>
    <!-- =================================== -->
    <!-- Contenu principal -->
    <!-- =================================== -->
    <main class="container bg-white mb-5 pb-4">
        <div class="row p-4">
            <div class="col-sm-12">
                <h2>1 - Connexion à la BDD</h2>
                <p><abbr title="PHP Data Object">PDO</abbr> est l'acronyme de PHP Data Object</p>

                <?php 

                // se connecter à une BDD en local
                // conseil appeler la variable par pdo puis le début du nom de la BDD, ici entreprise
                    // try {
                    //     $options=
                    //     [
                    //     PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
                    //     PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
                    //     ];

                    //     $pdoENT = new PDO($DB_HEB, $DB_USER, $DB_PASS, $options); //les variables appelée d'un fichier inc db_config.php avec les informations complètes, (info hebergeur, info connexion utilisateur, info mdp, optionnellement info d'autres variables comme $options dans ce cas)
                        
                    //     }
                    //     catch (PDOException $pe){
                    //         echo "Erreur" .$pe->getMessage(); //avoir le detail du problème de connexion à l'ecran
                    //     }
                    

                    // 'mysql:host=localhost;dbname=entreprise', //adresse de mon serveur local, en premier le driver mysql (IBN, ORACLE, ODBC,..), puis le nom du serveur, puis le nom de la BDD
                    // 'root',  // identiant à la BDD (locale)
                    // '', //mdp sans avec root, serveur (local)
                    // array(
                    //     PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, // cette ligne sert à afficher les erreurs SQL dans le navigateur
                        // PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8', // cette ligne sert à définit le charset des échanges avec la BDD
                    // ));
                

                // 2eme methode, connexion P ISOLA

                // $host = 'localhost';
                // $database = 'entreprise';
                // $user = 'root';
                // $psw = ''; // si vous etes sur MAC il y a un mdp c'est root

                // $pdoENT = new PDO('mysql:host='.$host. ';dbname=' .$database,$user,$psw);
                // $pdoENT ->exec("SET NAMES utf_8");

                // jevardump($pdoENT);
                // jevardump( get_class_methods ($pdoENT)); //permet d'afficher la liste des méthodes présentes dans l'objet PDO

                ?> 
            </div><!-- fin col -->

            <div class="col-sm-12">
                    <h2>2 - Faire des requêtes avec exec()</h2>
                    <p>La méthode EXEC() est utilisée pour faire des requêtes qui ne retournent pas de résultats : INSERT, UPDATE, DELETE</p>
                    <p>Les valeurs de retour possibles:<br>
                    Succès : dans le jevardump de $requete, on aura le nombre de ligne affectées par la requete, 3 delete = int(3)<br>
                    Echec : false=0
                    </p>

                    <?php 
                        // on va insérer un employé dans la BDD
                        // requete SQL d'insertion dans la BDD  et dans la table employé // INSERT INTO employes (prenom, nom, sexe, service, date_embauche, salaire) VALUES ('Jean', 'Bon', 'm', 'informatique', '2021-03-18', 2000)

                        // $requete = $pdoENT->exec( "INSERT INTO employes (prenom, nom, sexe, service, date_embauche, salaire) VALUES ('Jean', 'Bon', 'm', 'informatique', '2021-03-18', 2000)" ); // à chaque fois que la page est rafraichit, une rangée est ajoutée à la biblio, un INSERT à chaque rafraichissement

                        // $requete = $pdoENT->exec( "DELETE FROM employes WHERE prenom='Jean' AND nom ='bon'"); //pour supprimer une entrée

                        // jevardump($requete);

                        echo "Nombre des derniers ID sur la BDD : " .$pdoENT->LastInsertId(); //affiche le nombre d'entrées dernierement
                    ?> 
            </div>

            <div class="col-sm-12">
                <h2>3 - Faire des requêtes avec <code>query()</code></h2> <!--méthode qui nécessite $pdo-->
                <p><code>query()</code> est utilisé pour faire des requêtes qui retournent un ou plusieurs résultats: SELECT mais aussi DELETE, UPDATE et INSERT (insérer, modifier, selectionner, supprimer)</p>
                <p>Succès : query() retourne un nouvel objet qui provient de la classe PDOstatement.<br>
                Echec : False</p>

                <ul>
                    <li>Pour information, on peut mettre dans les paramètres () de fetch()</li>
                    <li>PDO::FETCH_NUM : pour obtenir un tableau aux indices numériques</li>
                    <li>PDO::FETCH_OBJ : pour obtenir un dernier objet</li>
                </ul>


                <?php 
                // 1 ere étape : On demande des informations à la BDD car il y a un ou plusieurs résultats avec query()
                    echo "<h3>Exercice : afficher les informations de l'employé Fabrice </h3>";

                    $requete = $pdoENT->query ("SELECT* FROM employes WHERE prenom='fabrice'"); //la varibale $requete contient la question en mysql, précisé par query avant la question, question dans la variable $pdoENT qui correspond à la connexion a la BDD
                    jevardump($requete);

                // 2eme étape :  dans cet objet $requete nous ne voyons pas encore les données concernant amandine, pourtant elle s'y trouve. pour y accéder, nous devons utiliser une métode de $requete qui s'appelle fetch() qui veut dire "vas chercher"

                // 3 eme étape :  avec cette méthode fetch() on transforme l'objet $requete

                // 4 eme étape : fetch(), avec le paramètre PDO::FETCH_ASSOC permet de transformer l'objet $requete en un array (tableau) associatif appelé ici $ligne : on y trouve en indice le nom des champs de la requête SQL

                    //exo - Afficher en tableau les informations complète concernant l'employé fabrice

                    $ligne = $requete->fetch(PDO::FETCH_ASSOC); // PDO::FETCH_ASSOC n'est pas obligatoire, il sert à créer un seul tableau associatif, donc avec des indices renommé, si on faitun fetch(); vide, ça fonctionne en créant un double tableau, avec indice numérique et indice associatif
                    jevardump($ligne);

                    echo "<p>Prénom : " .$ligne['prenom']. " " .$ligne['nom']. "</p>";
                    echo "<p>Prénom : " .$ligne['prenom']. " <br> Nom: " .$ligne['nom']. "<br> Sexe : " .$ligne['sexe']. "<br> Date d'embauche : " .$ligne['date_embauche']. "<br>Service : " .$ligne['service']. "<br> Salaire mensuel : " .$ligne['salaire']. "</p>";


                    // exo - Afficher le service de l'employé dont l'id est 417, avec nom et prenom
                    echo "<h3>Exercice : afficher les informations de l'employé avec l'id 417 </h3>";

                    $requete2 = $pdoENT->query ("SELECT* FROM employes WHERE id_employes='417'"); //je pose la question (1)
                    $ligne2 = $requete2->fetch (PDO::FETCH_ASSOC); // va chercher la réponse (2)
                    
                    echo "<p>Prénom : " .$ligne2['prenom']. " <br> Nom : " .$ligne2['nom']. "<br>Service : " .$ligne2['service']. "</p>";
                    jevardump ($ligne2); // affiche la réponse (3)

                ?> 
            </div> <!-- fin col -->

            <div class="col-sm-12">
                <h2>4 - Faire des requêtes avec <code>query()</code> et afficher plusieurs résultats</h2>

                <?php 

                    echo "<h3>Exercice : afficher le nombre d'employé dans la base de données </h3>";

                    //SELECT * FROM employes
                    $requete = $pdoENT->query(" SELECT * FROM employes ");
                    jevardump($requete);

                    $nbr_employes = $requete->rowCount(); // cette méthode rowCount() permet de compter le nbr de rangées (d'enregistrements) retournées par la requête

                    echo "<p>Il y a " .$nbr_employes. " employés dans la base de données.</p><hr>";
                
                    
                    // comme nous avons plusieurs résultats dans $requete, nous devons faire une boucle pour les parcourir
                    // fetch() va chercher la ligne de l'ensemble des résultats à chaque tour de boucle, et le transforme en objet. la boucle while permet de faire avancer le curseur dans l'objet. quand il arrive à la fin, fetch() retourne FALSE et la boucle s'arrête
                    while ( $ligne = $requete->fetch(PDO::FETCH_ASSOC)){
                        echo $ligne['prenom'].'<br>';
                    }

                    echo '<hr>';
                    // exo Afficher la liste des différents services dans une ul en mettant un service par li
                    echo "<h3>Exercice : afficher la liste des différents services dans une ul en mettant un service par li </h3>";

                    $requete = $pdoENT->query(" SELECT DISTINCT service FROM employes ORDER BY service ");

                    $nbr_services = $requete->rowCount();

                    echo "<p class=\"bg-dark text-white w-50\">Il y a " .$nbr_services. " de services différents dans la base de données.</p>";

                    echo "<ul class=\"border border-warning w-50 p-4\">";
                    while ( $ligne2 = $requete->fetch(PDO::FETCH_ASSOC)){
                        echo "<li>".$ligne2['service'].'</li>';
                    }
                    echo "</ul>";
                ?>           
            </div><!-- fin col -->

            <div class="col-sm-12">
                <!-- encore un exo pour afficher -->
                <!-- 1 - compter le nombre d'employé -->
                <!-- 2 - puis afficher toutes les informations des employés dans un tableaux HTML triés par ordre alpha nom -->
                <!-- 3 - Ajouter un Mr pour les messiers et un Mme pour les dames -->

                <?php 
                // 1
                    $requete = $pdoENT->query(" SELECT * FROM employes ORDER BY nom");
                    $nbr_employes = $requete->rowCount();

                    echo "<p>Il y a " .$nbr_employes. " employés dans la base de données.</p>";

                //  2 et 3


                    // echo "<table class=\"table table-striped p-3 mt-5\"><tbody><thead><th>Nom</th><th>Prénom</th><th>ID employés</th><th>Sexe</th><th>Date d'embauche</th><th>Service</th><th>Salaire</th></thead>";

                    // while ($ligne = $requete->fetch(PDO::FETCH_ASSOC)){

                    //     if ($ligne['sexe']=='f') {
                    //     echo "<tr><td> Mme " .$ligne['nom']. "</td><td>" .$ligne['prenom']. "</td><td>" .$ligne['id_employes']. "</td><td>" .$ligne['sexe']. "</td><td>" .$ligne['date_embauche']. "</td><td>" .$ligne['service']. "</td><td>" .$ligne['salaire']. "</td></tr>";}
                    //     else {
                    //         echo "<tr><td> M. " .$ligne['nom']. "</td><td>" .$ligne['prenom']. "</td><td>" .$ligne['id_employes']. "</td><td>" .$ligne['sexe']. "</td><td>" .$ligne['date_embauche']. "</td><td>" .$ligne['service']. "</td><td>" .$ligne['salaire']. "</td></tr>";
                    //     }

                    // }

                    // echo "</tbody></table>";

                    // OU

                    echo "<table class=\"table table-info table-striped\">";
                    echo "<thead><tr><th scope=\"col\">ID</th><th scope=\"col\">Prénom</th><th scope=\"col\">Nom</th><th scope=\"col\">Sexe</th><th scope=\"col\">Service</th><th scope=\"col\">Date d'embauche</th><th scope=\"col\">Salaire</th></tr></thead>";
                    while($ligne = $requete->fetch(PDO::FETCH_ASSOC)) {
                        echo "<tr>";
                        echo "<td>#". $ligne['id_employes']. "</td>";   
                        echo "<td>";
                        if($ligne['sexe'] == 'f') {
                            echo "Mme ";
                        }else {
                            echo "M. ";
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
                    
                    // ou avec foreach
                        echo "<table class=\"table table-success table-striped\">";
                        foreach ( $pdoENT->query( " SELECT * FROM employes ORDER BY sexe DESC, nom ASC " ) as $infos ) { //$employe étant un tableau on peut le parcourir avec une foreach. La variable $infos prend les valeurs successivement à chaque tour de boucle
                        // jevardump($infos);
                        echo "<tr>";
                        echo "<td>";
                        if ( $infos['sexe'] == 'f') {
                            echo "<span class=\"badge badge-secondary\">Mme ";
                        } else {
                            echo "<span class=\"badge badge-warning\">M. ";
                        } echo $infos['nom']. " " .$infos['prenom']. "</span></td>";
                        echo "<td>" .$infos['service']. " </td>";
                        
                        // Notation date en français
                        echo "<td>" .strftime('%d/%m/%Y',strtotime($infos['date_embauche'])). " </td>";
                        // ou echo "<td>" .date('d/m/Y',strtotime($infos['date_embauche'])). " </td>";

                        // Notation format français
                        $nombre_format_francais = number_format($infos['salaire'], 2, ',', ' ');
                        echo "<td>" .$nombre_format_francais. " €</td>";
                        echo "</tr>";
                        }
                        echo "</table>";
                ?>
            </div>

            <div class="col-sm-12">
                <h2>05 - Requête préparées avec <code>prepare()</code></h2>
                <p>Les requêtes préparées sont préconisées si vous executez plusieurs fois la même requête, ainsi vous eviterez au SGBD de répéter toutes les phrases, analyses, interprétations exécution etc... >> on gagne en performance</p>
                <p>Les requêtes préparées sont utile pour nettoyer les données et se prémunir des injections de type SQL (tentative de piratage) cf. 09-securité</p>

                <?php 
                // une requête préparée se réalise en 3 étapes
				$nom = 'Grand';//ici j'ai l'info que je cherche dans une variable je cherche un résultat ex. je cherche "Grand"

				// 1/ on prépare la requête
				$resultat = $pdoENT->prepare(" SELECT * FROM employes WHERE nom = :nom "); // a/ prepare permet de préparer la requête sans l'exécuter b/:nom est un marqueur qui est vide (comme une boîte vide) et qui attend une valeur c/ $resultat est pour le moment un objet PDOstatement

				// 2/ on lie le marqueur 
				$resultat->bindParam( ':nom', $nom );// bindParam permet de lier la marqueur à la variable :nom à une variable $nom on lie les paramètres
				// $resultat->bindValue( ':nom', 'titi' );// si on a besoin de lier le marqueur à une valeur fixe...

				// 3/ puis on exécute la requête
				$resultat->execute(); // permet d'exécuter toute la requête
				$employe = $resultat->fetch( PDO::FETCH_ASSOC );
				// jevardump($employe);	
            	echo $employe['prenom'] . ' ' . $employe['nom']. ' -  service : ' . $employe['service'] . '<br>';

                echo "<hr>";
				//prepare() et boucle 
                $sexe = "f"; // début de requete pour afficher que les femmes
				$requete = $pdoENT->prepare( " SELECT * FROM employes WHERE sexe = :sexe" ); 
                $requete->bindParam(':sexe', $sexe); // bindParam permet d'associer
				$requete->execute();
				$nombre_employes = $requete->rowCount();
				// jevardump($nombre_employes);
				while ( $ligne = $requete->fetch( PDO::FETCH_ASSOC ) ) {
						echo "<p>Nom : " .$ligne['prenom']. " " .$ligne['nom']." travaille au service " .$ligne['service']."</p>";
                }

                // REPRENDRE MARDI, requête préparée sans bindParam

                ?> 
            </div>
        </div><!-- fin row -->

        <div id="scroll_to_top">
            <a href="#top"><img src="../img/top-100x100.png" alt="Retourner en haut" /></a>
        </div>

        
    </main>
    <!-- footer en include -->
    <?php include '../inc/footer.inc.php'; ?>
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