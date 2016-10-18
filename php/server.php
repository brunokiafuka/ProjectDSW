<?php 
	//connection
	try{
		$dsn = "mysql:host=localhost;dbname=buntingmovies";
		$conn = new  PDO($dsn, "root", "");
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
	}
	catch(PDOExecption $e){
		echo $e->getMessage();
	}

?>