<?php 
session_start();
if (isset($_SESSION['admin_id']) && 
    isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'Admin') {
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Home</title>
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


</style>

<body>

<?php

include "inc/navbar.php";

?>

<div class="container mt-5">

    <div class="container text-center">
        <div class="row row-cols-5">
            <!-- continue 21:10 create teacher.php-->
            <a href="teachers.php" class="col btn btn-dark m-2 py-3">
            <i class="fa fa-user-circle fs-1" aria-hidden="true"></i>
            <br>
            Teachers
            </a>
            <a href="students.php" class="col btn btn-dark m-2 py-3">
            <i class="fa fa-graduation-cap fs-1" aria-hidden="true"></i>
            <br>
            Students
            </a>

            <a href="grade.php" class="col btn btn-dark m-2 py-3">
            <i class="fa fa-star fs-1" aria-hidden="true"></i>
            <br>
            Grade
            </a>

            <a href="section.php" class="col btn btn-dark m-2 py-3">
            <i class="fa fa-columns fs-1" aria-hidden="true"></i>
            <br>
            Section
            </a>


            <a href="registrar-office.php" class="col btn btn-dark m-2 py-3">
            <i class="fa fa-pencil-square fs-1" aria-hidden="true"></i>
            <br>
            Registrar-Office
            </a>


            
            <a href="course.php" class="col btn btn-dark m-2 py-3">
            <i class="fa fa-book fs-1" aria-hidden="true"></i>
            <br>
            Courses
            </a>

            <!-- <a href="" class="col btn btn-dark m-2 py-3">
            <i class="fa fa-cubes fs-1" aria-hidden="true"></i>
            <br>
            Class
            </a> -->
            <a href="message.php" class="col btn btn-dark m-2 py-3">
            <i class="fa fa-commenting fs-1" aria-hidden="true"></i>
            <br>
            Message
            </a>

      

            </a>
            <!-- <a href=".php" class="col btn btn-dark m-2 py-3">
            <i class="fa fa-calendar fs-1" aria-hidden="true"></i>
            <br>
            Schedule
            </a> -->
            <a href="settings.php" class="col btn btn-primary m-2 py-3 col-5">
            <i class="fa fa-gear fs-1" aria-hidden="true"></i>
            <br>
            Settings
            </a>
            <a href="../logout.php" class="col btn btn-warning m-2 py-3 col-5">
            <i class="fa fa-sign-out fs-1" aria-hidden="true"></i>
            <br>
            Log-out
            </a>


        </div>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>

    $(document).ready(function(){
        $("#navLinks li:nth-child(1) a").addClass('active');
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
	header("Location: ../login.php");
	exit;
} 

?>