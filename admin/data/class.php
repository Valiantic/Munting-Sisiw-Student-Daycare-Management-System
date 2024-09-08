<?php

//CREATE A FUNCTION TO GET ALL THE CLASSES FROM CLASS
function getAllClasses($conn){
    $sql = "SELECT * FROM class"; //DOUBLECHECK THE TABLE 
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    if($stmt->rowCount() >= 1){
        $classes = $stmt->fetchAll();
        return $classes;
    }else {
        return 0;
    }


}


// FUNCTION TO GET ALL ID_CLASS FROM CLASS
function getClassById($class_id, $conn){
    $sql = "SELECT * FROM class
            WHERE class_id=?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$class_id]);

    if($stmt->rowCount() == 1){
        $class = $stmt->fetch();
        return $class;
    }else {
        return 0;
    }


}

// FUNCTION TO DELETE CLASS
function removeClass($id, $conn){
    $sql = "DELETE FROM class
            WHERE class_id=?";
    $stmt = $conn->prepare($sql);
    $re = $stmt->execute([$id]);
 
    if ($re) {
      return 1;
    }else {
        return 0;
    }
 }


?>