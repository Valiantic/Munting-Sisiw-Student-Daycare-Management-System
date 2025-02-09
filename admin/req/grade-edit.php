<?php 
session_start();
if (isset($_SESSION['admin_id']) && 
    isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'Admin') {
        


//BLANK FIELD DETECTOR
//NOTE: IF THE BLANK FIELD DETECTOR/VALIDATOR IS NOT WORKING CHECK THE ISSET 
// MAKE SURE THAT ALL THE ISSET IS PRESENT IN THE PREV PAGE SO THAT IT PASSES THE ARGUMENT
//NOTE: CHECK THE ISSET NAME PROPERLY!


if (isset($_POST['grade_code']) &&
    isset($_POST['grade']) &&
    isset($_POST['grade_id'])) {
    
     // DATABASE CONNECTION
    include '../../connections.php';

    $grade_code = $_POST['grade_code'];
    $grade = $_POST['grade'];
    $grade_id = $_POST['grade_id'];

       // VALIDATION SESSION 
    $data = 'grade_code='.$grade_code.'&grade'.$grade.'&grade_id='.$grade_id;

    if (empty($grade_code)) {
        $em  = "Grade code is required";
        header("Location: ../grade-edit.php?error=$em&$data");
        exit;
    }
    else if (empty($grade)) {
		$em  = "Grade is required";
		header("Location: ../grade-edit.php?error=$em&$data");
		exit;
	}else {
        // NOTE: ALWAYS CHECK THE TABLE NAME!
        // NOTE: THE LAST VARIABLE TO BE ? HAS NO ,
        $sql = "UPDATE grades SET
                grade_code=?, grade=?
                WHERE grade_id=?";
        $stmt = $conn->prepare($sql);
        
        // NOTE: THE ARRANGEMENT OF THE VARIABLES INSIDE THE EXECUTE 
        // ARE CORRESPONDING TO THE UPDATE QUERY IN TOP SO MAKE SURE IT HAS 
        // THE SAME PARALLEL POSITIONING
        $stmt->execute([$grade_code, $grade, $grade_id]);
        $sm = "Successfully updated!";
        header("Location: ../grade-edit.php?success=$sm&$data");
        exit;
    }
    
     // IF NO DATA INSERTED THEN USER CLICK ADD BUTTON
  }else {
    $em = "Error occurred";
    header("Location: ../grade.php?error=$em");
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