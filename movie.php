
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
				
					<a class="cart" href="#">My Cart <span class="numItens"> 0 </span>Item - <span class="totalCart">R0.00</span></a>
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
		<!--Section that will display the data acordding to the switch()-->
			<?php
				include ("php/server.php");
				if(isset($_GET['genre']) && isset($_GET['movietype'])){	

					$genre = $_GET['genre'];	
					$mtype = $_GET['movietype'];

					//Select stmt to get the total of values on the table
						$sql=$conn->prepare("SELECT COUNT(movie_id) FROM movies WHERE movie_genre = :genre and movie_type = :type ");
						$sql->bindValue(":genre", $genre);
						$sql->bindValue(":type", $mtype);
						$sql->execute();
						//total of row count
						$num_rows = $sql->fetch(PDO::FETCH_NUM);
						$num_rows = $num_rows[0];						
						//This is the number of results per page
						$page_row = 2;
						//this will tells us the page number of our last page
						$last = ceil($num_rows/$page_row);
						//make sure last never less than 1
						if ($last < 1) {
							$last = 1;
						}
						//establish the page num variable
						$pagenum = 1;
						//get pagenum for url vars if it's present, else it is 1
						if (isset($_GET['pn'])) {
							$pagenum = preg_replace('#[^0-9]#', '', $_GET['pn']);						
						}
						//make sure the page num isn't below 1, or more than our $last page
						if ($pagenum < 1) {
							$pagenum = 1;
						}else if ($pagenum > $last) {
							$pagenum = $last;
						}
						//this sets the range of rows to query for the chosen pn
						$limit = 'LIMIT ' .($pagenum - 1) * $page_row.','.$page_row;

					$q3=" SELECT * from movies where movie_genre = :genre and movie_type = :type $limit " ;
					$stmt = $conn->prepare($q3);
					$stmt->bindValue(":genre", $genre);
					$stmt->bindValue(":type", $mtype);
					$stmt->execute();

					switch ($genre) {
						case 'Action':
							echo	"<section class='product'>
							<!--Section Header-->
							<div class='prod-header'>
							<h3>".$mtype. " > ".$genre. "</h3>				
							</div>
							<!--end Section Header-->
							<!--Prod display-->
							<div class='prod-show'>";
							break;
						case 'Comedy':
							echo	"<section class='product'>
							<!--Section Header-->
							<div class='prod-header'>
							<h3>".$mtype. " > ".$genre. "</h3>				
							</div>
							<!--end Section Header-->
							<!--Prod display-->
							<div class='prod-show'>";
							break;
						case 'Drama':
							echo	"<section class='product'>
							<!--Section Header-->
							<div class='prod-header'>
							<h3>".$mtype. " > ".$genre. "</h3>				
							</div>
							<!--end Section Header-->
							<!--Prod display-->
							<div class='prod-show'>";
							break;
						case 'Documentary':
							echo	"<section class='product'>
							<!--Section Header-->
							<div class='prod-header'>
							<h3>".$mtype. " > ".$genre. "</h3>				
							</div>
							<!--end Section Header-->
							<!--Prod display-->
							<div class='prod-show'>";
							break;
						case 'Sci-Fic':
							echo	"<section class='product'>
							<!--Section Header-->
							<div class='prod-header'>
							<h3>".$mtype. " > ".$genre. "</h3>				
							</div>
							<!--end Section Header-->
							<!--Prod display-->
							<div class='prod-show'>";
							break;
						default:
							# code...
							break;
					}

					//show user what page their on and total num of pages
						$text1 = "Movies in store <b>$num_rows</b>";
						$text2 = "Page <b>$pagenum</b> of <b>$last</b>";

						//establish pagination control var
						$pnCtrls = '';
						//if there's more than 1 page worth of results
						if ($last != 1) {
							/*First we check if we're on page 1. 
							if we r then we don't need a link to the prev page or first page, so we do nothinh.
							else we generate links to prev page and 1st page */
							if ($pagenum > 1) {
								$prev = $pagenum - 1;
								$pnCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?genre='.$genre.'&movietype='.$mtype.'&pn='.$prev.'#"><span><i class="fa fa-step-backward" aria-hidden="true"></i></span></a>&nbsp;';
								// render clickable num links that shoul appear on the left
								for ($i=$pagenum - 4; $i < $pagenum; $i++) { 
									if ($i > 0) {
										$pnCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?genre='.$genre.'&movietype='.$mtype.'&pn='.$i.'#"><span>'.$i.'</span></a>&nbsp;';						
									}
								}
							}
							//render the page num but without being a link
							$pnCtrls .= '<a class="pag-selected">'.$pagenum.'</a>&nbsp;';
							//render clikckable number links on right
							for ($i= $pagenum + 1; $i <= $pagenum ; $i++) { 
								$pnCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?genre='.$genre.'&movietype='.$mtype.'&pn='.$i.'#"><span>'.$i.'</span></a>&nbsp;';
								if($i >= $pagenum+4){
									break;
								}							
							}

							if ($pagenum != $last) { //render next value
								$next = $pagenum + 1;
								$pnCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?genre='.$genre.'&movietype='.$mtype.'&pn='.$next.'#"><span><i class="fa fa-step-forward" aria-hidden="true"></i></span></a>&nbsp;';
							}							
						}
						

						echo "<div class='pagination'>
							<p>$text1</p>
							<p>$text2</p>
							<div class='pagination_controls'>$pnCtrls</div>
						</div>";

						//grabb the info to display
					
					while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
						if ($result > 0) {
							echo"
							<div class='item'>
								<form method='post'>
								<div class='item-img'>
								<img src='admin/movie_images/".$result['movie_image']."'>
								</div>
								<div class='item-desc'>
									<a class='item-title'>(".$result['movie_title'].")</a>
								<p>".$result['movie_year']."</p>
								</div>
								<a href='#'>Price R<b class='price'>".$result['movie_price']."</b></a><br>
								<button data-id=".$result['movie_id']." class='button'>Add to cart</button>
								</form>
								</div>
								";								
						}
						else{
							echo "<div class='item' style='text:center; color:#000; height:400px;'>
								<p>Product not availbe in store</p>
								</div>";
						}																			
					}
					echo "<!--Prod display-->				
						</div>
							<div class='pagination'>
								<div class='pagination_controls'>$pnCtrls</div>
							</div>
						</section>
						<!--End Products section new releases-->";							
				}
			

			?>

		
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