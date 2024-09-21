<?php 
session_start();
if (isset($_SESSION['admin_id']) && 
    isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'Admin') {
        


//BLANK FIELD DETECTOR
//NOTE: IF THE BLANK FIELD DETECTOR/VALIDATOR IS NOT WORKING CHECK THE ISSET 
// MAKE SURE THAT ALL THE ISSET IS PRESENT IN THE PREV PAGE SO THAT IT PASSES THE ARGUMENT
//NOTE: CHECK THE ISSET NAME PROPERLY!


if (isset($_POST['course_name']) &&
    isset($_POST['course_code']) &&
    isset($_POST['grade']) &&
    isset($_POST['course_id'])) {
    
     // DATABASE CONNECTION
    include '../../connections.php';
 
    $course_name = $_POST['course_name'];
    $course_code = $_POST['course_code'];
    $grade = $_POST['grade'];
    $course_id = $_POST['course_id'];

       // VALIDATION SESSION 
    // $data = 'course_name='.$course_name.'&course_code='.$course_code.'&grade='.$grade.'&course_id='.$course_id;
    $data = 'course_id='.$course_id;

    if (empty($course_name)) {
        $em  = "Couse name is required";
        header("Location: ../course-edit.php?error=$em&$data");
        exit;
    }else if (empty($course_code)) {
		$em  = "Course code is required";
		header("Location: ../course-edit.php?error=$em&$data");
		exit;
	}else if (empty($grade)) {
		$em  = "Grade is required";
		header("Location: ../course-edit.php?error=$em&$data");
		exit;
    }else if (empty($course_id)) {
        $em  = "Course id is required";
        header("Location: ../course-edit.php?error=$em&$data");
        exit;
    }
    else {
            // CHECK IF THE COURSE IS ALREADY EXISTED
            $sql_check = "SELECT * FROM subjects WHERE grade=? AND subject_code=?";
            $stmt_check = $conn->prepare($sql_check);
            $stmt_check->execute([$grade, $course_code]);

       if($stmt_check->rowCount() > 0) {
            $courses = $stmt_check->fetch();

            if($courses['course_id'] == $course_id) {
                $sql = "UPDATE subjects SET subjects=?, subject_code=?, grade=?
                WHERE course_id=?";
                $stmt = $conn->prepare($sql);
                $stmt->execute([$course_name, $course_code, $grade, $course_id]);
                $sm = "Course updated successfully";
                // NOTE: FIXED ERROR! 
                // SM SO SUCCESS MESSAGE AND EM FOR ERROR MESSAGE
                header("Location: ../course-edit.php?success=$sm&$data");
                exit;
            }
            else{
                $em  = "The course already exists";
                header("Location: ../course-edit.php?error=$em&$data");
                exit;
            }
    
       }
       else {

        // NOTE: ALWAYS CHECK THE TABLE NAME!
        // NOTE: THE LAST VARIABLE TO BE ? HAS NO ,
        $sql = "UPDATE subjects SET
                subjects=?, subject_code=?, grade=?
                WHERE subject_id=?";
        $stmt = $conn->prepare($sql);
        
        // NOTE: THE ARRANGEMENT OF THE VARIABLES INSIDE THE EXECUTE 
        // ARE CORRESPONDING TO THE UPDATE QUERY IN TOP SO MAKE SURE IT HAS 
        // THE SAME PARALLEL POSITIONING
        $stmt->execute([$course_name, $course_code, $grade, $course_id]);
        $sm = "Course updated successfully";
        header("Location: ../course-edit.php?success=$sm&$data");
        exit;




       }    
    }
    
     // IF NO DATA INSERTED THEN USER CLICK ADD BUTTON
  }else {
    $em = "Error occurred";
    header("Location: ../course.php?error=$em&$data");
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