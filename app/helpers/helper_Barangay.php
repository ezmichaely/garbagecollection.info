<?php
if (isset($_POST['submit_newBrgy'])) {
    if (!empty($_POST['newBarangay'])) {
        $brgyName = $_POST['newBarangay'];

        $stmt = "INSERT INTO barangay (brgy_name) VALUES ('$brgyName');";
        $run = mysqli_query($conn, $stmt);

        if (!$run) {
            echo ("Error:" . mysqli_error($conn));
        } else {
            echo "<script>alert('New Barangay was successfully added!')</script>";
            echo "<script>window.open('barangay.php','_self')</script>";
        }
    } else {
        echo "Add New Barangay!";
    }
}

if (isset($_POST['submit_editBrgy'])) {
    if (!empty($_POST['editBarangayName'])) {
        $brgyID = $_POST['BarangayID'];
        $brgyName = $_POST['editBarangayName'];
        $stmt = "UPDATE barangay SET `brgy_name` = '$brgyName' WHERE `brgy_id` = '$brgyID';";

        $run = mysqli_query($conn, $stmt);

        if (!$run) {
            echo ("Error:" . mysqli_error($conn));
        } else {
            echo "<script>alert('Barangay Name has successfully updated!')</script>";
            echo "<script>window.open('barangay.php','_self')</script>";
        }
    }
}

if (isset($_POST['submit_deleteBrgy'])) {
    $brgyID = $_POST['brgyID'];

    $stmt = "DELETE FROM barangay WHERE brgy_id = $brgyID;";
    $run = mysqli_query($conn, $stmt);

    if (!$run) {
        echo ("Error:" . mysqli_error($conn));
    } else {
        echo "<script>alert('Barangay has successfully deleted!')</script>";
        echo "<script>window.open('barangay.php','_self')</script>";
    }
}
