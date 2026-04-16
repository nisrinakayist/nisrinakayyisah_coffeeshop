@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div>
                <div class="label">{{ __('Galery') }}</div>

                <div class="card-body">
                    @if(Auth()->user()?->level == 'admin')
                        @session('success')  
                        <div class="alert alert-success" role="alert">{{$value}}</div>
                        @endsession

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button type="button" class="btn btn-menu" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                + Add Picture
                            </button>
                        </div>

                        @section('modal')
                        <form action="{{ route('galerys.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="md-3">
                                <label for="inputImage" class="form-label">Image</label>
                                <input type="file" name="image" class="form-control" @error('image') is-invalid @enderror 
                                id="inputImage" placeholder="Masukkan Gambar">
                                @error('image')
                                <div id="inputImage" class="form-text text-danger">{{ $message }}</div>
                                @enderror

                                <span class="input-text" id="inputToko">Nama Toko</span>
                                <select name="nama_toko" id="inputToko" class="form-control" @error('nama_toko') is-invalid @enderror>
                                    <option> -- Pilih Nama Toko --</option>
                                        @foreach ($toko as $id => $toko)
                                            <option value="{{ $toko }}">{{ $toko }}</option>
                                        @endforeach
                                </select>
                                @error('nama_toko')
                                <div id="inputToko" class="form-text text-danger">{{ $message }}</div>
                                @enderror

                                <label for="inputRating" class="form-label d-block text-white">Rating</label>
                                <div class="star-rating">
                                    @for($i = 5; $i >= 1; $i--)
                                        <input type="radio" id="addstar{{ $i }}" name="rating" value="{{ $i }}">
                                        <label for="addstar{{ $i }}" title="{{ $i }} stars">
                                            <i class="bi bi-star-fill"></i>
                                        </label>
                                    @endfor
                                </div>

                                <label for="inputReview" class="form-label">Review</label>
                                <input type="text" name="review" class="form-control" @error('review') is-invalid @enderror 
                                id="inputReview" placeholder="Masukkan Review">
                                @error('review')
                                <div id="inputReview" class="form-text text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <br>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-menu-add" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-menu-add">Save changes</button>
                            </div>
                        </form>
                        @endsection
                        <div class="layout">
                            @forelse ($galerys as $galery)
                                <div class="card" style="width: 9rem;">
                                    @if ($galery->image)
                                        <img src="{{ asset('storage/'.$galery->image) }}" height="130" width="100" class="card-img-top">
                                            @else
                                            <span>No cover</span>
                                            @endif
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $galery->nama_toko }}</h5>
                                        <p class="card-text"> 
                                            <div class="text-warning">
                                                @for($i = 1; $i <= 5; $i++)
                                                    @if($i <= $galery-> rating)
                                                        <i class="bi bi-star-fill"></i> 
                                                    @else
                                                        <i class="bi bi-star text-secondary"></i>
                                                    @endif
                                                @endfor
                                            </div>
                                        </p>
                                        <p class="card-text"> {{ $galery->review }}</p>
                                    </div>
                                </div> 
                                <div class="tom">
                                    <a href="{{ route('galerys.edit', $galery->id) }}" class="btn btn-menu">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                            <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325"/>
                                        </svg>
                                    </a>
                                    <form action="{{ route('galerys.destroy',$galery->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-menu" onclick="return confirm('Are you sure want to delete this {{ $galery->nama_toko}}?'); ">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                                                    <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                                                </svg>
                                        </button>
                                    </form>
                                </div>
                            @empty
                                <p>There are no data</p> 
                            @endforelse
                        </div>
                </div> 
                {{ $galerys->links() }}
                    @elseif(Auth()->user()?->level == 'user')
                        <div class="layout">
                            @forelse ($galerys as $galery)
                                <div class="card" style="width: 9rem;">
                                    @if ($galery->image)
                                        <img src="{{ asset('storage/'.$galery->image) }}" height="130" width="100" class="card-img-top">
                                            @else
                                                <span>No cover</span>
                                            @endif
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $galery->nama_toko }}</h5>
                                        <p class="card-text"> 
                                            <div class="text-warning">
                                                @for($i = 1; $i <= 5; $i++)
                                                    @if($i <= $galery-> rating)
                                                        <i class="bi bi-star-fill"></i> 
                                                    @else
                                                        <i class="bi bi-star text-secondary"></i>
                                                    @endif
                                                @endfor
                                            </div>
                                        </p>
                                        <p class="card-text"> {{ $galery->review }}</p>
                                    </div>
                                </div> 
                            @empty
                                <p>There are no data</p> 
                            @endforelse
                        </div>
                        {{ $galerys->links() }}
                    @endif
            </div>
        </div>
    </div>
</div>

<style>
    body {
        background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('https://i.pinimg.com/1200x/83/ea/49/83ea4988f002a81e18789b188d7f79f9.jpg');
        background-size: cover;
        background-positon: center;
        background-attachment: fixed;
        height: 100vh;
        margin: 0;
    }
    .layout {
        display: flex;
        flex-wrap: wrap;
        gap: 30px;
    }
    .btn-menu {
        background-color: transparent;
        border: 2px solid #F3E9DC;
        color: #F3E9DC;
    }
    .btn-menu:hover {
        background-color: #F3E9DC;
        color: #703B3B;
    }
    .label{
        font-family: 'sans-serif';
        font-weight: bold;
        font-size: 50px;
        text-align: center;
    }
    .tom{
        display: flex;
        flex-direction: column;
        gap: 5px;
    }
    .btn-menu-add{
        background-color: #F3E9DC;
        border: 2px solid #F3E9DC;
        color: #703B3B;
    }
    .btn-menu-add:hover{
        background-color: #703B3B;
        color: #F3E9DC;
    }
    .star-rating{
        display: flex;
        flex-direction: row-reverse;
        justify-content: flex-end;
    }
    .star-rating input{
        display: none;
    }
    .star-rating label{
        font-size: 25px;
        color: #444;
        cursor: pointer;
        transition: color 0.2s;
    }
    .star-rating input:checked ~ label,
    .star-rating label:hover,
    .star-rating label:hover ~ label {
        color: #f39c12;
    }
</style>
@endsection