<!DOCTYPE html>

<html>

<head>
<meta charset="utf-8">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>

<?php
    if($_POST){

        $myfile = fopen("formulaire_personnel.txt", "a") or die("Fichier introuvable!");





        if(isset($_POST["validation"]) && $_POST["validation"] == "ajouter"){
            if($_POST["ide"] != "" && $_POST["nom"] != "" && $_POST["prenom"] != "" && $_POST["profession"] != ""){
                fwrite($myfile,$_POST["ide"] . ";");
                fwrite($myfile, $_POST["nom"] . ";");
                fwrite($myfile, $_POST["prenom"] . ";");
                fwrite($myfile, $_POST["profession"] . ";\n");                  
                fclose($myfile);
            }
            else{
                echo "Veuillez remplir tous les champs du formulaire";
            }
        }
            
    }

    $val_ide="";        
    $val_nom="";
    $val_prenom="";
    $val_profession="";
    if(isset($_GET["modif"])){
        $myfile = fopen("formulaire_personnel.txt","r") or die("fichier introuvable!");
        while(!feof($myfile)){
            $ligne = fgets($myfile);              
            $myfileexplode = explode(";", $ligne);
            if($_GET["modif"] == $myfileexplode[0]){
                $val_ide=$myfileexplode[0];
                $val_nom=$myfileexplode[1];
                $val_prenom=$myfileexplode[2];
                $val_profession=$myfileexplode[3];
            }           
        }
        fclose($myfile);
    }

    $myfile = fopen("formulaire_personnel.txt","r+") or die("fichier introuvable!");
    if(isset($_POST["validation"]) && $_POST["validation"]=="modify"){
        $myfile = fopen("formulaire_personnel.txt","r+") or die("fichier introuvable!");
        while(!feof($myfile)){
            $ligne = fgets($myfile);              
            $myfileexplode = explode(";", $ligne);
            if($_POST["ide"] == $myfileexplode[0]){
                $contents = file_get_contents("formulaire_personnel.txt");
                $nouvelle_entrée = $_POST["ide"] . ";" . $_POST["nom"] . ";" . $_POST["prenom"] . ";" . $_POST["profession"] . ";\n";
                $contents = str_replace($ligne, $nouvelle_entrée, $contents);
                file_put_contents("formulaire_personnel.txt", $contents);
            }
        }
    }
    fclose($myfile);
    
    ?>
    
    <div class="container">
        <div class="col-lg-8 offset-lg-2 ">

            <form action="formulaire_personnel.php" method="post">

                <div class="row">
                    <div class="col-lg-6 offset-lg-3">
                        <h1 class="text-center">Formulaire</h1>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-2 offset-lg-3">
                        <label for="ide">N°</label>
                    </div>
                    <div class="col-lg-5">
                        <input id="ide" type="number" name="ide"  placeholder="Entrez l'IDE de l'employé" value= "<?php echo $val_ide ?>" >
                    </div> 
                </div>
                <div class="row">
                    <div class="col-lg-2 offset-lg-3">
                        <label for="prenom">Prénom</label>
                    </div>
                    <div class="col-lg-5">
                        <input id="prenom" type="text" name="prenom" placeholder="prénom de l'employé" value= "<?php echo $val_prenom ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-2 offset-lg-3">
                        <label for="nom">Nom</label>
                    </div>
                    <div class="col-lg-5">
                        <input id="nom" type="text" name="nom" placeholder="nom de l'employé" value= "<?php echo $val_nom ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-2 offset-lg-3">
                        <label for="profession">Profession</label>
                    </div>
                    <div class="col-lg-5">
                        <input id="profession" type="text" name="profession" placeholder="entrez la profession" value= "<?php echo $val_profession ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 offset-lg-4 mt-2">
                    <button name="validation" value="<?php if(isset($_GET["action"]) && $_GET["action"]="modifie"){echo "modify";}else{echo "ajouter";} ?>" class="btn btn-primary mx-auto" type="submit">
                    <?php if(isset($_GET["action"]) && $_GET["action"]="modifie"){
                            echo "Modifier";
                          }else{
                              echo "Ajouter";
                          } 
                    ?>
                    </button>
                    <a href="gestion_personnel.php"<button  class="btn btn-primary mx-auto" type="submit">Retour</button></a>
                    </div>
                </div>
            </form>
        </div>
    </div>


    
    
</body>

</html>