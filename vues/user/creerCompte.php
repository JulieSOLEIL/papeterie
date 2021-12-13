<main class="container">
    <p class="h2">Création de votre compte</p>
    <form method="POST" action="index.php?entite=user&action=newLogin">
        <?php
        // ici, on fait un boolean, si $erreur est vide = true, alors...
        if ($erreur) {
            echo '<div class="alert alert-danger" role="alert">';
            echo $erreur;
            echo '</div>';
        };
        ?>
        <div class="mb-3">
            <label for="id_nom" class="form-label">Votre nom:</label>
            <input type="text" name="nom" class="form-control" id="id_nom">
        </div>
        <div class="mb-3">
            <label for="id_prenom" class="form-label">Votre prénom:</label>
            <input type="text" name="prenom" class="form-control" id="id_prenom">
        </div>
        <div class="mb-3">
            <label for="id_login" class="form-label">Votre login:</label>
            <input type="text" name="login" class="form-control" id="id_login">
        </div>
        <div class="mb-3">
            <label for="id_psw" class="form-label">Votre mot de passe:</label>
            <input type="password" name="psw" class="form-control" id="id_psw">
        </div>
        <div>
            <button type="submit" class="btn btn-primary">Valider</button>
    </form>
</main>