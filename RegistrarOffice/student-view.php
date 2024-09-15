<?php 
session_start();
if (isset($_SESSION['r_user_id']) && 
    isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'Registrar Office') {
        include "../connections.php";
        include "data/student.php";
        include "data/subject.php";
        include "data/grade.php";
        include "data/section.php";

        if(isset($_GET['student_id'])){

        $student_id = $_GET['student_id'];

        // get information of students within the database
        $students = getStudentById($student_id, $conn);
      
       
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - View Students</title>
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
       
        if ($students != 0) {

            
     ?>
     <div class="container mt-2">

            <!-- continue 4:09 -->
   
            <div class="card">

                <!-- IMAGE TAG WITH GENDER AVATAR DETECTION -->
        
        <div class="container d-flex justify-content-center">
        <img src="../images/student-<?=$students['gender']?>.png" class="avatar" alt="...">
        </div>

        <br>
        <h5 class="card-title text-center">@<?=$students['username']?></h5>
        <p class="card-text text-center">Student Information</p>


        <div class="card-item">
            <label>First Name:&nbsp;&nbsp;&nbsp;<?=$students['fname']?></label>
        </div>
        <div class="card-item">
            <label>Last Name:&nbsp;&nbsp;&nbsp;<?=$students['lname']?></label>
        </div>
        <div class="card-item">
            <label>Username:&nbsp;&nbsp;&nbsp;<?=$students['username']?></label>
        </div>
        <!-- FORGOT TO ADD  -->
        <div class="card-item">
            <label>Address:&nbsp;&nbsp;&nbsp;<?=$students['address']?></label>
        </div>
        <div class="card-item">
            <label>Email Address:&nbsp;&nbsp;&nbsp;<?=$students['email_address']?></label>
        </div>
        <div class="card-item">
            <label>Date of Birth:&nbsp;&nbsp;&nbsp;<?=$students['date_of_birth']?></label>
        </div>

        <div class="card-item">
            <label>Date enrolled:&nbsp;&nbsp;&nbsp;<?=$students['date_of_joined']?></label>
        </div>
      
        <div class="card-item">
            <label>Gender:&nbsp;&nbsp;&nbsp;<?=$students['gender']?></label>
        </div>

        <div class="card-item">
            <label>Grade:&nbsp;&nbsp;&nbsp;<?php 
                           $g = '';
                           $grades = str_split(trim($students['grade']));
                           foreach ($grades as $grade) {
                              $g_temp = getGradeById($grade, $conn);
                              if ($g_temp != 0) 
                                $g .=$g_temp['grade_code'].'-'.
                                     $g_temp['grade'].' ';
                           }
                           echo $g;
                        ?></label>
        </div>
        <div class="card-item">
            <label>Section:&nbsp;&nbsp;&nbsp; <?php 
                           $s = '';
                           $sections = str_split(trim($students['section']));
                           foreach ($sections as $section) {
                              $s_temp = getSectionById($section, $conn);
                              if ($s_temp != 0) 
                                $s .=$s_temp['section'].' ';
                           }
                           echo $s;
                        ?></label>
        </div>

        <br>
        <p class="card-text text-center texprimary">Parent Information</p>
        <hr> 

        <div class="card-item">
            <label>Parent First name:&nbsp;&nbsp;&nbsp;<?=$students['parent_fname']?></label>
        </div>

        <div class="card-item">
            <label>Parent Last name:&nbsp;&nbsp;&nbsp;<?=$students['parent_lname']?></label>
        </div>

        <div class="card-item">
            <label>Parent Phone number:&nbsp;&nbsp;&nbsp;<?=$students['parent_phone_number']?></label>
        </div>
       
       <hr>
       <br>

       
        <div class="card-body d-flex justify-content-center">
            <a href="students.php" class="card-link btn btn-dark">Go Back</a>
        </div>

    </div>
   
           

    </div>

    <?php 
       }else {
        header("Location: students.php");
        exit;
      } 
     ?>
       
     
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>	
    <script>
        $(document).ready(function(){
             $("#navLinks li:nth-child(3) a").addClass('active');
        });
    </script>

</body>

</html>
<?php 

  }else {
    header("Location: students.php");
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