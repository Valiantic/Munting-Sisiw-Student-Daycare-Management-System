<?php 
session_start();
if (isset($_SESSION['admin_id']) && 
    isset($_SESSION['role']) &&
    // NOTE: THE WEBPAGE WILL NOT REDIRECT IF THIS PARAMETERS 
    // IS NOT THE SAME WITH THE ANCHOR TAG BUTTON ON THE PREV PAGE
    isset($_GET['r_user_id'])) {

    if ($_SESSION['role'] == 'Admin') {

        include "../connections.php";
   
        include "data/registrar_office.php";
   
    
        $r_users =  getAllR_users($conn);

        // NOTE: FETCH ALL DATA FROM THE DATABASE THIS IS WHEN THE ERROR DISPLAY 
        // C:\xampp\htdocs\Munting_sisiw_daycare\admin\grade-edit.php on line 202
        // " name="grade_code
        $r_user_id = $_GET['r_user_id'];
        $r_users  = getR_usersById($r_user_id, $conn);

       
        // LOGICAL ERROR: CAUSING REDIRECTION TO teachers.php
        if ($r_users == 0){
            header("Location: registrar-office.php");
	        exit;
        }
     

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Edit Registrar Office Users</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="shortcut icon" href="../images/logo.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">

    <!-- JQUERY LINK -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
 

    <!-- FONT AWESOME LINK -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>


<!-- OWN CSS IS HERE! -->

<style>
    body{
        margin: 0;
        padding: 0;
        /* background-image: url(../images/bg2.jpg); */
        background-position: center center; 
         background-repeat: no-repeat; 
        background-size: cover;
        background-attachment: fixed; 
        /* REMEMBER THIS FOR BACKGROUND IMAGE TO BE FULL SIZE AND RESPONSIVE! */
        width: 100%; 
        height: auto; 
    }
    .black-fill {
        /* FOR BLACK AESTHETIC BACKGROUND ADJUST THE LAST DIGIT FOR BRIGHTNESS*/
        background: rgba(0, 0, 0, 0.4);
        min-height: 100vh;
    }
    #homeNav {
        /* TO MAKE THE NAVBAR TRANSPARENT */
         /* background: rgba(255,255,255, 0.5) !important;  */
         border-radius:20px;
    }
    .welcome-text{
      min-height: 80vh;
    }
    .welcome-text img {
      width: 100px;
    }
    .welcome-text h4 {
      color: #eee;
      font-size: 51px;
      font-family: "Lobster", sans-serif;
    }
    .welcome-text p {
      color: goldenrod;
      /* TRANSPARENCY */
      /* background: rgba(255,255,255,  0.5); */
      background: lightblue;
      padding: 5px;
      border-radius: 4px;
    }
    #about {
      min-height: 100vh;
    }
    #about .card-1{
      max-width: 600px;
      width:90%;
      /* MAKE THE BACKGROUND TRANSPARENT */
      /* background: rgba(255,255,255, 0.7); */
      background: white;
	    padding: 20px;
	    border-radius: 20px;
    }
    #about .card-1 h5{
      font-family: "Lobster", sans-serif;
      font-size: 25px;
     
    }
    #contacts {
      min-height: 100vh;

    }
    #contacts form {
      max-width: 600px;
      width: 90%;
      /* TRANSPARENCY */
      /* background: rgba(255,255,255, 0.7); */ 
      background: white;
      padding: 20px;
      border-radius: 20px;
    }
    #contacts form h3{
      text-align:center;
      font-family: "Lobster", sans-serif;
    }
    textarea{
      resize:none;
    }
    .w-450{
        width:450px;
        border-radius:20px;
    }
    .n-table{
        max-width: 800px;
    }
    .login {
	max-width: 500px;
	width: 90%;
	background: rgba(255,255,255, 0.7);
	padding: 10px;
	border-radius: 10px;
    }
    .login h3{
	text-align: center;
	font-size: 50px;
    }
    .form-w{
        max-width:600px;
        width: 100%;
    }
    a{
      margin-bottom: 15px; 
    }
    #backbtn{
     
      margin-top: 20px;
      margin-left: 6.4%;
    }


</style>

<body>
    <?php 
        include "inc/navbar.php";
     ?>
     <div class="container mt-5">
        <!-- continue 52:17 -->
    

                                                <!-- ADD ACTION TO REDIRECT TO TEACHER EDIT IN REQ FOLDER -->
<form class="shadow p-3 mt-4 form-w" method="post" action="req/registrar-office-edit.php">


   <hr><h3>Edit facutly user</h3></hr>

     <!-- ERROR HANDLING   -->
     <?php if (isset($_GET['error'])) { ?>
    		<div class="alert alert-danger" role="alert">
			  <?=$_GET['error']?>
			</div>
	<?php } ?>

    <!-- SUCCESS HANDLING   -->
    <?php if (isset($_GET['success'])) { ?>
    		<div class="alert alert-success" role="alert">
			  <?=$_GET['success']?>
			</div>
	<?php } ?>
    
    <div class="mb-3">
    <label class="form-label">First name</label>
    <input type="text" class="form-control" value="<?=$r_users['fname']?>" name="fname">
  </div>

  <div class="mb-3">
    <label class="form-label">Last name</label>
    <input type="text" class="form-control" value="<?=$r_users['lname']?>" name="lname">
  </div>

  <div class="mb-3">
    <label class="form-label">Username</label>
    <input type="text" class="form-control" value="<?=$r_users['username']?>" name="username">
  </div>

  
    <!-- continue 9:23 -->

  <!-- TO ADD NEW COLUMNS -->
  <div class="mb-3">
    <label class="form-label">Address</label>
    <input type="text" class="form-control" value="<?=$r_users['address']?>" name="address">
  </div>

  <div class="mb-3">
    <label class="form-label">Employee number</label>
    <input type="text" class="form-control mb-3" value="<?=$r_users['employee_number']?>" name="employee_number" id="empInput">

    <!-- GENERATE EMPLOYEE NUMBER -->
    <button class="btn btn-secondary" id="eBtn">Generate Employee Number</button>

  </div>

  <div class="mb-3">
    <label class="form-label">Phone number</label>
    <input type="text" class="form-control" value="<?=$r_users['phone_number']?>" name="phone_number">
  </div>

  <div class="mb-3">
    <label class="form-label">Qualification</label>
    <input type="text" class="form-control" value="<?=$r_users['qualification']?>" name="qualification">
  </div>

  <div class="mb-3">
    <label class="form-label">Email address</label>
    <input type="text" class="form-control" value="<?=$r_users['email_address']?>" name="email_address">
  </div>

  
  <div class="mb-3">
          <label class="form-label">Gender</label><br>
          <input type="radio"
                 value="Male"
                 <?php if($r_users['gender'] == 'Male') echo 'checked';  ?> 
                 name="gender"> Male
                 &nbsp;&nbsp;&nbsp;&nbsp;
          <input type="radio"
                 value="Female"
                 <?php if($r_users['gender'] == 'Female') echo 'checked';  ?> 
                 name="gender"> Female
        </div>

  <div class="mb-3">
    <label class="form-label">Date of birth</label>
    <input type="date" class="form-control" value="<?=$r_users['date_of_birth']?>" name="date_of_birth">
  </div>



  <!-- INDICATION FOR REGISTRAR ID INPUT HIDDEN -->
  <!-- NOTE ALWAYS DON'T FORGET TO INCLUDE THIS AND PASS 
  IT TO REQ IN ORDER TO UPDATE THE RECORD -->
  <input type="text" value="<?=$r_users['r_user_id']?>"
         name="r_user_id"
         hidden>


    <button type="submit" 
            class="btn btn-primary">
            Update</button>


      
        

</form>

  <!-- CHANGE PASSWORD SECTION -->
  <form class="shadow p-3 my-5 form-w" method="post" action="req/registrar-office-change.php" id="change_password">


<!-- COPY THIS CODE FROM ABOVE -->
<hr><h3>Change Password</h3></hr>

<!-- ERROR HANDLING   -->
<?php if (isset($_GET['perror'])) { ?>
       <div class="alert alert-danger" role="alert">
         <?=$_GET['perror']?>
       </div>
<?php } ?>

<!-- continue 38:22 -->

<!-- SUCCESS HANDLING   -->
<?php if (isset($_GET['psuccess'])) { ?>
       <div class="alert alert-success" role="alert">
         <?=$_GET['psuccess']?>
       </div>
<?php } ?>

<!-- PASSWORD DIV -->
<div class="mb-3"> 
    <div class="mb-3">
        <label class="form-label">Admin Password</label>
          
        <input type="password" class="form-control" name="admin_pass">
      

    </div>  

    <label class="form-label">New Password</label>
    <div class="input-group mb-3">
    <input type="text" class="form-control" name="new_pass" id="passInput">
    <button class="btn btn-secondary" id="gBtn">Random Password</button>
    </div>

</div>  

<!-- continue 42:43 -->

 <!-- INDICATION FOR TEACHER ID -->
 <input type="text" value="<?=$r_users['r_user_id']?>"
         name="r_user_id"
         hidden>

<!-- CONFIRMATION CHANGE PASSWORD DIV -->
<div class="mb-3">
    <label class="form-label">Confirm new Password</label>
      
    <input type="text" class="form-control" name="c_new_pass" id="passInput2">

</div>  

<!-- SUBMIT BUTTOM FOR CHANGE PASSWORD  -->
<button type="submit" 
            class="btn btn-primary">
            Change</button>


    </form>
     </div>



   
   
</div>  

    </form>
     
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>	
    <script>
        $(document).ready(function(){
             $("#navLinks li:nth-child(6) a").addClass('active');
        });


           // RANDOM PASSWORD GENERATOR 
           function makePass(length) {
            var result           = '';
            var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
            var charactersLength = characters.length;
            for ( var i = 0; i < length; i++ ) {
              result += characters.charAt(Math.floor(Math.random() * 
         charactersLength));

           }
          //  FUNCTIONALITY FOR PASSWORD DIV 1
           var passInput = document.getElementById('passInput');
          //  FUNCTIONALITY FOR CHANGE PASSWORD DIV 
           var passInput2 = document.getElementById('passInput2');
          // ACTIVE THE FUNCTIONALITY
           passInput.value = result;
           passInput2.value = result;
        }

        var gBtn = document.getElementById('gBtn');
        gBtn.addEventListener('click', function(e){
          e.preventDefault();
          makePass(7); // just adjust the number to increase the character length of the password generator
        });
      
    </script>

<a href="grade.php"
class="btn btn-dark" id="backbtn">Go Back</a>


   <!-- SCRIPT FOR GENERATE EMPLOYEE NUMBER  -->
   <script>
        $(document).ready(function(){
             $("#navLinks li:nth-child(6) a").addClass('active');
        });

        // EMPLOYEE NUMBER GENERATION
        function makeEmployeenum(length) {
            var result           = '';
            var characters       = '0123456789';
            var charactersLength = characters.length;
            for ( var i = 0; i < length; i++ ) {
              result += characters.charAt(Math.floor(Math.random() * 
         charactersLength));

           }
           var empInput = document.getElementById('empInput');
           empInput.value = result;
        }

        var eBtn = document.getElementById('eBtn');
        eBtn.addEventListener('click', function(e){
          e.preventDefault();
          makeEmployeenum(10); // just adjust the number to increase the character length of the password generator
        });
    </script>

</body>

</html>
<?php 

  }else {
    header("Location: ../login.php");
    exit;
  } 
}else {
	header("Location: registrar-office.php");
	exit;
} 

?>