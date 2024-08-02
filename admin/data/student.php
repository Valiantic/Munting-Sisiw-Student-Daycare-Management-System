<?php

//CREATE A FUNCTION TO GET ALL THE DATA FROM TBL_STUDENTS
function getAllStudents($conn){
    $sql = "SELECT * FROM tbl_students";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    if($stmt->rowCount() >= 1){
        $students = $stmt->fetchAll();
        return $students;
    }else {
        return 0;
    }


}




?>