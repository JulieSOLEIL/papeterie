<?php

function connexion()
{
    // je sécurise les datas dans un autre fichier
    require 'securite/dsn_secure.php';

    // je crée un objet PDO avec 'new PDO'
    try {
        return new PDO($db_dsn, $db_user, $db_psw); //anciennement écrit : $refPdo = new PDO($db_dsn, $db_user, $db_psw);

    } catch (PDOException $err) {
        // header('Location:error.php');
        throw new Exception('Site momentanément indisponible');
        // $vue = 'error';
        exit();
    }
}
function getAllArticleByCategorie($categ)
{

    // global $refPdo; 
    $refPdo = connexion();

    $sql = 'SELECT * FROM articles NATURAL JOIN categories where libelle cat = cat';
    $stat_article = $refPdo->prepare($sql);
    $stat_article->bindParam(':cat', $categ, PDO::PARAM_STR);
    $stat_article->execute();
    $articles = $stat_article->fetchAll(PDO::FETCH_ASSOC);

    return $articles;
}
function getUserByLogin($log)
{

    $refPdo = connexion();

    $sql = 'SELECT * FROM users WHERE login=:ident';
    $stat_user = $refPdo->prepare($sql);
    $stat_user->bindParam(':ident', $log, PDO::PARAM_STR);
    $stat_user->execute();

    if ($stat_user->rowCount() == 1) {
        //comparer le $psw avec mdp de la database
        $user = $stat_user->fetch(PDO::FETCH_ASSOC);
        return $user;
    }
    return false;
}
function setNewUser($user)
{

    $refPdo = connexion();

    $sql = 'INSERT INTO users VALUES(null, :login, :psw, :nom, :prenom, :role);';
    $stat_user = $refPdo->prepare($sql);

    $stat_user->bindParam(':nom', $user['nom'], PDO::PARAM_STR);
    $stat_user->bindParam(':prenom', $user['prenom'], PDO::PARAM_STR);
    $stat_user->bindParam(':login', $user['login'], PDO::PARAM_STR);
    $psw = password_hash($user['psw'], PASSWORD_DEFAULT);
    $stat_user->bindParam(':psw', $psw, PDO::PARAM_STR);
    $stat_user->bindParam(':role', $user['role'], PDO::PARAM_STR);
    try {
        $stat_user->execute();
    } catch (PDOException $pdoErr) {
        throw new Exception('Login déjà existant !');
    }
}
