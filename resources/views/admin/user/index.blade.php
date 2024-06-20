@extends('layouts.admin.app')

@section('title', 'Kelola User')

@section('content')
    <!--./Tabel User-->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        @if(session('status'))
                        <h4 class="alert alert-primary mb-2">{{session('status')}}</h4>
                        @endif
                        <div class="card-header bg-warning">
                            <h3 class="card-title">Semua User</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body" style="overflow-x:overlay">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">No</th>
                                        <th>Nama User</th>
                                        <th>Email</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $i=1;
                                    @endphp
                                    @forelse($users as $key => $item)
                                    <tr>
                                        <td>{{ $i++ }}.</td>
                                        <td>{{ $item['nama'] }}</td>
                                        <td>{{ $item['email'] }}</td>
                                        <td><a href=" {{ route('admin.user.edit', $key) }} " class="btn btn-sm btn-success">Edit</a></td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal{{ $key }}">Delete</button>
                                            
                                            <!-- Modal -->
                                            <div class="modal fade" id="deleteModal{{ $key }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel{{ $key }}" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="deleteModalLabel{{ $key }}">Konfirmasi Hapus</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Apakah Anda yakin ingin menghapus ruangan <strong>{{ $item['nama'] }}</strong>?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <form action="{{ route('admin.user.destroy', $key) }}" method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger">Hapus</button>
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="5"> Data Tidak Ada</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer clearfix">
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
@endsection
@section('scripts')
    <script>
        $(document).ready(function(){
            $('[data-toggle="modal"]').on('click', function(){
                var target = $(this).attr('data-target');
                $(target).modal('show');
            });
        });
    </script>
@endsection