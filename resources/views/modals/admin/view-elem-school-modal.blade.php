<!-- The Modal -->
<div class="modal fade" id="viewElemSchoolModal" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content border-radius-md">
            <div class="modal-header">
                <h5 class="modal-title">Select</h5>
                <button type="button" class="btn-close bg-dark" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                
                <form action="" id="search-elementary-school">
                    <input type="hidden" id="elem-school-id" name="school">
                    <input type="hidden" id="elem-school-year" name="year">
                    
                    <button class="bg-white border-0 text-sm mb-2">
                        <span class="" style="vertical-align: middle;">
                            <lord-icon
                                src="https://cdn.lordicon.com/zsaomnmb.json"
                                trigger="in"
                                state="in-growth"
                                delay="0"
                                style="width:40px;height:40px;">
                            </lord-icon>
                        </span>
                        School PROMEDS</button> 
                </form>

                <form action="" id="search-elementary-school-teachers">
                    <input type="hidden" id="elem-school-teachers-id" name="school">
                    <input type="hidden" name="path" value="1">
                    <button class="bg-white border-0 text-sm mb-2">
                        <span class="" style="vertical-align: middle;">
                            <lord-icon
                                src="https://cdn.lordicon.com/xcxzayqr.json"
                                trigger="in"
                                delay="0"
                                state="in-reveal"
                                colors="primary:#2516c7,secondary:#ffc738"
                                style="width:40px;height:40px;">
                            </lord-icon>
                        </span>
                        School Teachers</button>
                </form>
                    
                <a wire:navigate href="{{ route('school-documents', ['school' => ':id', 'type' => '1']) }}" class="bg-white border-0 text-sm mb-2 ms-1" id="elem-school-documents-link">
                    <span class="me-1" style="vertical-align: middle;">
                        <lord-icon
                            src="https://cdn.lordicon.com/bgitlnnj.json"
                            trigger="in"
                            delay="0"
                            style="width:40px;height:40px;">
                        </lord-icon>
                    </span>
                    Documents
                </a>
               
            </div>
        </div>
    </div>
</div> 
