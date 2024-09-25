<?php  

// All student_score
function getAllScores($conn){
   $sql = "SELECT * FROM student_score";
   $stmt = $conn->prepare($sql);
   $stmt->execute();

   if ($stmt->rowCount() >= 1) {
     $students_scores = $stmt->fetchAll();
     return $students_scores;
   }else {
    return 0;
   }
}

// Get student_score by ID
function getScoreById($score_id, $conn){
    $sql = "SELECT * FROM student_score
            WHERE score_id=?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$score_id]);
 
    if ($stmt->rowCount() == 1) {
      $score = $stmt->fetch();
      return $score;
    }else {
     return 0;
    }
 }


// DELETE course
function removeScore($id, $conn){
    $sql  = "DELETE FROM student_score
            WHERE score_id=?";
    $stmt = $conn->prepare($sql);
    $re   = $stmt->execute([$id]);
    if ($re) {
      return 1;
    }else {
     return 0;
    }
 }



 // SEARCH FUNCTION TO GET DATA FROM TBL TEACHERS
 function searchScores($key, $conn){
  // modifying the variable key to get all results 
  // using LIKE operator
  // $key = "%{$key}%";
  $key = preg_replace('/(?<!\\\)([%_])/', '\\\$1',$key);



  $sql = "SELECT * FROM student_score
          WHERE score_id LIKE ? 
          OR first_name LIKE ?
          OR last_name LIKE ? 
          OR subject LIKE ?
          OR test_type LIKE ?
          OR score LIKE ?";

  $stmt = $conn->prepare($sql);
  // HANDLING COLUMN KEYS DEPENDS ON HOW MANY CONDITION ON THE SQL QUERY 
  $stmt->execute([$key, $key, $key, $key, $key, $key]);

  if($stmt->rowCount() == 1){
      $students_scores = $stmt->fetchAll();
      return $students_scores;
  }else {
      return 0;
  }


}



 ?>