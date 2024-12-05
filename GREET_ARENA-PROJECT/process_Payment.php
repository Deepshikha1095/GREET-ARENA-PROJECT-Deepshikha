<?php
include("dbconnect.inc");
$item_id = $_POST['id'];
$user_id = $_COOKIE['user_id'];
$mop = $_POST["mop"];

$re_item = mysql_query("select item_rate from items_details where item_id='$item_id'",$con);
$row = mysql_fetch_array($re_item);
$price = $row["item_rate"];
$result = mysql_query("insert into trans_details(user_id, trans_mode, item_id, trans_amount, status) values('$user_id', '$mop', '$item_id', '$price', 'successfull')",$con);
if($result)
{
	echo "Transaction Successfull";
	header("location:Index.php?task=show_card&&id=$item_id");
}

?>