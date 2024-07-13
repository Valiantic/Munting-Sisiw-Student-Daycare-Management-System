STUDENT MANAGEMENT CREATION DOCUMENTATION

FIRST CHAPTER 
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

SECOND CHAPTER
12.add bootstrap alert
13.created req folder and login.php for blank field detector
14.add session on /req/login.php (MAKE SURE TO CHECK ALL INPUTS ARE ADDED!)
15.add error handling on /req/login.php
16.create login verification on /req/login.php
17.create an admin log pass code on login.php
<?php
        $pass = 123;
        $pass = password_hash($pass, PASSWORD_DEFAULT);
        echo $pass;
?>
18.insert admin data on phpmyadmin database
19.