<table class="table align-items-center mb-0" id="tle-tve-subject-data-result">
    <thead>
        <tr>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" width="5%">
                #</th>
            <th class="text-start text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                Subject Name</th>
            <th
                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                Actions</th>
        </tr>
    </thead>
    <tbody>
       @php
           $cnt = 1;
       @endphp

       @foreach ($TLETVESubjects->sortBy('subject') as $sub)
           <tr>
                <td class="text-center text-sm"
                
                id="{{ $aes->encrypt($sub->id) }}"
                subject="{{ $sub->subject }}" 
                
                >
                    <p class="ms-3 text-sm">{{ $cnt }}</p>
                </td>
                <td class="text-sm">
                    <p class="ms-3 text-sm fw-bolder mb-0">{{ $sub->subject }}</p>
                </td>
                <td class="text-center">
                    <a href="javascript:;" id="edit-tle-tve-subject" class="text-secondary font-weight-bold text-xs me-2"
                        data-toggle="tooltip">
                        <i class="fas fa-pen-alt text-sm"></i>
                    </a>
                    <a href="javascript:;" id="delete-tle-tve-subject" class="text-secondary font-weight-bold text-xs"
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