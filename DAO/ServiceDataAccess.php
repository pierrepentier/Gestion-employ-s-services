<?php

include_once('../INTERFACE/InterfaceServiceDataAccess.php');
include_once('../ABSTRACT/AbstractTest.php');

class ServiceDataAccess extends Test implements InterfaceServiceDataAccess {

    public function connexion(){
        $db = new mysqli('localhost','root','','gestion');
        return $db;    
    }

    public function deconnexion($db){
        $db -> close();
    }

    public function selectAll(){
        $db=$this->connexion();
        $stmt = $db ->prepare("SELECT DISTINCT service FROM service");
        $stmt -> execute();
        $rs= $stmt -> get_result();
        $data = $rs -> fetch_all(MYSQLI_ASSOC);
        $rs -> free();
        $this->deconnexion($db);
        return $data;
    }

    public function selectEmpbyServ($nomserv){
        $db=$this->connexion();
        $stmt = $db ->prepare("SELECT A.* FROM employés as A INNER JOIN service as B ON A.noserv = B.noserv WHERE B.service=?");
        $stmt -> bind_param("s", $nomserv);
        $stmt -> execute();
        $rs = $stmt -> get_result(); 
        $data= $rs -> fetch_all(MYSQLI_ASSOC);
        $rs -> free();
        $this->deconnexion($db);
        return $data;
    }

}

?>