

<?php
session_start();
if (isset($_SESSION['student_id']) && 
    isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'Student') {


//BLANK FIELD DETECTOR

if(isset($_POST['old_pass'])    && 
   isset($_POST['new_pass'])    &&
   isset($_POST['c_new_pass'])) {

    // DATABASE CONNECTION
    include '../../connections.php';
    include "../data/student.php";

  

    // CHANGE PASSWORD FUNCTION
    // put inside the parameters are the name of every input
    $old_pass = $_POST['old_pass'];
    $new_pass = $_POST['new_pass'];
    $c_new_pass = $_POST['c_new_pass'];

    // create a variable SESSION to lookup the account credential in the database
    // NOTE: THIS MUST BE SESSION IN ORDER FOR THE PASSWORD TO BE CHECK AND COMPARE
    $student_id = $_SESSION['student_id'];

   
      


    if (empty($old_pass)) {
      $em  = "Old password is required";
      header("Location: ../pass.php?perror=$em");
      exit;
    }else if (empty($new_pass)) {
      $em  = "New password is required";
      header("Location: ../pass.php?perror=$em");
      exit;
    }else if (empty($c_new_pass)) {
      $em  = "Confirmation password is required";
      header("Location: ../pass.php?perror=$em");
      exit;
    }else if ($new_pass !== $c_new_pass) { // FOR NEW AND CONFIRM PASSWORD VERIFICATION 
      $em  = "New Password and Confirmation password does not match";
      header("Location: ../pass.php?perror=$em");
      exit;
    }else if (!studentPasswordVerify($old_pass, $conn, $student_id)) { // FOR ADMIN PASSWORD VERIFICATION 
      $em  = "Incorrect old password";
      header("Location: ../pass.php?perror=$em");
      exit;
    }else {
        // password hashing
        $hashedpass = password_hash($new_pass, PASSWORD_DEFAULT);


    // NOTE CHECK THE ALWAYS THE TABLE NAME!
      $sql = "UPDATE tbl_students SET 
              password = ?
              WHERE student_id=?";
            
      $stmt = $conn->prepare($sql);
      $stmt->execute([$hashedpass, $student_id]);
    
      $sm = "The password has been changed successfully!";
      header("Location: ../pass.php?psuccess=$sm");
      exit;

    
    }
  


    // IF NO DATA INSERTED THEN USER CLICK ADD BUTTON
   }else {
    $em = "Error Occurred";
    header("Location: ../pass.php?error=$em");
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
