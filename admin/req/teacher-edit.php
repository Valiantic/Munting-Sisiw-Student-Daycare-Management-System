

<?php
session_start();
if (isset($_SESSION['admin_id']) && 
    isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'Admin') {


//BLANK FIELD DETECTOR

if(isset($_POST['fname'])    && 
   isset($_POST['lname'])    &&
   isset($_POST['username']) &&
   isset($_POST['teacher_id'])     &&

    // NEW COLUMNS ADDED DUE TO SECTION TABLE 
    isset($_POST['address']) &&
    isset($_POST['employee_number']) &&
    isset($_POST['phone_number']) &&
    isset($_POST['qualification']) &&
    isset($_POST['email_address']) &&
    isset($_POST['gender']) &&
    isset($_POST['date_of_birth']) &&
    isset($_POST['sections']) &&

   isset($_POST['subjects']) &&
   isset($_POST['grades'])) {

    // DATABASE CONNECTION
    include '../../connections.php';
    include "../data/teacher.php";
    
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

    $teacher_id = $_POST['teacher_id'];

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
    // TAKE NOTE FOR THE DATA SHOULD BE TEACHER_ID= 
    $data = 'teacher_id='.$teacher_id;

    if (empty($fname)) {
      $em  = "First name is required";
      header("Location: ../teacher-edit.php?error=$em&$data");
      exit;
    }else if (empty($lname)) {
      $em  = "Last name is required";
      header("Location: ../teacher-edit.php?error=$em&$data");
      exit;
    }else if (empty($uname)) {
      $em  = "Username is required";
      header("Location: ../teacher-edit.php?error=$em&$data");
      exit;
    }else if (!unameIsUnique($uname, $conn, $teacher_id)) {
      $em  = "Username is taken! try another";
      header("Location: ../teacher-edit.php?error=$em&$data");
      exit;
    }
    
     // NEW COLUMNS ADDED DUE TO SECTION TABLE 
     else if (empty($address)) {
      $em  = "Address is required";
      header("Location: ../teacher-edit.php?error=$em&$data");
      exit;
    }
    else if (empty($employee_number)) {
      $em  = "Employee number is required";
      header("Location: ../teacher-edit.php?error=$em&$data");
      exit;
    }
    else if (empty($phone_number)) {
      $em  = "Phone number is required";
      header("Location: ../teacher-edit.php?error=$em&$data");
      exit;
    }
    else if (empty($qualification)) {
      $em  = "Qualification is required";
      header("Location: ../teacher-edit.php?error=$em&$data");
      exit;
    }
    else if (empty($email_address)) {
      $em  = "Email address is required";
      header("Location: ../teacher-edit.php?error=$em&$data");
      exit;
    }
    else if (empty($gender)) {
      $em  = "Gender is required";
      header("Location: ../teacher-edit.php?error=$em&$data");
      exit;
    }
    else if (empty($date_of_birth)) {
      $em  = "Date of birth is required";
      header("Location: ../teacher-edit.php?error=$em&$data");
      exit;
    }
    

    
    else {


    // NOTE CHECK THE ALWAYS THE TABLE NAME!
      $sql = "UPDATE tbl_teachers SET 
              username=?, fname=?, lname=?, subjects=?, grades=?,
              address=?, employee_number=?, date_of_birth=?, phone_number=?, 
              qualification=?, gender=?, email_address=?, section=?
              WHERE teacher_id=?";
            


      $stmt = $conn->prepare($sql);
      // continue 30:42 fix error!
      $stmt->execute([$uname,$fname, $lname, $subjects, $grades, $address, $employee_number, $date_of_birth, $phone_number, $qualification, $gender, $email_address, $sections, $teacher_id]);
      $sm = "Successfully Updated!";
      header("Location: ../teacher-edit.php?success=$sm&$data");
      exit;

    
    }
  


    // IF NO DATA INSERTED THEN USER CLICK ADD BUTTON
   }else {
    $em = "Error Occurred";
    header("Location: ../teacher-edit.php?error=$em&$data");
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
