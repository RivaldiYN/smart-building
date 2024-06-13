@extends('layouts.admin.app')

@section('title', 'Kelola Ruangan')

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
                        <div class="card-header bg-warning ">
                            <h3 class="card-title">Semua Ruangan</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body" style="overflow-x:overlay">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
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
                                    $i=1;
                                    @endphp
                                    @forelse($ruangans as $key => $item)
                                    <tr>
                                        <td>{{ $i++ }}.</td>
                                        <td>{{ $item['name'] }}</td>
                                        <td>{{ $item['desc'] }}</td>
                                        <td>{{ $item['image'] }}</td>
                                        <td>{{ $item['status'] }}</td>
                                        <td>{{ $item['people_count'] }}</td>
                                        <td><a href=" {{ route('admin.ruangan.edit', $key) }} " class="btn btn-sm btn-success">Edit</a></td>
                                        <td>
                                            <form action="{{ route('admin.ruangan.destroy', $key) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                            </form>
                                        </td>
                                        {{-- <td><a href=" {{ route('admin.ruangan.destroy', $key) }} " class="btn btn-sm btn-danger">Delete</a></td> --}}
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="8"> Data Tidak Ada</td>
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