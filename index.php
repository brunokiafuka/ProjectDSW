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
							<a href="#" class="bluray" onclick="showBlu();" ><span>&#9662</span> Bluray Movies</a>						
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
		<section class="product">
			<!--Section Header-->
			<div class="prod-header">
				<h3>New Release movies</h3>
				<a href="#">see all <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
			</div>
			<!--end Section Header-->

			<!--Prod display-->
			<div class="prod-show">
				<div class="item">
					<div class="item-img">
						<img src="img/3444521.jpg">
					</div>
					<div class="item-desc">
						<a class="item-title">The Legend of Tarzan</a>
						<p>(2016)</p>
					</div>
					<a href="#">Price R<b class="price">550</b></a><br>
					<a><span class="tile" data-name="Farcy Criminal" data-price="550">Add to Cart</span></a>
				</div>	
				<div class="item">
					<div class="item-img">
						<img src="img/3444521.jpg">
					</div>
					<div class="item-desc">
						<a class="item-title">The Legend of Tarzan</a>
						<p>(2016)</p>
					</div>
					<a href="#">Price R<b class="price">550</b></a><br>
					<a><span class="tile" data-name="Farcy Criminal" data-price="550">Add to Cart</span></a>
				</div>		
				<div class="item">
					<div class="item-img">
						<img src="img/3444521.jpg">
					</div>
					<div class="item-desc">
						<a class="item-title">The Legend of Tarzan</a>
						<p>(2016)</p>
					</div>
					<a href="#">Price R<b class="price">550</b></a><br>
					<a><span class="tile" data-name="Farcy Criminal" data-price="550">Add to Cart</span></a>
				</div>	
				<div class="item">
					<div class="item-img">
						<img src="img/3444521.jpg">
					</div>
					<div class="item-desc">
						<a class="item-title">The Legend of Tarzan</a>
						<p>(2016)</p>
					</div>
					<a href="#">Price R<b class="price">550</b></a><br>
					<a><span class="tile" data-name="Farcy Criminal" data-price="550">Add to Cart</span></a>
				</div>	
							
			</div>
		</section>
		<!--End Products section new releases-->

		<!--Products Section Top Sellers-->
		<section class="product">
			<!--Section Header-->
			<div class="prod-header">
				<h3>Top Seller movies</h3>
				<a href="#">see all <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
			</div>
			<!--end Section Header-->

			<!--Prod display-->
			<div class="prod-show">
				<div class="item">
					<div class="item-img">
						<img src="img/3444521.jpg">
					</div>
					<div class="item-desc">
						<a class="item-title">The Legend of Tarzan</a>
						<p>(2016)</p>
					</div>
					<a href="#">Price R<b class="price">550</b></a><br>
					<a><span class="tile" data-name="Farcy Criminal" data-price="550">Add to Cart</span></a>
				</div>	
				<div class="item">
					<div class="item-img">
						<img src="img/3444521.jpg">
					</div>
					<div class="item-desc">
						<a class="item-title">The Legend of Tarzan</a>
						<p>(2016)</p>
					</div>
					<a href="#">Price R<b class="price">550</b></a><br>
					<a><span class="tile" data-name="Farcy Criminal" data-price="550">Add to Cart</span></a>
				</div>		
				<div class="item">
					<div class="item-img">
						<img src="img/3444521.jpg">
					</div>
					<div class="item-desc">
						<a class="item-title">The Legend of Tarzan</a>
						<p>(2016)</p>
					</div>
					<a href="#">Price R<b class="price">550</b></a><br>
					<a><span class="tile" data-name="Farcy Criminal" data-price="550">Add to Cart</span></a>
				</div>	
				<div class="item">
					<div class="item-img">
						<img src="img/3444521.jpg">
					</div>
					<div class="item-desc">
						<a class="item-title">The Legend of Tarzan</a>
						<p>(2016)</p>
					</div>
					<a href="#">Price R<b class="price">550</b></a><br>
					<a><span class="tile" data-name="Farcy Criminal" data-price="550">Add to Cart</span></a>
				</div>				
			</div>
		</section>
		<!--End Products section Top Sellers-->

		<!--Products Section Best Comedies-->
		<section class="product">
			<!--Section Header-->
			<div class="prod-header">
				<h3>Fresh comedy movies</h3>
				<a href="#">see all <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
			</div>
			<!--end Section Header-->

			<!--Prod display-->
			<div class="prod-show">
				<div class="item">
					<div class="item-img">
						<img src="img/3444521.jpg">
					</div>
					<div class="item-desc">
						<a class="item-title">The Legend of Tarzan</a>
						<p>(2016)</p>
					</div>
					<a href="#">Price R<b class="price">550</b></a><br>
					<a><span class="tile" data-name="Farcy Criminal" data-price="550">Add to Cart</span></a>
				</div>	
				<div class="item">
					<div class="item-img">
						<img src="img/3444521.jpg">
					</div>
					<div class="item-desc">
						<a class="item-title">The Legend of Tarzan</a>
						<p>(2016)</p>
					</div>
					<a href="#">Price R<b class="price">550</b></a><br>
					<a><span class="tile" data-name="Farcy Criminal" data-price="550">Add to Cart</span></a>
				</div>		
				<div class="item">
					<div class="item-img">
						<img src="img/3444521.jpg">
					</div>
					<div class="item-desc">
						<a class="item-title">The Legend of Tarzan</a>
						<p>(2016)</p>
					</div>
					<a href="#">Price R<b class="price">550</b></a><br>
					<a><span class="tile" data-name="Farcy Criminal" data-price="550">Add to Cart</span></a>
				</div>	
				<div class="item">
					<div class="item-img">
						<img src="img/3444521.jpg">
					</div>
					<div class="item-desc">
						<a class="item-title">The Legend of Tarzan</a>
						<p>(2016)</p>
					</div>
					<a href="#">Price R<b class="price">550</b></a><br>
					<a><span class="tile" data-name="Farcy Criminal" data-price="550">Add to Cart</span></a>
				</div>				
			</div>
		</section>
		<!--End Products section Best Comedies-->

		<!--Products Section Bluray-->
		<section class="product">
			<!--Section Header-->
			<div class="prod-header">
				<h3>Blu-ray movies avalible</h3>
				<a href="#">see all <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
			</div>
			<!--end Section Header-->

			<!--Prod display-->
			<div class="prod-show">
				<div class="item">
					<div class="item-img">
						<img src="img/3444521.jpg">
					</div>
					<div class="item-desc">
						<a class="item-title">The Legend of Tarzan</a>
						<p>(2016)</p>
					</div>
					<a href="#">Price R<b class="price">550</b></a><br>
					<a><span class="tile" data-name="Farcy Criminal" data-price="550">Add to Cart</span></a>
				</div>	
				<div class="item">
					<div class="item-img">
						<img src="img/3444521.jpg">
					</div>
					<div class="item-desc">
						<a class="item-title">The Legend of Tarzan</a>
						<p>(2016)</p>
					</div>
					<a href="#">Price R<b class="price">550</b></a><br>
					<a><span class="tile" data-name="Farcy Criminal" data-price="550">Add to Cart</span></a>
				</div>		
				<div class="item">
					<div class="item-img">
						<img src="img/3444521.jpg">
					</div>
					<div class="item-desc">
						<a class="item-title">The Legend of Tarzan</a>
						<p>(2016)</p>
					</div>
					<a href="#">Price R<b class="price">550</b></a><br>
					<a><span class="tile" data-name="Farcy Criminal" data-price="550">Add to Cart</span></a>
				</div>	
				<div class="item">
					<div class="item-img">
						<img src="img/3444521.jpg">
					</div>
					<div class="item-desc">
						<a class="item-title">The Legend of Tarzan</a>
						<p>(2016)</p>
					</div>
					<a href="#">Price R<b class="price">550</b></a><br>
					<a><span class="tile" data-name="Farcy Criminal" data-price="550">Add to Cart</span></a>
				</div>				
			</div>
		</section>
		<!--End Products section Bluray-->

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