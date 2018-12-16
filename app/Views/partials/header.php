<header>
    <div class="row">
        <div class="col-md-2">
            <img class="img-fluid" src="front/img/logo.png">
        </div>
        <div class="col-md-9">
            <ul class="nav justify-content-center">
                <li class="nav-item">
                    <a class="nav-link <?= ($menu_header_is_active == 0)? ' active ':''; ?>" href="<?=URL?>">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= ($menu_header_is_active == 1)? ' active ':''; ?>" href="comparatif">Comparatif</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= ($menu_header_is_active ==2)? ' active ':''; ?>" href="qui_sommes_nous">Qui sommes-nous</a>
                </li>
            </ul>
        </div>
    </div>
</header>