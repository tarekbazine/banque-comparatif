<?php

namespace TP\Models;

require_once APP . 'core/DB.php';

use TP\Core\DB;

class Banque
{

    public static function getBanques($columName = null, $limit = 30)
    {
        $db = DB::getInstance();

        if (isset($columName))
            $columName = $columName . " ASC ,";

        $sql = "SELECT * FROM `banque` JOIN gestion_tenue_compte JOIN monetique JOIN operation_paiement
                  ON banque.id_gestion_compte = gestion_tenue_compte.id_gestion_compte 
                    AND banque.id_operations_paiement = operation_paiement.id_operation 
                    AND banque.id_monetique = monetique.id_monetique ORDER BY " . $columName . " banque.nom ASC LIMIT ";

        $query = $db->prepare($sql . $limit);
        $query->execute();

        return $query->fetchAll();
    }


    public static function getBanquesBetween($columName = null, $min = 0, $max = 100)
    {
        $db = DB::getInstance();

        $sql = "SELECT * FROM `banque` JOIN gestion_tenue_compte JOIN monetique JOIN operation_paiement
                  ON banque.id_gestion_compte = gestion_tenue_compte.id_gestion_compte
                    AND banque.id_operations_paiement = operation_paiement.id_operation
                    AND banque.id_monetique = monetique.id_monetique
                    WHERE " . $columName . " BETWEEN " . $min . " AND " . $max . "
                    ORDER BY banque.nom ASC ";


        $query = $db->prepare($sql);

        $query->execute();

        return $query->fetchAll();
    }

    public static function addBanque($nom, $siege_social = '', $telephone = '', $fax = '')
    {
        $db = DB::getInstance();

        $stmt = $db->prepare("INSERT INTO gestion_tenue_compte () VALUES ()");
        $stmt->execute();
        $id_gestion_tenue_compte = $db->lastInsertId();

        $stmt = $db->prepare("INSERT INTO monetique () VALUES ()");
        $stmt->execute();
        $id_monetique = $db->lastInsertId();

        $stmt = $db->prepare("INSERT INTO operation_paiement () VALUES ()");
        $stmt->execute();
        $id_operation_paiement = $db->lastInsertId();

        $sql = "INSERT INTO `banque`(`nom`, `siege_social`, `telephone`, `fax`,`id_gestion_compte`, `id_operations_paiement`, `id_monetique`)
 VALUES (:nom, :siege_social, :telephone, :fax , :id_gestion_compte, :id_operations_paiement, :id_monetique)";
        $query = $db->prepare($sql);
        $parameters = array(':nom' => $nom,
            ':siege_social' => $siege_social,
            ':telephone' => $telephone,
            ':fax' => $fax,
            ':id_gestion_compte' => $id_gestion_tenue_compte,
            ':id_operations_paiement' => $id_operation_paiement,
            ':id_monetique' => $id_monetique
        );

        return ($query->execute($parameters));
    }


    public static function deleteBanque($banque_id)
    {
        $db = DB::getInstance();

        $sql = "DELETE FROM `banque` WHERE id_banque = :banque_id";
        $query = $db->prepare($sql);
        $parameters = array(':banque_id' => $banque_id);
        $query->execute($parameters);

        $sql = "DELETE FROM `gestion_tenue_compte` WHERE id_gestion_compte = :banque_id";
        $query = $db->prepare($sql);
        $query->execute($parameters);

        $sql = "DELETE FROM `monetique` WHERE id_monetique = :banque_id";
        $query = $db->prepare($sql);
        $query->execute($parameters);

        $sql = "DELETE FROM `operation_paiement` WHERE id_operation = :banque_id";
        $query = $db->prepare($sql);

        return($query->execute($parameters));
    }


    public static function updateBanque($nom = '', $siege_social = '', $telephone = '', $fax = '', $id_banque)
    {
        $db = DB::getInstance();

        $sql = "UPDATE `banque` SET `nom`= :nom,`siege_social`= :siege_social ,`telephone`=:telephone,`fax`=:fax  WHERE id_banque = :id_banque";
        $query = $db->prepare($sql);
        $parameters = array(':nom' => $nom, ':siege_social' => $siege_social, ':telephone' => $telephone, ':fax' => $fax, ':id_banque' => $id_banque);

        return ($query->execute($parameters));
    }


    public static function updateMonetique(
        $carte_cib = ''
        , $emission_premiere_carte = ''
        , $renouvelement = ''
        , $reconfection = ''
        , $reedition_code_secret = ''
        , $comission_retrait_sur_dab_banque = ''
        , $comission_retrait_sur_dab_confrere = ''
        , $commission_paiement_sur_tpe_client = ''
        , $commission_paiement_sur_tpe_commercant = ''
        , $carte_internationale = ''
        , $octroi = ''
        , $mise_en_opposition = ''
        , $re_confection = ''
        , $reedition_du_code_secret = ''
        , $changement_de_code_pin = ''
        , $id_monetique)
    {
        $db = DB::getInstance();

        $sql = "UPDATE `monetique` 
                    SET
                   carte_cib =" . $carte_cib
            . " ,emission_premiere_carte =" . $emission_premiere_carte
            . " ,renouvelement =" . $renouvelement
            . " ,reconfection =" . $reconfection
            . " ,reedition_code_secret =" . $reedition_code_secret
            . " ,comission_retrait_sur_dab_banque =" . $comission_retrait_sur_dab_banque
            . " ,comission_retrait_sur_dab_confrere =" . $comission_retrait_sur_dab_confrere
            . " ,commission_paiement_sur_tpe_client =" . $commission_paiement_sur_tpe_client
            . " ,commission_paiement_sur_tpe_commercant =" . $commission_paiement_sur_tpe_commercant
            . " ,carte_internationale =" . $carte_internationale
            . " ,octroi =" . $octroi
            . " ,mise_en_opposition =" . $mise_en_opposition
            . " ,re_confection =" . $re_confection
            . " ,reedition_du_code_secret =" . $reedition_du_code_secret
            . " ,changement_de_code_pin =" . $changement_de_code_pin
            . " WHERE id_monetique =" . $id_monetique;
        $query = $db->prepare($sql);

        return ($query->execute());
    }


    public static function updateGestionCompte(
            $ouverture_compte_delivrance_chequier
            ,$frais_tenue_compte_courant
            ,$frais_tenue_compte_professionnel
            ,$frais_tenue_compte_cheque
            ,$frais_tenue_compte_sur_livret
            ,$tenue_compte_en_devise
            ,$fermeture_compte_courant
            ,$fermeture_compte_cheque
            ,$fermeture_compte_sur_livret
            ,$fermeture_compte_devise
            ,$id_gestion_compte
        )
    {
        $db = DB::getInstance();

        $sql = "UPDATE `gestion_tenue_compte` SET 
            `ouverture_compte_delivrance_chequier`=".$ouverture_compte_delivrance_chequier.
            ",`frais_tenue_compte_courant`=".$frais_tenue_compte_courant.
            ",`frais_tenue_compte_professionnel`=".$frais_tenue_compte_professionnel.
            ",`frais_tenue_compte_cheque`=".$frais_tenue_compte_cheque.
            ",`frais_tenue_compte_sur_livret`=".$frais_tenue_compte_sur_livret.
            ",`tenue_compte_en_devise`=".$tenue_compte_en_devise.
            ",`fermeture_compte_courant`=".$fermeture_compte_courant.
            ",`fermeture_compte_cheque`=".$fermeture_compte_cheque.
            ",`fermeture_compte_sur_livret`=".$fermeture_compte_sur_livret.
            ",`fermeture_compte_devise`=".$fermeture_compte_devise.
            " WHERE `id_gestion_compte` = ".$id_gestion_compte;

        $query = $db->prepare($sql);

        return ($query->execute());
    }


    public static function updateOppPaiement(
        $versement_especes_client_agence
        ,$versement_especes_tiers
        ,$versement_especes_deplace_lient_autre_agence
        ,$virement_recu_compte_meme_agence
        ,$virement_recu_compte_autre_agence_meme_banque
        ,$virement_devise_recu_etranger
        ,$rertait_especes
        ,$retrait_especes_guichets_autre_agence
        ,$emission_cheque_banque
        ,$emission_cheque_banque_deplace
        ,$annulation_cheque_banque
        ,$virement_compte_compte
        ,$virement_ordonne_en_faveur_client_autre_agence
        ,$id_operations_paiement
    )
    {
        $db = DB::getInstance();

        $sql = "UPDATE `operation_paiement` SET `versement_especes_client_agence`= ".
            $versement_especes_client_agence.",`versement_especes_tiers`= ".
            $versement_especes_tiers.",`versement_especes_deplace_lient_autre_agence`= ".
            $versement_especes_deplace_lient_autre_agence.",`virement_recu_compte_meme_agence`= ".
            $virement_recu_compte_meme_agence.",`virement_recu_compte_autre_agence_meme_banque`= ".
            $virement_recu_compte_autre_agence_meme_banque.",`virement_devise_recu_etranger`= ".
            $virement_devise_recu_etranger.",`rertait_especes`= ".
            $rertait_especes.",`retrait_especes_guichets_autre_agence`= ".
            $retrait_especes_guichets_autre_agence.",`emission_cheque_banque`= ".
            $emission_cheque_banque.",`emission_cheque_banque_deplace`= ".
            $emission_cheque_banque_deplace.",`annulation_cheque_banque`= ".
            $annulation_cheque_banque.",`virement_compte_compte`= ".
            $virement_compte_compte.",`virement_ordonne_en_faveur_client_autre_agence`= ".
            $virement_ordonne_en_faveur_client_autre_agence."  WHERE `id_operation`=".$id_operations_paiement;


        $query = $db->prepare($sql);

        return ($query->execute());
    }
}