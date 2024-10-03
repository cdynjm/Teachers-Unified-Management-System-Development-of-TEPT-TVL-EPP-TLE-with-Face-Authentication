<table class="table align-items-center mb-0" id="senior-high-school-mps-data-result">
    <thead>
        <tr>
            <th class="text-start text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                Subject</th>
            
        </tr>
    </thead>
    <tbody>
    
       @foreach ($seniorHighSchoolMPS->groupBy('yearLevel') as $yearLevel => $subjects)
       <tr>
        <td colspan="7" class="fw-bolder bg-gray-200">Grade {{ $yearLevel }} </td>
    </tr>
       <tr>
            <td colspan="7" class="fw-bold bg-gray-100 text-sm">1st Semester</td>
        </tr>
       
        @foreach ($subjects as $index => $sub)
            @if($sub->strand == 1)
                @if($sub->Strands->semester == 1 && $sub->Strands->yearLevel == $yearLevel)
                    <tr>
                        <td>
                            <a wire:navigate href="{{ route('admin.promeds', ['id' => $aes->encrypt($sub->id), 'type' => 2, 'type2' => 1, 'schoolType' => 2]) }}" class="ms-3 text-sm fw-bolder mb-0">{{ $sub->Strands->subject }}</a>
                        </td>
                       
                    </tr>
                @endif
                @if($sub->Strands->semester == null && $sub->Strands->yearLevel == $yearLevel)
                    <tr>
                        <td>
                            <a wire:navigate href="{{ route('admin.promeds', ['id' => $aes->encrypt($sub->id), 'type' => 2, 'type2' => 1, 'schoolType' => 2]) }}" class="ms-3 text-sm fw-bolder mb-0">{{ $sub->Strands->subject }}</a>
                        </td>
                        
                    </tr>
                @endif
                @if($sub->Strands->semester == null && $sub->Strands->yearLevel == null)
                    <tr>
                        <td>
                            <a wire:navigate href="{{ route('admin.promeds', ['id' => $aes->encrypt($sub->id), 'type' => 2, 'type2' => 1, 'schoolType' => 2]) }}" class="ms-3 text-sm fw-bolder mb-0">{{ $sub->Strands->subject }}</a>
                        </td>
                        
                    </tr>
                @endif
            @else
                @if($sub->SeniorHighSchoolSubjects->semester == 1 && $sub->SeniorHighSchoolSubjects->yearLevel == $yearLevel)
                    <tr>
                        <td>
                            <a wire:navigate href="{{ route('admin.promeds', ['id' => $aes->encrypt($sub->id), 'type' => 2, 'type2' => 0, 'schoolType' => 2]) }}" class="ms-3 text-sm fw-bolder mb-0">{{ $sub->SeniorHighSchoolSubjects->subject }}</a>
                        </td>
                        
                    </tr>
                @endif
            @endif
        @endforeach
    
        <tr>
            <td colspan="7" class="fw-bold bg-gray-100 text-sm">2nd Semester</td>
        </tr>
        
        @foreach ($subjects as $index => $sub)
            @if($sub->strand == 1)
                @if($sub->Strands->semester == 2 && $sub->Strands->yearLevel == $yearLevel)
                    <tr>
                        <td>
                            <a wire:navigate href="{{ route('admin.promeds', ['id' => $aes->encrypt($sub->id), 'type' => 2, 'type2' => 1, 'schoolType' => 2]) }}" class="ms-3 text-sm fw-bolder mb-0">{{ $sub->Strands->subject }}</a>
                        </td>
                        
                    </tr>
                @endif
                @if($sub->Strands->semester == null && $sub->Strands->yearLevel == $yearLevel)
                <tr>
                    <td>
                        <a wire:navigate href="{{ route('admin.promeds', ['id' => $aes->encrypt($sub->id), 'type' => 2, 'type2' => 1, 'schoolType' => 2]) }}" class="ms-3 text-sm fw-bolder mb-0">{{ $sub->Strands->subject }}</a>
                    </td>
                    
                </tr>
                @endif
                @if($sub->Strands->semester == null && $sub->Strands->yearLevel == null)
                    <tr>
                        <td>
                            <a wire:navigate href="{{ route('admin.promeds', ['id' => $aes->encrypt($sub->id), 'type' => 2, 'type2' => 1, 'schoolType' => 2]) }}" class="ms-3 text-sm fw-bolder mb-0">{{ $sub->Strands->subject }}</a>
                        </td>
                       
                    </tr>
                @endif
            @else
                @if($sub->SeniorHighSchoolSubjects->semester == 2 && $sub->SeniorHighSchoolSubjects->yearLevel == $yearLevel)
                    <tr>
                        <td>
                            <a wire:navigate href="{{ route('admin.promeds', ['id' => $aes->encrypt($sub->id), 'type' => 2, 'type2' => 0, 'schoolType' => 2]) }}" class="ms-3 text-sm fw-bolder mb-0">{{ $sub->SeniorHighSchoolSubjects->subject }}</a>
                        </td>
                        
                    </tr>
                @endif
            @endif

        @endforeach

    @endforeach
    </tbody>
</table>