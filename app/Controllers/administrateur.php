<?php

require APP . 'Models/Admin.php';

require APP . 'Models/Banque.php';

class Administrateur
{

    public function index()
    {
        session_start();
        if (isset($_SESSION["nom"])){

            include_once APP . 'core/helpers.php';

            $banques = \TP\Models\Banque::getBanques();
//
//            $menu_header_is_active =0;
//
//            $content_path = 'Views/home.php';

//            echo  "dddddddddd";

            require APP . 'Views/layouts/back.php';

        }
        else header('location: ' . URL . 'administrateur/login');

    }

    public function login()
    {
        include_once APP . 'core/helpers.php';

        require APP . 'Views/backoffice/login.php';
    }

    public function auth(){
        if (isset($_POST["nom"]) && isset($_POST["mdp"])) {
             $isAdmin = \TP\Models\Admin::checkAdmin($_POST["nom"],$_POST["mdp"]);
             if ($isAdmin){
                session_start();
                $_SESSION["nom"] =$_POST["nom"];
                header('location: ' . URL . 'administrateur');
             }
             echo json_encode($isAdmin);
        }else{
            echo 'faux';
        }
    }

    public function logout()
    {
        session_start();
        session_destroy();
    }

    public function insererBanque()
    {   session_start();
        if (isset($_SESSION["nom"]))
         return \TP\Models\Banque::addBanque($_POST["nom"],$_POST["siege_social"],$_POST["telephone"],$_POST["fax"]);
        else echo "non authentifié";
    }

    public function supprimerBanque()
    {   session_start();
        if (isset($_SESSION["nom"]))
         echo \TP\Models\Banque::deleteBanque($_POST["id_banque"]);
        else echo "non authentifié";
    }

    public function majBanque()
    {   session_start();
        if (isset($_SESSION["nom"]))
         return \TP\Models\Banque::updateBanque($_POST["nom"],$_POST["siege_social"],$_POST["telephone"],$_POST["fax"],$_POST["id_banque"]);
        else echo "non authentifié";
    }
}