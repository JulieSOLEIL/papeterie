<?php 
session_start();
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
$sql = 'SELECT * FROM users WHERE login = \''.$login.'\';';
//var_dump($sql)
// die(); permet de stopper la lecture du php avec 'die'

//envoi de la requête, un PDO Statement avec 'query'
$stat_user = $refPdo->query($sql);
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
    header('Location: index.php');
    } else { // mot de passe incorrect
        header('Location: connectBis.php');
    } 
    } else {  // login non trouvé en base
    header('Location: connect.php');
    }
?>
