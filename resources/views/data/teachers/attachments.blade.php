<div id="attacments-data-result" class="mt-4">
    <ul class="list-unstyled">
    @php
        $count = false;
    @endphp
    @foreach ($attachments as $at)
       
        <li class="mb-4" data-value="{{ $aes->encrypt($at->id) }}">
            <span class="ms-3" style="vertical-align: middle;">
                <lord-icon
                    src="https://cdn.lordicon.com/yqiuuheo.json"
                    trigger="in"
                    delay="0"
                    state="in-unfold"
                    colors="primary:#ffffff,secondary:#66d7ee"
                    style="width:25px;height:25px">
                </lord-icon>
            </span>
            <a class="text-sm fw-bold" href="{{ asset('storage/attachments/'.$at->filename) }}" target="_blank">
                {{ $at->filename }}
                <div class="text-xs fw-normal">Date Submitted: {{ date('M. d, Y | h:i a', strtotime($at->created_at)) }}</div>
            </a>
            <div class="text-sm mt-2"><a href="javascript:;" class="text-danger" id="delete-attachment"><i class="fas fa-times"></i> Remove</a></div>
        </li>
        @php
            $count = true;
        @endphp
    @endforeach
    @if ($count == false)
        <span class="text-danger text-sm">
            <span class="ms-3" style="vertical-align: middle;">
                <lord-icon
                    src="https://cdn.lordicon.com/akqsdstj.json"
                    trigger="in"
                    state="in-reveal"
                    colors="primary:#e83a30,secondary:#ffffff"
                    style="width:30px;height:30px">
                </lord-icon>
            </span>
            No Submissions Yet</span>
    @endif
    </ul>
</div>
