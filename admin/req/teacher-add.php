
<!-- 1:13:00 TROUBLESHOOT BLANK FIELD DETECTOR-->
<!-- ISSUE FIX MORAL LESSON CHECK THE NAME OF EACH INPUT ON A CERTAIN PHP FILE -->

<?php
session_start();
if (isset($_SESSION['admin_id']) && 
    isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'Admin') {


//BLANK FIELD DETECTOR

if(isset($_POST['fname']) && 
   isset($_POST['lname']) &&
   isset($_POST['username']) &&
   isset($_POST['pass']) &&
   isset($_POST['subjects']) &&
   isset($_POST['grades'])) {

    // DATABASE CONNECTION
    include '../../connections.php';
    include "../data/teacher.php";
    
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $uname = $_POST['username'];
    $pass = $_POST['pass'];

    $grades = "";
    foreach ($_POST['grades'] as $grade){
        $grades .=$grade;
    }
    
    $subjects = "";
    foreach ($_POST['subjects'] as $subject){
        $subjects .=$subject;
    }


    // VALIDATION SESSION
    $data = 'uname'.$uname.'&fname'.$fname.'&lname='.$lname;

    if (empty($fname)) {
      $em  = "First name is required";
      header("Location: ../teacher-add.php?error=$em&$data");
      exit;
    }else if (empty($lname)) {
      $em  = "Last name is required";
      header("Location: ../teacher-add.php?error=$em&$data");
      exit;
    }else if (empty($uname)) {
      $em  = "Username is required";
      header("Location: ../teacher-add.php?error=$em&$data");
      exit;
    }else if (!unameIsUnique($uname, $conn)) {
      $em  = "Username is taken! try another";
      header("Location: ../teacher-add.php?error=$em&$data");
      exit;
    }else if (empty($pass)) {
      $em  = "Password is required";
      header("Location: ../teacher-add.php?error=$em&$data");
      exit;
    }else {
        // echo "Success!";

        // password hashing
        $pass = password_hash($pass, PASSWORD_DEFAULT);

        $sql = "INSERT INTO
                tbl_teachers(username, password, fname, lname,
                            subjects, grades)
                            VALUES(?,?,?,?,?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$uname, $pass, $fname, $lname, $subjects, 
              $grades]);

              $sm = "New teacher has been registered successfully";
              header("Location: ../teacher-add.php?success=$sm");
              exit;

    }
  


    // IF NO DATA INSERTED THEN USER CLICK ADD BUTTON
   }else {
    $em = "Error Occurred";
    header("Location: ../teacher-add.php?error=$em");
    exit;
  } 

   }else {
    // TWO FOLDERS ARE CONTAINED SO TWO ../../
    header("Location: ../../logout.php");
    exit;
  } 
}else {
	header("Location: ../../logout.php");
	exit;
} 
