<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="shortcut icon" href="./images/logo.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
  </head>



<!-- OWN CSS IS HERE! -->

<style>
    .body-login{
        margin: 0;
        padding: 0;
        background-image: url(./images/bg2.jpg);
        background-position: center center; 
         background-repeat: no-repeat; 
        background-size: cover;
        background-attachment: fixed; 
        /* REMEMBER THIS FOR BACKGROUND IMAGE TO BE FULL SIZE AND RESPONSIVE! */
        width: 100%; 
        height: auto; 
    }
    .black-fill {
        /* FOR BLACK AESTHETIC BACKGROUND ADJUST THE LAST DIGIT FOR BRIGHTNESS*/
        background: rgba(0, 0, 0, 0.4);
        min-height: 100vh;
    }
    #homeNav {
        /* TO MAKE THE NAVBAR TRANSPARENT */
        /* background: rgba(255,255,255, 0.5) !important; */
    }
    .login {
	max-width: 500px;
	width: 90%;
	background: rgba(255,255,255, 0.7);
	padding: 10px;
	border-radius: 10px;
    }
    .login h3{
	text-align: center;
	font-size: 50px;
    }

</style>

<body class="body-login">

<div class="black-fill"> </br>
    <div class="d-flex justify-content-center
align-items-center flex-column">

    <form class="login">
    <div class="text-center">
        <img src="./images/logo.png" width="100">
    </div>

    <h3>LOGIN</h3>
  <div class="mb-3">
    <label class="form-label">Username</label>
    <input type="text" class="form-control">
  </div>
  <div class="mb-3">
    <label class="form-label">Password</label>
    <input type="password" class="form-control">
  </div>
  <div class="mb-3">
    <label class="form-label">Login As</label>
    <select class="form-control">
        <option value="1">Admin</option>
        <option value="2">Student</option>
        <option value="3">Teacher</option>
    </select> 
  </div>
    <button type="submit" class="btn btn-primary">Login</button>
    <a href="index.php" class="text-decoration-none">Home</a>
</form>
</br> </br>


      
<div class="text-center text-light">
    Copyright &copy; 2024 Munting Sisiw. All rights reserved.
</div>

    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>