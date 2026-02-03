<?php include 'adminheader.php'; ?>

<center>
<section id="hero" class="d-flex align-items-center">
<div class="container">

<h1>View <span>Complaints</span></h1>

<table class="table table-bordered table-striped">
    <tr>
        <th>Sl.No</th>
        <th>User</th>
        <th>Title</th>
        <th>Description</th>
        <th>Place</th>
        <th>Date</th>
        <th>Status</th>
        <th>Image</th>
        <th>Assigned Police</th>
        <th>Action</th>
    </tr>

    <?php
    $q = "SELECT c.*, u.fname AS user_fname, u.lname AS user_lname, 
             ps.name AS station_name, ps.place AS station_place,
             p.fname AS police_fname, p.lname AS police_lname
      FROM complaints c
      INNER JOIN users u ON c.user_id = u.user_id
      LEFT JOIN polices p ON c.police_id = p.police_id
      LEFT JOIN police_station ps ON p.station_id = ps.station_id
      ORDER BY c.complaint_id DESC";
    $res = select($q);
    $sl = 1;

    foreach ($res as $row) { ?>
    <tr>
        <td><?php echo $sl++ ?></td>
        <td><?php echo $row['user_fname']." ".$row['user_lname'] ?></td>
        <td><?php echo $row['title'] ?></td>
        <td><?php echo $row['description'] ?></td>
        <td><?php echo $row['place'] ?></td>
        <td><?php echo $row['complaint_date'] ?></td>
        <td><?php echo $row['status'] ?></td>
        <td>
            <?php if($row['image']) { ?>
                <img src="uploads/<?php echo $row['image']; ?>" width="100">
            <?php } else { echo "No Image"; } ?>
        </td>
        <td>
            <?php echo  $row['police_lname'] ? $row['police_fname']  : "Not Assigned"; ?>
        </td>
        <td>
            <a href="admin_assign_complaint.php?cid=<?php echo $row['complaint_id'] ?>&place=<?php echo $row['place'] ?>" 
               class="btn btn-primary btn-sm">Assign</a>
        </td>
    </tr>
    <?php } ?>
</table>

</div>
</section>
</center>

<?php include 'footer.php'; ?>
