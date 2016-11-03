<!DOCTYPE html>
<?php
 include ("php/server.php");
 if(!isset($_SESSION['username']))
{
echo "<script>window.open('index.php?not_admin=You are not an Admin','_self')</script>";
}
else
{
 if(isset($_GET['edit_act']))
 {
 $actor_id= $_GET['edit_act'];
$q3=" select * from actor where actor_id = '$actor_id' " ;
$stmt = $conn->prepare($q3);
 $stmt->execute();
		 $result = $stmt->fetch(PDO::FETCH_OBJ);
		
			
			$actor_name= $result->actor_name;
			$actor_age= $result->actor_age;
			$actor_movies= $result->actor_movieNumber;
			$actor_image= $result->actor_img;
			
}


?>

<html>
<head>

<title>Insert Product</title>
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script>tinymce.init({ selector:'textarea' });</script>
<link rel="stylesheet" type="text/css" href="style/styles.css">
<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">

</head>
<body>

<form action="" method="post" enctype="multipart/form-data" style="margin-left:100px;">

<table align="center" width="795" border="2">
			<tr align="center">
			   <td colspan="8"><h2 style=" text-align: center;">Update Actors here</h2></td>
			</tr>

			<tr>
			   <td align="right"><b>Actor Name:</b></td>
			   <td><input type="text" name="new_actor_name" size="60" value="<?php echo $actor_name;?>" required></td>
			</tr>
			<tr>
			   <td align="right"><b>Actor Age:</b></td>
			   <td><input type="text" name="new_actor_age" size="60" value="<?php echo $actor_age;?>" required></td>
			</tr>
			<tr>
			   <td align="right"><b>Actor Number of Movies:</b></td>
			   <td><input type="text" name="new_actor_movies" size="60" value="<?php echo $actor_movies;?>" required></td>
			</tr>
			<tr>
			    <td align="right"><b>Actor Image:</b></td>
			    <td><input type="file" name="new_actor_image" required /><?php echo "<img src='actor_images/$actor_image' style='width:60px; height:60px;'>" ?></td>
			</tr>

<tr align="center">
			    <td colspan="7"><input type="submit" name="add_actor" value="Update Actor Now" /></td>
</tr>
</table>
</form>
</body>
</html>
<?php

if(isset($_POST['add_actor']))
 {
 $actor_id= $_GET['edit_act'];
 $actor_name= $_POST['new_actor_name'];
 $actor_age= $_POST['new_actor_age'];
 $actor_movies= $_POST['new_actor_movies'];
 $actor_image= $_FILES['new_actor_image']['name'];
 $actor_image_tmp = $_FILES['new_actor_image']['tmp_name'];

		//crreate a file product_images into youe website folder
move_uploaded_file($actor_image_tmp ,"actor_images/$actor_image");
		 $stmt = $conn->prepare("UPDATE actor SET actor_name=:name,actor_age=:age,actor_movieNumber=:movies,actor_img=:image WHERE actor_id=:actor_id ");
         $stmt->bindValue(":actor_id", $actor_id);
         $stmt->bindValue(":name", $actor_name);
         $stmt->bindValue(":age", $actor_age);
         $stmt->bindValue(":movies", $actor_movies);
		 $stmt->bindValue(":image", $actor_image);
	
		 $stmt->execute();//inserting data into the databse
		if($stmt)
		{
			echo "<script>alert('Actor has been updated')</script>";
			echo "<script>window.open('admin.php?view_actors','_self')</script>";
		}
	}




?>

<?php }?>
