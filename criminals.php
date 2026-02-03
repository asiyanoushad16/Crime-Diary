<?php include "policeheader.php" ;

if (isset($_POST['submit'])) {
	extract($_POST);
echo $q="insert into criminals values(null,'$crime_id','$first_name','$last_name','$house_name','$place','$district','$gender','$dob','$photo','$identification_mark_1','$identification_mark_2')";
	insert($q);
}

?>
	<form method="post">
		<center><h1>CRIMINALS</h1>
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
					<th>first name</th>
					<td><input type="text" id="first_name" name="first_name"></td>
				</tr>
				<tr>
					<th>last name</th>
					<td><input type="text" id="last_name" name="last_name"></td>
				</tr>
				<tr>
					<th>house name</th>
					<td><input type="text" id="house_name" name="house_name"></td>
				</tr>
				<tr>
					<th>place</th>
					<td><input type="text" id="place" name="place"></td>
				</tr>
				<tr>
					<th>district</th>
					<td><input type="text" id="district" name="district"></td>
				</tr>
				<tr>
					<th>gender</th>
					<td><input type="text" id="gender" name="gender"></td>
				</tr>
				<tr>
					<th>dob</th>
					<td><input type="date" id="dob" name="dob"></td>
				</tr>
				<tr>
					<th>photo</th>
					<td><input type="file" id="photo" name="photo"></td>
				</tr>
				<tr>
					<th>identification mark 1</th>
					<td><input type="text" id="identification_mark_1" name="identification_mark_1"></td>
				</tr>
				<tr>
					<th>identification mark 2</th>
					<td><input type="text" id="identification_mark_2" name="identification_mark_2"></td>
				</tr>
				<tr>
		        <td><input type="submit" name="submit" value="ok"></td>
	            </tr>
			</table>
	</form>
</center>
<?php include "publicfooter.php" ?>