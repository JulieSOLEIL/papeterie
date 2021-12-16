<?php
require 'base/dao.php';

function getAllArticle($categorie){

    $dbDao = new Dao();
    $arts = $dbDao->getAllArticleByCategorie($categorie);
    return $arts;
}