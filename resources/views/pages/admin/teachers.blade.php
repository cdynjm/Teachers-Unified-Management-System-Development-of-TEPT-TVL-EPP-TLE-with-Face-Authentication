@php
    use Illuminate\Support\Str;
    use App\Http\Controllers\AESCipher;
    $aes = new AESCipher();
@endphp

@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Teachers'])
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-radius-md">
                    
                    <div class="card-header pb-0">
                        <div class="d-flex flex-row justify-content-between">
                            <div>
                                <h5 class="mb-2 text-sm text-dark">
                                    <span class="me-1" style="vertical-align: middle;">
                                        <lord-icon
                                            src="https://cdn.lordicon.com/xcxzayqr.json"
                                            trigger="in"
                                            delay="0"
                                            state="in-reveal"
                                            colors="primary:#2516c7,secondary:#ffc738"
                                            style="width:20px;height:20px">
                                        </lord-icon>
                                    </span>
                                    List of Teachers</h5>
                            </div>
                        </div>
                    </div>

                    <hr class="mx-4 mb-0">
                    <div class="container-fluid px-4 mt-2 mb-0">
                        <form action="" id="search-elementary-school-teachers">
                            @csrf
                            <input type="hidden" name="path" value="1">
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
                                @include('data.admin.elementary-teachers')
                            @endif
                        </div>
                    </div>

                    <hr class="mx-4 mb-0">
                    <div class="container-fluid px-4 mt-2">
                        <form action="" id="search-high-school-teachers">
                            @csrf
                            <input type="hidden" name="path" value="1">
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
                                @include('data.admin.high-school-teachers')
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @include('layouts.footers.auth.footer')
    </div>
@endsection