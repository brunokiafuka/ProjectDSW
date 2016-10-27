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
			$movie_year = $result->movie_year;
			$movie_keywords = $result->movie_keywords;
			$movie_image = $result->movie_image;
			$movie_desc = $result->movie_description;
			$movie_type= $result->movie_type;
			$movie_stock = $result->movie_stock;


				echo "
				<div id='single_product' >

				<h3>$movie_title</h3>
				<img src='admin/movie_images/$movie_image' width='250' height='250'/>
				<p><b>Price: R $movie_price</b></p>
				<p>$movie_desc</p>
				<a href='#' style='float:left;'>View</a>
				<a href='#'><button style='float:right'>Add to Cart</button></a>
				</div>

				";

			}
}

}

?>