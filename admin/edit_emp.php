<!DOCTYPE html>
<?php
 include ("php/server.php");
 if(!isset($_SESSION['username']))
{
echo "<script>window.open('index.php?not_admin=You are not an Admin','_self')</script>";
}
else
{
 if(isset($_GET['edit_emp']))
 {
 $employee_id= $_GET['edit_emp'];
$q3=" select * from employee where emp_id = '$employee_id' " ;
$stmt = $conn->prepare($q3);
 $stmt->execute();
		 $result = $stmt->fetch(PDO::FETCH_OBJ);
		
	$employee_name= $result->emp_name;
   $employee_email= $result->emp_email;
 $employee_cat= $result->emp_cat;
 $employee_pass= $result->emp_password;
 $employee_vnum	=$result->emp_verfication_numb;		
}


?>

<html>
<head>

<title>Update Employee</title>
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script>tinymce.init({ selector:'textarea' });</script>
<link rel="stylesheet" type="text/css" href="style/styles.css">
<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">

</head>
<body>
<form action="" method="post" enctype="multipart/form-data" style=" margin-left:100px;" >

<table align="center" width="795" border="2">
			<tr align="center">
			   <td colspan="8"><h2 style=" text-align: center;">Insert New Employees here</h2></td>
			</tr>

			<tr>
			   <td align="right"><b>Employee Name:</b></td>
			   <td><input type="text" name="new_employee_name" size="60" value="<?php echo $employee_name?>" required></td>
			</tr>
			<tr>
			   <td align="right"><b>Employee Email:</b></td>
			   <td><input type="text" name="new_employee_email" size="60" value="<?php echo $employee_email?>" required></td>
			</tr>
			<tr>
			   <td align="right"><b>Employee Category:</b></td>
			   <td>
				<select name="new_employee_cat" required>
				<?php
				 include ("php/server.php");
                  $q1 = "select * from employeecate";
                  $stmt = $conn->prepare($q1);
                  $stmt->execute();
                  $myResult = $stmt->fetchAll(PDO::FETCH_ASSOC);
                  for ($i = 0; $i < count($myResult); $i++) {
                  $cat_id=  $myResult[$i]['emp_cat_id'] ; 
                  $cat_title=  $myResult[$i]['description'] ;  	 	
                 echo"<option value='$cat_id'>$cat_title</option>";
                  }
               ?>
				</select>
				</td>
						</tr>
			<tr>
			   <td align="right"><b>Employee password:</b></td>
			   <td><input type="password" name="new_employee_pass" size="60" value="<?php echo $employee_pass?>" required></td>
			</tr>
			<tr>
			   <td align="right"><b>Employee Verification Number:</b></td>
			   <td><input type="password" name="new_employee_vnum" size="60" value="<?php echo $employee_vnum?>" required></td>
			</tr>
			

<tr align="center">
			    <td colspan="7"><input type="submit" name="add_employee" value="Update Employee Now" /></td>
</tr>
</table>
</form>
</body>
</html>
<?php
 include ("php/server.php");
 if(isset($_POST['add_employee']))
 {
 $emp_id= $_GET['edit_emp'];
 $new_employee_name= $_POST['new_employee_name'];
 $new_employee_email= $_POST['new_employee_email'];
 $new_employee_cat= $_POST['new_employee_cat'];
 $new_employee_pass= $_POST['new_employee_pass'];
 $new_employee_vnum= $_POST['new_employee_vnum'];


$stmt = $conn->prepare("UPDATE employee SET emp_name=:name,emp_email=:email,emp_cat=:cat,emp_password=:pass,emp_verfication_numb=:vnum WHERE emp_id=:emp_id ");


         $stmt->bindValue(":name", $new_employee_name);
         $stmt->bindValue(":email", $new_employee_email);
         $stmt->bindValue(":cat", $new_employee_cat);
		 $stmt->bindValue(":pass", $new_employee_pass);
		 $stmt->bindValue(":vnum",$new_employee_vnum);
         $stmt->bindValue(":emp_id", $emp_id);
	
		 $stmt->execute();//inserting data into the databse
		if($stmt)
		{
			echo "<script>alert('Actor has been updated')</script>";
			echo "<script>window.open('admin.php?view_employes','_self')</script>";
		}

}


?>
<?php }?>
