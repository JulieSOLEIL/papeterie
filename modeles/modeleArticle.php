<?php
require 'base/dao.php';

function getAllArticle($categorie){
    $arts = getAllArticleByCategorie($categorie);
    return $arts;
}