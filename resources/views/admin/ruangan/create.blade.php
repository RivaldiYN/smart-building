@extends('layouts.admin.app')

@section('title', 'Tambah ruangan')

@section('content')
<div class="card card-success m-2">
  <div class="card-header d-flex justify-content-between align-items-center">
    <h2 class="card-title">{{ __('Tambah ruangan') }}</h2>
    <a href="{{ url('admin/ruangan') }}" class="btn btn-sm btn-danger ml-auto">Kembali</a>
  </div>

    <!-- /.card-header -->
    <!-- form start -->
        
      <div class="card-body">
        <form action="{{ route('admin.ruangan.store') }}" method="POST">
            @csrf
            <div class="form-group mb-3">
                <label>Nama Ruangan</label>
                <input type="text" placeholder="Masukkan Nama Ruangan" name="name" class="form-control">
            </div>
            <div class="form-group mb-3">
                <label>Deskripsi</label>
                <input type="text" placeholder="Masukkan Deskripsi" name="desc" class="form-control">
            </div>
            <div class="form-group mb-3">
                <label>Foto Ruangan</label>
                <input type="text" placeholder="Masukkan Foto Ruangan" name="image" class="form-control">
            </div>
            <div class="form-group mb-3">
                <label>Status Ruangan</label>
                <input type="text" placeholder="Masukkan Status Ruangan" name="status" class="form-control">
            </div>
            <div class="form-group mb-3">
                <label>Jumlah Orang</label>
                <input type="number" placeholder="Masukkan Jumlah Orang" name="people_count" class="form-control">
            </div>
        <div class="">
            <button type="submit" class="btn btn-success mt-3">{{ __('Simpan') }}</</button>
          </div>
        </form>
      </div>
    
      <!-- /.card-body -->
    
  </div>
@endsection
