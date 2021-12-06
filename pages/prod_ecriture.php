<?php
    $page = 'prod_ecriture';
?>    
<!DOCTYPE html>
<!--
 * @author Didier Bonneau
 * @copyright (c) Afpa, DWWM
 * @version 1.0 du 01/04/2019
 * Fichier d'affichage des produits Papeterie de l'application TP_Papeterie
-->
<html>
    <head>
        <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
        <title>
            210_00_TP_Papeterie DWWM
        </title>
        <!-- Bootstrap core CSS -->
        <link href="/dist/css/bootstrap.css" rel="stylesheet">
        <link href="/css/papeterie.css" type="text/css" rel="stylesheet" />
        <style>
            input[type=number] {
                width: 45px;
            }
        </style>
        <script src="/dist/js/jquery-3.4.1.js"></script>
        <script src="/dist/js/bootstrap.js"></script>
    </head>
    
    <body>
        <div class='wrap'>
        <?php
            include './header.php';
            include './nav.php';
            ?>
            <main class="container">
                <h2>Liste des produits de la catégorie écriture</h2>
                <table class="table table-bordered">
                    <tbody id="ligne">
                        <tr>
                            <th class="text-center w-10">REFERENCE</th>
                            <th class="w-60">DESCRIPTION</th>
                            <th class="text-center w-10">PRIX<br>UNITAIRE</th>
                            <th class="text-center w-10">QUANTITE</th>
                            <th class="text-center w-10">AJOUTER<br>AU PANIER</th>
                        </tr>

                        <?php
                        
                            // je sécurise les datas dans un autre fichier
                            require '../securite/dsn_secure.php';

                            // je crée un objet PDO avec 'new PDO'
                            $refPdo = new PDO($db_dsn, $db_user, $db_psw); 
                            $sql = 'SELECT * FROM articles NATURAL JOIN categories where libelle cat = cat';
                            $stat_article = $refPdo->prepare($sql);
                            $cat = 'prod_ecriture';
                            $stat_article->bindParam(':cat', $cat, PDO::PARAM_STR);
                            $articles = $stat_article->fetchAll(PDO::FETCH_ASSOC);
                            foreach($articles as $article) {
                                echo '<tr>';
                                echo '<td class="text-center">'.$article['code_art'].'</td>';
                                echo '<td>'.$article['libelle_art'].'</td>';
                                echo '<td class="prix text-center">'.$article['prix_ht'].'</td>';
                                echo '<td class="text-center"><input type="number" value="0" min="0" /></td>';
                                echo '<td class="text-center"></td>';
                                echo '</tr>';
                            }
                        ?>
                    </tbody>
                </table>
            </main>
        </div>
        <?php
        include './footer.php';
        ?>
    </body>
</html>
