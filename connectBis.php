<?php
$page = 'connectBis';
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
        <p class="h2">Identifiez vous</p>
        <form method="post" action="login.php">
            <div class="mb-3">
                <label for="id_login" class="form-label">Votre login</label>
                <input type="text" name="login" class="form-control" id="id_login" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="id_psw" class="form-label">Votre mot de passe</label>
                <input type="password" name="psw" class="form-control" id="id_psw">
                <span style="color: red;">Attention, votre email ou votre mot de passe est incorrect, merci de réessayer. </span>
            </div>
            <button type="submit" class="btn btn-primary">Valider</button>
        </form>
    </main>
        </div>

        <?php
        include './footer.php';
        ?>
    </body>
</html>
            