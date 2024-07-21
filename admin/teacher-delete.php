<?php
session_start();
if (isset($_SESSION['admin_id']) && 
    isset($_SESSION['role']) &&
    isset($_GET['teacher_id'])) {

    if ($_SESSION['role'] == 'Admin') {
    
        include "../connections.php";
        include "data/teacher.php";

        $id = $_GET['teacher_id'];

    }else {
        header("Location: teachers.php");
        exit;
      } 
    }else {
        header("Location: teachers.php");
        exit;
    } 


?>