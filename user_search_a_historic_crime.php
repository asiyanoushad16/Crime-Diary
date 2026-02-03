
<?php include 'userheader.php' ?>

<center>
<!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container" data-aos="zoom-out" data-aos-delay="100">	
<form method="post">
	
<h1>Serch <span>Crime</span> </h1>

<table class="table" style="width: 500px;">
	<tr>
		<td><input type="text" required="" class="form-control" name="searchcrime"></td>
	</tr>
	<tr>
		<td align="center" colspan="2"><input type="submit" class="btn btn-success" name="submitbutton"></td>
	</tr>
</table>

</form>
   </div>
  </section><!-- End Hero -->


<form method="post">
	
<table class="table">
		<tr>
		<th>Sl.No</th>
		<th>Police Off</th>
		<th>Crime Type</th>
		<th>Crime</th>
		<th>Description</th>
		<th>Crime Occurred</th>
		<th>Crime Reported</th>
		<th>Place</th>
		<th>District</th>
		<th>Image</th>
	</tr>
	<?php  

		if (isset($_POST['submitbutton'])) 
		{
			extract($_POST);
			$f="SELECT * FROM `crime_types`INNER JOIN `crimes`USING(`crime_type_id`)INNER JOIN `polices`USING(`police_id`) where crime_title like'%$searchcrime%'";
		}
		else
		{
		$f="SELECT * FROM `crime_types`INNER JOIN `crimes`USING(`crime_type_id`)INNER JOIN `polices`USING(`police_id`)";
		}

		$row=select($f);

		if (sizeof($row)>0)
		{

		$slno=1;
		foreach ($row as $key ) 
		{ ?>
			
				
	<tr>
		<td><?php echo $slno++ ?></td>
		<td><?php echo $key['fname'] ?></td>
		<td><?php echo $key['crime_type_name'] ?></td>
		<td><?php echo $key['crime_title'] ?></td>
		<td><?php echo $key['crime_discription'] ?></td>
		<td><?php echo $key['date_time_occurred'] ?></td>
		<td><?php echo $key['date_time_reported'] ?></td>
		<td><?php echo $key['place'] ?></td>
		<td><?php echo $key['district'] ?></td>
		<td><img src="<?php echo $key['image'] ?> " width="200" height="150"></td>
		<td><a class="btn btn-success" href="user_view_criminals.php?crime_id=<?php echo $key['crime_id'] ?>">View Criminals</a></td>
	</tr>	

				<?php } } else {

					alert("no data");
					return redirect('user_search_a_historic_crime.php');
				}
			
				 ?>

</table>

</form>



</center>

<?php include 'footer.php' ?>