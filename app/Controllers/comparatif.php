<?php

require APP . 'Models/Banque.php';

class Comparatif
{

    public function index()
    {
        include_once APP . 'core/helpers.php';

        $data = \TP\Models\Banque::getBanques();

        $banques = array();

        foreach ($data as $banque){
            $banques[$banque->id_banque] = $banque;
        }

//        echo json_encode($data);

        $content_path = 'Views/comparatif.php';

        $menu_header_is_active =1;

        // load views
        require APP . 'Views/layouts/front.php';
//        require APP . 'view/home/index.php';
//        require APP . 'view/_templates/footer.php';
    }

}
