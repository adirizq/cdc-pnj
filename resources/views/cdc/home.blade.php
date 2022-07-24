@extends('cdc.main')

@section('content')

        <!-- Begin page -->
        <div>

            @include('cdc.partials.navbar')

            <div class="main-content">

                <div class="page-content">

                    <!-- START HOME -->
                    <section class="bg-home2" id="home">
                        <div class="container">
                            <div class="row align-items-center">
                                <div class="col-lg-7">
                                    <div class="mb-4 pb-3 me-lg-5">
                                        <h6 class="sub-title">Career Development Center PNJ</h6>
                                        <h1 class="display-5 fw-semibold mb-3">Kembangkan Karirmu Bersama <span class="text-primary fw-bold">CDC PNJ</span></h1>
                                        <p class="lead text-muted mb-0">Cari pekerjaan atau magang, dan langsung apply disini. Semua perusahaan sudah yang tertera sudah berkerjasama dengan CDC Politeknik Negeri Jakarta.</p>
                                    </div>
                                    <form action="#">
                                        <div class="registration-form">
                                            <div class="mt-3 mt-md-0 h-100">
                                                <a href="{{ route('vacancies') }}" class="btn btn-primary h-100" type="button"><i class="uil uil-search me-1"></i> Cari Lowongan</a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!--end col-->
                                <div class="col-lg-5">
                                    <div class="mt-5 mt-md-0">
                                        <img src="{{ asset('cdc/images/process-02.png') }}" alt="" class="home-img" /> 
                                    </div>
                                </div><!--end col-->
                            </div>
                            <!--end row-->
                        </div>
                        <!--end container-->    
                    </section>
                    <!-- End Home -->

                    <!-- START SHAPE -->
                    <div class="position-relative">
                        <div class="shape">
                            <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="1440" height="150" preserveAspectRatio="none" viewBox="0 0 1440 220">
                                <g mask="url(&quot;#SvgjsMask1004&quot;)" fill="none">
                                    <path d="M 0,213 C 288,186.4 1152,106.6 1440,80L1440 250L0 250z" fill="rgba(255, 255, 255, 1)"></path>
                                </g>
                                <defs>
                                    <mask id="SvgjsMask1004">
                                        <rect width="1440" height="250" fill="#ffffff"></rect>
                                    </mask>
                                </defs>
                            </svg>
                        </div>
                    </div>
                    <!-- END SHAPE -->

                    <!-- START JOB-LIST -->
                    <section class="section">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-6">
                                    <div class="section-title text-center mb-4 pb-2">
                                        <h4 class="title">Lowongan Terbaru</h4>
                                        <p class="text-muted mb-1">Cari lowongan yang sesuai dengan minat dan skill anda. Gunakan fitur apply lowongan untuk melamar lowongan.</p>
                                    </div>
                                </div><!--end col-->
                            </div><!--end row-->
                            <div class="row justify-content-center">
                                <div class="col-lg-4">
                                    <ul class="job-list-menu nav nav-pills nav-justified flex-row mb-4" id="pills-tab"
                                        role="tablist">
                                        <li class="nav-item mr-1" role="presentation">
                                            <button class="nav-link active" id="jobs-tab" data-bs-toggle="pill"
                                                data-bs-target="#jobs" type="button" role="tab" aria-controls="jobs"
                                                aria-selected="true">Kerja</button>
                                        </li>
                                        <li class="nav-item me-1" role="presentation">
                                            <button class="nav-link" id="internships-tab" data-bs-toggle="pill"
                                                data-bs-target="#internships" type="button" role="tab" aria-controls="internships"
                                                aria-selected="false">Magang</button>
                                        </li>
                                    </ul>
                                </div>
                                <!--end col-->
                            </div>
                            <!--end row-->
                            <div class="row justify-content-center">
                                <div class="col-lg-10">
                                    <div class="tab-content" id="pills-tabContent">
                                        <div class="tab-pane fade show active" id="jobs" role="tabpanel"
                                            aria-labelledby="jobs-tab">

                                            @foreach ($newJobs as $vacancy)
                                            <div class="job-box card mt-4">
                                                <div class="p-4">
                                                    <div class="row">
                                                        <div class="col-lg-1">
                                                            <a href="{{ route('company_detail', $vacancy->companyProfile->id) }}"><img src="{{ asset('storage/' . $vacancy->companyProfile->image) }}" alt="" class="img-fluid rounded-3"></a>
                                                        </div><!--end col-->
                                                        <div class="col-lg-10">
                                                            <div class="mt-3 mt-lg-0">
                                                                <h5 class="fs-17 mb-1"><a href="{{ route('vacancy_detail', $vacancy->id) }}" class="text-dark">{{ $vacancy->title }}</a></h5>
                                                                <ul class="list-inline mb-0">
                                                                    <li class="list-inline-item">
                                                                        <p class="text-muted fs-14 mb-0">{{ $vacancy->companyProfile->user->name }}</p>
                                                                    </li>
                                                                    <li class="list-inline-item">
                                                                        <p class="text-muted fs-14 mb-0"><i class="mdi mdi-map-marker"></i> {{ $vacancy->companyProfile->location }}</p>
                                                                    </li>
                                                                    <li class="list-inline-item">
                                                                        <p class="text-muted fs-14 mb-0"><i class="uil uil-calendar-alt"></i> {{ $vacancy->created_at->format('M d, Y') }}</p>
                                                                    </li>
                                                                </ul>
                                                                <div class="mt-2">
                                                                    <span class="badge bg-soft-success mt-1">{{ $vacancy->vacancy_type }}</span>
                                                                    {{-- <span class="badge bg-soft-purple mt-1">{{ $vacancy->category->name }}</span> --}}
                                                                </div>
                                                            </div>
                                                        </div><!--end col-->
                                                    </div><!--end row-->
                                                </div>
                                                <div class="p-3 bg-light">
                                                    <div class="row justify-content-between">
                                                        <div class="col-md-8">
                                                            <div>
                                                                <ul class="list-inline mb-0">
                                                                    <li class="list-inline-item"><i class="uil uil-user"></i> Posisi :</li>
                                                                    <li class="list-inline-item"><p class="text-muted mb-0">{{ $vacancy->position }}</p></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <!--end col-->
                                                        <div class="col-md-3">
                                                            <div class="text-md-end">
                                                                <a href="{{ route('vacancy_detail', $vacancy->id) }}" class="primary-link">Detail Lowongan <i class="mdi mdi-chevron-double-right"></i></a>
                                                            </div>
                                                        </div>
                                                        <!--end col-->
                                                    </div>
                                                    <!--end row-->
                                                </div>
                                            </div>
                                            <!--end job-box-->
                                            @endforeach

                                            <div class="text-center mt-4 pt-2">
                                                <a href="{{ route('vacancies') }}" class="btn btn-primary">Semua Lowongan <i class="uil uil-arrow-right"></i></a>
                                            </div>

                                        </div>
                                        <!--end jobs-tab-->

                                        <div class="tab-pane fade" id="internships" role="tabpanel"
                                            aria-labelledby="internships-tab">
                                            
                                            @foreach ($newInterns as $vacancy)
                                            <div class="job-box card mt-4">
                                                <div class="p-4">
                                                    <div class="row">
                                                        <div class="col-lg-1">
                                                            <a href="{{ route('company_detail', $vacancy->companyProfile->id) }}"><img src="{{ asset('storage/' . $vacancy->companyProfile->image) }}" alt="" class="img-fluid rounded-3"></a>
                                                        </div><!--end col-->
                                                        <div class="col-lg-10">
                                                            <div class="mt-3 mt-lg-0">
                                                                <h5 class="fs-17 mb-1"><a href="{{ route('vacancy_detail', $vacancy->id) }}" class="text-dark">{{ $vacancy->title }}</a></h5>
                                                                <ul class="list-inline mb-0">
                                                                    <li class="list-inline-item">
                                                                        <p class="text-muted fs-14 mb-0">{{ $vacancy->companyProfile->user->name }}</p>
                                                                    </li>
                                                                    <li class="list-inline-item">
                                                                        <p class="text-muted fs-14 mb-0"><i class="mdi mdi-map-marker"></i> {{ $vacancy->companyProfile->location }}</p>
                                                                    </li>
                                                                    <li class="list-inline-item">
                                                                        <p class="text-muted fs-14 mb-0"><i class="uil uil-calendar-alt"></i> {{ $vacancy->created_at->format('M d, Y') }}</p>
                                                                    </li>
                                                                </ul>
                                                                <div class="mt-2">
                                                                    <span class="badge bg-soft-success mt-1">{{ $vacancy->vacancy_type }}</span>
                                                                    <span class="badge bg-soft-purple mt-1">{{ $vacancy->category->name }}</span>
                                                                </div>
                                                            </div>
                                                        </div><!--end col-->
                                                    </div><!--end row-->
                                                </div>
                                                <div class="p-3 bg-light">
                                                    <div class="row justify-content-between">
                                                        <div class="col-md-8">
                                                            <div>
                                                                <ul class="list-inline mb-0">
                                                                    <li class="list-inline-item"><i class="uil uil-user"></i> Posisi :</li>
                                                                    <li class="list-inline-item"><p class="text-muted mb-0">{{ $vacancy->position }}</p></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <!--end col-->
                                                        <div class="col-md-3">
                                                            <div class="text-md-end">
                                                                <a href="{{ route('vacancy_detail', $vacancy->id) }}" class="primary-link">Detail Lowongan <i class="mdi mdi-chevron-double-right"></i></a>
                                                            </div>
                                                        </div>
                                                        <!--end col-->
                                                    </div>
                                                    <!--end row-->
                                                </div>
                                            </div>
                                            <!--end job-box-->
                                            @endforeach

                                            <div class="text-center mt-4 pt-2">
                                                <a href="{{ route('vacancies') }}" class="btn btn-primary">Semua Lowongan <i class="uil uil-arrow-right"></i></a>
                                            </div>
                                        </div>
                                        <!--end internships-tab-->
                                    </div>
                                </div>
                                <!--end col-->
                            </div>
                            <!--end row-->
                        </div>
                        <!--end container-->
                    </section>
                    <!-- END JOB-LIST -->

                    <!-- START PROCESS -->
                    <section class="section bg-light">
                        <div class="container">
                            <div class="row align-items-center">
                                <div class="col-lg-6">
                                    <div class="section-title me-5">
                                        <h3 class="title">Cara Penggunaan</h3>
                                        <p class="text-muted">Cari lowongan yang sesuai dengan minat dan skill anda. Gunakan fitur apply lowongan untuk melamar lowongan.</p>
                                        <div class="process-menu nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                            <a class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">
                                                <div class="d-flex">
                                                    <div class="number flex-shrink-0">
                                                        1
                                                    </div>
                                                    <div class="flex-grow-1 text-start ms-3">
                                                        <h5 class="fs-18">Daftar Akun</h5>
                                                        <p class="text-muted mb-0">Untuk dapat menggunakan semua fitur web termasuk apply lowongan, user diwajibkan untuk mendaftarkan akun.</p>
                                                    </div>
                                                </div>
                                            </a>
                                            <a class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">
                                                <div class="d-flex">
                                                    <div class="number flex-shrink-0">
                                                        2
                                                    </div>
                                                    <div class="flex-grow-1 text-start ms-3">
                                                        <h5 class="fs-18">Cari Lowongan</h5>
                                                        <p class="text-muted mb-0">Terdapat banyak lowongan baik lowongan kerja dan lowongan magang. Gunakan fitur search dan tagging untuk mempermudah mencari lowongan yang seusai dengan minat dan skill anda.</p>
                                                    </div>
                                                </div>
                                            </a>
                                            <a class="nav-link" id="v-pills-messages-tab" data-bs-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">
                                                <div class=" d-flex">
                                                    <div class="number flex-shrink-0">
                                                        3
                                                    </div>
                                                    <div class="flex-grow-1 text-start ms-3">
                                                        <h5 class="fs-18">Apply Lowongan</h5>
                                                        <p class="text-muted mb-0">Setelah anda menemukan lowongan yang cocok, anda dapat melakukan lamaran pekerjaan atau magang dengan manggunakan fitur apply lowongan.</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div><!--end col-->
                                <div class="col-lg-6">
                                    <div class="tab-content" id="v-pills-tabContent">
                                        <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                            <img src="{{ asset('cdc/images/process-01.png') }}" alt="" class="img-fluid">
                                        </div>
                                        <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                                            <img src="{{ asset('cdc/images/process-02.png') }}" alt="" class="img-fluid">
                                        </div>
                                        <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                                            <img src="{{ asset('cdc/images/process-03.png') }}" alt="" class="img-fluid">
                                        </div>
                                    </div>
                                </div>
                            </div> <!--end row-->
                        </div><!--end container-->
                    </section>
                    <!-- END PROCESS -->

                    <!-- START BLOG -->
                    <section class="section">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-6">
                                    <div class="section-title text-center mb-5">
                                        <h3 class="title mb-3">Artikel Terbaru</h3>
                                        <p class="text-muted">Artikel berisi informasi terbaru mengenai career development.</p>
                                    </div>
                                </div>
                                <!--end col-->
                            </div>
                            <!--end row-->
                            <div class="row justify-content-center">
                                @foreach ($articles as $article)
                                    <div class="col-lg-4 col-md-6">
                                        <div class="blog-box card p-2 mt-3">
                                            <div class="blog-img position-relative overflow-hidden">
                                                <img src="{{ asset('storage/' . $article->image) }}" alt="" class="img-fluid" style="max-height: 250px; width: 100%; object-fit: cover;">
                                            </div>
                                            <div class="card-body">
                                                <a href="{{ route('article-detail', $article->id) }}" class="primary-link">
                                                    <h5 class="fs-17 mb-1" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; text-overflow: ellipsis; overflow:hidden">{{ $article->title }}</h5>
                                                </a>
                                                <p class="text-muted fs-14 mb-2"><i class="uil uil-user"></i> CDC PNJ &nbsp;&nbsp;<i class="uil uil-calendar-alt"></i> {{ $article->created_at->format('M d, Y') }}</p>
                                                <p class="text-muted" style="display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; text-overflow: ellipsis; overflow:hidden">{{ $article->content }}</p>
                                                <a href="{{ route('article-detail', $article->id) }}" class="form-text text-primary">Baca Artikel <i class="mdi mdi-chevron-right align-middle"></i></a>
                                            </div>
                                        </div><!--end blog-box-->
                                    </div><!--end col-->
                                @endforeach

                                <div class="text-center mt-5">
                                    <a href="{{ route('articles') }}" class="btn btn-primary">Semua Artikel <i class="uil uil-arrow-right"></i></a>
                                </div>
                            </div>
                            <!--end row-->
                        </div>
                        <!--end container-->
                    </section>
                    <!-- END BLOG -->

                    <!--START CTA-->
                    <section class="section bg-light">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-7">
                                    <div class="text-center">
                                        <h2 class="text-primary mb-4">Anda Memiliki Pertanyaan?</h2>
                                        <p class="text-muted">Silahkan hubungi kami melalui halaman kontak kami.</p>
                                        <div class="mt-4 pt-2">
                                            <a href="{{ route('contact') }}" class="btn btn-primary btn-hover">Kontak Kami</a>
                                        </div>
                                    </div>
                                </div><!--end col-->
                            </div><!--end row-->
                        </div><!--end container-->
                    </section>
                    <!--END CTA-->

                </div>
                <!-- End Page-content -->

                @include('cdc.partials.footer')

                <!--start back-to-top-->
                <button onclick="topFunction()" id="back-to-top">
                    <i class="mdi mdi-arrow-up"></i>
                </button>
                <!--end back-to-top-->
            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->


        <!-- App Js -->
        <script src="{{ asset('cdc/js/app.js') }}"></script>

@endsection
