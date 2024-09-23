<?php 
session_start();
if (isset($_SESSION['teacher_id']) && 
    isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'Teacher') {
        
        include "../connections.php";;
        include "data/student-score.php";
        include "data/test-type.php";
        include "data/subject.php";
      
        $student_scores = getAllScores($conn);
        $subjects = getAllSubjects($conn);
        $test_types = getAllTestType($conn);


        // VARIABLE INITIALIZATION FOR VALIDATION SESSION
        $student_scores = '';
     

        // VARIABLE INITIALIZATION FOR SESSION
        if (isset($_GET['student_score'])) $student_scores = $_GET['student_scores'];
  
       

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Add Course</title>
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



</style>

<body>
    <?php 
        include "inc/navbar.php";
     ?>
     <div class="container mt-5">
       


           <!-- CHECK IF THERE IS GRADE INPUTED -->
        <?php if ($student_scores == 0) { ?>
        <div class="alert alert-info" role="alert">
           First create grade.
          </div>
        <?php }else{ ?>

            <div class="d-flex justify-content-center">

            
                                                    <!-- ALWAYS CHECK THE ACTION -->
<form class="shadow p-3 mb-4 form-w" method="post" action="req/student-grade-add.php">


<hr><h3>Add new Course</h3></hr>

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
 <input type="text" class="form-control" value="<?=$student_scores?>" name="first_name">
</div>

<div class="mb-3">
 <label class="form-label">Last name</label>
 <input type="text" class="form-control" value="<?=$student_scores?>" name="last_name">
</div>

  <!-- DROPDOWN SELECTION FOR SUBJECT  -->
  <div class="mb-3">
 <label class="form-label">Subject</label>
 <input type="text" class="form-control" value="<?=$student_scores?>" name="subjects">
</div>


         <!-- DROPDOWN SELECTION FOR TEST TYPE -->
<div class="mb-3">
       <label class="form-label">Test Type</label>
       <select name="test_type"
               class="form-control" >
               <?php foreach ($test_types as $test_type) { ?>
                 <option value="<?=$test_type['test_id']?>">
                    <?=$test_type['test_type']?>
                 </option> 
               <?php } ?>
               
       </select>
     </div>

<div class="mb-3">
 <label class="form-label">Score</label>
 <input type="number" min="0" max="100" class="form-control" value="<?=$student_scores?>" name="score">
</div>


<div class="d-flex justify-content-center">

<button type="submit" class="btn btn-primary">Create</button>

</div>

</div>

</form>




            </div>

       
     </div>
     <?php } ?>
     
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>	
    <script>
        $(document).ready(function(){
             $("#navLinks li:nth-child(8) a").addClass('active');
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