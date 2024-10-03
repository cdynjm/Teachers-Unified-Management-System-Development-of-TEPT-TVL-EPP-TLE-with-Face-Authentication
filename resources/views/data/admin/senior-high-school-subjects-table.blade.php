<table class="table align-items-center mb-0" id="senior-high-school-subject-data-result">
    <thead>
        <tr>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" width="5%">
                #</th>
            <th class="text-start text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                Subject Name</th>
            <th class="text-start text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                Semester</th>
            <th
                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                Actions</th>
        </tr>
    </thead>
    <tbody>
       @php
           $cnt = 1;
       @endphp
        <tr>
            <td colspan="4" class="fw-bolder bg-gray-200">Grade 11</td>
        </tr>
       @foreach ($seniorHighSchoolSubjects->sortBy('subject') as $sub)
            @if($sub->yearLevel == 11)
           <tr>
                <td class="text-center text-sm"
                
                id="{{ $aes->encrypt($sub->id) }}"
                subject="{{ $sub->subject }}"
                yearLevel="{{ $sub->yearLevel }}"
                semester="{{ $sub->semester }}"
                
                >
                    <p class="ms-3 text-sm">{{ $cnt }}</p>
                </td>
                <td class="text-sm">
                    <p class="ms-3 text-sm fw-bolder mb-0">{{ $sub->subject }}</p>
                </td>
                <td class="text-sm">
                    @if($sub->semester == 1)
                        <p class="ms-3 text-sm fw-bolder mb-0">1st Semester</p>
                    @endif
                    @if($sub->semester == 2)
                        <p class="ms-3 text-sm fw-bolder mb-0">2nd Semester</p>
                    @endif
                </td>
                <td class="text-center">
                    <a href="javascript:;" id="edit-senior-high-school-subject" class="text-secondary font-weight-bold text-xs me-2"
                        data-toggle="tooltip">
                        <i class="fas fa-pen-alt text-sm"></i>
                    </a>
                    <a href="javascript:;" id="delete-senior-high-school-subject" class="text-secondary font-weight-bold text-xs"
                        data-toggle="tooltip">
                        <i class="fas fa-trash-alt text-sm"></i>
                    </a>
                </td>
           </tr>
            @php
                $cnt += 1;
            @endphp
           @endif
       @endforeach

       @php
           $cnt = 1;
       @endphp
        <tr>
            <td colspan="4" class="
            fw-bolder bg-gray-200">Grade 12</td>
        </tr>
       @foreach ($seniorHighSchoolSubjects->sortBy('subject') as $sub)
            @if($sub->yearLevel == 12)
           <tr>
                <td class="text-center text-sm"
                
                id="{{ $aes->encrypt($sub->id) }}"
                subject="{{ $sub->subject }}"
                yearLevel="{{ $sub->yearLevel }}"
                semester="{{ $sub->semester }}"
                
                >
                    <p class="ms-3 text-sm">{{ $cnt }}</p>
                </td>
                <td class="text-sm">
                    <p class="ms-3 text-sm fw-bolder mb-0">{{ $sub->subject }}</p>
                </td>
                <td class="text-sm">
                    @if($sub->semester == 1)
                        <p class="ms-3 text-sm fw-bolder mb-0">1st Semester</p>
                    @endif
                    @if($sub->semester == 2)
                        <p class="ms-3 text-sm fw-bolder mb-0">2nd Semester</p>
                    @endif
                </td>
                <td class="text-center">
                    <a href="javascript:;" id="edit-senior-high-school-subject" class="text-secondary font-weight-bold text-xs me-2"
                        data-toggle="tooltip">
                        <i class="fas fa-pen-alt text-sm"></i>
                    </a>
                    <a href="javascript:;" id="delete-senior-high-school-subject" class="text-secondary font-weight-bold text-xs"
                        data-toggle="tooltip">
                        <i class="fas fa-trash-alt text-sm"></i>
                    </a>
                </td>
           </tr>
            @php
                $cnt += 1;
            @endphp
           @endif
       @endforeach
    </tbody>
</table>