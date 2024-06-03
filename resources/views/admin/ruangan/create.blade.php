@extends('layouts.admin.app')

@section('title', 'Tambah ruangan')

@section('content')
<div class="card card-success m-2">
    <div class="card-header">
      <h3 class="card-title">{{ __('Tambah ruangan') }}</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
        
      <div class="card-body">
        <form action="{{ route('admin.ruangan.store') }}" method="POST">
            @csrf
            <div class="form-group mb-3">
                <label>Nama Ruangan</label>
                <input type="text" name="name" class="form-control">
            </div>
            <div class="form-group mb-3">
                <label>Deskripsi</label>
                <input type="text" name="desc" class="form-control">
            </div>
            <div class="form-group mb-3">
                <label>Foto Ruangan</label>
                <input type="text" name="image" class="form-control">
            </div>
            <div class="form-group mb-3">
                <label>Status Ruangan</label>
                <input type="text" name="status" class="form-control">
            </div>
            <div class="form-group mb-3">
                <label>Jumlah Orang</label>
                <input type="number" name="people_count" class="form-control">
            </div>
        <div class="">
            <button type="submit" class="btn btn-success mt-3">{{ __('Simpan') }}</</button>
          </div>
        </form>
      </div>
    
      <!-- /.card-body -->
    
  </div>
@endsection
