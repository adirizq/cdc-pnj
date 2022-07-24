@extends('cdc.main')

@section('content')

    <div>

        @include('cdc.partials.navbar')

        <div class="main-content">

            <div class="page-content">

                @include('cdc.partials.page-title', ['pageTitle' => 'Kontak'])

                <!-- START CONTACT-PAGE -->
                <section class="section">
                    <div class="container">
                        <div class="row align-items-center mt-5">
                            <div class="col-lg-6">
                                <div class="section-title mt-4 mt-lg-0">
                                    <h3 class="title">Hubungi Kami</h3>
                                    <p class="text-muted">Silahkan ajukan pertanyaan, kritik, atau saran kepada kami melalui form dibawah ini.</p>
                                    <form method="post" onsubmit="return validateForm()" class="contact-form mt-4" name="myForm" id="myForm">
                                        <span id="error-msg"></span>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label for="nameInput" class="form-label">Nama</label>
                                                    <input type="text" name="name" id="name" class="form-control"
                                                        placeholder="Masukkan nama anda">
                                                </div>
                                            </div><!--end col-->
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="emailInput" class="form-label">Email</label>
                                                    <input type="email" class="form-control" id="emaiol" name="email"
                                                        placeholder="Masukkan email anda">
                                                </div>
                                            </div><!--end col-->
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="subjectInput" class="form-label">Subject</label>
                                                    <input type="text" class="form-control" id="subjectInput" name="subject" id="subject"
                                                        placeholder="Masukkan subject pesan">
                                                </div>
                                            </div><!--end col-->
                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label for="meassageInput" class="form-label">Pesan Anda</label>
                                                    <textarea class="form-control" id="meassageInput" placeholder="Ketikkan pesan anda" name="comments" id="comments" rows="3"></textarea>
                                                </div>
                                            </div><!--end col-->
                                        </div><!--end row-->
                                        <div class="text-end">
                                            <button type="submit" id="submit" name="submit" class="btn btn-primary"> Kirim Pesan <i class="uil uil-message ms-1"></i></button>
                                        </div>
                                    </form><!--end form-->
                                </div>
                            </div><!--end col-->
                            <div class="col-lg-5 ms-auto order-first order-lg-last">
                                <div class="text-center">
                                    <img src="{{ asset('cdc/images/contact.png') }}" alt="" class="img-fluid">
                                </div>
                                <div class="mt-4 pt-3">
                                    <div class="d-flex text-muted align-items-center mt-2">
                                        <div class="flex-shrink-0 fs-22 text-primary">
                                            <i class="uil uil-map-marker"></i>
                                        </div>
                                        <div class="flex-grow-1 ms-2">
                                            <p class="mb-0"> Jl. Prof. DR. G.A. Siwabessy, Kampus Universitas Indonesia Depok 16425</p>
                                        </div>
                                    </div>
                                    <div class="d-flex text-muted align-items-center mt-2">
                                        <div class="flex-shrink-0 fs-22 text-primary">
                                            <i class="uil uil-envelope"></i>
                                        </div>
                                        <div class="flex-grow-1 ms-2">
                                            <p class="mb-0">cdc@pnj.ac.id</p>
                                        </div>
                                    </div>
                                    <div class="d-flex text-muted align-items-center mt-2">
                                        <div class="flex-shrink-0 fs-22 text-primary">
                                            <i class="uil uil-phone-alt"></i>
                                        </div>
                                        <div class="flex-grow-1 ms-2">
                                            <p class="mb-0">021-</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->
                    </div>
                    <!--end container-->
                </section>
                <!-- START CONTACT-PAGE -->
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