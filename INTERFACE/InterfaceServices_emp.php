<?php

interface InterfaceServiceEmploye{

    public function __construct();

    public function addEmp($tab);

    public function modifyEmp($tab);

    public function afficherFormModifEmp($tab);

    public function deleteEmp($tab);

    public function selectAll();

    public function recherche($tab);
}

?>