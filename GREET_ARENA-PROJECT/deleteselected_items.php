<?php
// LINK OF COMMONLIBRARY.PHP
$a=$_REQUEST['chkItem'];
$b=$_REQUEST['txtTable'];
$c=$_REQUEST['txtCol'];

$s="";

foreach($a as $i)
{
	$s=$s.",".$i;

}

$s=substr($s,1);
echo "SERIAL NO.=$s CARD SUCCESSFULLY DELETED!";

include("dbconnect.inc");

mysql_query("delete from $b where $c in($s) ");

?>