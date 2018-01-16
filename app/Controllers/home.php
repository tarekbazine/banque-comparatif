<?php

require APP . 'Models/Banque.php';

class Home{

    public function index()
    {
        $data = \TP\Models\Banque::getBanques();

        echo json_encode($data);

        /*// load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/home/index.php';
        require APP . 'view/_templates/footer.php';*/
    }

}
