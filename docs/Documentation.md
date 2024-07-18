STUDENT MANAGEMENT CREATION DOCUMENTATION

FEATURES TO ADD 
:FORGOT PASSWORD

>FIRST CHAPTER 
1. get boostrap css links and js links
2. setup background image
3. get navbar code to bootstrap
4. customize navbar
5. add section 
6. add style to section fonts using google fonts
7. add another section below just copy paste its
8. add bootstrap card
9. style bootstrap card and add navigation to navbar
10. add contacts card and style it 
11. add login page

>SECOND CHAPTER
1. add bootstrap alert
2. created req folder and login.php for blank field detector
3. add session on /req/login.php (MAKE SURE TO CHECK ALL INPUTS ARE ADDED!)
4. add error handling on /req/login.php
5. create login verification on /req/login.php
6. create an admin log pass code on login.php

>NOTE: the reason behind this is because the password_hash that will be saved to myphpmyadmin will be 
overwrited by this $pass code value once you login to login.php so insert this on login.php
<?php
        $pass = 123;
        $pass = password_hash($pass, PASSWORD_DEFAULT);
        echo $pass;
?>

7. insert admin data on phpmyadmin database
8. copy all the code from index.php and create and paste the code on home.php
9. add session on home.php
10. create a div in home.php and create a echo to show what role is the user
11. create logout.php and add session_unset and destroy

>THIRD CHAPTER
1. create admin folder and within it index.php
2. copy the code from home.php and delete it paste the copy code to admin/index.php
3. change directory on req/login.php
4. in admin/index.php copy paste bootstrap navbar and add list items as well change login to logout
5. create inc folder and within it a navbar.php
6. copy paste the code from admin/index.php to navbar.php this is to implement the DRY technique
7. in index.php create include and write the navbar

<?php

include "inc/navbar.php";

?>

8. remove the active on daskboard in navbar.php
9. paste this on admin/index.php

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

10. go to navbar.php and add id="navLinks"

<ul class="navbar-nav me-auto mb-2 mb-lg-0" id="navLinks">

11. create a script tag below in admin/index.php
12. add this inside the script tag 

<script>

    $(document).ready(function(){
        $("#navLinks li:nth-child(1) a").addClass('active');
    });

</script>

13. add font awesome link in admin/index.php

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

14. create div class container 

<div class="container mt-5">

    <div class="container text-center">
        <div class="row row-cols-5">
            <a href="" class="col btn btn-dark m-2 py-3">
            <i class="fa fa-user-circle fs-1" aria-hidden="true"></i>
            <br>
            Teachers
            </a>
        </div>
    </div>

15. using the a tag duplicate it and style it by changing the class

<a href="" class="col btn btn-dark m-2 py-3">
            <i class="fa fa-user-circle fs-1" aria-hidden="true"></i>
            <br>
            Teachers
</a>

16. refer to navbar.php on how many a tag you need to create
17. the a tag for settings and logout style it make the col-5 to be responsive 
18. btn-primary for settings and btn-warning for logout
19. create a teachers.php file within admin folder and edit the href of teacher to both nav and a button tag
20. copy the code of admin index to admin teachers.php
21. delete all the div within teachers.php
22. put href on logo inside the navbar.php
23. also in teachers.php make sure to update the jquery active hover on navbar 

<script>

    $(document).ready(function(){
        // change the nth-child value depending on the page number 
        $("#navLinks li:nth-child(2) a").addClass('active');
    });

</script>

24. in teachers.php create a div and add a tag teachers button

<a href="" class="btn btn-primary">
    Add New Teacher
</a>

25. in teachers.php below add new teachers insert this bootstrap table 

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Handle</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td colspan="2">Larry the Bird</td>
      <td>@twitter</td>
    </tr>
  </tbody>
</table>

26. in teachers.php customize the table and add an a tag button for edit and delete
27. create a folder data
28. inside the folder data create another teachers.php file 
29. create a function to fetch all data from the tbl_teachers.

<?php

//CREATE A FUNCTION TO GET ALL THE DATA FROM TBL_TEACHERS
function getAllTeacher($conn){
    $sql = "SELECT * FROM tbl_teachers";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    if($stmt->rowCount() >= 1){
        $teachers = $stmt->fetchAll();
        return $teachers;
    }else {
        return 0;
    }


}

?> 
30. create an include inside if session in admin.teachers.php for data/teachers.php and connections.php
 if ($_SESSION['role'] == 'Admin') {
        include "../connections.php";
        include "data/teachers.php";
        getAllTeachers($conn);
31. get create an alert button to show no records this is quite confusing to refer to the code written in admin/teachers.php
32. within the admin/teachers.php create a for loop in order to display the data within the database to the table
33. add another column on tbl_teachers for subjects and grades with a lenght value of 31 both varchar
34. create another table on the database named grades
35. create another table on the database named subjects
36. try and insert data within the two tables grades and subjects
37. create another php file within data named subject.php and create a function 
<?php

//CREATE A FUNCTION TO GET ALL THE DATA FROM TBL_SUBJECTS
function getAllSubjects($conn){
    $sql = "SELECT * FROM tbl_subjects";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    if($stmt->rowCount() >= 1){
        $subjects = $stmt->fetchAll();
        return $subjects;
    }else {
        return 0;
    }


}

// FETCH THE SUBJECT BY ID 
function getSubjectById($subject_id, $conn){
    $sql = "SELECT * FROM subjects
            WHERE subject_id=? ";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$subject_id]);

    if($stmt->rowCount() == 1){
        $subject = $stmt->fetch();
        return $subject;
    }else {
        return 0;
    }


}



?>
38.  create another php file within data named grade.php and create a function 

<?php

function getGradeById($grade_id, $conn){
    $sql = "SELECT * FROM grades
            WHERE grade_id=?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$grade_id]);

    if($stmt->rowCount() == 1){
        $grade = $stmt->fetch();
        return $grade;
    }else {
        return 0;
    }


}


?>
39. within admin/teachers.php
CREATE this one for subject and grade just modify the variable's
<?php 
                           $s = '';
                           $subjects = str_split(trim($teacher['subjects']));
                           foreach ($subjects as $subject) {
                              $s_temp = getSubjectById($subject, $conn);
                              if ($s_temp != 0) 
                                $s .=$s_temp['subject_code'].', ';
                           }
                           echo $s;
?>
40. create teacher-add.php within admin folder
42. copy the code from teachers.php to teacher-add.php
43. remove the table responsive
44. copy the login form from login.php to teacher.php inside the div container
45. change the class of the login form to class="shadow p-3 mt-4" 
46. remove the picture logo
47. delete error handling in teachers-add.php
48. add new class within class="shadow p-3 mt-4 form-w" 
49. add max-width and width to it 
50. modify and create inputs for firstname, lastname, username, password, subject and grade.
51. within the password label create a div for random password generator see code below

<div class="mb-3">
    <label class="form-label">Password</label>
    <div class="input-group mb-3">
    <input type="text" class="form-control" name="pass">
    <button class="btn btn-secondary">Random Password</button>
    </div>
  </div>

52. get the javascript random password generator and paste it inside the script under teacher-add.php

<script>
  function makePass(length) {
            var result           = '';
            var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
            var charactersLength = characters.length;
            for ( var i = 0; i < length; i++ ) {
              result += characters.charAt(Math.floor(Math.random() * 
         charactersLength));

           }
           var passInput = document.getElementById('passInput');
           passInput.value = result;
        }

        var gBtn = document.getElementById('gBtn');
        gBtn.addEventListener('click', function(e){
          e.preventDefault();
          makePass(4);
        });

</script>

53. add checkbox on subject div
54. envelope the checkbox on col div like this. to make the checkbox align to left

 <div class="col">
    <input type="checkbox" name="Username"> English
    </div>

55. envelope again the checkbox on col to display all grades within the database to the checkbox

 <?php foreach ($subjects as $subject): ?>
      
        <div class="col">
        <input type="checkbox" name="subjects[]" value="<?=$subject['subject_id']?>"> 
        <?=$subject['subjects']?>
        </div>
<?php endforeach ?>

56. don't forget to add these connection for both subject and grades on top of teachers-add.php

$subjects = getAllSubjects($conn);
$grades = getAllGrades($conn);

57. create another folder for req in admin
58. within that folder create another teacher-add.php
59. paste this code. this one is for blank field detector

<?php
session_start();
if (isset($_SESSION['admin_id']) && 
    isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'Admin') {


//BLANK FIELD DETECTOR

if(isset($_POST['fname']) && 
   isset($_POST['lname']) &&
   isset($_POST['username']) &&
   isset($_POST['pass']) &&
   isset($_POST['subjects']) &&
   isset($_POST['grades'])) {




    // IF NO DATA INSERTED THEN USER CLICK ADD BUTTON
   }else {
    $em = "Error Occurred";
    header("Location: ../teacher-add.php?error=$em");
    exit;
  } 

   }else {
    // TWO FOLDERS ARE CONTAINED SO TWO ../../
    header("Location: ../../logout.php");
    exit;
  } 
}else {
	header("Location: ../../logout.php");
	exit;
} 

60. below the blank field detector in req/teacher-add.php add this code.
this code signals the interface if the user didn't input any data

 $grades = "";
    foreach ($_POST['grades'] as $grade){
        $grades .=$grade;
    }
    
    $subjects = "";
    foreach ($_POST['subjects'] as $subject){
        $subjects .=$subject;
    }

    if (empty($fname)) {
		$em  = "First name is required";
		header("Location: ../login.php?error=$em");
		exit;
	}else if (empty($lname)) {
		$em  = "Last name is required";
		header("Location: ../login.php?error=$em");
		exit;
	}else if (empty($uname)) {
		$em  = "Username is required";
		header("Location: ../login.php?error=$em");
		exit;
	}else if () {
		$em  = "Username is taken! try another one";
		header("Location: ../login.php?error=$em");
		exit;
	}else if (empty($pass)) {
		$em  = "Password is required";
		header("Location: ../login.php?error=$em");
		exit;
	}else {
        
    }

61. in admin/teacher-add.php add this error handling below h3 add new teacher 

 <!-- ERROR HANDLING  -->
     <?php if (isset($_GET['error'])) { ?>
    		<div class="alert alert-danger" role="alert">
			  <?=$_GET['error']?>
			</div>
	<?php } ?>

62. create a new function to check if the username is already registered in the database 
in admin/data/teacher.php

//CREATE A FUNCTION TO GET ALL THE DATA FROM SUBJECTS
function getAllSubjects($conn){
    $sql = "SELECT * FROM subjects"; //DOUBLECHECK THE TABLE 
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    if($stmt->rowCount() >= 1){
        $subjects = $stmt->fetchAll();
        return $subjects;
    }else {
        return 0;
    }

}

63. in req/teacher-add.php modify the if statement code to this.
this modify code has now pass the parameter of the function that checks 
the email is unique. 

 if (empty($fname)) {
      $em  = "First name is required";
      header("Location: ../teacher-add.php?error=$em&$data");
      exit;
    }else if (empty($lname)) {
      $em  = "Last name is required";
      header("Location: ../teacher-add.php?error=$em&$data");
      exit;
    }else if (empty($uname)) {
      $em  = "Username is required";
      header("Location: ../teacher-add.php?error=$em&$data");
      exit;
    }else if (!unameIsUnique($uname, $conn)) {
      $em  = "Username is taken! try another";
      header("Location: ../teacher-add.php?error=$em&$data");
      exit;
    }else if (empty($pass)) {
      $em  = "Password is required";
      header("Location: ../teacher-add.php?error=$em&$data");
      exit;
    }else {
        echo "Success!";
    }
