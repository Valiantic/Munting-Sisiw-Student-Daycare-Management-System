<?php


// FETCH THE SUBJECT BY ID 
function getTeacherById($teacher_id, $conn){
    $sql = "SELECT * FROM tbl_teachers
            WHERE teacher_id=? ";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$teacher_id]);

    if($stmt->rowCount() == 1){
        $teacher = $stmt->fetch();
        return $teacher;
    }else {
        return 0;
    }


}

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

function unameIsUnique($uname, $conn, $teacher_id=0){
    $sql = "SELECT username, teacher_id FROM tbl_teachers
            WHERE username=?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$uname]);
 
    // To check if the teacher id is unique
    if($teacher_id == 0){

        if ($stmt->rowCount() >= 1) {
            return 0;
          }else {
              return 1;
          }
    }else {
        // check if the data is recorded
        if ($stmt->rowCount() >= 1) {
             $teacher = $stmt->fetch();
             if($teacher['teacher_id'] == $teacher_id){
                return 1;
             }else return 0;
          }else {
              return 1;
          }
    }

 }

//  <!-- CREATING A DELETE FUNCTION -->
 

 function removeTeacher($id, $conn){
    $sql = "DELETE FROM tbl_teachers
            WHERE teacher_id=?";
    $stmt = $conn->prepare($sql);
    $re = $stmt->execute([$id]);
 
    if ($re) {
      return 1;
    }else {
        return 0;
    }
 }


?>

