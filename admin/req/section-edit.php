<?php 
session_start();
if (isset($_SESSION['admin_id']) && 
    isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'Admin') {
        


//BLANK FIELD DETECTOR
//NOTE: IF THE BLANK FIELD DETECTOR/VALIDATOR IS NOT WORKING CHECK THE ISSET 
// MAKE SURE THAT ALL THE ISSET IS PRESENT IN THE PREV PAGE SO THAT IT PASSES THE ARGUMENT
//NOTE: CHECK THE ISSET NAME PROPERLY!


if (isset($_POST['section']) &&
    isset($_POST['section_id'])) {
    
     // DATABASE CONNECTION
    include '../../connections.php';

    $section = $_POST['section'];
    $section_id = $_POST['section_id'];

       // VALIDATION SESSION 
    $data = 'section='.$section.'&section_id='.$section_id;

    if (empty($section)) {
        $em  = "Section is required";
        header("Location: ../section-edit.php?error=$em&$data");
        exit;
    }
    else {
        // NOTE: ALWAYS CHECK THE TABLE NAME!
        // NOTE: THE LAST VARIABLE TO BE ? HAS NO ,
        $sql = "UPDATE section SET
                section=?
                WHERE section_id=?";
        $stmt = $conn->prepare($sql);
        
        // NOTE: THE ARRANGEMENT OF THE VARIABLES INSIDE THE EXECUTE 
        // ARE CORRESPONDING TO THE UPDATE QUERY IN TOP SO MAKE SURE IT HAS 
        // THE SAME PARALLEL POSITIONING
        $stmt->execute([$section, $section_id]);
        $sm = "Successfully updated!";
        header("Location: ../section-edit.php?success=$sm&$data");
        exit;
    }
    
     // IF NO DATA INSERTED THEN USER CLICK ADD BUTTON
  }else {
    $em = "Error occurred";
    header("Location: ../section.php?error=$em");
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