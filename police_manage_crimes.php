<?php include 'policeheader.php' ;

extract($_GET);
$police_id=$_SESSION['police_id'];

if (isset($_POST['submitbutton'])) 
{
	extract($_POST);
	 	$dir = "uploads/";
		$file = basename($_FILES['crimeimage']['name']);
		$file_type = strtolower(pathinfo($file, PATHINFO_EXTENSION));
		$target1 = $dir.uniqid("images_").".".$file_type;
		if(move_uploaded_file($_FILES['crimeimage']['tmp_name'], $target1))
	  	{
			$u="insert into crimes values(null,'$police_id','$crimetype','$crimetitle','$crimedescription','$datetimeoccurred','$datetimereported','added','$crimeplace','$crimedistrict','$target1')";
			insert($u);
			alert('added successfully');
			return redirect('police_manage_crimes.php');	
		}
	    else
	    {
	        echo "file uploading error occured";
	    }
}


if (isset($_GET['did'])) 
{
	extract($_GET);
	$o="delete from crimes where crime_id='$did'";
	delete($o);
	alert('successfully deleted');
	return redirect('police_manage_crimes.php');
}


if (isset($_GET['uid'])) 
{
	extract($_GET);
	 $w="select * from crimes inner join `crime_types` using(crime_type_id) where crime_id='$uid'";
	$rew=select($w);
}
if (isset($_POST['submitbutton1'])) 
{
	extract($_POST);
	 	$dir = "uploads/";
		$file = basename($_FILES['crimeimage1']['name']);
		$file_type = strtolower(pathinfo($file, PATHINFO_EXTENSION));
		$target2 = $dir.uniqid("images_").".".$file_type;
		if(move_uploaded_file($_FILES['crimeimage1']['tmp_name'], $target2))
	  	{
		$h="update crimes set crime_type_id='$crimetype1',crime_title='$crimetitle',crime_discription='$crimedescription',date_time_occurred='$datetimeoccurred',date_time_reported='$datetimereported',place='$crimeplace',district='$crimedistrict',image='$target2' where police_id='$police_id' and crime_id='$uid'";
		update($h);
		alert('updated successfully');
		return redirect('police_manage_crimes.php');
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

  <section id="hero" class="d-flex align-items-center">
    <div class="container" data-aos="zoom-out" data-aos-delay="100">
	
<form method="post" enctype="multipart/form-data">
	
<h1>Update <span>Crimes</span> </h1>

<table class="table" style="width: 500px;">
	<tr>
		<th>Crime Type</th>
		<td>
			<select name="crimetype1">
			
						<option value="<?php $rew[0]['crime_type_id'] ?>"><?php echo $rew[0]['crime_type_name'] ?></option>
							
				<?php  
						$h="select * from crime_types";
						$res=select($h);
						foreach ($res as $key ) 
						{ ?>
							
						<option class="form-control" value="<?php echo $key['crime_type_id'] ?>"><?php echo $key['crime_type_name'] ?></option>	
						<?php }
						
				?>  
			</select>     
		</td>
	</tr>
	<tr>
		<th>Title</th>
		<td><input type="text" required="" value="<?php echo $rew[0]['crime_title'] ?>" class="form-control" name="crimetitle"></td>
	</tr>
	<tr>
		<th>Description</th>
		<td><input type="text" required="" value="<?php echo $rew[0]['crime_discription'] ?>" class="form-control" name="crimedescription"></td>
	</tr>
	<tr>
		<th>Date And Time Occurred</th>
		<td><input type="datetime-local" value="<?php echo $rew[0]['date_time_occurred'] ?>" class="form-control" required="" name="datetimeoccurred"></td>
	</tr>
	<tr>
		<th>Date And Time Reported</th>
		<td><input type="datetime-local" value="<?php echo $rew[0]['date_time_reported'] ?>" class="form-control" required="" name="datetimereported"></td>
	</tr>
	<tr>
		<th>Place</th>
		<td><input type="text" required="" value="<?php echo $rew[0]['place'] ?>" class="form-control" name="crimeplace"></td>
	</tr>
	<tr>
		<th>District</th>
		<td><input type="text" required="" value="<?php echo $rew[0]['district'] ?>" class="form-control" name="crimedistrict"></td>
	</tr>
	<tr>
		<th>Image</th>
		<td><input type="file" required="" class="form-control" name="crimeimage1"></td>
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

  <section id="hero" class="d-flex align-items-center">
    <div class="container" data-aos="zoom-out" data-aos-delay="100">
	
<form method="post" enctype="multipart/form-data">
	
<h1>Manage <span>Crimes</span> </h1>

<table class="table" style="width: 500px;">
	<tr>
		<th>Crime Type</th>
		<td>
			<select name="crimetype">
				<?php  

						$h="select * from crime_types";
						$res=select($h);
						foreach ($res as $key ) 
						{ ?>
						<option class="form-control" value="<?php echo $key['crime_type_id'] ?>"><?php echo $key['crime_type_name'] ?></option>	
						<?php }
				?>
			</select>     
		</td>
	</tr>
	<tr>
		<th>Title</th>
		<td><input type="text" required="" class="form-control" name="crimetitle"></td>
	</tr>
	<tr>
		<th>Description</th>
		<td><input type="text" required="" class="form-control" name="crimedescription"></td>
	</tr>
	<tr>
		<th>Date And Time Occurred</th>
		<td><input type="datetime-local" class="form-control" required="" name="datetimeoccurred"></td>
	</tr>
	<tr>
		<th>Date And Time Reported</th>
		<td><input type="datetime-local" class="form-control" required="" name="datetimereported"></td>
	</tr>
	<tr>
		<th>Place</th>
		<td><input type="text" required="" class="form-control" name="crimeplace"></td>
	</tr>
	<tr>
		<th>District</th>
		<td><input type="text" required="" class="form-control" name="crimedistrict"></td>
	</tr>
	<tr>
		<th>Image</th>
		<td><input type="file" required="" class="form-control" name="crimeimage"></td>
	</tr>
	<tr>
		<td align="center" colspan="2"><input type="submit" class="btn btn-success" name="submitbutton"></td>
	</tr>
</table>

</form>

    </div>
  </section><!-- End Hero -->



<form method="post">
	
<h1>View <span> Crimes</span></h1>

<table class="table" >
	<tr>
		<th>Sl.No</th>
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

		$f="select * from `crime_types`inner join `crimes`using(`crime_type_id`) where police_id='$police_id'";
		$row=select($f);
		$slno=1;
		foreach ($row as $key ) 
		{ ?>
	<tr>
		<td><?php echo $slno++ ?></td>
		<td><?php echo $key['crime_type_name'] ?></td>
		<td><?php echo $key['crime_title'] ?></td>
		<td><?php echo $key['crime_discription'] ?></td>
		<td><?php echo $key['date_time_occurred'] ?></td>
		<td><?php echo $key['date_time_reported'] ?></td>
		<td><?php echo $key['place'] ?></td>
		<td><?php echo $key['district'] ?></td>
		<td><img src="<?php echo $key['image'] ?> " width="200" height="150"></td>
		<td><a class="btn btn-success" href="?uid=<?php echo $key['crime_id'] ?>">Update</a></td>
		<td><a class="btn btn-success" href="?did=<?php echo $key['crime_id'] ?>">Delete</a></td>
		<td><a class="btn btn-success" href="police_manage_criminals.php?crime_id=<?php echo $key['crime_id'] ?>">Manage Criminals</a></td>
		<td><a class="btn btn-success" href="police_manage_case_diary.php?crime_id=<?php echo $key['crime_id'] ?>">Manage Crime Diary</a></td>
		<!-- <td><a class="btn btn-success" href="police_manage_crime_news.php?crime_id=<?php echo $key['crime_id'] ?>">Manage Crime News</a></td> -->
	</tr>	
		<?php }

	?>        
</table>

</form>

<?php }
?> 

</center>

<?php include 'footer.php' ?>