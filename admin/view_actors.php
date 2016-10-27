<?php
if(!isset($_SESSION['username']))
{
echo "<script>window.open('index.php?not_admin=You are not an Admin','_self')</script>";
}
else
{
?>
<table width="795" align="center" bgcolor="gray">
	<tr align="center">
		<td colspan="6"><h2>VIEW ALL ACTORS HERE</h2></td>

	</tr>
    
    <tr align="center" >
    	<th>Actor Id</th>
    	<th>Actor Name</th>
    	<th>Actor Age</th>
      <th>Actor Movies</th>
    	<th>Actor Image</th>
    	<th>Edit</th>
    	<th>Delete</th>
    </tr>
    <?php
     include ("php/server.php");
     $q1=" select * from actor ";
     $stmt = $conn->prepare($q1);
     $stmt->execute();
 
      $count_cats= count($stmt);
   
    while( $result = $stmt->fetch(PDO::FETCH_OBJ))
	{
	 $actor_id = $result->actor_id;
	 $actor_name = $result->actor_name;
   $actor_age = $result->actor_age;
   $actor_movies = $result->actor_movieNumber;
   $actor_image = $result->actor_img;
	
    ?>
    <tr align="center">
    	<td><?php echo $actor_id?></td>
    	<td><?php echo $actor_name?></td>
    	<td><?php echo $actor_age?></td>
    	<td><?php echo $actor_movies?></td>
    	<td><?php echo "<img src='actor_images/$actor_image' style='width:60px; height:60px;'>" ?></td>
    	
    	<td><a href="admin.php?edit_act=<?php echo $actor_id;?>">Update</a></td>
    	<td><a href="delete_act.php?delete_act=<?php echo $actor_id;?>">Delete</a></td>
    <?php } ?>

    </tr>


</table>
<?php }?>