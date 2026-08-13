<?php

require_once dirname(__DIR__) . "/config/database.php";

class periodeModel
{
    public function getAllPeriode()
    {
        $database = new Database();

        $sql = "SELECT * FROM periodes";

        return $database->query($sql, false);
    }
}
