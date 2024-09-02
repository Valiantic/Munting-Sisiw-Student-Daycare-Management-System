<?php 
session_start();
if (isset($_SESSION['admin_id']) && 
    isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'Admin') {
        
// continue 34:13


//BLANK FIELD DETECTOR


if (isset($_POST['fname'])      &&
    isset($_POST['lname'])      &&
    isset($_POST['username'])   &&
    isset($_POST['student_id']) &&

      // NEW COLUMNS ADDED DUE TO SECTION TABLE 
      isset($_POST['address']) &&
      isset($_POST['email_address']) &&
      isset($_POST['gender']) &&
      isset($_POST['date_of_birth']) &&
      isset($_POST['parent_fname']) &&
      isset($_POST['parent_lname']) &&
      isset($_POST['parent_phone_number']) &&
      isset($_POST['section']) &&


    isset($_POST['grade'])) {
    
     // DATABASE CONNECTION
    include '../../connections.php';
    include "../data/student.php";

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $uname = $_POST['username'];

      // NEW COLUMNS ADDED DUE TO SECTION TABLE 
      $address = $_POST['address'];
      $email_address = $_POST['email_address'];
      $gender = $_POST['gender'];
      $date_of_birth = $_POST['date_of_birth'];
      $parent_fname = $_POST['parent_fname'];
      $parent_lname = $_POST['parent_lname'];
      $parent_phone_number = $_POST['parent_phone_number'];
      $section = $_POST['section'];
 

    $student_id = $_POST['student_id'];
    
    $grade = $_POST['grade'];

       // VALIDATION SESSION 
    $data = 'student_id='.$student_id;

    if (empty($fname)) {
        $em  = "First name is required";
        header("Location: ../student-edit.php?error=$em&$data");
        exit;
    }else if (empty($lname)) {
        $em  = "Last name is required";
        header("Location: ../student-edit.php?error=$em&$data");
        exit;
    }else if (empty($uname)) {
        $em  = "Username is required";
        header("Location: ../student-edit.php?error=$em&$data");
        exit;
    }
    
    // NEW COLUMNS ADDED DUE TO SECTION TABLE 
   else if (empty($address)) {
    $em  = "Address is required";
    header("Location: ../student-edit.php?error=$em&$data");
    exit;
  }
  else if (empty($email_address)) {
    $em  = "Email address is required";
    header("Location: ../student-edit.php?error=$em&$data");
    exit;
  }
  else if (empty($gender)) {
    $em  = "Gender is required";
    header("Location: ../student-edit.php?error=$em&$data");
    exit;
  }
  else if (empty($date_of_birth)) {
    $em  = "Date of birth is required";
    header("Location: ../student-edit.php?error=$em&$data");
    exit;
  }
  else if (empty($parent_fname)) {
    $em  = "Parent First name is required";
    header("Location: ../student-edit.php?error=$em&$data");
    exit;
  }
  else if (empty($parent_lname)) {
    $em  = "Parent Last name is required";
    header("Location: ../student-edit.php?error=$em&$data");
    exit;
  }
  else if (empty($parent_phone_number)) {
    $em  = "Parent Phone number is required";
    header("Location: ../student-edit.php?error=$em&$data");
    exit;
  }
  else if (empty($section)) {
    $em  = "Section is required";
    header("Location: ../student-edit.php?error=$em&$data");
    exit;
  }
  
  
  
  
    
    
    
    else if (!unameIsUnique($uname, $conn, $student_id)) {
        $em  = "Username is taken! try another";
        header("Location: ../student-edit.php?error=$em&$data");
        exit;
    }else {
        $sql = "UPDATE tbl_students SET
                username = ?, fname=?, lname=?, grade=?, address=?,gender = ?, section=?, email_address=?, date_of_birth=?, parent_fname=?,parent_lname=?,parent_phone_number=?
                WHERE student_id=?";
        $stmt = $conn->prepare($sql);
        
        // NOTE: THE ARRANGEMENT OF THE VARIABLES INSIDE THE EXECUTE 
        // ARE CORRESPONDING TO THE UPDATE QUERY IN TOP SO MAKE SURE IT HAS 
        // THE SAME PARALLEL POSITIONING
        $stmt->execute([$uname, $fname, $lname, $grade, $address, $gender, $section, $email_address, $date_of_birth, $parent_fname, $parent_lname, $parent_phone_number, $student_id]);
        $sm = "Successfully updated!";
        header("Location: ../student-edit.php?success=$sm&$data");
        exit;
    }
    
     // IF NO DATA INSERTED THEN USER CLICK ADD BUTTON
  }else {
    $em = "Error occurred";
    header("Location: ../student.php?error=$em");
    exit;
  }

  }else {
    header("Location: ../../logout.php");
    exit;
  } 
}else {
    header("Location: ../../logout.php");
    exit;
} 