<?php
//link of reg_form.php                  

include("dbconnect.inc");

$username  =  $_REQUEST['txtusername'];
$firstname =  $_REQUEST['txtfirstname'];
$lastname  =  $_REQUEST['txtlastname'];
$pass      =  $_REQUEST['txtpass'];
$gender    =  $_REQUEST['txtgender'];
$email     =  $_REQUEST['txtemail'];
$address   =  $_REQUEST['txtaddress'];
$mobile    =  $_REQUEST['txtmobile'];

mysql_query("insert into user_info(u_name,ufirst_name,ulast_name,u_address,u_email,u_mobile,u_gender,u_pass,u_type) values('$username','$firstname','$lastname','$address','$email','$mobile','$gender','$pass','user')",$con);

echo "SUCCESSFULLY REGISTERED! THANKYOU FOR REGISTRATION";
SETCOOKIE("user_name","{$username}");
header("location:Index.php");
?>