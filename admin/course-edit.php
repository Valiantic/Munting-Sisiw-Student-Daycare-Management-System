<?php 
session_start();
if (isset($_SESSION['admin_id']) && 
    isset($_SESSION['role']) &&
    // NOTE: THE WEBPAGE WILL NOT REDIRECT IF THIS PARAMETERS 
    // IS NOT THE SAME WITH THE ANCHOR TAG BUTTON ON THE PREV PAGE
    isset($_GET['course_id'])) {

    if ($_SESSION['role'] == 'Admin') {

        include "../connections.php";
   
        include "data/course.php";
        include "data/grade.php";
        include "data/subject.php";
        $courses = getAllCourses($conn);

        // NOTE: FETCH ALL DATA FROM THE DATABASE THIS IS WHEN THE ERROR DISPLAY 
        // C:\xampp\htdocs\Munting_sisiw_daycare\admin\grade-edit.php on line 202
        // " name="grade_code
        $course_id = $_GET['course_id'];

        // NOTE: TO DISPLAY DATA ON EDITS
        $courses = getSubjectById($course_id, $conn);
        $grades = getAllGrades($conn);

       
        // LOGICAL ERROR: CAUSING REDIRECTION TO teachers.php
        if ($courses == 0){
            header("Location: course.php");
	        exit;
        }
    
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Edit Course</title>
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
<form class="shadow p-3 mt-4 form-w" method="post" action="req/course-edit.php">


   <hr><h3>Edit Course</h3></hr>

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
    <label class="form-label">Course name</label>
    <input type="text" class="form-control" value="<?=$courses['subjects']?>" name="course_name">
  </div>
            <!-- EDIT THIS -->
  <div class="mb-3">
    <label class="form-label">Course code</label>
    <input type="text" class="form-control" value="<?=$courses['subject_code']?>" name="course_code">
  </div>

            <!-- DROPDOWN SELECTION  -->
  <div class="mb-3">
          <label class="form-label">Grade</label>
          <select name="grade"
                  class="form-control" >
                  <?php foreach ($grades as $grade) { 
                    // CREATED A VARIABLE TO COUNT THE SELECT
                    $selected = 0;
                    if ($grade['grade_id'] == $courses['grade']){
                        $selected = 1;
                    }
                    ?>

                    <option value="<?=$grade['grade_id']?>"
                        <?php if ($selected) echo "selected"; ?> >
                       <?=$grade['grade_code'].'-'.$grade['grade']?>
                    </option> 

                  <?php } ?>
                  
          </select>
        </div>
  

  <!-- INDICATION FOR COURSE ID -->
  <!-- BLANK FIELD DETECTOR ISSUE FIXED BECAUSE OF THIS -->
  <!-- NOTE: CHECK THE VARIABLE $ IF ITS RIGHT -->
 <input type="text" value="<?=$courses['subject_id']?>"
         name="course_id"
         hidden>


    <button type="submit" 
            class="btn btn-primary">
            Update</button>
</form>
   
</div>  

    </form>
     
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>	
    <script>
        $(document).ready(function(){
             $("#navLinks li:nth-child(8) a").addClass('active');
        });

      
    </script>

<a href="course.php"
class="btn btn-dark" id="backbtn">Go Back</a>

</body>

</html>
<?php 

  }else {
    header("Location: ../login.php");
    exit;
  } 
}else {
	header("Location: course.php");
	exit;
} 

?>