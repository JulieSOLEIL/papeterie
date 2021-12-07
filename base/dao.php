<?php

// je sécurise les datas dans un autre fichier
require 'securite/dsn_secure.php';  

// je crée un objet PDO avec 'new PDO'
try{  
$refPdo = new PDO($db_dsn, $db_user, $db_psw); 

} catch (PDOException $err){
    header('Location:error.php');
    exit();
}
    function getAllArticleByCategorie($categ) {

        global $refPdo; 

        $sql = 'SELECT * FROM articles NATURAL JOIN categories where libelle cat = cat';
        $stat_article = $refPdo->prepare($sql);
        $stat_article->bindParam(':cat', $categ, PDO::PARAM_STR);
        $stat_article->execute();
        $articles = $stat_article->fetchAll(PDO::FETCH_ASSOC);

        return $articles;
    }    

    function getUserByLogin($log) {

        global $refPdo;

        $sql = 'SELECT * FROM users WHERE login=:ident';
        $stat_user = $refPdo->prepare($sql);
        $stat_user->bindParam(':ident', $log, PDO::PARAM_STR);
        $stat_user->execute();

        if ($stat_user->rowCount() == 1){
            //comparer le $psw avec mdp de la database
            $user = $stat_user->fetch(PDO::FETCH_ASSOC);
            return $user;
    }
    return false;
}