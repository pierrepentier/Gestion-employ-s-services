<?php 

include_once('../MODELE/Utilisateur.php');
include_once('../DAO/UtilisateurDataAccess.php');
include_once('../SERVICES/services_utilisateur.php');


if (isset($_POST["username"]) && isset($_POST["password"])){
    $utilisateurService= new ServiceUtilisateur();
    $data=$utilisateurService->verifyUser($_POST);
    
    if(count($data)>0 && password_verify($_POST["password"], $data[0]["mdp"])){
        session_start();
        $_SESSION["role"]=$data[0]["role"];
        $_SESSION["username"]=$data[0]["nom_utilisateur"];
        header('Location: php_sql.php');
        exit;
    }else{
        echo "mot de passe ou nom d'utilisateur incorrect";
    }
}    


?>

<!DOCTYPE html>

<html>

    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    </head>

    <body>

        <div class="container">
                <div class="col-lg-8 offset-lg-2">

                    <form action="connexion.php" method="post">

                        <div class="row">
                            <div class="col-lg-6 offset-lg-3 mb-4">
                                <h1 class="text-center">Connexion</h1>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-3 offset-lg-3">
                                <label for="username">User name</label>
                            </div>
                            <div class="col-lg-4">
                                <input id="username" type="text" name="username"  placeholder="nom de l'utilisateur" value= "" >
                            </div> 
                        </div>
                        <div class="row">
                            <div class="col-lg-3 offset-lg-3">
                                <label for="password">Mot de passe</label>
                            </div>
                            <div class="col-lg-4">
                                <input id="password" type="password" name="password"  placeholder="mot de passe" value= "" >
                            </div> 
                        </div>
                        <div class="row justify-content-center mt-4">
                            
                                <button  class="btn btn-primary" type="submit">connexion</button>
                                
                            
                        </div>
                    
                    </form>
                    <div class="row justify-content-center mt-2">
                        <a href="nouvel_utilisateur.php"><button  class="btn btn-success mx-auto ">S'inscrire</button></a>
                    </div>
                </div>
                
            
                

        </div>

    </body>

</html>