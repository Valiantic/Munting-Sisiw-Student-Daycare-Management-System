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
>subject VARCHAR(255)
>fname VARCHAR(25)
>lname VARCHAR(25)
--(to add NOTE: ADD THIS ONE BY ONE UNKNOWN ERROR ADDING ALL 8 AT ONCE)-- 
>grade INT(25)
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
>grade INT 

section
>section_id INT AUTO_INCREMENT
>section VARCHAR 31

class
>class_id INT AUTO_INCREMENT
>grade INT
>section VARCHAR

registrar_office
>r_user_id INT 11 AUTO_INCREMENT
>username VARCHAR 127
>password VARCHAR 255
>fname VARCHAR 31
>lname VARCHAR 31
>address VARCHAR 31
>employee_number INT 11
>date_of_birth DATE 31
>phone_number VARCHAR 31 
>qualification VARCHAR 31
>gender VARCHAR 7
>email_address VARCHAR 255
>date_of_joined DATETIME  CURRENT_TIME

courses
>course_id INT AUTO INCREMENT
>grade INT 
>course_name VARCHAR 127
>course_code VARCHAR 31  

setting 
>current_year INT 
>current_semester VARCHAR


student_score
>id INT AUTO_INCREMENT
>semester VARCHAR 100 
>year INT 
>student_id INT 
>teacher_id INT 
>subject_id INT 
>results VARCHAR 100

test_type

>test_id INT AUTO_INCREMENT
>test_type VARCHAR 25

message 

>message_id
>sender_full_name
>sender_email
>message

