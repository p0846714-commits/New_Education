<?php


require_once dirname(__DIR__) . "/config/database.php";

class classeModel
{
    public function getAllClasse()
    {
        $database = new Database();

        $sql = "
            SELECT * FROM classes;
        ";

        return $database->query($sql, false);
    }
}