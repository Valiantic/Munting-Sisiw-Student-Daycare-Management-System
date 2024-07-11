<?php


// ALWAYS REMEMBER TO THE SESSION IF-ELSE STATEMENT 
// isset($_POST['variable'])


//BLANK FIELD DETECTOR

if(isset($_POST['uname']) && 
   isset($_POST['pass']) &&
   isset($_POST['role'])) {

    $uname = $_POST['uname'];
    $pass = $_POST['pass'];
    $role = $_POST['role'];

    if (empty($uname)) {
		$em  = "Username is required";
		header("Location: ../login.php?error=$em");
		exit;
	}else if (empty($pass)) {
		$em  = "Password is required";
		header("Location: ../login.php?error=$em");
		exit;
	}else if (empty($role)) {
		$em  = "An error Occurred";
		header("Location: ../login.php?error=$em");
		exit;
	}else {
        echo "Success";
    }

}else {
    header("Location: ../login.php");
}


?>