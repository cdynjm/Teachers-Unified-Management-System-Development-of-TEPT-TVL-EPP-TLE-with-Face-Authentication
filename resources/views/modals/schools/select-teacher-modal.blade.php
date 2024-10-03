<!-- The Modal -->
<div class="modal fade" id="selectTeacherModal" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content border-radius-md">
            <div class="modal-header">
                <h5 class="modal-title">Select Teacher</h5>
                <button type="button" class="btn-close bg-dark" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            
                <input type="hidden" id="quarter-data" class="form-control">
                <input type="hidden" id="quarter-data-name" class="form-control">
                
                <label for="">Select Subject Teacher</label>
                <select name="" id="teacher-name" class="form-select" required>
                    <option value="">Select...</option>
                    @foreach ($teachers as $tc)
                        <option value="{{ $tc->teacher }}">{{ $tc->teacher }}</option>
                    @endforeach
                </select>

            <div class="d-flex justify-content-center mt-4">
                <button  class="btn btn-sm bg-dark text-white" id="proceed-download-pdf">Save</button>
            </div>
            </div>
        </div>
    </div>
</div> 
