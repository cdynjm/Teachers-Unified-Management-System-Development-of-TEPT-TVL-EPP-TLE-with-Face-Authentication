<!-- The Modal -->
<div class="modal fade" id="createStrandSubjectModal" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content border-radius-md">
            <div class="modal-header">
                <h5 class="modal-title">Add Strand</h5>
                <button type="button" class="btn-close bg-dark" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" id="create-strand-subject">
                    @csrf

                    <label for="">Subject Name</label>
                    <input type="text" name="subject" class="form-control" required>

                    <label for="">Year Offered</label>
                    <select name="yearOffered" id="year-offered" class="form-select" required>
                        <option value="">Select...</option>
                        <option value="1">By Semester</option>
                        <option value="2">1 year</option>
                        <option value="3">2 years</option>
                    </select>

                    <div class="show-year-semester" style="display: none;">
                        <p class="text-sm mb-0 mt-4">In what year and semester?</p>
                        <label for="">Year</label>
                        <select name="yearSemester" class="form-select">
                            <option value="">Select...</option>
                            <option value="11">Grade 11</option>
                            <option value="12">Grade 12</option>
                        </select>
                        <label for="">Semester</label>
                        <select name="semester" class="form-select">
                            <option value="">Select...</option>
                            <option value="1">1st</option>
                            <option value="2">2nd</option>
                        </select>
                    </div>

                    <div class="show-year" style="display: none;">
                        <p class="text-sm mb-0 mt-4">In what year?</p>
                        <label for="">Year</label>
                        <select name="year" class="form-select">
                            <option value="">Select...</option>
                            <option value="11">Grade 11</option>
                            <option value="12">Grade 12</option>
                        </select>
                    </div>

                    <div class="d-flex justify-content-center mt-4">
                        <button  class="btn btn-sm bg-dark text-white">Save</button>
                    </div>

                </form>
               
            </div>
        </div>
    </div>
</div> 
