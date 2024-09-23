<?php 
session_start();
if (isset($_SESSION['teacher_id']) && 
    isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'Teacher') {
    	

if (
    //LESSON: ALWAYS CHECK THE NAME VALUE IF THE ERROR VALIDATOR IS NOT WORKING!!!
    //LESSON: ALWATS CHECK THE ISSET POST IF IT'S ALL COMPLETE
    //LESSON: CHECK THE POST VALUE NAME!!!
    
    isset($_POST['first_name']) &&
    isset($_POST['last_name']) &&
    isset($_POST['subjects']) &&
    isset($_POST['test_type']) &&
    isset($_POST['score'])) {
    
    include '../../connections.php';
   
    include "../data/test-type.php";

  
  
 
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $subjects = $_POST['subjects'];
    $test_type = $_POST['test_type'];
    $score = $_POST['score'];

     
   

    //BLANK FIELD DETECTOR


    if (empty($first_name)) {
        $em  = "First name is required";
		header("Location: ../student-grade-add.php?error=$em&$data");
		exit;
	}else if (empty($last_name)) {
		$em  = "Last name is required";
		header("Location: ../student-grade-add.php?error=$em&$data");
		exit;
	}else if (empty($subjects)) {
		$em  = "Subjects is required";
		header("Location: ../student-grade-add.php?error=$em&$data");
		exit;
	}else if (empty($test_type)) {
		$em  = "Test type is required";
		header("Location: ../student-grade-add.php?error=$em&$data");
		exit;
	}else if (empty($score)) {
		$em  = "Score is required";
		header("Location: ../student-grade-add.php?error=$em&$data");
		exit;
	}else {
        // CHECK IF THE COURSE IS ALREADY EXISTED
        $sql_check = "SELECT * FROM student_score WHERE subject=? AND test_type=?";
        $stmt_check = $conn->prepare($sql_check);
        $stmt_check->execute([$subjects, $test_type]);
        if ($stmt_check->rowCount() > 0) {
            $em  = "The Student is already graded!";
            header("Location: ../student-grade-add.php?error=$em&$data");
            exit;
        } 
        else {
            $sql  = "INSERT INTO student_score(first_name, last_name, subject, test_type, score)
             VALUES(?,?,?,?,?)";
            $stmt = $conn->prepare($sql);

            // NOTE: THE ARRANGEMENT OF THE VARIABLES INSIDE THE EXECUTE 
            // ARE CORRESPONDING TO THE UPDATE QUERY IN TOP SO MAKE SURE IT HAS 
            // THE SAME PARALLEL POSITIONING
            $stmt->execute([$first_name, $last_name, $subjects, $test_type, $score]);
            $sm = "New Student has been graded!";
            header("Location: ../student-grade-add.php?success=$sm");
            exit;
        }
	    }
    
  }else {
  	$em = "An error occurred";
    header("Location: ../student-grade-add.php?error=$em");
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