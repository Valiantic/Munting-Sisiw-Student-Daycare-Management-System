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

64. add this in the else replace echo "Success"; 
with this block of code to insert account on the database.

 $pass = password_hash($pass, PASSWORD_DEFAULT);

        $sql = "INSERT INTO
                tbl_teachers(username, password, fname, lname,
                            subjects, grades)
                            VALUES(?,?,?,?,?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$uname, $pass, $fname, $lname, $subjects, 
              $grades]);

              $sm = "New teacher has been registered successfully";
              header("Location: ../teacher-add.php?success=$sm");
              exit;


65. go to admin/teacher-add.php and copy the error handling replace it with the success handling.

66. add validation session on admin/req/teacher-add.php

 // VALIDATION SESSION
    $data = 'uname'.$uname.'&fname'.$fname.'&lname='.$lname;

67. in admin/teacher-add/php add this 

  // VARIABLE INITIALIZATION FOR VALIDATION SESSION
        $fname = '';
        $lname = '';
        $uname = '';

        // VARIABLE INITIALIZATION FOR SESSION
        if (isset($_GET['fname'])) $fname = $_GET['fname'];
        if (isset($_GET['lname'])) $lname = $_GET['lname'];
        if (isset($_GET['uname'])) $uname = $_GET['uname'];

        // PUT VALUE ON THREE INPUT FNAME,LNAME, AND UNAME

68. add value on 3 input fname,lname and uname.

>FOURTH CHAPTER

1. Add href="teacher-delete.php" on teachers.php
2. Do this on the href. make sure that the teacher_id= is close

 <a href="teacher-delete.php?teacher_id=<?=$teacher['teacher_id']?>"
                           class="btn btn-danger">Delete</a>

3. now create teacher-delete.php within the admin folder
4. create a sessions start, include a database system and data/teacher.php
with if else location catcher

<?php
session_start();
if (isset($_SESSION['admin_id']) && 
    isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'Admin') {
     
        include "../connections.php";
        include "data/teacher.php";

    }else {
        header("Location: ../login.php");
        exit;
      } 
    }else {
        header("Location: ../login.php");
        exit;
    } 


?>

5. add another get method inside the if condition. this is to fetch 
the teacher id data within teachers.php

isset($_GET['teacher_id'])

6. change also the location on the else statement to teachers.php
7. inside the if statement create a variable for id and paste this get method 

 $id = $_GET['teacher_id'];

 8. inside the admin/data/teacher.php create a function for remove teachers
 9. paste this function for remove teachers data 

 function removeTeacher($id, $conn){
    $sql = "DELETE FROM tbl_teachers
            WHERE teacher_id=?";
    $stmt = $conn->prepare($sql);
    $re = $stmt->execute([$id]);
 
    if ($re) {
      return 1;
    }else {
        return 0;
    }
 }

10. now in teacher-delete.php create an if else statement and put this into if 
condition

removeTeacher($id, $conn)

11. then inside the if statement put this to indicate that the data is deleted

 $sm = "Successfully Deleted!";
            header("Location: teacher.php?success=$sm");
            exit;

12. and this for error catching in else method 

$em = "Unknown Error Occurred";
            header("Location: teacher.php?error=$em");
            exit;

13. now if that goes on copy paste this error and success handling in teachers.php 
this is to indicate that if the data is successfully deleted or not 

              <!-- ERROR HANDLING  -->
                        <?php if (isset($_GET['error'])) { ?>
                            <div class="alert alert-danger" role="alert">
                            <?=$_GET['error']?>
                          </div>
                        <?php } ?>

                         <!-- SUCCESS HANDLING FOR TEACHER-DELETE -->
             <?php if (isset($_GET['success'])) { ?>
                <div class="alert alert-info" role="alert">
                <?=$_GET['success']?>
              </div>
             <?php } ?>

14. inside the class of both error and successs handling put a boostrap code 
for mt-5 for margin and n-table to properly align on the data table below 

 <div class="alert alert-danger mt-3 n-table" role="alert">

15. in teachers.php copy the anchor tag of teacher delete and paste it to teacher edit anchor tag.
just modify the href file from teacher delete to teacher edit

16. copy the whole code for teacher.add to teacher-edit 
17. edit the title and href to edit teachers for identification 
18. add this one the session condition. Don't forget the && clause for second condition.

&& isset($_GET['teacher_id'])

19. delete the initialization variable for session in teacher-edit.php this is the code under 
if session role 

20. cut the password div in teacher-edit.php and paste it under the form 
21. copy the form tag class and paste it under. enveloping the pasted teacher-edit.php. make sure that the form tag endline spare another endline for div under it. 

22. inside the form below with password paste this code for success and error handling on password 
modification. 

<!-- COPY THIS CODE FROM ABOVE -->
<hr><h3>Edit Password</h3></hr>

<!-- ERROR HANDLING   -->
<?php if (isset($_GET['error'])) { ?>
       <div class="alert alert-danger" role="alert">
         <?=$_GET['error']?>
       </div>
<?php } ?>

<!-- SUCCESS HANDLING   -->
<?php if (isset($_GET['success'])) { ?>
       <div class="alert alert-success" role="alert">
         <?=$_GET['success']?>
       </div>
<?php } ?>


23. copy the getsubjectid function on subject.php to admin/data/teacher.php

24. modify the code into this 

function getTeacherById($teacher_id, $conn){
    $sql = "SELECT * FROM tbl_teachers
            WHERE teacher_id=? ";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$teacher_id]);

    if($stmt->rowCount() == 1){
        $teacher = $stmt->fetch();
        return $teacher;
    }else {
        return 0;
    }

}

25. on teacher-edit.php create a variable to get the id of the teacher and an if statement
to catch the redirection link 

  $teacher_id = $_GET['teacher_id'];
        $teacher = getTeacherById($teacher_id, $conn);
       
        if ($teacher == 0){
            header("Location: teachers.php");
	        exit;
        }

26. add value for each input. 
do this for lname and username too so that we can fetch the data within the database.

<div class="mb-3">
    <label class="form-label">First name</label>
    <input type="text" class="form-control" value="<?=$teacher['fname']?>" name="fname">
  </div>

27. in teacher-edit.php we need to alter the code in order to save the checked data in the form 
to the database see the code below. just replace the subject to grade in the php 

  <!-- USE TO DISPLAY SUBJECTS USING FOR LOOP  -->
        <?php 
        // USED TO SPLIT SUBJECT DATA'S
        $subject_ids = str_split(trim($teacher['subjects']));
    
        // INDICATION TO ADD DATA USING SUBJECT ID
        foreach ($subjects as $subject){ 
            $checked = 0;
            foreach ($subject_ids as $subject_id){
                if ($subject_id == $subject['subject_id']) {
                    $checked = 1;
                }
            }

            ?>
      
        <div class="col">
        <input type="checkbox" name="subjects[]" 
        <?php if($checked) echo "checked"; ?>
        value="<?=$subject['subject_id']?>"> 
        <?=$subject['subjects']?>
        </div>

    <?php } ?>

28. edit the button in teacher-edit.php from add to update

29. create an input to hold the variable for teacher id in teacher-edit.php.
put this block of code below the div username 

<!-- INDICATION FOR TEACHER ID -->
  <input type="text" value="<?=$teacher['teacher_id']?>"
         name="teacher_id"
         hidden>

30. create a new file teacher-edit.php in the folder req/admin

31. copy the whole code block of teacher-add to /admin/req/teacher-edit.php

32. inside the isset if statement paste this code in admin/req/teacher-edit.php 

 // DATABASE CONNECTION
    include '../../connections.php';
    include "../data/teacher.php";
    
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $uname = $_POST['username'];
    $teacher_id = $_POST['teacher_id'];

    $grades = "";
    foreach ($_POST['grades'] as $grade){
        $grades .=$grade;
    }
    
    $subjects = "";
    foreach ($_POST['subjects'] as $subject){
        $subjects .=$subject;
    }


    // VALIDATION SESSION 
    // TAKE NOTE FOR THE DATA SHOULD BE TEACHER_ID= 
    $data = 'teacher_id='.$teacher_id;

    if (empty($fname)) {
      $em  = "First name is required";
      header("Location: ../teacher-edit.php?error=$em&$data");
      exit;
    }else if (empty($lname)) {
      $em  = "Last name is required";
      header("Location: ../teacher-edit.php?error=$em&$data");
      exit;
    }else if (empty($uname)) {
      $em  = "Username is required";
      header("Location: ../teacher-edit.php?error=$em&$data");
      exit;
    }else if (!unameIsUnique($uname, $conn, $teacher_id)) {
      $em  = "Username is taken! try another";
      header("Location: ../teacher-edit.php?error=$em&$data");
      exit;
    }else {
    // NOTE CHECK THE ALWAYS THE TABLE NAME!
      $sql = "UPDATE tbl_teachers SET 
              username = ?, fname=?, lname=?, subjects=?, grades=?
              WHERE teacher_id=?";
            
      $stmt = $conn->prepare($sql);
      $stmt->execute([$uname, $fname, $lname, $subjects, $grades
                    , $teacher_id]);
    
      $sm = "Successfully Updated!";
      header("Location: ../teacher-edit.php?success=$sm&$data");
      exit;

    
    }

33. in the admin/data/teacher.php file modify the function uniquebyname into this 
this is to ensure that the updated data is not the same within the recorded data 
in the database.

function unameIsUnique($uname, $conn, $teacher_id=0){
    $sql = "SELECT username, teacher_id FROM tbl_teachers
            WHERE username=?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$uname]);
 
    // To check if the teacher id is unique
    if($teacher_id == 0){

        if ($stmt->rowCount() >= 1) {
            return 0;
          }else {
              return 1;
          }
    }else {
        // check if the data is recorded
        if ($stmt->rowCount() >= 1) {
             $teacher = $stmt->fetch();
             if($teacher['teacher_id'] == $teacher_id){
                return 1;
             }else return 0;
          }else {
              return 1;
          }
    }

 }

34. in teacher-edit.php change the variable name on the get method of both
error and success handling to perror and psuccess

35. copy the password div in teacher-edit and paste it below the current password div

36. modify a little the change password div 

<!-- CONFIRMATION CHANGE PASSWORD DIV -->
<div class="mb-3">
    <label class="form-label">Password</label>
      
    <input type="text" class="form-control" name="pass" id="passInput2">
  

</div>  

37. add documentgetbyid and value result on password generator for change password div just duplicate the code

38. copy the confirm new pass word and paste it on top of the label password

39. change the pasted password to admin password 

40. change the current password div to new password while the password div below is the confirm new password

41. in the admin password remove the id=passInput2 so that the generated password will not print on the input for admin 
password

42. put name value on every input for example admin name=admin_pass same goes for new password and confirm password

43. add action to the change password section req/teacher-change.php

44. copy the content of req/teacher-edit.php to req/teacher-change.php

45. paste this code below the new password div in teacher edit.php 

 <!-- INDICATION FOR TEACHER ID -->
  <input type="text" value="<?=$teacher['teacher_id']?>"
         name="teacher_id"
         hidden>

46. put this below the confirm password div. this is to update the password credential 
of a certain user 

<button type="submit" 
            class="btn btn-primary">
            Update</button>

  
47. copy the name value of every input and paste it on the teacher-change.php 
isset post parameters

48. copy the name value of every input and paste it on the teacher-change.php 
post method parameter

49. the post method function should be like this 

 $admin_pass = $_POST['admin_pass'];
    $new_pass = $_POST['new_pass'];
    $c_new_pass = $_POST['c_new_pass'];
    $teacher_id = $_POST['teacher_id'];
    $id = $_SESSION['admin_id'];

50. put an id value on the form change password id="change_password"

51. in the validation session on req/teacher-change.php put this 

   $data = 'teacher_id='.$teacher_id.'#change_password';

52. change the header error validator value to perror

    header("Location: ../teacher-edit.php?perror=$em&$data");

53. delete the else if unique name detector in req.teacher-change.php

54. replace it with this code for new password and confirm password confirmation 

else if ($new_pass !== $c_new_pass) {
      $em  = "New Password and Confirmation password does not match";
      header("Location: ../teacher-edit.php?perror=$em&$data");
      exit;
    }

55. change the input type of admin password to password

56. put this password hash on req/teacher-change.php inside the else statement 

  // password hashing
        $new_pass = password_hash($pass, PASSWORD_DEFAULT);
  
57. modify the update query below the password hashing in req/teacher-change.php 

// NOTE CHECK THE ALWAYS THE TABLE NAME!
      $sql = "UPDATE tbl_teachers SET 
              password = ?
              WHERE teacher_id=?";
            
      $stmt = $conn->prepare($sql);
      $stmt->execute([$new_pass, $teacher_id]);
    
      $sm = "The password has been changed successfully!";
      header("Location: ../teacher-edit.php?psuccess=$sm&$data");
      exit;

58. create admin.php on admin/data folder 

59. create a function on admin/data admin.php this is to confirm the password update on the admin 
server side.

/ FUNCTION FOR PASSWORD VERIFCATION IN TEACHER EDIT 
function adminPasswordVerify($admin_pass, $conn, $admin_id){
    $sql = "SELECT * FROM tbl_admin
            WHERE admin_id=?"; //DOUBLECHECK THE TABLE 
    $stmt = $conn->prepare($sql);
    $stmt->execute([$admin_id]);

    if($stmt->rowCount() == 1){
        $admin = $stmt->fetch();
        $pass = $admin['password'];
        if(password_verify($admin_pass, $pass)){
            return 1;
        } else {
            return 0;
        }
    }else {
        return 0;
    }


}


60. include this on teacher-change.php database connection 

  include "../data/admin.php";


>FIFTH CHAPTER

1. create students.php on admin folder then on navbar.php put href link on students also in index.
2. go to teachers.php under admin folder. edit the code below to make sure that the id value will 
iterate 
  <?php $i = 0; foreach ($teachers as $teacher ) { 
                    $i++; ?>
                  <tr>
                    <th scope="row"><?=$i?></th>

3. copy the whole code of teachers.php to students.php
4. change the jquery hover active on students.php to 3
5. in the table tag on students.php delete subject and create a student.php on the admin/data
6. copy the function getAllStudents from data/teachers.php to student.php 
7. modify the variables 
  function getAllStudents($conn){
      $sql = "SELECT * FROM tbl_students";
      $stmt = $conn->prepare($sql);
      $stmt->execute();

      if($stmt->rowCount() >= 1){
          $students = $stmt->fetchAll();
          return $students;
      }else {
          return 0;
      }


  }

8. student.php change the variable function on if condition

$students = getAllStudents($conn);

9. delete include subject on students.php 
10. modify this on student.php to display the student details 

  <?php $i = 0; foreach ($students as $student ) { 
                    $i++; ?>
                  <tr>
                    <th scope="row"><?=$i?></th>
                    <td><?=$student['student_id']?></td>
                    <td><?=$student['fname']?></td>
                    <td><?=$student['lname']?></td>
                    <td><?=$student['username']?></td>
                  
                    <td>

11. delete td on subjects in students.php
12. to show the students grades make sure to check each column on parameters 
to be same with the table in the database 

 <!-- TABLE DATA TO SHOW THE STUDENTS GRADE -->
                    <td>
                      <?php 
                          // fixed  Undefined array key "grade" 
                          // This means there are no tables within students named grade
                           $grade = $student['grade'];
                           $g_temp = getGradeById($grade, $conn);
                           if ($g_temp != 0){
                            echo $g_temp['grade_code'].'-'.
                            $g_temp['grade'].', ';

                           }
                  
                      
                        ?>
                    </td>

13. modify the variable on edit and delete button table data 

   <!-- Table column for edit and delete button -->
                    <td>
                          <!-- Buttons for edit and delete -->
                        <a href="student-edit.php?student_id=<?=$student['student_id']?>"
                           class="btn btn-warning">Edit</a>
                        <a href="student-delete.php?student_id=<?=$student['student_id']?>"
                           class="btn btn-danger">Delete</a>
                    </td>
14. modify the variable and href value of edit and delete button

                    <td>
                          <!-- Buttons for edit and delete -->
                        <a href="student-edit.php?student_id=<?=$student['student_id']?>"
                           class="btn btn-warning">Edit</a>
                        <a href="student-delete.php?student_id=<?=$student['student_id']?>"
                           class="btn btn-danger">Delete</a>
                    </td>


15. modify the href value of add new students to student-add.php
16. create student-add.php on admin folder
17. copy the whole code of teacher-add.php to student-add.php
18. modify some variable name title, href, h1 and jquery active link hover value
19. delete the subject div on student-add.php
20. change the type value of grade in student-add.php to radio
21. create a student-add.php on admin/req folder
22. create an error null input validator N
NOTE: ALWAYS CHECK THE name value!
23. create a function for getallstudent and uniquename in admin/req student.php
24. create student-delete.php within admin folder 
25. copy the whole code of teacher-delete.php of admin folder to student-delete.php
26. edit variables of student-delete.php
27. create a function on student.php inside admin/data named removeStudent.
This function allows the system to delete a student record 
28. create student-edit.php within admin folder
29. edit variables of student-edit.php
30. create a function on student.php on admin/data folder named getStudentById copied from the function 
getTeacherbyId on teacher.php in admin/data folder
31. modify the function getStudentById 
NOTE: Make sure the variables are properly renamed!!! for it serves as redirect and updatation of the 
student-edit.php page 
32. modify the variable in student-edit.php and delete the div class for subjects
33. create student-edit.php on admin/req folder 
34. modify the variable within student-edit.php on admin/req folder 
35. double check that should update the edit student info
36. create student-change.php on admin/req folder 
37. copy the code from teacher-change.php to student-change.php and modify the variables
38. put &$data for else statement "An Error Occured" in student-change and teacher-change.php

>SIX CHAPTER

1. copy this code and paste this to teachers.php. this is to create a search button for teachers.php

 <form action="" class="mt-3 n-table">

           <div class="input-group mb-3">
          <input type="text" class="form-control" name="new_pass" placeholder="Search...">
          <button class="btn btn-primary" id="gBtn">
            Search
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
            </svg> 
          
          </button>
          </div>

  </form>

2. create teacher-search.php and add action to the search bar in teachers.php
3. create an session and a post method on teacher-search.php with else method handling for redirection

if ($_SESSION['role'] == 'Admin') {

        if (isset($_POST['searchKey'])){

// PUT THIS ELSE BLOCK UNDERNEATH THE /html tag 
   }else {
    header("Location: teachers.php");
    exit;
  } 

4. create a function to search data on tbl_teachers on admin/data teacher.php

// SEARCH FUNCTION TO GET DATA FROM TBL TEACHERS
function searchTeachers($key, $conn){
    $key = "%{$key}%";
    $sql = "SELECT * FROM tbl_teachers
            WHERE teacher_id LIKE ? 
            OR fname LIKE ?
            OR lname LIKE ? 
            OR username LIKE ?";
    $stmt = $conn->prepare($sql);
    // HANDLING COLUMN KEYS
    $stmt->execute([$key, $key, $key, $key]);

    if($stmt->rowCount() == 1){
        $teachers = $stmt->fetchAll();
        return $teachers;
    }else {
        return 0;
    }


}

5. add searcTeachers method to teacher-search.php
6. in teacher-search add a value on input search bar 

value="<?=$search_key?>"

7. also modify the name value of teacher-search in input search bar

name="searchKey"

8. put a method="post" on the teacher-search form 

9. add a back button incase the user search nothing in teacher-search.php.
put this below "There are no Records!"

  <a href="teachers.php"
           class="btn btn-dark">Go Back</a>


10. copy the search form tag in teachers.php to students.php 
11. create student-search in admin folder and copy the code of students to student-search
12. create a function for searchStudents in student.php just copy the function on teacher.php
searcTeachers and modify it 
13. call the searchStudent method that should make the search button function

>SEVENTH CHAPTER

1. add new columns in tbl_teachers 
2. add this new columns in teacher-add.php 

  <!-- TO ADD NEW COLUMNS -->
  <div class="mb-3">
    <label class="form-label">Address</label>
    <input type="text" class="form-control" value="<?=$uname?>" name="address">
  </div>

  <div class="mb-3">
    <label class="form-label">Employee number</label>
    <input type="text" class="form-control" value="<?=$uname?>" name="employee_number">
  </div>

  <div class="mb-3">
    <label class="form-label">Phone number</label>
    <input type="text" class="form-control" value="<?=$uname?>" name="phone_number">
  </div>

  <div class="mb-3">
    <label class="form-label">Qualification</label>
    <input type="text" class="form-control" value="<?=$uname?>" name="qualification">
  </div>

  <div class="mb-3">
    <label class="form-label">Email address</label>
    <input type="text" class="form-control" value="<?=$uname?>" name="email_address">
  </div>

  <div class="mb-3">
     <label class="form-label">Gender</label><br>
    <input type="radio"checked value="Male" name="gender">Male
      &nbsp
    <input type="radio" value="Female" name="gender">Female
  </div>

  <div class="mb-3">
    <label class="form-label">Date of birth</label>
    <input type="text" class="form-control" value="<?=$uname?>" name="date of birth">
  </div>

   <!-- TO ADD NEW COLUMNS -->

3. create new tables for section see database_schema.md for reference.
4. paste this below grade div in teacher-add.php. stay put in order to fetch data from the database
we need to create section.php on data folder in admin

 <div class="mb-3">
    <label class="form-label">Section</label>
    <div class="row row-cols-5">

    <!-- USE TO DISPLAY SUBJECTS USING FOR LOOP  -->
    <?php foreach ($subjects as $subject): ?>
      
        <div class="col">
        <input type="checkbox" name="subjects[]" value="<?=$subject['subject_id']?>"> 
        <?=$subject['subjects']?>
        </div>

    <?php endforeach ?>

    </div>
  </div>


5. put this on top with other include statements to fetch data on section table database 

   include "data/section.php";

6. within section.php in admin/data folder paste this function in order to get the data within the database

<?php

//CREATE A FUNCTION TO GET ALL THE GRADE FROM GRADES
function getAllSections($conn){
    $sql = "SELECT * FROM section"; //DOUBLECHECK THE TABLE 
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    if($stmt->rowCount() >= 1){
        $sections = $stmt->fetchAll();
        return $sections;
    }else {
        return 0;
    }


}


// FUNCTION TO GET ALL ID_GRADE FROM GRADES
function getSectionById($section_id, $conn){
    $sql = "SELECT * FROM section
            WHERE section_id=?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$section_id]);

    if($stmt->rowCount() == 1){
        $section = $stmt->fetch();
        return $section;
    }else {
        return 0;
    }


}


?>


7. inlcude this function on teacher-add.php in order to fetch data 

 $sections = getAllSections($conn);


8. modify the variables witin section div in teacher-add.php 

      <!-- NEW COLUMN THAT HAS BEEN ADDED -->
  <div class="mb-3">
    <label class="form-label">Section</label>
    <div class="row row-cols-5">

    <!-- USE TO DISPLAY SECTION USING FOR LOOP  -->
    <?php foreach ($sections as $section): ?>
      
        <div class="col">
        <input type="checkbox" name="section[]" value="<?=$section['section_id']?>"> 
        <?=$section['section']?>
        </div>

    <?php endforeach ?>

    </div>
  </div>

9. add new isset for blank field detector in admin/data teacher-add.php

 // NEW COLUMNS ADDED
   isset($_POST['address']) &&
   isset($_POST['employee_number']) &&
   isset($_POST['phone_number']) &&
   isset($_POST['qualification']) &&
   isset($_POST['email_address']) &&
   isset($_POST['gender']) &&
   isset($_POST['date_of_birth']) &&
   isset($_POST['section']) &&


10. foreach loop for section

  // BLANK FIELD CHECKBOX VALIDATOR FOR SECTIONS
    $sections = "";
    foreach ($_POST['sections'] as $section){
        $sections .=$section;
    }

11. add new post for blank field detector same as step 9 

      // NEW COLUMNS ADDED
    $address = $_POST['address'];
    $employee_number = $_POST['employee_number'];
    $phone_number = $_POST['phone_number'];
    $qualification = $_POST['qualification'];
    $email_address = $_POST['email_address'];
    $gender = $_POST['gender'];
    $date_of_birth = $_POST['date_of_birth'];


12. create if else statement for the blank field validator

   // NEW COLUMNS ADDED DUE TO SECTION TABLE 
    else if (empty($address)) {
      $em  = "Address is required";
      header("Location: ../teacher-add.php?error=$em&$data");
      exit;
    }
    else if (empty($employee_number)) {
      $em  = "Employee number is required";
      header("Location: ../teacher-add.php?error=$em&$data");
      exit;
    }
    else if (empty($phone_number)) {
      $em  = "Phone number is required";
      header("Location: ../teacher-add.php?error=$em&$data");
      exit;
    }
    else if (empty($qualification)) {
      $em  = "Qualification is required";
      header("Location: ../teacher-add.php?error=$em&$data");
      exit;
    }
    else if (empty($email_address)) {
      $em  = "Email address is required";
      header("Location: ../teacher-add.php?error=$em&$data");
      exit;
    }
    else if (empty($gender)) {
      $em  = "Gender is required";
      header("Location: ../teacher-add.php?error=$em&$data");
      exit;
    }
    else if (empty($date_of_birth)) {
      $em  = "Date of birth is required";
      header("Location: ../teacher-add.php?error=$em&$data");
      exit;
    }
    


13. updated insert query on admin/req folder teacher-add.php 

 // query to push data on the database
        $sql = "INSERT INTO
                tbl_teachers(username, password, fname, lname,
                            subjects, grades, section, address,
                            employee_number, date_of_birth, phone_number,
                            qualification, gender, email_address)
                            VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?)"; // 14 
        $stmt = $conn->prepare($sql);
        $stmt->execute([$uname, $pass, $fname, $lname, $subjects, 
              $grades, $sections, $address, $employee_number, $date_of_birth, 
              $phone_number, $qualification, $gender, $email_address]);

              $sm = "New teacher has been registered successfully";
              header("Location: ../teacher-add.php?success=$sm");
              exit;


14. update section datatype on the database make it varchar 31 

>EIGHT CHAPTER 

1. update validation session on teacher-add.php on admin/req folder 

$data = 'uname='.$uname.'&fname='.$fname.'&lname='.$lname.'&address='.$address.'&en='.$employee_number.'&pn='.$phone_number.'&qf='.$qualification.'&email='.$email_address;


2.  update validation initialization session get method on teacher-add.php

  // VARIABLE INITIALIZATION FOR VALIDATION SESSION
        $fname = '';
        $lname = '';
        $uname = '';
        $address = '';
        $en = '';
        $pn = '';
        $qf = '';
        $email = '';

        // VARIABLE INITIALIZATION FOR SESSION
        if (isset($_GET['fname'])) $fname = $_GET['fname'];
        if (isset($_GET['lname'])) $lname = $_GET['lname'];
        if (isset($_GET['uname'])) $uname = $_GET['uname'];
        if (isset($_GET['address'])) $address = $_GET['address'];
        if (isset($_GET['en'])) $uname = $_GET['en'];
        if (isset($_GET['pn'])) $uname = $_GET['pn'];
        if (isset($_GET['qf'])) $uname = $_GET['qf'];
        if (isset($_GET['email'])) $uname = $_GET['email'];



3. update the value of new added column inputs in teacher-add.php 

 <!-- TO ADD NEW COLUMNS -->
  <div class="mb-3">
    <label class="form-label">Address</label>
    <input type="text" class="form-control" value="<?=$address?>" name="address">
  </div>

  <div class="mb-3">
    <label class="form-label">Employee number</label>
    <input type="text" class="form-control" value="<?=$en?>" name="employee_number">
  </div>

  <div class="mb-3">
    <label class="form-label">Phone number</label>
    <input type="text" class="form-control" value="<?=$pn?>" name="phone_number">
  </div>

  <div class="mb-3">
    <label class="form-label">Qualification</label>
    <input type="text" class="form-control" value="<?=$qf?>" name="qualification">
  </div>

  <div class="mb-3">
    <label class="form-label">Email address</label>
    <input type="text" class="form-control" value="<?=$email?>" name="email_address">
  </div>


4.  add this new input type column in teacher-edit.php for data edit visualization 


   <!-- NEW ADDED COLUMNS  -->

      <div class="mb-3">
      <label class="form-label">Address</label>
      <input type="text" class="form-control" value="<?=$teacher['address']?>" name="address">
      </div>

      <div class="mb-3">
      <label class="form-label">Employee number</label>
      <input type="text" class="form-control" value="<?=$teacher['employee_number']?>" name="employee_number">
      </div>

      <div class="mb-3">
      <label class="form-label">Date of birth</label>
      <input type="text" class="form-control" value="<?=$teacher['date_of_birth']?>" name="date_of_birth">
      </div>

      <div class="mb-3">
      <label class="form-label">Phone number</label>
      <input type="text" class="form-control" value="<?=$teacher['phone_number']?>" name="phone_number">
      </div>


      <div class="mb-3">
      <label class="form-label">Email address</label>
      <input type="text" class="form-control" value="<?=$teacher['email_address']?>" name="email_address">
      </div>

      <div class="mb-3">
      <label class="form-label">Qualification</label>
      <input type="text" class="form-control" value="<?=$teacher['qualification']?>" name="qualification">
      </div>

      <div class="mb-3">
      <label class="form-label">Gender</label>
      <input type="text" class="form-control" value="<?=$teacher['gender']?>" name="gender">
      </div>


      <!-- NEW ADDED COLUMNS  -->


5. change type value on date of birth in teacher-edit.php to "date"
6. update the gender input to radio buttons with conditional statement for checked value 

 <div class="mb-3">
    <label class="form-label">Gender</label><br>
    <input type="radio" value="Male" <?php if($teacher['gender'] == 'Male') echo 'checked';?> name="gender">Male
      &nbsp;
    <input type="radio" value="Female" <?php if($teacher['gender'] == 'Female') echo 'checked';?> name="gender">Female
  </div>

7. include section on teacher-edit.php and getAllSection method

8. add checkbox for section update 

 <!-- CHECKBOX FOR SECTION  -->

<div class="mb-3">
  <label class="form-label">Section</label>

  <div class="row row-cols-5"> 
  <!-- USE TO DISPLAY GRADES USING FOR LOOP  -->
  <?php 
      // USED TO SPLIT GRADES DATA'S
      $section_ids = str_split(trim($teacher['section']));
  

      foreach ($sections as $section){ 
          $checked = 0;
          foreach ($section_ids as $section_id){
              if ($section_id == $section['section_id']) {
                  $checked = 1;
              }
          }

          ?>
    
    <div class="col">
    <input type="checkbox" 
    name="sections[]" 
    <?php if($checked) echo "checked"; ?>
    value="<?=$section['section_id']?>"> 
    <?=$section['section']?>
    <!-- ENCLOSED IN PHP TAG ARE THE VARIABLES YOU WANT TO DISPLAY -->


  </div>
  <?php } ?>
  </div>

</div>

9. Fixed error in mysql queries due to "," in query command by removing it. and rename the variables within 
post and isset method "section" to "sections".
ERROR NOTE: 
Fatal error: Uncaught PDOException: SQLSTATE[42000]: Syntax error or access violation: 1064 You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'WHERE teacher_id='13'' at line 5 in C:\xampp\htdocs\Munting_sisiw_daycare\admin\req\teacher-edit.php:141 Stack trace: #0 C:\xampp\htdocs\Munting_sisiw_daycare\admin\req\teacher-edit.php(141): PDOStatement->execute(Array) #1 {main} thrown in C:\xampp\htdocs\Munting_sisiw_daycare\admin\req\teacher-edit.php on line 141


10. create teacher-view.php in admin folder 
11. enclosed the fname in anchor tag like this 
      <td><a href="teacher-view.php"><?=$teacher['fname']?></a></td>

12. add php variable in the anchor tag in order to get the teacher id 
    <td><a href="teacher-view.php?teacher_id=<?=$teacher['teacher_id']?>"><?=$teacher['fname']?></a></td>

13. copy the code in teacher-add.php to teacher-view.php
14. remove all code inside div class container in teacher-view.php
15. put another php tag for else statement catcher to redirect to teachers.php 
     <?php 
       }else {
        header("Location: teacher.php");
        exit;
      } 
     ?>

16. remove include grade and subject in teacher-view.php
17. add get variable and getTeacgerById in teacher-view.php 
        $teacher_id = $_GET['teacher_id'];

        $teacher = getTeacherById($teacher_id, $conn);

18. copy the boostrap card in bootsrap and paste it inside the div container in teacher-view.php 

<div class="card" style="width: 18rem;">
  <img src="..." class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">An item</li>
    <li class="list-group-item">A second item</li>
    <li class="list-group-item">A third item</li>
  </ul>
  <div class="card-body">
    <a href="#" class="card-link">Card link</a>
    <a href="#" class="card-link">Another link</a>
  </div>
</div>

19. using this tag <?=$teachers['fname']?> put it in the li tag in order to fetch 
the data within the database 

20. create a li to fetch data for subjects 

   <li class="list-group-item">Subject: 
                  <!-- TO SHOW SUBJECT -->
            <?php 
                           $s = '';
                           $subjects = str_split(trim($teachers['subjects']));
                           foreach ($subjects as $subject) {
                              $s_temp = getSubjectById($subject, $conn);
                              if ($s_temp != 0) 
                                $s .=$s_temp['subject_code'].', ';
                           }
                           echo $s;
           ?>

            </li>

21. create a li to fetch data for grades

  <li class="list-group-item">Grade: 
                  <!-- TO SHOW GRADE -->
                  <?php 
                           $g = '';
                           $grades = str_split(trim($teachers['grades']));
                           foreach ($grades as $grade) {
                              $g_temp = getGradeById($grade, $conn);
                              if ($g_temp != 0) 
                                $g .=$g_temp['grade_code'].'-'.
                                     $g_temp['grade'].', ';
                           }
                           echo $g;
                        ?>

            </li>


22. upon what you do in 20 and 21 do the same for section too. see git documentation for more details. 
23. add some styling in the card. 

>NINTH CHAPTER
1. add new images one for male and female avatar icon stores in images folder 
2. uncomment the img tag in bootstrap card and put a php tag for avatar gender icon 
NOTE: teacher-Male.png the teacher is the name of the file follow by the Male that will php 
detect to choose the gender within the database record. 

  <img src="../images/teacher-<?=$teachers['gender']?>.png" class="card-img-top" alt="...">

3. not related to the ninth chapter. major changes on information card please refer to git documentation
4. copy the table data of teacher id and fname to teacher-search.php. this is when the user is searching 
the clickable teacherview link will still appear.
5. update the sql query on teacher.php add more OR operators and like operators. dont forget to add keys!!!

   $sql = "SELECT * FROM tbl_teachers
            WHERE teacher_id LIKE ? 
            OR fname LIKE ?
            OR lname LIKE ? 
            OR username LIKE ?
            OR address LIKE ?
            OR employee_number LIKE ?
            OR date_of_birth LIKE ?
            OR phone_number LIKE ?
            OR qualification LIKE ?
            OR gender LIKE ? 
            OR email_address LIKE ?";

    $stmt = $conn->prepare($sql);
    // HANDLING COLUMN KEYS DEPENDS ON HOW MANY CONDITION ON THE SQL QUERY 
    $stmt->execute([$key, $key, $key, $key, $key, $key, $key, $key, $key, $key, $key]);

6. in teacher.php modify the key variable in searchTeachers function. 
this code allows mysqli query to get all results using LIKE operator. 
do this too in student.php in data folder.

  $key = preg_replace('/(?<!\\\)([%_])/', '\\\$1',$key);

7. add new label for date joined in teacher view 

 <div class="card-item">
            <label>Date joined:&nbsp;&nbsp;&nbsp;<?=$teachers['date_of_joined']?></label>
  </div>

8. add generate employee number on teacher-add.php 
9. add delete confirmation modal on teacher-delete.php
10. change method of search input FROM POST TO GET 
in teachers, students, teacher-search, student-search and teacher-view.php

11. create new columns in database 
address VARCHAR 31
gender VARCHAR 7 
email_address VARCHAR 255 
date_of_birth DATE 
date_of_joined TIMESTAMP CURRENT_TIMESTAMP

parent_fname VARCHAR 127 
parent_lname VARCHAR 127
parent_phone_number VARCHAR 31 

12. create new input for the new columns in student-add.php  
13. inlude data/section.php in student-add.php 
14. copy the input for grade and modify it for section 
15. put breakline and horizontal rule in student-add.php form 
16. put names on every input in student-add.php then on req/student-add.php 
create a isset and post variable for blank field validator 
new add columns in the database. then create if else for redirection. 

17. FIXED! rename the redirection error display on blank field validator on 
student-add.php parent fname, parent lname and parent phone number

18. UPDATE INSERT Query on req/student-add.php
19. ADD GET METHOD in student-add.php and value for new columns 
20. minor changes on navbar and login h4 text 

> TENTH CHAPTER

1. add new inputs from the new added columns in the database 
2. make new inputs visible on student-edit.php
3. change position of back button in student-edit and teacher-edit
4. add update functionality on student-edit.php
5. add anchor tag on fname in student.php 
6. create student-view.php on admin folder
7. copy the code from teacher-view to student-view.php 
8. change variables from teachers to student to display data from the database
9. add gender images on student-view.php
10. add date enrolled on student-view.php
11. add new LIKE operator in data folder on student.php
12. copy the td on fname in student.php to student-search.php in order 
to be clickable when searched

>ELEVENTH CHAPTER
1. create grade.php within admin folder copy the code from teachers.php
2. in the inc/navbar.php add another li for grade
3. in grade.php organize arrangement of codes 
4. 