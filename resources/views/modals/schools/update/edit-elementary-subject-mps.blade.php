<!-- The Modal -->
<div class="modal fade" id="editElementarySubjectMPSModal" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content border-radius-md">
            <div class="modal-header">
                <h5 class="modal-title">Edit Subject MPS</h5>
                <button type="button" class="btn-close bg-dark" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" id="update-elementary-subject-mps">
                    @csrf
                    <input type="hidden" class="form-control" id="edit-elem-mps-id" name="id">
                    <input type="hidden" class="form-control" id="edit-elem-school-id" name="schoolID">
                    <input type="hidden" class="form-control" name="year" value="{{ Session::get('year') }}">

                    <label for="">Grade and Subject</label>
                    <input type="text" name="subject" id="edit-elem-subject" class="form-control" readonly>

                    <label for="">First Quarter</label>
                    <input type="number" name="first" step="any" class="form-control" id="edit-elem-first">

                    <label for="">Second Quarter</label>
                    <input type="number" name="second" step="any" class="form-control" id="edit-elem-second">

                    <label for="">Third Quarter</label>
                    <input type="number" name="third" step="any" class="form-control" id="edit-elem-third">

                    <label for="">Fourth Quarter</label>
                    <input type="number" name="fourth" step="any" class="form-control" id="edit-elem-fourth">

                    <div class="d-flex justify-content-center mt-4">
                        <button  class="btn btn-sm bg-dark text-white">Save</button>
                    </div>

                </form>
               
            </div>
        </div>
    </div>
</div> 