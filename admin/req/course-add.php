<?php 
session_start();
if (isset($_SESSION['admin_id']) && 
    isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'Admin') {
    	

if (
    //LESSON: ALWAYS CHECK THE NAME VALUE IF THE ERROR VALIDATOR IS NOT WORKING!!!
    //LESSON: ALWATS CHECK THE ISSET POST IF IT'S ALL COMPLETE
    //LESSON: CHECK THE POST VALUE NAME!!!
    
    isset($_POST['course_name']) &&
    isset($_POST['course_code']) &&
    isset($_POST['grade'])) {
    
    include '../../connections.php';
    include "../data/course.php";

  
  
 
    $course_name = $_POST['course_name'];
    $course_code = $_POST['course_code'];
    $grade = $_POST['grade'];

     
    $data = 'course_name='.$course_name.'&course_code='.$course_code.'&grade='.$grade;

    //BLANK FIELD DETECTOR


    if (empty($course_name)) {
		$em  = "Course name is required";
		header("Location: ../course-add.php?error=$em&$data");
		exit;
	}else if (empty($course_code)) {
		$em  = "Course code is required";
		header("Location: ../course-add.php?error=$em&$data");
		exit;
	}else if (empty($grade)) {
		$em  = "Grade is required";
		header("Location: ../course-add.php?error=$em&$data");
		exit;
	}else {
        // CHECK IF THE COURSE IS ALREADY EXISTED
        $sql_check = "SELECT * FROM courses WHERE grade=? AND course_code=?";
        $stmt_check = $conn->prepare($sql_check);
        $stmt_check->execute([$grade, $course_code]);
        if ($stmt_check->rowCount() > 0) {
            $em  = "The Course already exists!";
            header("Location: ../course-add.php?error=$em&$data");
            exit;
        } 
        else {
            $sql  = "INSERT INTO courses(course_name, course_code, grade)
             VALUES(?,?,?)";
            $stmt = $conn->prepare($sql);

            // NOTE: THE ARRANGEMENT OF THE VARIABLES INSIDE THE EXECUTE 
            // ARE CORRESPONDING TO THE UPDATE QUERY IN TOP SO MAKE SURE IT HAS 
            // THE SAME PARALLEL POSITIONING
            $stmt->execute([$course_name, $course_code, $grade]);
            $sm = "New Course added";
            header("Location: ../course-add.php?success=$sm");
            exit;
        }
	    }
    
  }else {
  	$em = "An error occurred";
    header("Location: ../course-add.php?error=$em");
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