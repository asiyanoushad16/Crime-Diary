<?php include "adminheader.php" ?>
<center><h1>ADMIN VIEW CRIME</h1>
	<table>
		<tr>
			<th>crime type name</th>
			<th>description</th>
			<th>crime title</th>
			<th>crime description</th>
			<th>date time occured</th>
			<th>date time reported</th>
			<th>first name</th>
			<th>last name</th>
			<th>crime status</th>
			<th>place</th>
			<th>district</th>
			<th>image</th>
		</tr>
		<?php 
		$q="select * from crimes inner join crime_types  using (crime_type_id) inner join polices using (police_id)";
   $res=select($q);
   foreach ($res as $row) { ?>
   	<tr>
<td><?php echo $row['crime_title'] ?></td>
<td><?php echo $row['description'] ?></td>
<td><?php echo $row['crime_title'] ?></td>
<td><?php echo $row['crime_description'] ?></td>
<td><?php echo $row['date_time_occurred'] ?></td>
<td><?php echo $row['date_time_reported'] ?></td>
<td><?php echo $row['first_name'] ?></td>
<td><?php echo $row['last_name'] ?></td>
<td><?php echo $row['crime_status'] ?></td>
<td><?php echo $row['place'] ?></td>
<td><?php echo $row['district'] ?></td>
<td><?php echo $row['image'] ?></td>
</tr>
<?php
}
 ?>	
</table>
</center>
<?php include "publicfooter.php" ?>