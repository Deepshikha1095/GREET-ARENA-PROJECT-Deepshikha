
<?php
//LINK OF DELETE_CAT.PHP
include("dbconnect.inc");

$a=$_REQUEST['cmbName'];

mysql_query("delete from category_details where c_id=$a",$con);

echo "CATEGORY SUCCESSFULLY DELETED!";
header("location:index.php?task=adminPanel&&view=delete_cat&&msg=cat_deleted");

?>