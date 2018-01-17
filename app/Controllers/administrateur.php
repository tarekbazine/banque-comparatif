<?php

require APP . 'Models/Admin.php';

require APP . 'Models/Banque.php';
class Administrateur
{

    public function index()
    {
       /* require APP . 'view/_templates/header.php';
        require APP . 'view/home/index.php';
        require APP . 'view/_templates/footer.php';*/
    }

    public function auth()
    {
        if (isset($_POST["nom"]) && isset($_POST["mdp"])) {
             $isAdmin = \TP\Models\Admin::checkAdmin($_POST["nom"],$_POST["mdp"]);
             if ($isAdmin){
                session_start();
                $_SESSION["nom"] =$_POST["nom"];
             }
             return $isAdmin;
        }else{
            return false;
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
         return \TP\Models\Banque::deleteBanque($_POST["id_banque"]);
        else echo "non authentifié";
    }

    public function majBanque()
    {   session_start();
        if (isset($_SESSION["nom"]))
         return \TP\Models\Banque::updateBanque($_POST["nom"],$_POST["siege_social"],$_POST["telephone"],$_POST["fax"],$_POST["id_banque"]);
        else echo "non authentifié";
    }
}