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
			header("location: insert_product.php");			
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
		</style>
	</head>
	<body>

		<div class="login">
			<div>
				<h2>ADMIN LOGIN</h2>
			</div>

			<form method="post">
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
		

