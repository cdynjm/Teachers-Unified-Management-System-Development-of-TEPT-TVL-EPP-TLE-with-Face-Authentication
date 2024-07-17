@php
    use Illuminate\Support\Str;
    use App\Http\Controllers\AESCipher;
    $aes = new AESCipher();
@endphp

@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Profile'])
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="card border-radius-md">
                    <div class="card-header pb-0">
                        <div class="">
                            <div>
                                <h5 class="mb-2 text-sm text-dark text-center">
                                    <span class="me-1" style="vertical-align: middle;">
                                        <lord-icon
                                            src="https://cdn.lordicon.com/gyevrheg.json"
                                            trigger="in"
                                            state="in-reveal"
                                            style="width:40px;height:40px">
                                        </lord-icon>
                                    </span>
                                    Your Account Credentials
                                </h5>
                            </div>
                        </div>
                    </div>

                    <hr class="mx-4 mb-0">
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-4">
                            <form action="" id="update-school-account">
                                @csrf
                                <label for="">School Name</label>
                                @if(Auth::user()->schoolType == 1)
                                    <input type="text" name="school" class="form-control" value="{{ Auth::user()->ElementarySchools->school }}" required>
                                @endif
                                @if(Auth::user()->schoolType == 2 || Auth::user()->schoolType == 3)
                                    <input type="text" name="school" class="form-control" value="{{ Auth::user()->HighSchools->school }}" required>
                                @endif
                                <label for="">Email</label>
                                <input type="text" name="email" class="form-control" value="{{ Auth::user()->email }}" required>

                                <label for="">Change password</label>
                                <input type="password" name="password" class="form-control" value="">

                                <div class="d-flex justify-content-center mt-4">
                                    <button  class="btn btn-sm bg-dark text-white">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
    @include('layouts.footers.auth.footer')
    </div>
@endsection