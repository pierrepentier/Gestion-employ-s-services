<!DOCTYPE html>
<html>
    <head>
        <title>Essai</title>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    </head>
        <body>
			<?php
				
				const MAX_NUMBER = 100;
				const EMPTY_STRING = "";
				$message = EMPTY_STRING;
				if(isset($_POST["nombre"])){
					if($_POST["nombre"] != EMPTY_STRING && is_numeric($_POST["nombre"]) &&
						$_POST["nombre"] >= MAX_NUMBER){
						$message = "Le nombre 1 est supérieur ou égale à 100.";
					} elseif($_POST["nombre"] != EMPTY_STRING && is_numeric($_POST["nombre"]) &&
						$_POST["nombre"] < MAX_NUMBER){
						$message = "Le nombre 1 est inférieur à 100.";
					} else {
						$message = "Vérifiez votre saisie.";
					}
                }
                
                $message2 = EMPTY_STRING;
				if(isset($_POST["nombre2"])){
					if($_POST["nombre2"] != EMPTY_STRING && is_numeric($_POST["nombre2"]) &&
                    $_POST["nombre2"] >= MAX_NUMBER){
						$message2 = "Le nombre 2 est supérieur ou égale à 100.";
                    } 
                    elseif($_POST["nombre2"] != EMPTY_STRING && is_numeric($_POST["nombre2"]) &&
                    $_POST["nombre2"] <= MAX_NUMBER){
						$message2 = "Le nombre 2 est inférieur à 100.";
                    } 
                    else {
						$message2 = "Vérifiez votre saisie.";
					}
                }
                
               

                
                $message3 = EMPTY_STRING;
                $message4 = EMPTY_STRING;
                $resultat = 0;

                if(isset($_POST["nombre"]) && isset($_POST["nombre2"])) {

                    $x=$_POST["nombre"];
                    $y=$_POST["nombre2"];
                    
                    if($_POST["nombre"] != EMPTY_STRING && is_numeric($_POST["nombre"]) &&
                         $_POST["nombre2"] != EMPTY_STRING && is_numeric($_POST["nombre2"])){

                            switch ($_POST["cal"]){

                                case "Vérifier" : if($_POST["nombre"] > $_POST["nombre2"]){
                        
                                                    $message3= $_POST["nombre"] . " " . "est supérieur à" . " " . $_POST["nombre2"] ;
                                                    
                                                   }elseif($_POST["nombre"] < $_POST["nombre2"]){
                                    
                                                    $message3= $_POST["nombre"] . " " . "est inférieur à" . " " . $_POST["nombre2"] ;
                                                    
                                    
                                                   }elseif($_POST["nombre"] = $_POST["nombre2"]){
                                    
                                                        $message3= $_POST["nombre"] . " " . "est égal à" . " " . $_POST["nombre2"] ;
                                                        
                                                    }  
                                                    
                                break;
                                

                                case "+" : $resultat = $x + $y;
                                break;

                                case "-" : $resultat = $x - $y;
                                break;

                                case "*" : $resultat = $x * $y;
                                break;

                                case "/" : if($y !=0){
                                    $resultat = $x / $y;
                                            }else{
                                                $message4= "La dision par zéro n'est pas autorisée";
                                                
                                            }
                                            
                                break;
                            }

                    }
                }

			?>
			<div class="container-fluid">
				<div class="container"> 
					<div class="row"> 
						<div class="col-lg-4 col-md-6 col-xs-12"> 
							<form method="post" action="test_chakib.php">
								<input  class="form-control" type="number" 
										name="nombre" 
										placeholder="Saisir un nombre" />
								<input  class="form-control" type="number" 
										name="nombre2" 
										placeholder="Saisir un nombre" />
								<input  class="btn btn-primary" type="submit" name="cal"
										value="Vérifier" />
                                <input class="btn btn-primary" type="submit" name="cal" value="+"/>
                                <input class="btn btn-primary" type="submit" name="cal" value="-"/>
                                <input class="btn btn-primary" type="submit" name="cal" value="*"/>
                                <input class="btn btn-primary" type="submit" name="cal" value="/"/>
							</form>
							
                            <?php 
                            

                                if($message){
                                    echo '<div class="alert alert-primary" role="alert">';
                                    echo $message . "<br/>";
                                    echo "</div>";
                                }
                                
                                if($message2){
                                    echo '<div class="alert alert-primary" role="alert">';
                                    echo $message2 . "<br/>";
                                    echo "</div>";
                                }
                                
                                
                                if($resultat <0){
                                        echo '<div class="alert alert-danger" role="alert">';
                                        echo $resultat . "<br/>";
                                        echo "</div>";
                                }

                                elseif($message4){
                                    echo '<div class="alert alert-danger" role="alert">';
                                    echo $message4 . "<br/>";
                                    echo "</div>";
                                }
                                
                                elseif($_POST && $_POST["cal"] != "Vérifier"){

                                    echo '<div class="alert alert-primary" role="alert">';
                                    echo $resultat . "<br/>";
                                    echo "</div>";
                                }

                                        
                                if($message3){
                                    echo '<div class="alert alert-primary" role="alert">';
                                    echo $message3 . "<br/>";
                                    echo "</div>";
                                }
                                
                                
                                
                                                                
                            ?>
							
						</div>
					</div>
				</div>
			</div>
		
		</body>
</html>