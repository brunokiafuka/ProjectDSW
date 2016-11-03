<?php
	include ("../php/server.php");
	session_start();

	if (isset($_POST['btnLogin'])) {
		$user = $_POST['name'];
		$pass = $_POST['password'];

		$stm=$conn->prepare("SELECT * FROM employee WHERE emp_name = :name AND emp_password = :password");
		$stm->bindValue(":name", $user);
		$stm->bindValue(":password", $pass);
		$stm->execute();

		$result = $stm->fetchAll(PDO::FETCH_ASSOC);
		if (count($result) > 0) {
			$_SESSION['username'] = $user;
                  for ($i = 0; $i < count($result); $i++) {
                  $cat_id=  $result[$i]['emp_cat'] ;
                  if($cat_id=='1')
                  {
                        echo "<script>window.open('admin.php?logged_in=You have successfully Logged in','_self')</script>";
                  }
                  else
                  	
			$errorMsg = "employee";
                    
                  } 
			
			
								
		}
		else {

			$errorMsg = "user name or password worng!";
		}
	}
?>


<!DOCTYPE html>
<html>
	<head>
		<title>BuntingAdmin</title>
		<link rel="stylesheet" type="text/css" href="style/styles.css">
<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
		<style type="text/css">
			.login div{
				background-color: #e67e22;
				width: 100%;
				margin-bottom: 25px;
			}

			.login{
				width: 30%;
				background-color: #fff;
				padding: 15px;
				border-radius: 2px;
				border: 1px solid #ddd;
				margin: 0 auto;
				margin-top: 25px;
				margin-bottom: 30px;
				color: #ccc;
			}

			.login input{
				padding: 10px;
				padding-left: 15px;
				width: 100%;
				border: 1px solid #ddd;	
				margin-bottom: 5px;
				box-sizing: border-box;
			 }

			 .login h2{
			 	font-size: 15px;
			 	padding: 10px;
			 	color: #fff;
			 	width: 100%;
			 }
			 .login a{
			 	color: #000;
			 	font-size: 12px; 
			 }
			 .login a:hover{
			 	color: #e67e22;
			 	font-weight: 700;
			 }
			 .main_wrapper{
			 	width: 1110px;
			 	height: auto;
			 	margin: auto;;
			 }
			 #header{
              width: 1110px;
              height: 120px;
              background: url(images/a.jpg);
              border-bottom: 5px groove orange;
             

			 }
		</style>
	</head>
	<body>

        <div class="main_wrapper">
        	 <div id="header"></div>

        </div>
       
<section style="margin-left:40%;">
		<div id="data" class="logo-desktop">
					<a href="index.php"><b>Bunting</b>Movies <i class="fa fa-film" aria-hidden="true"></i></a>				
		</div>
	</section>

		<div class="login" style="margin-top:12%;">

	<h2 style="color:orange;text-align:center;"><?php echo @$_GET['not_admin'];?></h2>
	<h2 style="color:orange;text-align:center;"><?php echo @$_GET['logged_out'];?></h2>
			<div>

				<h2 >ADMIN LOGIN</h2>
			</div>

			<form method="post" action="index.php">
				<input type="text" name="name" placeholder="user name"></input>
				<input type="password" name="password" placeholder="password"></input>
				<?php
					if (isset($errorMsg)) {
						echo "<span class='error'>" . $errorMsg . "</span>";						
					}
				?>
				<input type="submit" name="btnLogin" value="Login"></input>
				<a href="#">Forgot your password?</a>
			</form>
		</div>
	</body>
</html>
		

