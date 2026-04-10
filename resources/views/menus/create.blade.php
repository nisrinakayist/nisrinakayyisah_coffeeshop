@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create') }}</div>

                <div class="card-body">

                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a href="{{ route('menus.index') }}" 
                        
                        class="btn btn-primary btn-sm">Back</a>
                    </div>
                    <form action="{{ route('menus.store') }}" method="POST">
                        @csrf
                    <div class="md-3">
                                <label for="inputJenis" class="form-label">Jenis Coffee</label>
                                <input type="text" name="jenis" class="form-control" @error('jenis') is-invalid @enderror 
                                id="inpuJenis" placeholder="Masukkan Jenis">
                                @error('jenis')
                                <div id="inputJenis" class="form-text text-danger">{{ $message }}</div>
                                @enderror

                                <label for="inputDescription" class="form-label">Description</label>
                                <input type="text" name="description" class="form-control" @error('description') is-invalid @enderror 
                                id="inputDescription" placeholder="Masukkan Description">
                                @error('description')
                                <div id="inputDescription" class="form-text text-danger">{{ $message }}</div>
                                @enderror

                                <label for="inputImage" class="form-label">Image</label>
                                <input type="file" name="image" class="form-control" @error('image') is-invalid @enderror 
                                id="inputImage" placeholder="Masukkan Gambar">
                                @error('image')
                                <div id="inputImage" class="form-text text-danger">{{ $message }}</div>
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
