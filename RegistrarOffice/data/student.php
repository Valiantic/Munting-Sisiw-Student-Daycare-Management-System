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


// FETCH THE STUDENT BY ID 
function getStudentById($student_id, $conn){
    $sql = "SELECT * FROM tbl_students
            WHERE student_id=? ";
    $stmt = $conn->prepare($sql);
    // ALWAYS CHECK THE EXECUTABLE VARIABLE THIS REDIRECT YOU TO THE STUDENT-EDIT.PHP
    $stmt->execute([$student_id]);

    if($stmt->rowCount() == 1){
        $student = $stmt->fetch();
        return $student;
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


 //  <!-- CREATING A DELETE FUNCTION TO DELETE A STUDENT RECORD -->
 

 function removeStudent($id, $conn){
    $sql = "DELETE FROM tbl_students
            WHERE student_id=?";
    $stmt = $conn->prepare($sql);
    $re = $stmt->execute([$id]);
 
    if ($re) {
      return 1;
    }else {
        return 0;
    }
 }

 // SEARCH FUNCTION TO GET DATA FROM TBL STUDENTS
function searchStudents($key, $conn){
    // modifying the variable key to get all results 
    // using LIKE operator
    // $key = "%{$key}%";
    $key = preg_replace('/(?<!\\\)([%_])/', '\\\$1',$key);

    $sql = "SELECT * FROM tbl_students
            WHERE student_id LIKE ? 
            OR fname LIKE ?
            OR address LIKE ?
            OR email_address LIKE ?
            OR parent_fname LIKE ?
            OR parent_lname LIKE ?
            OR parent_phone_number LIKE ?
            OR lname LIKE ? 
            OR username LIKE ?";
    $stmt = $conn->prepare($sql);
    // HANDLING COLUMN KEYS
    $stmt->execute([$key, $key, $key, $key, $key, $key, $key, $key, $key]);

    if($stmt->rowCount() == 1){
        $students = $stmt->fetchAll();
        return $students;
    }else {
        return 0;
    }


}






?>