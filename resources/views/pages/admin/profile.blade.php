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
                            <form action="" id="update-admin-account">
                                @csrf
                                <label for="">Name</label>
                                <input type="text" name="name" class="form-control" value="{{ Auth::user()->name }}" required>
                            
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
                                    Register your Face for Authentication
                                </h5>
                            </div>
                        </div>
                    </div>

                    <hr class="mx-4 mb-0">
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-4">
                            <form action="" id="upload-face-auth">
                                @csrf
                                
                                <div class="alert alert-danger text-white text-sm">
                                    <b><i class="fas fa-info-circle"></i> Note: </b> For effective face authentication, please ensure to upload a clear, well-lit reference photo. This is crucial for the face API to accurately match and authenticate you. Blurry or poorly lit images may result in authentication failures.
                                </div>

                                <label for="">Upload New Image</label>
                                <input type="file" class="form-control" name="file" accept=".jpg" required>

                                <div class="d-flex justify-content-center mt-4">
                                    <button  class="btn btn-sm bg-dark text-white">Upload</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    @include('layouts.footers.auth.footer')
    </div>
@endsection