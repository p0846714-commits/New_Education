<?php


require_once dirname(__DIR__) . "/model/classeModel.php";
require_once dirname(__DIR__) . "/model/eleveModele.php";
require_once dirname(__DIR__) . "/model/matiereModel.php";
require_once dirname(__DIR__) . "/model/noteModel.php";
require_once dirname(__DIR__) . "/model/periodeModel.php";


class noteController
 {
//     public function accueil()
//     {
//         $periodeModel = new PeriodeModel();

//         $periodes = $periodeModel->getAllPeriode();

//         require_once dirname(__DIR__) . "/view/noteView.html.php";

//         // var_dump($periodes);
//         // die;

        
//     }

//     public function affich()
// {
//     $classeModel = new ClasseModel();
//     $matiereModel = new MatiereModel();
//     $periodeModel = new PeriodeModel();
//     $noteModel = new NoteModel();

//     $classes = $classeModel->getAllClasse();
//     $matieres = $matiereModel->getAllMatiere();
//     $periodes = $periodeModel->getAllPeriode();
//   //  $moyennes = $noteModel->getMoyenneClasse();

//     require_once dirname(__DIR__) . "/view/noteView.html.php";
// }




 public function accueil()
    {
        $classeModel = new ClasseModel();
        $matiereModel = new MatiereModel();
        $periodeModel = new PeriodeModel();

        $classes = $classeModel->getAllClasse();
        $matieres = $matiereModel->getAllMatiere();
        $periodes = $periodeModel->getAllPeriode();

        require_once dirname(__DIR__) . "/view/noteView.html.php";
    }

}