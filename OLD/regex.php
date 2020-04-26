

<!DOCTYPE html>

<html>

    <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    </head>

    <body>

        <?php
            if(isset($_POST["reference"]) && isset($_POST["number"]) && isset($_POST["numsecu"]) && isset($_POST["email"])){
                if($_POST["reference"]=="" || $_POST["number"]=="" || $_POST["numsecu"]=="" || $_POST["email"]==""){
                    echo "Veuillez remplir tous les champs du formulaire";
                }
                else{
                    if(!preg_match("#^F[1-9]{9}#i", $_POST["reference"])){
                        echo "La référence doit commencer par 'F' suivi de neuf chiffres entre 1 et 9";
                    }
                    if(!preg_match("#^0[0-9]{9}#", $_POST["number"])){
                        echo "Le numéro de téléphone n'est pas valide";
                    }
                    if(!preg_match("#^[1-2][0-9]{2}(0[1-9]|1[0-2])(0[1-9]|[1-9][0-9])([0-9]{2}[1-9]|[0-9][1-9][0-9]|[1-9][0-9]{2})([0-9]{2}[1-9]|[1-9][0-9]{2}|[0-9][1-9][0-9])[0-9]{2}#", $_POST["numsecu"])){
                        echo "Le numéro de sécu n'est pas valide";
                    }
                    if(!preg_match("#([a-z]{2}|[0-9]{2})@[a-z]{2,}\.[a-z]{2,}#i", $_POST["email"])){
                        echo "Veuillez entrer un email valide";
                    }
                }
            }
        ?>
        <div class="container">
            <div class="col-lg-8 offset-lg-2 ">

                <form action="regex.php" method="post">

                    <div class="row">
                        <div class="col-lg-6 offset-lg-3">
                            <h1 class="text-center">Formulaire</h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-2 offset-lg-3">
                            <label for="reference">Réference</label>
                        </div>
                        <div class="col-lg-5">
                            <input id="reference" type="text" name="reference" placeholder="Entrer réference">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-2 offset-lg-3">
                            <label for="number">Tél</label>
                        </div>
                        <div class="col-lg-5">
                            <input id="number" type="number" name="number" placeholder="Entrer téléphone">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-2 offset-lg-3">
                            <label for="numsecu">N° Sécu</label>
                        </div>
                        <div class="col-lg-5">
                            <input id="numsecu" type="number" name="numsecu" placeholder="Entrer n° Sécu">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-2 offset-lg-3">
                            <label for="email">Email</label>
                        </div>
                        <div class="col-lg-5">
                            <input id="email" type="email" name="email" placeholder="Entrer email">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 offset-lg-4 mt-2">
                        <button class="btn btn-primary mx-auto" type="submit">Valider</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </body>

</html>
