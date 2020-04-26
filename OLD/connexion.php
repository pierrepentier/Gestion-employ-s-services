<?php 
    
if (isset($_POST["username"]) && isset($_POST["password"])){
    $username=$_POST['username'];
    $db=mysqli_init();
    mysqli_real_connect($db,'localhost','root','','gestion');
    $rs=mysqli_query($db, "SELECT * FROM utilisateur WHERE nom_utilisateur= '$username'");
    $data=mysqli_fetch_all($rs, MYSQLI_ASSOC);
    if(count($data)>0 && password_verify($_POST["password"], $data[0]["mdp"])){
    $test=$data[0]["mdp"];
        session_start();
        $_SESSION["role"]=$data[0]["role"];
        header('Location: php_sql.php');
        exit;
    }else{
        echo "mot de passe ou nom d'utilisateur incorrect";
    }
    mysqli_free_result($rs);
    MYSQLI_CLOSE($db);
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

                <form action="connexion.php" method="post">

                    <div class="row">
                        <div class="col-lg-6 offset-lg-3">
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
                    <div class="row text-center mt-4">
                        <button  class="btn btn-primary mx-auto" type="submit">connexion</button>
                        <a href="nouvel_utilisateur.php"<button  class="btn btn-primary mx-auto" type="submit">S'inscrire</button></a>
                    </div>
                
                </form>
            </div>
    </div>

</body>

</html>