<?php 
	SETCOOKIE("user_name"," ",time() -3600);
	SETCOOKIE("user_id"," ",time() -3600);
	SETCOOKIE("advanced"," ",time() -3600);
	header("location:Index.php");
?>