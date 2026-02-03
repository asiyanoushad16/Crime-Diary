<?php include 'adminheader.php' ;

extract($_GET);

if (isset($_POST['submitbutton'])) 
	{
		extract($_POST);
		$d="update feedback set reply='$reply' where feed_id='$feeed_id' ";
		update($d);
		alert('reply send successfully');
		return redirect('admin_view_feedback_and_send_reply.php');
	}	

?>

<center>

<?php if (isset($_GET['feeed_id'])) 
{ ?>
  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container" data-aos="zoom-out" data-aos-delay="100">
<form method="post">

<h1>Send <span>Reply</span> </h1>

<table class="table" style="width: 500px;">
	<tr>
		<th>Reply</th>
		<td><input type="text" required="" class="form-control" name="reply"></td>
	</tr>
	<tr>
		<td align="center" colspan="2"><input type="submit" class="btn btn-success" name="submitbutton"></td>
	</tr>
</table>
	
</form>

  </div>
  </section><!-- End Hero -->
	
<?php 
}
else
{ ?>
  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container" data-aos="zoom-out" data-aos-delay="100">
<form method="post">
	
<h1>Viwe <span>Feedback</span> </h1>

<table class="table" >
	<tr>
		<th>Sl.No</th>
		<th>User Name</th>
		<th>Feedback</th>
		<th>Date & Time</th>
		<th>Reply</th>
	</tr>
	<?php  

		$g="SELECT * FROM `feedback` INNER JOIN `users`USING(`user_id`)";
		$req=select($g);
		$slno=1;
		foreach ($req as $key ) 
		{ ?>
	<tr>
		<td><?php echo $slno++ ?></td>
		<td><?php echo $key['fname'] ?></td>
		<td><?php echo $key['feed_description'] ?></td>
		<td><?php echo $key['date_time'] ?></td>
		<?php  

			if ($key['reply']=='pending') 
			{ ?>
		<td><a href="?feeed_id=<?php echo $key['feed_id'] ?>">Send Reply</a></td>
			<?php 
			}
			else
			{ ?>
		<td><?php echo $key['reply'] ?></td>
			<?php }     

		?>    
	</tr>	
		<?php }
	?>
</table>    

</form>

  </div>
  </section><!-- End Hero -->

<?php }

?>     
	
</center>

<?php include 'footer.php' ?>