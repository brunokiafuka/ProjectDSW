<?php 
session_start();
include ("php/server.php");

if(!isset($_SESSION['username']))
{
echo "<script>window.open('index.php?not_admin=You are not an Admin','_self')</script>";
}
else
{
if(isset($_GET['delete_emp']))
{
	$delete_emp=$_GET['delete_emp'];
	$q1="delete from employee where emp_id='$delete_emp'";
	$smt= $conn->prepare($q1);
	if($smt->execute())
	{
		echo "<script>alert('An Employee has been deleted')</script>";
		echo "<script>window.open('admin.php?view_employes','_self')</script>";
	}
	

}


?>
<?php } ?>
