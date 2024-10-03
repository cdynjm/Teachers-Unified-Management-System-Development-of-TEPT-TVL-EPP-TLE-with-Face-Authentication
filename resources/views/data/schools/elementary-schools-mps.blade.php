<table class="table align-items-center mb-0" id="elementary-school-mps-data-result">
    <thead>
        <tr>
            <th class="text-start text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                Subject</th>
             
            
        </tr>
    </thead>
    <tbody>
       @foreach ($elementaryMPS->groupBy('yearLevel') as $yearLevel => $subjects)
       <tr>
           <td colspan="7" class="fw-bolder bg-gray-200"
           
           schoolID="{{ $aes->encrypt($subjects->first()->schoolID) }}"
           yearLevel="{{ $yearLevel }}"
           students="{{ $subjects->first()->students }}"

           >
            
            Grade {{ $yearLevel }}
        </td>
       </tr>
       @foreach ($subjects as $index => $sub)
           <tr>
               <td class="text-sm"
               
               id="{{ $aes->encrypt($sub->id) }}"
               schoolID="{{ $aes->encrypt($sub->schoolID) }}"
               yearLevel="{{ $yearLevel }}"
               subject="{{ $sub->ElementarySubjects->subject }}"
              

               >
                   <a wire:navigate href="{{ route('pro-meds', ['id' => $aes->encrypt($sub->id), 'type' => 0, 'type2' => 0]) }}" class="ms-3 text-sm fw-bolder mb-0">{{ $sub->ElementarySubjects->subject }}</a>
               </td>
               
               
           </tr>
        @endforeach

        <tr>
            <td colspan="7">
                <div id="elem-chart-{{ $loop->index }}"></div>
            </td>
        </tr>

    @endforeach
    </tbody>
</table>