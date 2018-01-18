<?php

require APP . 'Models/Presentation.php';

class qui_sommes_nous
{

    public function index()
    {
        include_once APP . 'core/helpers.php';

        $presentation = \TP\Models\Presentation::getPresentation();

//        echo json_encode($presentation);

        $content_path = 'Views/qui_sommes_nous.php';

        $menu_header_is_active =2;

        // load views
        require APP . 'Views/layouts/front.php';

    }

}