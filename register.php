<?php
$page = 'register';

require 'dsn_user.php';

$newPDO = new PDO($dsn, $user, $psw);

// if (isset($_POST['submit'])){
//     $nom = $_POST['nom'];
//     $prenom = $_POST['prenom'];
//     $email = $_POST['email'];
//     $psw = $_POST['psw'];

//     echo '.$nom. .$prenom. .$email. .$psw.'; 
// }
?>
<!DOCTYPE html>
<!--
 * @author Didier Bonneau
 * @copyright (c) Afpa, DWWM
 * @version 1.0 du 01/04/2019
 * Fichier principal de l'application TP_Papeterie
 -->
<html>
    <head>
        <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
        <title>
            210_00_TP_Papeterie DWWM
        </title>
        <!-- Bootstrap core CSS -->
        <link href="dist/css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="css/papeterie.css" rel="stylesheet" type="text/css"/>
        <script src="dist/js/jquery-3.4.1.js"></script>
        <script src="dist/js/bootstrap.js"></script>

    </head>
    <body>
        <div class='wrap'>
            <?php
            include './header.php';
            include './nav.php';
            ?>
            
            <main class="container">
        <p class="h2">Créer un compte</p>
        <form method="GET" action="login.php">
            <div class="mb-3">
                <label for="email" class="form-label">Entrer votre email</label>
                <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="psw" class="form-label">Entrer votre mot de passe</label>
                <input type="password" name="psw" class="form-control" id="psw">
            </div>
            <div class="mb-3">
                <label for="prenom" class="form-label">Entrer votre prénom</label>
                <input type="text" name="prenom" class="form-control" id="prenom">
            </div>
            <div class="mb-3">
                <label for="nom" class="form-label">Entrer votre nom de famille</label>
                <input type="text" name="nom" class="form-control" id="nom">
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Céer mon compte</button>
        </form>
    </main>
        </div>

        <?php
        include './footer.php';
        ?>
    </body>
</html>
            