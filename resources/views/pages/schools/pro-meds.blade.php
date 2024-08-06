@php
    use Illuminate\Support\Str;
    use App\Http\Controllers\AESCipher;
    $aes = new AESCipher();
@endphp


@extends('modals.schools.create-promeds-modal')
@extends('modals.schools.select-teacher-modal')
@extends('modals.schools.update.edit-promeds-modal')
@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'PRO-MEDS'])
    <div class="container-fluid py-4">
        
        <div class="row">
            <div class="col-md-12">
                <div class="card border-radius-md">
                    <div class="card-header">
                        <p class="mb-0 text-sm">Grade Level: <b id="year-level">{{ $subject->yearLevel }}</b></p>
                        <p class="text-sm">Subject: 
                            @if(Auth::user()->schoolType == 1)
                            <b id="subject-name">{{ $subject->ElementarySubjects->subject }}</b>
                            @endif
                            @if(Auth::user()->schoolType == 2)
                                @if($type == 1)
                                    @if($subject->tve_tle == 1)
                                        <b id="subject-name">{{ $subject->TLETVESubjects->subject }}</b>
                                    @else
                                        <b id="subject-name">{{ $subject->HighSchoolSubjects->subject }}</b>
                                    @endif
                                @endif
                                @if($type == 2)
                                    @if($subject->strand == 1)
                                        <b id="subject-name">{{ $subject->Strands->subject }}</b>
                                    @else
                                        <b id="subject-name">{{ $subject->SeniorHighSchoolSubjects->subject }}</b>
                                    @endif
                                @endif
                            @endif
                            @if(Auth::user()->schoolType == 3)
                                @if($subject->strand == 1)
                                    <b id="subject-name">{{ $subject->Strands->subject }}</b>
                                @else
                                    <b id="subject-name">{{ $subject->SeniorHighSchoolSubjects->subject }}</b>
                                @endif
                            @endif
                        </p>
                        <hr class="mb-0">
                    </div>
                    <div class="card-body">
                        @include('data.schools.promeds')
                    </div>
                </div>
            </div>
        </div>
           
    
        @include('layouts.footers.auth.footer')
    </div>
@endsection

