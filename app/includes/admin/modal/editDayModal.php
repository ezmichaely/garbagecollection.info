<!-- action -->
<?php include('../app/helpers/helper_Day.php') ?>

<div class="modal fade" id="editModal<?php echo $dayID; ?>" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="day.php">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">
                        EDIT DAY
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Day</label>
                        <input type="hidden" name="DayID" value="<?php echo $dayID; ?>" class="form-control" required />
                        <input type="text" name="editDayName" value="<?php echo $dayName; ?>" class="form-control" required />
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="close btn btn-danger" data-bs-dismiss="modal">
                        <i class="fas fa-times"></i>
                        <span>CLOSE</span>
                    </button>

                    <button type="submit" name="submit_editDay" class="save btn btn-primary">
                        <i class="fas fa-save"></i>
                        <span>SAVE</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>