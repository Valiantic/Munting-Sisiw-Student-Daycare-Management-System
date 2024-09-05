<?php 
session_start();
if (isset($_SESSION['admin_id']) && 
    isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'Admin') {
    	

if (
    //THE GRADE COLUMN IS NAMED GRADES THATS WHY IT WON'T WORK EARLIER
    //LESSON: ALWAYS CHECK THE NAME VALUE IF THE ERROR VALIDATOR IS NOT WORKING!!!
    //LESSON: CHECK THE POST VALUE NAME!!!
    
    isset($_POST['section'])) {
    
    include '../../connections.php';
    include "../data/section.php";
  
 
    $section = $_POST['section'];

     
    $data = 'section='.$section;

    //BLANK FIELD DETECTOR


    if (empty($section)) {
		$em  = "Section is required";
		header("Location: ../section-add.php?error=$em&$data");
		exit;
	}else {
     
        // hashing the password
        $pass = password_hash($pass, PASSWORD_DEFAULT);

        $sql  = "INSERT INTO
                 grades(grade_code, grade)
                   VALUES(?,?)";
        $stmt = $conn->prepare($sql);

         // NOTE: THE ARRANGEMENT OF THE VARIABLES INSIDE THE EXECUTE 
        // ARE CORRESPONDING TO THE UPDATE QUERY IN TOP SO MAKE SURE IT HAS 
        // THE SAME PARALLEL POSITIONING
        $stmt->execute([$grade_code, $grade]);
        $sm = "New Grade added";
        header("Location: ../grade-add.php?success=$sm");
        exit;
	}
    
  }else {
  	$em = "An error occurred";
    header("Location: ../section-add.php?error=$em");
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