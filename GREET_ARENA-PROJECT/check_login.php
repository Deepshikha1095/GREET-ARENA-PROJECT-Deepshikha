<?php
include("dbconnect.inc");

$loginname    =  $_REQUEST['txtloginname'];
$loginpass    =  $_REQUEST['txtloginpass'];

$rsUser=mysql_query("select * from user_info where u_name='$loginname'",$con);
if(mysql_num_rows($rsUser)>0)
{
	$row = mysql_fetch_array($rsUser);

	if($row['u_pass']==$loginpass)
	{
		  if($row['u_type']=='user')
		  {
			  SETCOOKIE("user_name","{$row['u_name']}");
			  SETCOOKIE("user_id","{$row['u_id']}");
			  header("location:Index.php");
		  }
		  else
		  {
			  SETCOOKIE("user_name","{$row['u_name']}");
			  SETCOOKIE("user_id","{$row['u_id']}");
			  SETCOOKIE("advanced","1");
			  header("location:Index.php");
		  }
	}
	else
	{
		header("location:index.php?task=login&&msg=fail");
		//echo "SORRY! WRONG PASSWORD";
	}
}
else
{
	header("location:index.php?task=login&&msg=fail");
	//echo "SORRY! WRONG USER NAME";
}

?>