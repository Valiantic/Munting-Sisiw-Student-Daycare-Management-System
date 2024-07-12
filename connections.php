<?php

// // database connection indicator
// $connections = mysqli_connect("localhost","root","","db_signup");
//     if(mysqli_connect_errno()) {
//         echo "Failed to connect to MySQL " .mysqli_connect_error();
//     }
//     // indicate that the database is connected
//     // else {
//     //     echo "connected"; indicate that the database is connected
//     // }


?>

<?php  

$sName = "localhost";
$uName = "root";
$pass  = "";
$db_name = "db_daycare";

try {
	$conn = new PDO("mysql:host=$sName;dbname=$db_name", $uName, $pass);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOExeption $e){
	echo "Connection failed: ". $e->getMessage();
	exit;
}