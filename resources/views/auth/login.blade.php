@extends('layouts.app')

@section('content')
<style>
    html, body {
        height: 100%;
        margin: 0;
        overflow: hidden;
    }
    .background-image {
        background-image: url("{{asset('assets/smart-building-design.jpg')}}");
        background-size: cover;
        background-position: center;
        height: 100vh;
        width: 100%;
        position: fixed;
        top: 0;
        left: 0;
        z-index: -1;
        filter: brightness(0.6); /* Membuat background sedikit gelap agar teks lebih terbaca */
    }
    .login-container {
        background-color: rgba(255, 255, 255, 0.8);
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        max-width: 500px;
        width: 100%;
    }
    .container {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100vh;
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
        border-radius: 1;
        background-color: rgba(255, 255, 255, 0.9);
    }
    .btn {
        border-radius: 1;
    }
    .input-group {
        position: relative;
    }
    .input-group .toggle-password {
        position: absolute;
        right: 10px;
        top: 50%;
        transform: translateY(-50%);
        cursor: pointer;
        color: #d4af37; /* Adjust color as needed */
    }
</style>

<div class="background-image"></div>

<div class="container">
    <div class="login-container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="text-center">
                    <img src="{{asset('assets/logoitera.png')}}" alt="ITERA-Logo" style="width: 100px; height: auto;">
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

                    <div class="mb-3 input-group">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Masukkan password" required>
                        <span class="toggle-password" onclick="togglePasswordVisibility()">
                            <i id="toggleIcon" class="fas fa-eye"></i>
                        </span>
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
</div>

<script>
    function togglePasswordVisibility() {
        var passwordInput = document.getElementById("password");
        var toggleIcon = document.getElementById("toggleIcon");
        if (passwordInput.type === "password") {
            passwordInput.type = "text"; // Show password
            toggleIcon.classList.remove("fa-eye");
            toggleIcon.classList.add("fa-eye-slash");
        } else {
            passwordInput.type = "password"; // Hide password
            toggleIcon.classList.remove("fa-eye-slash");
            toggleIcon.classList.add("fa-eye");
        }
    }
</script>
@endsection