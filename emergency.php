<?php include 'adminheader.php' ;
if (isset($_POST['submit'])) {
	extract($_POST);
	echo$q="insert into emergency_no values('$name','$phone')";
	insert($q);
	alert("successfully");
		}
   ?>
?>
	<form method="post">
		<table>
			<center><h1>EMERGENCY NUMBER</h1>
				<tr>
					<th>name</th>
					<td><input type="text" id="name" name="name" ></td>
				</tr>
				<tr>
					<th>phone</th>
					<td><input type="text" id="phone" name="phone"></td>
				</tr>
				<tr>
		   <td>
			<input type="submit" name="submit" value="ok">
		   </td>
	        </tr>
		</table>


			<center><h1>VIEW EMERGENCY NUMBER</h1>
<table>
	
	<tr>
				<th>name</th>
			<th>phone</th>

		
	</tr>
<?php 

$q="select * from emergency_no";
$res=select($q);
foreach ($res as $row) { ?>


<td><?php echo $row['name'] ?></td>
<td><?php echo $row['phone'] ?></td>

<?php
}
 ?>
</table>
</center>
	</form>
<?php include 'publicfooter.php' ?>