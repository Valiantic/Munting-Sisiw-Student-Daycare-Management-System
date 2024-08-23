<?php 
session_start();
if (isset($_SESSION['admin_id']) && 
    isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'Admin') {
        include "../connections.php";
        include "data/teacher.php";
        include "data/subject.php";
        include "data/grade.php";
        include "data/section.php";

        if(isset($_GET['teacher_id'])){

        $teacher_id = $_GET['teacher_id'];

        // get information of teachers within the database
        $teachers = getTeacherById($teacher_id, $conn);
       
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - View Teachers</title>
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


</style>

<body>
    <?php 
        include "inc/navbar.php";
        if ($teachers != 0) {

            
     ?>
     <div class="container mt-5">

            <!-- DIV TO CENTER THE BOOTSTRAP CARD -->
     <div class="container d-flex justify-content-center">
            <!-- TEACHER DETAILS -->
     <div class="card align-items-center" style="width: 18rem;">
        <!-- <img src="..." class="card-img-top" alt="..."> -->
        <div class="card-body">
            <h5 class="card-title text-center">@<?=$teachers['username']?></h5>
            <p class="card-text">Information</p>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">First name: <?=$teachers['fname']?></li>
            <li class="list-group-item">Last name: <?=$teachers['lname']?></li>
            <li class="list-group-item">Username: <?=$teachers['username']?></li>

            <li class="list-group-item">Address: <?=$teachers['address']?></li>
            <li class="list-group-item">Employee number: <?=$teachers['employee_number']?></li>
            <li class="list-group-item">Date of birth: <?=$teachers['date_of_birth']?></li>
            <li class="list-group-item">Phone number: <?=$teachers['phone_number']?></li>
            <li class="list-group-item">Qualification: <?=$teachers['qualification']?></li>
            <li class="list-group-item">Gender: <?=$teachers['gender']?></li>
            <li class="list-group-item">Email address: <?=$teachers['email_address']?></li>

            <li class="list-group-item">Subject: 
                  <!-- TO SHOW SUBJECT -->
            <?php 
                           $s = '';
                           $subjects = str_split(trim($teachers['subjects']));
                           foreach ($subjects as $subject) {
                              $s_temp = getSubjectById($subject, $conn);
                              if ($s_temp != 0) 
                                $s .=$s_temp['subject_code'].', ';
                           }
                           echo $s;
           ?>

            </li>


            <li class="list-group-item">Grade: 
                  <!-- TO SHOW GRADE -->
                  <?php 
                           $g = '';
                           $grades = str_split(trim($teachers['grades']));
                           foreach ($grades as $grade) {
                              $g_temp = getGradeById($grade, $conn);
                              if ($g_temp != 0) 
                                $g .=$g_temp['grade_code'].'-'.
                                     $g_temp['grade'].', ';
                           }
                           echo $g;
                        ?>

            </li>

            <li class="list-group-item">Section: 
                  <!-- TO SHOW SECTION -->
                  <?php 
                           $s = '';
                           $sections = str_split(trim($teachers['section']));
                           foreach ($sections as $section) {
                              $s_temp = getSectionById($section, $conn);
                              if ($s_temp != 0) 
                                $s .=$s_temp['section'].', ';
                           }
                           echo $s;
                        ?>

            </li>
    
        </ul>
        <div class="card-body">
            <a href="teachers.php" class="card-link btn btn-dark">Go Back</a>
        </div>
        </div>


     </div>
   
           

    </div>
    <?php 
       }else {
        header("Location: teacher.php");
        exit;
      } 
     ?>
       
     
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>	
    <script>
        $(document).ready(function(){
             $("#navLinks li:nth-child(2) a").addClass('active');
        });
    </script>

</body>

</html>
<?php 

  }else {
    header("Location: teachers.php");
    exit;
  } 


  }else {
    header("Location: ../login.php");
    exit;
  } 
}else {
	header("Location: ../login.php");
	exit;
} 

?>