<?php
session_start();
include_once('../SERVICES/services_emp.php');
include_once('../SERVICES/services_serv.php');


function affichage($data){   
    if(isset($_SESSION["role"])){
        if($_SESSION["role"]=="admin"){
            echo '<tr>';
            foreach(array_keys($data[0]) as $key => $value){               
            echo    '<th>'.$value.'</th>';                                  
            }
            echo    '</tr>';

            foreach($data as $key => $value){
                echo'<tr>';
                foreach($value as $key2 => $value2){
                    echo'<td>'. $value2 . '</td>';
                }
                
                echo"<td><a href='formulaire_php_sql.php?action=modifier&modif='".$value["NOEMP"]."'><button type='submit' class='btn btn-primary'>Editer</button></a>
                     <a class='btn btn-outline-danger w-100 delete' data-noemp='".$value["NOEMP"]."' role='button'>X</a>";
            }
            
        }    
        else{
            echo '<tr>';
            foreach(array_keys($data[0]) as $key => $value){               
            echo    '<th>'.$value.'</th>';                                  
            }
            echo    '</tr>';

            foreach($data as $key => $value){
                echo'<tr>';
                foreach($value as $key2 => $value2){
                    echo'<td>'. $value2 . '</td>';
                }
                echo'</tr>';
            }
        }
    }
}

?>

<table class="table table-dark mt-5">
                
    <?php

    $employeService = new ServiceEmploye();

    if(!isset($_POST["selection"])){
            $data = $employeService->selectAll();
            affichage($data);
        }

    // if(isset($_GET["select"])){
    //     if($_GET["select"]=="all"){
    //         $data = $employeService->selectAll();
    //         affichage($data);
    //     }else{
    //         $serviceService = new ServiceService();
    //         $data=$serviceService->selectEmpbyServ($_GET["select"]);
    //         if(count($data)>0){
    //             affichage($data); 
    //         }else{
    //             echo "Aucun employé présent dans ce service";
    //         }
                
    //     }
    // }

    if(isset($_POST["selection"])){
        $data=$employeService->recherche($_POST);
        if(count($data)>0){
            affichage($data);
        }else{
            echo "Aucun employé ne correspond à votre recherche";
        }
    }
                    
    ?>
        
</table>