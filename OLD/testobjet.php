<?php

include_once('Employe.php');
include_once('Service.php');
include_once('Utilisateur.php');

$employe1 = new Employe();
$employe1->setNoemp("1152");
$employe1->setNom("Pentier");
$employe1->setPrenom("Pierre");
$employe1->setEmploi("vendeur");
$employe1->setSup("1000");
$employe1->setEmbauche("1988-10-02");
$employe1->setComm("3500");
$employe1->setSal("30053");
$employe1->setNoserv("2");

var_dump($service1);

?>