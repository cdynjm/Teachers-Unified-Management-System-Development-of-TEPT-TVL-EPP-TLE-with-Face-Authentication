<table class="table align-items-center mb-0" id="high-school-data-result">
    <thead>
        <tr>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" width="5%">
                #</th>
            <th class="text-start text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                School Name</th>
            <th
                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                Actions</th>
        </tr>
    </thead>
    <tbody>
       @php
           $cnt = 1;
       @endphp

       @foreach ($highSchools->sortBy('school') as $sc)
           <tr>
                <td class="text-center text-sm" id="{{ $aes->encrypt($sc->id) }}" school="{{ $aes->encrypt(2) }}">
                    <p class="ms-3 text-sm">{{ $cnt }}</p>
                </td>
                <td class="text-sm">
                    <p class="ms-3 text-sm fw-bolder mb-0">{{ $sc->school }}</p>
                </td>
                <td class="text-center">
                    <a wire:navigate href="{{ route('edit-school', ['school' => $aes->encrypt(2), 'id' => $aes->encrypt($sc->id)]) }}?key={{ \Str::random(50) }}" class="text-secondary font-weight-bold text-xs me-2"
                        data-toggle="tooltip">
                        <i class="fas fa-pen-alt text-sm"></i>
                    </a>
                    <a href="javascript:;" id="delete-school" class="text-secondary font-weight-bold text-xs"
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