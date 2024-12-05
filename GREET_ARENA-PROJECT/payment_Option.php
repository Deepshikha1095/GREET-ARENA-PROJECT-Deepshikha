<div id="myPaymantOptions"><form method="post" action="process_Payment.php">
	<table width=100% height=100%>
    	<tr height=30 align="center"><td colspan=2>Payment Options</td></tr>
    	<tr align="center">
        	<td width=25%>
            	<table width=100% height=100% border=1>
                	<tr align="center"><td><a href='index.php?task=payment_Option&&id=<?php echo $_GET["id"]; ?>&&pm=cc'>Credit Card</a></td></tr>
                    <tr align="center"><td><a href='index.php?task=payment_Option&&id=<?php echo $_GET["id"]; ?>&&pm=dc'>Debit Card</a></td></tr>
                    <tr align="center"><td><a href='index.php?task=payment_Option&&id=<?php echo $_GET["id"]; ?>&&pm=ib'>Internet Banking</a></td></tr>
                </table>
            </td>
            <td><?php
				$item_id = $_GET["id"];
				if(isset($_GET["pm"]) && ($_GET["pm"] == "cc" || $_GET["pm"] == "dc")) {	//Card payment
					echo "<table width=100% height=100% border=1><tr height=10% align='center'><td colspan=2>";
					if($_GET["pm"] == "cc")
						echo "Credit Card Details";
					else
						echo "Debit Card Details";
					echo "</td></tr>
						<tr align='center'><td width=30%>Card Number</td><td><input type=\"text\" name=\"card_num\" placeholder=\"Enter your Card Number\" size=50/></td></tr>
						<tr align='center'><td>Name on Card</td><td><input type=\"text\" name=\"name_on_card\" placeholder=\"Enter Name written on Card\" size=50/></td></tr>
						<tr align='center'><td>Expiry Date</td><td><input type=\"text\" name=\"card_exp_month\" placeholder=\"MM\" size=1/><input type=\"text\" name=\"card_exp_year\" placeholder=\"YY\" size=1/></td></tr>
						<tr align='center'><td>CVV Number</td><td><input type=\"text\" name=\"card_cvv\" placeholder=\"CVV\" size=2/></td></tr>
						<tr align='center'><td colspan=2><input type=\"hidden\" name=\"id\" value=\"$item_id\" /><input type=\"hidden\" name=\"mop\" value=\"cc-dc\" /><input type=\"submit\" value=\"Proceed\" style=\"width:130px;height:40px\"></td></tr></table>";
				} elseif(isset($_GET["pm"]) && $_GET["pm"] == "ib") {	//Internet Banking
					echo "<table width=100% height=100% border=1>
						<tr height=10% align='center'><td colspan=2>Select your Bank</td></tr>
						<tr align='center'><td>List of Bank</td>
							<td><select name=\"banks\">
								<option value=\"0\"></option>
								<option value=\"sbi\">State Bank of India</option>
								<option value=\"axis\">Axis</option>
								<option value=\"icici\">ICICI</option>
								<option value=\"hdfc\">HDFC</option>
								<option value=\"citi\">Citi Bank</option>
  							</select></td></tr>
						<tr align='center'><td colspan=2><input type=\"hidden\" name=\"id\" value=\"$item_id\" /><input type=\"hidden\" name=\"mop\" value=\"im\" /><input type=\"submit\" value=\"Proceed\" style=\"width:130px;height:40px\"></td></tr></table>";
				} else {
					echo "Please select any Payment method";
				}
			?></td>
        </tr>
    </table></form>
</div>