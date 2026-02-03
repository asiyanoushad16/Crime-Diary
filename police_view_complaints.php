<?php include 'policeheader.php';
$police_id = $_SESSION['police_id'];
?>

<section id="hero" class="d-flex align-items-center">
  <div class="container" data-aos="zoom-out" data-aos-delay="100">
    <h1>View <span>Assigned Complaints</span></h1>
    <center>

<?php
// ✅ Update status
if (isset($_POST['update_status'])) {
    extract($_POST);
    $q = "UPDATE complaints SET status='$status' WHERE complaint_id='$complaint_id'";
    update($q);
    alert("Complaint status updated successfully");
    return redirect("police_view_complaints.php");
}

// ✅ Fetch complaints assigned to this police officer
$q = "SELECT c.*, u.fname, u.lname, u.phone, u.email 
      FROM complaints c 
      INNER JOIN users u ON c.user_id = u.user_id
      WHERE c.police_id='$police_id'";
$res = select($q);
?>

<table class="table">
  <tr>
    <th>Sl.No</th>
    <th>User</th>
    <th>Title</th>
    <th>Description</th>
    <th>Image</th>
    <th>Place</th>
    <th>Date</th>
    <th>Status</th>
    <th>Action</th>
  </tr>

<?php 
$slno = 1;
foreach ($res as $row) { ?>
  <tr>
    <td><?php echo $slno++; ?></td>
    <td><?php echo $row['fname'] . " " . $row['lname']; ?><br>
        <?php echo $row['phone']; ?><br>
        <?php echo $row['email']; ?>
    </td>
    <td><?php echo $row['title']; ?></td>
    <td><?php echo $row['description']; ?></td>
     <td>
            <?php if($row['image']) { ?>
                <img src="uploads/<?php echo $row['image']; ?>" width="100">
            <?php } else { echo "No Image"; } ?>
        </td>
    <td><?php echo $row['place']; ?></td>
    <td><?php echo $row['complaint_date']; ?></td>
    <td><?php echo $row['status']; ?></td>
    <td>
      <form method="post">
        <input type="hidden" name="complaint_id" value="<?php echo $row['complaint_id']; ?>">
        <select name="status" required>
          <option value="">--Select--</option>
          <option value="In Progress">In Progress</option>
          <option value="Completed">Completed</option>
          <option value="Rejected">Rejected</option>
        </select>
        <button type="submit" name="update_status" class="btn btn-primary btn-sm">Update</button>
      </form>
    </td>
  </tr>
<?php } ?>

</table>

    </center>
  </div>
</section>

<?php include 'footer.php'; ?>
