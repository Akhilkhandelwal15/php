<?php 
error_reporting(E_ALL);
ini_set("display_errors",1);
session_start();
if (!isset($_SESSION['logged_in'])) {
    header('Location: login.php'); 
    exit();
}
include('index.php');
$id = $_GET['id'];
echo $id;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student</title>
</head>
<body>
    <script>
        $(document).ready(function()
        {
            $("#formcontainer > h2:first").text("Add User");
            $(".hidetype").hide();
            // $(".formaction").attr('action', 'adduseroutput.php');
            $("#formtype").attr('value', 'adduser');
            $("#signinmsg").hide();
            $("#backButton").show();
            $("#backButton").click(function (){
                window.history.back();
            });
        });
    </script>
</body>
</html>


