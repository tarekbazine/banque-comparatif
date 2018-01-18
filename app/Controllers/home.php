<?php

require APP . 'Models/Banque.php';

class Home
{

    public function index()
    {
        include_once APP . 'core/helpers.php';

        $banques = \TP\Models\Banque::getBanques();

        $menu_header_is_active =0;

        $content_path = 'Views/home.php';
        // load views
        require APP . 'Views/layouts/front.php';

    }

}
