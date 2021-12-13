<?php
session_start();
if (isset($_GET['entite'])) {
    $entite = $_GET['entite'];
    $action = $_GET['action'];
} else {
    $entite = 'cafe';
    $action = 'boire';
}
$vue = '';
try {
    switch ($entite) {
        case 'user':
            require 'controleurs/controleurUser.php';

            break;

        case 'article':
            require 'controleurs/controleurArticle.php';
            break;

        default;
            $vue = 'accueil';
            break;
    }
} catch (Exception $e) {
    $erreur = $e->getMessage();
    $vue = 'erreur';
}



include 'vues/template.php';
