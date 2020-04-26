<?php

include_once('../INTERFACE/InterfaceServices_utilisateur.php');

class ServiceUtilisateur implements InterfaceServiceUtilisateur{
    function verifyUser($tab){
        $utilisateurDataAccess = new UtilisateurDataAccess();
        $utilisateur = new Utilisateur();
        $utilisateur->setNom($tab["username"]);
        $data = $utilisateurDataAccess->authentification($utilisateur);
        return $data;
    }
    

}

?>