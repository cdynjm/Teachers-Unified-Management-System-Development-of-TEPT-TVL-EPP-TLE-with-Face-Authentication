<!-- The Modal -->
<div class="modal fade" id="createSeniorHighSchoolSubjectModal" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content border-radius-md">
            <div class="modal-header">
                <h5 class="modal-title">Add Subject</h5>
                <button type="button" class="btn-close bg-dark" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" id="create-senior-high-school-subject">
                    @csrf

                    <label for="">Subject Name</label>
                    <input type="text" name="subject" class="form-control" required>

                    <label for="">Grade Level</label>
                    <select name="yearLevel" id="" class="form-select" required>
                        <option value="">Select...</option>
                        <option value="11">Grade 11</option>
                        <option value="12">Grade 12</option>
                    </select>

                    <label for="">Semester</label>
                    <select name="semester" id="" class="form-select" required>
                        <option value="">Select...</option>
                        <option value="1">1st</option>
                        <option value="2">2nd</option>
                    </select>

                    <div class="d-flex justify-content-center mt-4">
                        <button  class="btn btn-sm bg-dark text-white">Save</button>
                    </div>

                </form>
               
            </div>
        </div>
    </div>
</div> 
