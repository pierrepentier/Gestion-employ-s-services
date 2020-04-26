<?php

session_start();
if(!isset($_SESSION["role"])){
    header('Location: connexion.php');
    exit;
}

function add(){
    $noemp=$_POST["NOEMP"];
    $nom=$_POST["NOM"];
    $prenom=$_POST["PRENOM"];
    $emploi=$_POST["EMPLOI"];
    $sup=$_POST["SUP"];
    $embauche=$_POST["EMBAUCHE"];
    $sal=$_POST["SALAIRE"];
    $comm=$_POST["COMM"];
    $noserv=$_POST["NOSERV"];
    $db=mysqli_init();
    mysqli_real_connect($db,'localhost','root','','gestion');
    $rs=mysqli_query($db, "INSERT INTO employés(noemp, nom, prenom, emploi, sup, embauche, sal, comm, noserv) VALUES ($noemp, '$nom', '$prenom', '$emploi', $sup, '$embauche', $sal, $comm, $noserv)");
    MYSQLI_CLOSE($db);
}
function modify(){    
    $noemp=$_POST["NOEMP"];
    $nom=$_POST["NOM"];
    $prenom=$_POST["PRENOM"];
    $emploi=$_POST["EMPLOI"];
    $sup=$_POST["SUP"];
    $embauche=$_POST["EMBAUCHE"];
    $sal=$_POST["SALAIRE"];
    $comm=$_POST["COMM"];
    $noserv=$_POST["NOSERV"];
    $db=mysqli_init();
    mysqli_real_connect($db,'localhost','root','','gestion');
    $rs=mysqli_query($db, "UPDATE employés SET noemp=$noemp, nom='$nom', prenom='$prenom', emploi='$emploi', sup=$sup, embauche='$embauche', sal=$sal, comm=$comm, noserv=$noserv where noemp ='$noemp'");
    MYSQLI_CLOSE($db);   
} 
function delete(){    
    $noemp=$_GET["noemp"];
    $db=mysqli_init();
    mysqli_real_connect($db,'localhost','root','','gestion');
    $rs=mysqli_query($db, "DELETE FROM employés WHERE noemp=$noemp");                    
}           


?>

<!DOCTYPE html>
<html>

<head>
    <title>Base de données</title>
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
            
            <?php if(isset($_SESSION["role"])){
                    if($_SESSION["role"]=="admin"){
                        echo'<a class="ml-auto" href="logout.php"><button class="btn btn-primary">Déconnecter</button><a>
                        <a class="ml-1" href="formulaire_php_sql.php"><button class="btn btn-primary">Ajouter employé</button><a>
                        <a class="ml-1" href="nouvel_utilisateur.php"><button class="btn btn-primary">Ajouter utilisateur</button><a>';
                    }
                    else{
                        echo '<a class="ml-auto" href="logout.php"><button class="btn btn-primary">Déconnecter</button><a>';
                    }
                }
            ?>
            </div>

            <table class="table table-dark mt-5">

                
<?php

if(isset($_POST["validation"]) && $_POST["validation"]=="add"){            
    add();
}

if(isset($_POST["validation"]) && $_POST["validation"]=="modify"){
    modify();
}
         
if(isset($_GET["action"]) && $_GET["action"]="suppression"){
    delete();
}

$db=mysqli_init();
mysqli_real_connect($db,'localhost','root','','gestion');
$rs=mysqli_query($db, 'SELECT * FROM employés');
$data=mysqli_fetch_all($rs, MYSQLI_ASSOC);
mysqli_free_result($rs);
MYSQLI_CLOSE($db);

affichage($data);
    
?>
            </table>
        </div>
    </div>

</body>

</html>