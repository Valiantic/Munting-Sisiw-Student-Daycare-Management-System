STUDENT MANAGEMENT CREATION DOCUMENTATION

FEATURES TO ADD 
:FORGOT PASSWORD

>FIRST CHAPTER 
1.get boostrap css links and js links
2.setup background image
3.get navbar code to bootstrap
4.customize navbar
5.add section 
6.add style to section fonts using google fonts
7.add another section below just copy paste its
8.add bootstrap card
9.style bootstrap card and add navigation to navbar
10.add contacts card and style it 
11.add login page

>SECOND CHAPTER
12.add bootstrap alert
13.created req folder and login.php for blank field detector
14.add session on /req/login.php (MAKE SURE TO CHECK ALL INPUTS ARE ADDED!)
15.add error handling on /req/login.php
16.create login verification on /req/login.php
17.create an admin log pass code on login.php

NOTE: the reason behind this is because the password_hash that will be saved to myphpmyadmin will be 
overwrited by this $pass code value once you login to login.php so insert this on login.php
<?php
        $pass = 123;
        $pass = password_hash($pass, PASSWORD_DEFAULT);
        echo $pass;
?>

18.insert admin data on phpmyadmin database
19.copy all the code from index.php and create and paste the code on home.php
20.add session on home.php
21.create a div in home.php and create a echo to show what role is the user
22.create logout.php and add session_unset and destroy

>THIRD CHAPTER
1.create admin folder and within it index.php
2.copy the code from home.php and delete it paste the copy code to admin/index.php
3.change directory on req/login.php
4.in admin/index.php copy paste bootstrap navbar and add list items as well change login to logout
5.create inc folder and within it a navbar.php
6.copy paste the code from admin/index.php to navbar.php this is to implement the DRY technique
7.in index.php create include and write the navbar
<?php

include "inc/navbar.php";

?>
8.remove the active on daskboard in navbar.php