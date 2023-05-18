<?php
if (isset($_POST['submit_newCollection'])) {
    $cBrgy = $_POST['cBarangay'];
    $cDay = $_POST['cDay'];
    $cTime = $_POST['cTime'];

    $stmt = "INSERT INTO collection 
            (collection_brgy, collection_day, collection_time)
            VALUES ('$cBrgy', '$cDay', '$cTime');";
    $run = mysqli_query($conn, $stmt);

    if (!$run) {
        echo ("Error:" . mysqli_error($conn));
    } else {
        echo "<script>alert('New Collection Schedule was successfully added!')</script>";
        echo "<script>window.open('collection.php','_self')</script>";
    }
}

if (isset($_POST['submit_editCollection'])) {
    $cID = $_POST['cID'];
    $cBrgy = $_POST['ceditBarangay'];
    $cDay = $_POST['ceditDay'];
    $cTime = $_POST['ceditTime'];

    $stmt = "UPDATE collection SET
            `collection_brgy` = '$cBrgy', `collection_day` = '$cDay', `collection_time` = '$cTime'  
            WHERE `collection_id` = '$cID';";

    $run = mysqli_query($conn, $stmt);

    if (!$run) {
        echo ("Error:" . mysqli_error($conn));
    } else {
        echo "<script>alert('Collection Schedule has successfully updated!')</script>";
        echo "<script>window.open('collection.php','_self')</script>";
    }
}

if (isset($_POST['submit_deleteCollection'])) {
    $cID = $_POST['cID'];

    $stmt = "DELETE FROM collection WHERE collection_id = $cID;";
    $run = mysqli_query($conn, $stmt);

    if (!$run) {
        echo ("Error:" . mysqli_error($conn));
    } else {
        echo "<script>alert('Collection Schedule has successfully deleted!')</script>";
        echo "<script>window.open('collection.php','_self')</script>";
    }
}
