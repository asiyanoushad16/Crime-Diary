<?php include "adminheader.php" ?>
<center><h1>ADMIN VIEW CRIMINALS</h1>
	<table>
		<tr>
			<th>crime type name</th>
			<th>description</th>
			<th>first name</th>
			<th>last name</th>
			<th>house name</th>
			<th>place</th>
			<th>district</th>
			<th>gender</th>
			<th>dob</th>
			<th>photo</th>
			<th>identification mark 1</th>
			<th>identification mark 2</th>
		</tr>
		<?php 
		$q="select * from criminals inner join crimes
		  using (crime_id)";
   $res=select($q);
   foreach ($res as $row) { ?>
   	<tr>
<td><?php echo $row['crime_title'] ?></td>
<td><?php echo $row['crime_description'] ?></td>
<td><?php echo $row['first_name'] ?></td>
<td><?php echo $row['last_name'] ?></td>
<td><?php echo $row['house_name'] ?></td>
<td><?php echo $row['place'] ?></td>
<td><?php echo $row['district'] ?></td>
<td><?php echo $row['gender'] ?></td>
<td><?php echo $row['dob'] ?></td>
<td><?php echo $row['photo'] ?></td>
<td><?php echo $row['identification_mark_1'] ?></td>
<td><?php echo $row['identification_mark_2'] ?></td>
</tr>
<?php
}
 ?>	
</table>
</center>
<?php include "publicfooter.php" ?>