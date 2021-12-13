<?php

require 'modeles/modeleUser.php';

switch ($action) {
    case 'login':
        $erreur = '';
        $login = '';
        $methode = $_SERVER['REQUEST_METHOD'];
        if ($methode === 'POST') {

            try {
                login();
                $vue = 'accueil';
            } catch (Exception $e) {
                $erreur = $e->getMessage();
                $login = '';
                $vue = 'formLogin';
            }
        } else {
            $vue = 'formLogin';
        }
        break;

    case 'deconnect':
        logout();
        break;

    case 'newLogin':
        $methode = $_SERVER['REQUEST_METHOD'];
        if ($methode === 'POST') {
            try{
            register();
            $vue = 'accueil';
            } catch (Exception $err) {
                $erreur = $err->getMessage();
                $vue = 'user/creerCompte';
            }
        } else {
            $erreur = '';
            $vue = 'user/creerCompte';
        }
        break;

    default;

        break;
}
