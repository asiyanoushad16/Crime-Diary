<?php include 'adminheader.php' ;

if (isset($_POST['submitbutton'])) 
{
	extract($_POST);
	$h="select * from emergency_number where emergency_num='$emergencynumber' ";
	$bo=select($h);
	if (sizeof($bo)>0) 
	{
		alert('number already exist');
	}
	else
	{
	$g="insert into emergency_number values(null,'$emergencynumber')";
	insert($g);
	alert('successfully added');
	return redirect('admin_add_emergency_number.php');		
	}

}


if (isset($_GET['Did'])) 
{
	extract($_GET);
	$k="delete from emergency_number where emergency_id='$Did'";
	delete($k);
	alert('deleted successfully');
	return redirect('admin_add_emergency_number.php');
}


?>

<center>

	  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container" data-aos="zoom-out" data-aos-delay="100">
	
<form method="post" style="width: 500px;">

<h1>Add Emergency <span>Number</span> </h1>
	
<table class="table">
	<tr>
		<th>Number</th>
		<td><input type="text" required="" class="form-control" maxlength="10" pattern="[0-9]{10}" name="emergencynumber"></td>
	</tr>
	<tr>
		<td align="center" colspan="2"><input type="submit" class="btn btn-success" name="submitbutton"></td>
	</tr>
</table>

</form>
    </div>
  </section><!-- End Hero -->

<form method="post">

<h1>View Emergency Number</h1>

<table class="table" style="width: 500px;">
	<tr>
		<th>Sl.No</th>
		<th>Number</th>
	</tr>
	<?php  

		$m="select * from emergency_number";
		$res=select($m);
		$slno=1;
		foreach ($res as $key ) 
		{ ?>
	<tr>
		<td><?php echo $slno++ ?></td>
		<td><?php echo $key['emergency_num'] ?></td>
		<td><a class="btn btn-success" href="?Did=<?php echo $key['emergency_id'] ?>">Delete</a></td>
	</tr>
		<?php }
	?>       
</table>
	
</form>

</center>

<?php include 'footer.php' ?>