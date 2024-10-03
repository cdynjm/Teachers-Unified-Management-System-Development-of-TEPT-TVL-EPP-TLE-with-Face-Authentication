@php
    use Illuminate\Support\Str;
    use App\Http\Controllers\AESCipher;
    $aes = new AESCipher();
@endphp

@extends('modals.admin.create-request-documents-modal')
@extends('modals.admin.update.edit-request-documents-modal')

@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Documents'])
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
                                            src="https://cdn.lordicon.com/bgitlnnj.json"
                                            trigger="in"
                                            delay="0"
                                            style="width:20px;height:20px">
                                        </lord-icon>
                                    </span>
                                    Requested Documents</h5>
                            </div>
                            <button class="btn btn-sm bg-dark text-white" id="request-documents">+ Add</button>
                        </div>
                    </div>

                    <hr class="mx-4 mb-0">
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-4">
                            @include('data.admin.request-documents')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @include('layouts.footers.auth.footer')
    </div>
@endsection