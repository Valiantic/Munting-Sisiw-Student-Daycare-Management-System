<?php 
session_start();
if (isset($_SESSION['r_user_id']) && 
    isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'Registrar Office') {
    	

if (isset($_POST['fname']) &&
    isset($_POST['lname']) &&
    isset($_POST['username']) &&
    isset($_POST['pass']) &&

      // NEW COLUMNS ADDED DUE TO SECTION TABLE 
    isset($_POST['address']) &&
    isset($_POST['email_address']) &&
    isset($_POST['gender']) &&
    isset($_POST['date_of_birth']) &&
    isset($_POST['parent_fname']) &&
    isset($_POST['parent_lname']) &&
    isset($_POST['parent_phone_number']) &&
    isset($_POST['section']) &&

    //THE GRADE COLUMN IS NAMED GRADES THATS WHY IT WON'T WORK EARLIER
    //LESSON: ALWAYS CHECK THE NAME VALUE IF THE ERROR VALIDATOR IS NOT WORKING!!!
    isset($_POST['grade'])) {
    
    include '../../connections.php';
    include "../data/student.php";

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $uname = $_POST['username'];
    $pass = $_POST['pass'];

     // NEW COLUMNS ADDED DUE TO SECTION TABLE 
     $address = $_POST['address'];
     $email_address = $_POST['email_address'];
     $gender = $_POST['gender'];
     $date_of_birth = $_POST['date_of_birth'];
     $parent_fname = $_POST['parent_fname'];
     $parent_lname = $_POST['parent_lname'];
     $parent_phone_number = $_POST['parent_phone_number'];


    $grade = $_POST['grade'];
    $section = $_POST['section'];

     
    // continue 15:11


    $data = 'uname='.$uname.'&fname='.$fname.'&lname='.$lname.'&address='.$address.'&gender='.$email_address.'&pfn='.$parent_fname.'&pln='.$parent_lname.'&ppn='.$parent_phone_number;

    //BLANK FIELD DETECTOR

    if (empty($fname)) {
		$em  = "First name is required";
		header("Location: ../student-add.php?error=$em&$data");
		exit;
	}else if (empty($lname)) {
		$em  = "Last name is required";
		header("Location: ../student-add.php?error=$em&$data");
		exit;
	}else if (empty($uname)) {
		$em  = "Username is required";
		header("Location: ../student-add.php?error=$em&$data");
		exit;
	}else if (!unameIsUnique($uname, $conn)) {
		$em  = "Username is taken! try another";
		header("Location: ../student-add.php?error=$em&$data");
		exit;
	}
  
   // NEW COLUMNS ADDED DUE TO SECTION TABLE 
   else if (empty($address)) {
    $em  = "Address is required";
    header("Location: ../student-add.php?error=$em&$data");
    exit;
  }
  else if (empty($email_address)) {
    $em  = "Email address is required";
    header("Location: ../student-add.php?error=$em&$data");
    exit;
  }
  else if (empty($gender)) {
    $em  = "Gender is required";
    header("Location: ../student-add.php?error=$em&$data");
    exit;
  }
  else if (empty($date_of_birth)) {
    $em  = "Date of birth is required";
    header("Location: ../student-add.php?error=$em&$data");
    exit;
  }
  else if (empty($parent_fname)) {
    $em  = "Parent First name is required";
    header("Location: ../student-add.php?error=$em&$data");
    exit;
  }
  else if (empty($parent_lname)) {
    $em  = "Parent Last name is required";
    header("Location: ../student-add.php?error=$em&$data");
    exit;
  }
  else if (empty($parent_phone_number)) {
    $em  = "Parent Phone number is required";
    header("Location: ../student-add.php?error=$em&$data");
    exit;
  }
  else if (empty($section)) {
    $em  = "Section is required";
    header("Location: ../student-add.php?error=$em&$data");
    exit;
  }
  
  
  
  
  else if (empty($pass)) {
		$em  = "Password is required";
		header("Location: ../student-add.php?error=$em&$data");
		exit;
	}else {
      // continue 39:52
        // hashing the password
        $hashedpass = password_hash($pass, PASSWORD_DEFAULT);

        $sql  = "INSERT INTO
                 tbl_students(username, password, fname, lname, grade, section, address, gender, email_address, date_of_birth, parent_fname, parent_lname, parent_phone_number)
                   VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $stmt = $conn->prepare($sql);

         // NOTE: THE ARRANGEMENT OF THE VARIABLES INSIDE THE EXECUTE 
        // ARE CORRESPONDING TO THE UPDATE QUERY IN TOP SO MAKE SURE IT HAS 
        // THE SAME PARALLEL POSITIONING
        $stmt->execute([$uname, $hashedpass, $fname, $lname, $grade, $section, $address, $gender, $email_address, $date_of_birth, $parent_fname, $parent_lname, $parent_phone_number]);
        $sm = "New student registered successfully";
        header("Location: ../student-add.php?success=$sm");
        exit;
	}
    
  }else {
  	$em = "An error occurred";
    header("Location: ../student-add.php?error=$em");
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