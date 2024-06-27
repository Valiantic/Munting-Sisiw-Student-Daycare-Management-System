<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>
    <link rel="stylesheet" href="style.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
</head>
<body>

<!-- <style>
  .error {
    color: red;
  }
</style> -->

<?php


$email = $username = $password = "";
$emailErr = $usernameErr = $passwordErr = "";

if($_SERVER["REQUEST_METHOD"] == "POST") {

  // Blank field detector
  if(empty ($_POST["email"])){
    $emailErr = "Email is Required!";
  } else {
    $email = $_POST["email"];
  }

  if(empty ($_POST["username"])){
    $usernameErr = "Username is Required!";
  } else {
    $username = $_POST["username"];
  }

  if(empty ($_POST["password"])){
    $passwordErr = "Password is Required!";
  } else {
    $password = $_POST["password"];
  }
}

?>

<div class="signup_container">
    <p class="title">Become a part of our Learning Education!<img src="./images/cvsulogo.png"></p>

<form class="inputing" method="POST" action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

<!-- input field -->

<div class="divemail">
    <div class="labelemail"><label class="usern">Email</label></div>
<input class="input_email" type="text" name="email" value="<?php echo $email; ?>"> <br>
<span class="error"><?php echo $emailErr; ?></span> <br>
</div>

<div class="divusern">
<label class="usern">Username</label>
<input class="input_usern" type="text" name="username" value="<?php echo $username; ?>"> <br>
<span class="error"><?php echo $usernameErr; ?></span> <br>
</div>

<div class="divpass">
<label class="usern">Password</label>
<input class="input_pass" type="password" name="password" value="<?php echo $password; ?>"> <br>
<span class="error"><?php echo $passwordErr; ?></span> <br>
</div>

<div class="divsub">
<input class="subbtn" type="submit" value="Sign up">
</div>

</form>

</div>

<?php

include("connections.php");


if ($email && $username && $password) {
  //  adding a user to the database 
   $query = mysqli_query($connections, "INSERT INTO tbl_users(Email,Username,Password) VALUES('$email','$username','$password')");

  // indicator that a new account is inserted using js 
  echo "<script language='javascript'>alert('New Record has been inserted!')</script>";
  echo "<script>window.location.href='index.php';</script>";
  }

?>

</body>
</html>