<?php 
if(!isset($_SESSION['username']))
{
echo "<script>window.open('../index.php?not_admin=You are not an Admin','_self')</script>";
}
else
{
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
<?php } ?>