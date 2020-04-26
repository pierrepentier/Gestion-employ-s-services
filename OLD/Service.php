<?php

    class Service {
        private $noserv;
        private $nom;
        private $ville;

        /**
         * Get the value of noserv
         */ 
        public function getNoserv()
        {
                return $this->noserv;
        }

        /**
         * Set the value of noserv
         *
         * @return  self
         */ 
        public function setNoserv($noserv)
        {
                $this->noserv = $noserv;

                return $this;
        }

        /**
         * Get the value of service
         */ 
        public function getNom()
        {
                return $this->nom;
        }

        /**
         * Set the value of service
         *
         * @return  self
         */ 
        public function setNom($nom)
        {
                $this->nom = $nom;

                return $this;
        }

        /**
         * Get the value of ville
         */ 
        public function getVille()
        {
                return $this->ville;
        }

        /**
         * Set the value of ville
         *
         * @return  self
         */ 
        public function setVille($ville)
        {
                $this->ville = $ville;

                return $this;
        }
    }

?>