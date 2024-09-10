<?php
session_start();
if (isset($_SESSION['admin_id']) && 
    isset($_SESSION['role']) &&
    isset($_GET['r_user_id'])) {

    if ($_SESSION['role'] == 'Admin') {
    
        include "../connections.php";
        include "data/registrar_office.php";

        $id = $_GET['r_user_id'];
        if (removeRegistrar($id, $conn)) {
            $sm = "Successfully Deleted";
            header("Location: registrar-office.php?success=$sm"); // TAKE NOTE THE HEADER MAKE SURE IT'S THE RIGHT PHP FILE
            exit;
        }else{
            $em = "Unknown Error Occurred";
            header("Location: registrar-office.php?error=$em");
            exit;
        }

    }else {
        header("Location: registrar-office.php");
        exit;
      } 
    }else {
        header("Location: registrar-office.php");
        exit;
    } 


?>