<main class="container">
    <p class="h2">Identifiez vous</p>
    <form method="POST" action="index.php?entite=user&action=login">
        <?php
        // ici, on fait un boolean, si $erreur est vide = true, alors...
        if ($erreur) {
            echo '<div class="alert alert-danger" role="alert">';
            echo $erreur;
            echo '</div>';
        };
        ?>
        <div class="mb-3">
            <label for="id_login" class="form-label">Votre login</label>
            <!-- cas particulier, on peut écrire sous une autre forme: php echo égale à qque chose, on peut l'écrire sous forme suivante -->
            <input type="text" value="<?= $login; ?>" name="login" class="form-control" id="id_login" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="id_psw" class="form-label">Votre mot de passe</label>
            <input type="password" name="psw" class="form-control" id="id_psw">
        </div>
        <button type="submit" class="btn btn-primary">Valider</button>
    </form>
</main>