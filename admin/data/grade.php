<?php

//CREATE A FUNCTION TO GET ALL THE GRADE FROM GRADES
function getAllGrades($conn){
    $sql = "SELECT * FROM grades"; //DOUBLECHECK THE TABLE 
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    if($stmt->rowCount() >= 1){
        $grades = $stmt->fetchAll();
        return $grades;
    }else {
        return 0;
    }


}


// FUNCTION TO GET ALL ID_GRADE FROM GRADES
function getGradeById($grade_id, $conn){
    $sql = "SELECT * FROM grades
            WHERE grade_id=?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$grade_id]);

    if($stmt->rowCount() == 1){
        $grade = $stmt->fetch();
        return $grade;
    }else {
        return 0;
    }


}


?>