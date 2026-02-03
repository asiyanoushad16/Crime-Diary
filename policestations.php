<?php include 'adminheader.php' ;

if (isset($_POST['login'])) {
	extract($_POST);
	$q="insert into police_stations values(null,'$name','$place','$landmark','$pincode','$phone')";
	insert($q);

	alert("successfully");
			return redirect("policestations.php");
}


?>
	<form method="post">
		<table>
			<center><h1>police stations</h1>
			<tr>
		<th>name:</th>
		<td><input type="text" id="name" name="name" required="" ></td>
	</tr>
	<tr>
		<th>place:</th>
		<td><input type="text" id="place" name="place" required=""></td>
	</tr>
	<tr>
		<th>landmark:</th>
			<td><input type="text" id="landmark" name="landmark" required=""></td>
		</tr>
		<th>pincode:</th>
		<td><input type="numeric" id="pincode" name="pincode" required=""></td>
	</tr>
	<tr>
		<th>phone:</th>
		<td><input type="numeric" id="phone" name="phone" required=""></td>
	</tr>
	<tr>
		<td>
			<input type="submit" name="login" value="login">
		</td>
	<?php include 'publicfooter.php' ?>