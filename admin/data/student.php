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

// FUNCTION TO FOR UNIQUE USERNAME CHECKER

function unameIsUnique($uname, $conn, $student_id=0){
    $sql = "SELECT username, student_id FROM tbl_students
            WHERE username=?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$uname]);
 
    // To check if the teacher id is unique
    if($student_id == 0){

        if ($stmt->rowCount() >= 1) {
            return 0;
          }else {
              return 1;
          }
    }else {
        // check if the data is recorded
        if ($stmt->rowCount() >= 1) {
             $student = $stmt->fetch();
             if($student['student_id'] == $student_id){
                return 1;
             }else return 0;
          }else {
              return 1;
          }
    }

 }






?>