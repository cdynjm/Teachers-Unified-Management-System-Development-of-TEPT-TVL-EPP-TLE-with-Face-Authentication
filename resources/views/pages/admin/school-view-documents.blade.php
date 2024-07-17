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
                    <div class="ms-4">
                        <h5 class="mb-2 text-sm text-dark">
                            <span class="me-1" style="vertical-align: middle;">
                                <lord-icon
                                    src="https://cdn.lordicon.com/zneicxkd.json"
                                    trigger="in"
                                    delay="0"
                                    colors="primary:#e88c30,secondary:#6c16c7,tertiary:#4bb3fd,quaternary:#f28ba8,quinary:#faddd1"
                                    style="width:20px;height:20px">
                                </lord-icon>
                            </span>
                            {{ $school->school }} Documents</h5>
                    </div>
                    <hr class="mx-4 mb-0">
                    
                    <div class="card-body px-0 pt-0 pb-2 mt-0">
                        <div class="table-responsive p-4">
                            @include('data.admin.school-teachers-documents')
                        </div>
                    </div>

                </div>
            </div>
        </div>
    @include('layouts.footers.auth.footer')
    </div>
@endsection