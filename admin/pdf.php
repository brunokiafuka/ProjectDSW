<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>jsPDF Demo</title>
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

  
      <link rel="stylesheet" href="css/style.css">

  
</head>

<body>
  <h1>jsPDF Demo</h1>
<p>This is a sample of how to use  <a href="https://parall.ax/products/jspdf">jsPDF</a>.</p>
<p> Write some text and donwload a pdf file with your content</p>

<table id="txtContent" width="795" align="center" bgcolor="gray" style="margin-left:100px;">
	<tr align="center">
		<td colspan="6"><h2>VIEW ALL ACTORS HERE</h2></td>

	</tr>
    
    <tr align="center" >
    	<th>Employee Id</th>
    	<th>Employee Name</th>
    	<th>Employee Email</th>
      <th>Employee Category</th>
    	<th>Edit</th>
    	<th>Delete</th>
    </tr>
    </table>
<button id="btnDownload"> Download PDF </button>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jspdf/0.9.0rc1/jspdf.min.js'></script>

      <script src="js/index.js"></script>

</body>
</html>
