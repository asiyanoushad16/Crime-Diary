<?php include 'policeheader.php' ;

extract($_GET);
$police_id=$_SESSION['police_id'];


if (isset($_POST['submitbutton'])) 
{
	extract($_POST);
		$dir = "uploads/";
		$file = basename($_FILES['image']['name']);
		$file_type = strtolower(pathinfo($file, PATHINFO_EXTENSION));
		$target1 = $dir.uniqid("images_").".".$file_type;
		if(move_uploaded_file($_FILES['image']['tmp_name'], $target1))
	  	{
			$k="insert into criminals values(null,'$crime_id','$fname','$lname','$hname','$place','$district','$gender','$dob','$target1','$idendificationmark1','$idendificationmark2')";
			insert($k);
			alert('added successfully');
			return redirect("police_manage_criminals.php?crime_id=$crime_id");
		}
	    else
	    {
	        echo "file uploading error occured";
	    }
}


if (isset($_GET['uid'])) 
{
	extract($_GET);
	$d="select * from criminals where criminal_id='$uid' and crime_id='$crime_id'";
	$row=select($d);
}
if (isset($_POST['submitbutton1'])) 
{
	extract($_POST);
		$dir = "uploads/";
		$file = basename($_FILES['image1']['name']);
		$file_type = strtolower(pathinfo($file, PATHINFO_EXTENSION));
		$target2 = $dir.uniqid("images_").".".$file_type;
		if(move_uploaded_file($_FILES['image1']['tmp_name'], $target2))
	  	{
	  		$d="update criminals set fname='$fname',lname='$lname',house_name='$hname',place='$place',district='$district',gender='$gender',dob='$dob',photo='$target2',identification_mark1='$idendificationmark1',identification_mark2='$idendificationmark2' where  criminal_id='$uid' and crime_id='$crime_id'  ";
	  		update($d);
	  		alert('successfully updated');
	  		return redirect("police_manage_criminals.php?crime_id=$crime_id");
	  	}
	    else
	    {
	        echo "file uploading error occured";
	    }
}


if (isset($_GET['did'])) 
{
	extract($_GET);
	$n="delete from criminals where criminal_id='$did' ";
	delete($n);
	alert('deleted successfully');
	return redirect("police_manage_criminals.php?crime_id=$crime_id");
}

?>

<center>

<?php 

if (isset($_GET['uid'])) 
{ ?>

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container" data-aos="zoom-out" data-aos-delay="100">

<form method="post" enctype="multipart/form-data">

<h1>Update <span>Criminals</span> </h1>

<table class="table" style="width: 500px;">
	<tr>
		<th>First Name</th>
		<td><input type="text" required="" value="<?php echo $row[0]['fname'] ?>" class="form-control" name="fname"></td>
	</tr>
	<tr>
		<th>Last Name</th>
		<td><input type="text" required="" value="<?php echo $row[0]['lname'] ?>" class="form-control" name="lname"></td>
	</tr>
	<tr>
		<th>House Name</th>
		<td><input type="text" required="" value="<?php echo $row[0]['house_name'] ?>" class="form-control" name="hname"></td>
	</tr>
	<tr>
		<th>Place</th>
		<td><input type="text" required="" value="<?php echo $row[0]['place'] ?>" class="form-control" name="place"></td>
	</tr>
	<tr>
		<th>District</th>
		<td><input type="text" required="" value="<?php echo $row[0]['district'] ?>" class="form-control" name="district"></td>
	</tr>
	<tr>
		<th>Gender</th>
		<td>
			<input type="radio" required="" name="gender" value="male">male
			<input type="radio" required="" name="gender" value="female">female
		</td>
	</tr>
	<tr>
		<th>Date Of Birth</th>
		<td><input type="date" required="" value="<?php echo $row[0]['dob'] ?>" class="form-control" name="dob"></td>
	</tr>
	<tr>
		<th>Image</th>
		<td><input type="file" required="" class="form-control" name="image1"></td>
	</tr>
	<tr>
		<th>Idendification Mark 1</th>
		<td><input type="text" required="" value="<?php echo $row[0]['identification_mark1'] ?>" class="form-control" name="idendificationmark1"></td>
	</tr>
	<tr>
		<th>Idendification Mark 2</th>
		<td><input type="text" required="" value="<?php echo $row[0]['identification_mark2'] ?>" class="form-control" name="idendificationmark2"></td>
	</tr>
	<tr>
		<td align="center" colspan="2"><input type="submit" class="btn btn-success" name="submitbutton1"></td>
	</tr>
</table>
	
</form>	

    </div>
  </section><!-- End Hero -->
<?php }
else
{ ?>
  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container" data-aos="zoom-out" data-aos-delay="100">
<form method="post" enctype="multipart/form-data">

<h1>Manage <span>Criminals</span> </h1>

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
		<th>District</th>
		<td><input type="text" required="" class="form-control" name="district"></td>
	</tr>
	<tr>
		<th>Gender</th>
		<td>
			<input type="radio" required=""  name="gender" value="male">male
			<input type="radio" required=""  name="gender" value="female">female
		</td>
	</tr>
	<tr>
		<th>Date Of Birth</th>
		<td><input type="date" required="" class="form-control" name="dob"></td>
	</tr>
	<tr>
		<th>Image</th>
		<td><input type="file" required="" class="form-control" name="image"></td>
	</tr>
	<tr>
		<th>Idendification Mark 1</th>
		<td><input type="text" required="" class="form-control" name="idendificationmark1"></td>
	</tr>
	<tr>
		<th>Idendification Mark 2</th>
		<td><input type="text" required="" class="form-control" name="idendificationmark2"></td>
	</tr>
	<tr>
		<td align="center" colspan="2"><input type="submit" class="btn btn-success" name="submitbutton"></td>
	</tr>
</table>
	
</form>
    </div>
  </section><!-- End Hero -->

<form method="post">
	
<h1>View Criminals</h1>

<table class="table">
	<tr>
		<th>Sl.No</th>
		<th>Cirme</th>
		<th>First Name</th>
		<th>Last Name</th>
		<th>House Name</th>
		<th>Place</th>
		<th>District</th>
		<th>Gender</th>
		<th>Dob</th>
		<th>Image</th>
		<th>Identification Mark 1</th>
		<th>Identification Mark 2</th>
	</tr>
	<?php  

		$h="SELECT *,`criminals`.`place`AS pplace,`criminals`.`district`AS ddistrict FROM `criminals`INNER JOIN `crimes` USING(`crime_id`) WHERE crime_id='$crime_id' ";
		$row=select($h);
		$slno=1;
		foreach ($row as $key ) 
		{ ?>
	<tr>
		<td><?php echo $slno++ ?></td>
		<td><?php echo $key['crime_title'] ?></td>
		<td><?php echo $key['fname'] ?></td>
		<td><?php echo $key['lname'] ?></td>
		<td><?php echo $key['house_name'] ?></td>
		<td><?php echo $key['pplace'] ?></td>
		<td><?php echo $key['ddistrict'] ?></td>
		<td><?php echo $key['gender'] ?></td>
		<td><?php echo $key['dob'] ?></td>
		<td><img src="<?php echo $key['photo'] ?>" width="100"></td>
		<td><?php echo $key['identification_mark1'] ?></td>
		<td><?php echo $key['identification_mark2'] ?></td>
		<td><a class="btn btn-success" href="?uid=<?php echo $key['criminal_id'] ?>&crime_id=<?php echo $key['crime_id'] ?>">Update</a></td>
		<td><a class="btn btn-success" href="?did=<?php echo $key['criminal_id'] ?>&crime_id=<?php echo $key['crime_id'] ?>">Delete</a></td>
	</tr>
		<?php }

	?>    

</table>

</form>
<?php }

?>    
	
</center>

<?php include 'footer.php' ?>