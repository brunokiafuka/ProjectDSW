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
		<title>Home</title>
	</head>

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

		<!--Search by Gender-->
		<section class="search-by">
			<!--Section Header-->
			<div class="search-by-header">
				<h3>Select a Genre</h3>				
			</div>	

			<div class="movie-gender">
				<div class="gender-icon">
					<a href="#"><i class="fa fa-hand-lizard-o fa-3x" aria-hidden="true"></i></a>
				</div>
				<div class="gender-descrip">
					<a href="#">Action</a>
				</div>
			</div>	

			<div class="movie-gender">
				<div class="gender-icon">
					<a href="#"><i class="fa fa-smile-o fa-3x" aria-hidden="true"></i></a>
				</div>
				<div class="gender-descrip">
					<a href="#">Comedy</a>
				</div>
			</div>	

			<div class="movie-gender">
				<div class="gender-icon">
					<a href="#"><i class="fa fa-frown-o fa-3x" aria-hidden="true"></i></a>
				</div>
				<div class="gender-descrip">
					<a href="#">Drama</a>
				</div>
			</div>	

			<div class="movie-gender">
				<div class="gender-icon">
					<a href="#"><i class="fa fa-video-camera fa-3x" aria-hidden="true"></i></a>
				</div>
				<div class="gender-descrip">
					<a href="#">Documentary</a>
				</div>
			</div>	

			<div class="movie-gender">
				<div class="gender-icon">
					<a href="#"><i class="fa fa-flask fa-3x" aria-hidden="true"></i></a>
				</div>
				<div class="gender-descrip">
					<a href="#">Sci-Fic</a>
				</div>
			</div>	

		</section>
	
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