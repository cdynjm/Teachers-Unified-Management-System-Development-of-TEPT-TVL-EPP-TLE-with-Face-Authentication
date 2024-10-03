@php
    use Illuminate\Support\Str;
    use App\Http\Controllers\AESCipher;
    $aes = new AESCipher();
@endphp

@extends('modals.admin.create-elementary-subject-modal')
@extends('modals.admin.create-high-school-subject-modal')
@extends('modals.admin.create-tle-tve-subject-modal')
@extends('modals.admin.create-senior-high-school-subject-modal')
@extends('modals.admin.create-strand-subject-modal')

@extends('modals.admin.update.edit-elementary-subject-modal')
@extends('modals.admin.update.edit-high-school-subject-modal')
@extends('modals.admin.update.edit-tle-tve-subject-modal')
@extends('modals.admin.update.edit-senior-high-school-subject-modal')
@extends('modals.admin.update.edit-strand-subject-modal')

@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Subjects'])
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-radius-md">
                    <div class="card-header pb-0">
                        <div class="d-flex flex-row justify-content-between">
                            <div>
                                <h5 class="mb-2 text-sm text-info">
                                    <span class="me-1" style="vertical-align: middle;">
                                        <lord-icon
                                            src="https://cdn.lordicon.com/qwjfapmb.json"
                                            trigger="in"
                                            state="in-reveal"
                                            delay="0"
                                            style="width:20px;height:20px">
                                        </lord-icon>
                                    </span>
                                    List of Subjects</h5>
                            </div>
                        </div>
                    </div>

                    <hr class="mx-4 mb-0">
                    <div class="card-header pb-0">
                        <div class="d-flex flex-row justify-content-between">
                            <div>
                                <p class="text-sm">Elementary Subjects</p>
                            </div>
                            <button class="btn btn-sm bg-dark text-white" id="add-elementary-subject">+ Add</button>
                        </div>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-4">
                            @include('data.admin.elementary-subjects-table')
                        </div>
                    </div>

                    <hr class="mx-4 mb-0">
                    <div class="card-header pb-0">
                        <div class="d-flex flex-row justify-content-between">
                            <div>
                                <p class="text-sm">High School Subjects</p>
                            </div>
                            <button class="btn btn-sm bg-dark text-white" id="add-high-school-subject">+ Add</button>
                        </div>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-4">
                            @include('data.admin.high-school-subjects-table')
                        </div>
                    </div>

                    <hr class="mx-4 mb-0">
                    <div class="card-header pb-0">
                        <div class="d-flex flex-row justify-content-between">
                            <div>
                                <p class="text-sm">High School TVE/TLE Subjects</p>
                            </div>
                            <button class="btn btn-sm bg-dark text-white" id="add-tle-tve-subject">+ Add</button>
                        </div>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-4">
                            @include('data.admin.TLE-TVE-subjects-table')
                        </div>
                    </div>

                    <hr class="mx-4 mb-0">
                    <div class="card-header pb-0">
                        <div class="d-flex flex-row justify-content-between">
                            <div>
                                <p class="text-sm">Senior High School Subjects</p>
                            </div>
                            <button class="btn btn-sm bg-dark text-white" id="add-senior-high-school-subject">+ Add</button>
                        </div>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-4">
                            @include('data.admin.senior-high-school-subjects-table')
                        </div>
                    </div>

                    <hr class="mx-4 mb-0">
                    <div class="card-header pb-0">
                        <div class="d-flex flex-row justify-content-between">
                            <div>
                                <p class="text-sm">Senior High School Strands</p>
                            </div>
                            <button class="btn btn-sm bg-dark text-white" id="add-strand-subject">+ Add</button>
                        </div>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-4">
                            @include('data.admin.strand-subjects-table')
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.footers.auth.footer')
    </div>
@endsection

