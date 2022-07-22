<?php
include_once('connect.php');
$time=date("h:i:sa");
$date=date('Y-m-d');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Aaeena Hotel</title>
<link href="css/styles.css" rel="stylesheet" type="text/css" />
<style>
.inp
{
  background-color:none;
  border:none;
}
.i
{
  width:120px;
  border:none;
  text-align:center;
  font-size:18px;
}
</style>
</head>

<body>
 
<button onclick="print()" class="print">Print</button>
<p>
</p>
<table width="900" id="borderaa" height="120">
<tr>
<td valign="top" align="center"><font color="#FF0000" face="Arial , Gadget, sans-serif"></font>
</td>
<td align="center">
</td>
<td valign="top" align="center"> <font color="#FF0000" face="Arial , Gadget, sans-serif"> </td>
</tr>
</table>
<font face="Arial, Helvetica, sans-serif">
<center>
<div id="mndivbb">

<center><font size="2" color="#000000"><strong>Moiz Billing</strong></font></center><br />
<table width="900" id="dis">
<tr>
<td width="100"><font color="#000000"><strong>Bill No:-</strong></font></td>
<td width="296"><font color="#000000"><strong>
   <?php

$query=mysql_query("SELECT Billno1 FROM bill_details WHERE 1"); 
 
	while($ids=mysql_fetch_array($query))
	{	
	
	$billing=$ids['Billno1'];
	}
	?>
    <?php
        $sql = "SELECT Billno1 FROM bill_details  WHERE 1";
        $query = mysql_query($sql);
		$cnt=1;
        while($rs = mysql_fetch_object($query))
        { 
		  $RES=stripslashes($rs->Billno1);
		  $cnt++;
		}
     ?>
<label class="i" name="ffname"  value=""><?php echo $billing?></label>
     <!--<datalist id="datalist1">-->
     
	
</strong></font></td>
<td width="62"><font color="#000000"><strong> Date:-</strong></font></td>
<td width="326"><font color="#000000"><strong><?php echo $date ?></strong></font></td>
<td width="62"><font color="#000000"><strong> Time:-</strong></font></td>
<td width="326"><font color="#000000"><strong><?php echo $time ?></strong></font></td>
</tr>
</table>
<hr size="1" color="#666666"/>
<table width="898" cellspacing="0" >
<tr>
<th width="300" class="bort"><font color="#000000" size="3">Prouct Name</font></th>
<th width="100" class="bort"><font color="#000000" size="3">Rate</font></th>
<th width="100" class="bort"><font color="#000000" size="3">Qty</font></th>
<th width="300" class="bortr"><font color="#000000" size="3">Amount</font></th>
</tr>
<?php

$query=mysql_query("SELECT * FROM billing where Billno='$RES' "); 
 
	while($ids=mysql_fetch_array($query))
	{	
	
	$rate=$ids['rate'];
	$qty=$ids['qty'];
	$productname=$ids['item'];
	
	?>
<tr>
<td class="bortt"><font color="#000000" size="2"><?php echo $productname ?></font></td>
<td class="bortt"><font color="#000000" size="2"><?php echo $rate ?></font></td>
<td class="bortt"><font color="#000000" size="2"><?php echo $qty ?></font></td>
<td class="bortt"><font color="#000000" size="2"><?php echo $rate*$qty ?></font></td>
</tr>
<?php
    $totals=$rate*$qty;
	$final+=$totals;
	}
?>
</table>
<hr size="1" color="#666666" />
<table width="900">
<tr>
<td width="72"><font color="#000000" size="2"><strong> </strong></font></td>
<td width="82"><font color="#000000" size="2"><?php  ?></font></td>
<td width="121"><font color="#000000" size="2"><strong> </strong></font></td>
<td width="78"><font color="#000000" size="2"><?php  ?></font></td>
<td width="121"><font color="#000000" size="2"><strong> </strong></font></td>
<td width="78"><font color="#000000" size="2"><?php  ?></font></td>
<td width="121"><font color="#000000" size="2"><strong> </strong></font></td>
<td width="78"><font color="#000000" size="2"><?php  ?></font></td>
<td width="100"><font color="#000000" size="2"><strong>Final Amount :</strong></font></td>
<td width="63"><font color="#000000" size="3"><strong><?php echo $final ?></strong></font> <img src="images/rupee.png" width="10" height="13" /></td>
</tr>
</table>
</div>
</center>
</body>
</html>
