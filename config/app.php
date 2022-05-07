<?php
session_start();

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'adminpanel');

define('SITE_UTL', 'http://localhost/interview_php/login-oop/');

include 'DB_conection.php';
$db = new DB_conection;


function base_url($slug){
    echo SITE_UTL.$slug;
}

function redirect($message, $page){
    $redirectTo = SITE_UTL.$page;
    $_SESSION['message'] = "$message";
    header("Location: $redirectTo");
    exit(0);
}

function validateInput($dbcon, $input){
    return mysqli_real_escape_string($dbcon, $input);

}
?>