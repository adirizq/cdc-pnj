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
                                <h3 class="mb-0">Buat Artikel</h3>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-12"></div>

                    <div class="card-body">
                        <form action="{{ route('article.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <img src="" style="max-height: 200px" class="img-preview img-fluid mb-3">
                                <label class="h5">Gambar Thumbnail Artikel (Maks 5 Mb)</label>
                                <input class="form-control @error('image') is-invalid @enderror" type="file" id="image"
                                    name="image" onchange="previewImage()" required>
                                @error('image')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="h5">Judul</label>
                                <div class="input-group">
                                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="Judul Artikel" value="{{ old('title') }}" required>
                                </div>
                                @error('title')
                                    <span class="invalid-feedback d-inline" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
    
                            <div class="form-group">
                                <label class="h5">Isi</label>
                                <div class="input-group">
                                    <textarea type="text" rows="4" class="form-control @error('content') is-invalid @enderror" id="content" name="content" placeholder="Isi Artikel" value="{{ old('content') }}" required></textarea>
                                </div>
                                @error('content')
                                    <span class="invalid-feedback d-inline" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary mt-5">Publish Artikel</button>
                        </form>
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


