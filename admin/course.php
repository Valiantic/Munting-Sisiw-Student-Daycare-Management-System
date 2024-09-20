<?php 
session_start();
if (isset($_SESSION['admin_id']) && 
    isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'Admin') {
        include "../connections.php";
        include "data/course.php";
        include "data/subject.php";
        include "data/grade.php";
        $courses = getAllCourses($conn);

        
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Course</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="shortcut icon" href="../images/logo.png">
    
    <!-- BOOTSTRAP LINK  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <!-- FONT AWESOME LINK -->
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
        if ($courses != 0) {
     ?>
     <div class="container mt-5">
       
        <a href="course-add.php"
           class="btn btn-dark mb-3">Add New Course</a>


          

                      <!-- ERROR HANDLING  -->
            <?php if (isset($_GET['error'])) { ?>
                <div class="alert alert-danger mt-3 n-table" role="alert">
                <?=$_GET['error']?>
              </div>
             <?php } ?>

                         <!-- SUCCESS HANDLING FOR GRADE-DELETE -->
             <?php if (isset($_GET['success'])) { ?>
                <div class="alert alert-info mt-3 n-table" role="alert">
                <?=$_GET['success']?>
              </div>
             <?php } ?>

           <div class="table-responsive">
              <table class="table table-bordered mt-3 n-table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Course</th>
                    <th scope="col">Course Code</th>
                    <th scope="col">Grade</th>
                  </tr>
                </thead>
                <tbody>
                    <!--CREATE THIS FOR LOOP TO DISPLAY THE DATABASE DATA ON THE TABLE -->
                  <?php $i = 0; foreach ($courses as $course ) { 
                    $i++; ?>
                  <tr>
                    <!-- Table heading for id iteration -->
                    <th scope="row"><?=$i?></th>
                    <td>
                        <?php
                          echo $course['subjects'];
                        
                        ?>
                    </td>
                    <td>
                        <?php
                          echo $course['subject_code'];
                        
                        ?>
                    </td>
                    <td>
                        <?php
                        // DECLARE A VARIABLE IN ORDER TO STORE THE FETCH DATA GRADE AND GRADE CODE 
                            $grade = getGradeById($course['grade'], $conn);
                            echo $grade['grade_code'].'-'.$grade['grade'];
                        
                        ?>
                    </td>
                   
                    <td>
                    <a href="course-edit.php?course_id=<?=$course['subject_id']?>"
                           class="btn btn-warning">Edit</a>
                    <a href="course-delete.php?course_id=<?=$course['subject_id']?>"
                           class="btn btn-danger">Delete</a>
                  
                           
                    </td>
                  </tr>
                <?php } ?>
                </tbody>
              </table>
           </div>
         <?php }else{ ?>
             <div class="alert alert-info .w-450 m-5" 
                  role="alert">
              No Results Found!
              </div>
         <?php } ?>
     </div>
     

          <!-- SCRIPT FOR ACTIVE HOVER IN NAV -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>	
    <script>
        $(document).ready(function(){
             $("#navLinks li:nth-child(8) a").addClass('active');
        });

  

  
    </script>


        <!-- SCRIPT FOR DELETE MODAL CONFIRMATION  -->
      <script type="text/javascript">
          var elems = document.getElementsByClassName('btn btn-danger');
          var confirmIt = function (e) {
              if (!confirm('Are you sure you want to delete this record?')) e.preventDefault();
          };
          for (var i = 0, l = elems.length; i < l; i++) {
              elems[i].addEventListener('click', confirmIt, false);
          }
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