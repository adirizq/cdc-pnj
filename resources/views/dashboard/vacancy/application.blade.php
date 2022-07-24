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
                                <h3 class="mb-0">Daftar Lowongan</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('vacancy.create') }}" class="btn btn-primary" type="button">Buat Lowongan Baru</a>
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

                        <div class="table-responsive">
                            <table id="dataTable" class="table align-items-center table-flush">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col text-center">No</th>
                                        <th scope="col text-center">Nama</th>
                                        <th scope="col text-center">NIM</th>
                                        <th scope="col text-center">Program Studi</th>
                                        <th scope="col text-center">Tanggal Melamar</th>
                                        <th scope="col text-center">Status</th>
                                        <th scope="col text-center"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($vacancy->studentProfiles as $application)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $application->user->name }}</td>
                                            <td>{{ $application->student_number }}</td>
                                            <td>{{ $application->major }}</td>
                                            <td>{{ $application->pivot->created_at->toDateString() }}</td>
                                            <td>
                                                @if ($application->pivot->status == 0)
                                                    <span class="badge badge-warning">Proses Seleksi</span>
                                                @elseif ($application->pivot->status == 1)
                                                    <span class="badge badge-danger">Ditolak</span>
                                                @elseif ($application->pivot->status == 2)
                                                    <span class="badge badge-success">Diterima</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($application->pivot->status == 0)
                                                    <a type="button" class="btn btn-sm btn-info" href="{{ route('student_detail', $application->id) }}">Detail Pelamar</a>
                                                    <a type="button" class="btn btn-sm btn-success" href="{{ '/accept-application/' . $vacancy->id . '/' . $application->id }}">Terima</a>
                                                    <a type="button" class="btn btn-sm btn-danger" href="{{ '/decline-application/' . $vacancy->id . '/' . $application->id }}">Tolak</a>
                                                @endif
                                            </td>
                                        </tr>    
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('argon.footers.nav')
@endsection


