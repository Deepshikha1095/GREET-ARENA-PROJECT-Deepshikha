<div id="menuBar">
	<table align="center" cellpadding=10 width=100%>
	<tr align="center">
	<?php
		include("dbconnect.inc");
		$rs_items=mysql_query("select c_name, c_id from category_details where c_type='primary'",$con);
		while($row=mysql_fetch_array($rs_items))
		{
			$catg_name = $row['c_name'];
			$catg_id = $row['c_id'];
			$width = 100/mysql_num_rows($rs_items);
			echo "<td width=\""."$width"."%\"><li id=\"festMenu\"><a href=\"index.php?task=show_cards&&id=$catg_id&&getchild=true\">$catg_name</a>";
			echo "<ul>";
			$childQuery=mysql_query("select c_name, c_id from category_details where c_type='secondary' and parent_id=$catg_id",$con);
			while($row1=mysql_fetch_array($childQuery))
			{
				$child_cat_name = $row1['c_name'];
				$child_cat_id = $row1['c_id'];
				echo "<li id=\"festSubMenu\"><a href=\"index.php?task=show_cards&&id=$child_cat_id&&getchild=false\">$child_cat_name</a></li>";
			}
			echo "</ul></li></td>";
		}
	?>
    </tr>
    </table>
</div>