<?php
if(!isset($_SESSION['username']))
{
echo "<script>window.open('index.php?not_admin=You are not an Admin','_self')</script>";
}
else
{
?>
<div class="menubar"> 
  <div class="search-container " style="margin-left:200px;">      
        <form method="get" action="admin.php" >
            <input type="text" name="search1" placeholder="search item in store..."></input>
            <button type="submit" name="btnSearch1" class="search-button"><i class="fa fa-search fa-lg" aria-hidden="true"></i></button>
          </form>       
  </div> 
  <script type="text/javascript" src="js/jquery-3.1.0.min.js"></script>
  <script type="text/javascript" src="js/index.js"></script>
  <a href="php/admin-func.php" target="blank" style="margin-left: 60px; margin-bottom: 10px;">Generate PDF</a>
  </div>
<table width="795" align="center" bgcolor="gray" style="margin-left:100px;">
	<tr align="center">
		<td colspan="6"><h2>VIEW ALL PRODUCTS HERE</h2></td>

	</tr>
    
    <tr align="center" >
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
                  
                  $result2 = $stmt2->fetch(PDO::FETCH_OBJ);
                  $actor_name= $result2->actor_name;
                 
                      $movie_year = $result->movie_year;
                      $movie_image = $result->movie_image;
                      $movie_type = $result->movie_type;
                 $movie_stock = $result->movie_stock;
               
                  
          
   
	          
    ?>
    <tr align="center">
    	<td><?php echo $movie_id;?></td>
    	<td><?php echo $movie_title;?></td>
    	<td><?php echo $movie_price;?></td>
    	<td><?php echo $movie_genre;?></td>
    	<td><?php echo $actor_name;?></td>
    	<td><?php echo $movie_year;?></td>
    	<td><?php echo "<img src='movie_images/$movie_image' style='width:60px; height:60px;'>" ?></td>
    	<td><?php echo $movie_type;?></td>
    	<td><?php echo $movie_stock;?></td>
    	<td><a href="admin.php?edit_pro=<?php echo $movie_id;?>">Update</a></td>
    	<td><a href="delete_movie.php?delete_pro=<?php echo $movie_id;?>">Delete</a></td>
    <?php } ?>

    </tr>


</table>

<?php }?>