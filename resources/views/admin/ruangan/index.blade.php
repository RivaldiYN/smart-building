@extends('layouts.admin.app')

@section('title', 'Kelola Ruangan')

@section('content')
    <!--./Tabel User-->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary shadow-lg rounded-lg">
                        @if(session('status'))
                        <h4 class="alert alert-primary mb-2">{{session('status')}}</h4>
                        @endif
                        <div class="card-header bg-warning text-center rounded-top">
                            <h3 class="card-title font-weight-bold">Semua Ruangan</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body" style="overflow-x:auto;">
                            <table class="table table-hover table-bordered table-striped">
                                <thead class="thead-light">
                                    <tr class="text-center">
                                        <th style="width: 10px">No</th>
                                        <th>Nama Ruangan</th>
                                        <th>Deskripsi</th>
                                        <th>Foto Ruangan</th>
                                        <th>Status</th>
                                        <th>Jumlah Orang</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $i = 1;
                                    @endphp
                                    @forelse($ruangans as $key => $item)
                                    <tr class="text-center align-middle">
                                        <td>{{ $i++ }}.</td>
                                        <td>{{ $item['name'] }}</td>
                                        <td>{{ $item['desc'] }}</td>
                                        <td>{{ $item['image'] }}</td>
                                        <td>
                                            @if($item['status'] != 'Nyala')
                                                <span class="badge badge-danger">Not Available</span>
                                            @else
                                                <span class="badge badge-success">Available</span>
                                            @endif
                                        </td>
                                        <td>{{ $item['people_count'] }}</td>
                                        <td>
                                            <a href="{{ route('admin.ruangan.edit', $key) }}" class="btn btn-sm btn-success btn-block">
                                                <i class="fas fa-edit"></i> Edit
                                            </a>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-danger btn-block" data-toggle="modal" data-target="#deleteModal{{ $key }}">
                                                <i class="fas fa-trash"></i> Delete
                                            </button>

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
                                                            Apakah Anda yakin ingin menghapus ruangan <strong>{{ $item['name'] }}</strong>?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <form action="{{ route('admin.ruangan.destroy', $key) }}" method="POST">
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
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="8" class="text-center">Data Tidak Ada</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
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
