@extends('layouts.admin.app')

@section('title', 'Edit User')

@section('content')
<div class="card card-success m-2">
  <div class="card-header d-flex justify-content-between align-items-center">
    <h2 class="card-title">{{ __('Edit User') }}</h2>
    <a href="{{ url('admin/user') }}" class="btn btn-sm btn-danger ml-auto">Kembali</a>
  </div>

    <!-- /.card-header -->
    <!-- form start -->
        
      <div class="card-body">
        <form action="{{ route('admin.user.update', $key) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group mb-3">
                <label>Nama User</label>
                <input type="text" name="nama" value="{{$editdata['nama']}}" class="form-control">
            </div>
            <div class="form-group mb-3">
                <label>Email</label>
                <input type="email" name="email" value="{{$editdata['email']}}" class="form-control">
            </div>
            <div class="form-group mb-3">
                <label>Password</label>
                <input type="text" name="password" value="{{$editdata['password']}}" class="form-control">
            </div>
            <div class="form-group mb-3">
                <label for="roles_id">Role</label>
                <select name="roles_id" id="roles_id" class="form-control" required>
                    @foreach($roles as $role)
                        <option value="{{ $role->id }}" @if($editdata['roles_id'] == $role->id) selected @endif>{{ $role->nama_roles }}</option>
                    @endforeach
                </select>
            </div>
        <div class="">
            <button type="submit" class="btn btn-success mt-3">{{ __('Simpan') }}</</button>
          </div>
        </form>
      </div>
    
      <!-- /.card-body -->
    
  </div>
@endsection