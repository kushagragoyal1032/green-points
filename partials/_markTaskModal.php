


    <div class="modal fade" id="CompletedModal" tabindex="-1" aria-labelledby="CompletedModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="CompletedModalLabel">Mark Task1 As Completed</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="partials/_markTaskHandle.php" enctype="multipart/form-data">
                        <div class="mb-3 my-3">
                        <input type="text" name="Com_operation_from_Puser_details" id="Com_operation_from_Puser_details">
                            <input type="text" name="Complete_Task_id" id="Complete_Task_id">
                            <label for="desc" class="form-label">Write Description Here !</label>
                            <textarea class="form-control" name="PartnerDesc"
                                placeholder="What Your Have Done at Your Field Work" name="Completed_description"
                                id="edit_desc" style="height: 100px"></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Select Image to Upload:</label>
                            <input type="file" accept="image/* " class="form-control" name="pimage" >
                            <p class="form-text text-danger mt-1 ml-0">* Please Select only one Image</p>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="completebtn" value='completing'>Mark As
                        Completed</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <!-- ends Here -->





            <!-- Modal for Mark the task Rejected -->
    <!-- starts Here -->
    <!-- Modal -->

    <div class="modal fade" id="RejectedModal" tabindex="-1" aria-labelledby="RejectedModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="RejectedModalLabel">Mark Task As Rejected</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="partials/_markTaskHandle.php">
                        <div class="mb-3 my-3">
                        <input type="hidden" name="Rej_operation_from_Puser_details" id="Rej_operation_from_Puser_details">
                            <input type="text" name="Reject_Task_id" id="Reject_Task_id">
                            <label for="desc" class="form-label">Mark Task As Rejected</label>
                            <textarea class="form-control" name="PartnerDesc"
                                placeholder="Why are you rejecting this Task, Write Your Reason Here !!" name="Completed_description"
                                id="edit_rejection_desc" style="height: 100px"></textarea>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="rejectbtn" value='rejecting'>Mark As
                        Rejected</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <!-- ends Here -->