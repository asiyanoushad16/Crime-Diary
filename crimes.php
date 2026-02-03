<?php include "policeheader.php";

$w=$_SESSION['police_id'];

extract($_GET);
if (isset($_POST['login'])) {
	extract($_POST);

  $q="insert into crimes values(null,'$lid','$crime_title','$description','$date_time_occurred','$date_time_reported','$w','$crime_status','$place','$district','$image')";
	insert($q);

}
?>
<form method="post">
	<center><h1>CRIMES!</h1>
	<table>
		<tr>
			<th>Crime type</th>
			<td>
				<select name="lid">
					<option>select crime type</option>
			<?php 

			$q="select * from crime_types";
			$res=select($q);
			foreach ($res as $row) { ?>
					<option value="<?php echo $row['crime_type_id'] ?>"><?php echo $row['crime_type_name'] ?></option>

			<?php } ?>

				</select>
			</td>
		</tr>
		<tr>
			<th>crime title:</th>
			<td><input type="text" id="crime_title" name="crime_title" required=""></td>
		</tr>
		<tr>
		<th>crime description:</th>
		<td><textarea id="description" name="description" rows="7" cols="70"></textarea></td>
	</tr>
	<tr>
	   	<th>date time occured:</th>
			<td><input type="date" id="date_time_occurred" name="date_time_occurred" required=""></td>
		</tr>
		<tr>
			<th>date time reported:</th>
			<td><input type="date" id="date_time_reported" name="date_time_reported" required=""></td>
		</tr>
		<tr>
			<th>crime status:</th>
			<td><input type="text" id="crime_status" name="crime_status" required=""></td>
		</tr>
		<tr>
			<th>place:</th>
			<td><input type="text" id="place" name="place" required=""></td>
		</tr>
		<tr>
			<th>district:</th>
			<td><input type="text" id="district" name="district" required=""></td>
		</tr>
		<tr>
			<th>image:</th>
			<td><input type="file" id="image" name="image" required=""></td>
		</tr>
		<tr>
		<td>
		<input type="submit" name="login" value="login">
	</td>

	</tr>
	</table>
</form>
</center>
<?php include 'publicfooter.php' ?>