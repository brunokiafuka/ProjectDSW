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



$html = '<h2 style="margin-bottom:0; color:#e67e22;">Customers - Report</h2><hr style="margin-bottom:10px; margin-top:0;">';

$html .= '<table width="100%">
			 <tr>		    	
		    	<th style="text-align:left;">Name</th>
		    	<th style="text-align:left;">Email</th>
		    	<th style="text-align:left;">City</th>
		    	<th style="text-align:left;">Country</th>
		    	<th style="text-align:left;">Address</th>
		    	<th style="text-align:left;">Newsletter</th>
   			</tr>';

  $q1=" select * from customer ";
     $stmt = $conn->prepare($q1);
     $stmt->execute();
 
      $count_cats= count($stmt);
   	$total = 0;
    while( $result = $stmt->fetch(PDO::FETCH_ASSOC))
	{	               
        

        $html .= '<tr align="center">
		    	<td style="font-size:12px;">'.$result['cust_name'].'</td>
		    	<td style="font-size:12px;">'.$result['cust_email'].'</td>
		    	<td style="font-size:12px;">'.$result['cust_city'].'</td>
		    	<td style="font-size:12px;">'.$result['cust_country'].'</td>
		    	<td style="font-size:12px;">'.$result['cust_address'].'</td>
		    	<td style="font-size:12px;">'.$result['newsletter'].'</td>
		    	</tr>'; 
    }

    $html .= '
    	</table>';

$mpdf = new mPDF('','A4','','',32,25,27,25,16,13,'L');
$mpdf->SetHTMLHeader('<img src="php/LogoBMovies.png" width="125" height="30" style="float:right;">');
$mpdf->WriteHTML($html);

$mpdf->Output();


	

?>