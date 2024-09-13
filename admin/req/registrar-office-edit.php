


<?php
session_start();
if (isset($_SESSION['admin_id']) && 
    isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'Admin') {


//BLANK FIELD DETECTOR

if(isset($_POST['fname'])    && 
   isset($_POST['lname'])    &&
   isset($_POST['username']) &&
   isset($_POST['r_user_id'])     &&

    // NEW COLUMNS ADDED DUE TO SECTION TABLE 
    isset($_POST['address']) &&
    isset($_POST['employee_number']) &&
    isset($_POST['phone_number']) &&
    isset($_POST['qualification']) &&
    isset($_POST['email_address']) &&
    isset($_POST['gender']) &&
    isset($_POST['date_of_birth'])) {

    // DATABASE CONNECTION
    include '../../connections.php';
    include "../data/registrar_office.php";
    
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $uname = $_POST['username'];

     // NEW COLUMNS ADDED DUE TO SECTION TABLE 
     $address = $_POST['address'];
     $employee_number = $_POST['employee_number'];
     $phone_number = $_POST['phone_number'];
     $qualification = $_POST['qualification'];
     $email_address = $_POST['email_address'];
     $gender = $_POST['gender'];
     $date_of_birth = $_POST['date_of_birth'];

    $r_user_id = $_POST['r_user_id'];

   
    
    // VALIDATION SESSION 
    // TAKE NOTE FOR THE DATA SHOULD BE TEACHER_ID= 
    $data = 'r_user_id='.$r_user_id;

    if (empty($fname)) {
      $em  = "First name is required";
      header("Location: ../registrar-office-edit.php?error=$em&$data");
      exit;
    }else if (empty($lname)) {
      $em  = "Last name is required";
      header("Location: ../registrar-office-edit.php?error=$em&$data");
      exit;
    }else if (empty($uname)) {
      $em  = "Username is required";
      header("Location: ../registrar-office-edit.php?error=$em&$data");
      exit;
    }else if (!unameIsUnique($uname, $conn, $r_user_id)) {
      $em  = "Username is taken! try another";
      header("Location: ../registrar-office-edit.php?error=$em&$data");
      exit;
    }
    
     // NEW COLUMNS ADDED DUE TO SECTION TABLE 
     else if (empty($address)) {
      $em  = "Address is required";
      header("Location: ../registrar-office-edit.php?error=$em&$data");
      exit;
    }
    else if (empty($employee_number)) {
      $em  = "Employee number is required";
      header("Location: ../registrar-office-edit.php?error=$em&$data");
      exit;
    }
    else if (empty($phone_number)) {
      $em  = "Phone number is required";
      header("Location: ../registrar-office-edit.php?error=$em&$data");
      exit;
    }
    else if (empty($qualification)) {
      $em  = "Qualification is required";
      header("Location: ../registrar-office-edit.php?error=$em&$data");
      exit;
    }
    else if (empty($email_address)) {
      $em  = "Email address is required";
      header("Location: ../registrar-office-edit.php?error=$em&$data");
      exit;
    }
    else if (empty($gender)) {
      $em  = "Gender is required";
      header("Location: ../registrar-office-edit.php?error=$em&$data");
      exit;
    }
    else if (empty($date_of_birth)) {
      $em  = "Date of birth is required";
      header("Location: ../registrar-office-edit.php?error=$em&$data");
      exit;
    }
    
    else {


    // NOTE ALWAYS CHECK THE TABLE NAME!
      $sql = "UPDATE registrar_office SET 
              username=?, fname=?, lname=?, 
              address=?, employee_number=?, date_of_birth=?, phone_number=?, 
              qualification=?, gender=?, email_address=?
              WHERE r_user_id=?";
            


      $stmt = $conn->prepare($sql);
    
       // NOTE: THE ARRANGEMENT OF THE VARIABLES INSIDE THE EXECUTE 
        // ARE CORRESPONDING TO THE UPDATE QUERY IN TOP SO MAKE SURE IT HAS 
        // THE SAME PARALLEL POSITIONING
      $stmt->execute([$uname,$fname, $lname, $address, $employee_number, $date_of_birth, $phone_number, $qualification, $gender, $email_address, $r_user_id]);
      $sm = "Successfully Updated!";
      header("Location: ../registrar-office-edit.php?success=$sm&$data");
      exit;
      

      // NOTE ALWAYS INCLUDE THE HIDDEN USER_ID INPUT IN THE PREV PAGE IN ORDER TO UPDATE RECORD
    
    }
  


    // IF NO DATA INSERTED THEN USER CLICK ADD BUTTON
   }else {
    $em = "Error Occurred";
    header("Location: ../registrar-office.php?error=$em&$data");
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
