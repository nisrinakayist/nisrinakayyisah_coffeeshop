@extends('layouts.app')

@section('content')

<style>
    body {
        background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('https://i.pinimg.com/736x/d5/7c/1e/d57c1e61e3d9c4519c271f9a0629e37a.jpg');
        background-size: cover;
        font-family: 'Segoe UI', sans-serif;
    }

    .auth-card {
        border: none;
        border-radius: 18px;
        overflow: hidden;
        backdrop-filter: blur(10px);
        background: rgba(255, 255, 255, 0.92);
        box-shadow: 0 15px 35px rgba(0,0,0,0.25);
    }

    .auth-header {
        background: linear-gradient(135deg, #6f4e37, #c69c6d);
        color: white;
        padding: 20px;
        font-weight: bold;
        text-align: center;
        font-size: 20px;
        letter-spacing: 1px;
    }

    .btn-coffee {
        background: #6f4e37;
        color: white;
        border-radius: 10px;
        transition: 0.3s;
    }

    .btn-coffee:hover {
        background: #4e342e;
        color: white;
    }

    .form-control:focus {
        border-color: #c69c6d;
        box-shadow: 0 0 0 0.2rem rgba(198,156,109,0.25);
    }

    .link-small {
        color: #6f4e37;
        text-decoration: none;
    }

    .link-small:hover {
        text-decoration: underline;
    }
</style>

<div class="container vh-100 d-flex justify-content-center align-items-center">
    <div class="col-md-6 col-lg-5">

        <div class="card auth-card">

            <div class="auth-header">
                ☕ Reset Password
            </div>

            <div class="card-body p-4">

                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('password.update') }}">
                    @csrf

                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="mb-3">
                        <label class="form-label">Email Address</label>
                        <input type="email"
                            class="form-control @error('email') is-invalid @enderror"
                            name="email"
                            value="{{ $email ?? old('email') }}"
                            required
                            placeholder="youremail@example.com">

                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">New Password</label>
                        <input type="password"
                            class="form-control @error('password') is-invalid @enderror"
                            name="password"
                            required
                            placeholder="Enter new password">

                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Confirm Password</label>
                        <input type="password"
                            class="form-control"
                            name="password_confirmation"
                            required
                            placeholder="Confirm new password">
                    </div>

                    <button type="submit" class="btn btn-coffee w-100 py-2">
                        Reset Password
                    </button>

                </form>

                <div class="text-center mt-3">
                    <a href="{{ route('login') }}" class="link-small">
                        ← Back to Login
                    </a>
                </div>

            </div>
        </div>

    </div>
</div>

@endsection