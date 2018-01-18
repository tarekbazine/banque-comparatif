<?php

require APP . 'Models/Banque.php';

class qui_sommes_nous
{

    public function index()
    {
        include_once APP . 'core/helpers.php';

        $banques = \TP\Models\Banque::getBanques();

        $content_path = 'Views/qui_sommes_nous.php';

        $menu_header_is_active =2;

        // load views
        require APP . 'Views/layouts/front.php';
//        require APP . 'view/home/index.php';
//        require APP . 'view/_templates/footer.php';
    }

}