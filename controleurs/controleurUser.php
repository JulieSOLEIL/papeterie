<?php

require 'modeles/modeleUser.php';

switch ($action){
    case 'login': 
        $login = '';  
        $erreur = ''; 
        login();
        break;

    case 'deconnect':
        logout();
        break;

    case 'createUser':
        singUp();
        break;

    default;
        
        break;
}
