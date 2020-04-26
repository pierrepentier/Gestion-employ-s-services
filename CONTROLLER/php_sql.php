<?php

session_start();
if(!isset($_SESSION["role"])){
    header('Location: connexion.php');
    exit;
}

include_once('../SERVICES/services_emp.php');
include_once('../MODELE/Service.php');
include_once('../SERVICES/services_serv.php');

$employeService = new ServiceEmploye();

if(isset($_POST["validation"]) && $_POST["validation"]=="add"){           
    $employeService->addEmp($_POST); 
}

if(isset($_POST["validation"]) && $_POST["validation"]=="modify"){            
    $employeService->modifyEmp($_POST);
}
        
if(isset($_GET["action"]) && $_GET["action"]=="suppression"){           
    $employeService->deleteEmp($_GET);
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Base de données</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
   
    <!--script-->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</head>

<body>



<div class="container-fluid">
    <div class="container">
        <div class="row">
            <h1 class="mx-auto">Gestion du personnel</h1>
        </div>
        <div class="row mx-auto">
        
        <?php 
        
        
        if(isset($_SESSION["role"])){
            if($_SESSION["role"]=="admin"){
                echo '<p class="mr-auto">'. $_SESSION["username"] .'(Admin)</p><a href="formulaire_php_sql.php" class="mr-1"><button class="btn btn-primary">Ajouter employé</button><a>
                <a href="logout.php"><button class="btn btn-primary">Déconnecter</button><a>';
            }
            else{
                echo '<p class= "mr-auto">'. $_SESSION["username"] .'(Utilisateur)</p><a href="logout.php"><button class="btn btn-primary">Déconnecter</button><a>';
            }
        }
        ?>
        </div>

        <div class="dropdown">
            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Sélectionner un service
            </a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            <?php
            $serviceService = new ServiceService();
            $data=$serviceService->selectAll();
            foreach($data as $key => $value){
                foreach($value as $key2 => $value2){
                    echo '<a class="dropdown-item" href="php_sql.php?select='.$value2.'">'.$value2.'</a>';
                }
            }
            
            ?>
            <a class="dropdown-item" href="php_sql.php?select=all">Tous les services</a>    
            </div>
        </div>
        <form method="post" action="php_sql.php">        
            <div class="row mt-3">
                <div class=col-lg-2>
                    <select name="selection" id="select" class="custom-select custom-select-sm">
                        <option value="" selected>Service</option>
                        <?php
                            $serviceService = new ServiceService();
                            $data=$serviceService->selectAll();
                            foreach($data as $key => $value){
                                foreach($value as $key2 => $value2){
                                    echo '<option value='.$value2.'>'.$value2.'</option>';
                                }
                            }
                            ?>
                    </select>
                </div>
                <div class=col-lg-2>
                <input class="w-100" id="nom" type="text" name="nom"  placeholder="Nom">
                </div>
                <div class=col-lg-2>
                    <input class="w-100" id="prenom" type="text" name="prenom"  placeholder="Prenom">
                </div>
                <div class=col-lg-2>
                    <input id="salmin" type="number" name="salmin"  placeholder="Salaire min.">
                </div>
                <div class=col-lg-2>
                    <input id="salmax" type="number" name="salmax"  placeholder="Salaire max.">
                </div>
                <!-- <div class=col-lg-2><button class="btn btn-primary mx-auto w-100" name="recherche" type="submit">Rechercher</button></div> -->
            </div>
        </form>
        <div id="ptable"></div>


    </div>
</div>

</body>

    <script src="../JS/jquery-3.4.1.min.js"></script>
    <script src="../JS/script.js"></script>
</html>