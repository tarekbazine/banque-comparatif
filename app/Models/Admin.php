<?php

namespace TP\Models;

class Admin{

    public function checkUser($nom,$mdp) {
        $db= Database::getDB();

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