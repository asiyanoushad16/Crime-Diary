<?php include "policeheader.php";

$w=$_SESSION['police_id'];

extract($_GET);
if (isset($_POST['submit'])) {
	extract($_POST);

  echo $q="insert into case_diary values(null,'$crime_id','$w','$file_path','$description','$date_time')";
	insert($q);

}
 ?>
<form method="post">
	<center><h1>case diary</h1>
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
	</tr>
		<tr>
			<th>file path</th>
			<td><input type="file" id="file_path" name="file_path"></td>
		</tr>
		<tr>
			<th>description</th>
			<td><textarea id="description" name="description" rows="7" cols="70"></textarea></td>
		</tr>
		<tr>
			<th>date time</th>
			<td><input type="datetime-local" id="date_time" name="date_time"></td>
		</tr>
		<tr>
			<td><input type="submit" id="submit" value="ok" name="submit"></td>
		</tr>
	</table>
</form>
<?php include "publicfooter.php" ?>