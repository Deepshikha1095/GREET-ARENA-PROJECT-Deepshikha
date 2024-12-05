<?php
//link of insert_card.php

include("dbconnect.inc");

$catname  =   $_REQUEST['card_catname'];
$cardname =   $_REQUEST['card_name'];
$rate     =   $_REQUEST['card_rate'];
$info     =   $_REQUEST['card_info'];

$f1   =   $_FILES['txtfile'];
$fln  =   $_FILES['txtfile']['name'];

$rscards = mysql_query("select c_id, parent_id from category_details where c_type='secondary' and c_name='$catname'",$con);
$data=mysql_fetch_assoc($rscards);
$id = $data['c_id'];		//Getting category name using category id
$parentId = $data['parent_id'];
$rscards = mysql_query("select c_name from category_details where c_type='primary' and c_id='$parentId'",$con);
$data=mysql_fetch_assoc($rscards);
$parentName = $data['c_name'];		//getting primary category name to get folder structure

$path = "./data_files/".$parentName."/".$catname."/".$f1['name'];echo $path;
$result = move_uploaded_file($f1['tmp_name'], $path);
$res = mysql_query("insert into items_details(cid,item_name,item_rate,item_info,item_imgpath) values('$id','$cardname','$rate','$info','$path')",$con);
if($res) {
	echo "SUCCESSFULLY NEW CARD INSERTED!";
	header("location:index.php?task=adminPanel&&view=insert_card&&msg=card_inserted");
} else {
	echo "Failed to insert new Card!";
	header("location:index.php?task=adminPanel&&view=insert_card&&msg=card_not_inserted");
}
?>