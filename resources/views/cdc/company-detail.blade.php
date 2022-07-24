@extends('cdc.main')

@section('content')

    <div>

        @include('cdc.partials.navbar')

        <div class="main-content">

            <div class="page-content">

                @include('cdc.partials.page-title', ['pageTitle' => 'Perusahaan', 'title' => 'Detail Perusahaan'])

                <!-- START COMPANY-DETAILS -->
                <section class="section">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="card side-bar">
                                    <div class="card-body p-4">
                                        <div class="candidate-profile text-center">
                                            <img src="{{ asset('storage/' . $profile->image ) }}" alt="" class="avatar-lg rounded-3">
                                            <h6 class="fs-18 mb-1 mt-4">{{ $profileUser->name }}</h6>
                                            <p class="text-muted mb-4">Sejak {{ $profile->established }}</p>
                                        </div>
                                    </div><!--end candidate-profile-->

                                    <div class="candidate-profile-overview  card-body border-top p-4">
                                        <h6 class="fs-17 fw-medium mb-3">Overview Perusahaan</h6>
                                        <ul class="list-unstyled mb-0">
                                            <li>
                                                <div class="d-flex">
                                                    <label class="text-dark">Sektor</label>
                                                    <div>
                                                        <p class="text-muted mb-0">{{ $profile->sector }}</p>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="d-flex">
                                                    <label class="text-dark">Lokasi</label>
                                                    <div>
                                                        <p class="text-muted mb-0">{{ $profile->location }}</p>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="d-flex">
                                                    <label class="text-dark">Website</label>
                                                    <div>
                                                        <p class="text-muted mb-0">{{ $profile->website }}</p>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="d-flex">
                                                    <label class="text-dark">Berdiri</label>
                                                    <div>
                                                        <p class="text-muted mb-0">{{ $profile->established }}</p>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div><!--candidate-profile-overview-->
                                </div><!--end card-->
                            </div><!--end col-->
                            
                            <div class="col-lg-8">
                                <div class="card ms-lg-4 mt-4 mt-lg-0">
                                    <div class="card-body p-4">

                                        <div class="mb-5">
                                            <h6 class="fs-17 fw-medium mb-4">Tentang Perusahaan</h6>
                                            <p class="text-muted">{!! nl2br($profile->description) !!}</p>
                                        </div>
                                    
                                    </div><!-- card body end -->
                                </div><!--end card-->
                            </div><!--end col-->
                        </div><!--end row-->
                    </div><!--end container-->
                </section>
                <!-- START COMPANY-DETAILS -->

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