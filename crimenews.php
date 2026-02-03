<?php include "policeheader.php";

$w=$_SESSION['police_id'];

extract($_GET);
if (isset($_POST['submit'])) {
extract($_POST);

echo $q="insert into case_news values(null,'$crime_id','$w','$title','$description','$image','$date_name','$status')";
	insert($q);
}
 ?>
<form method ="post">
	<center><h1>CRIME NEWS</h1>
		<table>
		<tr>
		<th>crime_id</th>
		<td><select  name="crime_id">

			<?php 
             $q="select * from crimes";
             $res=select($q);

             foreach ($res as $key) {
             	?>

<option  value="<?php echo $key['crime_id'] ?>"><?php echo $key['crime_title'] ?></option>
             	<?php 
             }

			 ?>
			
		</select></td>
			<tr>
				<th>title</th>
				<td><input type="text" id="title" name="title"></td>
			</tr>
			<tr>
				<th>description</th>
				<td><textarea id="description" name="description" rows="7" cols="70"></textarea></td>
			</tr>
			<tr>
				<th>image</th>
				<td><input type="file" id="image" name="image"></td>
			</tr>
			<tr>
				<th>date time</th>
				<td><input type="datetime-local" id="date_time" name="date_name"></td>
			</tr>
			<tr>
				<th>status</th>
				<td><input type="text" id="status" name="status"></td>
			</tr>
			<tr>
				<td><input type="submit" id="submit" value="ok" name="submit"></td>
			</tr>
		</table>
</form>
</center>
<?php include "publicfooter.php" ?>