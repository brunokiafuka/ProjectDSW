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
                <form method="get" action="admin.php" >
                        <input type="text" name="search6" placeholder="search item in store..."></input>
                        <button type="submit" name="btnSearch6" class="search-button"><i class="fa fa-search fa-lg" aria-hidden="true"></i></button>
                    </form>             
    </div>  

    </div>
  <a href="customerReport.php" target="blank" style="margin-left: 60px; margin-bottom: 10px;">Generate PDF Report</a>

<table width="795" align="center" bgcolor="gray" style="margin-left:100px;">
	<tr align="center">
		<td colspan="6"><h2>VIEW ALL CUSTOMERS HERE</h2></td>

	</tr>
    
    <tr align="center" >
    	<th>Customer Id</th>
    	<th>Customer UserName</th>
    	<th>Customer Name</th>
    	<th>Customer Email</th>
    	<th>Customer Country</th>
    	<th>Customer City</th>
    	<th>Customer Address</th>
    	<th>Delete</th>
    </tr>
    <?php
     include ("php/server.php");
     $q1=" select * from customer ";
     $stmt = $conn->prepare($q1);
     $stmt->execute();
 
      $count_cats= count($stmt);
   
    while( $result = $stmt->fetch(PDO::FETCH_OBJ))
	{
	 $cust_id = $result->cust_id;
	 $cust_userName = $result->cust_username;
   $cust_name = $result->cust_name;
   $cust_email= $result->cust_email;
   $cust_country = $result->cust_country;
   $cust_city = $result->cust_city;
   $cust_address = $result->cust_address;
	
    ?>
    <tr align="center">
    	<td><?php echo $cust_id;?></td>
    	<td><?php echo $cust_userName;?></td>
    	<td><?php echo $cust_name;?></td>
    	<td><?php echo $cust_email;?></td>
    	<td><?php echo $cust_country;?></td>
    	<td><?php echo $cust_city;?></td>
    	<td><?php echo $cust_address;?></td>
    	<td><a href="delete_customer.php?delete_c=<?php echo $cust_id;?>">Delete</a></td>
    <?php } ?>

    </tr>


</table>
<?php }?>