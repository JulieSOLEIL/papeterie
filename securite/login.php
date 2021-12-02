<?php
    session_start();
    $page ='login';
    $methode = $_SERVER['REQUEST_METHOD'];

    if ($methode === 'GET'){
 
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
                <input type="text" name="login" class="form-control" id="id_login" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="id_psw" class="form-label">Votre mot de passe</label>
                <input type="password" name="psw" class="form-control" id="id_psw">
            </div>
            <div>
            <?php
            if (isset($_SESSION['erreur'])) {
               echo '<div class="alert alert-danger" role="alert">';
               echo $_SESSION['erreur'];
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
<?php
} else {
    // je sécurise les datas dans un autre fichier
require 'dsn_secure.php';

// je crée un objet PDO avec 'new PDO'
$refPdo = new PDO($db_dsn, $db_user, $db_psw); 
//var_dump($refPdo);

// déclare et récupère login et psw
$login = $_POST['login'];
$psw = $_POST['psw'];
// les filter_input permettent de filtrer login et mdp, pour mieux sécuriser le login 
$login = filter_input(INPUT_POST, 'login', FILTER_SANITIZE_EMAIL);
$psw = filter_input(INPUT_POST,'psw',FILTER_SANITIZE_SPECIAL_CHARS);

//requête trouver le login
// $sql = 'SELECT * FROM users WHERE login =\''.$login.'\';';
$sql = 'SELECT * FROM users WHERE login=:ident';
$stat_user = $refPdo->prepare($sql);
$stat_user->bindParam(':ident', $login, PDO::PARAM_STR);
$stat_user->execute();
//var_dump($sql)
// die(); permet de stopper la lecture du php avec 'die'

//envoi de la requête, un PDO Statement avec 'query'
// $stat_user = $refPdo->query($sql);
// var_dump($stat_user->fetch(PDO::FETCH_ASSOC));

//rowCount : retourne nb d'une colonne
if ($stat_user->rowCount() == 1){
    //comparer le $psw avec mdp de la database
  $user = $stat_user->fetch(PDO::FETCH_ASSOC);

  $mdp = $psw;

  if ($user['psw'] === $psw) {
  // si connecter alors mémoriser en session le login et ...

    $_SESSION['nom'] = $user['nom'];  
    $_SESSION['role'] = $user['role'];  
    header('Location: /index.php');
    } else { // mot de passe incorrect
        $_SESSION['erreur'] = 'Mot de passe erroné';
        header('Location: login.php');
    } 
    } else {  // login non trouvé en base
        $_SESSION['erreur'] = 'login erroné';
    header('Location: login.php');
    }
}
?>