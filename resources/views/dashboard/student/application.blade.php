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
                                <h3 class="mb-0">Daftar Lamaran Pekerjaan</h3>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-12"></div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="dataTable" class="table align-items-center table-flush">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col text-center">No</th>
                                        <th scope="col text-center">Judul</th>
                                        <th scope="col text-center">Perusahaan</th>
                                        <th scope="col text-center">Status</th>
                                        <th scope="col text-center">Tanggal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($profile->vacancies as $application)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $application->title }}</td>
                                            <td>{{ $application->companyProfile->user->name }}</td>
                                            <td>
                                                @if ($application->pivot->status == 0)
                                                    <span class="badge badge-warning">Proses Seleksi</span>
                                                @elseif ($application->pivot->status == 1)
                                                    <span class="badge badge-danger">Ditolak</span>
                                                @elseif ($application->pivot->status == 2)
                                                    <span class="badge badge-success">Diterima</span>
                                                @endif
                                            </td>
                                            <td>{{ $application->pivot->created_at->toDateString() }}</td>
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


