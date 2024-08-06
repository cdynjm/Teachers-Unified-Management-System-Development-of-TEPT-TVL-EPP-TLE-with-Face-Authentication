@php
    use Illuminate\Support\Str;
    use App\Http\Controllers\AESCipher;
    $aes = new AESCipher();
@endphp

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
                            @if($schoolType == 1)
                            <b>{{ $subject->ElementarySubjects->subject }}</b>
                            @endif
                            @if($schoolType == 2)
                                @if($type == 1)
                                    @if($subject->tve_tle == 1)
                                        <b>{{ $subject->TLETVESubjects->subject }}</b>
                                    @else
                                        <b>{{ $subject->HighSchoolSubjects->subject }}</b>
                                    @endif
                                @endif
                                @if($type == 2)
                                    @if($subject->strand == 1)
                                        <b>{{ $subject->Strands->subject }}</b>
                                    @else
                                        <b>{{ $subject->SeniorHighSchoolSubjects->subject }}</b>
                                    @endif
                                @endif
                            @endif
                            @if($schoolType == 3)
                                @if($subject->strand == 1)
                                    <b>{{ $subject->Strands->subject }}</b>
                                @else
                                    <b>{{ $subject->SeniorHighSchoolSubjects->subject }}</b>
                                @endif
                            @endif
                        </p>
                        <hr class="mb-0">
                    </div>
                    <div class="card-body">
                        @include('data.admin.promeds')
                    </div>
                </div>
            </div>
        </div>
           
    
        @include('layouts.footers.auth.footer')
    </div>
@endsection

