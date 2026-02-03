<?php include 'policeheader.php' ;

extract($_GET);
$police_id=$_SESSION['police_id'];


if (isset($_POST['submitbutton'])) 
{
	extract($_POST);
	 	$dir = "uploads/";
		$file = basename($_FILES['filepath']['name']);
		$file_type = strtolower(pathinfo($file, PATHINFO_EXTENSION));
		$target1 = $dir.uniqid("images_").".".$file_type;
		if(move_uploaded_file($_FILES['filepath']['tmp_name'], $target1))
	  	{
			echo$k="insert into case_diary values(null,'$crime_id','$police_id','$target1','$description','$datetime')";
			insert($k);
			alert('successfull');
			return redirect("police_manage_case_diary.php?crime_id=$crime_id");
		}
	    else
	    {
	        echo "file uploading error occured";
	    }			
}


if (isset($_GET['did'])) 
{
	extract($_GET);
	$j="delete from case_diary where diary_id='$did' and crime_id='$crime_id' ";
	delete($j);
	alert('deleted successfully');
	return redirect("police_manage_case_diary.php?crime_id=$crime_id");
}


if (isset($_GET['uid'])) 
{
	extract($_GET);
	$o="select * from case_diary where diary_id='$uid' and crime_id='$crime_id' ";
	$req=select($o);
}
if (isset($_POST['submitbutton1'])) 
{
	extract($_POST);
	extract($_POST);
	 	$dir = "uploads/";
		$file = basename($_FILES['filepath']['name']);
		$file_type = strtolower(pathinfo($file, PATHINFO_EXTENSION));
		$target2 = $dir.uniqid("images_").".".$file_type;
		if(move_uploaded_file($_FILES['filepath']['tmp_name'], $target2))
	  	{
			$k="update case_diary set description='$description',date_time='$datetime',file_path='$target2' where diary_id='$uid' and crime_id='$crime_id' ";
			update($k);
			alert('updated successfully');
			return redirect("police_manage_case_diary.php?crime_id=$crime_id");
		}
	    else
	    {
	        echo "file uploading error occured";
	    }	
}

?>

<center>

<?php 

if (isset($_GET['uid'])) 
{ ?>

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container" data-aos="zoom-out" data-aos-delay="100">
	
<form method="post" enctype="multipart/form-data">
	
<h1>Update <span>Case Diary</span> </h1>

<table class="table" style="width: 500px;">
	<tr>
		<th>File</th>
		<td><input type="file" required="" class="form-control" name="filepath"></td>
	</tr>
	<tr>
		<th>Description</th>
		<td><input type="text" required="" value="<?php echo $req[0]['description'] ?>" class="form-control" name="description"></td>
	</tr>
	<tr>
		<th>Date & Time</th>
		<td><input type="datetime-local" required="" value="<?php echo $req[0]['date_time'] ?>" class="form-control" name="datetime"></td>
	</tr>
	<tr>
		<td align="center" colspan="2"><input type="submit" class="btn btn-success" name="submitbutton1"></td>
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
	
<form method="post" enctype="multipart/form-data">
	
<h1>Manage <span>Case Diary</span> </h1>

<table class="table" style="width: 500px;">
	<tr>
		<th>File</th>
		<td><input type="file" required="" class="form-control" name="filepath"></td>
	</tr>
	<tr>
		<th>Description</th>
		<td><input type="text" required="" class="form-control" name="description"></td>
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
	
<h1>View Case Diary</h1>

<table class="table" >
	<tr>
		<th>Sl.No</th>
		<th>Crime</th>
		<th>Description</th>
		<th>Date & Time</th>
		<th>File</th>
	</tr>
	<?php  

		$b="SELECT *,`case_diary`.`date_time`AS ddate_time FROM `crimes`INNER JOIN `case_diary`USING(`crime_id`) where crime_id='$crime_id' and `case_diary`.police_id='$police_id' ";
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
		<td><a class="btn btn-success" href="?uid=<?php echo $key['diary_id'] ?>&crime_id=<?php echo $key['crime_id'] ?>">Update</a></td>
		<td><a class="btn btn-success" href="?did=<?php echo $key['diary_id'] ?>&crime_id=<?php echo $key['crime_id'] ?>">Delete</a></td>
	</tr>	
		<?php }
	?>     
</table>

</form>

<?php 
}

?>  

</center>

<?php include 'footer.php' ?>