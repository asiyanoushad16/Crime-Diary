<?php include 'adminheader.php'; ?>

<?php
if (isset($_GET['cid'])) {
    $cid = $_GET['cid'];

    // Get complaint details
    $q = "SELECT * FROM complaints WHERE complaint_id='$cid'";
    $complaint = select($q);

    if (!$complaint) {
        alert("Complaint not found!");
        return redirect("admin_view_complaints.php");
    }

    $complaint_place = $complaint[0]['place'];
}

// Assign police to complaint
if (isset($_POST['assign_btn'])) {
    extract($_POST);

    if (!empty($police_id)) {
        // ✅ Only update police_id (no status change here)
        $u = "UPDATE complaints SET police_id='$police_id' WHERE complaint_id='$cid'";
        update($u);
        alert("Complaint Assigned Successfully!");
        return redirect("admin_view_complaints.php");
    } else {
        alert("Please select a police officer!");
    }
}
?>

<center>
<section id="hero" class="d-flex align-items-center">
<div class="container">

<h1>Assign <span>Complaint</span></h1>

<form method="post">

<table class="table" style="width:500px;">
    <tr>
        <th>Complaint Title</th>
        <td><?php echo $complaint[0]['title']; ?></td>
    </tr>
    <tr>
        <th>Description</th>
        <td><?php echo $complaint[0]['description']; ?></td>
    </tr>
    <tr>
        <th>Place</th>
        <td><?php echo $complaint_place; ?></td>
    </tr>
    <tr>
        <th>Police Station</th>
        <td>
            <select class="form-control" name="station_id" id="station" required onchange="this.form.submit()">
                <option value="">-- Select Station --</option>
                <?php
                $stations = select("SELECT * FROM police_station WHERE place='$complaint_place'");
                foreach ($stations as $s) {
                    $sel = (isset($_POST['station_id']) && $_POST['station_id'] == $s['station_id']) ? "selected" : "";
                    echo "<option value='{$s['station_id']}' $sel>{$s['name']} ({$s['place']})</option>";
                }
                ?>
            </select>
        </td>
    </tr>
    <?php if (isset($_POST['station_id']) && $_POST['station_id'] != "") { ?>
    <tr>
        <th>Police Officer</th>
        <td>
            <select class="form-control" name="police_id" required>
                <option value="">-- Select Police --</option>
                <?php
                $station_id = $_POST['station_id'];
                $polices = select("SELECT * FROM polices WHERE station_id='$station_id'");
                foreach ($polices as $p) {
                    echo "<option value='{$p['police_id']}'>{$p['fname']} {$p['lname']} ({$p['email']})</option>";
                }
                ?>
            </select>
        </td>
    </tr>
    <?php } ?>
    <tr>
        <td colspan="2" align="center">
            <input type="submit" name="assign_btn" class="btn btn-success" value="Assign">
        </td>
    </tr>
</table>

</form>

</div>
</section>
</center>

<?php include 'footer.php'; ?>
