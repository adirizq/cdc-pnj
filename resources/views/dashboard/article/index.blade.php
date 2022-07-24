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
                                <h3 class="mb-0">Daftar Artikel</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('article.create') }}" class="btn btn-primary" type="button">Buat Artikel Baru</a>
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
                                        <th scope="col text-center">Judul</th>
                                        <th scope="col text-center">Dibuat Tanggal</th>
                                        <th scope="col text-center"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($articles as $article)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $article->title }}</td>
                                            <td>{{ $article->created_at->toDateString() }}</td>
                                            <td>
                                                <a type="button" class="btn btn-sm btn-warning" href="{{ route('article.edit', $article->id) }}">Edit</a>
                                                <button type="button" data-toggle="modal" class="btn btn-sm btn-danger" data-target="#deleteModal" data-title="{{ $article->title }}" data-id="{{ $article->id }}">Hapus</button>
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

        <!-- Modal -->
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
            <div class="modal-dialog modal-danger modal-dialog-centered " role="document">
                <div class="modal-content bg-gradient-danger">
                    
                    <div class="modal-header">
                        <h6 class="modal-title" id="modal-title-notification">Peringatan</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    
                    <div class="modal-body">
                        
                        <div class="py-3 text-center">
                            <i class="ni ni-bell-55 ni-3x"></i>
                            <h4 class="heading mt-4">Hapus Artikel?</h4>
                            <p>Apa kamu ingin menghapus artikel ini? <br> Setiap artikel yang sudah dihapus tidak dapat dikembalikan!</p>
                        </div>
                        
                    </div>
                    
                    <div class="modal-footer">
                        <form method="post" id="form_delete"
                            class="d-inline">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-white">Hapus Artikel</button>
                        </form>
                        <button type="button" class="btn btn-link text-white ml-auto" data-dismiss="modal">Tutup</button> 
                    </div>
                    
                </div>
            </div>
        </div>

        @include('argon.footers.nav')
@endsection

@push('js')
    <script>
        $('#deleteModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var id = button.data('id') // Extract info from data-* attributes
            var title = button.data('title') 
            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            var modal = $(this)
            var baseUrl = '{{ url('/') }}'

            modal.find('.modal-body .heading').html('Hapus Artikel ' + title + ' ?')
            modal.find('.modal-footer #form_delete').attr('action', baseUrl + '/article/' + id);
        })
    </script>
@endpush

