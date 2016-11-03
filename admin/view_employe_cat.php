<?php
if(!isset($_SESSION['username']))
{
echo "<script>window.open('index.php?not_admin=You are not an Admin','_self')</script>";
}
else
{
?>

<table width="795" align="center" bgcolor="gray" style="margin-left:100px;">
	<tr align="center">
		<td colspan="6"><h2>VIEW ALL CATEGORIES HERE</h2></td>

	</tr>
    
    <tr align="center" >
    	<th>Category Id</th>
    	<th>Category Title</th>
    	<th>Delete</th>
    </tr>
    <?php
     include ("php/server.php");
     $q1=" select * from employeecate ";
     $stmt = $conn->prepare($q1);
     $stmt->execute();
 
      $count_cats= count($stmt);
   
    while( $result = $stmt->fetch(PDO::FETCH_OBJ))
	{
	 $cat_id = $result->emp_cat_id;
	$cat_title= $result->description;
   
 
 
	
    ?>
    <tr align="center">
    	<td><?php echo  $cat_id?></td>
    	<td><?php echo $cat_title?></td>
    	<td><a href="delete_emp_cat.php?delete_emp_cat=<?php echo $cat_id;?>">Delete</a></td>
    <?php } ?>

    </tr>


</table>
<?php }?>