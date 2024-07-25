<?php

// FUNCTION FOR PASSWORD VERIFCATION IN TEACHER EDIT 
function adminPasswordVerify($admin_pass, $conn, $admin_id){
    $sql = "SELECT * FROM tbl_admin
            WHERE admin_id=?"; //DOUBLECHECK THE TABLE 
    $stmt = $conn->prepare($sql);
    $stmt->execute([$admin_id]);

    if($stmt->rowCount() == 1){
        $admin = $stmt->fetch();
        $pass = $admin['admin_pass'];
        if(password_verify($admin_pass, $pass)){
            return 1;
        } else {
            return 0;
        }
    }else {
        return 0;
    }


}




?>