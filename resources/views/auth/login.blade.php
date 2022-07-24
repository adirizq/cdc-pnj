
@extends('cdc.main')

@section('content')
    <!-- Begin page -->
    <div>
                
        <div class="main-content">

            <div class="page-content">

                <!-- START SIGN-IN -->
                <section class="bg-auth">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="auth-content card-body p-5 h-100">
                                        <div class="w-100">
                                            <div class="text-center w-100 mb-5">
                                                <a href="{{ route('home') }}">
                                                    <img src="{{ asset('assets/img/cdc.png') }}" alt="" height="56" class="logo-dark">
                                                </a>
                                            </div>
                                            <div class="text-center mb-5">
                                                <h5 class="text-primary">Selamat Datang!</h5>
                                                <p class="text-white-70">Silahkan masuk dengan mengisi informasi akun anda.</p>
                                            </div>
                                            @if (session('success'))
                                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                    <span class="alert-inner--text">{{ session('success') }}</span>
                                                </div>  
                                            @endif
                                            <form action="{{ route('login') }}" class="auth-form" role="form" method="POST">
                                                @csrf
                                                <div class="mb-3">
                                                    <label for="email" class="form-label">Email</label>
                                                    <input type="email" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" id="email" placeholder="Masukkan email anda" name="email" 
                                                        value="{{ old('email') }}" required>
                                                    @if ($errors->has('email'))
                                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                                            <strong>{{ $errors->first('email') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                                <div class="mb-3">
                                                    <label for="password" class="form-label">Password</label>
                                                    <input type="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" id="password" placeholder="Masukkan password anda" type="password" name="password" required>
                                                    @if ($errors->has('password'))
                                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                                            <strong>{{ $errors->first('password') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                                <div class="mb-4">
                                                    <div class="form-check">
                                                        <a href="reset-password.html" class="float-end text-white">Lupa Password?</a>
                                                    </div>
                                                </div>
                                                <div class="text-center">
                                                    <button type="submit" class="btn btn-primary btn-hover w-100">Masuk</button>
                                                </div>
                                            </form>
                                            <div class="mt-4 text-center">
                                                <p class="mb-0">Belum punya akun? <a href="{{ route('register') }}" class="fw-medium text-primary text-decoration-underline"> Daftar disini </a></p>
                                            </div>
                                        </div>
                                    </div>
                                </div><!--end auth-box-->
                            </div><!--end col-->
                        </div><!--end row-->
                    </div><!--end container-->
                </section>
                <!-- END SIGN-IN -->
                
            </div>
            <!-- End Page-content -->

        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->
@endsection