<?php
if(!define('DB_SERVER')) { define("DB_SERVER","localhost");}
if(!define('DB_USER')){define("DB_USER","root");}
if(!define("DB_PASS")){define("DB_PASS","");}
if(!define("DB_NAME")){define("DB_NAME","itproject");}

class MySQLDatabase{
    
    private $connection;
    
    function __construct()
    {
        $this->open_connection();
    }
    // Establish connection with Database
    public function open_connection(){
        $this->connection = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
        if(mysqli_connect_errno()){
            die("Database connection failed");
        }
    }
    
    // Execute query
    public function query($sql){
        $result = mysqli_query($this->connection,$sql);
        
        return $result; 
}
    public function mysql_prep($string){
        $escaped_string = mysqli_real_escape_string($this->$connection,$string);
        return $escaped_string;
    }
}
    $database = new MySQLDatabase();
?>