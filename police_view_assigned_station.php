<?php include 'policeheader.php' ;

extract($_GET);
$police_id=$_SESSION['police_id'];

?>

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container" data-aos="zoom-out" data-aos-delay="100">
      <h1>View Assigned<span>Police Station</span></h1>
<center>




	
<form method="post">
	


<table class="table">
	<tr>
		<th>Sl.No</th>
		<th>Name</th>
		<th>Place</th>
		<th>Landmark</th>
		<th>Pincode</th>
		<th>Phone</th>
	</tr>
	<?php  

		$g="SELECT *,`police_station`.`place`AS pplace,`police_station`.`phone`AS pphone FROM police_station INNER JOIN `polices`USING(`station_id`)  where police_id='$police_id'";
		$tr=select($g);
		$slno=1;
		foreach ($tr as $key ) 
		{ ?>
	<tr>
		<td><?php echo $slno++ ?></td>
		<td><?php echo $key['name'] ?></td>
		<td><?php echo $key['pplace'] ?></td>
		<td><?php echo $key['landmark'] ?></td>
		<td><?php echo $key['pincode'] ?></td>
		<td><?php echo $key['pphone'] ?></td>
	</tr>	
		<?php }
	?>      
</table>

</form>




  </center>

      </div>
  </section><!-- End Hero -->

<?php include 'footer.php' ?>