<?php

//include 'config/app.php';

class RegisterController{

    public function __construct()
    {
        $db = new DB_conection;
        $this->conn = $db->conn;
    }

    public function registration($fname, $lname, $email, $password){
        $query = "INSERT INTO users (fname, lname, email, password) VALUES ('$fname', '$lname', '$email', '$password')";
        $result = $this->conn->query($query);
        return $result;
    }

    public function confirmPassword($password, $conformPassword){
        if($password == $conformPassword){
            return true;
        }else{
            return false;
        }
    }

    public function IsUserExists($email){
        $checkUser = "SELECT email FROM users WHERE email = '$email' LIMIT 1";
        $result = $this->conn->query($checkUser);
        if($result->num_rows > 0){
            return true;
        }else{
            return false;
        }
    }

}

?>