<?php include 'policeheader.php' ;

extract($_GET);
$police_id=$_SESSION['police_id'];

?>

<center>
	  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container" data-aos="zoom-out" data-aos-delay="100">
<form method="post">
	
<h1>View <span> Criminals</span></h1>

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
	</tr>
		<?php }

	?>    

</table>

</form>


    </div>
  </section><!-- End Hero -->

</center>

<?php include 'footer.php' ?>