<?php

class LoginController{
    public function __construct()
    {
        $db = new DB_conection;
        $this->conn = $db->conn;
        
    }

    public function userLogin($email, $password){
        $checkLogin = "SELECT * FROM users WHERE email = '$email' AND password = '$password' LIMIT 1";
        $result = $this->conn->query($checkLogin);
        if($result->num_rows > 0){
            $data = $result->fetch_assoc();
            $this->userAuth($data);
            return true;
        }else{
            return false;
        }
    }

    private function userAuth($data){
        $_SESSION['authenticated'] = true;
       // $_SESSION['auth_role'] = $data['role_as'];
       $_SESSION['auth_user'] = [
           'user_id' => $data['id'],
           'user_fname' => $data['fname'],
           'user_lname' => $data['lname'],
           'user_email' => $data['email']
       ];
    }

    public function isLoggedIn(){
        if(isset($_SESSION['authenticated']) === TRUE){
            echo "You already Logged in";
            redirect('You already Logged in', 'index.php');
        }
        else{
            return false;
        }
    }
}

?>