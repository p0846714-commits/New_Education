<?php

require_once dirname(__DIR__) . "/config/database.php";

class noteModel
{
    public function getAllMoyenne()
    {
        $database = new Database();

        $sql = "
            SELECT ROUND(COALESCE(AVG(moyenne_eleve),0),2) AS moyenne_general
            FROM (
                SELECT inscription_id,
                ROUND(
                    AVG(
                        (
                      COALESCE(devoir1,0)
                      + COALESCE(devoir2,0)
                      + 2 * COALESCE(composition,0)
                        ) / 4
                    ), 2
                ) AS moyenne_eleve

                FROM evaluations ev

                INNER JOIN inscriptions i
                    ON i.id = ev.inscription_id

                WHERE i.classe_id = 2
                AND ev.matiere_id = 1
                AND ev.periode_id = 1

                GROUP BY inscription_id
            );
        ";

        return $database->query($sql, false);
    }
}