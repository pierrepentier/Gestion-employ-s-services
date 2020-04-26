<?php

    Interface InterfaceEmployeDataAccess{

        public function connexion();

        public function deconnexion($db); 

        public function add($emp);

        public function modify($emp);

        public function afficherFormModif($tab);

        public function delete($emp);

        public function selectAll();

        public function recherche($service, $nom, $prenom, $requete1, $requete2);
        
    }
    
?>