<table class="table align-items-center mb-0" id="high-school-teachers-data-result">
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
        @foreach ($highSchoolTeachers as $tc)
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
                $cnt += 1;
            @endphp
        @endforeach
    </tbody>
</table>