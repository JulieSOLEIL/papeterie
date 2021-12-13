<nav class="navbar navbar-expand-md bg-dark navbar-dark">
    <a class="navbar-brand active" href="/index.php">Accueil</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav">
            <!-- Dropdown -->
            <li class="nav-item dropdown <?php if ($vue== 'liste_article') { echo 'active';} ?>">
                <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">Les Produits</a>
                <div class="dropdown-menu bg-secondary">
                    <a <?php if ($vue == 'liste_article' && $cat == 'papeterie') { echo 'style="display:none;"';} ?>class="dropdown-item" href="index.php?entite=produit&action=liste&cat=papeterie">Papeterie</a>
                    <a <?php if ($vue == 'liste_article' && $cat == 'ecriture') { echo 'style="display: none;"';} ?> class="dropdown-item" href="index.php?entite=produit&action=liste&cat=ecriture">Ecriture</a>
                    <a <?php if ($vue == 'Accessoires') { echo 'style="display: none;"';} ?> class="dropdown-item" href="#">Accessoires</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if ($vue == 'bonnes_affaires'){ echo 'active';} ?>" href="index.php?entite=article&action=promo">Les Bonnes affaires</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if ($vue == 'panier'){ echo 'active';} ?> disabled" href="panier.php">Votre panier</a>
            </li>
        </ul>
    </div>
</nav>