<?php 
session_start();
if (isset($_SESSION['teacher_id']) && 
    isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'Teacher') {
        include "../connections.php";
        include "data/teacher.php";
        include "data/subject.php";
        include "data/grade.php";
        include "data/section.php";
      
        $teacher_id = $_SESSION['teacher_id'];

        // get information of students within the database
        $teachers = getTeacherById($teacher_id, $conn);

      
        
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student - Home</title>
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



     /* styling for employee card information */
    
     .card {
            width: 100%;
            max-width: 700px;
            margin: 10px auto;
            background-color: white;
            border: 1px solid #ccc;
            padding: 20px;
            display: flex;
            flex-wrap: wrap;
            border: 1px solid #ccc;
            
            box-shadow: 0px 2px 5px rgba(5, 2, 2, 5);
            
        }

        .card-item {
            /* space in between */
            flex: 1 1 40px;
            padding: 10px;
         
        }

        .card-item label {
         
            display: block;
            background: #F5F5F5;
            border-radius: 10px;
            padding: 7px;
            margin: 4spx;
           
        }
        .avatar {
          height: 200px;
          width: 200px;
          border-radius: 55%;
        }
        label {
          font-size: 20px;
        }

        @media only screen and (max-width: 600px) {
            .card {
                flex-direction: column;
            }

            .card-item {
                flex: 1 1 100%;
            }
        }



</style>

<body>

<?php

include "inc/navbar.php";

?>


<div class="container mt-2">

<!-- continue 4:09 -->

<div class="card">

    <!-- IMAGE TAG WITH GENDER AVATAR DETECTION -->

<div class="container d-flex justify-content-center">
<img src="../images/teacher-<?=$teachers['gender']?>.png" class="avatar" alt="...">
</div>

    <br>
        <h5 class="card-title text-center">@<?=$teachers['username']?></h5>
        <p class="card-text text-center">Teacher Information</p>


        <div class="card-item">
            <label>First Name:&nbsp;&nbsp;&nbsp;<?=$teachers['fname']?></label>
        </div>
        <div class="card-item">
            <label>Last Name:&nbsp;&nbsp;&nbsp;<?=$teachers['lname']?></label>
        </div>
        <div class="card-item">
            <label>Username:&nbsp;&nbsp;&nbsp;<?=$teachers['username']?></label>
        </div>
        <!-- FORGOT TO ADD  -->
        <div class="card-item">
            <label>Address:&nbsp;&nbsp;&nbsp;<?=$teachers['address']?></label>
        </div>
        <div class="card-item">
            <label>Employee Number:&nbsp;&nbsp;&nbsp;<?=$teachers['employee_number']?></label>
        </div>
        <div class="card-item">
            <label>Date of Birth:&nbsp;&nbsp;&nbsp;<?=$teachers['date_of_birth']?></label>
        </div>
        <div class="card-item">
            <label>Phone Number:&nbsp;&nbsp;&nbsp;<?=$teachers['phone_number']?></label>
        </div>
        <div class="card-item">
            <label>Qualification:&nbsp;&nbsp;&nbsp;<?=$teachers['qualification']?></label>
        </div>
        <div class="card-item">
            <label>Date joined:&nbsp;&nbsp;&nbsp;<?=$teachers['date_of_joined']?></label>
        </div>
        <div class="card-item">
            <label>Gender:&nbsp;&nbsp;&nbsp;<?=$teachers['gender']?></label>
        </div>
        <div class="card-item">
            <label>Email Address:&nbsp;&nbsp;&nbsp;<?=$teachers['email_address']?></label>
        </div>
        <div class="card-item">
            <label>Subject:&nbsp;&nbsp;&nbsp; <?php 
                           $s = '';
                           $subjects = str_split(trim($teachers['subjects']));
                           foreach ($subjects as $subject) {
                              $s_temp = getSubjectById($subject, $conn);
                              if ($s_temp != 0) 
                                $s .=$s_temp['subject_code'].', ';
                           }
                           echo $s;
           ?></label>
        </div>
        <div class="card-item">
        <label>Grade:&nbsp;&nbsp;&nbsp;<?php 
                           $g = '';
                           $grades = str_split(trim($teachers['grades']));
                           foreach ($grades as $grade) {
                              $g_temp = getGradeById($grade, $conn);
                              if ($g_temp != 0) 
                                $g .=$g_temp['grade_code'].'-'.
                                     $g_temp['grade'].', ';
                           }
                           echo $g;
                        ?></label>
        </div>
        <div class="card-item">
            <label>Section:&nbsp;&nbsp;&nbsp; <?php 
                           $s = '';
                           $sections = str_split(trim($teachers['section']));
                           foreach ($sections as $section) {
                              $s_temp = getSectionById($section, $conn);
                              if ($s_temp != 0) 
                                $s .=$s_temp['section'].', ';
                           }
                           echo $s;
                        ?></label>
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