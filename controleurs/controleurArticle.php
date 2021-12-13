<?php

require 'modeles/modeleArticle.php';

switch ($action){
    case 'liste': 
        $cat = FILTER_INPUT(INPUT_GET,'cat');
        $articles = getAllArticle($cat);
        $vue = 'article/liste';
        break;

    case '':
        
        break;

    case '':
       
        break;

    default;
        $erreur = 'Page en construction ! ';
        $vue = 'erreur';
        break;
}
