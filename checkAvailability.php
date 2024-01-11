<?php
error_reporting(E_ALL);
ini_set("display_errors",1);
    include('connection.php');
    // print_r($_POST);
    if ($_POST['type'] == 'username') {
        $username = $_POST['uname'];
        $sql = "SELECT * FROM user WHERE username='$username'";
    } 
    elseif ($_POST['type'] == 'email') {
        $email = $_POST['email'];
        $sql = "SELECT * FROM user WHERE email='$email'";
    }
    
    $result = $conn->query($sql);
    
    
    // echo $result->num_rows ? 'Email already exist':''; die;
    $conn->close();
    if ($result->num_rows > 0) {
        echo 'false';   
    } else {
        
        echo 'true';
    }
    
    // echo "Hello";
?>