<?php

//CREATE A FUNCTION TO GET ALL THE DATA FROM TBL_TEACHERS
function getAllTeachers($conn){
    $sql = "SELECT * FROM tbl_teachers";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    if($stmt->rowCount() >= 1){
        $teachers = $stmt->fetchAll();
        return $teachers;
    }else {
        return 0;
    }


}

// FUNCTION TO FOR UNIQUE USERNAME CHECKER

function unameIsUnique($uname, $conn){
    $sql = "SELECT username FROM tbl_teachers
            WHERE username=?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$uname]);
 
    if ($stmt->rowCount() >= 1) {
      return 0;
    }else {
        return 1;
    }
 }



?>