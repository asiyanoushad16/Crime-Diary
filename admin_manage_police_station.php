<?php include 'adminheader.php' ;

if (isset($_POST['submitbutton1'])) 
{
	extract($_POST);
	$f="select * from police_station where name='$stationname' and place='$stationplace' and landmark='$stationlandmark' and pincode='$stationpincode' and phone='$stationnumber' ";
	$res=select($f);
	if (sizeof($res)>0) 
	{
		alert('police station already exist');
	}
	else
	{
	$f="insert into police_station values(null,'$stationname','$stationplace','$stationlandmark','$stationpincode','$stationnumber')";
	insert($f);
	alert('police station successfully added');
	return redirect('admin_manage_police_station.php');
	}
}


if (isset($_GET['did'])) 
{
	extract($_GET);
	$p="delete from police_station where station_id='$did' ";
	delete($p);
	$o="delete from polices where station_id='$did'";
	delete($o);
	alert('station deleted successfully');
	return redirect('admin_manage_police_station.php');
}


if (isset($_GET['uid'])) 
{
	extract($_GET);
	$l="select * from police_station where station_id='$uid' ";
	$res=select($l);
}
if (isset($_POST['submitbutton2'])) 
{
	extract($_POST);
	$k="update police_station set name='$stationname',place='$stationplace',landmark='$stationlandmark',pincode='$stationpincode',phone='$stationnumber' where station_id='$uid' ";
	update($k);
	alert('police station update successfully');
	return redirect('admin_manage_police_station.php');
}


?>

<center>

<?php if (isset($_GET['uid'])) 
{ ?>
	
  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container" data-aos="zoom-out" data-aos-delay="100">
<form method="post">
<h1>Update Police <span>Station</span> </h1>
<table class="table" style="width: 500px;">
	<tr>
		<th>Station Name</th>
		<td><input type="text" value="<?php echo $res[0]['name'] ?>" required="" class="form-control" name="stationname"></td>
	</tr>
	<tr>
		<th>Place</th>
		<td><input type="text" value="<?php echo $res[0]['place'] ?>" required="" class="form-control" name="stationplace"></td>
	</tr>
	<tr>
		<th>Landmark</th>
		<td><input type="text" value="<?php echo $res[0]['landmark'] ?>" required="" class="form-control" name="stationlandmark"></td>
	</tr>
	<tr>
		<th>Pincode</th>
		<td><input type="text" value="<?php echo $res[0]['pincode'] ?>" required="" maxlength="6" pattern="[0-9]{6}" class="form-control" name="stationpincode"></td>
	</tr>
	<tr>
		<th>Phone</th>
		<td><input type="text" value="<?php echo $res[0]['phone'] ?>" required="" maxlength="10" pattern="[0-9]{10}" class="form-control" name="stationnumber"></td>
	</tr>
	<tr>
		<td align="center" colspan="2"><input type="submit" class="btn btn-success" name="submitbutton2"></td>
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
<form method="post">
<h1>Manage Police <span>Station</span> </h1>
<table class="table" style="width: 500px;">
	<tr>
		<th>Station Name</th>
		<td><input type="text" required="" class="form-control" name="stationname"></td>
	</tr>
	<tr>
		<th>Place</th>
		<td><input type="text" required="" class="form-control" name="stationplace"></td>
	</tr>
	<tr>
		<th>Landmark</th>
		<td><input type="text" required="" class="form-control" name="stationlandmark"></td>
	</tr>
	<tr>
		<th>Pincode</th>
		<td><input type="text" required="" maxlength="6" pattern="[0-9]{6}" class="form-control" name="stationpincode"></td>
	</tr>
	<tr>
		<th>Phone</th>
		<td><input type="text" required="" maxlength="10" pattern="[0-9]{10}" class="form-control" name="stationnumber"></td>
	</tr>
	<tr>
		<td align="center" colspan="2"><input type="submit" class="btn btn-success" name="submitbutton1"></td>
	</tr>
</table>
	
</form>


    </div>
  </section><!-- End Hero -->



<h1>View Tables</h1>

<form method="post">
	
<table class="table" >
	<tr>
		<th>Sl.No</th>
		<th>Station Name</th>
		<th>Place</th>
		<th>Landmark</th>
		<th>Pincode</th>
		<th>Phone</th>
	</tr>
	<?php  

		$g="select * from police_station";
		$go=select($g);
		$slno=1;
		foreach ($go as $key ) 
		{ ?>
	<tr>
		<td><?php echo $slno++ ?></td>
		<td><?php echo $key['name'] ?></td>
		<td><?php echo $key['place'] ?></td>
		<td><?php echo $key['landmark'] ?></td>
		<td><?php echo $key['pincode'] ?></td>
		<td><?php echo $key['phone'] ?></td>
		<td><a class="btn btn-success" href="?uid=<?php echo $key['station_id'] ?>">Update</a></td>
		<td><a class="btn btn-success" href="?did=<?php echo $key['station_id'] ?>">Delete</a></td>
		<td><a class="btn btn-success" href="admin_manage_police_officers.php?station_id=<?php echo $key['station_id'] ?>">Add Police Officers</a></td>
	</tr>
		<?php }

	?>  
</table>

</form>

<?php }     
?>    

</center>

<?php include 'footer.php' ?>