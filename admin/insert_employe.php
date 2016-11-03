<?php
if(!isset($_SESSION['username']))
{
echo "<script>window.open('index.php?not_admin=You are not an Admin','_self')</script>";
}
else
{
?>
<div class="menubar">	
	<div class="search-container" style="margin-left:200px;">			
				<form method="get" action="admin.php" >
						<input type="text" name="search4" placeholder="search item in store..."></input>
						<button type="submit" name="btnSearch4" class="search-button"><i class="fa fa-search fa-lg" aria-hidden="true"></i></button>
					</form>				
	</div>	
	</div>
<form action="" method="post" enctype="multipart/form-data" style=" margin-left:100px;" >

<table align="center" width="795" border="2">
			<tr align="center">
			   <td colspan="8"><h2 style=" text-align: center;">Insert New Employees here</h2></td>
			</tr>

			<tr>
			   <td align="right"><b>Employee Name:</b></td>
			   <td><input type="text" name="new_employee_name" size="60" required></td>
			</tr>
			<tr>
			   <td align="right"><b>Employee Email:</b></td>
			   <td><input type="text" name="new_employee_email" size="60" required></td>
			</tr>
			<tr>
			   <td align="right"><b>Employee Category:</b></td>
			   <td>
				<select name="new_employee_cat" required>
				<option>Select a Category</option>
				<?php
				include ("php/server.php");
                  $q1 = "select * from employeecate";
                  $stmt = $conn->prepare($q1);
                  $stmt->execute();
                  $myResult = $stmt->fetchAll(PDO::FETCH_ASSOC);
                  for ($i = 0; $i < count($myResult); $i++) {
                  $cat_id=  $myResult[$i]['emp_cat_id'] ; 
                  $cat_title=  $myResult[$i]['description'] ;  	 	
                 echo"<option value='$cat_id'>$cat_title</option>";
                  }
               ?>
				</select>
				</td>
			   			<tr>
			   <td align="right"><b>Employee password:</b></td>
			   <td><input type="password" name="new_employee_pass" size="60" required></td>
			</tr>
			<tr>
			   <td align="right"><b>Employee Verification Number:</b></td>
			   <td><input type="password" name="new_employee_vnum" size="60" required></td>
			</tr>
			

<tr align="center">
			    <td colspan="7"><input type="submit" name="add_employee" value="Add Employee Now" /></td>
</tr>
</table>
</form>

<?php
 include ("php/server.php");
 if(isset($_POST['add_employee']))
 {
 $new_employee_name= $_POST['new_employee_name'];
 $new_employee_email= $_POST['new_employee_email'];
 $new_employee_cat= $_POST['new_employee_cat'];
 $new_employee_pass= $_POST['new_employee_pass'];
 $new_employee_vnum= $_POST['new_employee_vnum'];

$q1= "insert into employee (emp_name,emp_email,emp_cat,emp_password,emp_verfication_numb) values('$new_employee_name','$new_employee_email','$new_employee_cat',' $new_employee_pass','$new_employee_vnum')";
$smt= $conn->prepare($q1);
if ($smt->execute())
{
echo "<script>alert('New Employee has been added')</script>";
echo "<script>window.open('admin.php?view_employes','_self')</script>";
}
}


?>
<?php }?>

 


