<?php 
error_reporting(E_ALL);
ini_set("display_errors",1);
  // session_start();
  // $fname = $_SESSION["regfname"];
  // $lname = $_SESSION["reglname"];
  // $uname = $_SESSION["reguname"];
  // $password = $_SESSION["regpswd"];
  // $confirmpassword = $_SESSION["regcnfpwd"];
  // $email = $_SESSION["regemail"];
  // $mobileno = $_SESSION["regmobno"];

//   if (isset($_SESSION['regfname']) && $_SESSION['regfname'] == $fname) {
//     // Unset all session variables
//     session_unset();

//     // Destroy the session
//     session_destroy();

//     // Redirect to another page or display a message
//     header('Location: index.php');
//     exit();
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

<!-- <script>
  $(document).ready(function()
  {
    $("#form1").submit(function(e)
    {
      e.preventDefault();
      var firstname = $("#fname").val();
      var lastname = $("#lname").val();
      var username = $("#uname").val();
      var password = $("#pwd").val();
      var confirmpassword = $("#cnfpwd").val();
      var email = $("#email").val();
      var number = $("#number").val();
      var isValid = 1;
      console.log(firstname);
      $(".error").remove();
      // console.log(2);
      if(firstname.length<1)
      {
        // $("#fname").after('<span class="error"> This field is mandatory </span>');
        isValid = 0;
        $(".fname").text("This field is mandatory");
      }
      else
      {
        $(".fname").remove();
      }
      if(lastname.length<1)
      {
        isValid = 0;
        $(".lname").text("This field is mandatory");
      }
      else
      {
        $(".lname").remove();
      }
      if(username.length<1)
      {
        isValid = 0;
        $(".uname").text("This field is mandatory");
      }
      else if(username.length<5 || username.length>10)
      {
        isValid = 0;
        $(".uname").text("Username must be between 5 to 10 charecters");
      }
      else
      {
        $(".uname").remove();
      }
      // console.log(2);
      if(password.length<5 || password.length>8)
      {
        isValid = 0;
        $(".pwd").text("Password must be between 5 to 10 charecters");
      }
      else
      {
        $(".pwd").remove();
      }
      if(password != confirmpassword)
      {
        isValid = 0;
        $(".cnfpwd").text("password not matched");
      }
      else
      {
        $(".cnfpwd").remove();
      }
      if(email.length<1)
      {
        isValid = 0;
        $(".email").text("This field is mandatory");
      }
      else 
      {  
        var regEx = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;  
        var validEmail = regEx.test(email);  
        if (!validEmail) 
        {  
          isValid = 0;
          $(".email").text("Enter a valid email");
        } 
        else
      {
        $(".email").remove();
      }
      }
      if(number.length<1)
      {
        isValid = 0;
        $(".number").text("This field is mandatory");
      } 
      else
      {
        $(".number").remove();
      }
      if (isValid==1) 
      {
        this.submit();
      }
      else
      {
        console.log("Form validation failed");
      }
           
    });
  });
</script> -->

<script>
  $(document).ready(function()
  {
      $("#submit").click(function()
      {
        console.log("Working");
      });
      $("#backButton").hide();
    // $("#uname").on('input', function(){
    //   var username = $(this).val();
    //   if(username!== "")
    //   {
    //     checkAvailability('uname', username, '#usernameAvailability')
    //   }
    // });
    // $("#email").on('input', function(){
    //   var emailid = $(this).val();
    //   if(emailid!== "")
    //   {
    //     checkAvailability('email', emailid, '#emailAvailability')
    //   }
    // });
    $('form[id="form1"]').validate(
      {
        rules:
        {
          fname:{required: true},
          lname:{required:true},
          uname:{
            required:true,
            minlength: 5,
            maxlength: 8,
            remote:{
              url:'checkAvailability.php',
              method:'POST',
              data:{
                type:'username' 
              }
            }
          },
          pswd:{
            required:true,
            minlength: 5,
            maxlength: 8,
          },
          cnfpswd:{
            required: true,
            equalTo : "#pwd",
	        },
          email:{
            required: true,
            email: true,
            remote:{
              url:'checkAvailability.php',
              method:'POST',
              data:{
                type:'email'
              }
            }
          },
          mobno:{
            required:true,
            number: true,
            minlength: 10,
            maxlength: 10,
          }
        },
        messages:
        {
          fname:'This field is required',
          lname:'This field is required',
          uname:{
            required: 'This field is required',
            minlength: 'length must be between 5 to 8 characters',
            maxlength: 'length must be between 5 to 8 characters',
            remote: 'Username already exists',
          },
          pswd:{
            required: 'This field is required',
            minlength: 'length must be between 5 to 8 characters',
            maxlength: 'length must be between 5 to 8 characters',
          },
          cnfpswd:{
			   		required : 'Confirm Password is required',
			   		equalTo : 'Password not matching',
			   	},
          email:{
            required: 'This field is required',
            minlength: 'Enter a valid email',
            remote: 'Email already exists',
          },
          mobno:{
            required: "This field is required",
            number: "Please enter a valid numeric mobile number",
            minlength: "Mobile number must be 10 digits",
            maxlength: "Mobile number must be 10 digits",
          }
        },
        errorClass: "error",
        validClass: "valid",
        submitHandler: function(form) {  
          form.submit();  
        }  
        
      });
  });

  // function checkAvailability(type, value, resultContainerId)
  // {
  //   $.ajax(
  //     {
  //       type:'POST',
  //       url:'checkAvailability.php',
  //       data:{
  //         type: type,
  //         value: value
  //       },
  //       success:function(response){
  //         $(resultContainerId).html(response);
  //       }
  //     });
  // }
</script>


<body>
<div class="container mt-3" id='formcontainer'>
  <h2>Registration Form</h2>
  <form class='formaction' action="indexoutput.php" method="post" id="form1">
  <div class="mb-3 mt-3">
      <div class="form-check hidetype">
        <input class="form-check-input" type="radio" name="user" id="student" value="student" checked>
        <label class="form-check-label" id='reguser' for="flexRadioDefault1">
          Register User
        </label>
      </div>
      <div class="form-check hidetype">
        <input class="form-check-input" type="radio" name="user" id="admin" value="admin">
        <label class="form-check-label" id='regadmin' for="flexRadioDefault2">
          Register Admin
        </label>
      </div>
    </div>
    <div class="mb-3 mt-3">
      <label for="fname">First Name:</label>
      <input type="text" class="form-control" id="fname" placeholder="Enter First name" name="fname">
      <div class="fname text-danger"></div>
    </div>
    <div class="mb-3 mt-3">
      <label for="lname">Last Name:</label>
      <input type="text" class="form-control" id="lname" placeholder="Enter Last name" name="lname">
      <div class="lname text-danger"></div>
    </div>
    <div class="mb-3 mt-3">
      <label for="username">Username:</label>
      <input type="text" class="form-control" id="uname" placeholder="Enter User name" name="uname">
      <span id="usernameAvailability"></span>
      <div class="uname text-danger"></div>
    </div>
    <div class="mb-3 pwdhide">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pswd">
      <div class="pwd text-danger"></div>
    </div>
    <div class="mb-3 pwdhide">
      <label for="cnfpwd">Confirm Password:</label>
      <input type="password" class="form-control" id="cnfpwd" placeholder="Enter Confirmed password" name="cnfpswd">
      <div class="cnfpwd text-danger"></div>
    </div>
    <div class="mb-3 mt-3">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
      <span id="emailAvailability"></span>
      <div class="email text-danger"></div>
    </div>
    <div class="mb-3">
      <label for="num">Mobile Number:</label>
      <input type="number" class="form-control" id="number" placeholder="Enter Mobile number" name="mobno"  pattern="[1-9]{1}[0-9]{9}">
      <div class="number text-danger"></div>
    </div>
    <input id="formtype" type="hidden" name="formtype", value="registration">
      <button class='btn btn-primary' id='backButton'>Back</button>
        <button type="submit" id = "submit" class="btn btn-primary" value="submit">Submit</button>
    
    <div class="text-center">
    <div id='signinmsg'>
    <p>already a member? <a href="login.php">Sign in</a></p>
    </div>
  </div>
  </form>
</div>

</body>
</html>