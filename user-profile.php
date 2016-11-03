<?php 
session_start();
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">		
		<meta name="robots" content="index, follow">
		<link href="https://fonts.googleapis.com/css?family=Rubik" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Baloo+Da" rel="stylesheet">
		<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">				
		<link rel="stylesheet" type="text/css" href="css/normalize.css">
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="stylesheet" type="text/css" href="css/media_queries.css">
		<script type="text/javascript" src="js/jquery-3.1.0.min.js"></script>
		<script type="text/javascript" src="js/script.js"></script>		
		<title>BuntingMovies</title>
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
								<li><a href="movie.php?genre=Action&movietype=DVD">Action</a></li>
								<li><a href="movie.php?genre=Comedy&movietype=DVD">Comedy</a></li>
								<li><a href="movie.php?genre=Drama&movietype=DVD">Drama</a></li>
								<li><a href="movie.php?genre=Documentary&movietype=DVD">Documentary</a></li>
								<li><a href="movie.php?genre=Sci-Fic&movietype=DVD">Sci-Fic</a></li>
							</ul>					
					 	</li>

					 	<li>
							<a href="#" class="bluray" onclick="showBlu();" ><span>&#9662;</span> Bluray Movies</a>						
							<ul class="nav-content2 nav-con-style" style="display: none;">
								<li><a href="movie.php?genre=Action&movietype=Bluray">Action</a></li>
								<li><a href="movie.php?genre=Comedy&movietype=Bluray">Comedy</a></li>
								<li><a href="movie.php?genre=Drama&movietype=Bluray">Drama</a></li>
								<li><a href="movie.php?genre=Documentary&movietype=Bluray">Documentary</a></li>
								<li><a href="movie.php?genre=Sci-Fic&movietype=Bluray">Sci-Fic</a></li>
							</ul>					
					 	</li>

					 	<li><a href="#">Shop by Actor</a></li>
					 	<li><a href="shop-gender.php">Shop by Genre</a></li>
					 	<li><a href="cart.php">Shop by Studio</a></li>
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
					<form method="get" action="search.php">
						<input type="text" name="search" placeholder="search item in store..."></input>
						<button type="submit" name="btnSearch" class="search-button"><i class="fa fa-search fa-lg" aria-hidden="true"></i></button>
					</form>				
				</div>
					<div class="user-opt-header">
					<?php 
							if (isset($_SESSION['username'])){ //check if user have already logged in
								echo "<a href='user-profile.php?id=".$_SESSION['userId']."' style='color:gray; font-weight:bold;'><i class='fa fa-user' aria-hidden='true'></i> ".$_SESSION['username']."</a>";
							}else{ // it will show the link if user not logged
								echo "<a href='login.php'>Login / Sign Up</a>";
							}
					?>
				<a class="cart" href="cart.php">My Cart <span class="numItens"> 0 </span>Item - R<span class="totalCart">0.00</span></a>
					
					<?php
						if (isset($_SESSION['username'])){//logout user
								echo "<a href='php/logout.php' style='margin-left: 10px;'>Log out</a>";
						}
					?>			
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
				<?php 
					if (isset($_SESSION['username'])){ //check if user have already logged in
						echo "<a style='font-weight:bold;'><i class='fa fa-user' aria-hidden='true'></i> ".$_SESSION['username']."</a>";
					}else{ // it will show the link if user not logged
						echo "<a href='login.php'>Login / Sign Up</a>";
					}
				?>
				<a class="cart" href="cart.php">My Cart <span class="numItens"> 0 </span>Item - R<span class="totalCart">0.00</span></a>
				
				<?php
					if (isset($_SESSION['username'])){//logout user
						echo "<a href='php/logout.php' style='margin-left: 10px;'>Log out</a>";
					}
				?>	
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
				<h3>My Profile</h3>
			</div>
			<!--end Section Header-->
			
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
			<div class="social" id="contact">
				<ul>
					<li><a href="http://facebook.com"><i class="fa fa-facebook fa-2x" aria-hidden="true"></i></a></li>
					<li><i class="fa fa-twitter fa-2x" aria-hidden="true"></i></li>
					<li><i class="fa fa-google-plus fa-2x" aria-hidden="true"></i></li>
					<li><i class="fa fa-whatsapp fa-2x" aria-hidden="true"></i></li>
					<li><i class="fa fa-linkedin fa-2x" aria-hidden="true"></i></li>
				</ul>
			</div>
		</footer>
	</body>	
</html>