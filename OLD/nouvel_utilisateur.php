<?php

if(isset($_POST["validation"]) && $_POST["validation"]=="add_user"){
    $db=mysqli_init();
    $id_user=$_POST["id-utilisateur"];
    $nom=$_POST["nom"];
    $mdp=password_hash($_POST["mdp"], PASSWORD_DEFAULT);
    mysqli_real_connect($db,'localhost','root','','gestion');
    $rs=mysqli_query($db, "INSERT INTO utilisateur(id_utilisateur, nom_utilisateur , mdp, role ) VALUES('$id_user','$nom','$mdp', 'client')");

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
                        <input id="id-utilisateur" type="number" name="id-utilisateur"  placeholder="ID de l'utilisateur">
                    </div> 
                </div>
                <div class="row">
                    <div class="col-lg-2 offset-lg-3">
                        <label for="nom">Nom utilisateur</label>
                    </div>
                    <div class="col-lg-5">
                        <input id="nom" type="text" name="nom" placeholder="nom de l'utilisateur">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-2 offset-lg-3">
                        <label for="mdp">Mot de Passe</label>
                    </div>
                    <div class="col-lg-5">
                        <input id="mdp" type="text" name="mdp" placeholder="Entrer Mot de Passe">
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-lg-6 offset-lg-4 mt-2">
                    <button name="validation" value="add_user" class="btn btn-primary mx-auto" type="submit">Valider</button>
                    <a href="connexion.php"><button class="btn btn-primary mx-auto" type="submit">Retour</button></a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    
    
</body>

</html>