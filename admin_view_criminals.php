<?php include 'adminheader.php' ;

extract($_GET);



?>

<center>

	 <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container" data-aos="zoom-out" data-aos-delay="100">
	
<form method="post">
	
<h1>View <span> Criminals</span></h1>

<table class="table" >
	<tr>
		<th>Sl.No</th>
		<th>Crime Name</th>
		<th>First Name</th>
		<th>Last Name</th>
		<th>House Name</th>
		<th>Place</th>
		<th>District</th>
		<th>Gender</th>
		<th>D.O.B</th>
		<th>Image</th>
		<th>Identification Mark1</th>
		<th>Identification Mark2</th>
	</tr>
	<?php  

			$f="SELECT *,`criminals`.`place`AS pplace,`criminals`.`district`AS ddistrict FROM `criminals`INNER JOIN`crimes`USING(`crime_id`) where crime_id='$crime_id' ";
			$req=select($f);
			$slno=1;
			foreach ($req as $key ) 
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
		<td><img src="<?php echo $key['photo'] ?>" width="200"></td>
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