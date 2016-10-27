<!DOCTYPE html>
<?php
session_start();
if(!isset($_SESSION['username']))
{
echo "<script>window.open('index.php?not_admin=You are not an Admin','_self')</script>";
}
else
{
?>
<html>
	<head>
		<title>This is Admin Panel</title>
		<link rel="stylesheet" type="text/css" href="style/styles.css" media="all">
		<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">	
	</head>

	<body>

				
<section style="margin-left:40%;">
		<div id="data" class="logo-desktop">
					<a href="index.php"><b>Bunting</b>Movies <i class="fa fa-film" aria-hidden="true"></i></a>				
		</div>
	</section>
 <div class="main_wrapper">
 	<div id="right">
		
		<h2 style="text-align:center;">MANAGE CONTENT</h2>
		<a href="admin.php?insert_movie">Insert New Movies</a>
		<a href="admin.php?view_movies">View All Movies</a>
		<a href="admin.php?insert_actor">Insert New Actors</a>
		<a href="admin.php?view_actors">View All Actors</a>
		<a href="admin.php?view_customers">View Customers</a>
	    <a href="admin.php?view_orders">View Orders</a>
		<a href="admin.php?view_payments">View Payements</a>
		<a href="logout.php">Admin Logout</a>
	</div>	
		
		<div id="left">
		<h2 style="color:red; text-align:center;"><?php echo @$_GET['logged_in'];?></h2>
			<?php
             
             if(isset($_GET['insert_movie']))
             {
                 include("insert_product.php");
             }
              if(isset($_GET['view_movies']))
             {
                 include("view_products.php");
             }
             if(isset($_GET['edit_pro']))
             {
                 include("update.php");
             }
             if(isset($_GET['insert_actor']))
             {
                 include("insert_actor.php");
             }
             if(isset($_GET['view_actors']))
             {
                 include("view_actors.php");
             }
              if(isset($_GET['edit_act']))
             {
                 include("edit_actor.php");
             }
              if(isset($_GET['view_customers']))
             {
                 include("view_customers.php");
             }

			?>

		</div>	
	</div>
	



	</body>
</html>

<?php }?>