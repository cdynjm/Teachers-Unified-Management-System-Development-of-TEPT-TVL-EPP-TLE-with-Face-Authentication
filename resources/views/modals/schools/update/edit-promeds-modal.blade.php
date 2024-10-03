<!-- The Modal -->
<div class="modal fade" id="editProMedsModal" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content border-radius-md">
            <div class="modal-header">
                <h5 class="modal-title">PRO-MEDS</h5>
                <button type="button" class="btn-close bg-dark" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form action="" id="update-promeds">
                @csrf

                <input type="hidden" name="id" 
                
                @if(Auth::user()->schoolType == 1)
                    value="{{ $aes->encrypt($subject->id) }}"
                @endif
                @if(Auth::user()->schoolType == 2)
                    @if($type == 1)
                        @if($subject->tve_tle == 1)
                            value="{{ $aes->encrypt($subject->id) }}"
                        @else
                            value="{{ $aes->encrypt($subject->id) }}"
                        @endif
                    @endif
                    @if($type == 2)
                        @if($subject->strand == 1)
                            value="{{ $aes->encrypt($subject->id) }}"
                        @else
                            value="{{ $aes->encrypt($subject->id) }}"
                        @endif
                    @endif
                @endif
                @if(Auth::user()->schoolType == 3)
                    @if($subject->strand == 1)
                        value="{{ $aes->encrypt($subject->id) }}"
                    @else
                        value="{{ $aes->encrypt($subject->id) }}"
                    @endif
                @endif
                
                class="form-control" required>

                <input type="hidden" name="type2" 
                
                
                @if(Auth::user()->schoolType == 2)
                    @if($type == 1)
                        @if($subject->tve_tle == 1)
                            value="1"
                        @else
                            value="0"
                        @endif
                    @endif
                    @if($type == 2)
                        @if($subject->strand == 1)
                            value="1"
                        @else
                            value="0"
                        @endif
                    @endif
                @endif
                @if(Auth::user()->schoolType == 3)
                    @if($subject->strand == 1)
                        value="1"
                    @else
                        value="0"
                    @endif
                @endif
                
                class="form-control" required>

                <input type="hidden" name="type" class="form-control" value="{{ $type }}" required>
                <input type="hidden" name="promedID" id="promedID" class="form-control" required>
                <input type="hidden" name="status" id="status" class="form-control" required>

                    <div class="row">
                        <div class="col-md-12">
                            <label for="">Section</label>
                            <input type="text" name="section" id="section" class="form-control" required>
                        </div>
                        <div class="col-md-4">
                            <label for="">MPS</label>
                            <input type="number" name="mps" id="mps" class="form-control" step="0.01" min="0" required>
                        </div>
                        <div class="col-md-4">
                            <label for="">No of Students</label>
                            <input type="number" name="students" id="students" class="form-control" step="1" min="0" required>
                        </div>
                        <div class="col-md-4">
                            <label for="">Outstanding (98-100)</label>
                            <input type="number" name="out1" id="out1" class="form-control" step="1" min="0" required>
                        </div>
                        <div class="col-md-4">
                            <label for="">Outstanding (95-97)</label>
                            <input type="number" name="out2" id="out2" class="form-control" step="1" min="0" required>
                        </div>
                        <div class="col-md-4">
                            <label for="">Outstanding (90-94)</label>
                            <input type="number" name="out3" id="out3" class="form-control" step="1" min="0" required>
                        </div>
                        <div class="col-md-4">
                            <label for="">Very Satisfactory (85-89)</label>
                            <input type="number" name="very" id="very" class="form-control" step="1" min="0" required>
                        </div>
                        <div class="col-md-6">
                            <label for="">Satisfactory (80-84)</label>
                            <input type="number" name="sat" id="sat" class="form-control" step="1" min="0" required>
                        </div>
                        <div class="col-md-6">
                            <label for="">Fairly Satisfactory (75-79)</label>
                            <input type="number" name="fair" id="fair" class="form-control" step="1" min="0" required>
                        </div>
                        <div class="col-md-6">
                            <label for="">Did not meet Expectation (Below 75)</label>
                            <input type="number" name="didnot" id="didnot" class="form-control" step="1" min="0" required>
                        </div>
                        <div class="col-md-6">
                            <label for="">At risk falling in the next Quarter</label>
                            <input type="number" name="atrisk" id="atrisk" class="form-control" step="1" min="0" required>
                        </div>
                        <div class="col-md-12">
                            <label for="">Average computed grade for the Quarter</label>
                            <input type="number" name="average" id="average" class="form-control" step="0.01" min="0" required>
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
