<!-- The Modal -->
<div class="modal fade" id="editTLETVESubjectModal" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content border-radius-md">
            <div class="modal-header">
                <h5 class="modal-title">Edit Subject</h5>
                <button type="button" class="btn-close bg-dark" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" id="update-tle-tve-subject">
                    @csrf
                    <input type="hidden" class="form-control" id="edit-tle-id" name="id">
                    <label for="">Subject Name</label>
                    <input type="text" name="subject" id="edit-tle-subject" class="form-control" required>

                    <div class="d-flex justify-content-center mt-4">
                        <button  class="btn btn-sm bg-dark text-white">Save</button>
                    </div>

                </form>
               
            </div>
        </div>
    </div>
</div> 
