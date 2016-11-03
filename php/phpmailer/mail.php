
<?php
	require 'PHPMailerAutoload.php';

	$mail = new PHPMailer;

	//$mail->SMTPDebug = 3;                               // Enable verbose debug output

	$mail->isSMTP();                                      // Set mailer to use SMTP
	$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
	$mail->SMTPAuth = true;                               // Enable SMTP authentication
	$mail->Username = 'buntingmoviesinfo@gmail.com';                 // SMTP username
	$mail->Password = 'buntingmovies12';                           // SMTP password
	$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
	$mail->Port = 587;                                    // TCP port to connect to

	$mail->setFrom('buntingmoviesinfo@gmail.com', 'BuntingMovies');
	$mail->addAddress('brunokiafuka@live.com.pt', 'User');     // Add a recipient
	$mail->addAddress('brunokiafuka@live.com.pt');               // Name is optional
	
	

	                         

	$mail->Subject = 'Account Activation';
	$mail->Body    = 'Hi, Bruno!<br> You have successfully registered, pleace click <a href="http://localhost/ProjectDSW/index.php">here</a> confirm your mail <b>in bold!</b>';
	$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

	if(!$mail->send()) {
	    echo 'Message could not be sent.';
	    echo 'Mailer Error: ' . $mail->ErrorInfo;
	} else {
	    echo 'Message has been sent';
	}
?>