<?php
	include ("php/server.php");
	session_start();

	//login user
	if (isset($_POST['btnLogin'])) {

		$user = $_POST['name'];
		$pass = md5($_POST['password']);
		
		$stm=$conn->prepare("SELECT * FROM customer WHERE cust_username = :name OR cust_email = :mail  AND cust_password = :password");
		$stm->bindValue(":name", $user);
		$stm->bindValue(":password", $pass);
		$stm->bindValue(":mail", $user);
		$stm->execute();

		$result = $stm->fetchAll(PDO::FETCH_ASSOC);
		if (count($result) > 0) {
			
			
			//getting user email
			$stmt = $conn->prepare("SELECT cust_username FROM customer WHERE cust_email = :m ");
			$stmt->bindValue(":m", $user);
			$stmt->execute();
			if ($stmt->rowCount()>0) {
				while ($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
					$_SESSION['username'] =	$row['cust_username'];			
					header("location: index.php");

				}
			}else{
				$_SESSION['username'] = $user;
				header("location: index.php");

			}
		
		}
		else {

			$errorMsg = "user name or password worng!";
		}
	}//end login

	//Register User
	if (isset($_POST['btnRegister'])) {
		$name = $_POST['name'];
		$userName = $_POST['username'];
		$mail = $_POST['email'];	$passwordE = $_POST['pass1'];
		$pass1 = md5($_POST['pass1']);
		$pass2 = md5($_POST['pass2']);
		$country = $_POST['country'];
		$city = $_POST['city'];
		$address = $_POST['address'];
		

		
		//verifying if data is set
		if (empty($name)) {
			$errorRegister = "enter user name";
		}else if (empty($userName)) {
			$errorRegister = "enter user name";
		}else if (empty($mail)) {
			$errorRegister = "please enter a valid email";
		}else if (empty($pass1)) {
			$errorRegister = "enter a password";
		}else if (empty($pass2)) {
			$errorRegister = "please confirm your password";
		}else if(empty($address)){
			$errorRegister = "please enter your address";
		}else if($pass1 != $pass2){
			$errorRegister = "password doesn't match";
		}else if (isset($_POST['news'])) {
			$newsl = "Yes"; //Setting up newsletter to true if it is checked			
		}else if (!isset($_POST['news'])) {
			 //Setting up newsletter to false if it is not checked
			$newsl = "No"; 						
		}

		if (!isset($errorRegister)) {
			//inserting user
			$stm = $conn->prepare("INSERT INTO customer(cust_username, cust_password, cust_name, cust_email, cust_country, cust_city, cust_address, newsletter) VALUES (:usern, :passw, :nme, :em, :cntry, :cty, :adss, :nws)");
			//binding the values
			$stm->bindValue(":usern", $userName);
			$stm->bindValue(":passw", $pass1);
			$stm->bindValue(":nme", $name);
			$stm->bindValue(":em", $mail);
			$stm->bindValue(":cntry", $country);
			$stm->bindValue(":cty", $city);
			$stm->bindValue(":adss", $address);
			$stm->bindValue(":nws", $newsl);
			//verify if product is already in db
			$verify=$conn->prepare("SELECT * FROM customer WHERE cust_username = ?");
			$verify->execute(array($userName));
			if ($verify->rowCount() == 0) {
				# execute insert statement
				$stm->execute();
				$_SESSION['username'] = $username;
				echo "<script type='text/javascript'>alert('$userName your data has been successfuly saved');</script>";
				
			}
			else{
				$errorRegister =  $userName . " is already saved in data base";
			}

		}
	}//end register


?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">		
		<meta name="robots" content="index, follow">
		<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Baloo+Da" rel="stylesheet">
		<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">				
		<link rel="stylesheet" type="text/css" href="css/normalize.css">
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="stylesheet" type="text/css" href="css/media_queries.css">
		<script type="text/javascript" src="js/jquery-3.1.0.min.js"></script>
		<script type="text/javascript" src="js/script.js"></script>		
		<title>Register</title>
	</head>

	<!--Start of Zopim Live Chat Script-->
	<script type="text/javascript">
	window.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=
	d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
	_.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute("charset","utf-8");
	$.src="//v2.zopim.com/?4Glalvg458DCTQu6iZw0yTl4Es9s09gI";z.t=+new Date;$.
	type="text/javascript";e.parentNode.insertBefore($,e)})(document,"script");
	</script>
	<!--End of Zopim Live Chat Script-->

	<script>
		function openNav() {
		    document.getElementById("mySidenav").style.width = "200px";
		    document.getElementById("main").style.marginLeft = "150px";
		}

		function closeNav() {
		    document.getElementById("mySidenav").style.width = "0";
		    document.getElementById("main").style.marginLeft= "0";
		}
	</script>
	<body>
		<!--HEADER-->
		<div id="mySidenav" class="sidenav">
				  	<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>					
					<h3>Menu</h3>					
					<ul class="nav">
						<li>
							<a href="#" class="dvd" onclick="showDvd();" ><span>&#9662;</span> DVD Movies</a>						
							<ul class="nav-content nav-con-style" style="display: none;">
								<li><a href="#">Action</a></li>
								<li><a href="#">Comedy</a></li>
								<li><a href="#">Drama</a></li>
								<li><a href="#">Documentary</a></li>
								<li><a href="#">Sci-Fic</a></li>
							</ul>					
					 	</li>

					 	<li>
							<a href="#" class="bluray" onclick="showBlu();" ><span>&#9662;</span> Bluray Movies</a>						
							<ul class="nav-content2 nav-con-style" style="display: none;">
								<li><a href="#">Action</a></li>
								<li><a href="#">Comedy</a></li>
								<li><a href="#">Drama</a></li>
								<li><a href="#">Documentary</a></li>
								<li><a href="#">Sci-Fic</a></li>
							</ul>					
					 	</li>


					 	<li><a href="#">Shop by Actor</a></li>
					 	<li><a href="shop-gender.php">Shop by Genre</a></li>
					 	<li><a href="#">Shop by Studio</a></li>
				  </ul>
			</div> 
		<header id="main" class="header">
			<div class="header-container">
				<div class="logo-desktop">
					<a href="index.php"><b>Bunting</b>Movies <i class="fa fa-film" aria-hidden="true"></i></a>				
				</div>
				<div>
					<button class="btn-menu" onclick="openNav()">
						<i class="fa fa-bars fa-lg"></i>
					</button>
				</div>
				<div class="search-container">			
					<form method="post">
						<input type="text" placeholder="search item in store..."></input>
						<button type="submit" name="btnSearch" class="search-button"><i class="fa fa-search fa-lg" aria-hidden="true"></i></button>
					</form>				
				</div>
				<div class="user-opt-header">
					<a href="login.php">Login / Sign Up</a> 
					<a class="cart" href="#">My Cart <span> 0 Item - R0.00</span></a>				
				</div>
			</div>
		</header>
		<!--End Header-->

		<!---Logo-->
		<section>
			<div class="logo">
					<a href="index.php"><b>Bunting</b>Movies <i class="fa fa-film" aria-hidden="true"></i></a>				
			</div>
			<div class="user-opt">
				<a href="login.php">Login / Sign Up</a> <a class="cart" href="#">My Cart <span> 0 Item - R0.00</span></a>
				
			</div>
		</section>
		<!--End Logo-->

		<!--Slide Show-->
		<section class="slide" >
			<img class="mySlides" src="img/img2.jpg" id="img">
			<img class="mySlides" src="img/img1.jpg" id="img">
			<img  class="mySlides" src="img/img3.jpg" id="img">			
		</section>
		<!--End Slide Show-->

		<!--Ads Section-->
		<section class="adZone">
			<div class="ad1">			    
			    <h3>Get Free Shipping</h3>
			    <p>on over R1500.00 order</p>
			</div>​
			<div class="ad2">			    			    
			    <h3>Large variety of Movies</h3>
			    <p>DVD and Blu-ray Formats</p>
			</div>​
		</section>
		<!--End Ads Section-->

		<!--Products Section New Releases-->
		<section class="login-sec">
			<!--Section Header-->
			<div class="login-header">
				<h3>Login and Registration</h3>
			</div>
			<!--end Section Header-->

			<div class="login">
				<div>
					<h2>Are you a registered user?</h2>
				</div>
				<form method="post">
					<input type="text" name="name" placeholder="user name or mail" value=<?php if(isset($user)){ echo "'".$user."'";} ?> ></input>
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

			<!--register-->
			<div class="register">
				<div>
					<h2>Register Yourself</h2>
				</div>
				<form method="post">
					<input type="text" name="name" placeholder="Name" value=<?php if(isset($name)){ echo "'".$name."'";} ?> ></input>
					<input type="text" name="username" placeholder="userName" value=<?php if(isset($userName)){ echo "'".$userName."'";} ?> ></input>
					<input type="email" name="email" placeholder="email@mymail.com" value=<?php if(isset($mail)){ echo "'".$mail."'";} ?>></input>
					<input type="password" name="pass1" placeholder="password" value=<?php if(isset($passwordE)){ echo "'".$passwordE."'";} ?>></input>
					<input type="password" name="pass2" placeholder="confirm password"></input>
					<select name="country" placeholder="Country">
						<option  value="">Select your country</option>
						<option value="Angola">ANGOLA</option>
						<option value="Camaroon">CAMAROON</option>						
						<option value="Congo">CONGO</option>
						<option value="South Africa">SOUTH AFRICA</option>
					</select>
					<select name="city" placeholder="city">
						<option value="">Select your city</option>
						<option value="LDA">LUANDA</option>
						<option value="DH">DUALAH</option>						
						<option value="KIN">KINSHASA</option>
						<option value="JHB">JOHANNESBURG</option>
					</select>
					<input type="text" name="address" placeholder="address" value=<?php if(isset($address)){ echo "'".$address."'";} ?>></input>					
					<input type="checkbox" name="news" value="Yes" placeholder="Newsletter">Newsletter</input>					
					<input type="submit" name="btnRegister" value="Register"></input>
					<?php
						if (isset($errorRegister)) {
							echo "<span class='error'>" . $errorRegister . "</span>";						
						}
					?>	
				</form>
			</div>
			
		</section>
		<!--End Login and registraction section -->

		

		<!--Footer-->
		<footer class="footer">
			<div class="logo">
				<a href="index.php"><b>Bunting</b>Movies <i class="fa fa-film" aria-hidden="true"></i></a>	
			</div>
			<div>
				<p>Copyright &copy; 2016 - BuntingMovies Powered by <a class="eits" href="#">EIT Solutions Inc.</a></p>									
			</div>
		</footer>
	</body>	
</html>