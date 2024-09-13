<?php
session_start();
if (isset($_SESSION['admin_id']) && 
    isset($_SESSION['role']) &&
    isset($_GET['course_id'])) {

    if ($_SESSION['role'] == 'Admin') {
    
        include "../connections.php";
        include "data/course.php";

        $id = $_GET['course_id'];
        if (removeCourse($id, $conn)) {
            $sm = "Successfully Deleted";
            header("Location: course.php?success=$sm"); // TAKE NOTE THE HEADER MAKE SURE IT'S THE RIGHT PHP FILE
            exit;
        }else{
            $em = "Unknown Error Occurred";
            header("Location: course.php?error=$em");
            exit;
        }

    }else {
        header("Location: course.php");
        exit;
      } 
    }else {
        header("Location: course.php");
        exit;
    } 


?>