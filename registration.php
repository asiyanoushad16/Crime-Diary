
<?php include 'publicheader.php';


if (isset($_POST['login'])){

	extract($_POST);


	$q="insert into login values(null,'$username','$password','user')";
	$lid=insert($q);
	$q="insert into users values(null,'$lid','$first_name','$last_name','$house_name','$place','$pincode','$phone','$email','$aadhar_no')";
	insert($q);

}


 ?>
<form method="post">
		<center><h1>Registration Form</h1>
		<table>
			<tr>
		<th>username:</th>
		<td><input type="text" id="username" name="username" required></td>
	</tr>
	<tr>
		<th>password:</th>
		<td><input type="password" id="password" name="password" required></td>
	</tr>
	<tr>
		<th>first_name:</th>
			<td><input type="text" id="first_name" name="first_name" required></td>
		</tr>
		<tr>
			<th>last_name:</th>
			<td><input type="text" id="last_name" name="last_name" required></td>
		</tr>
		<tr>
			<th>house_name:</th>
			<td><input type="text" id="house_name" name="house_name" required></td>
		</tr>
		<tr>
			<th>place:</th>
			<td><input type="text" id="place" name="place" required></td>
		</tr>
		<tr>
			<th>pincode:</th>
			<td><input type="numeric" id="pincode" name="pincode" required></td>
		</tr>
		<tr>
			<th>phone:</th>
			<td><input type="numeric" id="phone" name="phone" required></td>
		</tr>
		<tr>
			<th>email:</th>
			<td><input type="email" id="email" name="email" required></td>
			</tr>
			<tr>
				<th>aadhar_no</th>
			<td><input type="numeric" id="aadhar_no" name="aadhar_no" required></td>
		</tr>
		<tr>
		<td>
		<input type="submit" name="login" value="Login">
	</td>

	</tr>
	</table>

<?php include 'publicfooter.php' ?>




