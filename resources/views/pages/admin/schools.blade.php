@php
    use Illuminate\Support\Str;
    use App\Http\Controllers\AESCipher;
    $aes = new AESCipher();
@endphp

@extends('modals.admin.create-school-modal')

@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Schools'])
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-radius-md">
                    <div class="card-header pb-0">
                        <div class="d-flex flex-row justify-content-between">
                            <div>
                                <h5 class="mb-2 text-sm text-success">
                                    <span class="me-1" style="vertical-align: middle;">
                                        <lord-icon
                                            src="https://cdn.lordicon.com/zneicxkd.json"
                                            trigger="in"
                                            delay="0"
                                            colors="primary:#e88c30,secondary:#6c16c7,tertiary:#4bb3fd,quaternary:#f28ba8,quinary:#faddd1"
                                            style="width:20px;height:20px">
                                        </lord-icon>
                                    </span>
                                    List of Schools</h5>
                            </div>
                            <button class="btn btn-sm bg-dark text-white" id="add-school">+ Add</button>
                        </div>
                    </div>

                    <hr class="mx-4 mb-0">
                    <div class="card-header pb-0">
                        <div class="d-flex flex-row justify-content-between">
                            <div>
                                <p class="text-sm">Elementary Schools</p>
                            </div>
                        </div>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-4">
                            @include('data.admin.elementary-schools-table')
                        </div>
                    </div>

                    <hr class="mx-4 mb-0">
                    <div class="card-header pb-0">
                        <div class="d-flex flex-row justify-content-between">
                            <div>
                                <p class="text-sm">High Schools and Senior High Schools</p>
                            </div>
                        </div>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-4">
                            @include('data.admin.high-schools-table')
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.footers.auth.footer')
    </div>
@endsection

