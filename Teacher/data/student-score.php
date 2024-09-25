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