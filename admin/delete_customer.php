<?php 
session_start();
include ("php/server.php");
if(!isset($_SESSION['username']))
{
echo "<script>window.open('index.php?not_admin=You are not an Admin','_self')</script>";
}
else
{
if(isset($_GET['delete_c']))
{
	$delete_cust=$_GET['delete_c'];
	$q1="delete from customer where cust_id='$delete_cust'";
	$smt= $conn->prepare($q1);
	if($smt->execute())
	{
		echo "<script>alert('A customer has been deletedd')</script>";
		echo "<script>window.open('admin.php?view_customers','_self')</script>";
	}
	

}


?>
<?php }?>