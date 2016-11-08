<?php

	include ("php/MPDF57/mpdf.php");
	
	try{
		$dsn = "mysql:host=localhost;dbname=buntingmovies";
		$conn = new  PDO($dsn, "root", "");
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
	}
	catch(PDOExecption $e){
		echo $e->getMessage();
	}


$movie = $_GET['pro'];

$html = '<h2 style="margin-bottom:0; color:#e67e22;">Product Sales</h2>
		<hr style="margin-bottom:10px; margin-top:0;">';

$html .= '<table width="100%">
			 <tr>
		    	<th style="text-align:left;">ID</th>
		    	<th style="text-align:left;">Title</th>
		    	<th style="text-align:left;">Type</th>
		    	<th style="text-align:left;">Genre</th>
		    	<th style="text-align:left;">Price</th>
		    	<th style="text-align:left;">Stock</th>
   			</tr>';

 	$q1=" select * from movies where movie_id = ?";
     $stmt = $conn->prepare($q1);
     $stmt->execute(array($movie));
 
      $count_cats= count($stmt);
   	$count = 0;
    while( $result = $stmt->fetch(PDO::FETCH_ASSOC))
	{ 
		
        $html .= '<tr align="center">
		    	<td style="font-size:12px;">'.$result['movie_id'].'</td>
		    	<td style="font-size:12px;">'.$result['movie_title'].'</td>
		    	<td style="font-size:12px;">'.$result['movie_type'].'</td>
		    	<td style="font-size:12px;">'.$result['movie_genre'].'</td>
		    	<td style="font-size:12px;">'.$result['movie_price'].'</td>
		    	<td style="font-size:12px;">'.$result['movie_stock'].'</td>
		    	</tr>';          
        $count++;       
    }

    $html .= '
    	</table>
    	<hr>
    	<h4 style="margin-bottom:0; color:#e67e22;">Sales Info</h4>
    	<hr style="margin-bottom:10px; margin-top:0;">';

    #DETAILS

    $html .= '<table width="100%">
			 <tr>
		    	<th style="text-align:left;">Order Ref</th>
		    	<th style="text-align:left;">Quantity</th>
		    	<th style="text-align:left;">Total</th>
   			</tr>';

    $details=$conn->prepare("SELECT * FROM order_details WHERE movie_id = ?");
    $details->execute(array($movie));
    $qtySold = 0;
    while ($result=$details->fetch(PDO::FETCH_ASSOC)) {
    	# code...
    	  $html .= '<tr align="center">
		    	<td style="font-size:12px;">'.$result['order_id'].'</td>    	  		
		    	<td style="font-size:12px;">'.$result['quantity'].'</td>
		    	<td style="font-size:12px;">'.$result['total'].'</td>
		    	</tr>';
        $total += $result['total'];       
        $qtySold += $result['quantity'];
    }

     $html .= '</table>
    	<hr>    	
    	<h4 style="text-align:left;">Movies Quantity Sold: '.$qtySold.'</h4>
    	<h3 style="text-align:left;">Movies Sold Total: R'.$total.'</h3>';

$mpdf = new mPDF('','A4','','',32,25,27,25,16,13,'L');
$mpdf->SetHTMLHeader('<img src="php/LogoBMovies.png" width="125" height="30" style="float:right;">');
$mpdf->WriteHTML($html);

$mpdf->Output();


	

?>