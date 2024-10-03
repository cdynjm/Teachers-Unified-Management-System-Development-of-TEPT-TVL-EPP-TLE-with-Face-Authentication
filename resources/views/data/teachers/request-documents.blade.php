<table class="table align-items-center mb-0" id="request-documents-data-result">
    <thead>
        <tr>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" width="5%">
                #</th>
            <th class="text-start text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                Description</th>
             <th class="text-start text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                Status</th>
        </tr>
    </thead>
    <tbody>
       @php
           $cnt = 1;
       @endphp

       @foreach ($requestDocuments as $rd)
           <tr>
                <td class="text-center text-sm" id="{{ $aes->encrypt($rd->id) }}">
                    <p class="ms-3 text-sm">{{ $cnt }}</p>
                </td>
                <td class="text-sm text-wrap">
                    <a wire:navigate href="{{ route('view-requested-document', ['id' => $aes->encrypt($rd->id)]) }}?key={{ \Str::random(50) }}">
                        <span class="ms-3" style="vertical-align: middle;">
                            <lord-icon
                                src="https://cdn.lordicon.com/bgitlnnj.json"
                                trigger="in"
                                delay="0"
                                style="width:20px;height:20px;">
                            </lord-icon>
                        </span>
                        <span class="ms-1 text-sm fw-bold">{{ $rd->description }}</span>
                    </a>
                </td>
                
                <td class="text-sm">
                    @if(App\Models\Data\Attachments::where('teacherID', Auth::user()->Teachers->id)
                                        ->where('requestID', $rd->id)
                                        ->count() > 0)
                        <p class="ms-3 text-sm fw-bold mb-0">
                            <span class="ms-3" style="vertical-align: middle;">
                                <lord-icon
                                    src="https://cdn.lordicon.com/guqkthkk.json"
                                    trigger="in"
                                    state="in-reveal"
                                    style="width:25px;height:25px">
                                </lord-icon>
                            </span>
                        </p>
                    @else
                    <p class="ms-3 text-sm fw-bold mb-0">
                        <span class="ms-3" style="vertical-align: middle;">
                            <lord-icon
                                src="https://cdn.lordicon.com/fbzkvbmc.json"
                                trigger="in"
                                state="in-reveal"
                                colors="primary:#ffffff,secondary:#c71f16"
                                style="width:25px;height:25px">
                            </lord-icon>
                        </span>
                    </p>
                    @endif
                </td>
                
           </tr>
           @php
               $cnt += 1;
           @endphp
       @endforeach
    </tbody>
</table>