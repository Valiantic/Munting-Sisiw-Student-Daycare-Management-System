<?php


// ALWAYS REMEMBER TO THE SESSION IF-ELSE STATEMENT 
// isset($_POST['variable'])


//BLANK FIELD DETECTOR

if(isset($_POST['uname']) && 
   isset($_POST['pass']) &&
   isset($_POST['role'])) {


	include "../connections.php";

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
       
		if($role == '1'){
			$sql = "SELECT * FROM tbl_admin 
					WHERE username = ?";
			$role = "Admin";
		}
		else if($role == '2'){
			$sql = "SELECT * FROM tbl_teachers
					WHERE username = ?";
			$role = "Teacher";
		}else {
			$sql = "SELECT * FROM tbl_students
					WHERE username = ?";
			$role = "Student";
		}
			$stmt = $conn->prepare($sql);
			$stmt->execute([$uname]);

			if($stmt->rowCount() == 1){
				$user = $stmt->fetch();
				// continue 19:52
			}else {
				$em  = "Incorrect Username or Password";
				header("Location: ../login.php?error=$em");
				exit;
			}

    }

}else {
    header("Location: ../login.php");
	exit;
}


?>