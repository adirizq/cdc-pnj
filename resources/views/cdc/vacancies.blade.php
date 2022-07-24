@extends('cdc.main')

@push('head')
    <!-- Choise Css -->
    <link rel="stylesheet" href="{{ asset('cdc/libs/choices.js/public/assets/styles/choices.min.css') }}">
@endpush

@section('content')

    <div>

        @include('cdc.partials.navbar')

        <div class="main-content">

            <div class="page-content">

                @include('cdc.partials.page-title', ['pageTitle' => 'Lowongan'])

                <!-- START JOB-LIST -->
                <section class="section">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-9">
                                <div class="me-lg-5">
                                    <div class="job-list-header">
                                        <form action="#">
                                            <div class="row g-2">
                                                <div class="col-lg-4 col-md-12">
                                                    <div class="filler-job-form">
                                                        <i class="uil uil-briefcase-alt"></i>
                                                        <input type="search" class="form-control filter-job-input-box" id="exampleFormControlInput1" placeholder="Cari lowongan... ">
                                                    </div>
                                                </div><!--end col-->
                                                <div class="col-lg-4 col-md-6">
                                                    <div class="filler-job-form">
                                                        <i class="uil uil-clipboard-notes"></i>
                                                        <select class="form-select" data-trigger name="choices-single-categories" id="choices-single-categories" aria-label="Default select example">
                                                            @foreach ($categories as $category)
                                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div><!--end col-->
                                                <div class="col-lg-4 col-md-6">
                                                    <a href="javascript:void(0)" class="btn btn-primary w-100"><i class="uil uil-filter"></i> Fliter</a>
                                                </div><!--end col-->
                                            </div><!--end row-->
                                        </form>
                                    </div><!--end job-list-header-->

                                    <!-- Job-list -->
                                    <div>
                                        @foreach ($vacancies as $vacancy)
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
                                    </div>
                                    <!-- End Job-list -->
                                    <div class="row">
                                        <div class="col-lg-12 mt-5 pt-2 d-flex justify-content-center">
                                            {{ $vacancies->links('vendor.pagination.default') }}
                                        </div><!--end col-->
                                    </div><!-- end row -->
                                </div>
                            </div><!--end col-->
                            
                            <!-- START SIDE-BAR -->
                            <div class="col-lg-3">
                                <div class="side-bar mt-5 mt-lg-0">
                                    <div class="accordion" id="accordionExample">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="jobType">
                                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#jobtype" aria-expanded="false" aria-controls="jobtype">
                                                    Jenis Lowongan
                                                </button>
                                            </h2>
                                            <div id="jobtype" class="accordion-collapse collapse show" aria-labelledby="jobType">
                                                <div class="accordion-body">
                                                    <div class="side-title">
                                                        <div class="form-check mt-2">
                                                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault6" checked>
                                                            <label class="form-check-label ms-2 text-muted" for="flexRadioDefault6">
                                                                Kerja
                                                            </label>
                                                        </div>
                                                        <div class="form-check mt-2">
                                                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2">
                                                            <label class="form-check-label ms-2 text-muted" for="flexRadioDefault2">
                                                                Magang
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- end accordion-item -->
                                
                                        <div class="accordion-item mt-3">
                                            <h2 class="accordion-header" id="datePosted">
                                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#dateposted" aria-expanded="false" aria-controls="dateposted">
                                                    Tanggal Terbit Lowongan
                                                </button>
                                            </h2>
                                            <div id="dateposted" class="accordion-collapse collapse show" aria-labelledby="datePosted">
                                                <div class="accordion-body">
                                                    <div class="side-title form-check-all">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" id="checkAll" value="" />
                                                            <label class="form-check-label ms-2 text-muted" for="checkAll">
                                                                All
                                                            </label>
                                                        </div>
                                                        <div class="form-check mt-2">
                                                            <input class="form-check-input" type="checkbox" name="datePosted" value="last" id="flexCheckChecked6" />
                                                            <label class="form-check-label ms-2 text-muted" for="flexCheckChecked6">
                                                                24 Jam Terakhir
                                                            </label>
                                                        </div>
                                                        <div class="form-check mt-2">
                                                            <input class="form-check-input" type="checkbox" name="datePosted" value="last" id="flexCheckChecked7" />
                                                            <label class="form-check-label ms-2 text-muted" for="flexCheckChecked7">
                                                                7 Hari Terakhir
                                                            </label>
                                                        </div>
                                                        <div class="form-check mt-2">
                                                            <input class="form-check-input" type="checkbox" name="datePosted" value="last" id="flexCheckChecked8" />
                                                            <label class="form-check-label ms-2 text-muted" for="flexCheckChecked8">
                                                                14 Hari Terakhir
                                                            </label>
                                                        </div>
                                                        <div class="form-check mt-2">
                                                            <input class="form-check-input" type="checkbox" name="datePosted" value="last" id="flexCheckChecked9" />
                                                            <label class="form-check-label ms-2 text-muted" for="flexCheckChecked9">
                                                                30 Hari Terakhir
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- end accordion-item -->
                                
                                    </div><!--end accordion-->
                                    
                                </div><!--end side-bar-->
                            </div><!--end col-->
                            <!-- END SIDE-BAR -->
                        </div><!--end row-->
                    </div><!--end container-->
                </section>
                <!-- END JOB-LIST -->

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

@endsection

@push('js')
    <!-- Choice Js -->
    <script src="{{ asset('cdc/libs/choices.js/public/assets/scripts/choices.min.js') }}"></script>

    <script>
        var singleCategorie = document.getElementById('choices-single-categories');
        if(singleCategorie){
            var singleCategories = new Choices('#choices-single-categories');
        }
    </script>
@endpush