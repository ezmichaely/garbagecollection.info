<!-- action -->
<?php include('../app/helpers/helper_Barangay.php') ?>


<div class="modal fade" id="editModal<?php echo $brgyID; ?>" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">

    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="barangay.php">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">
                        EDIT BARANGAY
                        <!-- <?php echo $brgyID; ?> -->
                        <!-- <?php echo $brgyName; ?> -->
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Barangay</label>
                        <input type="hidden" name="BarangayID" value="<?php echo $brgyID; ?>" class="form-control" required />
                        <input type="text" name="editBarangayName" value="<?php echo $brgyName; ?>" class="form-control" required />
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="close btn btn-danger" data-bs-dismiss="modal">
                        <i class="fas fa-times"></i>
                        <span>CLOSE</span>
                    </button>

                    <button type="submit" name="submit_editBrgy" class="save btn btn-primary">
                        <i class="fas fa-save"></i>
                        <span>SAVE</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>