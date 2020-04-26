<?php

include_once('../MODELE/Utilisateur.php');
include_once('../DAO/UtilisateurDataAccess.php');

if(isset($_POST["validation"]) && $_POST["validation"]=="add_user"){
    $utilisateurDataAccess = new UtilisateurDataAccess();
    $utilisateur = new Utilisateur();
    $utilisateur->setId($_POST["id-utilisateur"]);  
    $utilisateur->setNom($_POST["nom"]);
    $utilisateur->setMdp(password_hash($_POST["mdp"], PASSWORD_DEFAULT));
    $utilisateurDataAccess->add_user($utilisateur);
    header('Location: connexion.php');
    exit;
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
        <div class="col-lg-8 offset-lg-2 ">

            <form action="nouvel_utilisateur.php" method="post">

                <div class="row">
                    <div class="col-lg-6 offset-lg-3">
                        <h1 class="text-center">Ajouter utilisateur</h1>
                    </div>
                </div>

                <div class="row mt-5">
                    <div class="col-lg-2 offset-lg-3">
                        <label for="id-utilisateur">ID utilisateur</label>
                    </div>
                    <div class="col-lg-5">
                        <input id="id-utilisateur" type="number" name="id-utilisateur"  placeholder="ID de l'utilisateur" value="">
                    </div> 
                </div>
                <div class="row">
                    <div class="col-lg-2 offset-lg-3">
                        <label for="nom">Nom utilisateur</label>
                    </div>
                    <div class="col-lg-5">
                        <input id="nom" type="text" name="nom" placeholder="nom de l'utilisateur" value= "">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-2 offset-lg-3">
                        <label for="mdp">Mot de Passe</label>
                    </div>
                    <div class="col-lg-5">
                        <input id="mdp" type="text" name="mdp" placeholder="Entrer Mot de Passe" value= "">
                    </div>
                </div>                
                <div class="row justify-content-center">                   
                    <button name="validation" value="add_user" class="btn btn-primary mx-auto" type="submit">Valider</button>                   
                </div>
            </form>
            <div class="row justify-content-center mt-2">
                <a href="connexion.php"><button class="btn btn-danger mx-auto">Retour</button></a>
                </div>
            </div>
        </div>
    </div>

    
    
</body>

</html>