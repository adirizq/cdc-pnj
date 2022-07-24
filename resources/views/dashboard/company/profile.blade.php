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
                                <a href="{{ isset($profile->sector) ? route('company_detail', $profile->id) : '' }}" class="btn btn-primary" type="button" {{ isset($profile->sector) ? '' : 'data-toggle="modal" data-target="#warningModal"' }}>Lihat Profile</a>
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

                        <form action="{{ route('company-profile.update', $profile->id) }}" method="post" enctype="multipart/form-data">
                            @method('put')
                            @csrf

                            <div class="form-group">
                                <input type="hidden" name="oldImage" value="{{ $profile->image }}">
                                <img src="{{ isset($profile->image) ? asset('storage/' . $profile->image) : '' }}" style="max-height: 200px" class="img-preview img-fluid mb-3"> <br>
                                <label class="h5">Logo Perusahaan (Maks 5 Mb)</label>
                                <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
                                @error('image')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="h5">Sektor</label>
                                <div class="input-group">
                                    <input type="text" class="form-control @error('sector') is-invalid @enderror" id="sector" name="sector" placeholder="Sektor Perusahaan" value="{{ old('sector', $profile->sector) }}" required>
                                </div>
                                @error('sector')
                                    <span class="invalid-feedback d-inline" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="h5">Lokasi</label>
                                <div class="input-group">
                                    <input type="text" class="form-control @error('location') is-invalid @enderror" id="location" name="location" placeholder="Lokasi Perusahaan" value="{{ old('location', $profile->location) }}" required>
                                </div>
                                @error('location')
                                    <span class="invalid-feedback d-inline" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="h5">Website</label>
                                <div class="input-group">
                                    <input type="text" class="form-control @error('website') is-invalid @enderror" id="website" name="website" placeholder="Website Perusahaan" value="{{ old('website', $profile->website) }}" required>
                                </div>
                                @error('website')
                                    <span class="invalid-feedback d-inline" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="h5">Tanggal / Tahun Pendirian</label>
                                <div class="input-group">
                                    <input type="text" class="form-control @error('established') is-invalid @enderror" id="established" name="established" placeholder="Tanggal / Tahun didirikannya Perusahaan" value="{{ old('established', $profile->established) }}" required>
                                </div>
                                @error('established')
                                    <span class="invalid-feedback d-inline" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
    
                            <div class="form-group">
                                <label class="h5">Deskripsi</label>
                                <div class="input-group">
                                    <textarea type="text" rows="3" class="form-control @error('description') is-invalid @enderror" id="description" name="description" placeholder="Deskripsi Perusahaan" required>{!! nl2br(old('description', $profile->description)) !!}</textarea>
                                </div>
                                @error('description')
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



