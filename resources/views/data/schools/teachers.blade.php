<table class="table align-items-center mb-0" id="teachers-data-result">
    <thead>
        <tr>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" width="5%">
                #</th>
            <th class="text-start text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                Teacher</th>
            <th class="text-start text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                Position/Rank</th>
            <th
                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                Actions</th>
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
                picture="{{ $tc->picture }}"
                
                @if(Auth::user()->schoolType == 1)
                    schoolID={{ $aes->encrypt($tc->elemSchoolID) }}
                @endif

                @if(Auth::user()->schoolType == 2 || Auth::user()->schoolType == 3)
                    schoolID={{ $aes->encrypt($tc->highSchoolID) }}
                @endif

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
                <td class="text-center">
                    <a href="javascript:;" id="edit-teacher" class="text-secondary font-weight-bold text-xs me-2"
                        data-toggle="tooltip">
                        <i class="fas fa-pen-alt text-sm"></i>
                    </a>
                    <a href="javascript:;" id="delete-teacher" class="text-secondary font-weight-bold text-xs"
                        data-toggle="tooltip">
                        <i class="fas fa-trash-alt text-sm"></i>
                    </a>
                </td>
            </tr>
            @php
                $cnt += 1;
            @endphp
        @endforeach
    </tbody>
</table>