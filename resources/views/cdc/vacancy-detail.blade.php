@extends('cdc.main')

@section('content')

    <div>

        @include('cdc.partials.navbar')

        <div class="main-content">

            <div class="page-content">

                @include('cdc.partials.page-title', ['pageTitle' => 'Lowongan', 'pageTitleLink' => route('vacancies'), 'title' => 'Detail Lowongan'])

                <!-- START JOB-DEATILS -->
                <section class="section">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="card job-detail">
                                    <div class="card-body p-4">
                                        <div>
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <h4 class="mb-1 text-dark">{{ $vacancy->title }}</h4>
                                                    <ul class="list-inline text-muted mb-0">
                                                        <li class="list-inline-item">
                                                            {{ $vacancy->position }} - {{ $companyUser->name }}
                                                        </li>
                                                    </ul>
                                                </div><!--end col-->
                                            </div><!--end row-->    
                                        </div>

                                        <div class="mt-4">
                                            <div class="row g-2">
                                                <div class="col-lg-3">
                                                    <div class="border rounded-start p-3">
                                                        <p class="text-muted mb-0 fs-13">Pengalaman</p>
                                                        <p class="fw-medium fs-15 mb-0">{{ $vacancy->experience }}</p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="border p-3">
                                                        <p class="text-muted fs-13 mb-0">Jenis Lowongan</p>
                                                        <p class="fw-medium mb-0">{{ $vacancy->vacancy_type }}</p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="border p-3">
                                                        <p class="text-muted fs-13 mb-0">Sektor</p>
                                                        <p class="fw-medium mb-0">{{ $company->sector }}</p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="border rounded-end p-3">
                                                        <p class="text-muted fs-13 mb-0">Lokasi</p>
                                                        <p class="fw-medium mb-0">{{ $company->location }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!--end Experience-->

                                        <div class="mt-4">
                                            <h5 class="mb-3">Deskripsi</h5>
                                            <div class="job-detail-desc">
                                                <p class="text-muted mb-0">{!! nl2br($vacancy->description) !!}</p>
                                            </div>
                                        </div>

                                        @if (isset($vacancy->responsibilities))
                                        <div class="mt-4">
                                            <h5 class="mb-3">Tanggung Jawab Pekerjaan</h5>
                                            <div class="job-detail-desc mt-2">
                                                <p class="text-muted">{!! nl2br($vacancy->responsibilities) !!}</p>
                                            </div>
                                        </div>
                                        @endif

                                        @if (isset($vacancy->qualifications))
                                        <div class="mt-4">
                                            <h5 class="mb-3">Kualifikasi</h5>
                                            <div class="job-detail-desc mt-2">
                                                <p class="text-muted">{!! nl2br($vacancy->qualifications) !!}</p>
                                            </div>
                                        </div>
                                        @endif

                                        @if (isset($vacancy->skills))
                                        <div class="mt-4">
                                            <h5 class="mb-3">Skill</h5>
                                            <div class="job-detail-desc mt-2">
                                                <p class="text-muted">{!! nl2br($vacancy->skills) !!}</p>
                                            </div>
                                        </div>
                                        @endif
                                                                            
                                    </div><!--end card-body-->
                                </div><!--end job-detail-->

                            </div><!--end col-->

                            <div class="col-lg-4 mt-4 mt-lg-0">
                                <!--start side-bar-->
                                <div class="side-bar ms-lg-4">
                                    <div class="card job-overview">
                                        <div class="card-body p-4">
                                            <h6 class="fs-17">Job Overview</h6>
                                            <ul class="list-unstyled mt-4 mb-0">
                                                <li>
                                                    <div class="d-flex mt-4">
                                                        <i class="uil uil-briefcase icon bg-soft-primary"></i>
                                                        <div class="ms-3">
                                                            <h6 class="fs-14 mb-2">Jenis Lowongan</h6>
                                                            <p class="text-muted mb-0">{{ $vacancy->vacancy_type }}</p> 
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="d-flex mt-4">
                                                        <i class="uil uil-star-half-alt icon bg-soft-primary"></i>
                                                        <div class="ms-3">
                                                            <h6 class="fs-14 mb-2">Pengalaman</h6>
                                                            <p class="text-muted mb-0">{{ $vacancy->experience }}</p> 
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="d-flex mt-4">
                                                        <i class="uil uil-location-point icon bg-soft-primary"></i>
                                                        <div class="ms-3">
                                                            <h6 class="fs-14 mb-2">Location</h6>
                                                            <p class="text-muted mb-0">{{ $company->location }}</p> 
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="d-flex mt-4">
                                                        <i class="uil uil-graduation-cap icon bg-soft-primary"></i>
                                                        <div class="ms-3">
                                                            <h6 class="fs-14 mb-2">Pendidikan / Gelar</h6>
                                                            <p class="text-muted mb-0">{{ $vacancy->qualification_degree }}</p> 
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="d-flex mt-4">
                                                        <i class="uil uil-building icon bg-soft-primary"></i>
                                                        <div class="ms-3">
                                                            <h6 class="fs-14 mb-2">Sektor</h6>
                                                            <p class="text-muted mb-0">{{ $company->sector }}</p> 
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="d-flex mt-4">
                                                        <i class="uil uil-history icon bg-soft-primary"></i>
                                                        <div class="ms-3">
                                                            <h6 class="fs-14 mb-2">Dipublish pada</h6>
                                                            <p class="text-muted mb-0">{{ $vacancy->created_at->format('M d, Y') }}</p> 
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                            <div class="mt-3">
                                                <a href="{{ isset(auth()->user()->studentProfile->id) ? '/apply/' . $vacancy->id . '/' . auth()->user()->studentProfile->id : '' }}" class="btn btn-primary btn-hover w-100 mt-2">Apply Lowongan <i class="uil uil-arrow-right"></i></a>
                                            </div>
                                        </div><!--end card-body-->
                                    </div><!--end job-overview-->

                                    <div class="card company-profile mt-4">
                                        <div class="card-body p-4">
                                            <div class="text-center">
                                                <img src="{{ asset('storage/' . $company->image) }}" alt="" class="img-fluid rounded-3" width="100px">

                                                <div class="mt-4">
                                                    <h6 class="fs-17 mb-1">{{ $companyUser->name }}</h6>
                                                    <p class="text-muted">Sejak {{ $company->established }}</p>
                                                </div>
                                            </div>
                                            <ul class="list-unstyled mt-4">
                                                <li class="mt-3">
                                                    <div class="d-flex">
                                                        <i class="uil uil-globe text-primary fs-4"></i>
                                                        <div class="ms-3">
                                                            <h6 class="fs-14 mb-2">Website</h6>
                                                            <p class="text-muted fs-14 text-break mb-0">{{ $company->website }}</p>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="mt-3">
                                                    <div class="d-flex">
                                                        <i class="uil uil-map-marker text-primary fs-4"></i>
                                                        <div class="ms-3">
                                                            <h6 class="fs-14 mb-2">Location</h6>
                                                            <p class="text-muted fs-14 mb-0">{{ $company->location }}</p>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                            <div class="mt-4">
                                                <a href="{{ route('company_detail', $company->id) }}" class="btn btn-primary btn-hover w-100 rounded"><i class="mdi mdi-eye"></i> Lihat Profil</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--end side-bar-->
                            </div><!--end col-->
                        </div><!--end row-->
                    </div><!--end container-->
                </section>
                <!-- START JOB-DEATILS -->

                <!-- START MODAL -->
                <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModal" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-body">
                                <div class="py-5 text-center">
                                    <h4 class="modal-title mt-4 text-success">Berhasil Apply Lowongan!</h4>
                                    <div class="position-absolute end-0 top-0 p-3">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <p class="mt-3">Harap pantau status lamaran pada dashboard anda.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- END MODAL -->

                <!-- START MODAL -->
                <div class="modal fade" id="failModal" tabindex="-1" aria-labelledby="failModal" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-body">
                                <div class="py-5 text-center">
                                    <h4 class="modal-title mt-4 text-danger">Gagal Apply Lowongan!</h4>
                                    <div class="position-absolute end-0 top-0 p-3">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <p class="mt-3">Harap lengkapi profil anda terlebih dahulu melalui dashboard anda.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- END MODAL -->


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
    <script src="{{ asset('argon/vendor/jquery/dist/jquery.min.js') }}"></script>

    @if(session('success'))
        <script>
            $(function() {
                $('#successModal').modal('show');
            });
        </script>
    @endif

    @if(session('fail'))
        <script>
            $(function() {
                $('#failModal').modal('show');
            });
        </script>
    @endif
        
@endpush