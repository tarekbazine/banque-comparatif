<?php

namespace TP\Models;

require APP . 'core/DB.php';

use TP\Core\DB;

class Banque{

    public static function getBanques($columName = null,$limit = 30)
    {
        $db = DB::getInstance();

        if (isset($columName))
            $columName = $columName." ASC ,";
//        $sql = "SELECT `nom`, `siege_social`, `telephone`, `fax`, `id_gestion_compte`, `id_operations_paiement`, `id_monetique` FROM `banque` LIMIT ";
        $sql = "SELECT * FROM `banque` JOIN gestion_tenue_compte JOIN monetique JOIN operation_paiement
                  ON banque.id_gestion_compte = gestion_tenue_compte.id_gestion_compte 
                    AND banque.id_operations_paiement = operation_paiement.id_operation 
                    AND banque.id_monetique = monetique.id_monetique ORDER BY ".$columName." banque.nom ASC LIMIT ";

//        if ($avecId) { $avecId = false,
//            $sql = "SELECT `id`, `nom`, `siege_social`, `telephone`, `fax`, `id_gestion_compte`, `id_operations_paiement`, `id_monetique` FROM `banque` LIMIT ";
//        }

        $query = $db->prepare($sql . $limit);
        $query->execute();

//        $stmt = $db->query('SELECT id, name FROM users');
//        return $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $query->fetchAll();
    }


    public static function getBanquesBetween($columName = null,$min = 0,$max = 100)
    {
        $db = DB::getInstance();

        $sql = "SELECT * FROM `banque` JOIN gestion_tenue_compte JOIN monetique JOIN operation_paiement
                  ON banque.id_gestion_compte = gestion_tenue_compte.id_gestion_compte
                    AND banque.id_operations_paiement = operation_paiement.id_operation
                    AND banque.id_monetique = monetique.id_monetique
                    WHERE ".$columName." BETWEEN ".$min." AND ".$max."
                    ORDER BY banque.nom ASC ";


        $query = $db->prepare($sql);

        $query->execute();

        return $query->fetchAll();
    }

    public static function addBanque($nom, $siege_social, $telephone, $fax)
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

        $sql = "INSERT INTO `banque`(`nom`, `siege_social`, `telephone`, `fax`,`id_gestion_compte`, `id_operations_paiement`, `id_monetique`) VALUES (:nom, :siege_social, :telephone, :fax , :id_gestion_compte, :id_operations_paiement, :id_monetique)";
        $query = $db->prepare($sql);
        $parameters = array(':nom' => $nom,
            ':siege_social' => $siege_social,
            ':telephone' => $telephone,
            ':fax' => $fax,
            ':id_gestion_compte' => $id_gestion_tenue_compte,
            ':id_monetique' => $id_monetique,
            ':id_operation_paiement' => $id_operation_paiement
        );

        $query->execute($parameters);
    }


    public static function deleteBanque($banque_id){
        $db = DB::getInstance();

        $sql = "DELETE FROM `banque` WHERE id = :banque_id";
        $query = $db->prepare($sql);
        $parameters = array(':banque_id' => $banque_id);

        $query->execute($parameters);
    }


    public static function updateBanque($nom, $siege_social, $telephone,$fax , $id_banque){
        $db = DB::getInstance();

        $sql = "UPDATE `banque` SET `nom`= :nom,`siege_social`= :siege_social ,`telephone`=[value-4],`fax`=[value-5  WHERE id_banque = :id_banque";
        $query = $db->prepare($sql);
        $parameters = array(':nom' => $nom, ':siege_social' => $siege_social, ':telephone' => $telephone,':fax' => $fax, ':id_banque' => $id_banque);

        $query->execute($parameters);
    }



    public static function updateMonetique(
        $carte_cib
        ,$emission_premiere_carte
        ,$renouvelement
        ,$reconfection
        ,$reedition_code_secret
        ,$comission_retrait_sur_dab_banque
        ,$comission_retrait_sur_dab_confrere
        ,$commission_paiement_sur_tpe_client
        ,$commission_paiement_sur_tpe_commercant
        ,$carte_internationale
        ,$octroi
        ,$mise_en_opposition
        ,$re_confection
        ,$reedition_du_code_secret
        ,$changement_de_code_pin
        ,$id_monetique){
        $db = DB::getInstance();

        $sql = "UPDATE `monetique` 
                    SET
                   carte_cib =  :carte_cib
                   emission_premiere_carte =  :emission_premiere_carte
                   renouvelement =  :renouvelement
                   reconfection =  :reconfection
                   reedition_code_secret =  :reedition_code_secret
                   comission_retrait_sur_dab_banque =  :comission_retrait_sur_dab_banque
                   comission_retrait_sur_dab_confrere =  :comission_retrait_sur_dab_confrere
                   commission_paiement_sur_tpe_client =  :commission_paiement_sur_tpe_client
                   commission_paiement_sur_tpe_commercant =  :commission_paiement_sur_tpe_commercant
                   carte_internationale =  :carte_internationale
                   octroi =  :octroi
                   mise_en_opposition =  :mise_en_opposition
                   re_confection =  :re_confection
                   reedition_du_code_secret =  :reedition_du_code_secret
                   changement_de_code_pin =  :changement_de_code_pin
                      WHERE id_monetique = :id_monetique";

        $query = $db->prepare($sql);

        $parameters = array(
            'carte_cib' => $carte_cib
            ,'emission_premiere_carte' => $emission_premiere_carte
            ,'renouvelement' => $renouvelement
            ,'reconfection' => $reconfection
            ,'reedition_code_secret' => $reedition_code_secret
            ,'comission_retrait_sur_dab_banque' => $comission_retrait_sur_dab_banque
            ,'comission_retrait_sur_dab_confrere' => $comission_retrait_sur_dab_confrere
            ,'commission_paiement_sur_tpe_client' => $commission_paiement_sur_tpe_client
            ,'commission_paiement_sur_tpe_commercant' => $commission_paiement_sur_tpe_commercant
            ,'carte_internationale' => $carte_internationale
            ,'octroi' => $octroi
            ,'mise_en_opposition' => $mise_en_opposition
            ,'re_confection' => $re_confection
            ,'reedition_du_code_secret' => $reedition_du_code_secret
            ,'changement_de_code_pin' => $changement_de_code_pin
            ,':id_monetique' => $id_monetique);

        $query->execute($parameters);
    }




    /*
    public function getSong($song_id)
    {
        $sql = "SELECT id, artist, track, link FROM song WHERE id = :song_id LIMIT 1";
        $query = $this->db->prepare($sql);
        $parameters = array(':song_id' => $song_id);

        // useful for debugging: you can see the SQL behind above construction by using:
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

        $query->execute($parameters);

        // fetch() is the PDO method that get exactly one result
        return $query->fetch();
    }*/


    /*public function getAmountOfSongs(){
        $sql = "SELECT COUNT(id) AS amount_of_songs FROM song";
        $query = $this->db->prepare($sql);
        $query->execute();

        // fetch() is the PDO method that get exactly one result
        return $query->fetch()->amount_of_songs;
    }*/


    /* public static function find($id) {
         $db = DB::getInstance();
         // we make sure $id is an integer
         $id = intval($id);
         $req = $db->prepare('SELECT * FROM posts WHERE id = :id');
         // the query was prepared, now we replace :id with our actual $id value
         $req->execute(array('id' => $id));
         $post = $req->fetch();

         return new Post($post['id'], $post['author'], $post['content']);
     }*/
}