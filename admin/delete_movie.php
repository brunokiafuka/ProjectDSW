<?php 
session_start();
include ("php/server.php");

if(!isset($_SESSION['username']))
{
echo "<script>window.open('index.php?not_admin=You are not an Admin','_self')</script>";
}
else
{
if(isset($_GET['delete_pro']))
{
	$delete_id=$_GET['delete_pro'];
	$q1="delete from movies where movie_id='$delete_id'";
	$smt= $conn->prepare($q1);
	if($smt->execute())
	{
		echo "<script>alert('A Product has been deletedd')</script>";
		echo "<script>window.open('admin.php?view_movies','_self')</script>";
	}
	

}


?>
<?php } ?>