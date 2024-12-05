<div id="create_catg"><center><br>
	<h><b>CREATE NEW CATEGORIES HERE</b></h>
    <?php 
		if(isset($_GET['msg'])) 
		{
			if($_GET['msg'] == "cat_exist")
				echo "<br>Category already exist";
			elseif($_GET['msg'] == "cat_created")
				echo "<br>Category Created successfully";
		}
	?>
	<form method="get" action="insert_cat.php">
	<table align="center" border=1 cellpadding=10 width=60%>
		<tr align="center">
			<td>ENTER NEW CATEGORY NAME</td>
			<td><input type="text" name="c_name" placeholder="Enter Category Name" size=30></td>
        </tr> 
        <tr align="center">
			<td>CHOOSE CATEGORY TYPE</td>
			<td>
            	<select name="c_type" size="1">
				<option>NONE</option>
				<option>primary</option>
				<option>secondary</option>
			    </select>
			</td>
          	</tr>
		<tr align="center">
			<td>CHOOSE PRE CATEGORY NAME</td>
			<td>
            	<select name="c_pname" size="1">
                <option>NONE</option>
                <?php
					include("dbconnect.inc");
					$rscat = mysql_query("select * from category_details where c_type='primary'",$con);
					while($x=mysql_fetch_array($rscat))
					{
						$id=$x['c_id'];
						echo "<option value='$id'>";
						echo $x["c_name"];
						echo "</option>";
					}
		?>
			    </select>
			</td>
		</tr>
		<tr align="center">
			<td><input type="submit" value="OK" style="width:130px;height:40px"></td>
			<td><input type="Reset" value="RESET" style="width:130px;height:40px"></td><br>
		</tr>  
	</table>
</form>
</center>
</div>