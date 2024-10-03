<table class="table align-items-center mb-0" id="">
    <thead>
        <tr>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" width="5%">
                #</th>
            <th class="text-start text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                Teacher</th>
            <th class="text-start text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                Position/Rank</th>
        </tr>
    </thead>
    <tbody>
        @php
            $cnt = 1;
        @endphp
        @foreach ($teachers as $tc)
            <tr>
                <td class="text-center text-sm"
                
                id="{{ $aes->encrypt($tc->id) }}"
                position="{{ $aes->encrypt($tc->position) }}" 
                teacher="{{ $tc->teacher }}" 
                email="{{ $tc->User->email }}" 
                highSchool={{ $aes->encrypt($tc->highSchoolID) }}

                >
                    <p class="ms-3 text-sm">{{ $cnt }}</p>
                </td>
                <td class="text-sm">
                    <div class="d-flex px-2 py-1">
                        <div>
                            <img src="{{ asset('/storage/profile/'.$tc->picture) }}" class="avatar avatar-sm me-3" alt="user1">
                        </div>
                        <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">{{ $tc->teacher }}</h6>
                            <p class="text-xs text-secondary mb-0">{{ $tc->User->email }}</p>
                        </div>
                    </div>
                </td>
                <td class="text-sm">
                    @if($tc->position == 1)
                        <p class="ms-3 text-sm fw-bolder mb-0">Teacher</p>
                    @endif
                    @if($tc->position == 2)
                        <p class="ms-3 text-sm fw-bolder mb-0">Principal</p>
                    @endif
                </td>
            </tr>

            @php
                $attachmentsFound = false; 
            @endphp
        
            @foreach ($attachments as $at)
                @if ($at->teacherID == $tc->id)
                    <tr>
                        <td></td>
                        <td>
                            <a class="text-sm ms-6" href="{{ asset('storage/attachments/'.$at->filename) }}" target="_blank">
                                <span class="" style="vertical-align: middle;">
                                    <lord-icon
                                        src="https://cdn.lordicon.com/yqiuuheo.json"
                                        trigger="in"
                                        delay="0"
                                        state="in-unfold"
                                        colors="primary:#ffffff,secondary:#66d7ee"
                                        style="width:25px;height:25px">
                                    </lord-icon>
                                </span>
                                {{ $at->filename }}
                            </a>
                        </td>
                        <td>
                            <span class="text-xs text-success">{{ date('M d, Y | h:i A', strtotime($at->created_at)) }}</span>
                        </td>
                    </tr>
                    @php
                        $attachmentsFound = true;
                    @endphp
                @endif
            @endforeach
        
            @if (!$attachmentsFound)
                <tr>
                    <td></td>
                    <td colspan="2">
                        <span class="text-xs text-danger ms-6">No Attachments Available!</span>
                    </td>
                </tr>
            @endif
            @php
                $cnt += 1;
            @endphp
        @endforeach
    </tbody>
</table>