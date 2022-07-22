<?php
include_once('connect.php');
   
    if(isset($_POST['show']))
   {
      $pid=$_POST['select'];
      $query=mysql_query("select * from add_item where Item_Name='$pid'");
      while($idsh=mysql_fetch_array($query))
      {
         $p_id=$idsh['id'];
	     $item=$idsh['Item_Name'];
	     $rate=$idsh['Rate'];
      }
   }
 
   if(isset($_POST['add']))
   {
      $billno=$_POST['Billno'];
	  $dates=$_POST['date'];
	  $product_id=$_POST['pid'];
	  $items=$_POST['item'];
	  $qtys=$_POST['qty'];
	  $rates=$_POST['rate'];
	  
	  mysql_query("insert into billing(Billno,Date,p_id,item,qty,rate) values('$billno','$dates','$product_id','$items','$qtys','$rates') ");
   }
	
	
	$query=mysql_query("select Billno1 from bill_details");
	$pid=0;
	while($idsh = mysql_fetch_array($query))
	{
	if($pid<$idsh['Billno1'])
	$pid=$idsh['Billno1'];
	}
	$pid++;
	   
   if(isset($_POST['save']))
   {  
      $billno1=$_POST['Billno1'];
	  $dates1=$_POST['date1'];
	  $total=$_POST['total'];
	  mysql_query("insert into bill_details(Billno1,Date1,total) values('$billno1','$dates1','$total') ");
	  
	  $query=mysql_query("select Billno1 from bill_details");
	$pid=0;
	while($idsh = mysql_fetch_array($query))
	{
	if($pid<$idsh['Billno1'])
	$pid=$idsh['Billno1'];
	}
	$pid++;
    }
   
$date=date("Y-m-d");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="css/Billing.css" rel="stylesheet" type="text/css" />
<link href="css/table.css" rel="stylesheet" type="text/css" />
</head>

<body>
<form action="" method="POST">
<center><br /><hr size="5" color="#FF0000" /><br />
<h1>Billing</h1>
<br /><hr size="5" color="#FF0000" />
<br />
</center>
<a href="index.php"><img src="img/Back button.png" width="150" height="50" /></a>
<br /><br />
<a href="Billing.php"><div class="new">New Billing</div></a>
<br />
<center>
<table>
<tr>
<th>Select Item</th>
<th></th>
</tr>
<tr>
<th>
<select class="text" name="select">
          <option>--None--</option>
	 <?php
        $sql = "SELECT Item_Name FROM  add_item  WHERE 1";
        $query = mysql_query($sql);
		$cnt=1;
        while($rs = mysql_fetch_object($query))
        { 
		  $RES=stripslashes($rs->Item_Name);
		  //echo "<option value='$RES'> $RES </option>"; 
		  echo '<option value="'.$RES.'">'.$RES.' '.$RAS.'</option>';
          $cnt++;
		}
     ?>
  
     </select>
</th>
<th><input type="submit" name="show" value="Show" class="btn" /></th>
</tr>
</table>
<br />
<table>
<tr>
<th>Bill No.</th>
<th>Date</th>
<th>P_id</th>
<th>Product Name</th>
<th>Qty</th>
<th>Rate</th>
</tr>
<tr>
<th><input type="text" name="Billno" class="text" value="<?php echo $pid ?>" /></th>
<th><input type="text" name="date" class="text" value="<?php echo $date ?>" /></th>
<th><input type="text" name="pid" class="text" value="<?php echo $p_id ?>" /></th>
<th><input type="text" name="item" class="text" value="<?php echo $item ?>" /></th>
<th><input type="text" name="qty" class="text" value="" /></th>
<th><input type="text" name="rate" class="text" value="<?php echo $rate ?>" /></th>
</tr>
</table>
<br /><br />
<input type="submit" name="add" value="Add" class="btn" />
<br /><br />
<table>
<tr>
<th>Bill No.</th>
<th>Date</th>
<th>P_id</th>
<th>Product Name</th>
<th>Qty</th>
<th>Rate</th>
<th>Total</th>
</tr>
<?php
$sql12 = "SELECT * FROM billing where Billno='$billno'";
$query1 = mysql_query($sql12);
while($rs2 = mysql_fetch_object($query1))
{
?>
<tr>
<th><input type="text" name="Billno1" class="text" value="<?php echo($rs2->Billno) ?>" /></th>
<th><input type="text" name="date1" class="text" value="<?php echo($rs2->Date)  ?>" /></th>
<th><input type="text" name="pid1" class="text" value="<?php echo($rs2->p_id) ?>" /></th>
<th><input type="text" name="item1" class="text" value="<?php echo($rs2->item) ?>" /></th>
<th><input type="text" name="qty1" class="text" value="<?php echo($rs2->qty) ?>" /></th>
<th><input type="text" name="rate1" class="text" value="<?php echo($rs2->rate) ?>" /></th>
<th><input type="text" name="total" class="text" value="<?php echo($rs2->qty)*($rs2->rate) ?>" /></th>
</tr>
<?php
$amount+=($rs2->qty)*($rs2->rate);
}
?>
</table>
<br />
<table>
<tr>
<th>FinalAmount :</th>
<th><input type="text" name="total" class="text" value="<?php echo $amount ?>" /></th>
<th><input type="submit" name="save" value="Save" class="btn" /></th>
<th><a href="billprint.php">print</a></th>
</tr>
</table>
</center>
</form>
</body>
</html>
