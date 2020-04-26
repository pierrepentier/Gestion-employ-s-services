<!DOCTYPE html>
<html>
    <head>
        <title>Gestion Personnel</title>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    </head>

    <body>

   

    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <h1 class="mx-auto">Gestion du personnel</h1>
            </div>

            <div class="row ml-auto">
            <a class="ml-auto" href="formulaire_personnel.php"><button class="btn btn-primary"/>Ajouter</button><a>
            </div>

            <table class="table table-dark mt-5">
                <tr>
                    <th>N°</th>
                    <th>Prénom</th>
                    <th>Nom</th>
                    <th>Profession</th>
                    <th>Actions</th>
                </tr>

    <?php

function test(){
    $a = "hello";
    echo $a;
}

if(isset($_GET["suppression"])){
            $myfile = fopen("formulaire_personnel.txt","r+") or die("fichier introuvable!");
            while(!feof($myfile)){
                $ligne = fgets($myfile);              
                $myfileexplode = explode(";", $ligne);
                if($_GET["suppression"] == $myfileexplode[0]){
                    $contents = file_get_contents("formulaire_personnel.txt");
                    $nouvelle_entrée = "";
                    $contents = str_replace($ligne, $nouvelle_entrée, $contents);
                    file_put_contents("formulaire_personnel.txt", $contents);
                }
            }     
    fclose($myfile);    
}

    $myfile = fopen("formulaire_personnel.txt","r") or die("fichier introuvable!");
    test();
    while(!feof($myfile)){
        $ligne = fgets($myfile);
        if(trim($ligne)){
            $myfileexplode = explode(";", $ligne);
            echo'<tr>
                    <td>' . $myfileexplode[0] . '</td>
                    <td>' . $myfileexplode[1] . '</td>
                    <td>' . $myfileexplode[2] . '</td>
                    <td>' . $myfileexplode[3] . '</td>
                    <td><a href="formulaire_personnel.php?action=modifie&modif=' . $myfileexplode[0] . '"><button class="btn btn-primary"/>Editer</button></a>
                    <a href="gestion_personnel.php?suppression=' . $myfileexplode[0] . '"><button class="btn btn-primary"/>Supprimer</button></a>
                    </td>
                </tr>';
        }
       
    }
    fclose($myfile);
    



    ?>
            </table>
        </div>

    </div>

    </body>

</html>
