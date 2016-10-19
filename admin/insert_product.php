
<style >
	
	table {
    border-collapse: collapse;
}

th, td {
    text-align: left;
    padding: 8px;
}

tr:nth-child(odd){background-color: gray;}
tr:nth-child(even){background-color: white;}
</style>


<form action="insert_product.php" method="post" enctype="multipart/form-data">
	<table align="center" width="700" border="2">
	<tr align="center">
	<td colspan="8"><h2 style=" background-color: orage; text-align: center;">Insert new Movies here</h2></td>
	</tr>
	<tr>
	<td align="right"><b>Movie Title:</b></td>
	<td><input type="text" name="_title" size="60" required /></td>
	</tr>

	<tr>
	<td align="right"><b>Movie Price:</b></td>
	<td><input type="text" name="product_price" size="60" required /></td>
	</tr>

	<tr>
	<td align="right"><b>Movie Genre:</b></td>
	<td><input type="text" name="product_genre" size="60" required /></td>
	</tr>

	<tr>
	<td align="right"><b>Actor Name:</b></td>
	<td>
	<select name="product_cat" required>
	<option>Select an actor</option>
	</select>
	</td>
	</tr>

	<td align="right"><b>Movie Year:</b></td>
	<td><input type="text" name="product_keywords" size="60" required /></td>
	</tr >

	<tr>
	<td align="right"><b>Movie Image:</b></td>
	<td><input type="file" name="product_image" required /></td>
	</tr>

	<tr>
	<td align="right"><b>Movie Description:</b></td>
	<td><textarea name="product_desc" cols="20" rows="10"></textarea></td>
	</tr>
	<tr>
	<td align="right"><b>Movie Keywords:</b></td>
	<td><input type="text" name="product_keywords" size="60" required /></td>
	</tr >

	<tr align="center">
	<td colspan="7"><input type="submit" name="insert_post" value="Insert Product Now" /></td>
	</tr>


	</table>

</form>


