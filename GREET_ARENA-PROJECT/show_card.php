<div id="myDIVForCards">
	<table width=100% height=100%>
    	<tr><?php
			include("dbconnect.inc");
			$item_id = $_GET['id'];
			$user_id = $_COOKIE["user_id"];
			$rs_items = mysql_query("select * from trans_details where item_id=$item_id and user_id=$user_id",$con);
			$already_purchased = false;
			if($rs_items && mysql_num_rows($rs_items)>0) {
				$already_purchased = true;
			}
			$rs_items = mysql_query("select * from items_details where item_id=$item_id",$con);
			$row = mysql_fetch_array($rs_items);
			$imgpath = $row['item_imgpath'];
			$imgprice = $row['item_rate'];
			$imgname = $row['item_name'];
			$imgdesc = $row['item_info'];
        	echo "<td width=60%><img width=100% height=100% src=\"$imgpath\"/></td>";
            echo "<td>";
			if($already_purchased) {
				echo "<table width=100% height=100%>";
				echo "<tr height=20% align='center'><td colspan=2>Download Card</td></tr>";
				echo "<tr height=20% align='center'><td width=40%>Card Name</td><td>$imgname</td></tr>";
				echo "<tr height=20% align='center'><td>Other details</td><td>$imgdesc</td></tr>";
				echo "<tr align='center'><td colspan=2><a href=\"download.php?fileToDownload=$imgpath\"> Download </a>";
				echo "</td></tr></table>";
				echo "</td>";
			} else {
				echo "<table width=100% height=100%>";
				echo "<tr height=10% align='center'><td colspan=2>Payment Option</td></tr>";
				echo "<tr align='center'><td width=40%>Card Name</td><td>$imgname</td></tr>";
				echo "<tr align='center'><td>Care Price</td><td>$imgprice</td></tr>";
				echo "<tr align='center'><td>Other details</td><td>$imgdesc</td></tr>";
				echo "<tr align='center'><td colspan=2>";
				echo "<form method=\"get\" action=\"index.php\"><input type=\"hidden\" name=\"task\" value=\"payment_Option\" /><input type=\"hidden\" name=\"id\" value=\"$item_id\" /><input type=\"submit\" value=\"Buy Now\" style=\"width:130px;height:40px\" /></form></td></tr></table>";
				echo "</td>";
			}
        ?></tr>
    </table>
</div>