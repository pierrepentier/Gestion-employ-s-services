<?php

    include_once('../INTERFACE/InterfaceEmployeDataAccess.php');
    include_once('../ABSTRACT/AbstractTest.php');

    class EmployeDataAccess extends Test implements InterfaceEmployeDataAccess{

        public function connexion(){
            $db = new mysqli('localhost','root','','gestion');
            return $db;    
        }

        public function deconnexion($db){
            $db -> close();
        }
               
        public function add($emp){
            $db=$this->connexion();
            $noemp=$emp->getNoemp();
            $nom=$emp->getNom();
            $prenom=$emp->getPrenom();
            $emploi=$emp->getEmploi();
            empty($emp->getSup()) ? $sup= 'NULL' : $sup = $emp->getSup();
            $embauche=$emp->getEmbauche();
            $sal=$emp->getSal();
            empty($emp->getComm()) ? $comm = 'NULL' : $comm = $emp->getComm();
            $noserv=$emp->getNoserv();
            $stmt=$db -> prepare("INSERT INTO employés(noemp, nom, prenom, emploi, sup, embauche, sal, comm, noserv) VALUES (?,?,?,?,?,?,?,?,?)");
            $stmt -> bind_param("isssisiii", $noemp, $nom, $prenom, $emploi, $sup, $embauche, $sal, $comm, $noserv);
            $stmt -> execute();
            $this->deconnexion($db);
        }

        public function modify($emp){
            $db=$this->connexion();    
            $noemp=$emp->getNoemp();
            $nom=$emp->getNom();
            $prenom=$emp->getPrenom();
            $emploi=$emp->getEmploi();
            empty($emp->getSup()) ? $sup= NULL : $sup=$emp->getSup();
            $embauche=$emp->getEmbauche();
            $sal=$emp->getSal();
            empty($emp->getComm()) ? $comm= NULL : $comm=$emp->getComm();
            $noserv=$emp->getNoserv();
            $stmt=$db -> prepare("UPDATE employés SET noemp=?, nom=?, prenom=?, emploi=?, sup=?, embauche=?, sal=?, comm=?, noserv=? where noemp =?");
            $stmt -> bind_param("isssisiiii", $noemp, $nom, $prenom, $emploi, $sup, $embauche, $sal, $comm, $noserv, $noemp);
            $stmt -> execute();
            $this->deconnexion($db);
        }

        public function afficherFormModif($tab){
            $db=$this->connexion();
            $stmt=$db -> prepare("SELECT * FROM employés WHERE noemp=?");
            $stmt -> bind_param("i", $tab["modif"]);
            $stmt -> execute();
            $rs = $stmt -> get_result();
            $data = $rs -> fetch_all(MYSQLI_ASSOC);
            $rs -> free();
            $this->deconnexion($db);
            return $data;
        }

        public function delete($emp){
            $db=$this->connexion();    
            $noemp=$emp->getNoemp();
            $stmt= $db ->prepare("DELETE FROM employés WHERE noemp=?");
            $stmt -> bind_param("i", $noemp);
            $stmt -> execute();
            $this->deconnexion($db);                    
        }

        public function selectAll(){
            $db=$this->connexion();  

            $stmt=$db -> prepare('SELECT * FROM employés');
            $stmt -> execute();
            $rs = $stmt -> get_result();
            $data = $rs -> fetch_all(MYSQLI_ASSOC);
            $rs -> free();
            $this->deconnexion($db);
            return $data;
        }

        public function recherche($service, $nom, $prenom, $requete1, $requete2){
            $db=$this->connexion();            
            $stmt = $db -> prepare("SELECT A.* FROM employés as A INNER JOIN service as B on A.noserv=B.noserv WHERE B.service LIKE ? AND A.nom LIKE ? AND A.prenom LIKE ?$requete1$requete2");
            $stmt -> bind_param("sss", $service, $nom, $prenom);
            $stmt -> execute();  
            $rs = $stmt -> get_result();          
            $data= $rs -> fetch_all(MYSQLI_ASSOC);
            $rs -> free();
            $this->deconnexion($db);  
            return $data;
        }
        
    }
    
?>