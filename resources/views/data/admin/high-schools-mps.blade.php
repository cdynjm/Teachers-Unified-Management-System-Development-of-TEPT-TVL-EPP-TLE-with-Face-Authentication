<table class="table align-items-center mb-0" id="high-school-mps-data-result">
    <thead>
        <tr>
            <th class="text-start text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                Subject</th>  
           
        </tr>
    </thead>
    <tbody>
       @foreach ($highSchoolMPS->groupBy('yearLevel') as $yearLevel => $subjects)
       <tr>
        <td colspan="7" class="fw-bolder bg-gray-200">Grade {{ $yearLevel }}</td>
        </tr>
       @foreach ($subjects as $index => $sub)
           <tr>
              <td class="text-sm">
                    @if($sub->tve_tle == 1)
                    <a wire:navigate href="{{ route('admin.promeds', ['id' => $aes->encrypt($sub->id), 'type' => 1, 'type2' => 1, 'schoolType' => 2]) }}" class="ms-3 text-sm fw-bolder mb-0">
                        {{ $sub->TLETVESubjects->subject }}
                    </a>
                    @else
                    <a wire:navigate href="{{ route('admin.promeds', ['id' => $aes->encrypt($sub->id), 'type' => 1, 'type2' => 0, 'schoolType' => 2]) }}" class="ms-3 text-sm fw-bolder mb-0">
                        {{ $sub->HighSchoolSubjects->subject }}
                    </a>
                    @endif
                </a>
               </td>
           </tr>
        @endforeach

    @endforeach
    </tbody>
</table>