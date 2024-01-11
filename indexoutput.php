<?php 

    include('connection.php');
    $firstname = $_REQUEST['fname'];
    $lastname = $_REQUEST["lname"];
    $username = $_REQUEST["uname"];
    $password = $_REQUEST["pswd"];
    $formtype = $_REQUEST["formtype"];
    $hash = password_hash($password, PASSWORD_DEFAULT);
    // echo $hash;
    $email = $_REQUEST["email"];
    $mobileno = $_REQUEST["mobno"];
    $selectuser = $_REQUEST["user"];
    $checksql = "select * from user where (username = '$username' or email='$email')";
    $result = $conn->query($checksql);

    // echo $formtype;
    // die();
    // var_dump($result);
    if($result->num_rows>0)
    {
        $row = $result->fetch_assoc();
        if($username==isset($row['username']))
        {
            // echo '<script>alert("Your message here");';
            echo "<script>alert('Username already Exists'); window.location.href = 'index.php';</script>";
        }
        if($email==isset($row['email']))
        {
            echo "<script>alert('Email already exists'); window.location.href = 'index.php';</script>";
        }
    }
    else
    {
        $sql = "insert into user (firstname, lastname, username, password, email, mobile_number, type) values('$firstname', '$lastname', '$username', '$hash', '$email', '$mobileno', '$selectuser')";

        if($conn->query($sql) === TRUE)
        {
            echo "Items inserted successfully";
            if($formtype=='registration')
            {
                header("Location: login.php");
            }
            else
            {
                header("Location: adminedit.php");
            }
            
        }
        else
        {
            echo "error";
        }
    }

?>

