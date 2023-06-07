<?php
require_once("dbconfig.php");

class Database{
    private $db;
    private $dbstate;
    private $errMsg;

    public function __construct(){
        try{
            $this->db = new PDO("mysql:host=" . SERVER_NAME .";dbname=" . DBNAME, USERNAME, PASSWORD);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->db->exec("set names utf8");
            $this->dbstate = 1;
            $this->errMsg = "Connection established";
        }
        catch(PDOException $e){
            $this->errMsg = $e->getMessage();
            $this->dbstate = 0;
        }
    }

    public function getDbConnection(){
        return $this->db;
    }

    public function getState(){
        return $this->dbstate;
    }

    public function getErrorMsg(){
        return $this->errMsg;
    }

    public function __destruct(){
        $this->db = null;
    }
}
?>
