<?php 

$signup_data_query = "INSERT INTO `users`(`fname`, `lname`, `email`, `password`, `contactno`) VALUES (?,?,?,?,?)";

$login_data_query =  ("SELECT id,fname FROM `users` WHERE email= ? and password= ?");

$changePassword_data_query =  ("SELECT password FROM users where password= ? ");

$profile_data_query = ("select * from users where  id= ? ");

$edit_data_query = ("update users set fname= ? ,lname= ? ,contactno= ?  where id= ? ");

$welcome_data_query = ("SELECT * FROM `users` WHERE id =? ");



// admin data query*******************

$adminlogin_data_query = ("SELECT * FROM `admin` WHERE username= ? and password= ? ");

$admin_edit_data_query = ("update users set fname= ? ,lname= ? ,contactno= ?  where id= ? ");

$editpage_data_query = ("select * from users where id= ? ");

$admin_manage_data_query = ("delete from users where id=? ");

$admin_profile_data_query = ("select * from users where  id= ? ");



// $welcome_data_query = ("select id,fname ,lname  from users ");

    
?>
