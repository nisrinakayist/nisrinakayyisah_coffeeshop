@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit') }}</div>

                <div class="card-body">

                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a href="{{ route('tokos.index') }}" 
                        class="btn btn-primary btn-sm">Back</a>
                    </div>
                    
                    {{-- @section('modal') --}}
                    <form action="{{ route('tokos.update', $toko->id ) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="inputToko" class="from-label">Nama Toko</label>
                            <input type="text" name="nama_toko" class="form-control" id="inputToko" value="{{ $toko->nama_toko }}"
                            @error('nama_toko') in-valid @enderror>

                            <label for="inputLokasi" class="from-label">Lokasi</label>
                            <input type="text" name="lokasi" class="form-control" id="inputLokasi" value="{{ $toko->lokasi }}"
                            @error('lokasi') in-valid @enderror>

                            <label for="inputRating" class="from-label">Rating</label>
                            <input type="text" name="rating" class="form-control" id="inputRating"  value="{{ $toko->rating }}"
                            @error('rating') in-valid @enderror>

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
