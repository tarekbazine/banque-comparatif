<?php

require APP . 'Models/Banque.php';

class Home
{

    public function index()
    {
        include_once APP . 'core/helpers.php';

        $banques = \TP\Models\Banque::getBanques();

//        echo json_encode($data);

        $content_path = 'Views/home.php';
        // load views
        require APP . 'Views/layouts/front.php';
//        require APP . 'view/home/index.php';
//        require APP . 'view/_templates/footer.php';
    }

}
