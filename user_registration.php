<?php include 'publicheader.php' ;

if (isset($_POST['submitbutton'])) 
{
	extract($_POST);
	$m="select * from login where username='$uname'";
	$to=select($m);
	if (sizeof($to)>0) 
	{
		alert('username already exist');
	}
	else
	{
	$h="insert into login values(null,'$uname','$pword','user')";
	$res=insert($h);
	$w="insert into users values(null,'$res','$fname','$lname','$hname','$place','$pincode','$phone','$email','$aadharno')";
	insert($w);
	alert('registration successfull');
	return redirect('login.php');		
	}
}

?>

<center>

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container" data-aos="zoom-out" data-aos-delay="100">
	
<form method="post">
	
<h1>User <span>Registration</span> </h1>

<table class="table" style="width: 500px;">
	<tr>
		<th>First Name</th>
		<td><input type="text" required="" class="form-control" name="fname"></td>
	</tr>
	<tr>
		<th>Last Name</th>
		<td><input type="text" required="" class="form-control" name="lname"></td>
	</tr>
	<tr>
		<th>House Name</th>
		<td><input type="text" required="" class="form-control" name="hname"></td>
	</tr>
	<tr>
		<th>Place</th>
		<td><input type="text" required="" class="form-control" name="place"></td>
	</tr>
	<tr>
		<th>Pincode</th>
		<td><input type="text" required="" class="form-control" maxlength="6" pattern="[0-9]{6}" name="pincode"></td>
	</tr>
	<tr>
		<th>Phone</th>
		<td><input type="text" required="" class="form-control" maxlength="10" pattern="[0-9]{10}" name="phone"></td>
	</tr>
	<tr>
		<th>Email</th>
		<td><input type="email" required="" class="form-control" name="email"></td>
	</tr>
	<tr>
		<th>Aadhar</th>
		<td><input type="text" required="" class="form-control" maxlength="12" pattern="[0-9]{12}" name="aadharno"></td>
	</tr>
	<tr>
		<th>Username</th>
		<td><input type="text" required="" class="form-control" name="uname"></td>
	</tr>
	<tr>
		<th>Password</th>
		<td><input type="password" required="" class="form-control" name="pword"></td>
	</tr>
	<tr>
		<td align="center" colspan="2"><input type="submit" class="btn btn-success" name="submitbutton"></td>
	</tr>
</table>

</form>

    </div>
  </section><!-- End Hero -->

</center>

<?php include 'footer.php' ?>