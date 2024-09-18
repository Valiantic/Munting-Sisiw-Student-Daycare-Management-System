<?php

// FUNCTION FOR PASSWORD VERIFCATION IN TEACHER EDIT 
// COPY THIS LINE OF CODE AND PASTE IT ON THE IF CONDITION
// adminPasswordVerify($admin_pass, $conn, $admin_id)

function adminPasswordVerify($admin_pass, $conn, $admin_id){
    $sql = "SELECT * FROM tbl_admin
            WHERE admin_id=?"; //DOUBLECHECK THE TABLE 
    $stmt = $conn->prepare($sql);
    $stmt->execute([$admin_id]);

    if($stmt->rowCount() == 1){
        $admin = $stmt->fetch();
        $hashpass = $admin['password'];

        if(password_verify($admin_pass, $hashpass)){
            return 1;
        } else {
            return 0;
        }
    }else {
        return 0;
    }


}




?>