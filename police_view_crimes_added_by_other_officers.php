<?php include 'policeheader.php';

extract($_GET);
$police_id=$_SESSION['police_id'];

?>

<center>
  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container" data-aos="zoom-out" data-aos-delay="100">	
<form method="post">
	
<h1>View <span> Crimes</span></h1>

<table class="table">
	<tr>
		<th>Sl.No</th>
		<th>Crime Type</th>
		<th>Crime</th>
		<th>Description</th>
		<th>Crime Occurred</th>
		<th>Crime Reported</th>
		<th>Place</th>
		<th>District</th>
		<th>Image</th>
		<th></th>
		<th></th>
	</tr>
	<?php  

		$f="select * from `crime_types`inner join `crimes`using(`crime_type_id`) where police_id!='$police_id'";
		$row=select($f);
		$slno=1;
		foreach ($row as $key ) 
		{ ?>
	<tr>
		<td><?php echo $slno++ ?></td>
		<td><?php echo $key['crime_type_name'] ?></td>
		<td><?php echo $key['crime_title'] ?></td>
		<td><?php echo $key['crime_discription'] ?></td>
		<td><?php echo $key['date_time_occurred'] ?></td>
		<td><?php echo $key['date_time_reported'] ?></td>
		<td><?php echo $key['place'] ?></td>
		<td><?php echo $key['district'] ?></td>
		<td><img src="<?php echo $key['image'] ?> " width="200" height="150"></td>
		<td><a class="btn btn-success" href="police_viewother_criminals.php?crime_id=<?php echo $key['crime_id'] ?>">View Criminals</a></td>
		<td><a class="btn btn-success" href="police_viewother_case_diary.php?crime_id=<?php echo $key['crime_id'] ?>">View Crime Diary</a></td>
	</tr>	
		<?php }

	?>  
</table>

</form>
    </div>
  </section><!-- End Hero -->
</center>

<?php include 'footer.php' ?>