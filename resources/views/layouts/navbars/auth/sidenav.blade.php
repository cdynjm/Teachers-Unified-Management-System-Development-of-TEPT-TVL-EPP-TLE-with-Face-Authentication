<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-md my-3 fixed-start ms-4 " style="position: fixed; z-index: 10;"
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="align-items-center d-flex mt-3" href="">
            <img style="width: 50px; height: 50px; border-radius: 50px;" src="/tums.png" class="ms-4 mb-4 mt-2" alt="...">
            <span class="ms-3 sidebar-text fw-bolder fs-4">
                TUMS
            <p style="font-size:9px;">Teachers Unified Management System</p>
          </span>
        </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto h-auto" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            @if(Auth::user()->role == 1)
            <li class="nav-item mb-2"><span class="ms-4 text-xs opacity-7">Pages</span></li>
            <li class="nav-item">
                <a wire:navigate class="nav-link {{ Route::currentRouteName() == 'admin-dashboard' ? 'active' : '' }}" href="{{ route('admin-dashboard') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                       <div>
                            <lord-icon
                                src="https://cdn.lordicon.com/heexevev.json"
                                trigger="in"
                                delay="0"
                                state="in-reveal"
                                style="width:20px;height:20px">
                            </lord-icon>
                       </div>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>

            <li class="nav-item">
                <a wire:navigate class="nav-link {{ Route::currentRouteName() == 'schools' ? 'active' : '' }}" href="{{ route('schools') }}">
                    <div
                        class="icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <div>
                            <lord-icon
                                src="https://cdn.lordicon.com/zneicxkd.json"
                                trigger="in"
                                delay="0"
                                colors="primary:#e88c30,secondary:#6c16c7,tertiary:#4bb3fd,quaternary:#f28ba8,quinary:#faddd1"
                                style="width:20px;height:20px">
                            </lord-icon>
                        </div>
                    </div>
                    <span class="nav-link-text ms-1">Schools</span>
                </a>
            </li>
            
            <li class="nav-item">
                <a wire:navigate class="nav-link {{ Route::currentRouteName() == 'subjects' ? 'active' : '' }}" href="{{ route('subjects') }}">
                    <div
                        class="icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <div>
                            <lord-icon
                                src="https://cdn.lordicon.com/qwjfapmb.json"
                                trigger="in"
                                state="in-reveal"
                                delay="0"
                                style="width:20px;height:20px">
                            </lord-icon>
                        </div>
                    </div>
                    <span class="nav-link-text ms-1">Subjects</span>
                </a>
            </li>

            <hr class="horizontal dark">

            <li class="nav-item mb-2"><span class="ms-4 text-xs opacity-7">Files and Documents</span></li>
            <li class="nav-item">
                <a wire:navigate class="nav-link {{ Route::currentRouteName() == 'teachers' ? 'active' : '' }}" href="{{ route('teachers') }}">
                    <div
                        class="icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <div class="mt-1">
                            <lord-icon
                                src="https://cdn.lordicon.com/xcxzayqr.json"
                                trigger="in"
                                delay="0"
                                state="in-reveal"
                                colors="primary:#2516c7,secondary:#ffc738"
                                style="width:20px;height:20px">
                            </lord-icon>
                        </div>
                    </div>
                    <span class="nav-link-text ms-1">Teachers</span>
                </a>
            </li>

            <li class="nav-item">
                <a wire:navigate class="nav-link {{ Route::currentRouteName() == 'documents' ? 'active' : '' }}" href="{{ route('documents') }}">
                    <div
                        class="icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <div class="mt-1">
                            <lord-icon
                                src="https://cdn.lordicon.com/bgitlnnj.json"
                                trigger="in"
                                delay="0"
                                style="width:20px;height:20px">
                            </lord-icon>
                        </div>
                    </div>
                    <span class="nav-link-text ms-1">Documents</span>
                </a>
            </li>

            <hr class="horizontal dark">
            
            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'map' ? 'active' : '' }}" href="#" id="view-map">
                    <div
                        class="icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <div>
                            <lord-icon
                                src="https://cdn.lordicon.com/iikoxwld.json"
                                trigger="in"
                                state="hover-jump-roll"
                                colors="primary:#c71f16"
                                style="width:22px;height:22px">
                            </lord-icon>
                        </div>
                    </div>
                    <span class="nav-link-text ms-1">Map</span>
                </a>
            </li>

           @endif

           @if(Auth::user()->role == 2)
           <li class="nav-item">
                <a wire:navigate class="nav-link {{ Route::currentRouteName() == 'school-dashboard' ? 'active' : '' }}" href="{{ route('school-dashboard') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <div>
                            <lord-icon
                                src="https://cdn.lordicon.com/heexevev.json"
                                trigger="in"
                                delay="0"
                                state="in-reveal"
                                style="width:20px;height:20px">
                            </lord-icon>
                       </div>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>

            <li class="nav-item">
                <a wire:navigate class="nav-link {{ Route::currentRouteName() == 'school-teachers' ? 'active' : '' }}" href="{{ route('school-teachers') }}">
                    <div
                        class="icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <div class="mt-1">
                            <lord-icon
                                src="https://cdn.lordicon.com/xcxzayqr.json"
                                trigger="in"
                                delay="0"
                                state="in-reveal"
                                colors="primary:#2516c7,secondary:#ffc738"
                                style="width:20px;height:20px">
                            </lord-icon>
                        </div>
                    </div>
                    <span class="nav-link-text ms-1">Teachers</span>
                </a>
            </li>
           @endif

           @if(Auth::user()->role == 3)
           <li class="nav-item">
                <a wire:navigate class="nav-link {{ Route::currentRouteName() == 'teacher-dashboard' ? 'active' : '' }}" href="{{ route('teacher-dashboard') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <div>
                            <lord-icon
                                src="https://cdn.lordicon.com/heexevev.json"
                                trigger="in"
                                delay="0"
                                state="in-reveal"
                                style="width:20px;height:20px">
                            </lord-icon>
                       </div>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>
           @endif
        </ul>
    </div>
</aside>
