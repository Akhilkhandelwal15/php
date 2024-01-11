

<?php
   if (!isset($_SESSION['logged_in'])) {
    header('Location: login.php'); 
    exit();
}
  $id = $_GET['id'];
?>

<?php
    // error_reporting(E_ALL);
    // ini_set("display_errors",1);
    // $id = $_GET['id'];
    // echo $id;
    // include('connection.php');
    // $sql = "select * from user where (id='$id')";
    // $result = $conn->query($sql);
    // if($result->num_rows>0)
    // {
    //     $row = $result->fetch_assoc();
    //     $oldpasswordhash  = $row['password'];
    // }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Registration Form</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    label.error {
      color: red;
    }
    label.valid {
      color: green;
    }
  </style>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/additional-methods.min.js"></script>
  <!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<!-- jQuery Validation Plugin -->
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>

</head>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>  
<script src="https://requirejs.org/docs/release/2.3.5/minified/require.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>

<script>
  $(document).ready(function(){
    $("#passwordform").validate(
      {
        rules:{
          pswd:{required:true,
            minlength: 5,
            maxlength: 8,
          },
          newpswd:{
            required:true,
            minlength: 5,
            maxlength: 8,
          },
          cnfpswd:{
            required:true,
            minlength: 5,
            maxlength: 8,
            equalTo: "#newpwd",
          }
        },
        messages:{
          pswd:{
            required: 'This field is required',
            minlength: 'password must be between 5 to 8 characters',
            maxlength: 'password must be between 5 to 8 characters',
          },
          newpswd:{
            required: 'This field is required',
            minlength: 'password must be between 5 to 8 characters',
            maxlength: 'password must be between 5 to 8 characters',
          },
          cnfpswd:{
            required: 'This field is required',
            minlength: 'password must be between 5 to 8 characters',
            maxlength: 'password must be between 5 to 8 characters',
            equalTo: 'new password and confirmed password not matching',
          },
        }
      });

      // $("#submit").click(function(e){
      //     e.preventDefault();
      //     var checkpassword = $("#pwd").val();

      // });
  });
</script>


<body>
<div class="container mt-3" id='formcontainer'>
  <h2>Change Password</h2>
  <form class='formaction' action="changepasswordaction.php?id=<?php echo $id;?>" method="post" id="passwordform">
  <div class="mb-3 mt-3">
    <div class="mb-3 pwdhide">
      <label for="pwd">Old Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pswd">
      <div class="pwd text-danger"></div>
    </div>
    <div class="mb-3 pwdhide">
      <label for="newpwd">New Password:</label>
      <input type="password" class="form-control" id="newpwd" placeholder="Enter New password" name="newpswd">
      <div class="newpwd text-danger"></div>
    </div>
    <div class="mb-3 pwdhide">
      <label for="cnfpwd">Confirm Password:</label>
      <input type="password" class="form-control" id="cnfpwd" placeholder="Enter Confirmed password" name="cnfpswd">
      <div class="cnfpwd text-danger"></div>
    </div>
    <button type="submit" id = "submit" class="btn btn-primary" value="submit">Submit</button>
    <a href = "adminedit.php?id=<?php echo $id ?>" type="submit" id = "back" class="btn btn-primary" value="back">Back</a>

  </form>
</div>
</body>
</html>
<?php
  $msg=$_GET['message'];
  if($msg=='success')
  {
    echo "password updated successfully";
  }
  else if($msg=='fail')
  {
    echo "old password is incorrect";
  }
?>