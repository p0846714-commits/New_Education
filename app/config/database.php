<?php

class Database
{
    public PDO $pdo;

    public function __construct()
    {
        try {

            $this->pdo = new PDO(
                "pgsql:host=localhost;dbname=education;port=5432",
                "postgres",
                "1945DIOUF"
            );

            $this->pdo->setAttribute(
                PDO::ATTR_DEFAULT_FETCH_MODE,
                PDO::FETCH_ASSOC
            );

            $this->pdo->setAttribute(
                PDO::ATTR_ERRMODE,
                PDO::ERRMODE_EXCEPTION
            );

        } catch (Exception $ex) {

            die("Erreur : " . $ex->getMessage());
        }
    }



    public function query(
        string $sql,
        bool $single = true
    ): array {

        $query = $this->pdo->query($sql);

        return $single
            ? $query->fetch()
            : $query->fetchAll();
    }



    public function prepare(
        string $sql,
        array $datas
    ) {

        $prepare = $this->pdo->prepare($sql);

        $prepare->execute($datas);

        return $prepare;
    }



    public function executeQuery(
        string $sql,
        array $datas,
        bool $single = true
    ): array {

        $statement = $this->prepare($sql, $datas);

        return $single
            ? $statement->fetch()
            : $statement->fetchAll();
    }


        //papa mamadou diouf

    public function getAllTable(
        string $tableName
    ): array {

        $sql = "SELECT * FROM $tableName";

        return $this->query($sql, false);
    }
}