<?php

require 'base/Dao.php';



function login(){

    global $vue;
    global $login;
    global $erreur;

   

        $login = filter_input(INPUT_POST, 'login', FILTER_SANITIZE_EMAIL);
        $psw = filter_input(INPUT_POST, 'psw', FILTER_SANITIZE_SPECIAL_CHARS);

        // interroger data base avec login
        $dbDao = new Dao();
        $user = $dbDao->getUserByLogin($login);

        if ($user) {
        //compare $psw avec mdp de la database
        
            if (password_verify($psw, $user['psw'])) {
                // si connecter alors mémoriser en session le login et ...

                $_SESSION['nom'] = $user['nom'];
                $_SESSION['role'] = $user['role'];
                $vue = 'accueil';

            } else { // mot de passe incorrect
                // $erreur = 'Mot de passe erroné';
                // $vue = 'formLogin';
                throw new Exception('Mot de passe erroné');
            }
        } else {  // login non trouvé en base
            // $erreur = 'login erroné';
            // $login = '';
             // si login incorrect, on vide input
            // $vue = 'formLogin';
            throw new Exception('Login erroné');
        }       
    }


function logout(){

    global $vue;

    $_SESSION = array();
    session_destroy();

    $vue = 'accueil';

}
function register(){
    $client = [
        'nom' => filter_input(INPUT_POST,'nom',FILTER_SANITIZE_SPECIAL_CHARS),
        'prenom' => filter_input(INPUT_POST,'prenom',FILTER_SANITIZE_SPECIAL_CHARS),
        'login' => filter_input(INPUT_POST,'login',FILTER_SANITIZE_EMAIL),
        'psw' => filter_input(INPUT_POST,'psw',FILTER_SANITIZE_SPECIAL_CHARS),
        'role' => 'client'
    ];

    $dbDao = new Dao();
    $dbDao->setNewUser($client);
    // après validation, on va initialiser l'inscription en logguant le newClient
    $_SESSION['nom'] = $client['nom'];
    $_SESSION['role'] = $client['role'];

}