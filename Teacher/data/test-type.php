<?php

//CREATE A FUNCTION TO GET ALL THE DATA FROM SUBJECTS
function getAllTestType($conn){
    $sql = "SELECT * FROM test_type"; //DOUBLECHECK THE TABLE 
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    if($stmt->rowCount() >= 1){
        $test_types = $stmt->fetchAll();
        return  $test_types;
    }else {
        return 0;
    }


}





?>