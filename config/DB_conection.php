<?php
class DB_conection{
    public function __construct()
    {
        $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

        if($conn->connect_error){
            die ("<h1>Database connection failed</h1>");
        }
        //echo "<h1>Database connected</h1>";
        return $this->conn = $conn;

    }
}
    
?>