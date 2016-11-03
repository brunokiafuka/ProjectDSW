<!DOCTYPE html>
<?php
if(!isset($_SESSION['username']))
{
echo "<script>window.open('index.php?not_admin=You are not an Admin','_self')</script>";
}
else
{
?>
<html>
<head>

<title>Insert Product</title>
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
    
    <tr align='center' >
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


if(isset($_GET['search3'])){
if(isset($_GET['btnSearch3']))
{
$search_query= $_GET['search3'];

$q3=" SELECT * from actor where actor_name like '%$search_query%' " ;
$stmt = $conn->prepare($q3);
 $stmt->execute();

    while( $result = $stmt->fetch(PDO::FETCH_OBJ))
    {
       $actor_id = $result->actor_id;
      $actor_name= $result->actor_name;
      $actor_age= $result->actor_age;
      $actor_movies= $result->actor_movieNumber;
      $actor_image= $result->actor_img;
			
			


				echo "
		     <tr align='center'>
      <td>$actor_id</td>
      <td>$actor_name</td>
      <td>$actor_age</td>
      <td>$actor_movies</td>
      <td><img src='actor_images/$actor_image' style='width:60px; height:60px;'></td>
      
      <td><a href='admin.php?edit_act=$actor_id'>Update</a></td>
      <td><a href='delete_act.php?delete_act=$actor_id'>Delete</a></td>

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