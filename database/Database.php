<?php
namespace Database;
include __DIR__ .'/../config.php';

class Controller {
    private $servername = "";
    private $username = "";
    private $password = "";
    private $dbname = "";       

    public function __construct() {
        $config = new \Config();
        $this->servername =  $config->SQL_SERVER_NAME;
        $this->username = $config->SQL_SERVER_USERNAME;
        $this->password = $config->SQL_SERVER_PASSWORD;
        $this->dbname = $config->DB_NAME;    
    }

    public function Run($sql){
        // Create connection
        $conn = new \mysqli($this->servername, $this->username, $this->password, $this->dbname);
        mysqli_query($conn, "SET NAMES 'utf8'");
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 
    
        $results = Array();
        $res = $conn->query($sql);
        if ($res->num_rows > 0) {
            while($row = $res->fetch_assoc()) {
                array_push($results,$row);
            }
        }
        $conn->close();
        return $results;
    }

    public function ParseWord($word){
        return preg_replace('/[^a-zA-Z0-9]/', '',$word);
    }
}
?>