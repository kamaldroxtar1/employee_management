<?php
class connection{
    private $host="localhost";
    private $dbname="add_emp";
    private $uname="root";
    private $pass="";
    public $conn;
    function __construct()
    {
         $this->conn=new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->uname,$this->pass );
        $this->conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    
    }
    function get()
    {
        return $this->conn;
    }
}

?>