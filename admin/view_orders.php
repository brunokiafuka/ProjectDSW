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
            <input type="text" name="searchOrder" placeholder="enter order ID or Customer ID"></input>
            <button type="submit" name="btnSearchOrder" class="search-button"><i class="fa fa-search fa-lg" aria-hidden="true"></i></button>
          </form>       
  </div> 
  <script type="text/javascript" src="js/jquery-3.1.0.min.js"></script>
  <script type="text/javascript" src="js/index.js"></script>
  <a href="allOrderReport.php" target="blank" style="margin-left: 60px; margin-bottom: 10px;">Generate PDF</a>
  </div>
<table width="795" align="center" bgcolor="gray" style="margin-left:100px;">
	<tr align="center">
		<td colspan="6"><h2>VIEW ORDERS</h2></td>

	</tr>
    
    <tr align="center" >
    	<th>Id</th>
    	<th>Customer</th>
    	<th>Order Date</th>
    	<th>Require Date</th>
      <th>Order Total</th>
    	<th>Status</th>    	
    	<th>Edit</th>
    	<th>Delete</th>
    </tr>
    <?php
     include ("php/server.php");
     $q1="SELECT * FROM `order`";
     $stmt = $conn->prepare($q1);
     $stmt->execute();
 
      $count_cats= count($stmt);
   
    while( $result = $stmt->fetch(PDO::FETCH_OBJ))
	{
	 $order_id = $result->order_id;
	 $movie_title = $result->order_total;
	 $order_date = $result->order_date;
	 $req_date = $result->require_date;
	 $Customer = $result->cust_id;

	              $q2 = "SELECT cust_name FROM customer WHERE cust_id='$Customer'";
                  $stmt2 = $conn->prepare($q2);
                  $stmt2->execute();
                  
                  $result2 = $stmt2->fetch(PDO::FETCH_OBJ);
                  $cust_Name= $result2->cust_name;
                 
                      $Status = $result->order_status;
                   
               
                  
          
   
	          
    ?>
    <tr align="center">
    	<td><?php echo $order_id;?></td>
    	<td><?php echo $cust_Name;?></td>
    	<td><?php echo $order_date;?></td>
    	<td><?php echo $req_date;?></td>
    	<td><?php echo $cust_Name;?></td>
    	<td><?php echo $Status;?></td>    
    	<td><a href="admin.php?edit_pro=<?php echo $order_id;?>">Update</a></td>
    	<td><a href="delete_movie.php?delete_pro=<?php echo $order_id;?>">Delete</a></td>
    <?php } ?>

    </tr>


</table>

<?php }?>