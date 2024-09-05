<?php
session_start();
if (isset($_SESSION['admin_id']) && 
    isset($_SESSION['role']) &&
    isset($_GET['section_id'])) {

    if ($_SESSION['role'] == 'Admin') {
    
        include "../connections.php";
        include "data/section.php";

        $id = $_GET['section_id'];
        if (removeSection($id, $conn)) {
            $sm = "Successfully Deleted";
            header("Location: section.php?success=$sm"); // TAKE NOTE THE HEADER MAKE SURE IT'S THE RIGHT PHP FILE
            exit;
        }else{
            $em = "Unknown Error Occurred";
            header("Location: section.php?error=$em");
            exit;
        }

    }else {
        header("Location: section.php");
        exit;
      } 
    }else {
        header("Location: section.php");
        exit;
    } 


?>