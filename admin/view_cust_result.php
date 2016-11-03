<!DOCTYPE html>
<?php

 include ("php/server.php");
 if(!isset($_SESSION['username']))
{
echo "<script>window.open('index.php?not_admin=You are not an Admin','_self')</script>";
}
else
{

?>
<html>
<head>

<title>Search Employee</title>
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script>tinymce.init({ selector:'textarea' });</script>
<link rel="stylesheet" type="text/css" href="style/styles.css">
<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">

</head>
<body>
<table width='795' align='center' bgcolor='gray' style='margin-left:100px;'>
  <tr align='center'>
    <td colspan='6'><h2>VIEW ALL ACTORS HERE</h2></td>

  </tr>  
    <tr align='center'>
      <th>Customer Id</th>
      <th>Customer UserName</th>
      <th>Customer Name</th>
      <th>Customer Email</th>
      <th>Customer Country</th>
      <th>Customer City</th>
      <th>Customer Address</th>
      <th>NewsLetter</th>
      <th>Delete</th>
    </tr>

<?php


if(isset($_GET['search6'])){
if(isset($_GET['btnSearch6']))
{
$search_query= $_GET['search6'];
$q1=" SELECT * from customer where cust_name or cust_username like '%$search_query%' " ;
 $stmt = $conn->prepare($q1);
     $stmt->execute();
 
      $count_cats= count($stmt);
   
    while( $result = $stmt->fetch(PDO::FETCH_OBJ))
	{






	 $cust_id = $result->cust_id;
	$cust_username= $result->cust_username;
   $cust_name= $result->cust_name;
 $cust_email= $result->cust_email;
	$cust_country= $result->cust_country;
  $cust_city= $result->cust_city;
  $cust_address= $result->cust_address;
  $newsletter= $result->newsletter;		
			echo "
             
      <tr align='center'>
    	<td>$cust_id</td>
    	<td>$cust_username</td>
    	<td>$cust_name</td>
    	<td>$cust_email</td>
      <td>$cust_country</td>
      <td>$cust_city</td>
      <td>$cust_address</td>
      <td>$newsletter</td>

    	<td><a href='delete_emp.php?delete_emp=$cust_id'>Delete</a></td>

    </tr>





			";

		}
}

}

?>
</table>
</body>
</html>



<?php }?>