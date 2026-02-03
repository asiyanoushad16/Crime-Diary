<?php include 'userheader.php';

$user_id = $_SESSION['user_id']; // assuming you stored user_id at login

// Add Complaint
if (isset($_POST['add_btn'])) {
    extract($_POST);
    $date = date('Y-m-d');

    // handle image upload
    $imgName = "";
    if (!empty($_FILES['image']['name'])) {
        $imgName = time() . "_" . basename($_FILES['image']['name']);
        move_uploaded_file($_FILES['image']['tmp_name'], "uploads/" . $imgName);
    }

    $q = "INSERT INTO complaints (user_id, title, description, complaint_date, status, image, police_id, place) 
      VALUES ('$user_id','$title','$description','$date','Pending','$imgName',NULL,'$place')";

    insert($q);
    alert("Complaint Registered Successfully!");
    return redirect("user_complaint.php");
}

// Fetch Complaint for Edit
if (isset($_GET['edit_id'])) {
    $cid = $_GET['edit_id'];
    $sel = "SELECT * FROM complaints WHERE complaint_id='$cid'";
    $complaint = select($sel);
}

// Update Complaint
if (isset($_POST['update_btn'])) {
    extract($_POST);

    // handle image update
    $imgName = $complaint[0]['image']; // old image
    if (!empty($_FILES['image']['name'])) {
        $imgName = time() . "_" . basename($_FILES['image']['name']);
        move_uploaded_file($_FILES['image']['tmp_name'], "uploads/" . $imgName);
    }

    $u = "UPDATE complaints SET title='$title1', description='$description1', place='$place1', image='$imgName' WHERE complaint_id='$cid'";
    update($u);
    alert("Complaint Updated Successfully!");
    return redirect("user_complaint.php");
}

// Delete Complaint
if (isset($_GET['del_id'])) {
    $cid = $_GET['del_id'];
    $d = "DELETE FROM complaints WHERE complaint_id='$cid'";
    delete($d);
    alert("Complaint Deleted!");
    return redirect("user_complaint.php");
}
?>

<center>

<?php if (isset($_GET['edit_id'])) { ?>

<section id="hero" class="d-flex align-items-center">
<div class="container">

<form method="post" enctype="multipart/form-data">
<h1>Update <span>Complaint</span></h1>
<table class="table" style="width:500px;">
    <tr>
        <th>Title</th>
        <td><input type="text" required class="form-control" name="title1" value="<?php echo $complaint[0]['title'] ?>"></td>
    </tr>
    <tr>
        <th>Description</th>
        <td><textarea required class="form-control" name="description1"><?php echo $complaint[0]['description'] ?></textarea></td>
    </tr>
    <tr>
        <th>Place</th>
        <td><input type="text" required class="form-control" name="place1" value="<?php echo $complaint[0]['place'] ?>"></td>
    </tr>
    <tr>
        <th>Image</th>
        <td>
            <input type="file" class="form-control" name="image">
            <?php if($complaint[0]['image']) { ?>
                <img src="uploads/<?php echo $complaint[0]['image']; ?>" width="100">
            <?php } ?>
        </td>
    </tr>
    <tr>
        <td colspan="2" align="center">
            <input type="submit" name="update_btn" class="btn btn-success" value="Update">
        </td>
    </tr>
</table>
</form>

</div>
</section>

<?php } else { ?>

<section id="hero" class="d-flex align-items-center">
<div class="container">

<form method="post" enctype="multipart/form-data">
<h1>Add <span>Complaint</span></h1>
<table class="table" style="width:500px;">
    <tr>
        <th>Title</th>
        <td><input type="text" required class="form-control" name="title"></td>
    </tr>
    <tr>
        <th>Description</th>
        <td><textarea required class="form-control" name="description"></textarea></td>
    </tr>
    <tr>
        <th>Place</th>
        <td><input type="text" required class="form-control" name="place"></td>
    </tr>
    <tr>
        <th>Image</th>
        <td><input type="file" class="form-control" name="image"></td>
    </tr>
    <tr>
        <td colspan="2" align="center">
            <input type="submit" name="add_btn" class="btn btn-success" value="Submit">
        </td>
    </tr>
</table>
</form>

</div>
</section>

<?php } ?>


<form method="post">
<h1>View <span>Complaints</span></h1>
<table class="table" border="1">
    <tr>
        <th>Sl.No</th>
        <th>Title</th>
        <th>Description</th>
        <th>Place</th>
        <th>Date</th>
        <th>Status</th>
        <th>Image</th>
        <th>Action</th>
    </tr>
    <?php
    $q = "SELECT * FROM complaints WHERE user_id='$user_id' ORDER BY complaint_id DESC";
    $res = select($q);
    $sl = 1;
    foreach ($res as $row) { ?>
    <tr>
        <td><?php echo $sl++ ?></td>
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
            <a class="btn btn-success" href="?edit_id=<?php echo $row['complaint_id'] ?>">Edit</a>
            <a class="btn btn-danger" onclick="return confirm('Are you sure to delete?')" href="?del_id=<?php echo $row['complaint_id'] ?>">Delete</a>
        </td>
    </tr>
    <?php } ?>
</table>
</form>

</center>

<?php include 'footer.php' ?>
