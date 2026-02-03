<?php include 'adminheader.php' ?>

<center>
  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container" data-aos="zoom-out" data-aos-delay="100">	
<form method="post">
	
<h1>View <span>Users</span> </h1>

<table class="table" >
	<tr>
		<th>Sl.No</th>
		<th>First Name</th>
		<th>Last Name</th>
		<th>House Name</th>
		<th>Place</th>
		<th>Pincode</th>
		<th>Phone</th>
		<th>Email</th>
		<th>Aadhar No</th>
	</tr>
	<?php  

		$l="select * from users";
		$res=select($l);
		$slno=1;
		foreach ($res as $key ) 
		{ ?>
	<tr>
		<td><?php echo $slno++ ?></td>
		<td><?php echo $key['fname'] ?></td>
		<td><?php echo $key['lname'] ?></td>
		<td><?php echo $key['house_name'] ?></td>
		<td><?php echo $key['place'] ?></td>
		<td><?php echo $key['pincode'] ?></td>
		<td><?php echo $key['phone'] ?></td>
		<td><?php echo $key['email'] ?></td>
		<td><?php echo $key['aadhar_no'] ?></td>
	</tr>	
		<?php }
	?>     
</table>

</form>


    </div>
  </section><!-- End Hero -->

</center>

<?php include 'footer.php' ?>