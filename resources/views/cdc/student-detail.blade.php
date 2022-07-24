@extends('cdc.main')

@section('content')

    <div>

        @include('cdc.partials.navbar')

        <div class="main-content">

            <div class="page-content">

                @include('cdc.partials.page-title', ['pageTitle' => 'Mahasiswa'])

                <!-- START CANDIDATE-DETAILS -->
                <section class="section">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="card side-bar">
                                    <div class="card-body p-4">
                                        <div class="candidate-profile text-center">
                                            <img src="{{ asset('storage/' . $profile->image ) }}" alt="" class="avatar-lg rounded-3">
                                            <h6 class="fs-18 mb-0 mt-4">{{ $profileUser->name }}</h6>
                                            <p class="text-muted mb-4">{{ $profile->title }}</p>
                                        </div>
                                    </div><!--end candidate-profile-->

                                    <div class="candidate-profile-overview  card-body border-top p-4">
                                        <h6 class="fs-17 fw-semibold mb-3">Overview Mahasiswa</h6>
                                        <ul class="list-unstyled mb-0">
                                            <li>
                                                <div class="d-flex">
                                                    <label class="text-dark">NIM</label>
                                                    <div>
                                                        <p class="text-muted mb-0">{{ $profile->student_number }}</p>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="d-flex">
                                                    <label class="text-dark">Program Studi</label>
                                                    <div>
                                                        <p class="text-muted mb-0">{{ $profile->major }}</p>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="d-flex">
                                                    <label class="text-dark">Bahasa</label>
                                                    <div>
                                                        <p class="text-muted mb-0">{{ $profile->languages }}</p>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="d-flex">
                                                    <label class="text-dark">Skill</label>
                                                    <div>
                                                        <p class="text-muted mb-0">{{ $profile->skills }}</p>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                        <div class="mt-3">
                                            <a href="{{ asset('storage/' . $profile->cv) }}" target="_blank" class="btn btn-primary btn-hover w-100 mt-2"><i class="uil uil-import"></i> Download CV</a>
                                        </div>
                                    </div><!--candidate-profile-overview-->
                    
                                    <div class="candidate-contact-details card-body p-4 border-top">
                                        <h6 class="fs-17 fw-semibold mb-3">Kontak</h6>
                                        <ul class="list-unstyled mb-0">
                                            <li>
                                                <div class="d-flex align-items-center mt-4">
                                                    <div class="icon bg-soft-primary flex-shrink-0">
                                                        <i class="uil uil-envelope-alt"></i>
                                                    </div>
                                                    <div class="ms-3">
                                                        <h6 class="fs-14 mb-1">Email</h6>
                                                        <p class="text-muted mb-0">{{ $profileUser->email }}</p> 
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="d-flex align-items-center mt-4">
                                                    <div class="icon bg-soft-primary flex-shrink-0">
                                                        <i class="uil uil-map-marker"></i>
                                                    </div>
                                                    <div class="ms-3">
                                                        <h6 class="fs-14 mb-1">Alamat</h6>
                                                        <p class="text-muted mb-0">{{ $profile->address }}</p> 
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="d-flex align-items-center mt-4">
                                                    <div class="icon bg-soft-primary flex-shrink-0">
                                                        <i class="uil uil-phone"></i>
                                                    </div>
                                                    <div class="ms-3">
                                                        <h6 class="fs-14 mb-1">Telepon</h6>
                                                        <p class="text-muted mb-0">{{ $profile->phone }}</p> 
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div><!--end candidate-overview-->
                                </div><!--end card-->
                            </div><!--end col-->
                            
                            <div class="col-lg-8">
                                <div class="card candidate-details ms-lg-4 mt-4 mt-lg-0">
                                    <div class="card-body p-4 candidate-personal-detail">
                                        <div>
                                            <h6 class="fs-17 fw-semibold mb-3">Tentang Saya</h6>
                                            <p class="text-muted mb-2">{!! nl2br($profile->about) !!}</p>
                                        </div>
                                        <div>
                                            <h6 class="fs-17 fw-semibold mb-3 mt-4">Pengalaman</h6>
                                            <p class="text-muted mb-2">{!! nl2br($profile->experience) !!}</p>
                                        </div>
                                        <div>
                                            <h6 class="fs-17 fw-semibold mb-3 mt-4">Pendidikan</h6>
                                            <p class="text-muted mb-2">{!! nl2br($profile->education) !!}</p>
                                        </div>
                                    </div><!--end card-body-->
                                </div><!--end card-->
                            </div><!--end col-->
                        </div><!--end row-->
                    </div><!--end container-->
                </section>
                <!-- END CANDIDATE-DETAILS -->

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