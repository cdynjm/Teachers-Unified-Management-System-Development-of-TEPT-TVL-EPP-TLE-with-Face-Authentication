@php
    use Illuminate\Support\Str;
    use App\Http\Controllers\AESCipher;
    $aes = new AESCipher();
@endphp

@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Update School'])
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-12 mt-2">
                <div class="card border-radius-md">
                    <div class="card-header pb-0">
                        <div class="d-flex flex-row justify-content-between">
                            <div>
                                <h5 class="mb-2 text-sm text-dark">
                                    Update School Information</h5>
                            </div>
                        </div>
                    </div>
    
                    <hr class="mx-4 mb-0">
                    <div class="card-body px-0 pt-0 pb-2">
                        <form action="" id="update-school">
                            @csrf
                            <input type="hidden" class="form-control" name="schoolLevel" value="{{ $aes->encrypt($type) }}">
                            <input type="hidden" class="form-control" name="id" value="{{ $aes->encrypt($school->id) }}">
                            <div class="row m-4">
                                <div class="col-md-6">
                                    <label for="">School</label>
                                    <input type="text" class="form-control" name="school" value="{{ $school->school }}">
                                
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="">Latitude</label>
                                            <input type="number" class="form-control" step="any" name="latitude" value="{{ $school->latitude }}">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="">Longitude</label>
                                            <input type="number" class="form-control" step="any" name="longitude" value="{{ $school->longitude }}">
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <label for="">Email</label>
                                    <input type="email" name="email" class="form-control" value="{{ $school->User->email }}" required>
                                    
                                    <label for="">Change Password</label>
                                    <input type="password" name="password" class="form-control" value="">

                                </div>

                                <div class="col-md-12">
                                    @if($type == 2)
                                        <div class="row">
                                            <div class="col-md-6">
                                            <p class="mt-3 text-sm">TLE/TVE Offers</p>
                                            @foreach ($TLETVESubjects as $sub)
                                                <div>
                                                    <input type="checkbox" name="tvl_tve[]" value="{{ $aes->encrypt($sub->id) }}"
                                                    
                                                    @foreach ($schoolData as $sd)
                                                        @if($sub->id == $sd->subjectID)
                                                            checked disabled
                                                        @endif
                                                    @endforeach

                                                    >
                                                    <label for="">{{ $sub->subject }}</label>
                                                </div>
                                            @endforeach
                                            </div>
                                            <div class="col-md-6">
                                            <p class="mt-3 text-sm">Senior High School Offers</p>
                                            @foreach ($strandSubjects as $sub)
                                                <div>
                                                    <input type="checkbox" name="strands[]" value="{{ $aes->encrypt($sub->id) }}"
                                                    
                                                    @foreach ($seniorHighSchoolData as $sd)
                                                        @if($sub->id == $sd->subjectID)
                                                            checked disabled
                                                        @endif
                                                    @endforeach

                                                    >
                                                    <label for="">{{ $sub->subject }}</label>
                                                </div>
                                            @endforeach
                                            </div>
                                        </div>
                                    @endif
                                </div>

                                <div class="d-flex justify-content-center mt-4">
                                    <button  class="btn btn-sm bg-dark text-white">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @include('layouts.footers.auth.footer')
    </div>
@endsection