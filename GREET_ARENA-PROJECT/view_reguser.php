<div id="view_reguser"><center><br />REGISTERED USERS ARE-

<?php
//link of admin_panel.php

include("dbconnect.inc");
$rsRegUser=mysql_query("select * from user_info where u_type='user'",$con);

echo "<table border='1'>";
echo "<tr><th>User ID</th><th>User Name</th><th>First name</th><th>Last name</th><th>Address</th><th>E-mail</th><th>Mobile</th><th>Gender</th></tr>";
while($row=mysql_fetch_array($rsRegUser))
{
echo "<tr>";

	echo "<td>";
	echo $row["u_id"];
	echo "</td>";
	echo "<br>";
	
	echo "<td>";
	echo $row["u_name"];
	echo "</td>";


	echo "<td>";
	echo $row["ufirst_name"];
	echo "</td>";

	echo "<td>";
	echo $row["ulast_name"];
	echo "</td>";

	echo "<td>";
	echo $row["u_address"];
	echo "</td>";

	echo "<td>";
	echo $row["u_email"];
	echo "</td>";

	echo "<td>";
	echo $row["u_mobile"];
	echo "</td>";

	echo "<td>";
	echo $row["u_gender"];
	echo "</td>";

echo "</tr>";
}
echo "</table>";

?>
</center></div>