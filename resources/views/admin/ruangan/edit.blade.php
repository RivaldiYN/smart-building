@extends('layouts.admin.app')

@section('title', 'Edit Ruangan')

@section('content')
<div class="card card-success m-2">
  <div class="card-header d-flex justify-content-between align-items-center">
    <h2 class="card-title">{{ __('Edit Ruangan') }}</h2>
    <a href="{{ url('admin/ruangan') }}" class="btn btn-sm btn-danger ml-auto">Kembali</a>
  </div>

    <!-- /.card-header -->
    <!-- form start -->
        
      <div class="card-body">
        <form action="{{ route('admin.ruangan.update', $key) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group mb-3">
                <label>Nama Ruangan</label>
                <input type="text" name="name" value="{{$editdata['name']}}" class="form-control">
            </div>
            <div class="form-group mb-3">
                <label>Deskripsi</label>
                <input type="text" name="desc" value="{{$editdata['desc']}}" class="form-control">
            </div>
            <div class="form-group mb-3">
                <label>Foto Ruangan</label>
                <input type="text" name="image" value="{{$editdata['image']}}" class="form-control">
            </div>
            <div class="form-group mb-3">
                <label>Status Ruangan</label>
                <input type="text" name="status" value="{{$editdata['status']}}" class="form-control">
            </div>
            <div class="form-group mb-3">
                <label>Jumlah Orang</label>
                <input type="number" name="people_count" value="{{$editdata['people_count']}}" class="form-control">
            </div>
        <div class="">
            <button type="submit" class="btn btn-success mt-3">{{ __('Simpan') }}</</button>
          </div>
        </form>
      </div>
    
      <!-- /.card-body -->
    
  </div>
@endsection