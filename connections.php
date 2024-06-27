<?php

// database connection indicator
$connections = mysqli_connect("localhost","root","","db_signup");
    if(mysqli_connect_errno()) {
        echo "Failed to connect to MySQL " .mysqli_connect_error();
    }
    // else {
    //     echo "connected"; indicate that the database is connected
    // }
   


?>