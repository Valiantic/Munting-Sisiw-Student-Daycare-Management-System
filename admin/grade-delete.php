<?php
session_start();
if (isset($_SESSION['admin_id']) && 
    isset($_SESSION['role']) &&
    isset($_GET['grade_id'])) {

    if ($_SESSION['role'] == 'Admin') {
    
        include "../connections.php";
        include "data/grade.php";

        $id = $_GET['grade_id'];
        if (removeGrade($id, $conn)) {
            $sm = "Successfully Deleted";
            header("Location: grade.php?success=$sm"); // TAKE NOTE THE HEADER MAKE SURE IT'S THE RIGHT PHP FILE
            exit;
        }else{
            $em = "Unknown Error Occurred";
            header("Location: grade.php?error=$em");
            exit;
        }

    }else {
        header("Location: grade.php");
        exit;
      } 
    }else {
        header("Location: grade.php");
        exit;
    } 


?>