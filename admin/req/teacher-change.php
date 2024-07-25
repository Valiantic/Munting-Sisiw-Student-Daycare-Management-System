

<?php
session_start();
if (isset($_SESSION['admin_id']) && 
    isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'Admin') {


//BLANK FIELD DETECTOR

if(isset($_POST['admin_pass'])    && 
   isset($_POST['new_pass'])    &&
   isset($_POST['c_new_pass']) &&
   isset($_POST['teacher_id'])) {

    // DATABASE CONNECTION
    include '../../connections.php';
    include "../data/teacher.php";
    
    // CHANGE PASSWORD FUNCTION
    // put inside the parameters are the name of every input
    $admin_pass = $_POST['admin_pass'];
    $new_pass = $_POST['new_pass'];
    $c_new_pass = $_POST['c_new_pass'];
    $teacher_id = $_POST['teacher_id'];
    $id = $_SESSION['admin_id'];


    // VALIDATION SESSION 
    // TAKE NOTE FOR THE DATA SHOULD BE TEACHER_ID= 
    $data = 'teacher_id='.$teacher_id.'#change_password';

    if (empty($admin_pass)) {
      $em  = "Admin password is required";
      header("Location: ../teacher-edit.php?perror=$em&$data");
      exit;
    }else if (empty($new_pass)) {
      $em  = "New password is required";
      header("Location: ../teacher-edit.php?perror=$em&$data");
      exit;
    }else if (empty($c_new_pass)) {
      $em  = "Confirmation password is required";
      header("Location: ../teacher-edit.php?perror=$em&$data");
      exit;
    }else if ($new_pass === $c_new_pass) {
      $em  = "New Password and Confirmation password does not match";
      header("Location: ../teacher-edit.php?perror=$em&$data");
      exit;
    }else {
    // NOTE CHECK THE ALWAYS THE TABLE NAME!
      $sql = "UPDATE tbl_teachers SET 
              username = ?, fname=?, lname=?, subjects=?, grades=?
              WHERE teacher_id=?";
            
      $stmt = $conn->prepare($sql);
      $stmt->execute([$uname, $fname, $lname, $subjects, $grades
                    , $teacher_id]);
    
      $sm = "Successfully Updated!";
      header("Location: ../teacher-edit.php?success=$sm&$data");
      exit;

    
    }
  


    // IF NO DATA INSERTED THEN USER CLICK ADD BUTTON
   }else {
    $em = "Error Occurred";
    header("Location: ../teacher-edit.php?error=$em");
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
