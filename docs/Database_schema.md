db_daycare

TABLES

tbl_admin
>admin_id INT(11) AUTO_INCREMENT
>username VARCHAR(25)
>password VARCHAR(255)
>fname VARCHAR(25)
>lname VARCHAR(25)

tbl_students 
>student_id INT(11) AUTO_INCREMENT
>username VARCHAR(25)
>password VARCHAR(255)
>fname  VARCHAR(25)
>lname VARCHAR(25)
>grade INT(25)
--TO ADD NEW COLUMNS-- 
section INT 11 
address VARCHAR 31
gender VARCHAR 7 
email_address VARCHAR 255 
date_of_birth DATE 
date_of_joined TIMESTAMP CURRENT_TIMESTAMP
parent_fname VARCHAR 127 
parent_lname VARCHAR 127
parent_phone_number VARCHAR 31 

tbl_teachers
>teacher_id INT(11) AUTO_INCREMENT
>username VARCHAR(25)
>password VARCHAR(255)
>fname VARCHAR(25)
>lname VARCHAR(25)
>grade INT(25)
--(to add NOTE: ADD THIS ONE BY ONE UNKNOWN ERROR ADDING ALL 8 AT ONCE)-- 
>section VARCHAR(31) 
>address VARCHAR(31)
>employee_number INT(11)
>date_of_birth DATE 
>phone_number VARCHAR(31)
>qualification VARCHAR(127)
>gender VARCHAR(7)
>email_address VARCHAR(255)
>date_of_joined DATETIME CURRENT_TIMESTAMP


grades
>grade_id INT(11) AUTO_INCREMENT
>grade VARCHAR(31)
>grade_code VARCHAR(7)

subjects
>subject_id INT(11) AUTO_INCREMENT
>subjects VARCHAR(31)
>subject_code VARCHAR(7)

section
>section_id INT AUTO_INCREMENT
>section VARCHAR 7

class
>class_id INT AUTO_INCREMENT
>grade INT
>section VARCHAR