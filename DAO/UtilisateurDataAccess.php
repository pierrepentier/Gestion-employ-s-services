<?php

include_once('../INTERFACE/InterfaceUtilisateurDataAccess.php');

class UtilisateurDataAccess implements InterfaceUtilisateurDataAccess{
    public function connexion(){
        $db= new mysqli('localhost','root','','gestion');
        return $db;    
    }

    public function deconnexion($db){
        $db -> close();
    }

    public function add_user($user){
        $db=$this->connexion();    
        $id_user=$user->getId();
        $nom=$user->getNom();
        $mdp=$user->getMdp();
        $stmt = $db -> prepare("INSERT INTO utilisateur(id_utilisateur, nom_utilisateur , mdp, role ) VALUES(?, ?, ?, 'client')");
        $stmt -> bind_param("iss", $id_user, $nom, $mdp);
        $stmt -> execute();
        $this->deconnexion($db);
    }

    function authentification($user){
        $db=$this->connexion();
        $nom=$user->getNom();
        $stmt = $db -> prepare("SELECT * FROM utilisateur WHERE nom_utilisateur= ?");
        $stmt -> bind_param("s", $nom);
        $stmt -> execute();
        $rs = $stmt -> get_result();
        $data= $rs -> fetch_all(MYSQLI_ASSOC);
        $rs -> free();
        $this->deconnexion($db);
        return($data);       
    }
}

?>