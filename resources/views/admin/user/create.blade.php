@extends('layouts.admin.app')

@section('title', 'Tambah User')

@section('content')
<div class="card card-success m-2">
  <div class="card-header d-flex justify-content-between align-items-center">
    <h2 class="card-title">{{ __('Tambah User') }}</h2>
    <a href="{{ url('admin/user') }}" class="btn btn-sm btn-danger ml-auto">Kembali</a>
  </div>

    <!-- /.card-header -->
    <!-- form start -->
        
      <div class="card-body">
        <form action="{{ route('admin.user.store') }}" method="POST">
            @csrf
            <div class="form-group mb-3">
                <label>Nama User</label>
                <input type="text" name="nama" class="form-control">
            </div>

            <div class="form-group mb-3">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>
        
            <div class="form-group mb-3">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>
        
            <div class="form-group mb-3">
                <label for="roles_id">Role</label>
                <select name="roles_id" id="roles_id" class="form-control" required>
                    @foreach($roles as $role)
                        <option value="{{ $role->id }}">{{ $role->nama_roles }}</option>
                    @endforeach
                </select>
            </div>
        
            <!-- Tambahkan field tambahan jika diperlukan -->
        
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
      </div>
    
      <!-- /.card-body -->
    
  </div>
@endsection
