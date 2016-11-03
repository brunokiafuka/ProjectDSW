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
		<link rel="stylesheet" type="text/css" href="css/style-cart.css">
		<link rel="stylesheet" type="text/css" href="css/media_queries.css">			
		<script type="text/javascript" src="js/jquery-3.1.0.min.js"></script>
		<script type="text/javascript" src="js/script.js"></script>		
		<script type="text/javascript" src="js/cart.js"></script>		
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
					<form method="get" action="search.php">
						<input type="text" name="search" placeholder="search item in store..."></input>
						<button type="submit" name="btnSearch" class="search-button"><i class="fa fa-search fa-lg" aria-hidden="true"></i></button>
					</form>				
				</div>
				<div class="user-opt-header">
					<?php 
							if (isset($_SESSION['username'])){ //check if user have already logged in
								echo "<a style='color:gray; font-weight:bold;'><i class='fa fa-user' aria-hidden='true'></i> ".$_SESSION['username']."</a>";
							}else{ // it will show the link if user not logged
								echo "<a href='login.php'>Login / Sign Up</a>";
							}
					?>
				<a class="cart" href="#">My Cart <span class="numItens"> 0 </span>Item - R<span class="totalCart">0.00</span></a>
					
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
				<a class="cart" href="#">My Cart <span class="numItens"> 0 </span>Item - R<span class="totalCart">0.00</span></a>
				
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
			<img class="mySlides" src="img/cover.jpg" id="img">
			<img class="mySlides" src="img/cover2.jpg" id="img">
			<img  class="mySlides" src="img/cover3.jpg" id="img">			
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
		<section class="login-sec cart-sec">
			<!--Section Header-->
			<div class="login-header">
				<h3>Movie Description</h3>
			</div>

			<?php
				include ("php/server.php");
					if (isset($_GET['id'])) {
						# code...
						$movie = $_GET['id'];
						$q3=" SELECT * from movies where movie_id = :id" ;
						$stmt = $conn->prepare($q3);
						$stmt->bindValue(":id", $movie);						
						$stmt->execute();
						while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
							if ($result > 0) {
								# code...
								 echo "<article class='movied'>
									<header>
										<img src='admin/movie_images/".$result['movie_image']."'>
									</header>
										
									<div class='content'>
										<h1>".$result['movie_title']."</h1>
										<h3>(".$result['movie_year'].")</h3>
										<h4>R".$result['movie_price']."</h4>
										".$result['movie_description']."
									</div>			
									<footer class='content'>
										<button  class='action-cart confirm'>Movie Preview</button>
										<button id='add' data-id=".$result['movie_id']." class='action-cart confirm button'>Add to cart</button>									
										<button  class='action-cart confirm' onclick='javascript:history.back();'>Continue shopping</button>
											
									</footer>
								</article>";
							}#inner if

						}#while
					}#end isset					
				?>

			
			

		
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