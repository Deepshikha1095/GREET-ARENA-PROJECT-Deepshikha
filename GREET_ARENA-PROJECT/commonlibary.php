<?php
function displayTable($sql)
{

  setcookie("itemid",15,time() + 3 * 60 *60);
   
   require_once("dbconnect.inc");
   

   $rs= mysql_query($sql);
   
   $col=mysql_num_fields($rs);
   
   $tabname=mysql_field_table($rs,0);
   $firstcol=mysql_field_name($rs,0);
   
   
  // echo $tabname;
   
   echo"<br>";
      
   $row=mysql_num_rows($rs);
   
   echo "<form method='get' action='deleteselected_items.php'>";
   echo "<input type='hidden' name='txtTable' value='$tabname'>";
   echo "<input type='hidden' name='txtCol' value='$firstcol'>";
   
   echo "<table border='1'>";
   echo "<tr>";
      echo "<th>";
       echo "Delete All";
      echo "</th>";
      echo "<br>";


      echo "<th>";
       echo "serial no.";
      echo "</th>";

   for($i=1;$i<$col;$i++)
   {
	   echo "<th>";
	   echo mysql_field_name($rs,$i);
	   	   echo "</th>";
   }
   
   echo "<th>";
    echo "Status";
   echo "</th>";   
   
      echo "</tr>";
	  
	  
	  for($i=0;$i<$row;$i++)
	  {
             if($i%2==0)
			 {
		  	   echo "<tr bgcolor='#99CCFF'>";
			 }
			 else
			 {
				 echo "<tr>";
			 }

 $rid= mysql_result($rs,$i,0);

        	    echo "<td>";
				echo "<input type='checkbox' name='chkItem[]' value='$rid'>";
		   		echo "</td>";

        	    echo "<td>";
				echo $i+1;
		   		echo "</td>";

						 
                 for($j=1;$j<$col;$j++)
				 {
				      
					 	   echo "<td>";
						   echo mysql_result($rs,$i,$j);
					   	   echo "</td>";
				 }
			   
			      echo "<td>";
				  echo "<a href='deleteData.php?tab=$tabname&col=$firstcol&id=$rid'>Delete</a>";
			      echo "</td>";
		   	   echo "</tr>";
			   
	  }
	  
   echo "</table>";
echo "<br>";

echo "<input type='submit' value='Delete Selected Item'>";
echo "<br>";

echo '<form>';
}
?>