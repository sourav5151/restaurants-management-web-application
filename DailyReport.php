<?php
   include_once('connect.php');

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="css/DailyReport.css" rel="stylesheet" type="text/css" />
<link href="css/table.css" rel="stylesheet" type="text/css" />
</head>

<body>
<form action="" method="POST">
<center><br /><hr size="5" color="#FF0000" /><br />
<h1>Daily Report</h1>
<br /><hr size="5" color="#FF0000" />
<br />
</center>
<a href="index.php"><img src="img/Back button.png" width="150" height="50" /></a>
<br /><br />
<a href="DailyReport.php"><div class="new">Serch New Data</div></a>
<br />
<center>
<table>
<tr>
<th>From Date</th>
<th>To Date</th>
<th></th>
</tr>
<tr>
<th><input type="date" name="to_date" class="text" value="" required/></th>
<th><input type="date" name="from_date" class="text" value="" required/></th>
<th><input type="submit" name="show" value="Show" class="btn" /></th>
</tr>
</table>
<br /><br />
<table width="60%">
<tr>
<th>Bill No</th>
<th>Date</th>
<th>Amount</th>
<th>History</th>
</tr>
<?php
if(isset($_POST['show']))
    {
       $todate=$_POST['to_date'];
	   $fromdate=$_POST['from_date'];
	   $query=mysql_query("select * from bill_details where Date1>='$todate' && Date1<='$fromdate' ");
      while($idsh=mysql_fetch_array($query))
      {
        $billid=$idsh['Billno1'];
	    $Date=$idsh['Date1'];
	    $Amount=$idsh['total'];
?>
<tr>
<th><input type="text" name="billno" class="text" value="<?php echo $billid ?>" /></th>
<th><input type="text" name="Date" class="text" value="<?php echo $Date ?>" /></th>
<th><input type="text" name="amount" class="text" value="<?php echo $Amount ?>" /></th>
<th><a href="#"><img src="img/eye.png" width="30" height="30" /></a></th>
</tr>
<?php
 }
}
?>
</table>
</center>
</form>
</body>
</html>
