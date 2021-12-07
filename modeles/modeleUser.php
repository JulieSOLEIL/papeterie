<?php

require 'base/dao.php';



function login(){

    global $vue;
    global $login;
    global $erreur;

    $methode = $_SERVER['REQUEST_METHOD'];
    if ($methode === 'POST') {

        $login = filter_input(INPUT_POST, 'login', FILTER_SANITIZE_EMAIL);
        $psw = filter_input(INPUT_POST, 'psw', FILTER_SANITIZE_SPECIAL_CHARS);

        // interroger data base avec login
        $user = getUserByLogin($login);

        if ($user) {
        //compare $psw avec mdp de la database
        
            if (password_verify($psw, $user['psw'])) {
                // si connecter alors mémoriser en session le login et ...

                $_SESSION['nom'] = $user['nom'];
                $_SESSION['role'] = $user['role'];
                $vue = 'accueil';

            } else { // mot de passe incorrect
                $erreur = 'Mot de passe erroné';
                $vue = 'formLogin';
            }
        } else {  // login non trouvé en base
            $erreur = 'login erroné';
            $login = '';
             // si login incorrect, on vide input
            $vue = 'formLogin';
           
        }
        
    } else {

        $vue = 'formLogin';
    }

}

function logout(){

    global $vue;

    $_SESSION = array();
    session_destroy();

    $vue = 'accueil';

}

function singUp(){

    global $refPdo;
    global $vue;

    $client = [
        'nom' => filter_input(INPUT_POST,'nom',FILTER_SANITIZE_SPECIAL_CHARS),
        'prenom' => filter_input(INPUT_POST,'prenom',FILTER_SANITIZE_SPECIAL_CHARS),
        'login' => filter_input(INPUT_POST,'login',FILTER_SANITIZE_EMAIL),
        'psw' => filter_input(INPUT_POST,'psw',FILTER_SANITIZE_SPECIAL_CHARS),
        'role' => 'client'
    ];
    
    
    // important de mettre dans le mm ordre pour le login, psw, etc, que la base de données
    $sql = 'INSERT INTO users VALUES(null, :login, :psw, :nom, :prenom, :role);';
    $stat_user = $refPdo->prepare($sql);
    
    $stat_user->bindParam(':nom', $client['nom'], PDO::PARAM_STR);
    $stat_user->bindParam(':prenom', $client['prenom'], PDO::PARAM_STR);
    $stat_user->bindParam(':login', $client['login'], PDO::PARAM_STR);
    $psw = password_hash($client['psw'], PASSWORD_DEFAULT); 
    $stat_user->bindParam(':psw', $psw, PDO::PARAM_STR);
    $stat_user->bindParam(':role', $client['role'], PDO::PARAM_STR);
    $stat_user->execute();
}