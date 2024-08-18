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

tbl_teachers
>teacher_id INT(11) AUTO_INCREMENT
>username VARCHAR(25)
>password VARCHAR(255)
>fname VARCHAR(25)
>lname VARCHAR(25)
>grade INT(25)
--(to add)--
>address VARCHAR(31)
>employee_number INT(11)
>date_of_birth DATE NULL
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
