<?php

require APP . 'Models/Banque.php';

class Filtre{

    public function classer($columName = null){

        if (isset($columName)) {

            $data = \TP\Models\Banque::getBanques($columName);

            echo json_encode($data);

        } else {
              echo "err";
//            header('location: ' . URL . 'songs/index');
        }

    }


    public function tarif_entre($columName=null,$min=null,$max=null){
        if (isset($columName)&&isset($min)&&isset($max)) {

            $data = \TP\Models\Banque::getBanquesBetween($columName,$min,$max);

            echo json_encode($data);

        } else {
            echo "err2";
//            header('location: ' . URL . 'songs/index');
        }
    }

}
