<?php

require_once dirname(__DIR__) . "/config/database.php";

class matiereModel
{
    public function getAllMatiere()
    {
        $database = new Database();

        $sql = "
            SELECT * FROM matieres;
        ";

        return $database->query($sql, false);
    }
}