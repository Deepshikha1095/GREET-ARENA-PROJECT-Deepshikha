<?php
include("dbconnect.inc");
$category_name=$_REQUEST['c_name'];
$category_type=$_REQUEST['c_type'];
$category_pname=$_REQUEST['c_pname'];
echo $category_name."  ".$category_pname;
if($_REQUEST['c_type'] == "primary") {
	$result = mysql_query("select count(*) as total from category_details where c_name='{$_REQUEST['c_name']}'",$con);
	$data=mysql_fetch_assoc($result);
	if($data['total'] > 0) {
		echo "Category already exixts";
		header("location:index.php?task=adminPanel&&view=create_cat&&msg=cat_exist");
	} else {
		mysql_query("insert into category_details(c_name,c_type,parent_id) values('$category_name','$category_type',-1)",$con);
		mkdir('./data_files/'.$_REQUEST['c_name']);
		echo "Category created";
		header("location:index.php?task=adminPanel&&view=create_cat&&msg=cat_created");
	}
} elseif ($_REQUEST['c_type'] == "secondary") {
	$result = mysql_query("select c_name from category_details where c_id='{$_REQUEST['c_pname']}'",$con);
	$data=mysql_fetch_assoc($result);
	$parentId = $data['c_name'];
	mysql_query("insert into category_details(c_name,c_type,parent_id) values('$category_name','$category_type','$category_pname')",$con);
	mkdir('./data_files/'.$parentId.'/'.$_REQUEST['c_name']);
	echo "Category created";
	header("location:index.php?task=adminPanel&&view=create_cat&&msg=cat_created");
}
?>