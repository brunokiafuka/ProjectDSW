<?php

	include ("MPDF57/mpdf.php");
	
	try{
		$dsn = "mysql:host=localhost;dbname=buntingmovies";
		$conn = new  PDO($dsn, "root", "");
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
	}
	catch(PDOExecption $e){
		echo $e->getMessage();
	}



$html = '<h2 style="margin-bottom:0; color:#e67e22;">Movies in store</h2><hr style="margin-bottom:10px; margin-top:0;">';

$html .= '<table width="100%">
			 <tr>
		    	<th style="text-align:left;">Id</th>
		    	<th style="text-align:left;">Title</th>
		    	<th style="text-align:left;">Price</th>
		    	<th style="text-align:left;">Genre</th>
		    	<th style="text-align:left;">Actor</th>
		    	<th style="text-align:left;">Year</th>    	
		    	<th style="text-align:left;">Type</th>
		    	<th style="text-align:left;">Stock</th>    	
   			</tr>';

  $q1=" select * from movies ";
     $stmt = $conn->prepare($q1);
     $stmt->execute();
 
      $count_cats= count($stmt);
   	$count = 0;
    while( $result = $stmt->fetch(PDO::FETCH_ASSOC))
	{	 
		$actor_id = $result['actor_id'];

	    $q2 = "SELECT actor_name FROM actor WHERE actor_id='$actor_id'";
        $stmt2 = $conn->prepare($q2);
        $stmt2->execute();                  
            $result2 = $stmt2->fetch(PDO::FETCH_ASSOC);
            $result2['actor_name'];                
        

        $html .= '<tr align="center">
		    	<td style="font-size:12px;">'.$result['movie_id'].'</td>
		    	<td style="font-size:12px;">'.$result['movie_title'].'</td>
		    	<td style="font-size:12px;">'.$result['movie_price'].'</td>
		    	<td style="font-size:12px;">'.$result['movie_genre'].'</td>
		    	<td style="font-size:12px;">'.$result2['actor_name'].'</td>
		    	<td style="font-size:12px;">'.$result['movie_year'].'</td>
		    	<td style="font-size:12px;">'.$result['movie_type'].'</td>
		    	<td style="font-size:12px;">'.$result['movie_stock'].'</td>
		    	</tr>';          
        $count++;       
    }

    $html .= '
    	</table>
    	<hr><h3>Movies in store '.$count.'</h3>';

$mpdf = new mPDF('','A4','','',32,25,27,25,16,13,'L');
$mpdf->SetHTMLHeader('<img src="LogoBMovies.png" width="125" height="30" style="float:right;">');
$mpdf->WriteHTML($html);

$mpdf->Output();


	

?>