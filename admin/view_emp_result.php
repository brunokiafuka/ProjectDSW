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
    	<th>Employee Id</th>
    	<th>Employee Name</th>
    	<th>Employee Email</th>
      <th>Employee Category</th>
    	<th>Edit</th>
    	<th>Delete</th>
    </tr>
<?php


if(isset($_GET['search5'])){
if(isset($_GET['btnSearch5']))
{
$search_query= $_GET['search5'];
$q1=" SELECT * from employee where emp_name like '%$search_query%' " ;
 $stmt = $conn->prepare($q1);
     $stmt->execute();
 
      $count_cats= count($stmt);
   
    while( $result = $stmt->fetch(PDO::FETCH_OBJ))
	{
	 $employee_id = $result->emp_id;
	$employee_name= $result->emp_name;
   $employee_email= $result->emp_email;
 $employee_cat= $result->emp_cat;
			
			echo "

    <tr align='center'>
    	<td>$employee_id</td>
    	<td>$employee_name</td>
    	<td>$employee_email</td>
    	<td>$employee_cat</td>
    	<td><a href='admin.php?edit_emp=$employee_id'>Update</a></td>
    	<td><a href='delete_emp.php?delete_emp=$employee_id'>Delete</a></td>

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