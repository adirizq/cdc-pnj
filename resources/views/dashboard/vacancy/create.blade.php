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
                                <h3 class="mb-0">Buat Lowongan</h3>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-12"></div>

                    <div class="card-body">
                        @if (session('fail'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <span class="alert-inner--text">{{ session('fail') }}</span>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>  
                        @endif

                        <form action="{{ route('vacancy.store') }}" method="post">
                            @csrf

                            <div class="form-group">
                                <label class="h5">Judul</label>
                                <div class="input-group">
                                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="Judul Lowongan" value="{{ old('title') }}" required>
                                </div>
                                @error('title')
                                    <span class="invalid-feedback d-inline" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="h5">Posisi</label>
                                <div class="input-group">
                                    <input type="text" class="form-control @error('position') is-invalid @enderror" id="position" name="position" placeholder="Posisi Lowongan" value="{{ old('position') }}" required>
                                </div>
                                @error('position')
                                    <span class="invalid-feedback d-inline" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="h5">Jenis Lowongan</label>
                                <div class="input-group">
                                    <select class="form-control @error('vacancy_type') is-invalid @enderror" id="vacancy_type" name="vacancy_type" required>
                                        <option value="" hidden>Pilih Jenis Lowongan</option>
                                        <option value="Kerja">Kerja</option>
                                        <option value="Magang">Magang</option>
                                    </select>
                                </div>
                                @error('vacancy_type')
                                    <span class="invalid-feedback d-inline" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="h5">Kategori Lowongan</label>
                                <div class="input-group">
                                    <select class="form-control @error('category_id') is-invalid @enderror" id="category_id" name="category_id" required>
                                        <option value="" hidden>Pilih Kategori Lowongan</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('category_id')
                                    <span class="invalid-feedback d-inline" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="h5">Status Lowongan</label>
                                <div class="input-group">
                                    <select class="form-control @error('status') is-invalid @enderror" id="status" name="status" required>
                                        <option value="" hidden>Pilih Status Lowongan</option>
                                        <option value="1">Aktif</option>
                                        <option value="0">Nonaktif</option>
                                    </select>
                                </div>
                                @error('status')
                                    <span class="invalid-feedback d-inline" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="h5">Pengalaman</label>
                                <div class="input-group">
                                    <input type="text" class="form-control @error('experience') is-invalid @enderror" id="experience" name="experience" placeholder="Pengalaman pelamar" value="{{ old('experience') }}" required>
                                </div>
                                @error('experience')
                                    <span class="invalid-feedback d-inline" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="h5">Pendidikan / Gelar</label>
                                <div class="input-group">
                                    <input type="text" class="form-control @error('qualification_degree') is-invalid @enderror" id="qualification_degree" name="qualification_degree" placeholder="Minimum pendidikan atau gelar pelamar" value="{{ old('qualification_degree') }}" required>
                                </div>
                                @error('qualification_degree')
                                    <span class="invalid-feedback d-inline" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
    
                            <div class="form-group">
                                <label class="h5">Deskripsi</label>
                                <div class="input-group">
                                    <textarea type="text" rows="3" class="form-control @error('description') is-invalid @enderror" id="description" name="description" placeholder="Deskripsi Lowongan" required>{{ old('description') }}</textarea>
                                </div>
                                @error('description')
                                    <span class="invalid-feedback d-inline" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="h5">Tanggung Jawab</label>
                                <div class="input-group">
                                    <textarea type="text" rows="3" class="form-control @error('responsibilities') is-invalid @enderror" id="responsibilities" name="responsibilities" placeholder="Tanggung jawab pekerjaan">{{ old('responsibilities') }}</textarea>
                                </div>
                                @error('responsibilities')
                                    <span class="invalid-feedback d-inline" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="h5">Kualifikasi</label>
                                <div class="input-group">
                                    <textarea type="text" rows="3" class="form-control @error('qualifications') is-invalid @enderror" id="qualifications" name="qualifications" placeholder="Kualifikasi pelamar">{{ old('qualifications') }}</textarea>
                                </div>
                                @error('qualifications')
                                    <span class="invalid-feedback d-inline" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="h5">Skill</label>
                                <div class="input-group">
                                    <textarea type="text" rows="3" class="form-control @error('skills') is-invalid @enderror" id="skills" name="skills" placeholder="Skill pelamar yang diharapkan">{{ old('skills') }}</textarea>
                                </div>
                                @error('skills')
                                    <span class="invalid-feedback d-inline" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary mt-5">Publish Lowongan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        @include('argon.footers.nav')
@endsection



