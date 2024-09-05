<?php

//CREATE A FUNCTION TO GET ALL THE GRADE FROM GRADES
function getAllSections($conn){
    $sql = "SELECT * FROM section"; //DOUBLECHECK THE TABLE 
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    if($stmt->rowCount() >= 1){
        $sections = $stmt->fetchAll();
        return $sections;
    }else {
        return 0;
    }


}


// FUNCTION TO GET ALL ID_GRADE FROM GRADES
function getSectionById($section_id, $conn){
    $sql = "SELECT * FROM section
            WHERE section_id=?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$section_id]);

    if($stmt->rowCount() == 1){
        $section = $stmt->fetch();
        return $section;
    }else {
        return 0;
    }


}

// FUNCTION TO REMOVE SECTION 
function removeSection($id, $conn){
    $sql = "DELETE FROM section
            WHERE section_id=?";
    $stmt = $conn->prepare($sql);
    $re = $stmt->execute([$id]);
 
    if ($re) {
      return 1;
    }else {
        return 0;
    }
 }


?>