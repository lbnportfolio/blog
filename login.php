<?php
session_start();
require 'db_conn.php';
require 'error.php';

/**
 * Gathers login info from the user's input and makes sure inputs aren't empty.
 * Verifies that password and username matches the input, and otherwise handles the errors.
 */
function userLogin(){
    $username = filter_input(INPUT_POST, 'user', FILTER_SANITIZE_SPECIAL_CHARS);
    $password = $_POST['pass'];
    if(strlen($username) > 0 && strlen($password) > 0) {

    
    $conn = dbconn();


    $sql = "SELECT hashed_password FROM users WHERE username = '$username'";


    foreach($conn->query($sql) as $row){
       $dbHash = $row['hashed_password'];
    }
    if(isset($dbHash)) {
        if(password_verify($password, $dbHash)) {
        session_regenerate_id(true);
        $_SESSION['username'] = $username;
        header('Location: index.php');
        echo "login success";
    }else {
        echo "fail";
    }
    }else {
    $return = "index.php?page=login";
        error($return);
        
    }
    
    
}
else {
    $return = "index.php?page=login";
        error($return);
}
}
userLogin();
 ?>
