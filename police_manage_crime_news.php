<?php include 'policeheader.php' ;

extract($_GET);
$police_id=$_SESSION['police_id'];

if (isset($_POST['submitbutton'])) 
{
	extract($_POST);
	 	$dir = "uploads/";
		$file = basename($_FILES['image']['name']);
		$file_type = strtolower(pathinfo($file, PATHINFO_EXTENSION));
		$target1 = $dir.uniqid("images_").".".$file_type;
		if(move_uploaded_file($_FILES['image']['tmp_name'], $target1))
	  	{
			$x="insert into case_news values(null,'$crime_id','$police_id','$tilte','$description','$target1','$datetime','private')";
			insert($x);
			alert('successfull');
			return redirect("police_manage_crime_news.php?crime_id=$crime_id");
		}
	    else
	    {
	        echo "file uploading error occured";
	    }
}


if (isset($_GET['Did'])) 
{
	extract($_GET);
	$t="delete from case_news where news_id='$Did' ";
	delete($t);
	alert('deleted successfully');
	return redirect("police_manage_crime_news.php?crime_id=$crime_id");	
}


if (isset($_GET['Uid'])) 
{
	extract($_GET);
	$g="select * from case_news where news_id='$Uid' ";
	$col=select($g);
}
if (isset($_POST['submitbutton1'])) 
{
	extract($_POST);
	 	$dir = "uploads/";
		$file = basename($_FILES['image1']['name']);
		$file_type = strtolower(pathinfo($file, PATHINFO_EXTENSION));
		$target2 = $dir.uniqid("images_").".".$file_type;
		if(move_uploaded_file($_FILES['image1']['tmp_name'], $target2))
	  	{
			$h="update case_news set title='$tilte',descrition='$description',image='$target2',date_time='$datetime' where news_id='$Uid' ";
			update($h);
			alert('update successfully');
			return redirect("police_manage_crime_news.php?crime_id=$crime_id");	
		}
	    else
	    {
	        echo "file uploading error occured";
	    }
}

?>

<center>

<?php  

if (isset($_GET['Uid'])) 
{ ?>

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container" data-aos="zoom-out" data-aos-delay="100">

<form method="post" enctype="multipart/form-data">
	
<h1>Update <span>Crime News</span> </h1>

<table class="table" style="width: 500px;">
	<tr>
		<th>Title</th>
		<td><input type="text" required="" value="<?php echo $col[0]['title'] ?>" class="form-control" name="tilte"></td>
	</tr>
	<tr>
		<th>Description</th>
		<td><input type="text" required="" value="<?php echo $col[0]['descrition'] ?>" class="form-control" name="description"></td>
	</tr>
	<tr>
		<th>Image</th>
		<td><input type="file" required="" class="form-control" name="image1"></td>
	</tr>
	<tr>
		<th>Date & Time</th>
		<td><input type="datetime-local" required="" value="<?php echo $col[0]['date_time'] ?>" class="form-control" name="datetime"></td>
	</tr>
	<tr>
		<td align="center" colspan="2"><input type="submit" class="btn btn-success" name="submitbutton1"></td>
	</tr>
</table>

</form>

    </div>
  </section><!-- End Hero -->	

<?php }
else
{ ?>

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container" data-aos="zoom-out" data-aos-delay="100">	

<form method="post" enctype="multipart/form-data">
	
<h1>Manage <span> Crime News</span></h1>

<table class="table" style="width: 500px;">
	<tr>
		<th>Title</th>
		<td><input type="text" required="" class="form-control" name="tilte"></td>
	</tr>
	<tr>
		<th>Description</th>
		<td><input type="text" required="" class="form-control" name="description"></td>
	</tr>
	<tr>
		<th>Image</th>
		<td><input type="file" required="" class="form-control" name="image"></td>
	</tr>
	<tr>
		<th>Date & Time</th>
		<td><input type="datetime-local" required="" class="form-control" name="datetime"></td>
	</tr>
	<tr>
		<td align="center" colspan="2"><input type="submit" class="btn btn-success" name="submitbutton"></td>
	</tr>
</table>

</form>

    </div>
  </section><!-- End Hero -->

<form method="post">
	
<h1>View Crime News</h1>

<table class="table" >
	<tr>
		<th>Sl.No</th>
		<th>Crime Name</th>
		<th>Title</th>
		<th>Description</th>
		<th>Image</th>
		<th>Date & Time</th>
		<th>Status</th>
	</tr>
	<?php  

		$h="SELECT *,`case_news`.`image`AS iimage FROM `case_news`INNER JOIN `crimes`USING(`crime_id`) where `crimes`.police_id='$police_id' and crime_id='$crime_id'  ";
		$req=select($h);
		$slno=1;
		foreach ($req as $key ) 
		{ ?>
	<tr>
		<td><?php echo $slno++ ?></td>
		<td><?php echo $key['crime_title'] ?></td>
		<td><?php echo $key['title'] ?></td>
		<td><?php echo $key['descrition'] ?></td>
		<td><img src="<?php echo $key['iimage'] ?>" width="100"></td>
		<td><?php echo $key['date_time'] ?></td>
		<td><?php echo $key['status'] ?></td>
		<td><a class="btn btn-success" href="?Did=<?php echo $key['news_id'] ?>&crime_id=<?php echo $key['crime_id'] ?>">Delete</a></td>
		<td><a class="btn btn-success" href="?Uid=<?php echo $key['news_id'] ?>&crime_id=<?php echo $key['crime_id'] ?>">Update</a></td>
	</tr>
		<?php }
	?>      
</table>

</form>

<?php }

?>    

</center>

<?php include 'footer.php' ?>