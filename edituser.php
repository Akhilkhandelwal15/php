<?php
    session_start();
    if (!isset($_SESSION['logged_in'])) {
        header('Location: login.php'); 
        exit();
    }
    include('connection.php');
    include('index.php');
    $id =  $_GET['id'];
    $sql = "select * from user where (id='$id')";

    if($conn->query($sql))
    {
        $result = $conn->query($sql);

        if($result->num_rows>0)
        {
            $row = $result->fetch_assoc();
            $firstname = $row['firstname'];
            $lastname = $row['lastname'];
            $username = $row['username'];
            $email = $row['email'];
            $mobno = $row['mobile_number'];
        }
    }
?>

<script>
   $(document).ready(function(){
        $("#formcontainer > h2:first").text("Edit User");
        $("#reguser").text("User");
        $("#regadmin:first").text("Admin");
        $(".pwdhide").hide();
        $("#fname").attr('value','<?php echo $firstname; ?>');
        $("#lname").attr('value','<?php echo $lastname; ?>');
        $("#uname").attr('value','<?php echo $username; ?>');
        $("#email").attr('value','<?php echo $email; ?>');
        $("#number").attr('value',<?php echo $mobno;?>);
        $("#submit").text("update");
        $(".formaction").attr('action', 'edituseroutput.php?id=<?php echo $id; ?>');
        $("#signinmsg").hide();
        $("#backButton").show();
        $("#backButton").click(function (){
            window.history.back();
        });
   });
</script>