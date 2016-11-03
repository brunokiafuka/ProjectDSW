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

    <table width='795' align='center' bgcolor='gray' style='margin-left: 100px;'>
  <tr align='center'>
    <td colspan='6'><h2>VIEW  PRODUCT HERE</h2></td>

  </tr>
    
    <tr align='center' >
      <th>Id</th>
      <th>Title</th>
      <th>Price</th>
      <th>Genre</th>
      <th>Actor</th>
      <th>Year</th>
      <th>Image</th>
      <th>Type</th>
      <th>Stock</th>
      <th>Edit</th>
      <th>Delete</th>
    </tr>
<?php
include ("php/server.php");


if(isset($_GET['search1'])){
if(isset($_GET['btnSearch1']))
{
$search_query= $_GET['search1'];

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
		
     <tr align='center'>
    	<td>$movie_id</td>
    	<td>$movie_title</td>
    	<td>$movie_price</td>
    	<td>$movie_genre</td>
    	<td>$actor_name</td>
    	<td>$movie_year</td>
    	<td><img src='movie_images/$movie_image' style='width:60px; height:60px;'></td>
    	<td>$movie_type</td>
    	<td>$movie_stock</td>
    	<td><a href='admin.php?edit_pro=$movie_id'>Update</a></td>
    	<td><a href='delete_movie.php?delete_pro=$movie_id'>Delete</a></td>
    <?php } ?>

    </tr>
   
				";

			}
}

}

?>
 </table>

</body>
</html>

<?php
     include ("php/server.php");
     $q1=" select * from movies ";
     $stmt = $conn->prepare($q1);
     $stmt->execute();
 
      $count_cats= count($stmt);
   
    while( $result = $stmt->fetch(PDO::FETCH_OBJ))
	{
	 $movie_id = $result->movie_id;
	 $movie_title = $result->movie_title;
	 $movie_price = $result->movie_price;
	 $movie_genre = $result->movie_genre;
	 $actor_id = $result->actor_id;

	              $q2 = "SELECT actor_name FROM actor WHERE actor_id='$actor_id'";
                  $stmt2 = $conn->prepare($q2);
                  $stmt2->execute();
                  while( $result2 = $stmt2->fetch(PDO::FETCH_OBJ))
                  {
             
                     $actor_name = $result2->actor_name;
                  }
                  
                 
                      $movie_year = $result->movie_year;
                      $movie_image = $result->movie_image;
                      $movie_type = $result->movie_type;
                 $movie_stock = $result->movie_stock;
               
                  
       }         
   
	          
    ?>

<?php }?>