<div id="mainOption">
<table align="center" cellpadding=10 width=400 height=30>
<tr align="center">
	<td><a href="index.php">Home</a></td>
	<?php
		if(isset($_COOKIE['advanced']) && $_COOKIE['advanced'] == "1")
			echo "<td><a href=\"index.php?task=adminPanel\">Admin Panel</a></td>";
		if(!isset($_COOKIE['user_name']))
			echo "<td><a href=\"index.php?task=login\">Login</a></td><td><a href=\"index.php?task=reg_form\">Sign Up</a></td>";
		else
			echo "<td><a href=\"logout.php\">Logout</a></td>";
	?>
    <td><a href="index.php?task=help">Help</a></td>
</tr>
</table>
</div>