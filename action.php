<?php
	include ("php/server.php");

	session_start();
	if (isset($_POST['addToCart'])) {
		
		$movieId = $_POST['movieId'];
		$custId = $_SESSION['userId'];

		$stmt = $conn->prepare("SELECT * FROM cart WHERE movie_id = :mID AND cust_id = :cid");		
		$stmt->bindValue(":mID", $movieId);
		$stmt->bindValue(":cid", $custId);
		$stmt->execute();

		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		if (count($result) > 0) {
				echo "Product Already in cart Contineu shopping!..";
			}
			else{
				$stmt = $conn->prepare("SELECT * FROM movies WHERE movie_id = ?");
				$stmt->execute(array($movieId));
				while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
					$movieID = $result['movie_id'];
					$movieTitle = $result['movie_title'];
					$movieImg = $result['movie_image'];
					$moviePrice = $result['movie_price'];
						echo "string";
				}

				$stmt=$conn->prepare("INSERT INTO cart (movie_id, cust_id, ip_Add, movie_img, movie_title, qty, price, total_amt) VALUES (:mid, :custid, :ip, :img, :title, :qtd, :price, :amount)");
				$stmt->bindValue(":mid", $movieId);
				$stmt->bindValue(":custid", $custId);
				$stmt->bindValue(":ip", 0);
				$stmt->bindValue(":img", $movieImg);
				$stmt->bindValue(":title", $movieTitle);
				$stmt->bindValue(":qtd", 1);
				$stmt->bindValue(":price", $moviePrice);
				$stmt->bindValue(":amount", $moviePrice);
				$stmt->execute();
					echo "Product is addded";
				


			}
		#end

		
	}#end isset


	if (isset($_POST['countCart'])) {
		# code...
		$custId = $_SESSION['userId'];

		$stmt = $conn->prepare("SELECT COUNT(id) FROM cart WHERE cust_id = :cid");		
		$stmt->bindValue(":cid", $custId);
		$stmt->execute();
		$num_rows = $stmt->fetch(PDO::FETCH_NUM);
		$num_rows = $num_rows[0];
		echo $num_rows;

	}#end issset

	if (isset($_POST['totalAmountTop'])) {
		# code...
		$custId = $_SESSION['userId'];
		
		$stmt = $conn->prepare("SELECT total_amt FROM cart WHERE cust_id = :cid");		
		$stmt->bindValue(":cid", $custId);
		$stmt->execute();

		$total = 0;
		while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
			$total += $result['total_amt'];
		}

		echo $total;

	}
?>

