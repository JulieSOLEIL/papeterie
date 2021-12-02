<nav class="navbar navbar-expand-md bg-dark navbar-dark">
    <a class="navbar-brand active"<?php if ($page == 'Accueil'){ echo ' active';} ?> href="/index.php">Accueil</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav">
            <!-- Dropdown -->
            <li class="nav-item dropdown <?php if (substr($page, 0, 5)== 'prod_') { echo 'active';} ?>">
                <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">Les Produits</a>
                <div class="dropdown-menu bg-secondary">
                    <a <?php if ($page == 'prod_papeterie') { echo 'style="display:none;"';} ?>class="dropdown-item" href="./pages/prod_papeterie.php">Papeterie</a>
                    <a <?php if ($page == 'prod_ecriture') { echo 'style="display: none;"';} ?> class="dropdown-item" href="prod_ecriture.php">Ecriture</a>
                    <a <?php if ($page == 'Accessoires') { echo 'style="display: none;"';} ?> class="dropdown-item" href="#">Accessoires</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if ($page == 'bonnes_affaires'){ echo 'active';} ?>" href="bonnes_affaires.php">Les Bonnes affaires</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if ($page == 'panier'){ echo 'active';} ?> disabled" href="panier.php">Votre panier</a>
            </li>
        </ul>
    </div>
</nav>