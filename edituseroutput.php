<?php
    error_reporting(E_ALL);
    ini_set("display_errors",1);
    include('connection.php');
    $firstname = $_REQUEST['fname'];
    $lastname = $_REQUEST['lname'];
    $username = $_REQUEST['uname'];
    $email = $_REQUEST['email'];
    $mobno = $_REQUEST['mobno'];
    $id = $_GET['id'];
    $sql2 = "update user set firstname='$firstname', lastname='$lastname', username='$username', email='$email', mobile_number='$mobno' where id='$id'";

    if($conn->query($sql2))
    {
        echo "Data updated successfully";
        header("Location: adminedit.php");
    }
    else
    {
        echo "error";
    }
?>