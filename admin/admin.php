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
 <?php
    if ($_SESSION['emp_Cat'] == 1) {
       echo ' <div id="right">        
            <h2 style="text-align:center;">MANAGE CONTENT</h2>
            <a href="admin.php?insert_movie">Insert New Movies</a>
            <a href="admin.php?view_movies">View All Movies</a>
            <a href="admin.php?insert_actor">Insert New Actors</a>
            <a href="admin.php?view_actors">View All Actors</a>
            <a href="admin.php?insert_employe">Insert New Employees</a>
            <a href="admin.php?insert_employe_cat">Insert Employees Categories</a>
            <a href="admin.php?view_employes_cat">View All Employees Categories</a>
            <a href="admin.php?view_employes">View All Employees</a>
            <a href="admin.php?view_customers">View Customers</a>
            <a href="admin.php?view_orders">View Orders</a>
            <a href="admin.php?view_payments">View Payements</a>
            <a href="logout.php">Admin Logout</a>
        </div>';
    }else if ($_SESSION['emp_Cat'] == 2) {
        echo ' <div id="right">        
            <h2 style="text-align:center;">MANAGE CONTENT</h2>
            <a href="admin.php?view_movies">View All Movies</a>
            <a href="logout.php">Logout</a>
        </div>';
       
    }

 ?>
 	
		
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
             if(isset($_GET['insert_employe']))
             {
                 include("insert_employe.php");
             }
              if(isset($_GET['insert_employe_cat']))
             {
                 include("insert_employe_cat.php");
             }
             if(isset($_GET['view_employes_cat']))
             {
                 include("view_employe_cat.php");
             }
             if(isset($_GET['view_employes']))
             {
                 include("view_employe.php");
             }
             if(isset($_GET['edit_emp']))
             {
                 include("edit_emp.php");
             }
              if(isset($_GET['view_customers']))
             {
                 include("view_customers.php");
             }
             if(isset($_GET['search'])){
            if(isset($_GET['btnSearch']))
            {
	         include("result.php");
            }
            }       
            if(isset($_GET['search1'])){
            if(isset($_GET['btnSearch1']))
            {
	        include("view_products_result.php");
            }
            }
            if(isset($_GET['search2'])){
            if(isset($_GET['btnSearch2']))
            {
	        include("actor_result.php");
            }
            }
            if(isset($_GET['search3'])){
            if(isset($_GET['btnSearch3']))
            {
	        include("view_actors_result.php");
            }
            }
            if(isset($_GET['search4'])){
            if(isset($_GET['btnSearch4']))
            {
	        include("emp_result.php");
            }
            }
             if(isset($_GET['search5'])){
            if(isset($_GET['btnSearch5']))
            {
	        include("view_emp_result.php");
            }
            }
             if(isset($_GET['search6'])){
            if(isset($_GET['btnSearch6']))
            {
	        include("view_cust_result.php");
            }
            }

            if (isset($_GET['view_orders'])) {
                # code...
                include("view_orders.php");
            }

            if(isset($_GET['searchOrder'])){
                if(isset($_GET['btnSearchOrder']))
                {
                include("customer_order.php");
                }
            }

			?>

		</div>	
	</div>
	



	</body>
</html>

<?php }?>