<?php

include_once('../INTERFACE/InterfaceServices_serv.php');
include_once('../ABSTRACT/AbstractTest.php');
include_once('../DAO/ServiceDataAccess.php');

class ServiceService extends Test implements InterfaceServiceService{

    private $serviceDataAccess;

    public function __construct()
    {
        $this->serviceDataAccess = new ServiceDataAccess(); 
    }
    
    function selectEmpbyServ($select){
        $data=$this->serviceDataAccess->selectEmpbyServ($select);
        return $data;
    }

    public function selectAll(){
        $data=$this->serviceDataAccess->selectAll();
        return $data;
    }

}

?>