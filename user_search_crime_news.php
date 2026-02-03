<?php include 'userheader.php' ;

extract($_GET);

?>

<center>

	<!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container" data-aos="zoom-out" data-aos-delay="100">
	
<form method="post">
	
<h1>View Crime News</h1>

<table class="table">
	<tr>
		<th>Sl.No</th>
		<th>Crime Name</th>
		<th>Title</th>
		<th>Description</th>
		<th>Image</th>
		<th>Date & Time</th>
	</tr>
	<?php  
		$h="SELECT *,`case_news`.`image`AS iimage FROM `case_news`INNER JOIN `crimes`USING(`crime_id`) where crime_id='$crime_id'";
		$req=select($h);
		$slno=1;



		if ($req[0]['status']=='public') 
		{ ?>
		
		<?php 
		foreach ($req as $key ) 
		{ ?>      
	<tr>
		<td><?php echo $slno++ ?></td>
		<td><?php echo $key['crime_title'] ?></td>
		<td><?php echo $key['title'] ?></td>
		<td><?php echo $key['descrition'] ?></td>
		<td><img src="<?php echo $key['iimage'] ?>" width="100"></td>
		<td><?php echo $key['date_time'] ?></td>
		
	</tr>
		<?php }
	?> 		

		<?php }
		else
		{
			alert('Private Details');
			return redirect('user_search_a_historic_crime.php');
		}
		 ?>
		
		




</table>

</form>
   </div>
  </section><!-- End Hero -->

</center>

<?php include 'footer.php' ?>   