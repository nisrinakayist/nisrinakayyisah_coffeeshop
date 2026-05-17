@extends('layouts.main')

@section('content')
    <div class="container py-5">
        <div class="row d-flex justify-content-left align-items-start">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card bg-dark text-white" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="mb-md-5 mt-md-4 pb-5">
                                <h2 class="fw-bold mb-2 text-uppercase">Sign In</h2>
                                <p class="text-white-50 mb-5">Please enter your email and password!</p>

                                <div class="mb-4">
                                    <label for="typeEmailX" class="form-label text-start d-block">Email</label>
                                    <input id="typeEmailX" type="email" class="form-control form-control-lg" name="email">
                                    @error('email')
                                        <span class="alert alert-danger py-2 px-3 mt-2 rounded-3 border-0 d-flex align-items-center" role="alert" style="font-size: 0.85rem;">
                                            <i class="bi bi-exlamation-triangle-fill me-2"></i>
                                            <div>
                                                {{ $message }}
                                            </div>
                                        </span>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label for="typePasswordX" class="form-label text-start d-block">{{ __('Password') }}</label>
                                    <input id="typePasswordX" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" required autocomplete="current-password">
                                    @error('password')
                                        <span class="alert alert-danger py-2 px-3 mt-2 rounded-3 border-0 d-flex align-items-center" role="alert" style="font-size: 0.85rem;">
                                           <i class="bi bi-exlamation-triangle-fill me-2"></i>
                                            <div>
                                                {{ $message }}
                                            </div>
                                        </span>
                                    @enderror
                                </div>

                                <button class="btn btn-outline-light btn-lg px-5" type="submit">Sign In</button>
                                
                                <div class="mt-4">
                                    <p class="mb-0">Don't have an account? <a href="{{ route('register') }}" class="text-white-50 fw-bold">Sign Up</a></p>
                                </div>
                                
                                <div>
                                @if (Route::has('password.request'))
                                    <p class="mb-0">Forgot Your Password? <a href="{{ route('password.request') }}" class="text-white-50 fw-bold">Reset Password</a></p>
                                @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        body {
            background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('https://i.pinimg.com/736x/d5/7c/1e/d57c1e61e3d9c4519c271f9a0629e37a.jpg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            /* Pakai min-height agar tidak memotong background di mobile */
            min-height: 100vh;
            margin: 0;
        }
        
        /* Font asli kamu */
        h2 {
            font-family: 'sans-serif';
        }
        
        .card.bg-dark {
            background-color: rgba(33, 37, 41, 0.8) !important;
            backdrop-filter: blur(5px);
        }

        #typeEmailX.form-control {
            border: 2px solid #ced4da;
            border-radius: 8px;
            padding: 10px 15px;
            transition: all 0.3s;
        }

        #typeEmailX.form-control:focus {
            border-color: #452829;
            box-shadow: 0 0 0 0.25rem rgba(59, 113, 202, 0.25);
        }

        .form-control.is-invalid {
            border-color: #E8D1C5;
            padding-right: calc(1.5rem + 0.75rem);
        }

        .form-label {
            font-family: 'Poppins';
            color: white;
            font-weight: bold;
            text-transform: capitalize;
            font-size: 1.2rem;
        }

        .form-control {
            font-family: 'sans-serif';
            color: black;
            font-style: italic;
            font-size: 1rem;
        }
        
        /* CSS tambahan hanya untuk fix responsif tanpa ganti font */
        @media (max-width: 768px) {
            .card-body {
                padding: 2rem !important; /* Biar gak terlalu sempit di HP */
            }
        }
    </style>
@endsection