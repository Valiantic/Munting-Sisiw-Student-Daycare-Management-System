

<?php
session_start();
if (isset($_SESSION['admin_id']) && 
    isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'Admin') {


//BLANK FIELD DETECTOR

if(isset($_POST['admin_pass'])    && 
   isset($_POST['new_pass'])    &&
   isset($_POST['c_new_pass']) &&
   isset($_POST['r_user_id'])) {

    // DATABASE CONNECTION
    include '../../connections.php';
    include "../data/registrar-office.php";
    include "../data/admin.php";
    // NOTE: ALWAYS INCLUDE THIS WHENEVER YOU WANT TO CHANGE THE PASSWORD
   
    
    // CHANGE PASSWORD FUNCTION
    // put inside the parameters are the name of every input
    $admin_pass = $_POST['admin_pass'];
    $new_pass = $_POST['new_pass'];
    $c_new_pass = $_POST['c_new_pass'];
    $r_user_id = $_POST['r_user_id'];
    $id = $_SESSION['admin_id'];


    // VALIDATION SESSION 
    // TAKE NOTE FOR THE DATA SHOULD BE TEACHER_ID= 
    $data = 'r_user_id='.$r_user_id.'#change_password';

    if (empty($admin_pass)) {
      $em  = "Admin password is required";
      header("Location: ../registrar-office-edit.php?perror=$em&$data");
      exit;
    }else if (empty($new_pass)) {
      $em  = "New password is required";
      header("Location: ../registrar-office-edit.php?perror=$em&$data");
      exit;
    }else if (empty($c_new_pass)) {
      $em  = "Confirmation password is required";
      header("Location: ../registrar-office-edit.php?perror=$em&$data");
      exit;
    }else if ($new_pass !== $c_new_pass) { // FOR NEW AND CONFIRM PASSWORD VERIFICATION 
      $em  = "New Password and Confirmation password does not match";
      header("Location: ../registrar-office-edit.php?perror=$em&$data");
      exit;
    }else if (!adminPasswordVerify($admin_pass, $conn, $id)) { // FOR ADMIN PASSWORD VERIFICATION 
      $em  = "Incorrect admin password";
      header("Location: ../registrar-office-edit.php?perror=$em&$data");
      exit;
    }else {
        // password hashing
        $new_pass = password_hash($pass, PASSWORD_DEFAULT);


    // NOTE CHECK THE ALWAYS THE TABLE NAME!
      $sql = "UPDATE registrar_office SET 
              password = ?
              WHERE r_user_id=?";
            
      $stmt = $conn->prepare($sql);
      $stmt->execute([$new_pass, $r_user_id]);
    
      $sm = "The password has been changed successfully!";
      header("Location: ../registrar-office-edit.php?psuccess=$sm&$data");
      exit;

    
    }
  


    // IF NO DATA INSERTED THEN USER CLICK ADD BUTTON
   }else {
    $em = "Error Occurred";
    header("Location: ../registrar-office-edit.php?error=$em&$data");
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
