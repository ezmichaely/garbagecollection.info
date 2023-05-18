<?php include('../app/helpers/helper_Barangay.php') ?>

<div class="modal fade" id="deleteModal<?php echo $brgyID; ?>" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="barangay.php">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">
                        DELETE BARANGAY
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input type="hidden" name="brgyID" value="<?php echo $brgyID; ?>" class="form-control" required />
                    </div>
                    <div class="modal-warning">
                        <div class="modal-warning-icon">
                            <i class="far fa-times-circle"></i>
                        </div>
                        <div class="modal-warning-title">
                            <h3>Are you sure?</h3>
                        </div>
                        <div class="modal-warning-body">
                            <p>
                                Do you really want to delete these record?
                                This process cannot be undone.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="close btn btn-secondary" data-bs-dismiss="modal">
                        <i class="fas fa-times"></i>
                        <span>CANCEL</span>
                    </button>

                    <button type="submit" name="submit_deleteBrgy" class="btn btn-danger">
                        <i class="fas fa-trash"></i>
                        <span>DELETE</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>