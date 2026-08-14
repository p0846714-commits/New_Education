<?php


require_once dirname(__DIR__) . "/config/database.php";

class eleveModele
{
    public string $nom;
    public string $prenom;
    public string $matricule;

    
    public function __construct(
        string $nom,
        string $prenom,
        string $matricule
    ) {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->matricule = $matricule;
    }
}