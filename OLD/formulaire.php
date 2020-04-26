<!DOCTYPE html>

<html>

<head>
<meta charset="utf-8">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>

    <form action="formulaire.php" method="post">
        <label for="nom">Nom</label>
        <input id="nom" type="text" name="nom" placeholder="votre nom ici"> 
        <label for="prenom">Prénom</label>
        <input id="prenom" type="text" name="prenom" placeholder="votre prénom ici">
        <label for="prenom">Password</label>
        <input id="password" type="password" name="password" placeholder="entrez votre mot de passe">
        <input type="submit" value="valider">
    </form>

    <?php
    if($_POST){

    $myfile = fopen("test.txt", "w") or die("Fichier introuvable!");
    
    fwrite($myfile, $_POST["nom"] . "\n");
    fwrite($myfile, $_POST["prenom"] . "\n");
    fwrite($myfile, $_POST["password"] . "\n");
    

    fclose($myfile);
    

    $myfile = fopen("test.txt", "r") or die("Fichier introuvable!");
    echo '<div class="alert alert-primary" role="alert">';
    
    while(!feof($myfile)){
        echo fgets($myfile);   
    }
    echo "</div>";
    fclose($myfile);

    }

    ?>

</body>

</html>