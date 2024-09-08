<?php
session_start();
if (isset($_SESSION['admin_id']) && 
    isset($_SESSION['role']) &&
    isset($_GET['class_id'])) {

    if ($_SESSION['role'] == 'Admin') {
    
        include "../connections.php";
        include "data/class.php";

        $id = $_GET['class_id'];
        // CALL THIS FUNCTION ON DATA FOLDER CLASS
        if (removeClass($id, $conn)) {
            $sm = "Successfully Deleted";
            header("Location: class.php?success=$sm"); // TAKE NOTE THE HEADER MAKE SURE IT'S THE RIGHT PHP FILE
            exit;
        }else{
            $em = "Unknown Error Occurred";
            header("Location: class.php?error=$em");
            exit;
        }

    }else {
        header("Location: class.php");
        exit;
      } 
    }else {
        header("Location: class.php");
        exit;
    } 


?>