@extends('argon.app')

@section('content')
    <div class="header bg-gradient-primary pb-5 pt-5 pt-md-8"> 
        <div class="container-fluid">
            <div class="header-body">
            </div>
        </div>
    </div>

    <div class="container-fluid mt--7 pt-5 pt-md-0">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Ubah Profile</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ isset($profile->title) ? route('student_detail', $profile->id) : '' }}" class="btn btn-primary" type="button" {{ isset($profile->title) ? '' : 'data-toggle="modal" data-target="#warningModal"' }}>Lihat Profile</a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-12"></div>

                    <div class="card-body">
                        @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <span class="alert-inner--text">{{ session('success') }}</span>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>  
                        @endif

                        <form action="{{ route('student-profile.update', $profile->id) }}" method="post" enctype="multipart/form-data">
                            @method('put')
                            @csrf

                            <div class="form-group">
                                <input type="hidden" name="oldImage" value="{{ $profile->image }}">
                                <img src="{{ isset($profile->image) ? asset('storage/' . $profile->image) : '' }}" style="max-height: 200px" class="img-preview img-fluid mb-3"> <br>
                                <label class="h5">Foto (Maks 5 Mb)</label>
                                <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
                                @error('image')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <input type="hidden" name="oldCV" value="{{ $profile->cv }}">
                                <label class="h5">CV (Maks 5 Mb)</label>
                                <input class="form-control @error('cv') is-invalid @enderror" type="file" id="cv" name="cv">
                                @error('cv')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="h5">Title</label>
                                <div class="input-group">
                                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="Masukkan title anda" value="{{ old('title', $profile->title) }}" required>
                                </div>
                                @error('title')
                                    <span class="invalid-feedback d-inline" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="h5">NIM</label>
                                <div class="input-group">
                                    <input type="number" class="form-control @error('student_number') is-invalid @enderror" id="student_number" name="student_number" placeholder="Masukkan Nomor Induk Mahasiswa anda" value="{{ old('student_number', $profile->student_number) }}" required>
                                </div>
                                @error('student_number')
                                    <span class="invalid-feedback d-inline" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="h5">Program Studi</label>
                                <div class="input-group">
                                    <input type="text" class="form-control @error('major') is-invalid @enderror" id="major" name="major" placeholder="Masukkan program studi anda" value="{!! nl2br(old('major', $profile->major)) !!}" required>
                                </div>
                                @error('major')
                                    <span class="invalid-feedback d-inline" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="h5">Keahlian bahasa</label>
                                <div class="input-group">
                                    <input type="text" class="form-control @error('languages') is-invalid @enderror" id="languages" name="languages" placeholder="Masukkan bahasa yang anda kuasai" value="{!! nl2br(old('languages', $profile->languages)) !!}" required>
                                </div>
                                @error('languages')
                                    <span class="invalid-feedback d-inline" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="h5">Skill</label>
                                <div class="input-group">
                                    <input type="text" class="form-control @error('skills') is-invalid @enderror" id="skills" name="skills" placeholder="Masukkan skill anda" value="{!! nl2br(old('skills', $profile->skills)) !!}" required>
                                </div>
                                @error('skills')
                                    <span class="invalid-feedback d-inline" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="h5">Alamat</label>
                                <div class="input-group">
                                    <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" placeholder="Masukkan alamat anda" value="{{ old('address', $profile->address) }}" required>
                                </div>
                                @error('address')
                                    <span class="invalid-feedback d-inline" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="h5">Nomor Telepon</label>
                                <div class="input-group">
                                    <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" placeholder="Masukkan nomor telepon anda" value="{{ old('phone', $profile->phone) }}" required>
                                </div>
                                @error('phone')
                                    <span class="invalid-feedback d-inline" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
    
                            <div class="form-group">
                                <label class="h5">Tentang</label>
                                <div class="input-group">
                                    <textarea type="text" rows="3" class="form-control @error('about') is-invalid @enderror" id="about" name="about" placeholder="Ceritakan tentang diri anda" required>{{ old('about', $profile->about) }}</textarea>
                                </div>
                                @error('about')
                                    <span class="invalid-feedback d-inline" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="h5">Pengalaman</label>
                                <div class="input-group">
                                    <textarea type="text" rows="3" class="form-control @error('experience') is-invalid @enderror" id="experience" name="experience" placeholder="Ceritakan / list pengalaman anda" required>{{ old('experience', $profile->experience) }}</textarea>
                                </div>
                                @error('experience')
                                    <span class="invalid-feedback d-inline" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="h5">Pendidikan</label>
                                <div class="input-group">
                                    <textarea type="text" rows="3" class="form-control @error('education') is-invalid @enderror" id="education" name="education" placeholder="Ceritakan / list pendidikan anda" required>{{ old('education', $profile->education) }}</textarea>
                                </div>
                                @error('education')
                                    <span class="invalid-feedback d-inline" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary mt-5">Simpan Perubahan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="warningModal" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
            <div class="modal-dialog modal-warning modal-dialog-centered " role="document">
                <div class="modal-content bg-warning">
                    
                    <div class="modal-header">
                        <h6 class="modal-title" id="modal-title-notification">Peringatan</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    
                    <div class="modal-body">
                        
                        <div class="py-3 text-center">
                            <i class="ni ni-bell-55 ni-3x"></i>
                            <h4 class="heading mt-4">Harap Perbarui Profile</h4>
                            <p>Harap perbarui profile anda sebelum menggunakan fitur ini</p>
                        </div>
                        
                    </div>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-link text-white ml-auto" data-dismiss="modal">Tutup</button> 
                    </div>
                    
                </div>
            </div>
        </div>

        @include('argon.footers.nav')
@endsection

@push('js')
    <script>
        function previewImage() {
        const image = document.querySelector('#image');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }
    </script>
@endpush



