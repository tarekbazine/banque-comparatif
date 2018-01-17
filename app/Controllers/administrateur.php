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
            return $isAdmin = \TP\Models\Admin::checkAdmin($_POST["nom"],$_POST["mdp"]);
        }else{
            return false;
        }
    }

    public function insererBanque()
    {
        return \TP\Models\Banque::addBanque($_POST["nom"],$_POST["siege_social"],$_POST["telephone"],$_POST["fax"]);
    }

    public function supprimerBanque()
    {
        return \TP\Models\Banque::deleteBanque($_POST["id_banque"]);
    }

    public function majBanque()
    {
        return \TP\Models\Banque::updateBanque($_POST["nom"],$_POST["siege_social"],$_POST["telephone"],$_POST["fax"],$_POST["id_banque"]);
    }
}