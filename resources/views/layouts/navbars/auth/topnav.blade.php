@php
    use Illuminate\Support\Str;
    use App\Http\Controllers\AESCipher;
    $aes = new AESCipher();
@endphp

<!-- Navbar -->
<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl
        {{ str_contains(Request::url(), 'virtual-reality') == true ? ' mt-3 mx-3 bg-primary' : '' }}"
        data-scroll="false">
    <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
                <li class="breadcrumb-item text-sm text-dark active" aria-current="page">{{ $title }}</li>
            </ol>
            <h6 class="font-weight-bolder text-dark mb-0">{{ $title }}</h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
            <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                <div class="input-group">
                    
                </div>
            </div>
            
            <ul class="navbar-nav  justify-content-end">
                <li class="nav-item dropdown pe-2 d-flex align-items-center">
                    
                    <a href="javascript:;" class="nav-link text-dark p-0 mt-2" id="dropdownMenuButton"
                    data-bs-toggle="dropdown" aria-expanded="false">
                        @if(auth()->user()->role == 1)
                            <span class=" fw-bolder d-sm-inline">{{ auth()->user()->name }}</span>
                            <img src="https://cdn-icons-png.flaticon.com/512/219/219986.png" class="avatar avatar-sm ms-2 img-fluid rounded-circle" alt="user1">   
                            <div class="text-xs text-center">Administrator</div>
                        @endif
                        @if(auth()->user()->role == 2)
                            @if(auth()->user()->schoolType == 1)
                                <span class=" fw-bolder d-sm-inline">{{ auth()->user()->ElementarySchools->school }}</span>
                                <img src="https://cdn-icons-png.flaticon.com/512/219/219986.png" class="avatar avatar-sm ms-2 img-fluid rounded-circle" alt="user1">   
                                <div class="text-xs text-center">School</div>
                            @endif
                            @if(auth()->user()->schoolType == 2)
                                <span class=" fw-bolder d-sm-inline">{{ auth()->user()->HighSchools->school }}</span>
                                <img src="https://cdn-icons-png.flaticon.com/512/219/219986.png" class="avatar avatar-sm ms-2 img-fluid rounded-circle" alt="user1">   
                                <div class="text-xs text-center">School</div>
                            @endif
                            @if(auth()->user()->schoolType == 3)
                                <span class=" fw-bolder d-sm-inline">{{ auth()->user()->HighSchools->school }}</span>
                                <img src="https://cdn-icons-png.flaticon.com/512/219/219986.png" class="avatar avatar-sm ms-2 img-fluid rounded-circle" alt="user1">  
                                <div class="text-xs text-center">School</div> 
                            @endif
                        @endif
                        @if(auth()->user()->role == 3)
                            <span class=" fw-bolder d-sm-inline">{{ auth()->user()->Teachers->teacher }}</span>
                            <img src="{{ asset('storage/profile/'.Auth::user()->Teachers->picture) }}" class="avatar avatar-sm ms-2 img-fluid rounded-circle" alt="user1">   
                            @if(Auth::user()->Teachers->position == 1)
                                <div class="text-xs text-center">Teacher</div>
                            @endif
                            @if(Auth::user()->Teachers->position == 2)
                                <div class="text-xs text-center">Principal</div>
                            @endif
                        @endif
                    </a>
                    
                    <ul class="dropdown-menu dropdown-menu-end px-2 py-3"
                        aria-labelledby="dropdownMenuButton">
                        <li class="list-group-item p-0" style="border: none !important;">
                            @if(Auth::user()->role == 1)
                                <a wire:navigate href="{{ route('admin-profile', ['id' => $aes->encrypt(Auth::user()->id)]) }}" class=" ms-2 nav-link text-dark font-weight-bold p-0">
                                    <i class="fas fa-user-circle me-2"></i> Profile
                                </a>
                            @endif
                            @if(Auth::user()->role == 2)
                                <a wire:navigate href="{{ route('school-profile', ['id' => $aes->encrypt(Auth::user()->id)]) }}" class=" ms-2 nav-link text-dark font-weight-bold p-0">
                                    <i class="fas fa-user-circle me-2"></i> Profile
                                </a>
                            @endif
                            @if(Auth::user()->role == 3)
                                <a wire:navigate href="{{ route('teacher-profile', ['id' => $aes->encrypt(Auth::user()->id)]) }}" class=" ms-2 nav-link text-dark font-weight-bold p-0">
                                    <i class="fas fa-user-circle me-2"></i> Profile
                                </a>
                            @endif
                        </li>
                        <hr>
                        <li class="list-group-item p-0" style="border: none !important;">
                            @if(Auth::user()->role == 1)
                            <form id="admin-sign-out">
                                @csrf
                                <button class="ms-2 nav-link text-dark font-weight-bold p-0 border-0 bg-white">
                                    <i class="fas fa-sign-out-alt me-2"></i> Log Out
                                </button>
                            </form>
                            @else
                            <form id="sign-out">
                                @csrf
                                <button class="ms-2 nav-link text-dark font-weight-bold p-0 border-0 bg-white">
                                    <i class="fas fa-sign-out-alt me-2"></i> Log Out
                                </button>
                            </form>
                            @endif
                        </li>
                    </ul>
                </li>
                <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                    <a href="javascript:;" class="nav-link text-dark p-0" id="iconNavbarSidenav">
                        <div class="sidenav-toggler-inner">
                            <i class="sidenav-toggler-line bg-dark"></i>
                            <i class="sidenav-toggler-line bg-dark"></i>
                            <i class="sidenav-toggler-line bg-dark"></i>
                        </div>
                    </a>
                </li>
            </ul>

        </div>
    </div>
</nav>
<hr class="horizontal dark my-0">
<!-- End Navbar -->
