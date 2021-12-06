<?php
    session_start();
    $page ='login';
    $erreur = '';
    $login = '';
    $methode = $_SERVER['REQUEST_METHOD'];
   

    if ($methode === 'POST'){
           // je sécurise les datas dans un autre fichier
        require '../base/dao.php';
        // les filter_input permettent de filtrer login et mdp, pour mieux sécuriser le login 
        $login = filter_input(INPUT_POST, 'login', FILTER_SANITIZE_EMAIL);
        $psw = filter_input(INPUT_POST,'psw',FILTER_SANITIZE_SPECIAL_CHARS);
        $user = getUserByLogin($login);

        if ($user) {

        //rowCount : retourne nb d'une colonne
                if (password_verify($psw, $user['psw'])) {
                        //if (password_verify($psw, $user['psw'])) {
                        // si connecter alors mémoriser en session le login et ...

                        $_SESSION['nom'] = $user['nom'];  
                        $_SESSION['role'] = $user['role'];  
                        header('Location: ../index.php');
                        exit();                
                } else { // mot de passe incorrect
                $erreur = 'Mot de passe erroné';
                } 
        } else {  // login non trouvé en base
            $erreur = 'login erroné';
            echo $login = ''; 
            // si login incorrect, on vide input
        }
}
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
    <link href="/dist/css/bootstrap.css" rel="stylesheet" type="text/css"/>
    <link href="/css/papeterie.css" rel="stylesheet" type="text/css"/>
    <script src="/dist/js/jquery-3.4.1.js"></script>
    <script src="/dist/js/bootstrap.js"></script>

</head>
<body>
    <div class='wrap'>
        <?php
        include '../pages/header.php';
        include '../pages/nav.php';
        ?>
            
            <main class="container">
                <p class="h2">Identifiez vous</p>
            <form method="post" action="login.php">
                <div class="mb-3">
                <label for="id_login" class="form-label">Votre login</label>
                <!-- cas particulier, on peut écrire sous une autre forme: php echo égale à qque chose, on peut l'écrire sous forme suivante -->
                <input type="text" value="<?= $login; ?>" name="login" class="form-control" id="id_login" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                <label for="id_psw" class="form-label">Votre mot de passe</label>
                <input type="password" name="psw" class="form-control" id="id_psw">
                </div>
                <div>
                <?php
                // ici, on fait un boolean, si $erreur est vide = true, alors...
                if ($erreur) {
                    echo '<div class="alert alert-danger" role="alert">';
                    echo $erreur;
                    echo '</div>';
                };
                ?>
                <button type="submit" class="btn btn-primary">Valider</button>
            </form>
        </main>
    </div>

<?php
include '../pages/footer.php';
?>
</body>
</html>