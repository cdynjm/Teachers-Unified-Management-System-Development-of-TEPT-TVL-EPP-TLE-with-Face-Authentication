<!-- The Modal -->
<div class="modal fade" id="createRequestDocumentModal" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content border-radius-md">
            <div class="modal-header">
                <h5 class="modal-title">Request Documents</h5>
                <button type="button" class="btn-close bg-dark" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" id="create-request-documents">
                    @csrf

                    <label for="">Description</label>
                    <input type="text" name="description" class="form-control" required>
                    
                    <label for="">Request Documents from:</label>
                    <select name="position" id="" class="form-select" required>
                        <option value="">Select...</option>
                        <option value="{{ $aes->encrypt(1) }}">School Teachers</option>
                        <option value="{{ $aes->encrypt(2) }}">School Principals</option>
                        <option value="{{ $aes->encrypt(3) }}">All</option>
                    </select>

                    <div class="d-flex justify-content-center mt-4">
                        <button  class="btn btn-sm bg-dark text-white">Save</button>
                    </div>

                </form>
               
            </div>
        </div>
    </div>
</div> 
