<?php
// ADD NEW TIME
if (isset($_POST['submit_newTime'])) {
    if (!empty($_POST['newTime'])) {
        $timeName = $_POST['newTime'];

        $stmt = "INSERT INTO time (time_name) VALUES ('$timeName');";
        $run = mysqli_query($conn, $stmt);

        if (!$run) {
            echo ("Error:" . mysqli_error($conn));
        } else {
            echo "<script>alert('New Time was successfully added!')</script>";
            echo "<script>window.open('time.php','_self')</script>";
        }
    } else {
        echo "Add New Day!";
    }
}

//EDIT TIME
if (isset($_POST['submit_editTime'])) {
    if (!empty($_POST['editTimeName'])) {
        $timeID = $_POST['TimeID'];
        $timeName = $_POST['editTimeName'];
        $stmt = "UPDATE time SET `time_name` = '$timeName' WHERE `time_id` = '$timeID';";

        $run = mysqli_query($conn, $stmt);

        if (!$run) {
            echo ("Error:" . mysqli_error($conn));
        } else {
            echo "<script>alert('Time has successfully updated!')</script>";
            echo "<script>window.open('time.php','_self')</script>";
        }
    }
}

if (isset($_POST['submit_deleteTime'])) {
    $timeID = $_POST['timeID'];

    $stmt = "DELETE FROM time WHERE time_id = $timeID;";
    $run = mysqli_query($conn, $stmt);

    if (!$run) {
        echo ("Error:" . mysqli_error($conn));
    } else {
        echo "<script>alert('Time record has successfully deleted!')</script>";
        echo "<script>window.open('time.php','_self')</script>";
    }
}
