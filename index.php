<?php
    session_start();
    if (isset($_GET['entite'])){
        $entite = $_GET['entite'];
        $action = $_GET['action'];
    } else {
        $entite = 'cafe';
        $action = 'boire';
    }
    $vue = '';

    switch($entite){
        case 'user':
            require 'controleurs/controleurUser.php';
            
            break;

        case 'article':
            
            break;

        default; 
            $vue = 'accueil';   
            break;
    }

    

    include 'vues/template.php';
