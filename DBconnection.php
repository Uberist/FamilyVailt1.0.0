<?php
    class DBconnection{
        private $hostName = "127.0.0.1";
        private $userName = "root";
        private $password = "root";
        private $DbName = "familyarchive";
        private $connection;
        function __construct(){
            $this->connection = new mysqli($this ->hostName,$this ->userName,$this ->password,$this ->DbName);
            if ($this->connection->connect_error) {
                die("Connection failed: " . $this->connection->connect_error);
              }
        }
        public function getConnection()
        {
            return $this ->connection;
        }
    }
    $connection = new DBconnection();
?>