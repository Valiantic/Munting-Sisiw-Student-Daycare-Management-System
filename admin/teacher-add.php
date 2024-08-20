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
        $subjects = getAllSubjects($conn);
        $grades = getAllGrades($conn);
        $sections = getAllSections($conn);


        // VARIABLE INITIALIZATION FOR VALIDATION SESSION
        $fname = '';
        $lname = '';
        $uname = '';

        // VARIABLE INITIALIZATION FOR SESSION
        if (isset($_GET['fname'])) $fname = $_GET['fname'];
        if (isset($_GET['lname'])) $lname = $_GET['lname'];
        if (isset($_GET['uname'])) $uname = $_GET['uname'];

        // PUT VALUE ON THREE INPUT FNAME,LNAME, AND UNAME

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Add Teachers</title>
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
        <!-- continue 52:17 -->
        <a href="teachers.php"
           class="btn btn-dark">Go Back</a>

<form class="shadow p-3 mt-4 form-w" method="post" action="req/teacher-add.php">


   <hr><h3>Add new teacher</h3></hr>

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
    <input type="text" class="form-control" value="<?=$fname?>" name="fname">
  </div>

  <div class="mb-3">
    <label class="form-label">Last name</label>
    <input type="text" class="form-control" value="<?=$lname?>" name="lname">
  </div>

  <div class="mb-3">
    <label class="form-label">Username</label>
    <input type="text" class="form-control" value="<?=$uname?>" name="username">
  </div>

  <div class="mb-3">
    <label class="form-label">Password</label>
    <div class="input-group mb-3">
    <input type="text" class="form-control" name="pass" id="passInput">
    <button class="btn btn-secondary" id="gBtn">Random Password</button>
    </div>
  </div>

  <!-- TO ADD NEW COLUMNS -->
  <div class="mb-3">
    <label class="form-label">Address</label>
    <input type="text" class="form-control" value="<?=$uname?>" name="address">
  </div>

  <div class="mb-3">
    <label class="form-label">Employee number</label>
    <input type="text" class="form-control" value="<?=$uname?>" name="employee_number">
  </div>

  <div class="mb-3">
    <label class="form-label">Phone number</label>
    <input type="text" class="form-control" value="<?=$uname?>" name="phone_number">
  </div>

  <div class="mb-3">
    <label class="form-label">Qualification</label>
    <input type="text" class="form-control" value="<?=$uname?>" name="qualification">
  </div>

  <div class="mb-3">
    <label class="form-label">Email address</label>
    <input type="text" class="form-control" value="<?=$uname?>" name="email_address">
  </div>

  <div class="mb-3">
    <label class="form-label">Gender</label><br>
    <input type="radio" checked value="Male" name="gender">Male
      &nbsp;
    <input type="radio" value="Female" name="gender">Female
  </div>

  <div class="mb-3">
    <label class="form-label">Date of birth</label>
    <input type="date" class="form-control" value="<?=$uname?>" name="date_of_birth">
  </div>

   <!-- TO ADD NEW COLUMNS -->
    <!-- 17:15 adding new column in database  -->

  <div class="mb-3">
    <label class="form-label">Subject</label>
    <div class="row row-cols-5">

    <!-- USE TO DISPLAY SUBJECTS USING FOR LOOP  -->
    <?php foreach ($subjects as $subject): ?>
      
        <div class="col">
        <input type="checkbox" name="subjects[]" value="<?=$subject['subject_id']?>"> 
        <?=$subject['subjects']?>
        </div>

    <?php endforeach ?>

    </div>
  </div>

  <div class="mb-3">
    <label class="form-label">Grade</label>

    <div class="row row-cols-5"> 
    <?php foreach ($grades as $grade): ?>
      
      <div class="col">
      <input type="checkbox" name="grades[]" value="<?=$grade['grade_id']?>"> 
      <?=$grade['grade_code']?>-<?=$grade['grade']?>
      <!-- ENCLOSED IN PHP TAG ARE THE VARIABLES YOU WANT TO DISPLAY -->


    </div>
    <?php endforeach ?>
    </div>

  </div>

        <!-- NEW COLUMN THAT HAS BEEN ADDED -->
  <div class="mb-3">
    <label class="form-label">Section</label>
    <div class="row row-cols-5">

    <!-- USE TO DISPLAY SECTION USING FOR LOOP  -->
    <?php foreach ($sections as $section): ?>
      
        <div class="col">
        <input type="checkbox" name="section[]" value="<?=$section['section_id']?>"> 
        <?=$section['section']?>
        </div>

    <?php endforeach ?>

    </div>
  </div>

    <button type="submit" class="btn btn-primary">Add</button>
</form>
       
     </div>
     
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>	
    <script>
        $(document).ready(function(){
             $("#navLinks li:nth-child(2) a").addClass('active');
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
           var passInput = document.getElementById('passInput');
           passInput.value = result;
        }

        var gBtn = document.getElementById('gBtn');
        gBtn.addEventListener('click', function(e){
          e.preventDefault();
          makePass(7); // just adjust the number to increase the character length of the password generator
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