<?php include 'adminheader.php' ;


if (isset($_POST['submitbutton'])) 
{
	extract($_POST);
	$h="insert into crime_types values(null,'$crimetype','$crimedescription')";
	insert($h);
	alert('successfully added');
	return redirect('admin_manage_crime_types.php');
}


if (isset($_GET['Uid'])) 
{
	extract($_GET);
	$r="select * from crime_types where crime_type_id='$Uid' ";
	$res=select($r);
}
if (isset($_POST['submitbutton1'])) 
{
	extract($_POST);
	$g="update crime_types set crime_type_name='$crimetype1',description='$crimedescription1' where crime_type_id='$Uid' ";
	update($g);
	alert('successfully updated');
	return redirect('admin_manage_crime_types.php');
}


if (isset($_GET['Did'])) 
{
	extract($_GET);
	$k="delete from crime_types where crime_type_id='$Did' ";
	delete($k);
	alert('successfully deleted');
	return redirect('admin_manage_crime_types.php');
}

?>

<center>

<?php 
if (isset($_GET['Uid'])) 
{ 
?>
  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container" data-aos="zoom-out" data-aos-delay="100">
<form method="post">
	
<h1>Update <span>Crime Types</span> </h1>

<table class="table" style="width: 500px;">
	<tr>
		<th>Crime Type</th>
		<td><input type="text" required="" class="form-control" value="<?php echo $res[0]['crime_type_name'] ?>" name="crimetype1"></td>
	</tr>
	<tr>
		<th>Description</th>
		<td><input type="text" required="" class="form-control" value="<?php echo $res[0]['description'] ?>" name="crimedescription1"></td>
	</tr>
	<tr>
		<td align="center" colspan="2"><input type="submit" class="btn btn-success" name="submitbutton1"></td>
	</tr>
</table>

</form>
    </div>
  </section><!-- End Hero -->
	
<?php 
}
else
{ ?>
  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container" data-aos="zoom-out" data-aos-delay="100">
<form method="post">
	
<h1>Manage <span> Crime Types</span></h1>

<table class="table" style="width: 500px;">
	<tr>
		<th>Crime Type</th>
		<td><input type="text" required="" class="form-control" name="crimetype"></td>
	</tr>
	<tr>
		<th>Description</th>
		<td><input type="text" required="" class="form-control" name="crimedescription"></td>
	</tr>
	<tr>
		<td align="center" colspan="2"><input type="submit" class="btn btn-success" name="submitbutton"></td>
	</tr>
</table>

</form>
    </div>
  </section><!-- End Hero -->

<form method="post">
	
<h1>View Crime Types</h1>

<table class="table" >
	<tr>
		<th>Sl.No</th>
		<th>Crime Type</th>
		<th>Description</th>
	</tr>
	<?php  

		$g="select * from crime_types";
		$res=select($g);
		$slno=1;
		foreach ($res as $key ) 
		{ ?>
	<tr>
		<td><?php echo $slno++ ?></td>
		<td><?php echo $key['crime_type_name'] ?></td>
		<td><?php echo $key['description'] ?></td>
		<td><a class="btn btn-success" href="?Uid=<?php echo $key['crime_type_id'] ?>">Update</a></td>
		<td><a class="btn btn-success" href="?Did=<?php echo $key['crime_type_id'] ?>">Delete</a></td>
	</tr>	
		<?php }

	?>      
</table>

</form>

<?php }
?>	

</center>

<?php include 'footer.php' ?>