<?php include 'adminheader.php';

if (isset($_POST['submit'])) {
	extract($_POST);
	echo$q="insert into crime_types values(null,'$crime_type_name','$description')";
	insert($q);
	alert("successfully");
		}

 ?>

<form method="post">
	<center><h1>crime types</h1>
		<table>
			<tr>
				<th>crime type name</th>
				<td><input type="text" id="crime_type_name" name="crime_type_name"></td>
			</tr>
			<tr>
				<th>description</th>
				<td><textarea id="description" name="description" rows="7" cols="70"></textarea></td>
			</tr>
			<tr>
		   <td>
			<input type="submit" name="submit" value="ok">
		   </td>
	        </tr>
		</table>
</center>
</form>
<?php include 'publicfooter.php' ?>