<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
</head>
<body>

<form method="post" action ="">
    <label for="nombrePersonne">Saisir votre nombre : </label>
    <input id="nombrePersonne" placeholder="Saisissez votre nombre ici" size="50" maxlength="10" type="text" name="nombre" />
    <input type="submit" value="envoyer">
</form>


<?php
if(isset($_POST["nombre"]) ) {

    if($_POST["nombre"] > 100 && $_POST["nombre"] && is_numeric($_POST["nombre"])){
        echo "Le nombre est supérieur à 100";
    } 
    elseif($_POST["nombre"] < 100 && $_POST["nombre"] && is_numeric($_POST["nombre"])){
        echo "Le nombre est inférieur à 100";
    }
    elseif($_POST["nombre"] = 100 && $_POST["nombre"] && is_numeric($_POST["nombre"])){
        echo "Le nombre est égal à 100";
    }
    
    

}

?>

</body>
</html>