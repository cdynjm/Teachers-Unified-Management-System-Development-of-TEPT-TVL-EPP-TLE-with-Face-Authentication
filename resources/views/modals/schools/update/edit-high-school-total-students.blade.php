<!-- The Modal -->
<div class="modal fade" id="editHighSchoolTotalStudentsModal" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content border-radius-md">
            <div class="modal-header">
                <h5 class="modal-title">Edit Total Students</h5>
                <button type="button" class="btn-close bg-dark" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" id="update-high-school-total-students">
                    @csrf
                    <input type="hidden" class="form-control" id="edit-total-hs-school-id" name="schoolID">
                    <input type="hidden" class="form-control" id="edit-total-hs-year-level" name="yearLevel">
                    <input type="hidden" class="form-control" name="year" value="{{ Session::get('year') }}">

                    <label for="">Total Students</label>
                    <input type="number" name="students" id="edit-hs-total-students" class="form-control">
                    
                    <div class="d-flex justify-content-center mt-4">
                        <button  class="btn btn-sm bg-dark text-white">Save</button>
                    </div>

                </form>
               
            </div>
        </div>
    </div>
</div> 
