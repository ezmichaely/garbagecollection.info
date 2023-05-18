<!-- action -->
<?php include('../app/helpers/helper_Time.php') ?>

<div class="modal fade" id="editModal<?php echo $timeID; ?>" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="time.php">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">
                        EDIT TIME
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Time</label>
                        <input type="hidden" name="TimeID" value="<?php echo $timeID; ?>" class="form-control" required />
                        <input type="text" name="editTimeName" value="<?php echo $timeName; ?>" class="form-control" required />
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="close btn btn-danger" data-bs-dismiss="modal">
                        <i class="fas fa-times"></i>
                        <span>CLOSE</span>
                    </button>

                    <button type="submit" name="submit_editTime" class="save btn btn-primary">
                        <i class="fas fa-save"></i>
                        <span>SAVE</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>