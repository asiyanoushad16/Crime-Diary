<?php include 'adminheader.php' ?>

<center>

	 <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container" data-aos="zoom-out" data-aos-delay="100">
	
<form method="post">
	
<h1>View <span>Crimes</span> </h1>

<table class="table" >
	<tr>
		<th>Sl.No</th>
		<th>Police Name</th>
		<th>Crime Type</th>
		<th>Crime Title</th>
		<th>Description</th>
		<th>Date & Time Occurred</th>
		<th>Date & Time Reported</th>
		<th>Status</th>
		<th>Place</th>
		<th>District</th>
		<th>Image</th>
		<th></th>
		<th></th>
		<th></th>
	</tr>
	<?php  

		$g="SELECT *,`crimes`.`place`AS pplace FROM `crime_types`INNER JOIN`crimes`USING(`crime_type_id`)INNER JOIN`polices`USING(`police_id`)";
		$req=select($g);
		$slno=1;
		foreach ($req as $key ) 
		{ ?>
	<tr>
		<td><?php echo $slno++ ?></td>
		<td><?php echo $key['fname'] ?></td>
		<td><?php echo $key['crime_type_name'] ?></td>
		<td><?php echo $key['crime_title'] ?></td>
		<td><?php echo $key['crime_discription'] ?></td>
		<td><?php echo $key['date_time_occurred'] ?></td>
		<td><?php echo $key['date_time_reported'] ?></td>
		<td><?php echo $key['crime_status'] ?></td>
		<td><?php echo $key['pplace'] ?></td>
		<td><?php echo $key['district'] ?></td>
		<td><img src="<?php echo $key['image'] ?>" width="100"></td>
		<td><a class="btn btn-success" href="admin_view_criminals.php?crime_id=<?php echo $key['crime_id'] ?>">View Criminals</a></td>
		<td><a class="btn btn-success" href="admin_view_case_diary.php?crime_id=<?php echo $key['crime_id'] ?>">View Case Diary</a></td>
		<!-- <td><a class="btn btn-success" href="admin_view_crime_news.php?crime_id=<?php echo $key['crime_id'] ?>">View Crime News</a></td> -->
	</tr>
		<?php }
	?>    
</table>

</form>


    </div>
  </section><!-- End Hero -->

</center>

<?php include 'footer.php' ?>