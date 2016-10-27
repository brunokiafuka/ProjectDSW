<!DOCTYPE html>
<?php
if(!isset($_SESSION['username']))
{
echo "<script>window.open('index.php?not_admin=You are not an Admin','_self')</script>";
}
else
{
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

<?php
include ("php/server.php");


if(isset($_GET['search'])){
if(isset($_GET['btnSearch']))
{
$search_query= $_GET['search'];

$q3=" select * from movies where movie_keywords like '%$search_query%' " ;
$stmt = $conn->prepare($q3);
 $stmt->execute();
		while( $result = $stmt->fetch(PDO::FETCH_OBJ))
		{
			$movie_id = $result->movie_id;
			$movie_title= $result->movie_title;
			$movie_price = $result->movie_price;
			$movie_genre = $result->movie_genre;
			$actor_id = $result->actor_id;

	              $q1 = "SELECT actor_name FROM `actor` WHERE actor_id='$actor_id'";
                  $stmt = $conn->prepare($q1);
                  $stmt->execute();
                  while( $result1 = $stmt->fetch(PDO::FETCH_OBJ))
		         {
             $actor_name = $result1->actor_name;
                  }

			$movie_year = $result->movie_year;
			$movie_keywords = $result->movie_keywords;
			$movie_desc = $result->movie_description;
			$movie_type= $result->movie_type;
			$movie_stock = $result->movie_stock;
			$movie_image = $result->movie_image;
			
			


				echo "
				<form action='result.php' method='post' enctype='multipart/form-data' style='margin-top:17%'>
		<table align='center' width='700' border='2'>
			<tr align='center'>
			   <td colspan='8'><h2 style='' background-color: orage; text-align: center;''>Insert new Movies here</h2></td>
			</tr>

            <tr>
			   <td align='right'><b>Movie Id:</b></td>
			   <td><input type='text' name='movie_id' size='60' value='$movie_id' required /></td>
			</tr>

				<tr>
			   <td align='right'><b>Movie Title:</b></td>
			   <td><input type='text' name='movie_title' size='60' value='$movie_title' required /></td>
			</tr>
			<tr>
			    <td align='right'><b>Movie Price:</b></td>
			    <td><input type='text' name='movie_price' size='60' value='$movie_price' required /></td>
			</tr>

			<tr>
			    <td align='right'><b>Movie Genre:</b></td>
			    <td><input type='text' name='movie_genre' size='60' value='$movie_genre' required /></td>
			</tr>

			<tr>
			    <td align='right'><b>Actor Name:</b></td>
				<td>
                   <select name='actor_name' required>
				<option value='$actor_id'>$actor_name</option>
				   </select>
				</td>
			</tr>

			<td align='right'><b>Movie Year:</b></td>
			    <td><input type='text' name='movie_year' size='60'  value='$movie_year'required /></td>
			</tr >
            <tr>
			    <td align='right'><b>Movie Image:</b></td>
			    <td><input type='file' name='movie_image' required /><img src='movie_images/$movie_image' style='width:60px; height:60px;'></td>
			</tr>

			<tr>
			    <td align='right'><b>Movie Description:</b></td>
			    <td><textarea name='movie_desc' cols='20' rows='10'>$movie_desc</textarea></td>
			</tr>

			<tr>
			    <td align='right'><b>Movie Type:</b></td>
			    <td><input type='text' name='movie_type' size='60' value='$movie_type' required /></td>
			</tr >
			<tr>
			    <td align='right'><b>Movie Stocks:</b></td>
			    <td><input type='text' name='movie_stock' size='60' value='$movie_stock' required /></td>
			</tr >
			<tr>
			    <td align='right'><b>Movie Keywords:</b></td>
			    <td><input type='text' name='movie_keywords' size='60' value='$movie_keywords' required /></td>
			</tr >

			<tr align='center'>
			    <td colspan='7'><input type='submit' name='insert_post' value='Update Product Now' /></td>
			</tr>


		</table>
              </form>

				";

			}
}

}

?>

</body>
</html>

<?php


	if(isset($_POST['insert_post'])){
		$movie_id = $_POST['movie_id'];
		$movie_title= $_POST['movie_title'];
		$movie_price= $_POST['movie_price'];
		$movie_genre= $_POST['movie_genre'];
		$actor_name=$_POST['actor_name'];
		$movie_year=$_POST['movie_year'];
		$movie_desc= $_POST['movie_desc'];
		$movie_keywords= $_POST['movie_keywords'];
		$movie_type= $_POST['movie_type'];
		$movie_stock= $_POST['movie_stock'];

		
		$movie_image= $_FILES['movie_image']['name'];
		$movie_image_tmp = $_FILES['movie_image']['tmp_name'];

		//crreate a file product_images into youe website folder
		move_uploaded_file($movie_image_tmp,"movie_images/$movie_image");
		 $stmt = $conn->prepare("UPDATE movies SET movie_title=:title,movie_price=:price, movie_genre=:genre, actor_id=:actor, movie_year=:year, movie_keywords=:keywords, movie_image=:img, movie_description=:descrp, movie_type=:type, movie_stock=:stock WHERE movie_id=:movie_id ");
         $stmt->bindValue(":movie_id", $movie_id);
		 $stmt->bindValue(":title", $movie_title);
		 $stmt->bindValue(":price", $movie_price);
		 $stmt->bindValue(":genre", $movie_genre);
		 $stmt->bindValue(":actor", $actor_name);
		 $stmt->bindValue(":year", $movie_year);
		 $stmt->bindValue(":keywords", $movie_keywords);
		 $stmt->bindValue(":img", $movie_image);
		 $stmt->bindValue(":descrp", $movie_desc);
		 $stmt->bindValue(":type", $movie_type);
		 $stmt->bindValue(":stock", $movie_stock);
		 $stmt->execute();//inserting data into the databse
		if($stmt)
		{
			echo "<script>alert('Product has been updated')</script>";
			echo "<script>window.open('insert_product.php','_self')</script>";
		}
	}




?>

<?php }?>