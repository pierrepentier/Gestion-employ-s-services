<?php

session_start();
if(!isset($_SESSION["role"])){
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

<?php

if(isset($_GET["modif"])){
    $db=mysqli_init();
    mysqli_real_connect($db,'localhost','root','','gestion');
    $rs=mysqli_query($db, 'SELECT * FROM emp WHERE noemp='.$_GET["modif"].'');
    $data=mysqli_fetch_all($rs, MYSQLI_ASSOC);
}
    
?>                                      
    <div class="container">
        <div class="col-lg-8 offset-lg-2 ">

            <form action="php_sql.php" method="post">

                <div class="row">
                    <div class="col-lg-6 offset-lg-3">
                        <h1 class="text-center">Formulaire</h1>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-2 offset-lg-3">
                        <label for="noemp">N°EMP</label>
                    </div>
                    <div class="col-lg-5">
                        <input id="noemp" type="number" name="noemp"  placeholder="Entrez le n° de l'employé" value="<?php if(isset($_GET["modif"])){ echo $data[0]["noemp"]; }?>">
                    </div> 
                </div>
                <div class="row">
                    <div class="col-lg-2 offset-lg-3">
                        <label for="nom">Nom</label>
                    </div>
                    <div class="col-lg-5">
                        <input id="nom" type="text" name="nom" placeholder="nom de l'employé" value= "<?php if(isset($_GET["modif"])){ echo $data[0]["nom"]; }?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-2 offset-lg-3">
                        <label for="prenom">Prénom</label>
                    </div>
                    <div class="col-lg-5">
                        <input id="prenom" type="text" name="prenom" placeholder="prénom de l'employé" value= "<?php if(isset($_GET["modif"])){ echo $data[0]["prenom"]; }?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-2 offset-lg-3">
                        <label for="emploi">Emploi</label>
                    </div>
                    <div class="col-lg-5">
                        <input id="emploi" type="text" name="emploi" placeholder="entrez la profession" value= "<?php if(isset($_GET["modif"])){ echo $data[0]["emploi"]; }?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-2 offset-lg-3">
                        <label for="sup">Supérieur</label>
                    </div>
                    <div class="col-lg-5">
                        <input id="sup" type="number" name="sup" placeholder="n° du supérieur" value= "<?php if(isset($_GET["modif"])){ echo $data[0]["sup"]; }?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-2 offset-lg-3">
                        <label for="embauche">Embauche</label>
                    </div>
                    <div class="col-lg-5">
                        <input id="embauche" type="text" name="embauche" placeholder="date d'embauche" value= "<?php if(isset($_GET["modif"])){ echo $data[0]["embauche"]; }?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-2 offset-lg-3">
                        <label for="salaire">Salaire</label>
                    </div>
                    <div class="col-lg-5">
                        <input id="salaire" type="number" name="salaire" placeholder="Salaire" value= "<?php if(isset($_GET["modif"])){ echo $data[0]["sal"]; }?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-2 offset-lg-3">
                        <label for="salaire">Comission</label>
                    </div>
                    <div class="col-lg-5">
                        <input id="comm" type="number" name="comm" placeholder="Commission" value= "<?php if(isset($_GET["modif"])){ echo $data[0]["sal"]; }?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-2 offset-lg-3">
                        <label for="noserv">N° du service</label>
                    </div>
                    <div class="col-lg-5">
                        <input id="noserv" type="number" name="noserv" placeholder="N° du service" value= "<?php if(isset($_GET["modif"])){ echo $data[0]["noserv"]; }?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 offset-lg-4 mt-2">
                    <button name="validation" value="<?php if(isset($_GET["action"]) && $_GET["action"]="modifier"){echo "modify";}else{echo "add";} ?>" class="btn btn-primary mx-auto" type="submit">
                    <?php if(isset($_GET["action"]) && $_GET["action"]="modifier"){
                            echo "Modifier";
                          }else{
                              echo "Ajouter";
                          } 
                    ?>
                    </button>
                    <a href="php_sql.php"><button class="btn btn-primary mx-auto" type="submit">Retour</button></a>
                    </div>
                </div>
            </form>
        </div>
    </div>
    
</body>

</html>