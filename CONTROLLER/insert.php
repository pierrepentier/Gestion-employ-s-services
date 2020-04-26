<?php 

$db=mysqli_init();
mysqli_real_connect($db,'localhost','root','','gestion');
$id_utilisateur="888";
$nom_utilisateur="Pierre3";
$password=password_hash("azerty", PASSWORD_DEFAULT);
$role="client";
$rs=mysqli_query($db, "INSERT INTO utilisateur(id_utilisateur, nom_utilisateur, mdp, role) VALUES ('$id_utilisateur', '$nom_utilisateur', '$password', '$role')");

MYSQLI_CLOSE($db);

?>