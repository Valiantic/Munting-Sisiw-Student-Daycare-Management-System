<?php 
session_start();
if (isset($_SESSION['teacher_id']) && 
    isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'Teacher') {
        


//BLANK FIELD DETECTOR
//NOTE: IF THE BLANK FIELD DETECTOR/VALIDATOR IS NOT WORKING CHECK THE ISSET 
// MAKE SURE THAT ALL THE ISSET IS PRESENT IN THE PREV PAGE SO THAT IT PASSES THE ARGUMENT
//NOTE: CHECK THE ISSET NAME PROPERLY!


if (isset($_POST['first_name']) &&
    isset($_POST['last_name']) &&
    isset($_POST['subject']) &&
    isset($_POST['test_type']) &&
    isset($_POST['score']) &&
    isset($_POST['score_id'])) {
    
     // DATABASE CONNECTION
    include '../../connections.php';
 
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $subject = $_POST['subject'];
    $test_type = $_POST['test_type'];
    $score = $_POST['score'];
    $score_id = $_POST['score_id'];
   

    // NOTE: This is to display error message by assigning id of a variable 
    $data = 'score_id='.$score_id;
       

    if (empty($first_name)) {
        $em  = "First name is required";
        header("Location: ../student-grade-edit.php?error=$em&$data");
        exit;
    }else if (empty($last_name)) {
		$em  = "Last name is required";
		header("Location: ../student-grade-edit.php?error=$em&$data");
		exit;
	}else if (empty($subject)) {
		$em  = "Subject is required";
		header("Location: ../student-grade-edit.php?error=$em&$data");
		exit;
    }else if (empty($test_type)) {
        $em  = "Test type is required";
        header("Location: ../student-grade-edit.php?error=$em&$data");
        exit;
    }
    else if (empty($score_id)) {
        $em  = "Score id is required";
        header("Location: ../student-grade-edit.php?error=$em&$data");
        exit;
    }
    else if (empty($score)) {
        $em  = "Score is required";
        header("Location: ../student-grade-edit.php?error=$em&$data");
        exit;
    }
    else {
            // CHECK IF THE COURSE IS ALREADY EXISTED
            $sql_check = "SELECT * FROM student_score WHERE first_name=? AND last_name=? AND test_type=?";
            $stmt_check = $conn->prepare($sql_check);
            $stmt_check->execute([$first_name, $last_name, $test_type]);

       if($stmt_check->rowCount() > 0) {
            $student_scores = $stmt_check->fetch();

            if($student_scores['score_id'] == $score_id) {
                $sql = "UPDATE student_score SET first_name=?, last_name=?, subject=?, test_type=?, score=?
                WHERE score_id=?";
                $stmt = $conn->prepare($sql);
                $stmt->execute([$first_name, $last_name, $subject, $test_type, $score, $score_id]);
                $sm = "Student Grade updated successfully";
                // NOTE: FIXED ERROR! 
                // SM SO SUCCESS MESSAGE AND EM FOR ERROR MESSAGE
                header("Location: ../student-grade-edit.php?success=$sm&$data");
                exit;
            }
            else{
                $em  = "You already Graded That Student!";
                header("Location: ../student-grade-edit.php?error=$em&$data");
                exit;
            }
    
       }
       else {

        // NOTE: ALWAYS CHECK THE TABLE NAME!
        // NOTE: THE LAST VARIABLE TO BE ? HAS NO ,
        $sql = "UPDATE student_score SET
                first_name=?, last_name=?, subject=?, test_type=?, score=?
                WHERE score_id=?";
        $stmt = $conn->prepare($sql);
        
        // NOTE: THE ARRANGEMENT OF THE VARIABLES INSIDE THE EXECUTE 
        // ARE CORRESPONDING TO THE UPDATE QUERY IN TOP SO MAKE SURE IT HAS 
        // THE SAME PARALLEL POSITIONING
        $stmt->execute([$first_name, $last_name, $subject, $test_type, $score, $score_id]);
        $sm = "Student Graded Successfully";
        header("Location: ../student-grade-edit.php?success=$sm&$data");
        exit;




       }    
    }
    
     // IF NO DATA INSERTED THEN USER CLICK ADD BUTTON
  }else {
    $em = "Error occurred";
    header("Location: ../student-grade.php?error=$em&$data");
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