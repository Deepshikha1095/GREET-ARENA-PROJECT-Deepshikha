<div id="myDIVForCards">
	<?php 
	
	function getImageTable($cat_id) {
		include("dbconnect.inc");
		$rs_items = mysql_query("select item_imgpath, item_id from items_details where cid=$cat_id",$con);
		echo "<table";
		$row = mysql_fetch_array($rs_items);
		//echo count($row) / 2;
		for($i = 0; $i < count($row) / 2; $i++) {
			echo "<tr>";
			for($i = 0; $i < 4; $i++) {
				if($row) {
					echo "<td><a href=\"index.php?task=show_card&&id=".$row["item_id"]."\"><img src='".$row["item_imgpath"]."' width=200 height=200 /></a></td>";
					$row = mysql_fetch_array($rs_items);
				}
			}
			echo "</tr>";
		}
		echo "</table>";
	}

	if(isset($_GET["getchild"]) && $_GET['getchild'] == "false") {
		getImageTable($_GET['id']);
	} elseif(isset($_GET["getchild"]) && $_GET['getchild'] == "true") {
		include("dbconnect.inc");
		$cid = $_GET["id"];
		$result = mysql_query("select c_id from category_details where parent_id=$cid",$con);
		while($row1 = mysql_fetch_array($result)) {
			getImageTable($row1['c_id']);
		}
	}
	?>
</div>