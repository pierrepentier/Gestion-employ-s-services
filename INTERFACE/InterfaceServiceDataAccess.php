<?php

interface InterfaceServiceDataAccess{

    public function connexion();

    public function deconnexion($db);

    public function selectAll();

    public function selectEmpbyServ($nomserv);

}

?>