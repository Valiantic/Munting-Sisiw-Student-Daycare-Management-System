<?php

//CREATE A FUNCTION TO GET ALL THE DATA FROM SUBJECTS
function getAllSubjects($conn){
    $sql = "SELECT * FROM subjects"; //DOUBLECHECK THE TABLE 
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    if($stmt->rowCount() >= 1){
        $subjects = $stmt->fetchAll();
        return $subjects;
    }else {
        return 0;
    }


}

// FETCH THE SUBJECT BY ID 
function getSubjectById($subject_id, $conn){
    $sql = "SELECT * FROM subjects
            WHERE subject_id=? ";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$subject_id]);

    if($stmt->rowCount() == 1){
        $subject = $stmt->fetch();
        return $subject;
    }else {
        return 0;
    }


}



?>