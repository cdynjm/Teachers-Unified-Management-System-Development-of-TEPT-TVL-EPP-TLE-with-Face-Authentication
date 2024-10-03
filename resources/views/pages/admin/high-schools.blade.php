@php
    use Illuminate\Support\Str;
    use App\Http\Controllers\AESCipher;
    $aes = new AESCipher();
@endphp

@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'High Schools'])
    <div class="container-fluid py-4">
        <form action="" id="search-high-school">
            @csrf
            <div class="row">
                <div class="col-md-4">
                    <p class="ms-1 mb-0 fw-bolder">High Schools</p>
                    <label for="" class="fw-normal">Select school to display records</label>
                    <select name="school" class="form-select" required>
                        <option value="">Select...</option>
                        @foreach ($highSchools->sortBy('school') as $sc)
                            <option value="{{ $aes->encrypt($sc->id) }}" 
                                @if(Session::get('highSchool') == $aes->encrypt($sc->id)) 
                                    selected 
                                @endif
                                >{{ $sc->school }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <p class="ms-1 mb-0 fw-bolder">School Year</p>
                    <label for="" class="fw-normal">Select year to display records</label>
                    <select name="year" class="form-select" required>
                        <option value="">Select...</option>
                        @foreach ($schoolYear as $sy)
                            <option value="{{ $sy->fromYear }}-{{ $sy->toYear }}" 
                                @if(Session::get('year') == $sy->fromYear."-".$sy->toYear)
                                    selected
                                @endif>
                                {{ $sy->fromYear }}-{{ $sy->toYear }}</option>
                        @endforeach
                    
                    </select>
                </div>
                <div class="col-md-4">
                    <button class="search-button btn bg-dark text-white"><i class="fa-solid fa-magnifying-glass"></i></button>
                </div>
            </div>
        </form>

        <div class="col-md-12 mt-2">
            <div class="card border-radius-md">
                <div class="card-header pb-0">
                    <div class="d-flex flex-row justify-content-between">
                        <div>
                            <h5 class="mb-2 text-sm text-dark">
                                <span class="me-1" style="vertical-align: middle;">
                                    <lord-icon
                                        src="https://cdn.lordicon.com/zsaomnmb.json"
                                        trigger="in"
                                        state="in-growth"
                                        delay="0"
                                        style="width:20px;height:20px;">
                                    </lord-icon>
                                </span>
                                @if(!empty(Session::get('highSchool')))
                                    @foreach (Session::get('highSchoolMPS') as $sc)
                                        {{ $sc->HighSchools->school }} -
                                    @break
                                    @endforeach
                                @endif
                                PRO MEDS & MPS</h5> <small class="text-danger">Select subject to view data</small>
                        </div>
                    </div>
                </div>

                <hr class="mx-4 mb-0">
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-4">
                        @if(!empty(Session::get('highSchool')))
                            @include('data.admin.high-schools-mps')
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12 mt-4">
            <div class="card border-radius-md">
                <div class="card-header pb-0">
                    <div class="d-flex flex-row justify-content-between">
                        <div>
                            <h5 class="mb-2 text-sm text-dark">
                                <span class="me-1" style="vertical-align: middle;">
                                    <lord-icon
                                        src="https://cdn.lordicon.com/zsaomnmb.json"
                                        trigger="in"
                                        state="in-growth"
                                        delay="0"
                                        style="width:20px;height:20px;">
                                    </lord-icon>
                                </span>
                                Senior High School PRO MEDS & MPS</h5> <small class="text-danger">Select subject to view data</small>
                        </div>
                    </div>
                </div>

                <hr class="mx-4 mb-0">
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-4">
                        @if(!empty(Session::get('highSchool')))
                            @include('data.admin.senior-high-schools-mps')
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.footers.auth.footer')
    </div>
@endsection
