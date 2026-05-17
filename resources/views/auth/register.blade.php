@extends('layouts.main')

@section('content')
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-left align-items-start h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card bg-dark text-white" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="mb-md-5 mt-md-4 pb-5">
                                <h2 class="fw-bold mb-2 text-uppercase">SIGN UP</h2>
                                <div data-mdb-input-init class="mb-4">
                                    <label for="typeEmailX" class="form-label text-start d-block">Name</label>
                                    <input id="typeNameX" type="text" class="form-control form-control-lg  @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" >
                                    
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div data-mdb-input-init class="mb-4">
                                    <label for="typeEmailX" class="form-label text-start d-block">Email</label>
                                    <input id="typeEmailX" type="email" class="form-control form-control-lg  @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" name="email">
                                    
                                    @error('email')
                                        <span class="alert alert-danger py-2 px-3 mt-2 rounded-3 border-0 d-flex align-items-center" role="alert" style="font-size: 0.85rem;">
                                           <i class="bi bi-exlamation-triangle-fill me-2"></i>
                                            <div>
                                                {{ $message }}
                                            </div>
                                        </span>
                                    @enderror 
                                </div>

                                <div data-mdb-input-init class="mb-4">
                                    <label for="typePasswordX" class="form-label text-start d-block">{{ __('Password') }}</label>
                                    <input id="typePasswordX" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" required autocomplete="new-password">
                                    
                                    @error('password')
                                        <span class="alert alert-danger py-2 px-3 mt-2 rounded-3 border-0 d-flex align-items-center" role="alert" style="font-size: 0.85rem;">
                                           <i class="bi bi-exlamation-triangle-fill me-2"></i>
                                            <div>
                                                {{ $message }}
                                            </div>
                                        </span>
                                    @enderror
                                </div>
                                <div data-mdb-input-init class="mb-4">
                                    <label for="typePasswordX" class="form-label text-start d-block">{{ __('Confirm Password') }}</label>
                                    <input id="typePasswordX" type="password" class="form-control form-control-lg @error('password_confirmation') is-invalid @enderror" name="password_confirmation" value="{{ old('password') }}" required autocomplete="new-password">
                                </div>
                                <label for="typeLevelX" class="form-label text-start d-block">{{ __('Daftar Sebagai') }}</label>
                                <select name="level" id="" class="form-control">
                                    <option value="admin">Admin</option>
                                    <option value="user">User</option>
                                    
                                </select>
                                <br>
                                <button data-mdb-button-init data-mdb-ripple-init class="btn btn-outline-light btn-lg px-5 align-center" type="submit">Register</button>
                                <div>
                                    <p class="mb-0">Already have an account? <a href="{{ route('login') }}" class="text-white-50 fw-bold">Sign In</a>
                                    </p>
                                </div>
                                {{-- <div class="row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        
                                    </div>
                                </div> --}}
                                {{-- <button data-mdb-button-init data-mdb-ripple-init class="btn btn-outline-light btn-lg px-5" type="submit">Login</button> --}}

                                
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
            background-positon: center;
            background-attachment: fixed;
            height: 100vh;
            margin: 0;
        }
        h2{
            font-family: 'sans-serif';
        }
        .card.bg-dark{
            background-color: rgba(33, 37, 41, 0.8)  !important;
            backdrop-filter: blur(5px);
        }
        #typeEmailX.form-control{
            border: 2px solid #ced4da;
            border-radius: 8px;
            padding : 10px 15px;
            transition: all 0.3s;
            
        }
        #typeEmailX.form-control:focus {
            border-color: #452829;
            box-shadow: 0 0 0 0.25rem rgba(59, 113, 202, 0.25);
        }
        .form-control.is-invalid{
            border-color: #E8D1C5;
            padding-right: calc(1.5rem + 0.75rem);
        }
        .form-label{
            font-family: 'Poppins';
            color: white;
            font-weight: bold;
            text-transform: capitalize;
            font-size: 1.2rem;
        }
        .form-control {
            font-family: 'sans-serif';
            color:black;
            font-style:italic;
            font-size: 1rem;
        }
    </style>
@endsection