<?php include 'adminheader.php' ;

extract($_GET);


?>

<center>
 <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container" data-aos="zoom-out" data-aos-delay="100">	
<form method="post">
	
<h1>View <span>Case Diary</span> </h1>

<table class="table" >
	<tr>
		<th>Sl.No</th>
		<th>Cime Title</th>
		<th>Police Officer</th>
		<th>Description</th>
		<th>Date & Time</th>
		<th>Open File</th>
	</tr>
	<?php  

			$h="SELECT * FROM `case_diary`INNER JOIN `crimes`USING(`crime_id`)INNER JOIN `polices`ON `case_diary`.`police_id`=`polices`.`police_id` where crime_id='$crime_id'";
			$res=select($h);
			$slno=1;
			foreach ($res as $key ) 
			{  ?>
	<tr>
		<td><?php echo $slno++ ?></td>
		<td><?php echo $key['crime_title'] ?></td>
		<td><?php echo $key['fname'] ?></td>
		<td><?php echo $key['description'] ?></td>
		<td><?php echo $key['date_time'] ?></td>
		<td><a class="btn btn-success" href="<?php echo $key['file_path'] ?>">Download</a></td>
	</tr>	
			<?php }
	?>          
</table>

</form>

    </div>
  </section><!-- End Hero -->

</center>

<?php include 'footer.php' ?>