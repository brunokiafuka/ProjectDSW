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



$html = '<h2 style="margin-bottom:0; color:#e67e22;">USER ORDER REPORT</h2>
		<hr style="margin-bottom:10px; margin-top:0;">';

$html .= '<table width="100%">
			 <tr>
		    	<th style="text-align:left;">Ref</th>
		    	<th style="text-align:left;">Customer</th>
		    	<th style="text-align:left;">Order Date</th>
		    	<th style="text-align:left;">Require Date</th>
		    	<th style="text-align:left;">Total</th>
		    	<th style="text-align:left;">Status</th>
   			</tr>';

  $q1=" select * from `order` where order_id='26'";
     $stmt = $conn->prepare($q1);
     $stmt->execute();
 
      $count_cats= count($stmt);
   	$total = 0;
    while( $result = $stmt->fetch(PDO::FETCH_ASSOC))
	{	 
		$actor_id = $result['cust_id'];
		$order = $result['order_id'];
	    $q2 = "SELECT cust_name FROM customer WHERE cust_id='$actor_id'";
        $stmt2 = $conn->prepare($q2);
        $stmt2->execute();                  
            $result2 = $stmt2->fetch(PDO::FETCH_ASSOC);
            $result2['cust_name'];                
        

        $html .= '<tr align="center">
		    	<td style="font-size:12px;">'.$result['order_id'].'</td>
		    	<td style="font-size:12px;">'.$result2['cust_name'].'</td>
		    	<td style="font-size:12px;">'.$result['order_date'].'</td>
		    	<td style="font-size:12px;">'.$result['require_date'].'</td>
		    	<td style="font-size:12px;">'.$result['order_total'].'</td>
		    	<td style="font-size:12px;">'.$result['order_status'].'</td>
		    	</tr>';          
    }

    $html .= '
    	</table>
    	<hr>
    	<h4 style="margin-bottom:0; color:#e67e22;">Ordered Movies</h4>
    	<hr style="margin-bottom:10px; margin-top:0;">';

    #DETAILS

    $html .= '<table width="100%">
			 <tr>
		    	<th style="text-align:left;">Movie</th>
		    	<th style="text-align:left;">Price</th>
		    	<th style="text-align:left;">Quantity</th>
		    	<th style="text-align:left;">Total</th>
   			</tr>';

    $details=$conn->prepare("SELECT * FROM order_details WHERE order_id = ?");
    $details->execute(array($order));
    while ($result=$details->fetch(PDO::FETCH_ASSOC)) {
    	# code...
    	  $html .= '<tr align="center">
		    	<td style="font-size:12px;">'.$result['movie_title'].'</td>
		    	<td style="font-size:12px;">'.$result['price'].'</td>
		    	<td style="font-size:12px;">'.$result['quantity'].'</td>
		    	<td style="font-size:12px;">'.$result['total'].'</td>
		    	</tr>';
        $total += $result['total'];       

    }

     $html .= '</table>
    	<hr>    	
    	<h3 style="text-align:left;">Order Total: R'.$total.'</h3>';

$mpdf = new mPDF('','A4','','',32,25,27,25,16,13,'L');
$mpdf->SetHTMLHeader('<img src="php/LogoBMovies.png" width="125" height="30" style="float:right;">');
$mpdf->WriteHTML($html);

$mpdf->Output();


	

?>