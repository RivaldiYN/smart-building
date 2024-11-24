@extends('layouts.admin.app')

@section('title', 'Tambah Device')

@section('content')
<div class="card card-success m-2">
  <div class="card-header d-flex justify-content-between align-items-center">
    <h2 class="card-title">{{ __('Tambah Device') }}</h2>
    <a href="{{ url('admin/device') }}" class="btn btn-sm btn-danger ml-auto">Kembali</a>
  </div>

    <!-- /.card-header -->
    <!-- form start -->
        
      <div class="card-body">
        <form action="{{ route('admin.device.store') }}" method="POST">
            @csrf
            <div class="form-group mb-3">
                <label>ID Ruangan</label>
                <input type="text" placeholder="Masukkan ID Ruangan" name="room_id" class="form-control">
            </div>
            <div class="form-group mb-3">
                <label>Nama Device</label>
                <input type="text" placeholder="Masukkan Nama Device" name="name" class="form-control">
            </div>
            <div class="form-group mb-3">
                <label>Link Monitoring</label>
                <input type="text" placeholder="Masukkan Link Monitoring" name="link_monitoring" class="form-control">
            </div>
            <div class="form-group mb-3">
                <label>Link Controlling</label>
                <input type="text" placeholder="Masukkan Link Controlling" name="link_controlling" class="form-control">
            </div>
            <div class="form-group mb-3">
                <label>Satuan</label>
                <input type="text" placeholder="Masukkan Satuan" name="satuan" class="form-control">
            </div>
        <div class="">
            <button type="submit" class="btn btn-success mt-3">{{ __('Simpan') }}</</button>
          </div>
        </form>
      </div>
    
      <!-- /.card-body -->
    
  </div>
@endsection
