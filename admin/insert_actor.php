<?php
if(!isset($_SESSION['username']))
{
echo "<script>window.open('index.php?not_admin=You are not an Admin','_self')</script>";
}
else
{
?>
<form action="" method="post" enctype="multipart/form-data" style="padding:80px;">

<table align="center" width="795" border="2">
			<tr align="center">
			   <td colspan="8"><h2 style=" text-align: center;">Insert New Actors here</h2></td>
			</tr>

			<tr>
			   <td align="right"><b>Actor Name:</b></td>
			   <td><input type="text" name="new_actor_name" size="60" required></td>
			</tr>
			<tr>
			   <td align="right"><b>Actor Age:</b></td>
			   <td><input type="text" name="new_actor_age" size="60" required></td>
			</tr>
			<tr>
			   <td align="right"><b>Actor Number of Movies:</b></td>
			   <td><input type="text" name="new_actor_movies" size="60" required></td>
			</tr>
			<tr>
			    <td align="right"><b>Actor Image:</b></td>
			    <td><input type="file" name="new_actor_image" required /></td>
			</tr>

<tr align="center">
			    <td colspan="7"><input type="submit" name="add_actor" value="Add Actor Now" /></td>
</tr>
</table>
</form>

<?php
 include ("php/server.php");
 if(isset($_POST['add_actor']))
 {
 $new_actor_name= $_POST['new_actor_name'];
 $new_actor_age= $_POST['new_actor_age'];
 $new_actor_movies= $_POST['new_actor_movies'];
 $new_actor_image= $_FILES['new_actor_image']['name'];
 $new_actor_image_tmp = $_FILES['new_actor_image']['tmp_name'];

		//crreate a file product_images into youe website folder
move_uploaded_file($new_actor_image_tmp ,"actor_images/$new_actor_image");

$q1= "insert into Actor (actor_name,actor_age,actor_movieNumber,actor_img) values('$new_actor_name','$new_actor_age','$new_actor_movies','$new_actor_image')";
$smt= $conn->prepare($q1);
if ($smt->execute())
{
echo "<script>alert('New Actor has been added')</script>";
echo "<script>window.open('admin.php?view_actors','_self')</script>";
}
}


?>
<?php }?>