<!-- action -->
<?php
$queryBrgy = "SELECT * FROM barangay ORDER BY brgy_id;";
$resultBrgy = mysqli_query($conn, $queryBrgy);

$queryDay = "SELECT * FROM day ORDER BY day_id;";
$resultDay = mysqli_query($conn, $queryDay);

$queryTime = "SELECT * FROM time ORDER BY time_id;";
$resultTime = mysqli_query($conn, $queryTime);
?>


<?php include('../app/helpers/helper_Collection.php') ?>

<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="collection.php">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">
                        ADD NEW SCHEDULE
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Barangay</label>
                        <select name="cBarangay" class="form-select" aria-label="Default select example">
                            <option selected disabled hidden>Choose a Barangay</option>
                            <?php while ($rowBrgy = mysqli_fetch_array($resultBrgy)) :;
                                $brgyID = $rowBrgy['brgy_id'];
                                $brgyName = $rowBrgy['brgy_name'];
                            ?>
                                <option value="<?php echo $brgyID; ?>"><?php echo $brgyName; ?></option>
                            <?php endwhile; ?>
                        </select>
                    </div>
                    <br />

                    <div class="form-group">
                        <label>Day</label>
                        <select name="cDay" class="form-select" aria-label="Default select example">
                            <option selected disabled hidden>Choose a Day</option>
                            <?php while ($rowDay = mysqli_fetch_array($resultDay)) :;
                                $dayID = $rowDay['day_id'];
                                $dayName = $rowDay['day_name'];
                            ?>
                                <option value="<?php echo $dayID; ?>"><?php echo $dayName; ?></option>
                            <?php endwhile; ?>
                        </select>
                    </div>

                    <br />
                    <div class="form-group">
                        <label>Time</label>
                        <select name="cTime" class="form-select" aria-label="Default select example">
                            <option selected disabled hidden>Choose a Time</option>
                            <?php while ($rowTime = mysqli_fetch_array($resultTime)) :;
                                $timeID = $rowTime['time_id'];
                                $timeName = $rowTime['time_name'];
                            ?>
                                <option value="<?php echo $timeID; ?>"><?php echo $timeName; ?></option>
                            <?php endwhile; ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="close btn btn-danger" data-bs-dismiss="modal">
                        <i class="fas fa-times"></i>
                        <span>CLOSE</span>
                    </button>

                    <button type="submit" name="submit_newCollection" class="btn btn-primary">
                        <i class="fas fa-save"></i>
                        <span>SAVE</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>