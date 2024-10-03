<!-- The Modal -->
<div class="modal fade" id="createSchoolModal" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content border-radius-md">
            <div class="modal-header">
                <h5 class="modal-title">Add School</h5>
                <button type="button" class="btn-close bg-dark" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <p class="text-sm">School Information and Account Credentials</p>
            <form action="" id="create-school">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <label for="">School Name</label>
                        <input type="text" name="school" class="form-control" required>
    
                        <label for="">School Level</label>
                        <select name="schoolLevel" id="select-school-level" class="form-select" required>
                            <option value="">Select...</option>
                            <option value="1">Elementary</option>
                            <option value="2">High School</option>
                            <option value="3">Senior High School Only</option>
                        </select>
                        <div class="row">
                            <p class="text-xs mb-2 mt-3 text-center">Map Location</p>
                            <div class="col-md-6">
                                <label for="">Latitude</label>
                                <input type="number" step="any" name="latitude" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label for="">Longitude</label>
                                <input type="number" step="any" name="longitude" class="form-control" required>
                            </div>
                        </div>
                        
                    </div>
                    <div class="col-md-6">
                        <label for="">Create Email</label>
                        <input type="email" name="email" class="form-control" required>

                        <label for="">Create Password</label>
                        <input type="password" name="password" class="form-control" required>

                    </div>
                    
                    <div class="col-md-12">
                        <div class="show-high-school" style="display: none;">
                            <div class="row">
                                <div class="col-md-6">
                                    <p class="mt-3 text-sm">TLE/TVE Offers</p>
                                    @foreach ($TLETVESubjects as $sub)
                                        <div>
                                            <input type="checkbox" name="tvl_tve[]" value="{{ $aes->encrypt($sub->id) }}">
                                            <label for="">{{ $sub->subject }}</label>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="col-md-6">
                                    <div class="mt-4">
                                        <input type="checkbox" value="1" id="shs-available" name="shsAvailable">
                                        <label for="">Does this school offers senior high?</label>
                                    </div>
            
                                    <div class="show-strands" style="display: none;">
                                        <hr>
                                        <p class="mt-3 text-sm">Strands</p>
                                        @foreach ($strandSubjects as $sub)
                                            <div>
                                                <input type="checkbox" name="strands[]" value="{{ $aes->encrypt($sub->id) }}">
                                                <label for="">{{ $sub->subject }}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="show-senior-high-school" style="display: none;">
                            <hr>
                            <p class="mt-3 text-sm">Strands</p>
                            @foreach ($strandSubjects as $sub)
                                <div>
                                    <input type="checkbox" name="shs_strands[]" value="{{ $aes->encrypt($sub->id) }}">
                                    <label for="">{{ $sub->subject }}</label>
                                </div>
                            @endforeach
                        </div>
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
