<?php 
session_start();
if (isset($_SESSION['student_id']) && 
    isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'Student') {

      if (isset($_GET['searchKey'])){

        $search_key = $_GET['searchKey'];
        include "../connections.php";
        include "data/student.php";
        include "data/grade.php";
        
        include "data/student-score.php";
        $student_scores = searchScores($search_key, $conn);
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student - Grade Results</title>
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
        if ($student_scores != 0) {
     ?>
     <div class="container mt-5">
       
    
            
            <!-- SEARCH BUTTON  -->
           <form action="grade-result-search.php" class="mt-3 n-table" method="post">

           <div class="input-group mb-3">
          <input type="text" class="form-control" name="searchKey" placeholder="Search...">
          <button class="btn btn-info" id="gBtn">
            Search
            <!-- Search button svg icon -->
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
            </svg> 
          
          </button>
          </div>

           </form>

                      <!-- ERROR HANDLING  -->
            <?php if (isset($_GET['error'])) { ?>
                <div class="alert alert-danger mt-3 n-table" role="alert">
                <?=$_GET['error']?>
              </div>
             <?php } ?>

                         <!-- SUCCESS HANDLING FOR TEACHER-DELETE -->
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
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Subject</th>
                    <th scope="col">Test Type</th>
                    <th scope="col">Score</th>
                  </tr>
                </thead>
                <tbody>
                    <!--CREATE THIS FOR LOOP TO DISPLAY THE DATABASE DATA ON THE TABLE -->
                  <?php $i = 0; foreach ($student_scores as $student_score ) { 
                    $i++; ?>
                  <tr>
                    <th scope="row"><?=$i?></th>
                    <td>
                       <?=$student_score['first_name']?>
                    </td>
                    <td><?=$student_score['last_name']?></td>
                    <td><?=$student_score['subject']?></td>
                    <td><?=$student_score['test_type']?></td>
                    <td><?=$student_score['score']?></td>
                  

                    <!-- TABLE DATA TO SHOW THE STUDENTS GRADE -->
                 
                    
               
                  </tr>
                <?php } ?>
                </tbody>
              </table>
           </div>
         <?php }else{ ?>
             <div class="alert alert-info .w-450 m-5" 
                  role="alert">
               No Results Found!

                 <!-- spacing -->
                 &nbsp
                &nbsp

                <!-- if the user search nothing this is the back button -->
                <a href="grade-result.php"
                class="btn btn-dark">Go Back</a>



              </div>
         <?php } ?>
     </div>
     
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
  header("Location: grade-result.php");
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