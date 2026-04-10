@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create') }}</div>

                <div class="card-body">

                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a href="{{ route('tokos.index') }}" 
                        
                        class="btn btn-primary btn-sm">Back</a>
                    </div>
                    <form action="{{ route('tokos.store') }}" method="POST">
                        @csrf
                    <div class="md-3">
                                <label for="inputToko" class="form-label">Nama Toko</label>
                                <input type="text" name="Toko" class="form-control" @error('toko') is-invalid @enderror 
                                id="inpuToko" placeholder="Masukkan Nama Toko">
                                @error('toko')
                                <div id="inputToko" class="form-text text-danger">{{ $message }}</div>
                                @enderror

                                <label for="inputLokasi" class="form-label">Lokasi</label>
                                <input type="text" name="lokasi" class="form-control" @error('lokasi') is-invalid @enderror 
                                id="inputLokasi" placeholder="Masukkan Lokasi">
                                @error('lokasi')
                                <div id="inputLokasi" class="form-text text-danger">{{ $message }}</div>
                                @enderror

                                <label for="inputRating" class="form-label">Rating</label>
                                <input type="file" name="rating" class="form-control" @error('rating') is-invalid @enderror 
                                id="inputRating" placeholder="Masukkan Rating">
                                @error('rating')
                                <div id="inputRating" class="form-text text-danger">{{ $message }}</div>
                                @enderror


                            </div>
                    <br>
                    <button type="submit" class="btn btn-success">Submit</button>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
