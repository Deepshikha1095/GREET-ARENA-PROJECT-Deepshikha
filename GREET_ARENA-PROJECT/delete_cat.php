<div id="create_catg"><center>
<form method="get" action="deletecategory.php">

<?php
//LINK OF ADMIN_PANEL.PHP
echo "<br>";
echo "DELETE ANY CATEGORY-";
echo "<br>";
if(isset($_GET['msg']) && $_GET['msg'] == "cat_deleted")
	echo "Category deleted successfully";
include("dbconnect.inc");

$rscat = mysql_query("select * from category_details",$con);
echo "<br>";

echo "CHOOSE CATEGORY NAME TO DELETE: &nbsp&nbsp&nbsp<select name='cmbName'>";
echo "<br>";

while($x=mysql_fetch_array($rscat))
{
	$id=$x['c_id'];
  echo "<option value='$id'>";
    echo $x["c_name"];
	
    echo "</option>";
}

echo "</select>";
echo "<br>";

?>
<input type="submit" value="DELETE CATEGORY" /><br>
</form></center>
</div>