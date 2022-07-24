<!--Navbar Start-->
<nav class="navbar navbar-expand-lg fixed-top sticky nav-sticky mt-0" id="navbar">
    <div class="container-fluid custom-container py-2">
        <a class="navbar-brand text-dark fw-bold me-auto" href="{{ route('home') }}">
            <img src="{{ asset('assets/img/cdc.png') }}" height="44" alt="" class="logo-dark" />
        </a>
        <div>
            <button class="navbar-toggler me-3" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-label="Toggle navigation">
                <i class="mdi mdi-menu"></i>
            </button>
        </div>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mx-auto navbar-center">
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link {{ $titleNav == 'home' ? 'active' : '' }}">Beranda</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('vacancies') }}" class="nav-link {{ $titleNav == 'vacancies' ? 'active' : '' }}">Lowongan</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('articles') }}" class="nav-link {{ $titleNav == 'articles' ? 'active' : '' }}">Artikel</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('contact') }}" class="nav-link {{ $titleNav == 'contact' ? 'active' : '' }}">Kontak</a>
                </li>
            </ul><!--end navbar-nav-->
        </div>
        <!--end navabar-collapse-->
        <ul class="header-menu list-inline d-flex align-items-center mb-0">
            @auth
            <li class="list-inline-item dropdown">
                <a href="javascript:void(0)" class="header-item" id="userdropdown" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    @admin
                    <img src="{{ asset('cdc/images/profile.jpg') }}" alt="mdo" width="35" height="35" class="rounded-circle me-2"> <span class="d-none d-md-inline-block fw-medium">Halo, {{ auth()->user()->name }}</span>
                    @endadmin

                    @company
                    <img src="{{ isset(auth()->user()->companyProfile->image) ? asset('storage/' . auth()->user()->companyProfile->image) : asset('cdc/images/profile.jpg') }}" alt="mdo" width="35" height="35" class="rounded-circle me-2"> <span class="d-none d-md-inline-block fw-medium">Halo, {{ auth()->user()->name }}</span>
                    @endcompany

                    @mahasiswa
                    <img src="{{ isset(auth()->user()->studentProfile->image) ? asset('storage/' . auth()->user()->studentProfile->image) : asset('cdc/images/profile.jpg') }}" alt="mdo" width="35" height="35" class="rounded-circle me-2"> <span class="d-none d-md-inline-block fw-medium">Halo, {{ auth()->user()->name }}</span>
                    @endmahasiswa
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userdropdown">
                    @admin
                    <li><a class="dropdown-item" href="{{ route('dashboard') }}">Dashboard</a></li>
                    @endadmin

                    @company
                    <li><a class="dropdown-item" href="{{ route('vacancy.index') }}">Dashboard</a></li>
                    <li><a class="dropdown-item" href="{{ route('company_detail', auth()->user()->companyProfile->id) }}">Profil</a></li>
                    @endcompany

                    @mahasiswa
                    <li><a class="dropdown-item" href="{{ route('application') }}">Dashboard</a></li>
                    <li><a class="dropdown-item" href="{{ route('student_detail', auth()->user()->studentProfile->id) }}">Profil</a></li>
                    @endmahasiswa

                    <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="dropdown-item" href="#">Keluar</a></li>
                </ul>
            </li>
            @else
            <li class="list-inline-item me-2 align-middle">
                <a href="{{ route('register') }}" class="text-dark fw-medium px-3" >Daftar</a>
            </li>
            <li class="list-inline-item align-middle">
                <a href="{{ route('login') }}" class="btn btn-primary">Masuk</a>
            </li>
            @endauth
            
        </ul><!--end header-menu-->
    </div>
    <!--end container-->
</nav>
<!-- Navbar End -->
