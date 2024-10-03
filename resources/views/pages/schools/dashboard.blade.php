@php
    use Illuminate\Support\Str;
    use App\Http\Controllers\AESCipher;
    $aes = new AESCipher();
@endphp

@extends('modals.schools.update.edit-elementary-subject-mps')
@extends('modals.schools.update.edit-high-school-subject-mps')
@extends('modals.schools.update.edit-senior-high-school-subject-mps')
@extends('modals.schools.update.edit-elementary-total-students')
@extends('modals.schools.update.edit-high-school-total-students')
@extends('modals.schools.update.edit-senior-high-school-total-students')

@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Dashboard'])
    <div class="container-fluid py-4">
        
            @if(Auth::user()->schoolType == 1)

            <form action="" id="search-elementary-school">
                @csrf
                <div class="row">
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
                                <h5 class="mb-2 text-sm text-dark"><span class="me-1" style="vertical-align: middle;">
                                    <lord-icon
                                        src="https://cdn.lordicon.com/zsaomnmb.json"
                                        trigger="in"
                                        state="in-growth"
                                        delay="0"
                                        style="width:20px;height:20px;">
                                    </lord-icon>
                                </span>
                                PRO MEDS & MPS</h5>
                            </div>
                        </div>
                    </div>
    
                    <hr class="mx-4 mb-0">
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-4">
                            @include('data.schools.elementary-schools-mps')
                        </div>
                    </div>
                </div>
            </div>
            
            @endif

            @if(Auth::user()->schoolType == 2 || Auth::user()->schoolType == 3)
            <form action="" id="search-high-school">
                @csrf
                <div class="row">
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
                                    PRO MEDS & MPS</h5> <small class="text-danger">Select subject to view data</small>
                            </div>
                        </div>
                    </div>
    
                    <hr class="mx-4 mb-0">
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-4">
                            @include('data.schools.high-schools-mps')
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
                            @include('data.schools.senior-high-schools-mps')
                        </div>
                    </div>
                </div>
            </div>
            
            @endif
    
        @include('layouts.footers.auth.footer')
    </div>
@endsection

