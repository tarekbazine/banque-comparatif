<?php

namespace TP\Models;

require_once APP . 'core/DB.php';

use TP\Core\DB;

class Presentation{

    public static function getPresentation()
    {
        $db = DB::getInstance();


        $sql = "SELECT * FROM `presentation` LIMIT 1";

        $query = $db->prepare($sql);
        $query->execute();

//        $stmt = $db->query('SELECT id, name FROM users');
//        return $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $query->fetch();
    }
}