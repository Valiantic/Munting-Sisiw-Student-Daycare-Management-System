<?php 
session_start();
if (isset($_SESSION['admin_id']) && 
    isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'Admin') {
    	

if (
    //THE GRADE COLUMN IS NAMED GRADES THATS WHY IT WON'T WORK EARLIER
    //LESSON: ALWAYS CHECK THE NAME VALUE IF THE ERROR VALIDATOR IS NOT WORKING!!!
    isset($_POST['grade']) &&
    isset($_POST['section'])) {
    
    include '../../connections.php';
   
  
   
    $grade = $_POST['grade'];
    $section = $_POST['section'];

     

    //BLANK FIELD DETECTOR


    if (empty($grade)) {
		$em  = "Grade is required";
		header("Location: ../grade-add.php?error=$em&$data");
		exit;
	}
    else if (empty($section)) {
		$em  = "Section is required";
		header("Location: ../grade-add.php?error=$em&$data");
		exit;
	}else {
     
        // CHECK IF THERE IS AN EXISTING RECORD IN THE DATABASE
        $sql_check = "SELECT * FROM class WHERE grade=? AND section=?";
        $stmt_check = $conn->prepare($sql_check);
        $stmt_check->execute([$grade, $section]);

        // CHECKS IF THE VALUE OF THE STATEMENT CHECK IS EQUAL TO 1 OR MORE 
        // DISPLAY CLASS IS ALREADY ADDED!
        if($stmt_check->rowCount() > 0){
            // REDIRECTION IF EXISTING RECORD FOUND
            $em  = "Class is already added!";
            header("Location: ../class-add.php?error=$em");
            exit;

        }else{
        // CLASS CREATION QUERY 

        $sql  = "INSERT INTO
        class(grade, section)
          VALUES(?,?)";
        $stmt = $conn->prepare($sql);

        // NOTE: THE ARRANGEMENT OF THE VARIABLES INSIDE THE EXECUTE 
        // ARE CORRESPONDING TO THE UPDATE QUERY IN TOP SO MAKE SURE IT HAS 
        // THE SAME PARALLEL POSITIONING
        $stmt->execute([$grade, $section]);
        $sm = "New Class added";
        header("Location: ../class-add.php?success=$sm");
        exit;
        
        }

	}
    
  }else {
  	$em = "An error occurred";
    header("Location: ../class-add.php?error=$em");
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