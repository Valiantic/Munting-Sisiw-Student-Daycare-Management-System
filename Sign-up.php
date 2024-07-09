<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign-Up</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="shortcut icon" href="./images/cvsulogo.png" type="image/x-icon">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
</head>
<body>

<!-- OWN CSS IS HERE! -->

<style>
    body{
    margin: 0;
    padding: 0;
    background-image: url(./images/bg.jpg);
    background-position: center center; 
     background-repeat: no-repeat; 
    background-size: cover;
    width: 100%; 
    height: auto; 
}

.error {
    color: red;
    font-family: "Libre Baskerville", serif;
    font-weight: 400;
    font-style: normal;
}
.slidetitle{

    margin-left: 10%;
}
.titlecard {
    color: white;
    font-size: 1.9rem;
    font-family: "Libre Baskerville", serif;
    font-weight: 400;
    font-style: normal;
}
.subtitle {
    margin-top: 35%;
    color: white;
    font-size: 1.9rem;
    font-family: "Libre Baskerville", serif;
    font-weight: 400;
    font-style: normal;
}

.signup_container {
    float: right;
    background: white;
    height: 75vh;
    width: 20vw;
    margin-top: 3%;
    margin-right: 5%;
    border-radius: 5%;
    padding: 1%;
    padding: 2%;
}

.title{
    text-align: center;
    font-size: 1.5vw;
    color: #252525;
    font-family: "Libre Baskerville", serif;
    font-weight: 400;
    font-style: normal;
}
input{
    font-family: "Libre Baskerville", serif;
    font-weight: 400;
    font-style: normal;
    width: 100%;
    background-color: beige;
    border-radius: 3px;
}
label{
    font-family: "Libre Baskerville", serif;
    font-weight: 400;
    font-style: normal;
}
img {
    height: 4.4vw;
    width: 4.9vw;
}


.divemail {
    margin-top: 5%;
    margin-bottom: 1%;
    font-family: "Righteous", sans-serif;
    font-weight: 400;
    font-style: normal;
    color: #252525;
    width: 100%;
}
.labelemail{
    width: 100%;
}


.divusern {
    margin-top: 5%;
    margin-bottom: 1%;
    font-family: "Righteous", sans-serif;
    font-weight: 400;
    font-style: normal;
    color: #252525;
}
.divpass {
    margin-top: 5%;
    margin-bottom: 1%;
    font-family: "Righteous", sans-serif;
    font-weight: 400;
    font-style: normal;
    color: #252525;
}

/* .divsub {
    margin-top: 7%;
    justify-content: center;
    align-items: center;
    display: flex;
    width: 100%;
} */

.subbtn {
    margin-top: 7%;
    justify-content: center;
    align-items: center;
    display: flex;
    width: 100%;
    --color: #00A97F;
    padding: 0.8em 1.7em;
    background-color: transparent;
    border-radius: .3em;
    position: relative;
    overflow: hidden;
    cursor: pointer;
    transition: .5s;
    font-weight: 400;
    font-size: 17px;
    border: 1px solid;
    font-family: inherit;
    text-transform: uppercase;
    color: var(--color);
    z-index: 1;
   }
   
 
</style>


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

<!-- signup field container -->

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

// database connector
include("connections.php");


if ($email && $username && $password) {
  //  adding a user to the database 
   $query = mysqli_query($connections, "INSERT INTO tbl_users(Email,Username,Password) VALUES('$email','$username','$password')");

  // indicator that a new account is inserted using js 
  echo "<script language='javascript'>alert('New Record has been inserted!')</script>";
  echo "<script>window.location.href='index.php';</script>";
  }

?>

<div class="slidetitle">
    <h1 class="titlecard">Cavite State University</h1>
    <p class="subtitle">"Truth, Excellence and Service"</p>
</div>

</body>
</html>