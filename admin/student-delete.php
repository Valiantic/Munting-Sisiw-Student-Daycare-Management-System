<?php
session_start();
if (isset($_SESSION['admin_id']) && 
    isset($_SESSION['role']) &&
    isset($_GET['student_id'])) {

    if ($_SESSION['role'] == 'Admin') {
    
        include "../connections.php";
        include "data/student.php";

        $id = $_GET['student_id'];
        if (removeStudent($id, $conn)) {
            $sm = "Successfully Deleted";
            header("Location: students.php?success=$sm"); // TAKE NOTE THE HEADER MAKE SURE IT'S THE RIGHT PHP FILE
            exit;
        }else{
            $em = "Unknown Error Occurred";
            header("Location: students.php?error=$em");
            exit;
        }

    }else {
        header("Location: students.php");
        exit;
      } 
    }else {
        header("Location: students.php");
        exit;
    } 


?>