<?php

include_once('../SERVICES/services_emp.php');
include_once('../DAO/EmployeDataAccess.php');
include_once('../CONTROLLER/displayTable.php');


$employeService = new ServiceEmploye();

if(isset($_GET["noemp"])){           
    $employeService->deleteEmp($_GET);
}

?>