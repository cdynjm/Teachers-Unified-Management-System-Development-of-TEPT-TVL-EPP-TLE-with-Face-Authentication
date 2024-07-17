<!-- The Modal -->
<div class="modal fade" id="createTeacherModal" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content border-radius-md">
            <div class="modal-header">
                <h5 class="modal-title">Add Teacher</h5>
                <button type="button" class="btn-close bg-dark" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form action="" id="create-teacher">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <label for="">Teacher Name</label>
                        <input type="text" name="teacher" class="form-control" required>

                        <label for="">Position/Rank</label>
                        <select name="position" id="" class="form-select" required>
                            <option value="">Select...</option>
                            <option value="{{ $aes->encrypt(1) }}">Teacher</option>
                            <option value="{{ $aes->encrypt(2) }}">Principal</option>
                        </select>

                        <label for="" class="mt-2">Profile Picture</label>
                        <input type="file" name="photo" class="form-control mb-2" id="add-profile-photo" onchange="createProfilePhoto(this)" required>
            
                        <center>
                            <img src="{{ asset('storage/icons/profile-placeholder.jpg') }}" alt="" class="mt-4 img-fluid rounded" id="create-profile-photo" style="width: 180px; height: auto">
                        </center>
                        
                        <p class="mt-4 text-sm">Account Credentials</p>

                        <label for="">Teacher School ID</label>
                        <input type="text" class="form-control" name="email" required>

                        <label for="">Password</label>
                        <input type="password" class="form-control" name="password" required>
                    </div>
                </div> 
                     
                    <div class="d-flex justify-content-center mt-4">
                        <button  class="btn btn-sm bg-dark text-white">Save</button>
                    </div>

                </form>
               
            </div>
        </div>
    </div>
</div> 
