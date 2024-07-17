@php
    use Illuminate\Support\Str;
    use App\Http\Controllers\AESCipher;
    $aes = new AESCipher();
@endphp

@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Requested Document'])
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
                                    {{ $requestedDocument->description }}</h5>
                            </div>
                        </div>
                    </div>

                    <hr class="mx-4 mb-0">
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-4">
                            <div class="row">
                                <div class="col-md-6 text-center mb-4">
                                    <label for="" class="fw-normal">Add Your Attachments Here</label>
                                    <input type="file" class="form-control mb-4 d-none" id="file-input" multiple>
                                    <button type="button" class="btn btn-md bg-gray-200 w-100 mb-1" id="add-more-files">
                                        <span class="ms-3" style="vertical-align: middle;">
                                        <lord-icon
                                            src="https://cdn.lordicon.com/fgsdcsla.json"
                                            trigger="in"
                                            state="in-reveal"
                                            colors="primary:#eeaa66,secondary:#545454"
                                            style="width:25px;height:25px;">
                                        </lord-icon>
                                        </span>
                                        Choose Files</button>
                                    
                                    <form id="upload-attachments" class="mt-0" enctype="multipart/form-data">
                                      @csrf
                                        <input type="hidden" id="id" class="form-control" value="{{ $aes->encrypt($requestedDocument->id) }}">
                                        <ul id="file-list" class="list-unstyled my-3 text-start"></ul>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-sm bg-dark text-white w-100 mb-0">Upload Files</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-md-6 text-center">
                                    <span class="text-sm">Your Uploaded Attachments:</span>
                                    @include('data.teachers.attachments')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @include('layouts.footers.auth.footer')
    </div>
@endsection