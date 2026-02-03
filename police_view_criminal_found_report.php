<?php include 'policeheader.php' ?>

<center>
	
  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container" data-aos="zoom-out" data-aos-delay="100">
      
<form method="post">
	
<h1>View Criminal <span> Found Report</span></h1>

<table class="table">
	<tr>
		<th>Sl.No</th>
		<th>Criminal Name</th>
		<th>User Name</th>
		<th>Place</th>
		<th>Date & Time</th>
		<th>Description</th>
	</tr>
	<?php  

		$h="SELECT *,`criminals`.`fname`AS ffname,`users`.`fname`AS fffname FROM `foundreport`INNER JOIN`criminals`USING(`criminal_id`) INNER JOIN `users`USING(`user_id`)";
		$rew=select($h);
		$slno=1;
		foreach ($rew as $key ) 
		{ ?>
	<tr>
		<td><?php echo $slno++ ?></td>
		<td><?php echo $key['ffname'] ?></td>
		<td><?php echo $key['fffname'] ?></td>
		<td><?php echo $key['place'] ?></td>
		<td><?php echo $key['date_time'] ?></td>
		<td><?php echo $key['description'] ?></td>
	</tr>	
		<?php }
	?>       
</table>

</form>

    </div>
  </section><!-- End Hero -->

</center>

<?php include 'footer.php' ?>