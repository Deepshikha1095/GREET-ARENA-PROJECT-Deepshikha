<html>
<head>
      <title>HOME</title>
      <link href="style.css" type="text/css" rel="stylesheet">
</head>
<body>
<div id="main">
	<div id="companytitle"><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Greeting Arena</div>
	<?php include("header_menu.php"); ?>
	<?php include("header_login_panel.php"); ?>
</div>

<?php
	if(isset($_GET['task']) && $_GET['task'] == "adminPanel" && isset($_COOKIE['advanced']) && $_COOKIE['advanced'] == 1)
	{
		if(!isset($_GET['view']))
			include('admin_panel.php');
		else
			include($_GET['view'].'.php');
	} elseif(isset($_REQUEST['task'])) {
		include($_REQUEST['task'].'.php');
	} else {
		include("slideShow.php"); 
	}
?>

<!--FOOTER-->
<div id="footer">
	<div id="footmenu">
		<ul>
			<li><a href="index.php?task=contact_us">Contact And Support</a></li>
		</ul>
	</div>
</div>
</body>
</html>