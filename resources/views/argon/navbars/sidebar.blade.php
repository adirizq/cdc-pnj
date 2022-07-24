<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Brand -->
        <a class="navbar-brand pt-0" href="{{ route('home') }}">
            <img src="{{ asset('assets/img/cdc.png') }}" class="navbar-brand-img" alt="...">
        </a>
        <!-- User -->
        <ul class="nav align-items-center d-md-none">
            <li class="nav-item dropdown">
                <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="media align-items-center">
                        <span class="avatar avatar-sm rounded-circle">
                        <img alt="Image placeholder" src="{{ asset('argon') }}/img/theme/team-1-800x800.jpg">
                        </span>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                    <div class=" dropdown-header noti-title">
                        <h6 class="text-overflow m-0">Selamat Datang!</h6>
                    </div>
                    <a href="{{ route('home') }}" class="dropdown-item">
                        <i class="ni ni-world-2"></i>
                        <span>Home</span>
                    </a>
                    <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        <i class="ni ni-user-run"></i>
                        <span>Keluar</span>
                    </a>
                </div>
            </li>
        </ul>
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
            <!-- Collapse header -->
            <div class="navbar-collapse-header d-md-none">
                <div class="row">
                    <div class="col-6 collapse-brand">
                        <a href="{{ route('home') }}">
                            <img src="{{ asset('argon') }}/img/brand/blue.png">
                        </a>
                    </div>
                    <div class="col-6 collapse-close">
                        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                </div>
            </div>
            <!-- Navigation -->
            <ul class="navbar-nav">
                @admin
                <li class="nav-item">
                    <a class="nav-link {{ $title=='dashboard' ? 'active font-weight-bold' : '' }}" href="{{ route('dashboard') }}">
                        <i class="ni ni-chart-pie-35 text-primary"></i> Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $title=='daftar artikel' || $title=='buat artikel' ? 'active font-weight-bold' : '' }} " href="#navbar-article" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="navbar-examples">
                        <i class="ni ni-single-copy-04 text-primary font-weight-bold"></i> Artikel
                    </a>
                    <div class="collapse {{ $title=='daftar artikel' || $title=='buat artikel' ? 'show' : '' }} " id="navbar-article">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link {{ $title=='daftar artikel' ? 'active font-weight-bold' : '' }}" href="{{ route('article.index') }}">Daftar Artikel</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ $title=='buat artikel' ? 'active font-weight-bold' : '' }}" href="{{ route('article.create') }}">Buat Artikel</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $title=='buat lowongan' || $title=='daftar lowongan' || $title=='daftar kategori' ? 'active font-weight-bold' : '' }} " href="#navbar-vacancy" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="navbar-examples">
                        <i class="ni ni-briefcase-24 text-primary font-weight-bold"></i> Lowongan
                    </a>
                    <div class="collapse {{ $title=='buat lowongan' || $title=='daftar lowongan' || $title=='daftar kategori' ? 'show' : '' }} " id="navbar-vacancy">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link {{ $title=='daftar kategori' ? 'active font-weight-bold' : '' }}" href="{{ route('category.index') }}">Kategori Lowongan</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $title=='daftar user' ? 'active font-weight-bold' : '' }}" href="{{ route('user.index') }}">
                        <i class="ni ni-single-02 text-primary"></i> User
                    </a>
                </li>
                @endadmin

                @company
                <li class="nav-item">
                    <a class="nav-link {{ $title=='buat lowongan' || $title=='daftar lowongan' || $title=='daftar kategori' ? 'active font-weight-bold' : '' }} " href="#navbar-vacancy" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="navbar-examples">
                        <i class="ni ni-briefcase-24 text-primary font-weight-bold"></i> Lowongan
                    </a>
                    <div class="collapse {{ $title=='buat lowongan' || $title=='daftar lowongan' || $title=='daftar kategori' ? 'show' : '' }} " id="navbar-vacancy">
                        <ul class="nav nav-sm flex-column">
                            
                            <li class="nav-item">
                                <a class="nav-link {{ $title=='daftar lowongan' ? 'active font-weight-bold' : '' }}" href="{{ route('vacancy.index') }}">Daftar Lowongan</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ $title=='buat lowongan' ? 'active font-weight-bold' : '' }}" href="{{ route('vacancy.create') }}">Buat Lowongan</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $title=='ubah profile' ? 'active font-weight-bold' : '' }}" href="{{ route('company-profile.index') }}">
                        <i class="ni ni-single-02 text-primary"></i> Ubah Profile
                    </a>
                </li>
                @endcompany

                @mahasiswa
                <li class="nav-item">
                    <a class="nav-link {{ $title=='lamaran' ? 'active font-weight-bold' : '' }}" href="{{ route('application') }}">
                        <i class="ni ni-briefcase-24 text-primary"></i> Lamaran
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $title=='ubah profile' ? 'active font-weight-bold' : '' }}" href="{{ route('student-profile.index') }}">
                        <i class="ni ni-single-02 text-primary"></i> Ubah Profile
                    </a>
                </li>
                @endmahasiswa
            </ul>
        </div>
    </div>
</nav>
