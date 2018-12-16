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

            $banques_with_id = array();

            foreach ($banques as $banque){
                $banques_with_id[$banque->id_banque] = $banque;
            }

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
             $isAdmin = \TP\Models\Admin::checkAdmin($_POST["nom"],md5($_POST["mdp"]));
             if ($isAdmin){
                session_start();
                $_SESSION["nom"] =$_POST["nom"];
                header('location: ' . URL . 'administrateur');
             }
            echo '<script>alert("votre nom d\'utilisateur ou mot de passe est incorrect!");
                    location.href = "'.URL.'administrateur/login";
                    </script>';
        }else{
            header('location: ' . URL . '');
        }
    }

    public function logout()
    {
        session_start();
        session_destroy();

        header('location: ' . URL . '');

    }

    public function insererBanque()
    {   session_start();
        if (isset($_SESSION["nom"]))
            echo \TP\Models\Banque::addBanque($_POST["nom"],$_POST["siege_social"],$_POST["telephone"],$_POST["fax"]);
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
        if (isset($_SESSION["nom"])){
            echo \TP\Models\Banque::updateBanque($_POST["nom"],$_POST["siege_social"],$_POST["telephone"],$_POST["fax"],$_POST["id_banque"]);
        }else echo "non authentifié";
    }

    public function majMonetique()
    {
        session_start();
        if (isset($_SESSION["nom"])){
            \TP\Models\Banque::
            updateMonetique($_POST["carte_cib"],
                $_POST["emission_premiere_carte"],
                $_POST["renouvelement"],
                $_POST["reconfection"],
                $_POST["reedition_code_secret"],
                $_POST["comission_retrait_sur_dab_banque"],
                $_POST["comission_retrait_sur_dab_confrere"],
                $_POST["commission_paiement_sur_tpe_client"],
                $_POST["commission_paiement_sur_tpe_commercant"],
                $_POST["carte_internationale"],
                $_POST["octroi"],
                $_POST["mise_en_opposition"],
                $_POST["re_confection"],
                $_POST["reedition_du_code_secret"],
                $_POST["changement_de_code_pin"],
                $_POST["id_monetique"]);
            header('location: ' . URL . 'administrateur');
        }else header('location: ' . URL . 'home');
    }

    public function maj_gestion_tenue_compte()
    {
        session_start();
        if (isset($_SESSION["nom"])){
            \TP\Models\Banque::
            updateGestionCompte(
                $_POST["ouverture_compte_delivrance_chequier"],
                $_POST["frais_tenue_compte_courant"],
                $_POST["frais_tenue_compte_professionnel"],
                $_POST["frais_tenue_compte_cheque"],
                $_POST["frais_tenue_compte_sur_livret"],
                $_POST["tenue_compte_en_devise"],
                $_POST["fermeture_compte_courant"],
                $_POST["fermeture_compte_cheque"],
                $_POST["fermeture_compte_sur_livret"],
                $_POST["fermeture_compte_devise"],
                $_POST["id_gestion_compte"]
            );
            header('location: ' . URL . 'administrateur');
        }else header('location: ' . URL . 'home');
    }


    public function maj_operations_paiement()
    {
        session_start();
        if (isset($_SESSION["nom"])){
            \TP\Models\Banque::
            updateOppPaiement(
                $_POST["versement_especes_client_agence"]
                ,$_POST["versement_especes_tiers"]
                ,$_POST["versement_especes_deplace_lient_autre_agence"]
                ,$_POST["virement_recu_compte_meme_agence"]
                ,$_POST["virement_recu_compte_autre_agence_meme_banque"]
                ,$_POST["virement_devise_recu_etranger"]
                ,$_POST["rertait_especes"]
                ,$_POST["retrait_especes_guichets_autre_agence"]
                ,$_POST["emission_cheque_banque"]
                ,$_POST["emission_cheque_banque_deplace"]
                ,$_POST["annulation_cheque_banque"]
                ,$_POST["virement_compte_compte"]
                ,$_POST["virement_ordonne_en_faveur_client_autre_agence"]
                ,$_POST["id_operations_paiement"]
            );
            header('location: ' . URL . 'administrateur');
        }else header('location: ' . URL . 'home');
    }

}