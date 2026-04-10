@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit') }}</div>

                <div class="card-body">

                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a href="{{ route('galerys.index') }}" 
                        class="btn btn-primary btn-sm">Back</a>
                    </div>

                    {{-- @section('modal') --}}
                    <form action="{{ route('galerys.update', $galery->id ) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                                <label for="inputImage" class="form-label">Image</label>
                                {{-- <input type="file" name="image" class="form-control" id="inputImage" value="{{ $galery->image }}" 
                                @error('image') is-invalid @enderror> --}}
                                <br>
                                @if($galery->image)
                                <img src="{{ asset('storage/'.$galery->image) }}" width="120">
                                @endif
                                <br>
                                <br>
                                <input type="file" name="image">
                                <br>

                                <span class="input-text" id="inputToko">Nama Toko</span>
                                <select name="nama_toko" id="inputToko" class="form-control" value="{{ $galery->nama_toko }}" @error('nama_toko') is-invalid @enderror>
                                    <option> -- Pilih Nama Toko --</option>
                                    @foreach ($toko as $id => $toko)
                                    <option value="{{ $toko }}">{{ $toko }}</option>
                                    @endforeach
                                </select>
                                @error('nama_toko')
                                <div id="inputToko" class="form-text text-danger">{{ $message }}</div>
                                @enderror

                                {{-- <label for="inputToko" class="form-label">Nama Toko</label>
                                <input type="text" name="nama_toko" class="form-control" id="inputToko" value="{{ $galery->nama_toko }}"
                                @error('nama_toko') is-invalid @enderror> --}}

                                <label for="inputRating" class="form-label">Rating</label>
                                <input type="text" name="rating" class="form-control" id="inputRating" value="{{ $galery->rating }}"  
                                @error('rating') is-invalid @enderror>

                                <label for="inputReview" class="form-label">Review</label>
                                <input type="text" name="review" class="form-control" id="inputReview" value="{{ $galery->review }}"
                                @error('review') is-invalid @enderror>

                            

                            {{-- <label for="inputImage" class="from-label">Image</label>
                            <input type="file" name="image" class="form-control" id="inputImage" accept="image/*"
                            @error('image') in-valid @enderror> --}}

                        </div>

                        <button type="submit" class="btn btn-warning">Update</button>

                    </form>

                    {{-- @endsection --}}
                </div> 
            </div>
        </div>
    </div>
</div>
@endsection
