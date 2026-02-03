<?php include 'policeheader.php' ;

extract($_GET);
$police_id=$_SESSION['police_id'];

?>

<center>

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container" data-aos="zoom-out" data-aos-delay="100">
	
<form method="post">
	
<h1>View <span> Case Diary</span></h1>

<table class="table">
	<tr>
		<th>Sl.No</th>
		<th>Crime</th>
		<th>Description</th>
		<th>Date & Time</th>
		<th>File</th>
	</tr>
	<?php  

		$b="SELECT *,`case_diary`.`date_time`AS ddate_time FROM `crimes`INNER JOIN `case_diary`USING(`crime_id`) where crime_id='$crime_id' and `case_diary`.police_id!='$police_id' ";
		$rew=select($b);
		$slno=1;
		foreach ($rew as $key ) 
		{  ?>
	<tr>
		<td><?php echo $slno++ ?></td>
		<td><?php echo $key['crime_title'] ?></td>
		<td><?php echo $key['description'] ?></td>
		<td><?php echo $key['ddate_time'] ?></td>
		<td><a class="btn btn-success" href="<?php echo $key['file_path'] ?>">Open File</a></td>
	</tr>	
		<?php }
	?>     
</table>

</form>


    </div>
  </section><!-- End Hero -->

</center>

<?php include 'footer.php' ?>