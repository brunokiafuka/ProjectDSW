<?php
if(!isset($_SESSION['username']))
{
echo "<script>window.open('index.php?not_admin=You are not an Admin','_self')</script>";
}
else
{
?>
<div class="menubar">   
    <div class="search-container" style="margin-left:200px;">          
                <form method="get" action="admin.php"  >
                        <input type="text" name="search5" placeholder="search item in store..."></input>
                        <button type="submit" name="btnSearch5" class="search-button"><i class="fa fa-search fa-lg" aria-hidden="true"></i></button>
                    </form>             
    </div>  

    </div>
<table width="795" align="center" bgcolor="gray" style="margin-left:100px;">
	<tr align="center">
		<td colspan="6"><h2>VIEW ALL ACTORS HERE</h2></td>

	</tr>
    
    <tr align="center" >
    	<th>Employee Id</th>
    	<th>Employee Name</th>
    	<th>Employee Email</th>
      <th>Employee Category</th>
    	<th>Edit</th>
    	<th>Delete</th>
    </tr>
    <?php
     include ("php/server.php");
     $q1=" select * from employee ";
     $stmt = $conn->prepare($q1);
     $stmt->execute();
 
      $count_cats= count($stmt);
   
    while( $result = $stmt->fetch(PDO::FETCH_OBJ))
	{
	 $employee_id = $result->emp_id;
	$employee_name= $result->emp_name;
   $employee_email= $result->emp_email;
 $employee_cat= $result->emp_cat;
 
 
	
    ?>
    <tr align="center">
    	<td><?php echo  $employee_id?></td>
    	<td><?php echo $employee_name?></td>
    	<td><?php echo $employee_email?></td>
    	<td><?php echo $employee_cat?></td>
    	<td><a href="admin.php?edit_emp=<?php echo $employee_id;?>">Update</a></td>
    	<td><a href="delete_emp.php?delete_emp=<?php echo $employee_id;?>">Delete</a></td>
    <?php } ?>

    </tr>


</table>
<?php }?>