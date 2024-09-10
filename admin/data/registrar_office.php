<?php


// FETCH THE SUBJECT BY ID 
function getR_usersById($r_user_id, $conn){
    $sql = "SELECT * FROM registrar_office
            WHERE r_user_id=?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$r_user_id]);
 
    if ($stmt->rowCount() == 1) {
      $teacher = $stmt->fetch();
      return $teacher;
    }else {
     return 0;
    }
 }

//CREATE A FUNCTION TO GET ALL THE DATA FROM TBL_TEACHERS
function getAllR_users($conn){
    $sql = "SELECT * FROM registrar_office";
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

// function unameIsUnique($uname, $conn, $teacher_id=0){
//     $sql = "SELECT username, teacher_id FROM tbl_teachers
//             WHERE username=?";
//     $stmt = $conn->prepare($sql);
//     $stmt->execute([$uname]);
 
//     // To check if the teacher id is unique
//     if($teacher_id == 0){

//         if ($stmt->rowCount() >= 1) {
//             return 0;
//           }else {
//               return 1;
//           }
//     }else {
//         // check if the data is recorded
//         if ($stmt->rowCount() >= 1) {
//              $teacher = $stmt->fetch();
//              if($teacher['teacher_id'] == $teacher_id){
//                 return 1;
//              }else return 0;
//           }else {
//               return 1;
//           }
//     }

//  }

//  <!-- CREATING A DELETE FUNCTION -->
 

//  function removeTeacher($id, $conn){
//     $sql = "DELETE FROM tbl_teachers
//             WHERE teacher_id=?";
//     $stmt = $conn->prepare($sql);
//     $re = $stmt->execute([$id]);
 
//     if ($re) {
//       return 1;
//     }else {
//         return 0;
//     }
//  }

//  // SEARCH FUNCTION TO GET DATA FROM TBL TEACHERS
// function searchTeachers($key, $conn){
//     // modifying the variable key to get all results 
//     // using LIKE operator
//     // $key = "%{$key}%";
//     $key = preg_replace('/(?<!\\\)([%_])/', '\\\$1',$key);



//     $sql = "SELECT * FROM tbl_teachers
//             WHERE teacher_id LIKE ? 
//             OR fname LIKE ?
//             OR lname LIKE ? 
//             OR username LIKE ?
//             OR address LIKE ?
//             OR employee_number LIKE ?
//             OR date_of_birth LIKE ?
//             OR phone_number LIKE ?
//             OR qualification LIKE ?
//             OR gender LIKE ? 
//             OR email_address LIKE ?";

//     $stmt = $conn->prepare($sql);
//     // HANDLING COLUMN KEYS DEPENDS ON HOW MANY CONDITION ON THE SQL QUERY 
//     $stmt->execute([$key, $key, $key, $key, $key, $key, $key, $key, $key, $key, $key]);

//     if($stmt->rowCount() == 1){
//         $teachers = $stmt->fetchAll();
//         return $teachers;
//     }else {
//         return 0;
//     }


// }

// ?>

