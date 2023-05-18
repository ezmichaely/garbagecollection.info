<?php
if (isset($_POST['submit_newDay'])) {
    if (!empty($_POST['newDay'])) {
        $dayName = $_POST['newDay'];

        $stmt = "INSERT INTO day (day_name) VALUES ('$dayName');";
        $run = mysqli_query($conn, $stmt);

        if (!$run) {
            echo ("Error:" . mysqli_error($conn));
        } else {
            echo "<script>alert('New Day was successfully added!')</script>";
            echo "<script>window.open('day.php','_self')</script>";
        }
    } else {
        echo "Add New Day!";
    }
}

if (isset($_POST['submit_editDay'])) {
    if (!empty($_POST['editDayName'])) {
        $dayID = $_POST['DayID'];
        $dayName = $_POST['editDayName'];
        $stmt = "UPDATE day SET `day_name` = '$dayName' WHERE `day_id` = '$dayID';";

        $run = mysqli_query($conn, $stmt);

        if (!$run) {
            echo ("Error:" . mysqli_error($conn));
        } else {
            echo "<script>alert('Day Name has successfully updated!')</script>";
            echo "<script>window.open('day.php','_self')</script>";
        }
    }
}

if (isset($_POST['submit_deleteDay'])) {
    $dayID = $_POST['dayID'];

    $stmt = "DELETE FROM day WHERE day_id = $dayID;";
    $run = mysqli_query($conn, $stmt);

    if (!$run) {
        echo ("Error:" . mysqli_error($conn));
    } else {
        echo "<script>alert('Day has successfully deleted!')</script>";
        echo "<script>window.open('day.php','_self')</script>";
    }
}
