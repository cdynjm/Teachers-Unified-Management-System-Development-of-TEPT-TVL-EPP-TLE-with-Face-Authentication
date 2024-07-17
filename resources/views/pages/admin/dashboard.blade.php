@php
    use Illuminate\Support\Str;
    use App\Http\Controllers\AESCipher;
    $aes = new AESCipher();
@endphp

@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Dashboard'])
    <div class="container-fluid py-4">
    <div class="row">
        <div class="d-flex flex-row justify-content-between">
            <div>
                <button id="new-school-year" class="btn btn-sm bg-dark text-white text-xs fw-normal"><i class="fa-solid fa-calendar-check text-sm me-2"></i> New School Year</button>
            </div>
            <span class="fw-normal text-xs ms-2 me-2">
            Academic Year: 
            <span class="fw-bolder ms-1 text-sm">{{ Session::get('year') }}</span>
            </span>
        </div>
        <div class="col-xl-6 col-sm-6 mb-xl-0 mb-4">
            <a wire:navigate href="{{ route('elementary-schools', ['id' => $aes->encrypt('1')]) }}?{{ \Str::random(50) }}">
                <div class="card border-radius-md">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                            <p class="text-sm mb-0 text-uppercase font-weight-bold">Elementary Schools</p>
                            <h5 class="font-weight-bolder fs-3">
                                {{ $countElementarySchools }}
                            </h5>
                            <p class="mb-0 text-xs">
                                Total Count
                            </p>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-info shadow-info text-center rounded-circle">
                            <i class="fa-solid fa-graduation-cap opacity-10 text-lg"></i>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </a>
        </div>
        <div class="col-xl-6 col-sm-6 mb-xl-0 mb-4">
            <a wire:navigate href="{{ route('high-schools', ['id' => $aes->encrypt('2')]) }}?{{ \Str::random(50) }}">
                <div class="card border-radius-md">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                            <p class="text-sm mb-0 text-uppercase font-weight-bold">High Schools</p>
                            <h5 class="font-weight-bolder fs-3">
                                {{ $countHighSchools }}
                            </h5>
                            <p class="mb-0 text-xs">
                                Total Count
                            </p>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
                            <i class="fa-solid fa-graduation-cap opacity-10 text-lg"></i>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </a>
        </div>
    </div>
    @include('layouts.footers.auth.footer')
    </div>
@endsection