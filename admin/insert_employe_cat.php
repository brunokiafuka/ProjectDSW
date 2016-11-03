<?php
if(!isset($_SESSION['username']))
{
echo "<script>window.open('index.php?not_admin=You are not an Admin','_self')</script>";
}
else
{
?>
<form action="" method="post" enctype="multipart/form-data" style=" margin-left:100px;" >

<table align="center" width="795" border="2">
			<tr align="center">
			   <td colspan="8"><h2 style=" text-align: center;">Insert New Employees Category here</h2></td>
			</tr>

			<tr>
			   <td align="right"><b>Category Title:</b></td>
			   <td><input type="text" name="new_employee_cat_title" size="60" required></td>
			</tr>
			

<tr align="center">
			    <td colspan="7"><input type="submit" name="add_employee" value="Add Category Now" /></td>
</tr>
</table>
</form>

<?php
 include ("php/server.php");
 if(isset($_POST['add_employee']))
 {
 $new_employee_cat_title= $_POST['new_employee_cat_title'];

$q1= "insert into employeecate (description) values('$new_employee_cat_title')";
$smt= $conn->prepare($q1);
if ($smt->execute())
{
echo "<script>alert('New Employee Category has been added')</script>";
echo "<script>window.open('admin.php?view_employes_cat','_self')</script>";
}
}


?>
<?php }?>

 


