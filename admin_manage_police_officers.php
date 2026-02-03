<?php include 'adminheader.php';

extract($_GET);

if (isset($_POST['submitbutton1'])) {
    extract($_POST);
    $g = "select * from login where username='$uname' ";
    $fog = select($g);
    if (sizeof($fog) > 0) {
        alert('username already exist');
    } else {
        $v = "insert into login values(null,'$uname','$pword','police')";
        $res = insert($v);
        $x = "insert into polices values(null,'$res','$station_id','$fname','$lname','$hname','$place','$dob','$gender','$phone','$email')";
        insert($x);
        alert('successfull');
        return redirect("admin_manage_police_officers.php?station_id=$station_id");
    }
}

if (isset($_GET['u_id'])) {
    extract($_GET);
    $i = "select * from polices where police_id='$u_id' ";
    $row = select($i);
}

if (isset($_POST['submitbutton2'])) {
    extract($_POST);
    $h = "update polices set fname='$fname1',lname='$lname1',house_name='$hname1',place='$place1',dob='$dob1',gender='$gender1',phone='$phone1',email='$email1' where police_id='$u_id' ";
    update($h);
    alert('update successfull');
    return redirect("admin_manage_police_officers.php?station_id=$station_id");
}

if (isset($_GET['d_id'])) {
    extract($_GET);
    $j = "delete from login where login_id='$login_id'";
    delete($j);
    $s = "delete from polices where police_id='$d_id'";
    delete($s);
    alert('deleted successfully');
    return redirect("admin_manage_police_officers.php?station_id=$station_id");
}
?>

<center>

<?php if (isset($_GET['u_id'])) { ?>

<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center">
  <div class="container" data-aos="zoom-out" data-aos-delay="100">	

<form method="post">

<h1>Update Police <span>Officers</span> </h1>
	
<table class="table" style="width: 500px;">
	<tr>
		<th>First Name</th>
		<td><input type="text" required class="form-control" value="<?php echo $row[0]['fname'] ?>" name="fname1"></td>
	</tr>
	<tr>
		<th>Last Name</th>
		<td><input type="text" required class="form-control" value="<?php echo $row[0]['lname'] ?>" name="lname1"></td>
	</tr>
	<tr>
		<th>House Name</th>
		<td><input type="text" required class="form-control" value="<?php echo $row[0]['house_name'] ?>" name="hname1"></td>
	</tr>
	<tr>
		<th>Place</th>
		<td><input type="text" required class="form-control" value="<?php echo $row[0]['place'] ?>" name="place1"></td>
	</tr>
	<tr>
		<th>Date Of Birth</th>
		<td><input type="date" required class="form-control" value="<?php echo $row[0]['dob'] ?>" name="dob1"></td>
	</tr>
	<tr>
		<th>Gender</th>
		<td>
			<input type="radio" name="gender1" value="male" <?php if ($row[0]['gender']=='male') echo "checked"; ?>> Male
			<input type="radio" name="gender1" value="female" <?php if ($row[0]['gender']=='female') echo "checked"; ?>> Female
		</td>
	</tr>
	<tr>
		<th>Phone</th>
		<td><input type="text" required class="form-control" value="<?php echo $row[0]['phone'] ?>" maxlength="10" pattern="[0-9]{10}" name="phone1"></td>
	</tr>
	<tr>
		<th>Email</th>
		<td><input type="email" required class="form-control" value="<?php echo $row[0]['email'] ?>" name="email1"></td>
	</tr>
	<tr>
		<td align="center" colspan="2"><input type="submit" class="btn btn-success" name="submitbutton2"></td>
	</tr>
</table>

</form>	

  </div>
</section><!-- End Hero -->	

<?php } else { ?>

<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center">
  <div class="container" data-aos="zoom-out" data-aos-delay="100">
    	
<form method="post">

<h1>Manage Police <span> Officers</span></h1>
	
<table class="table" style="width: 500px;">
	<tr>
		<th>First Name</th>
		<td><input type="text" required class="form-control" name="fname"></td>
	</tr>
	<tr>
		<th>Last Name</th>
		<td><input type="text" required class="form-control" name="lname"></td>
	</tr>
	<tr>
		<th>House Name</th>
		<td><input type="text" required class="form-control" name="hname"></td>
	</tr>
	<tr>
		<th>Place</th>
		<td><input type="text" required class="form-control" name="place"></td>
	</tr>
	<tr>
		<th>Date Of Birth</th>
		<td><input type="date" required class="form-control" name="dob"></td>
	</tr>
	<tr>
		<th>Gender</th>
		<td>
			<input type="radio" required name="gender" value="male"> Male
			<input type="radio" required name="gender" value="female"> Female
		</td>
	</tr>
	<tr>
		<th>Phone</th>
		<td><input type="text" required class="form-control" maxlength="10" pattern="[0-9]{10}" name="phone"></td>
	</tr>
	<tr>
		<th>Email</th>
		<td><input type="email" required class="form-control" name="email"></td>
	</tr>
	<tr>
		<th>Username</th>
		<td><input type="text" required class="form-control" name="uname"></td>
	</tr>
	<tr>
		<th>Password</th>
		<td><input type="password" required class="form-control" name="pword"></td>
	</tr>
	<tr>
		<td align="center" colspan="2"><input type="submit" class="btn btn-success" name="submitbutton1"></td>
	</tr>
</table>

</form>		

  </div>
</section><!-- End Hero -->
 
<form method="post">
<h1>View Police Officers</h1>

<table class="table">
	<tr>
		<th>Sl.No</th>
		<th>First Name</th>
		<th>Last Name</th>
		<th>House Name</th>
		<th>Place</th>
		<th>D.O.B</th>
		<th>Gender</th>
		<th>Phone</th>
		<th>Email</th>
		<th>Username</th>
		<th>Password</th>
		<th>Actions</th>
		<th>WhatsApp</th>
	</tr>
<?php  
    $j = "SELECT polices.*, police_station.*, login.username, login.password,
                 polices.place AS pplace, polices.phone AS pphone
          FROM polices 
          INNER JOIN police_station USING(station_id)
          INNER JOIN login ON login.login_id = polices.login_id
          WHERE station_id='$station_id'";
    $req = select($j);
    if (!is_array($req)) $req = [];

    $slno = 1;
    foreach ($req as $key) {
        $fname = $key['fname'];
        $lname = $key['lname'];
        $house = $key['house_name'];
        $pplace = $key['pplace'];
        $dob = $key['dob'];
        $gender = $key['gender'];
        $rawPhone = $key['pphone'];
        $email = $key['email'];
        $username = $key['username'];
        $password = $key['password'];

        // sanitize phone
        $digits = preg_replace('/\D+/', '', $rawPhone);
        $waLink = '';
        if ($digits != '') {
            if (strlen($digits) == 10) {
                $intlPhone = '91' . $digits; // India code
            } else {
                $intlPhone = $digits;
            }
            $message = "Hello {$fname}, this is a message from Admin. "
                     . "Your login credentials are:\nUsername: {$username}\nPassword: {$password}";
            $waLink = "https://wa.me/{$intlPhone}?text=" . urlencode($message);
        }
?>
	<tr>
		<td><?php echo $slno++; ?></td>
		<td><?php echo htmlspecialchars($fname); ?></td>
		<td><?php echo htmlspecialchars($lname); ?></td>
		<td><?php echo htmlspecialchars($house); ?></td>
		<td><?php echo htmlspecialchars($pplace); ?></td>
		<td><?php echo htmlspecialchars($dob); ?></td>
		<td><?php echo htmlspecialchars($gender); ?></td>
		<td><?php echo htmlspecialchars($rawPhone); ?></td>
		<td><?php echo htmlspecialchars($email); ?></td>
		<td><?php echo htmlspecialchars($username); ?></td>
		<td><?php echo htmlspecialchars($password); ?></td>
		<td>
			<a class="btn btn-success" href="?u_id=<?php echo $key['police_id']; ?>&station_id=<?php echo $key['station_id']; ?>">Update</a>
			<a class="btn btn-danger" href="?d_id=<?php echo $key['police_id']; ?>&station_id=<?php echo $key['station_id']; ?>&login_id=<?php echo $key['login_id']; ?>">Delete</a>
		</td>
		<td>
			<?php if ($waLink != '') { ?>
				<a class="btn btn-info" target="_blank" href="<?php echo $waLink; ?>">WhatsApp</a>
			<?php } else { ?>
				<span class="text-muted">No phone</span>
			<?php } ?>
		</td>
	</tr>
<?php } ?>
</table>
</form>
<?php } ?>

</center>

<?php include 'footer.php' ?>
