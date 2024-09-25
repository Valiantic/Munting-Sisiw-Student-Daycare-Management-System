<?php
session_start();
if (isset($_SESSION['teacher_id']) && 
    isset($_SESSION['role']) &&
    isset($_GET['score_id'])) {

    if ($_SESSION['role'] == 'Teacher') {
    
        include "../connections.php";
        include "data/student-score.php";

        $id = $_GET['score_id'];
        if (removeScore($id, $conn)) {
            $sm = "Successfully Deleted";
            header("Location: student-grade.php?success=$sm"); // TAKE NOTE THE HEADER MAKE SURE IT'S THE RIGHT PHP FILE
            exit;
        }else{
            $em = "Unknown Error Occurred";
            header("Location: student-grade.php?error=$em");
            exit;
        }

    }else {
        header("Location: student-grade.php");
        exit;
      } 
    }else {
        header("Location: student-grade.php");
        exit;
    } 


?>