<main class="container">
    <h2>Liste des produits de la catégorie <?= $cat; ?></h2>
    <?php var_dump($cat) ?>
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
            $sql = 'SELECT * FROM articles NATURAL JOIN categorie where libelle_cat = cat;';
            $stat_article = $refPdo->prepare($sql);
            $stat_article->bindParam(':cat', $cat, PDO::PARAM_STR);
            $articles = $stat_article->fetchAll(PDO::FETCH_ASSOC);
            foreach ($articles as $article) {
                echo '<tr>';
                echo '<td class="text-center">' . $article['code_art'] . '</td>';
                echo '<td>' . $article['libelle_art'] . '</td>';
                echo '<td class="prix text-center">' . $article['prix_ht'] . '</td>';
                echo '<td class="text-center"><input type="number" value="0" min="0" /></td>';
                echo '<td class="text-center"></td>';
                echo '</tr>';
            }
            ?>
        </tbody>
    </table>
</main>