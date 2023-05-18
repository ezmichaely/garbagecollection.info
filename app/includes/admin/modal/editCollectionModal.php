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

<div class="modal fade" id="editModal<?php echo $cID ?>" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="collection.php">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">
                        EDIT SCHEDULE
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Barangay</label>
                        <input type="hidden" name="cID" value="<?php echo $cID; ?>" class="form-control" required />
                        <select name="ceditBarangay" class="form-select" aria-label="Default select example">
                            <option value="<?php echo $brgyID; ?>" hidden><?php echo $brgyName; ?></option>
                            <?php while ($rowBrgy = mysqli_fetch_array($resultBrgy)) :;
                                $brgyID = $rowBrgy['brgy_id'];
                                $brgyName = $rowBrgy['brgy_name'];
                            ?>
                                <option value="<?php echo $brgyID ?>"><?php echo $brgyName ?></option>
                            <?php endwhile; ?>
                        </select>
                    </div>
                    <br />
                    <div class="form-group">
                        <label>Day</label>
                        <select name="ceditDay" class="form-select" aria-label="Default select example">
                            <option value="<?php echo $dayID; ?>" hidden><?php echo $dayName; ?></option>
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
                        <select name="ceditTime" class="form-select" aria-label="Default select example">
                            <option value="<?php echo $timeID; ?>" hidden><?php echo $timeName; ?></option>
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

                    <button type="submit" name="submit_editCollection" class="save btn btn-primary">
                        <i class="fas fa-save"></i>
                        <span>SAVE</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>