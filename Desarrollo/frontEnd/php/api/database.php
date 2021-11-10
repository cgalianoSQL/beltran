<?php

class DB{
    private $host;
    private $db;
    private $user;
    private $password;
    private $port;

    public function __construct(){
        $this->host     = 'localhost';
        $this->port     = 5432;
        $this->db       = 'beltran';
        $this->user     = 'dba_php';
        $this->password = "dba";
    }

    function connect(){
    
        try{

            
            $connection = "pgsql:host=".$this->host.";dbname=" . $this->db . ";port=" . $this->port;
    
            $options = [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ];
            //$pdo = new PDO($connection, $this->user, $this->password, $options);
            $pdo = new PDO($connection,$this->user,$this->password);
        
            return $pdo;


        }catch(PDOException $e){
            print_r('Error connection: ' . $e->getMessage());
        }   
    }
}






?>