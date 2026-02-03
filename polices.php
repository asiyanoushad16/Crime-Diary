<?php include 'adminheader.php';

if (isset($_POST['login'])) {
	extract($_POST);

    $q="insert into login values(null,'$username','$password','police')";
     $lid=insert($q);
 $q="insert into polices values(null,'$lid','$station_id','$first_name','$last_name','$house_name','$place','$dob','$gender','$phone','$email')";
	insert($q);

}


 ?>
<form method="post">
	<center><h1>polices</h1>
<table>
		<tr>
		<th>username:</th>
		<td><input type="text" id="username" name="username"></td>
	</tr>
	<tr>
		<th>password:</th>
		<td><input type="password" id="password" name="password"></td>
	</tr>
	<tr>
		<th>Station</th>
		<td><select  name="station_id">

			<?php 
             $q="select * from police_stations";
             $res=select($q);

             foreach ($res as $key) {
             	?>

<option  value="<?php echo $key['station_id'] ?>"><?php echo $key['name'] ?></option>
             	<?php 
             }

			 ?>
			
		</select></td>
	</tr>
	<tr>
		<th>first_name:</th>
		<td><input type="text" id="first_name" name="first_name"></td>
	</tr>
	<tr>
		<th>last_name:</th>
		<td><input type="text" id="last_name" name="last_name"></td>
	</tr>
	<tr>
		<th>house_name:</th>
		<td><input type="text" id="house_name" name="house_name"></td>
	</tr>
	<tr>
		<th>place:</th>
		<td><input type="text" id="place" name="place"></td>
	</tr>
	<tr>
		<th>dob:</th>
		<td><input type="date" id="dob" name="dob"></td>
	</tr>
	<tr>
		<th>gender:</th>
		<td><input type="text" id="gender" name="gender"></td>
	</tr>
	<tr>
		<th>phone:</th>
		<td><input type="text" id="phone" name="phone"></td>
	</tr>
	<tr>
		<th>email:</th>
		<td><input type="email" id="email" name="email"></td>
	</tr>
	<tr>
		<td>
			<input type="submit" name="login" value="login">
		</td>
	</tr>
</table>
</form>
<?php include 'publicfooter.php' ?>