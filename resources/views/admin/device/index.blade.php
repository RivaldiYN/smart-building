@extends('layouts.admin.app')

@section('title', 'Kelola Device')

@section('content')
    <!--./Tabel User-->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        @if(session('status'))
                        <h4 class="alert alert-warning mb-2">{{session('status')}}</h4>
                        @endif
                        <div class="card-header">
                            <h3 class="card-title">Semua Device</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body" style="overflow-x:overlay">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">No</th>
                                        <th>Room ID</th>
                                        <th>Nama Device</th>
                                        <th>Link Monitoring</th>
                                        <th>Link Controlling</th>
                                        <th>Satuan</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $i=1;
                                    @endphp
                                    @forelse($devices as $key => $item)
                                    <tr>
                                        <td>{{ $i++ }}.</td>
                                        <td>{{ $item['room_id'] }}</td>
                                        <td>{{ $item['name'] }}</td>
                                        <td>{{ $item['link_monitoring'] }}</td>
                                        <td>{{ $item['link_controlling'] }}</td>
                                        <td>{{ $item['satuan'] }}</td>
                                        <td><a href=" {{ route('admin.device.edit', $key) }} " class="btn btn-sm btn-success">Edit</a></td>
                                        <td>
                                            <form action="{{ route('admin.device.destroy', $key) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                        </td>
                                        {{-- <td><a href=" {{ route('admin.device.destroy', $key) }} " class="btn btn-sm btn-danger">Delete</a></td> --}}
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