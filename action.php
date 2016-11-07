<?php
	include ("php/server.php");

	session_start();
	if (isset($_POST['addToCart'])) {
		if (isset($_SESSION['userId'])) {
			# code...
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
				}#end
		}else{
			echo "Please Register or log in to be able to shop";
		}#inner if	
			
	}#end isset


	if (isset($_POST['countCart'])) {
		# code...
		if (isset($_SESSION['userId'])) {
			# code...
			$custId = $_SESSION['userId'];
			$stmt = $conn->prepare("SELECT COUNT(id) FROM cart WHERE cust_id = :cid");		
			$stmt->bindValue(":cid", $custId);
			$stmt->execute();
			$num_rows = $stmt->fetch(PDO::FETCH_NUM);
			$num_rows = $num_rows[0];
			echo $num_rows;
		}else{
			echo "0";
		}
		

	}#end issset

	if (isset($_POST['totalAmountTop'])) {
		# code...
		if (isset($_SESSION['userId'])) {
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
		}else{
			echo "0.00";
		}
		

	}#



	if (isset($_POST['cart_checkout'])) {
		$custId = $_SESSION['userId'];
		
		$stmt = $conn->prepare("SELECT * FROM cart WHERE cust_id = :cid");		
		$stmt->bindValue(":cid", $custId);
		$stmt->execute();

		
		while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
			echo '
				<article class="product">
				<header>
					<img src="admin/movie_images/'.$result["movie_img"].'" alt="">
				</header>

				<div class="content">

					<h1>'.$result["movie_title"].'</h1>					
				</div>

				<footer class="content">					
					<input id="qty-'.$result["movie_id"].'" type="text" class="qty" prodID="'.$result["movie_id"].'" value="'.$result["qty"].'"></input>
					<button update-id="'.$result["movie_id"].'" class="action-cart update">Update</button>
					<button remove-id="'.$result["movie_id"].'" class="action-cart remove">Remove</button>
					<h2 id="total-'.$result["movie_id"].'" prodID="'.$result["movie_id"].'" class="full-price">
						'.$result["total_amt"].'
					</h2>

					<input id="price-'.$result["movie_id"].'" prodID="'.$result["movie_id"].'"  class="price" value="'.$result["price"].'" disabled></input>					
				</footer>
			</article>';
		}#while end
		
	}#issest end



	#removeFromCart
	if (isset($_POST['removeFromCart'])) {
		# code...DELETE FROM `cart` WHERE 1
		$movieID = $_POST['removeId'];
		$custId =  $_SESSION['userId'];
		
		
		$custId = $_SESSION['userId'];
		$stmt=$conn->prepare("DELETE FROM cart WHERE movie_id=:mId AND cust_id=:userId");
		$stmt->bindValue(":mId", $movieID);
		$stmt->bindValue(":userId",$_SESSION['userId']);
		$stmt->execute();


		echo "Removed";

		
	}#end
#data: {updateProduct:1,updateId:movieId,qtyUpdate:qty,totalUpdate:total},

	#updateItem
	if (isset($_POST['updateProduct'])) {
		# code...
		$movieID = $_POST['updateId'];
		$qtyUpdate = $_POST['qtyUpdate'];
		$totalUpdate = $_POST['totalUpdate'];
		$custId =  $_SESSION['userId'];

		$stmt=$conn->prepare("UPDATE cart SET qty=:q, total_amt=:t WHERE movie_id=:mId AND cust_id=:userId");
		$stmt->bindValue(":q",$qtyUpdate);
		$stmt->bindValue(":t",$totalUpdate);
		$stmt->bindValue(":mId", $movieID);
		$stmt->bindValue(":userId",$_SESSION['userId']);
		$stmt->execute();

		echo "Item quantity updated";

	}


	#confirm Order
	if (isset($_POST['confirmOrder'])) {
		# code...
		$userID = $_POST['userid'];
		$orderTotal = 0;
		//get order total
		$sql=$conn->prepare("SELECT * FROM cart WHERE cust_id =?");
		$sql->execute(array($userID));
		while ($row=$sql->fetch(PDO::FETCH_ASSOC)) {
			$orderTotal += $row['total_amt'];			
		}


		//Insert into Order Table
		$DATE = date('Y/m/d');
		$reqDate= Date('Y/m/d', strtotime("+5 days"));
		$stats = "To Deliver";
		
		$insert =$conn->prepare("INSERT INTO `order`(`order_total`, `order_date`, `require_date`, `cust_id`, `order_status`) VALUES (:total, :ddate, :rdate, :cus, :status)");
		$insert->bindValue(":total", $orderTotal);
		$insert->bindValue(":ddate", $DATE);
		$insert->bindValue(":rdate", $reqDate);
		$insert->bindValue(":cus", $userID);
		$insert->bindValue(":status", $stats);
		$insert->execute();

		//get Last Id 
		$sql=$conn->prepare("SELECT * FROM `order` WHERE `cust_id` =? AND `order_date` =? LIMIT 1");
		$sql->execute(array($userID, $DATE));
		while ($row=$sql->fetch(PDO::FETCH_ASSOC)) {
			$orderID= $row['order_id'];			
		}
		

		//insert Details
		$sql=$conn->prepare("SELECT * FROM cart WHERE cust_id =?");
		$sql->execute(array($userID));
		while ($row=$sql->fetch(PDO::FETCH_ASSOC)) {
			$inserDetails =$conn->prepare("INSERT INTO `order_details`(`order_id`, `movie_id`, `price`, `quantity`, `total`, `movie_title`, `movie_img`) VALUES (?, ?, ?, ?, ?, ?, ?)");
			$inserDetails->execute(array($orderID, $row['movie_id'], $row['price'], $row['qty'], $row['total_amt'],$row['movie_title'], $row['movie_img']));	
		}


		##===>MAIL

				$stm=$conn->prepare("SELECT * FROM customer WHERE cust_id = ? LIMIT 1");				
				$stm->execute(array($userID));
				while( $result = $stm->fetch(PDO::FETCH_ASSOC)){
						if ($result > 0){
							$email = $result['cust_email'];
							$name = $result['cust_name'];
						}
					}
				require 'php/phpmailer/PHPMailerAutoload.php';

				$mail = new PHPMailer;

				//$mail->SMTPDebug = 3;                               // Enable verbose debug output

				$conf_code = md5(uniqid(rand()));
				$mail->isSMTP();                                      // Set mailer to use SMTP
				$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
				$mail->SMTPAuth = true;                               // Enable SMTP authentication
				$mail->Username = 'buntingmoviesinfo@gmail.com';                 // SMTP username
				$mail->Password = 'buntingmovies12';                           // SMTP password
				$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
				$mail->Port = 587;                                    // TCP port to connect to

				$mail->setFrom('buntingmoviesinfo@gmail.com', 'BuntingMovies');
				$mail->addAddress($email, $name);     // Add a recipient
				$mail->addAddress($email);             // Name is optional	

				$mail->Subject = 'Order Confirmation';
				$mail->Body    = 'Hi!
				<br>
				<br>
				Order Ref: '.$orderID.'
				<br> You have successfully placed your order, you will be receiving your products soon.<br>The total of your order is: R'.$orderTotal.' ';
				$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

				if(!$mail->send()) {
				    echo 'Message could not be sent.';
				    echo 'Mailer Error: ' . $mail->ErrorInfo;
				} else {
				    echo 'Message has been sent';
				    header("location: confirm-mail.php");
				}			
	}
?>

