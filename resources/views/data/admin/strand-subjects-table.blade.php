<table class="table align-items-center mb-0" id="strand-subject-data-result">
    <thead>
        <tr>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" width="5%">
                #</th>
            <th class="text-start text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                Subject Name</th>
            <th class="text-start text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                Year Level</th> 
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
        <td colspan="5" class="fw-bolder bg-gray-200">By Semester</td>
    </tr>
       @foreach ($strandSubjects->sortBy('subject') as $sub)
        @if($sub->yearLevel != null && $sub->semester != null)
           <tr>
                <td class="text-center text-sm"
                
                id="{{ $aes->encrypt($sub->id) }}"
                subject="{{ $sub->subject }}"
                yearLevel="{{ $sub->yearLevel }}"
                semester="{{ $sub->semester }}"
                yearOffered="1" 

                >
                    <p class="ms-3 text-sm">{{ $cnt }}</p>
                </td>
                <td class="text-sm">
                    <p class="ms-3 text-sm fw-bolder mb-0">{{ $sub->subject }}</p>
                </td>
                <td class="text-sm">
                    @if($sub->yearLevel == 11)
                        <p class="ms-3 text-sm fw-bolder mb-0">Grade 11</p>
                    @endif
                    @if($sub->yearLevel == 12)
                        <p class="ms-3 text-sm fw-bolder mb-0">Grade 12</p>
                    @endif
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
                    <a href="javascript:;" id="edit-strand-subject" class="text-secondary font-weight-bold text-xs me-2"
                        data-toggle="tooltip">
                        <i class="fas fa-pen-alt text-sm"></i>
                    </a>
                    <a href="javascript:;" id="delete-strand-subject" class="text-secondary font-weight-bold text-xs"
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
            <td colspan="5" class="fw-bolder bg-gray-200">1 year</td>
        </tr>
        @foreach ($strandSubjects->sortBy('subject') as $sub)
            @if($sub->yearLevel != null && $sub->semester == null)
            <tr>
                    <td class="text-center text-sm"

                    id="{{ $aes->encrypt($sub->id) }}"
                    subject="{{ $sub->subject }}"
                    yearLevel="{{ $sub->yearLevel }}"
                    semester="{{ $sub->semester }}"
                    yearOffered="2"

                    >
                        <p class="ms-3 text-sm">{{ $cnt }}</p>
                    </td>
                    <td class="text-sm">
                        <p class="ms-3 text-sm fw-bolder mb-0">{{ $sub->subject }}</p>
                    </td>
                    <td class="text-sm">
                        @if($sub->yearLevel == 11)
                            <p class="ms-3 text-sm fw-bolder mb-0">Grade 11</p>
                        @endif
                        @if($sub->yearLevel == 12)
                            <p class="ms-3 text-sm fw-bolder mb-0">Grade 12</p>
                        @endif
                    </td>
                    <td class="text-sm">
                        <p class="ms-3 text-sm fw-bolder mb-0">-</p>
                    </td>
                    <td class="text-center">
                        <a href="javascript:;" id="edit-strand-subject" class="text-secondary font-weight-bold text-xs me-2"
                            data-toggle="tooltip">
                            <i class="fas fa-pen-alt text-sm"></i>
                        </a>
                        <a href="javascript:;" id="delete-strand-subject" class="text-secondary font-weight-bold text-xs"
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
            <td colspan="5" class="fw-bolder bg-gray-200">2 years</td>
        </tr>
        @foreach ($strandSubjects->sortBy('subject') as $sub)
            @if($sub->yearLevel == null && $sub->semester == null)
            <tr>
                    <td class="text-center text-sm"

                    id="{{ $aes->encrypt($sub->id) }}"
                    subject="{{ $sub->subject }}"
                    yearLevel="{{ $sub->yearLevel }}"
                    semester="{{ $sub->semester }}"
                    yearOffered="3"

                    >
                        <p class="ms-3 text-sm">{{ $cnt }}</p>
                    </td>
                    <td class="text-sm">
                        <p class="ms-3 text-sm fw-bolder mb-0">{{ $sub->subject }}</p>
                    </td>
                    <td class="text-sm">
                        <p class="ms-3 text-sm fw-bolder mb-0">Grade 11 - 12</p>
                    </td>
                    <td class="text-sm">
                        <p class="ms-3 text-sm fw-bolder mb-0">-</p>
                    </td>
                    <td class="text-center">
                        <a href="javascript:;" id="edit-strand-subject" class="text-secondary font-weight-bold text-xs me-2"
                            data-toggle="tooltip">
                            <i class="fas fa-pen-alt text-sm"></i>
                        </a>
                        <a href="javascript:;" id="delete-strand-subject" class="text-secondary font-weight-bold text-xs"
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