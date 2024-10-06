@php
    use Illuminate\Support\Str;
    use App\Http\Controllers\AESCipher;
    $aes = new AESCipher();
@endphp

@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'View Documents'])
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-radius-md">
                    
                    <div class="card-header pb-0">
                        <div class="d-flex flex-row justify-content-between">
                            <div>
                                <h5 class="mb-2 text-sm text-dark">
                                    <span class="" style="vertical-align: middle;">
                                        <lord-icon
                                            src="https://cdn.lordicon.com/bgitlnnj.json"
                                            trigger="in"
                                            delay="0"
                                            style="width:20px;height:20px;">
                                        </lord-icon>
                                    </span>
                                    {{ $requestedDocument->description }} | 
                                    @if($requestedDocument->position == 1)
                                        <span class="text-sm fw-bolder text-danger">For All Teachers Only</span>
                                    @endif
                                    @if($requestedDocument->position == 2)
                                        <span class="text-sm fw-bolder text-danger">For All Principals Only</span>
                                    @endif
                                    @if($requestedDocument->position == 3)
                                        <span class="text-sm fw-bolder text-danger">For All</span>
                                    @endif
                                </h5>
                            </div>
                        </div>
                    </div>

                    <hr class="mx-4 mb-0">
                    <div class="container-fluid px-4 mt-2 mb-0">
                        <form action="" id="search-elementary-school-teachers">
                            @csrf
                            <input type="hidden" name="path" value="2">
                            <div class="row">
                                <div class="col-md-4">
                                    <p class="ms-1 mb-0 fw-bolder">Elementary Schools</p>
                                    <label for="" class="fw-normal">Select school to display records</label>
                                    <select name="school" class="form-select" required>
                                        <option value="">Select...</option>
                                        @foreach ($elementarySchools->sortBy('school') as $sc)
                                            <option value="{{ $aes->encrypt($sc->id) }}" 
                                                @if(Session::get('elementaryTeacher') == $aes->encrypt($sc->id)) 
                                                    selected 
                                                @endif
                                                >{{ $sc->school }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <button class="search-button btn bg-dark text-white"><i class="fa-solid fa-magnifying-glass"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                    
                    <div class="card-body px-0 pt-0 pb-2 mt-0">
                        <div class="table-responsive p-4">
                            @if(!empty(Session::get('elementaryTeacher')))
                                @include('data.admin.elementary-teachers-documents')
                            @endif
                        </div>
                    </div>

                    <hr class="mx-4 mb-0">
                    <div class="container-fluid px-4 mt-2">
                        <form action="" id="search-high-school-teachers">
                            @csrf
                            <input type="hidden" name="path" value="2">
                            <div class="row">
                                <div class="col-md-4">
                                    <p class="ms-1 mb-0 fw-bolder">High Schools</p>
                                    <label for="" class="fw-normal">Select school to display records</label>
                                    <select name="school" class="form-select" required>
                                        <option value="">Select...</option>
                                        @foreach ($highSchools->sortBy('school') as $sc)
                                            <option value="{{ $aes->encrypt($sc->id) }}" 
                                                @if(Session::get('highSchoolTeacher') == $aes->encrypt($sc->id)) 
                                                    selected 
                                                @endif
                                                >{{ $sc->school }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <button class="search-button btn bg-dark text-white"><i class="fa-solid fa-magnifying-glass"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-4">
                            @if(!empty(Session::get('highSchoolTeacher')))
                                @include('data.admin.high-school-teachers-documents')
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @include('layouts.footers.auth.footer')
    </div>
@endsection