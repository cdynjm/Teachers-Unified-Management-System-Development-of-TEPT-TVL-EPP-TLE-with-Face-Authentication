@php
    use Illuminate\Support\Str;
    use App\Http\Controllers\AESCipher;
    $aes = new AESCipher();
@endphp

@extends('modals.schools.create-teacher-modal')
@extends('modals.schools.update.edit-teacher-modal')

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
                            <button class="btn btn-sm bg-dark text-white" id="add-teacher">+ Add</button>
                        </div>
                    </div>

                    <hr class="mx-4 mb-0">
                    
                    <div class="card-body px-0 pt-0 pb-2 mt-0">
                        <div class="table-responsive p-4">
                                @include('data.schools.teachers')
                        </div>
                    </div>

                    
                </div>
            </div>
        </div>
    @include('layouts.footers.auth.footer')
    </div>
@endsection