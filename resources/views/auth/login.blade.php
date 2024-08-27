@extends('layouts.app')


@section('content')
<style>
    .container {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 80vh;
    }
    .text-center {
        margin-bottom: 30px;
    }
    .btn-gold {
        background-color: #d4af37;
        color: white;
    }
    .gold {
        color: #d4af37;
    }
    .form-control {
        border-radius: 0;
    }
    .btn {
        border-radius: 0;
    }
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="text-center">
                <img src="{{asset('assets/logoitera.png')}}" alt="ITERA Logo" style="width: 100px; height: auto;">
                <h3 class="gold">Smart Building Controlling System</h3>
                <h2 class="fw-bold">Institut Teknologi Sumatera</h2>
                <h2>Masuk Akun</h2>
                <p>Silahkan masuk ke akun kamu</p>
            </div>
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="mb-3">
                    <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Masukkan email" value="{{ old('email') }}" required autofocus>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Masukkan password" required>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <button type="submit" class="btn btn-gold w-100">
                        Masuk
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection
