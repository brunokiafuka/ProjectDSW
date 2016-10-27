<?php 
session_start();
include ("php/server.php");
if(!isset($_SESSION['username']))
{
echo "<script>window.open('index.php?not_admin=You are not an Admin','_self')</script>";
}
else
{
if(isset($_GET['delete_act']))
{
	$delete_actor=$_GET['delete_act'];
	$q1="delete from actor where actor_id='$delete_actor'";
	$smt= $conn->prepare($q1);
	if($smt->execute())
	{
		echo "<script>alert('An Actor has been deletedd')</script>";
		echo "<script>window.open('admin.php?view_actors','_self')</script>";
	}
	

}


?>
<?php }?>