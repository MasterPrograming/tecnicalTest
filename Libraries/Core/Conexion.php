<?php 
    
    class Conexion{
        private $conect;

        public function __construct()
        {
            $connectionString = "mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=UTF8";
            try {
                $this->conect = new PDO($connectionString, DB_USER, DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
                $this->conect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);                
            } catch (Exception $ex) {
                $this->conect = json_encode(array("error" => true, "errorMessage" =>  $ex->getMessage())); 
            }
        }
        
        public function conect()
        {
            return $this->conect;
        }
    }
?>