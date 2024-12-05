<div id="insert_cards"><center>
	<h align="center"><b>INSERT NEW CARDS</b></h>
    <?php 
		if(isset($_GET['msg'])) {
			if($_GET['msg'] == "card_inserted")
				echo "<br>Card Submitted Successfully";
			elseif ($_GET["msg"] == "card_not_inserted")
				echo "<br>Card cannot be inserted !";
		}
	?>
	<form method="post" action="insert_items.php" enctype="multipart/form-data">
	<table align="center" width=50% cellpadding=10 border=1>
		<tr align="center">
            <td>CHOOSE CATEGORY NAME TO INSERT CARD</td>
            <td><select name="card_catname" size="1">
			<?php	
				include("dbconnect.inc");	
				$rs_items=mysql_query("select c_name from category_details where c_type='secondary'",$con);

				while($row=mysql_fetch_array($rs_items))
				{
				$catg=$row['c_name'];
				echo "<option value='$catg'>";
				echo $catg;
				echo "</option>";
				}
			?>
			</select></td>
        </tr>
		<tr align="center">
            <td>ENTER CARD NAME</td>
            <td><input type="text" name="card_name" placeholder="Enter Card name" size=30 ></td>
        </tr>
        <tr align="center">
            <td>CHOOSE CARD RATE</td>
            <td><input type="text" name="card_rate" placeholder="Enter Card rate" size=30 ></td>
        </tr> 
		<tr align="center">
            <td>ENTER CARD INFO</td>
            <td><input type="text" name="card_info" placeholder="Enter Card info" size=30 ></td>
        </tr>           
		<tr align="center">
            <td>UPLOAD NEW CARD</td>
            <td><input type="file" name="txtfile"></td>
        </tr>  
        <tr height=10></tr>
		<tr align="center">
            <td><input type="submit" value="OK" style="width:130px;height:40px"></td>
            <td><input type="reset" value="RESET" style="width:130px;height:40px"></td><br>
        </tr>  
	</table>
	</form></center>
</div>