<?php include 'userheader.php' ;

extract($_GET);
$user_id=$_SESSION['user_id'];

if (isset($_POST['submitbutton'])) 
{
	extract($_POST);
	$g="insert into foundreport values(null,'$criminal_id','$user_id','$place','$datetime','$description')";
	insert($g);
	alert('successfull');
	return redirect("user_report_criminal_activity.php?criminal_id=$criminal_id");
}

?>

<center>
	 <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container" data-aos="zoom-out" data-aos-delay="100">
<form method="post">
	
<h1>Report <span>Criminal Activity</span> </h1>

<table class="table" style="width: 500px;">
	<tr>
		<th>Place</th>
		<td><input type="text" required="" class="form-control" name="place"></td>
	</tr>
	<tr>
		<th>Date & Time</th>
		<td><input type="datetime-local" required="" class="form-control" name="datetime"></td>
	</tr>
	<tr>
		<th>Description</th>
		<td><input type="text" required="" class="form-control" name="description"></td>
	</tr>
	<tr>
		<td align="center" colspan="2"><input type="submit" class="btn btn-success" name="submitbutton"></td>
	</tr>
</table>

</form>
   </div>
  </section><!-- End Hero -->
</center>

<?php include 'footer.php' ?>