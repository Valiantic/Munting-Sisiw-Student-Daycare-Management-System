
<!-- 1:13:00 TROUBLESHOOT BLANK FIELD DETECTOR-->
<!-- ISSUE FIX MORAL LESSON CHECK THE NAME OF EACH INPUT ON A CERTAIN PHP FILE -->

<?php
session_start();
if (isset($_SESSION['admin_id']) && 
    isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'Admin') {


//BLANK FIELD DETECTOR 
// note: names inside the parenthesis 
// are the names of the input value in teacher-add.php

if(isset($_POST['fname']) && 
   isset($_POST['lname']) &&
   isset($_POST['username']) &&
   isset($_POST['pass']) &&

   // NEW COLUMNS ADDED DUE TO SECTION TABLE 
   isset($_POST['address']) &&
   isset($_POST['employee_number']) &&
   isset($_POST['phone_number']) &&
   isset($_POST['qualification']) &&
   isset($_POST['email_address']) &&
   isset($_POST['gender']) &&
   isset($_POST['date_of_birth']) &&
   isset($_POST['section']) &&

   isset($_POST['subjects']) &&
   isset($_POST['grades'])) {

    // DATABASE CONNECTION
    include '../../connections.php';
    include "../data/teacher.php";
    
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $uname = $_POST['username'];
    $pass = $_POST['pass'];

       // NEW COLUMNS ADDED DUE TO SECTION TABLE 
    $address = $_POST['address'];
    $employee_number = $_POST['employee_number'];
    $phone_number = $_POST['phone_number'];
    $qualification = $_POST['qualification'];
    $email_address = $_POST['email_address'];
    $gender = $_POST['gender'];
    $date_of_birth = $_POST['date_of_birth'];

    $grades = "";
    foreach ($_POST['grades'] as $grade){
        $grades .=$grade;
    }
    
    $subjects = "";
    foreach ($_POST['subjects'] as $subject){
        $subjects .=$subject;
    }

    // BLANK FIELD CHECKBOX VALIDATOR FOR SECTIONS
    $sections = "";
    foreach ($_POST['sections'] as $section){
        $sections .=$section;
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
    }
    
    // NEW COLUMNS ADDED DUE TO SECTION TABLE 
    else if (empty($address)) {
      $em  = "Address is required";
      header("Location: ../teacher-add.php?error=$em&$data");
      exit;
    }
    else if (empty($employee_number)) {
      $em  = "Employee number is required";
      header("Location: ../teacher-add.php?error=$em&$data");
      exit;
    }
    else if (empty($phone_number)) {
      $em  = "Phone number is required";
      header("Location: ../teacher-add.php?error=$em&$data");
      exit;
    }
    else if (empty($qualification)) {
      $em  = "Qualification is required";
      header("Location: ../teacher-add.php?error=$em&$data");
      exit;
    }
    else if (empty($email_address)) {
      $em  = "Email address is required";
      header("Location: ../teacher-add.php?error=$em&$data");
      exit;
    }
    else if (empty($gender)) {
      $em  = "Gender is required";
      header("Location: ../teacher-add.php?error=$em&$data");
      exit;
    }
    else if (empty($date_of_birth)) {
      $em  = "Date of birth is required";
      header("Location: ../teacher-add.php?error=$em&$data");
      exit;
    }
    

    else if (empty($pass)) {
      $em  = "Password is required";
      header("Location: ../teacher-add.php?error=$em&$data");
      exit;
    }else {
        // echo "Success!";

        // password hashing
        $pass = password_hash($pass, PASSWORD_DEFAULT);

        // query to push data on the database
        $sql = "INSERT INTO
                tbl_teachers(username, password, fname, lname,
                            subjects, grades, section, address,
                            employee_number, date_of_birth, phone_number,
                            qualification, gender, email_address)
                            VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?)"; // 14 
        $stmt = $conn->prepare($sql);
        $stmt->execute([$uname, $pass, $fname, $lname, $subjects, 
              $grades, $sections, $address, $employee_number, $date_of_birth, 
              $phone_number, $qualification, $gender, $email_address]);

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
