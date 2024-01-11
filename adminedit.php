


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Admin Pannel</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  
</head>
<body>
<script>
    $(document).ready(function()
    {
        $(".anchor").click(function(){
            href = $("#deleteButton").attr("href", "deleteuser.php?id=" + $(this).val());
        });
    });
</script>
<?php
    session_start();
    if (!isset($_SESSION['logged_in'])) {
        header('Location: login.php'); 
        exit();
    }
    $typeofuser = $_SESSION['typeofuser'];
    include('connection.php');
    $sql = "select id, firstname, lastname, username, email, mobile_number, type from user";
    $result = $conn->query($sql);
    $id = $_GET['id'];
    if($result->num_rows>0)
    {        
        echo "<div class='container'>";
        echo "<div class='text-center'>";
        echo "<h2 class='text-info col-md-10'> This is ". $typeofuser ." Dashboard</h2>";
        echo "</div>";
        echo "<div class='text-center col-md-2'>";
        echo "<a href='adduser.php?id=$id' id='addUserButton' type='button' class='btn btn-primary'>Add User</a>";
        echo "<a href='logout.php' type='button' class='btn btn-primary'>Logout</a>";
        echo "<a href='changePassword.php?id=$id' type='button' class='btn btn-primary'>Change Password</a>";
        echo "</div>";
        echo "<table class='table table-hover'>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Mobile Number</th>
                    <th>User Type</th>
                    <th>Edit Details</th>
                    <th>Delete User</th>
                </tr>";
        while($row = $result->fetch_assoc()) 
        {
            $username = $row['username'];

            echo "<tr>
                    <td>".$row["id"]."</a></td>
                    <td>".$row["firstname"]." ".$row["lastname"]."</td>
                    <td>".$row["username"]."</td>
                    <td>".$row["email"]."</td>
                    <td>".$row["mobile_number"]."</td>
                    <td>".$row["type"]."</td>
                    <td>
                        <a href=edituser.php?id=" .$row['id']." class='btn btn-success'>Edit</a>
                    </td>
                    <td>
                   
                    <button class='btn btn-danger anchor' data-toggle='modal' data-target='#myModal' value =".$row['id'].">Delete</button>
                    </td>
                </tr>";

                echo "</div>";

                echo "<div class='modal fade' id='myModal' role='dialog'>
            <div class='modal-dialog'>
                <div class='modal-content'>
                    <div class='modal-header text-center'>
                        <button type='button' class='close' data-dismiss='modal'>&times;</button>
                        <h2 class='modal-title'>Delete Account</h2>
                    </div>
                    <div class='modal-body text-center'>
                        <p>Are you sure you want to delete $username ?</p>
                        <div class='btn-group btn-group-justified'>
                            <a type='button' href='#' class='btn btn-primary' data-dismiss='modal'>Cancel</a>
                            <a class='btn btn-danger' id='deleteButton'>Delete</a>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        ";
        }
        echo "</table>";
    
    }

    
    
    // session_unset();
    // session_destroy();
    // <a href=deleteuser.php?id=" .$row['id']." class='btn btn-danger' data-toggle='modal' data-target='#myModal'>Delete</a>
?>