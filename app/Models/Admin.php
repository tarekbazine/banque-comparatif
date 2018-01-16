<?php

namespace TP\Models;

use TP\Core\DB;

class Admin{

    public function checkAdmin($nom,$mdp) {
        $db= DB::getInstance();

        $stmt = $db->prepare("SELECT * FROM admin WHERE nom = :nom AND mot_de_passe = :mdp");

        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':mdp', $mdp);

        $stmt->execute();

        $count = $stmt->rowCount();

        if($count > 0){
            return true;
        }

        return false;
    }
}