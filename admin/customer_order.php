<!DOCTYPE html>
<?php
if(!isset($_SESSION['username']))
{
echo "<script>window.open('index.php?not_admin=You are not an Admin','_self')</script>";
}
else
{
?>
<html>
    <head>
      <title>Insert Product</title>
      <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
      <script>tinymce.init({ selector:'textarea' });</script>
      <link rel="stylesheet" type="text/css" href="style/styles.css">
      <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
    </head>

    <body>
  

<?php
  include ("php/server.php");
  if (isset($_GET['searchOrder'])) {
    $order = $_GET['searchOrder'];
    $html = '<div style="margin-left:50px;">
    <h2 style="margin-bottom:0; color:#e67e22;">USER ORDER REPORT</h2>
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

  $q1=" select * from `order` where order_id=?";
     $stmt = $conn->prepare($q1);
     $stmt->execute(array($order));
 
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
      <h3 style="text-align:left;">Order Total: R'.$total.'</h3>
      <a href="orderUserReport.php?id='.$order.'" target="blank" style="margin-left: 60px; margin-bottom: 10px;">Print Report</a>
      </div>';

      echo $html;
  }

?>
</body>
</html>

<?php } ?>