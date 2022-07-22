<?php
  include_once('connect.php');
  
   $query=mysql_query("select id from add_item");
	$id=0;
	while($idsh = mysql_fetch_array($query))
	{
	if($id<$idsh['id'])
	$id=$idsh['id'];
	}
	$id++;
	
	if(isset($_POST['add']))
	{
	       
		   $id=$_POST['id'];
		   $item=$_POST['item'];
		   $rate=$_POST['rs'];
		   
		   mysql_query("INSERT INTO add_item(id,Item_Name,Rate) values('$id','$item','$rate')");
	
	       $query=mysql_query("select id from add_item");
	       $id=0;
	       while($idsh = mysql_fetch_array($query))
	       {
	        if($id<$idsh['id'])
	        $id=$idsh['id'];
	       }
	       $id++;
	}
	
	if(isset($_POST['show']))
{
   $pid=$_POST['select'];
   $query=mysql_query("select * from add_item where Item_Name='$pid'");
   while($idsh=mysql_fetch_array($query))
   {
      $id=$idsh['id'];
	  $itema=$idsh['Item_Name'];
	  $ratea=$idsh['Rate'];
   }
}

if(isset($_POST['update']))
{
   $pno=$_POST['id'];
   $pitem=$_POST['item'];
   $prate=$_POST['rs'];
  
  $sql=mysql_query("UPDATE add_item SET Item_Name='$pitem',Rate='$prate' where id='$pno'");
  
   $type="";
  $size="";
  $quantity="";
  $quality="";
  $rate="";

}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="css/Add Item.css" rel="stylesheet" type="text/css" />
<link href="css/table.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
   var a=getElementById('id');
   a.disable=true;
</script>
</head>

<body>
<form action="" method="POST">
<center><br /><hr size="5" color="#FF0000" /><br />
<h1>Add Products / Items</h1>
<br /><hr size="5" color="#FF0000" />
<br />
</center>
<a href="index.php"><img src="img/Back button.png" width="150" height="50" /></a>
<br /><br />
<a href="AddItem.php"><div class="new">Add New Item/Product</div></a>
<br />
<center>
<table>
<tr>
<th>P_id</th>
<th>Product Name</th>
<th>Rate</th>
</tr>
<tr>
<th><input type="text" name="id" class="text" value="<?php echo $id ?>" /></th>
<th><input type="text" name="item" class="text" value="<?php echo $itema ?>" /></th>
<th><input type="text" name="rs" class="text" value="<?php echo $ratea ?>" /></th>
</tr>
</table>
<br /><br />
<input type="submit" name="add" value="Add" id="btn" onclick="cal()" class="btn" />
<input type="submit" name="update" value="Update" id="btn1" class="btn" />
<br /><br /><br />
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
</center>
</form>
</body>
</html>
