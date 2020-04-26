<?php

include_once('../INTERFACE/InterfaceServices_emp.php');
include_once('../ABSTRACT/AbstractTest.php');
include_once('../DAO/EmployeDataAccess.php');
include_once('../MODELE/Employe.php');

class ServiceEmploye extends Test implements InterfaceServiceEmploye{

    private $employeDataAccess;

    public function __construct()
    {
        $this->employeDataAccess = new EmployeDataAccess(); 
    }

    public function addEmp($tab){
    $employe = new Employe();
    $employe->setNoemp($tab["noemp"]);          
    $employe->setNom($tab["nom"]);          
    $employe->setPrenom($tab["prenom"]);          
    $employe->setEmploi($tab["emploi"]);          
    $employe->setSup($tab["sup"]);          
    $employe->setEmbauche($tab["embauche"]);          
    $employe->setSal($tab["salaire"]);          
    $employe->setComm($tab["comm"]);          
    $employe->setNoserv($tab["noserv"]);          
    $this->employeDataAccess->add($employe);
    }

    public function modifyEmp($tab){
    $employe = new Employe();    
    $employe->setNoemp($tab["noemp"]);          
    $employe->setNom($tab["nom"]);          
    $employe->setPrenom($tab["prenom"]);          
    $employe->setEmploi($tab["emploi"]);          
    $employe->setSup($tab["sup"]);          
    $employe->setEmbauche($tab["embauche"]);          
    $employe->setSal($tab["salaire"]);          
    $employe->setComm($tab["comm"]);          
    $employe->setNoserv($tab["noserv"]); 
    $this->employeDataAccess->modify($employe); 
    }

    public function afficherFormModifEmp($tab){
        $employe = new Employe();
        $employe->setNoemp($tab["modif"]);
        $data=$this->employeDataAccess->afficherFormModif($tab);
        return $data;

    }

    public function deleteEmp($tab){
        $employe = new Employe();
        $employe->setNoemp($tab["noemp"]);
        $this->employeDataAccess->delete($employe);
    }

    public function selectAll(){
        $data = $this->employeDataAccess->selectAll();
        return $data;
    }

    public function recherche($tab){
        $service=$tab["selection"];
        $service= $service . "%";
        $nom=$tab["nom"];
        $nom= $nom . "%";
        $prenom=$tab["prenom"];
        $prenom = $prenom . "%";
        $requete1="";
        $requete2="";
        foreach($tab as $key => $value){
            if($key == "salmin" && $value != NULL){
                $requete1 = " AND sal > $value";
            }
            if($key == "salmax" && $value != NULL){
                $requete2 = " AND sal < $value";
            }
        }
        echo $requete1;
        echo $requete2;
        $data=$this->employeDataAccess->recherche($service, $nom, $prenom, $requete1, $requete2);
        return $data;
    }
}

?>