<?php 
session_start();
include ("php/server.php");

if(!isset($_SESSION['username']))
{
echo "<script>window.open('index.php?not_admin=You are not an Admin','_self')</script>";
}
else
{
if(isset($_GET['delete_emp_cat']))
{
	$delete_emp=$_GET['delete_emp_cat'];
	$q1="delete from employeecate where emp_cat_id='$delete_emp'";
	$smt= $conn->prepare($q1);
	if($smt->execute())
	{
		echo "<script>alert('A Category has been deleted')</script>";
		echo "<script>window.open('admin.php?view_employes_cat','_self')</script>";
	}
	

}


?>
<?php } ?>
