<?php

interface InterfaceUtilisateurDataAccess{
    
    public function connexion();

    public function deconnexion($db);

    public function add_user($user);

    function authentification($user);
}

?>