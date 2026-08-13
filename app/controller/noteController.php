<?php


require_once dirname(__DIR__) . "/model/periodeModel.php";

class NoteController
{
    public function accueil()
    {
        $periodeModel = new PeriodeModel();

        $periodes = $periodeModel->getAllPeriode();

       // require_once dirname(__DIR__) . "/view/noteView.html.php";
    }
}