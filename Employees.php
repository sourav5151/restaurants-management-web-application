<?php
   include_once('connect.php');
    $query=mysql_query("select Employee_id from employee_billing");
	$id=0;
	while($idsh = mysql_fetch_array($query))
	{
	if($id<$idsh['Employee_id'])
	$id=$idsh['Employee_id'];
	}
	$id++;
	
	if(isset($_POST['add']))
	{
	       
		   $employeeID=$_POST['EmployeeID'];
		   $EmployeeName=$_POST['EmployeeName'];
		   $Contact=$_POST['Contact'];
		   $Age=$_POST['Age'];
		   $Gender=$_POST['Gender'];
		   $Address=$_POST['Address'];
		   $Salary=$_POST['Salary'];
		   
		   mysql_query("INSERT INTO employee_billing(Employee_Id,Employee_Name,Contact_No,Age,Gender,Address,Salary) values('$employeeID','$EmployeeName','$Contact','$Age','$Gender','$Address','$Salary')");
	
	       $query=mysql_query("select Employee_id from employee_billing");
	       $id=0;
	       while($idsh = mysql_fetch_array($query))
	       {
	        if($id<$idsh['Employee_id'])
	        $id=$idsh['Employee_id'];
	       }
	       $id++;
	}
	
	if(isset($_POST['show']))
{
   $Ename=$_POST['select'];
   $query=mysql_query("select * from employee_billing where Employee_Name='$Ename'");
   while($idsh=mysql_fetch_array($query))
   {
       $id=$idsh['Employee_Id'];
	   $EmployeeName1=$idsh['Employee_Name'];
	   $Contact1=$idsh['Contact_No'];
	   $Age1=$idsh['Age'];
	   $Gender1=$idsh['Gender'];
	   $Address1=$idsh['Address'];
	   $Salary1=$idsh['Salary'];
   }
}

if(isset($_POST['update']))
{
   
		   $employeeID=$_POST['EmployeeID'];
		   $EmployeeName=$_POST['EmployeeName'];
		   $Contact=$_POST['Contact'];
		   $Age=$_POST['Age'];
		   $Gender=$_POST['Gender'];
		   $Address=$_POST['Address'];
		   $Salary=$_POST['Salary'];
  
  $sql=mysql_query("UPDATE employee_billing SET Employee_Name='$EmployeeName',Contact_No='$Contact',Age='$Age',Gender='$Gender',Address='$Address',Salary='$Salary' where Employee_Id='$employeeID'");
  
   
		   $employeeID="";
		   $EmployeeName="";
		   $Contact="";
		   $Address="";
		   $Salary="";

}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="css/Employees.css" rel="stylesheet" type="text/css" />
<link href="css/table.css" rel="stylesheet" type="text/css" />
</head>

<body>
<form action="" method="POST">
<center><br /><hr size="5" color="#FF0000" /><br />
<h1>Employees</h1>
<br /><hr size="5" color="#FF0000" />
<br />
</center>
<a href="index.php"><img src="img/Back button.png" width="150" height="50" /></a>
<br /><br />
<a href="Employees.php"><div class="new">Add New Employee</div></a>
<br />
<center>
<table>
<tr>
<th>E_id</th>
<th>Employee Name</th>
<th>Contact</th>
<th>Age</th>
<th>Gender</th>
<th>Address</th>
<th>Salary</th>
</tr>
<tr>
<th><input type="text" name="EmployeeID" class="text" value="<?php echo $id ?>" /></th>
<th><input type="text" name="EmployeeName" class="text" value="<?php echo $EmployeeName1 ?>" /></th>
<th><input type="text" name="Contact" class="text" value="<?php echo $Contact1 ?>" /></th>
<th><input type="text" name="Age" class="text" value="<?php echo $Age1 ?>" /></th>
<th><input type="text" name="Gender" class="text" value="<?php echo $Gender1?>" /></th>
<th><input type="text" name="Address" class="text" value="<?php echo $Address1 ?>" /></th>
<th><input type="text" name="Salary" class="text" value="<?php echo $Salary1 ?>" /></th>
</tr>
</table>
<br /><br />
<input type="submit" name="add" value="Add" class="btn" />
<input type="submit" name="update" value="Update" class="btn" />
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
        $sql = "SELECT Employee_Name FROM  employee_billing  WHERE 1";
        $query = mysql_query($sql);
		$cnt=1;
        while($rs = mysql_fetch_object($query))
{ 
		$RES=stripslashes($rs->Employee_Name);
		
	
		//echo "<option value='$RES'> $RES </option>"; 
		echo '<option value="'.$RES.'">'.$RES.' '.$RAS.'</option>';
          $cnt++;
		
		}
     ?>
  
     </select>

</th>
<th><input type="submit" value="Show" name="show" class="btn" /></th>
</tr>
</table>
</center>
</form>
</body>
</html>
