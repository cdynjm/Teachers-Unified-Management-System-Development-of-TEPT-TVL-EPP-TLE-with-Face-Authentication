<table class="table align-items-center mb-0" id="request-documents-data-result">
    <thead>
        <tr>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" width="5%">
                #</th>
            <th class="text-start text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                Description</th>
             <th class="text-start text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                For</th>
        </tr>
    </thead>
    <tbody>
       @php
           $cnt = 1;
       @endphp

       @foreach ($requestDocuments as $rd)
           <tr>
                <td class="text-center text-sm" 

                id="{{ $aes->encrypt($rd->id) }}"
                description="{{ $rd->description }}"
                position="{{ $aes->encrypt($rd->position) }}"
                
                >
                    <p class="ms-3 text-sm">{{ $cnt }}</p>
                </td>
                <td class="text-sm text-wrap">
                    <a wire:navigate href="{{ route('school-view-documents', ['id' => $aes->encrypt($rd->id), 'school' => $aes->encrypt($school->id), 'type' => $type]) }}?key={{ \Str::random(50) }}">
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
                    @if($rd->position == 1)
                        <p class="ms-3 text-sm fw-bold mb-0">School Teachers</p>
                    @endif
                    @if($rd->position == 2)
                        <p class="ms-3 text-sm fw-bold mb-0">School Principals</p>
                    @endif
                    @if($rd->position == 3)
                        <p class="ms-3 text-sm fw-bold mb-0">All</p>
                    @endif
                </td>
           </tr>
           @php
               $cnt += 1;
           @endphp
       @endforeach
    </tbody>
</table>