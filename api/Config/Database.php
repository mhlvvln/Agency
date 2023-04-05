<?php

class Database
{
    private $host = "127.0.0.1";
    
    private $db_name = "Agency";
    
    private $username = "postgres";

    private $password = "0000";

    public $conn;

    public function getConnection()
    {
        $this->conn = null;

        try{
            $this->conn = new PDO("pgsql:host=" . $this->host . ";port=8027;dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            
        } catch(PDOException $exception){
            print_r($exception->getMessage());
            //return $exception->getMessage();
            
        }

        return $this->conn;
    }
}

?>